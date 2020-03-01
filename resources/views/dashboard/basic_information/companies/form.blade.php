@extends('dashboard.layouts.master')


@section('content')

<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="card">
            <div class="card-header text-white bg-primary mb-3">
                <h5> @if(!$company->id)<i class="fa fa-plus-circle"></i> @lang('admin.create') @else <i class="fa fa-refresh" aria-hidden="true"></i> @lang('admin.update') @endif</h5>
            </div>
            <div class="card-body">
                <p> <i class="fa fa-user"></i> بيانات الشركة</p>
                <hr>
                @if(!$company->id)
                    <form action="{{route('dashboard.companies.store')}}" method="post" enctype="multipart/form-data">


                @else
                <form action="{{route('dashboard.companies.update',$company->id)}}" method="post" enctype="multipart/form-data">
                    @method('put')
                @endif
                    {{csrf_field()}}

                    <div class="row">
                        <div class="col-12">
                            <div class="mt-4 d-flex justify-content-between">
                                
                                <div class="col form-group">
                                    <label>@lang('admin.company_code')</label>
                                    <input type="text" class="form-control"
                                           name="code" value="{{old('code',$company->code)}}"
                                           placeholder="@lang('admin.company_code')">
                                </div>
                                 
                                 
                            </div>
                            <div class="mt-4 d-flex justify-content-between">
                                @foreach (config('translatable.locales') as $local)
                                <div class="col form-group">
                                    <label>@lang('admin.' .$local. '.name')</label>
                                    <input type="text" class="form-control"
                                           name="{{ $local }}[name]" 
                                           value=@if(!$company->id)"{{old($local.'.name')}}" @else "{{$company->translate($local)->name}}" @endif
                                           placeholder="@lang('admin.' .$local. '.name')">
                                </div>
                                @endforeach
                                 
                            </div>
                        </div>
                         
                          
                        <div class="text-center col-md-12">
                            <button type="submit" class="btn btn-primary btn-l  btn-rounded mt-2 mb-3"> <i class="fa fa-check"></i>@if(!$company->id) @lang('admin.save') @else @lang('admin.update')@endif</button>
                            </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



 
@endsection
