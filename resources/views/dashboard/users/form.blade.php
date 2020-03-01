@extends('dashboard.layouts.master')


@section('content')

<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="card">
            <div class="card-header text-white bg-primary mb-3">
                <h5> @if(!$user->id)<i class="fa fa-plus-circle"></i> @lang('admin.create') @else <i class="fa fa-refresh" aria-hidden="true"></i> @lang('admin.update') @endif</h5>
            </div>
            <div class="card-body">
                <p> <i class="fa fa-user"></i> بيانات الموظف</p>
                <hr>
                @if(!$user->id)
                    <form action="{{route('dashboard.users.store')}}" method="post" enctype="multipart/form-data">


                @else
                <form action="{{route('dashboard.users.update',$user->id)}}" method="post" enctype="multipart/form-data">
                    @method('put')
                @endif
                    {{csrf_field()}}

                    <div class="row">
                        <div class="col-12">
                            <div class="mt-4 d-flex justify-content-between">
                                <div class="col form-group">
                                    <label>@lang('admin.user_code')</label>
                                    <input type="text" class="form-control"
                                           name="name" value="{{old('code',$user->code)}}"
                                           placeholder="@lang('admin.user_code')">
                                </div>
                                <div class="col form-group">
                                    <label>@lang('admin.identity_num')</label>
                                    <input type="email" class="form-control"
                                       name="email" value="{{old('identity_num',$user->identity_num)}}"
                                       placeholder="@lang('admin.identity_num')">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mt-4 d-flex justify-content-between">
                                <div class="col form-group">
                                    <label>@lang('admin.name')</label>
                                    <input type="text" class="form-control"
                                           name="name" value="{{old('name',$user->name)}}"
                                           placeholder="@lang('admin.name')">
                                </div>
                                <div class="col form-group">
                                    <label>@lang('admin.email')</label>
                                    <input type="email" class="form-control"
                                       name="email" value="{{old('email',$user->email)}}"
                                       placeholder="@lang('admin.email')">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mt-4 d-flex justify-content-between">
                                <div class="col form-group">
                                    <label>@lang('admin.password')</label>
                                    <input type="password" class="form-control"
                                       name="password" placeholder="@lang('admin.password')">
                                </div>
                                <div class="col form-group">
                                    <label>@lang('admin.password_confirmation')</label>
                                    <input type="password" class="form-control"
                                           name="password_confirmation" placeholder="@lang('admin.password_confirmation')">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mt-4 d-flex justify-content-between">
                                <div class="col form-group">
                                    <label>@lang('admin.phone')</label>
                                    <input type="text" class="form-control"
                                           name="name" value="{{old('phone',$user->phone)}}"
                                           placeholder="@lang('admin.phone')">
                                </div>
                                <div class="col form-group">
                                    <label>@lang('admin.account_number')</label>
                                    <input type="email" class="form-control"
                                       name="email" value="{{old('account_number',$user->account_number)}}"
                                       placeholder="@lang('admin.account_number')">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mt-4 d-flex justify-content-between">
                                <div class="col form-group">
                                    <label>@lang('admin.basic_address')</label>
                                    <input type="text" name="basic_address" class="form-control" value="{{old('basic_address',$user->basic_address)}}" placeholder="@lang('admin.basic_address')">
                                </div>
                                <div class="col form-group">
                                    <label>@lang('admin.current_address')</label>
                                    <input type="text" name="current_address" class="form-control" value="{{old('current_address',$user->basic_address)}}" placeholder="@lang('admin.current_address')">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mt-4 d-flex justify-content-between">
                                <div class="col form-group">
                                    <label>@lang('admin.gender')</label>
                                    <select class="form-control select2" name="gender">
                                        <option value="">@lang('admin.choose')</option>
                                        <option @if($user->gender == 'male') selected @endif value="male">@lang('admin.male')</option@if>
                                        <option @if($user->gender == 'female') selected @endif value="female">@lang('admin.female')</option>
                                    </select>
                                </div>
                                <div class="col form-group">
                                    <label>@lang('admin.religion')</label>
                                    <select class="form-control select2" name="religion">
                                        <option value="">@lang('admin.choose')</option>
                                        <option @if($user->religion == 'muslim') selected @endif value="male">@lang('admin.muslim')</option@if>
                                        <option @if($user->religion == 'christian') selected @endif value="christian">@lang('admin.christian')</option>
                                    </select>
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mt-4 d-flex justify-content-between">
                                <div class="col form-group">
                                    <label>@lang('admin.department')</label>
                                    <select class="form-control select2" name="type">
                                        <option value="">@lang('admin.choose')</option>
                                        <option @if($user->type == 1) selected @endif value="1">رئيس مجلس الادارة</option>
                                        <option @if($user->type == 2) selected @endif value="2">محاسب</option>
                                    </select>
                                </div>
                                <div class="col form-group">
                                    <label>@lang('admin.job')</label>
                                    <select class="form-control select2" name="type">
                                        <option value="">@lang('admin.choose')</option>
                                        <option @if($user->type == 1) selected @endif value="1">رئيس مجلس الادارة</option>
                                        <option @if($user->type == 2) selected @endif value="2">محاسب</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mt-4 d-flex justify-content-between">
                                
                                
                                <div class="col form-group">
                                    <label for="exampleFormControlSelect1">@lang('admin.salary')</label>
                                    <input type="text" name="salary" class="form-control" placeholder="@lang('admin.salary')">
                                </div>
                                <div class="col form-group">
                                    <label>@lang('admin.birth_date')</label>
                                    <input type="text" name="birth_date" value="{{old('birth_date',$user->birth_date)}}" class="form-control myDatepicker2" placeholder="@lang('admin.birth_date')">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mt-4 d-flex justify-content-between">
                                
                                <div class="col form-group">
                                    <label for="exampleFormControlSelect1">@lang('admin.date_of_hiring')</label>
                                    <input type="text" name="hiring_date" value="{{old('hiring_date',$user->hiring_date)}}" class="form-control myDatepicker2" placeholder="@lang('admin.date_of_hiring')">
                                </div>
                                <div class="col form-group">
                                     <label>@lang('admin.attachment')</label>
                                    <input type="file" name="file" class="form-control image">
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mt-4 d-flex justify-content-between">
                                <div class="col form-group">
                                    <div class="mt-4 d-flex justify-content-between">
                                        <div class="form-group">
                                    <label>@lang('admin.image')</label>
                                    <input type="file" name="file" class="form-control image">
                                </div>
                                <div class="col form-group">
                                    <img src="{{ asset('image/upload/users/default.png') }}"  style="width: 100px" class="img-thumbnail image-preview" alt="">
                                </div>
                                </div>
                                </div>
                                <div class="col form-group">
                                     
                                </div>
                            </div>
                        </div>

                        {{--  permission  --}}
                        <div class="col-12 mt-4">
                            <div class="x_panel">
                              <div class="x_title">
                                <h2><i class="fa fa-bars"></i> @lang('admin.permissions')</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                  </li>


                                </ul>
                                <div class="clearfix"></div>
                              </div>

                              @php

                                $models = ['users','categories','products','clients','orders'];
                                $maps = ['create','read','update','delete'];
                            @endphp
                                <div class="x_content" style="display: block;">

                                    <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
                                        @foreach($models as $index=>$model)
                                    <li class="nav-item">
                                        <a class="nav-link" id="home-tab" data-toggle="tab" href="#{{$model}}" role="tab" aria-controls="home" aria-selected="false">@lang('admin.'.$model)</a>
                                    </li>

                                    @endforeach


                                    </ul>

                                    <div class="tab-content" id="myTabContent">
                                        @foreach($models as $index=>$model)
                                                <div class="tab-pane {{$index == 0 ? 'fade' : ''}}" id="{{$model}}">
                                                    @foreach($maps as $map)
                                                    <label>
                                                        <input type="checkbox" name="permissions[]" @if($user->permissions->contains( $map . '_' . $model)) 'checked' @endif value="{{ $map . '_' . $model }}"> @lang('admin.' . $map)
                                                    </label>
                                                    @endforeach

                                                </div>
                                            @endforeach



                                    </div>
                                </div>
                            </div>
                        </div>


                        {{--  permisson  --}}

                        <div class="text-center col-md-12">
                            <button type="submit" class="btn btn-primary btn-l  btn-rounded mt-2 mb-3"> <i class="fa fa-check"></i> @lang('admin.save')</button>
                            </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



@push('js')

<script>

$('.myDatepicker2').datetimepicker({
        format: 'YYYY-MM-DD'
    });

$('select2').select2();


</script>

@endpush
@endsection
