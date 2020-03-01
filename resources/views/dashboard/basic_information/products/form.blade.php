@extends('dashboard.layouts.master')


@section('content')

<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="card">
            <div class="card-header text-white bg-primary mb-3">
                <h5> @if(!$product->id)<i class="fa fa-plus-circle"></i> @lang('admin.create') @else <i class="fa fa-refresh" aria-hidden="true"></i> @lang('admin.update') @endif</h5>
            </div>
            <div class="card-body">
                <p> <i class="fa fa-user"></i> بيانات المنتج</p>
                <hr>
                @if(!$product->id)
                    <form action="{{route('dashboard.products.store')}}" method="post" enctype="multipart/form-data">


                @else
                <form action="{{route('dashboard.products.update',$product->id)}}" method="post" enctype="multipart/form-data">
                    @method('put')
                @endif
                    {{csrf_field()}}

                    <div class="row">
                        <div class="col-12">
                            <div class="mt-4 d-flex justify-content-between">

                                <div class="col-4 form-group">
                                    <label>@lang('admin.product_code')</label>
                                    <input type="text" class="form-control"
                                           name="code" value="{{old('code',$product->code)}}"
                                           placeholder="@lang('admin.product_code')">
                                </div>
                                <div class="col-4 form-group">
                                    <label>@lang('admin.companies')</label>
                                    <select class="form-control select2" name="company_id">
                                        <option value="">@lang('admin.choose')</option>
                                        @foreach($companies as $company)
                                            <option @if($company->id == old('company_id',$product->company_id) ) selected @endif value="{{$company->id}}">{{$company->name}}</option@if>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-4 form-group">
                                    <label>@lang('admin.categories')</label>
                                    <select class="form-control select2" name="category_id">
                                        <option value="">@lang('admin.choose')</option>
                                        @foreach($categories as $category)
                                            <option @if($category->id == old('category_id',$product->category_id) ) selected @endif value="{{$category->id}}">{{$category->name}}</option@if>
                                        @endforeach
                                    </select>
                                </div>


                            </div>
                        </div>
                        <div class="col-12">

                            <div class="mt-4 d-flex justify-content-between">
                                @foreach (config('translatable.locales') as $local)
                                <div class="col form-group">
                                    <label>@lang('admin.' .$local. '.name')</label>
                                    <input type="text" class="form-control"
                                           name="{{ $local }}[name]"
                                           value=@if(!$product->id)"{{old($local.'.name')}}" @else "{{$product->translate($local)->name}}" @endif
                                           placeholder="@lang('admin.' .$local. '.name')">
                                </div>
                                @endforeach

                            </div>
                        </div>
                        <div class="col-12">

                            <div class="mt-4 d-flex justify-content-between">
                                @foreach (config('translatable.locales') as $local)
                                <div class="col form-group">
                                    <label>@lang('admin.' .$local. '.description')</label>
                                    <input type="text" class="form-control"
                                           name="{{ $local }}[description]"
                                           value=@if(!$product->id)"{{old($local.'.description')}}" @else "{{$product->translate($local)->description}}" @endif
                                           placeholder="@lang('admin.' .$local. '.description')">
                                </div>
                                @endforeach

                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mt-4 d-flex justify-content-between">

                                <div class="col form-group">
                                    <label>@lang('admin.purchase_price')</label>
                                    <input type="number" name="purchase_price" step="0.01" class="form-control" value="{{ old('purchase_price',$product->purchase_price) }}">
                                </div>
                                <div class="col form-group">
                                    <label>@lang('admin.sale_price')</label>
                                    <input type="number" name="sale_price" step="0.01" class="form-control" value="{{ old('sale_price',$product->sale_price) }}">
                                </div>


                            </div>
                        </div>


                        <div class="text-center col-md-12">
                            <button type="submit" class="btn btn-primary btn-l  btn-rounded mt-2 mb-3"> <i class="fa fa-check"></i>@if(!$product->id) @lang('admin.save') @else @lang('admin.update')@endif</button>
                            </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




@endsection
