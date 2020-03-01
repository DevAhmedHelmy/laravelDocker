@extends('dashboard.layouts.master')


@section('content')

<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="card">
            <div class="card-header text-white bg-primary mb-3">
                <h5> @if(!$client->id)<i class="fa fa-plus-circle"></i> @lang('admin.create') @else <i class="fa fa-refresh" aria-hidden="true"></i> @lang('admin.update') @endif</h5>
            </div>
            <div class="card-body">
                <p> <i class="fa fa-user"></i> بيانات العميل</p>
                <hr>
                @if(!$client->id)
                    <form action="{{route('dashboard.clients.store')}}" method="post" enctype="multipart/form-data">


                @else
                <form action="{{route('dashboard.clients.update',$client->slug)}}" method="post" enctype="multipart/form-data">
                    @method('put')
                @endif
                    {{csrf_field()}}

                    <div class="row">
                        <div class="col-12">
                            <div class="mt-4 d-flex justify-content-between">

                                <div class="col form-group">
                                    <label>@lang('admin.client_code')</label>
                                    <input type="text" class="form-control"
                                           name="code" value="{{old('code',$client->code)}}"
                                           placeholder="@lang('admin.client_code')">
                                </div>
                                <div class="col form-group">
                                    <label>@lang('admin.name')</label>
                                    <input type="text" class="form-control"
                                           name="name"
                                           value="{{old('name',$client->name)}}"
                                           placeholder="@lang('admin.name')">
                                </div>


                            </div>
                            <div class="mt-4 d-flex justify-content-between">

                                <div class="col form-group">
                                    <label>@lang('admin.email')</label>
                                    <input type="text" class="form-control"
                                           name="email"
                                           value="{{old('name',$client->email)}}"
                                           placeholder="@lang('admin.email')">
                                </div>
                                <div class="col form-group">
                                    <label>@lang('admin.department')</label>
                                    <select class="form-control select2" name="type">
                                        <option value="">@lang('admin.choose')</option>
                                        <option @if($client->type == 1) selected @endif value="1">سوبر ماركت</option>
                                        <option @if($client->type == 2) selected @endif value="2">شركة</option>
                                    </select>
                                </div>


                            </div>
                            <div class="mt-4 d-flex justify-content-between">
                                @for ($i = 0; $i < 2; $i++)
                                    <div class="col form-group">
                                        <label>@lang('admin.phone')</label>
                                        <input type="text" name="phone[]" class="form-control"
                                        @if($client->phone) value= "{{$client->phone[$i] ?? '' }}" @endif>
                                    </div>
                                @endfor

                            </div>
                            <div class="mt-4 d-flex justify-content-between">
                                <div class="col form-group">
                                    <label>@lang('admin.address')</label>
                                    <textarea type="text" class="form-control"
                                           name="address"
                                           value="{{old('name',$client->address)}}"
                                           placeholder="@lang('admin.address')"></textarea>
                                </div>
                                <div class="col form-group">
                                </div>
                            </div>
                        </div>


                        <div class="text-center col-md-12">
                            <button type="submit" class="btn btn-primary btn-l  btn-rounded mt-2 mb-3"> <i class="fa fa-check"></i>@if(!$client->id) @lang('admin.save') @else @lang('admin.update')@endif</button>
                            </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




@endsection
