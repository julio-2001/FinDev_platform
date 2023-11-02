<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jobs;
use App\Models\Experiences;

##Models
use App\Models\JobApplications;

class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Jobs::with('experiencesName','locationsName')->get();
        return view('jobs.list',["jobs" => $jobs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $experiences = Experiences::all();
        return view('jobs.form',['experiences' => $experiences]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $body = $request->all();

        if(!empty($body['id'])){
            $jobs = Jobs::find($body['id']);
        }else{
            $jobs = new Jobs;
        }

        $jobs -> company = $body['company'];
        $jobs -> title = $body['title'];
        $jobs -> description = $body['description'];
        $jobs -> experience = $body['experience'];
        $jobs -> location = $body['location'];

        $jobs -> save();

       return redirect('/v1/vagas');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $job = Jobs::find($id);
        $experiences = Experiences::all();
        return view('jobs.form',['job' => $job, 'experiences' => $experiences]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $JobApplications =  JobApplications::where('job_id',$id);

        if($JobApplications -> exists()){
            $JobApplications -> delete();
        }

        $Job = Jobs::find($id);
        $Job -> delete();

        return redirect('/v1/vagas');
    }
}
