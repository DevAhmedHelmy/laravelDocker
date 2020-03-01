<?php

namespace App\Http\Controllers\Dashboard\BasicInformation;

use App\Models\Product;
use App\Models\Company;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\ProductsDataTable;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['permission:read_products'])->only('index');
        $this->middleware(['permission:create_products'])->only('create');
        $this->middleware(['permission:update_products'])->only('edit');
        $this->middleware(['permission:delete_products'])->only('destroy');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProductsDataTable $product)
    {
        // dd(Products::with('company')->get());
        return $product->render('dashboard.basic_information.products.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = new Product();
        $companies = Company::all();
        $categories = Category::all();
        return view('dashboard.basic_information.products.form',compact('product','companies','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'category_id' => 'required',
            'company_id' => 'required',
        ];

        foreach (config('translatable.locales') as $local)
        {
            $rules += [$local . '.name' => 'required|unique:category_translations,name'];
            $rules += [$local . '.description' => 'required'];

        }
        $rules += [
            'purchase_price' => 'required',
            'sale_price' => 'required',
        ];

        $request->validate($rules);

        $request_data = $request->all();
        Product::create($request_data);
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $companies = Company::all();
        $categories = Category::all();
        return view('dashboard.basic_information.products.form',compact('product','companies','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $rules = [
            'category_id' => 'required',
            'company_id' => 'required',
        ];

        foreach (config('translatable.locales') as $local)
        {
            $rules += [$local . '.name' => 'required|unique:category_translations,name'];


        }
        $rules += [
            'purchase_price' => 'required',
            'sale_price' => 'required',
        ];

        $request->validate($rules);

        $request_data = $request->all();
        $product->update($request_data);
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.products.index');
    }
}
