@extends('dashboard.layouts.master')


@section('content')

<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="card">
            <div class="card-header text-white bg-primary mb-3">
                <h5> @if(!$job->id)<i class="fa fa-plus-circle"></i> @lang('admin.create') @else <i class="fa fa-refresh" aria-hidden="true"></i> @lang('admin.update') @endif</h5>
            </div>
            <div class="card-body">
                <p> <i class="fa fa-user"></i> بيانات الوظيفة</p>
                <hr>
                @if(!$job->id)
                    <form action="{{route('dashboard.jobs.store')}}" method="post" enctype="multipart/form-data">


                @else
                <form action="{{route('dashboard.jobs.update',$job->id)}}" method="post" enctype="multipart/form-data">
                    @method('put')
                @endif
                    {{csrf_field()}}

                    <div class="row">
                        <div class="col-12">
                            <div class="mt-4 d-flex justify-content-between">
                                
                                <div class="col form-group">
                                    <label>@lang('admin.company_code')</label>
                                    <input type="text" class="form-control"
                                           name="code" value="{{old('code',$job->code)}}"
                                           placeholder="@lang('admin.job_code')">
                                </div>
                                 
                                 
                            </div>
                            <div class="mt-4 d-flex justify-content-between">
                                @foreach (config('translatable.locales') as $local)
                                <div class="col form-group">
                                    <label>@lang('admin.' .$local. '.name')</label>
                                    <input type="text" class="form-control"
                                           name="{{ $local }}[name]" 
                                           value=@if(!$job->id)"{{old($local.'.name')}}" @else "{{$job->translate($local)->name}}" @endif
                                           placeholder="@lang('admin.' .$local. '.name')">
                                </div>
                                @endforeach
                                 
                            </div>
                        </div>
                         
                          
                        <div class="text-center col-md-12">
                            <button type="submit" class="btn btn-primary btn-l  btn-rounded mt-2 mb-3"> <i class="fa fa-check"></i>@if(!$job->id) @lang('admin.save') @else @lang('admin.update')@endif</button>
                            </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



 
@endsection
