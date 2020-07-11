<?php

namespace App\Http\Controllers;

use App\Company;
use App\Jobs;
use Illuminate\Http\Request;
use Auth;

class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Jobs::all();
        return view('welcome', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jobs.post');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'category_id' => 'required',
            'title' => 'required',
            'slug' => 'required',
            'vacancy' => 'required',
            'position' => 'required',
            'job_context' => 'required',
            'job_type' => 'required',
            'salary' => 'required',
            'last_date' => 'required',
            'education' => 'required',
            'experience' => 'required',
            'description' => 'required',
        ]);

        $user_id = auth()->user()->id;
        $company = Company::where('user_id', $user_id)->first();
        $company_id = $company->id;
        Jobs::create([
            'user_id' => $user_id,
            'company_id' => $company_id,
            'category_id' => request('category_id'),
            'title' => request('title'),
            'slug' => str_slug(request('title')),
            'vacancy' => request('vacancy'),
            'position' => request('position'),
            'job_context' => request('job_context'),
            'job_type' => request('job_type'),
            'salary' => request('salary'),
            'last_date' => request('last_date'),
            'education' => request('education'),
            'experience' => request('experience'),
            'description' => request('description'),
        ]);

        return redirect()->to('/jobs/myjobs')->with('message', 'Job Post Insert Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Jobs  $jobs
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $job = Jobs::find($id);
        return view('jobs.view', compact('job'));
    }


    public function myjob()
    {
        $jobs = Jobs::where('user_id', auth()->user()->id)->get();
        return view('jobs.myjob', compact('jobs'));
    }

    public function apply(Request $request, $id){
        $jobId = Jobs::find($id);
        $jobId->users()->attach(Auth::user()->id);

        return redirect()->back()->with('message', 'Apply Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Jobs  $jobs
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $job = Jobs::find($id);
        return view('jobs.edit', compact('job'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Jobs  $jobs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Jobs::findorFail($id)->update([
            'title' => request('title'),
            'slug' => str_slug(request('title')),
            'vacancy' => request('vacancy'),
            'position' => request('position'),
            'job_context' => request('job_context'),
            'job_type' => request('job_type'),
            'salary' => request('salary'),
            'last_date' => request('last_date'),
            'education' => request('education'),
            'experience' => request('experience'),
            'description' => request('description'),
        ]);

        return redirect()->to('/jobs/myjobs')->with('message', 'Job Post update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Jobs  $jobs
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Jobs::find($id)->delete();
        return redirect()->to('/jobs/myjobs')->with('message', 'Job Post update Successfully');
    }

    public function applicant(){
        $applicants = Jobs::has('users')->where('user_id', auth()->user()->id)->get();
        return view('jobs.applicant', compact('applicants'));
    }
}
