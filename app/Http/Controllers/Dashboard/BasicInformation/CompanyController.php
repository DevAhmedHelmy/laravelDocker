<?php

namespace App\Http\Controllers\Dashboard\BasicInformation;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\CompaniesDataTable;
use Illuminate\Validation\Rule;
class CompanyController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['permission:read_companies'])->only('index');
        $this->middleware(['permission:create_companies'])->only('create');
        $this->middleware(['permission:update_companies'])->only('edit');
        $this->middleware(['permission:delete_companies'])->only('destroy');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CompaniesDataTable $company)
    {
        return $company->render('dashboard.basic_information.companies.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $company = new Company();
        return view('dashboard.basic_information.companies.form',compact('company'));
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

            $rules += [$locale . '.name' => ['required', Rule::unique('company_translations', 'name')]];

        }//end of for each

        $data = $request->validate($rules);

        Company::create($request->all());
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.companies.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return view('dashboard.basic_information.companies.show',compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('dashboard.basic_information.companies.form',compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
         $rules = [];

        foreach (config('translatable.locales') as $locale) {


            $rules += [$locale . '.name' => ['required', Rule::unique('company_translations', 'name')->ignore($company->id, 'company_id')]];
        }//end of for each

        $data = $request->validate($rules);

        $company->update($request->all());
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.companies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.companies.index');
    }
}
