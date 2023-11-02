<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

##Models
use App\Models\Candidates;
use App\Models\Experiences;
use App\Models\JobApplications;

class CandidatesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $candidates = Candidates::with('experiencesName')->get();
        return view('candidates.list', ['candidates' => $candidates]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $experiences = Experiences::all();
        return view('candidates.form',['experiences' => $experiences]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $body = $request->all();

        if(!empty($body['id'])){
            $candidates = Candidates::find($body['id']);
        }else{
            $candidates = new Candidates;
        }

        $candidates -> nome = $body['name'];
        $candidates -> profissao = $body['profissao'];
        $candidates -> experience = $body['experience'];
        $candidates -> location = $body['location'];

        $candidates -> save();

       return redirect('/v1/pessoas');
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
        $candidate = Candidates::find($id);
        $experiences = Experiences::all();
        return view('candidates.form',['candidate' => $candidate, 'experiences' => $experiences]);
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
        $candidate = Candidates::find($id);
        $JobApplications =  JobApplications::where('candidate_id',$id);

        if($JobApplications ->exists()){
            $JobApplications -> delete();
        }

        $candidate -> delete();
        return redirect('/v1/pessoas');
    }
}
