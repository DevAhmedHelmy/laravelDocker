@extends('dashboard.layouts.master')


@section('content')

<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="card">
            <div class="card-header text-white bg-primary mb-3">
                <h5> @if(!$category->id)<i class="fa fa-plus-circle"></i> @lang('admin.create') @else <i class="fa fa-refresh" aria-hidden="true"></i> @lang('admin.update') @endif</h5>
            </div>
            <div class="card-body">
                <p> <i class="fa fa-user"></i> بيانات المنتج</p>
                <hr>
                @if(!$category->id)
                    <form action="{{route('dashboard.categories.store')}}" method="post" enctype="multipart/form-data">


                @else
                <form action="{{route('dashboard.categories.update',$category->id)}}" method="post" enctype="multipart/form-data">
                    @method('put')
                @endif
                    {{csrf_field()}}

                    <div class="row">
                        <div class="col-12">
                            <div class="mt-4 d-flex justify-content-between">

                                <div class="col form-group">
                                    <label>@lang('admin.product_code')</label>
                                    <input type="text" class="form-control"
                                           name="code" value="{{old('code',$category->code)}}"
                                           placeholder="@lang('admin.product_code')">
                                </div>
                                <div class="col form-group">

                                </div>


                            </div>
                            <div class="mt-4 d-flex justify-content-between">
                                @foreach (config('translatable.locales') as $local)
                                <div class="col form-group">
                                    <label>@lang('admin.' .$local. '.name')</label>
                                    <input type="text" class="form-control"
                                           name="{{ $local }}[name]"
                                           value=@if(!$category->id)"{{old($local.'.name')}}" @else "{{$category->translate($local)->name}}" @endif
                                           placeholder="@lang('admin.' .$local. '.name')">
                                </div>
                                @endforeach

                            </div>
                        </div>


                        <div class="text-center col-md-12">
                            <button type="submit" class="btn btn-primary btn-l  btn-rounded mt-2 mb-3"> <i class="fa fa-check"></i>@if(!$category->id) @lang('admin.save') @else @lang('admin.update')@endif</button>
                            </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




@endsection
