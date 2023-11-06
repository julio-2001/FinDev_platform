<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

##Models
use App\Models\Candidates;
use App\Models\Jobs;
use App\Models\JobApplications;
use  App\Models\Distances;

use App\utils\Score;


class JobApplicationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $JobApplications = JobApplications::with('candidates', 'job')->get();
        return view('jobApplications.list', ["JobApplications" => $JobApplications]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $candidates = Candidates::all();
        $jobs = Jobs::all();

        return view('jobApplications.form', ['candidates' => $candidates, 'jobs' => $jobs]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $body = $request->all();
        $created_at_jobs = Jobs::find($body['job'])->created_at;
        $distances = Distances::all();

        $JobApplications = new JobApplications;

        $existingApplication = $JobApplications::where('candidate_id', $body['candidate'])
            ->where('job_id', $body['job'])->first();


        if (!$existingApplication) {
            $JobApplications->candidate_id = $body['candidate'];
            $JobApplications->job_id = $body['job'];
            $JobApplications->created_at_job = $created_at_jobs;
            $JobApplications->score = Score::score(Jobs::find($body['job'])->experience, Candidates::find($body['candidate'])->experience, Jobs::find($body['job'])->location, Candidates::find($body['candidate'])->location, Score::arrayDistances($distances));
            $JobApplications->save();
            return redirect('/v1/candidaturas');
        } else {
            Session::flash('error', 'candidato: ' . Candidates::find($body['candidate'])->nome . ' | já foi registrado na vaga: ' . Jobs::find($body['job'])->title . ' na empressa: ' . Jobs::find($body['job'])->company . ' | ID: ' . Jobs::find($body['job'])->id);
            return redirect('v1/candidaturas/cadastrar');
        }
    }

    public function ranking(string $id)
    {
        $JobApplications = JobApplications::where('job_id', $id)->orderBy('score', 'desc')->get();
        return view('jobApplications.ranking', ['JobApplications' => $JobApplications]);
    }

    public function destroyAll(string $id)
    {
        $JobApplications = JobApplications::find($id);
        $JobApplications::where('job_id', $JobApplications->job_id)->delete();
        $JobApplications->delete();

        return redirect('v1/candidaturas');
    }
    public function destroy(string $id)
    {
        $JobApplications = JobApplications::find($id);
        $JobApplications->delete();
        return redirect()->back();
    }
}
