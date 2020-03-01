<?php

namespace App\Http\Controllers\Dashboard\BasicInformation;

use App\Models\Job;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\JobsDataTable;
use Illuminate\Validation\Rule;
class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(JobsDataTable $job)
    {

        return $job->render('dashboard.basic_information.jobs.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $job = new Job();
        return view('dashboard.basic_information.jobs.form',compact('job'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [];

        foreach (config('translatable.locales') as $locale) {

            $rules += [$locale . '.name' => ['required', Rule::unique('job_translations', 'name')]];

        }//end of for each

        $data = $request->validate($rules);
      
        Job::create($request->all());
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.jobs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jop  $jop
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Job  $Job
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
        return view('dashboard.basic_information.jobs.form',compact('job'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Job  $Job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Job $job)
    {
        $rules = [];

        foreach (config('translatable.locales') as $locale) {

            
            $rules += [$locale . '.name' => ['required', Rule::unique('job_translations', 'name')->ignore($job->id, 'job_id')]];
        }//end of for each

        $data = $request->validate($rules);
      
        $job->update($request->all());
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.jobs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Job  $Job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        $job->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.jobs.index');
    }
}
