@extends('admin/layouts.master')
@section('content-header')

    <h1>@lang('site.users')</h1>
    <ol class="breadcrumb">
        <li><a href="{{route('dashboard.welcome')}}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
        <li><a href="{{route('dashboard.users.index')}}"><i class="fa fa-users"></i> @lang('site.users')</a></li>
        <li class="active"><i class="fa fa-plus"></i>  @lang('site.add')</a></li>

    </ol>

@endsection


@section('content')

    <div class="row">
       <div class="col-md-12">
              <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title"> @lang('site.add')</h3>
                </div>

                <div class="box-body">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <form action="{{route('dashboard.users.store')}}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label>@lang('site.first_name')</label>
                                    <input type="text" class="form-control"
                                           name="first_name" value="{{old('first_name')}}"
                                           placeholder="@lang('site.first_name')" required>
                                </div>
                                <div class="form-group">
                                    <label>@lang('site.last_name')</label>
                                    <input type="text" class="form-control"
                                           name="last_name" value="{{old('last_name')}}"
                                           placeholder="@lang('site.last_name')" required>
                                </div>
                                <div class="form-group">
                                    <label>@lang('site.email')</label>
                                    <input type="email" class="form-control"
                                           name="email" value="{{old('email')}}"
                                           placeholder="@lang('site.email')" required>
                                </div>
                                <div class="form-group">
                                    <label>@lang('site.image')</label>
                                    <input type="file" name="image" class="form-control image">
                                </div>
                                <div class="form-group">
                                    <img src="{{ asset('image/upload/users/default.png') }}"  style="width: 100px" class="img-thumbnail image-preview" alt="">
                                </div>
                                <div class="form-group">
                                    <label>@lang('site.password')</label>
                                    <input type="password" class="form-control"
                                           name="password" placeholder="@lang('site.password')" required>
                                </div>
                                <div class="form-group">
                                    <label>@lang('site.password_confirmation')</label>
                                    <input type="password" class="form-control"
                                           name="password_confirmation" placeholder="@lang('site.password_confirmation')" required>
                                </div>
                                <div class="form-group">
                                    <label>@lang('site.permissions')</label>
                                    <!-- Custom Tabs -->
                                    <div class="nav-tabs-custom">
                                            @php

                                                $models = ['users','categories','products','clients','orders'];
                                                $maps = ['create','read','update','delete'];
                                            @endphp
                                        <ul class="nav nav-tabs">



                                            @foreach($models as $index=>$model)
                                                <li class="{{$index == 0 ? 'active' : ''}}">
                                                    <a href="#{{$model}}" data-toggle="tab" aria-expanded="true">@lang('site.'.$model)</a>
                                                </li>
                                            @endforeach
                                            <!-- <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Tab 2</a></li>
                                            <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Tab 3</a></li> -->
                                        </ul>
                                    <div class="tab-content">
                                        @foreach($models as $index=>$model)
                                            <div class="tab-pane {{$index == 0 ? 'active' : ''}}" id="{{$model}}">
                                                @foreach($maps as $map)
                                                    <label>
                                                        <input type="checkbox" name="permissions[]" value="{{$map.'_'.$model}}">@lang('site.'.$map)
                                                    </label>
                                                @endforeach

                                            </div>
                                        @endforeach

                                      <!-- /.tab-pane -->
                                    </div>
                                    <!-- /.tab-content -->
                                  </div>
                                  <!-- nav-tabs-custom -->
                                </div>


                                <div class="form-group">

                                    <input type="submit" class="btn btn-primary" value="@lang('site.create')">

                                </div>
                                @include('admin.layouts.errors')
                            </form><!-- /end of form -->
                        </div>
                    </div>


                </div><!-- /.box-body -->



            </div><!-- /.box -->
        </div>
    </div>




@endsection
