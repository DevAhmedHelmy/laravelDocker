<?php

namespace App\Http\Controllers\Dashboard\BasicInformation;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use App\DataTables\DepartmentsDataTable;
class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(DepartmentsDataTable $department)
    {

        return $department->render('dashboard.basic_information.departments.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $department = new Department();
        return view('dashboard.basic_information.departments.form',compact('department'));
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

            $rules += [$locale . '.name' => ['required', Rule::unique('department_translations', 'name')]];

        }//end of for each

        $data = $request->validate($rules);
      
        Department::create($request->all());
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.departments.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        // return view('dashboard.basic_information.departments.show',compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        return view('dashboard.basic_information.departments.form',compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
        $rules = [];

        foreach (config('translatable.locales') as $locale) {

            
            $rules += [$locale . '.name' => ['required', Rule::unique('department_translations', 'name')->ignore($department->id, 'department_id')]];
        }//end of for each

        $data = $request->validate($rules);
      
        $department->update($request->all());
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.departments.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        $department->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.departments.index');
    }
}
