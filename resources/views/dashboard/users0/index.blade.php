@extends('admin.layouts.master')
 

    
@section('content')
   <div class="row">
       <div class="col-md-12">
              <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">@lang('site.users')</h3>

                  <form action="{{route('dashboard.users.index')}}" method="get">
                      <div class="row">
                            <div class="col-md-4">
                              
                                
                                <input type="text" name="search" class="form-control" placeholder="@lang('admin.search')" value="{{ request()->search }}">
                            
                               
                            </div>
                            <div class="col-md-4">

                                <!-- <input type="submit" class="btn btn-primary" value="@lang('admin.search')"> -->
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> @lang('admin.search')
                                </button>
                                @if (auth()->user()->hasPermission('create_users'))
                                    <a class="btn btn-primary" href="{{route('dashboard.users.create')}}">
                                        <i class="fa fa-plus"></i> @lang('admin.add')</a>
                                @else
                                    <a href="#" class="btn btn-primary disabled"><i class="fa fa-plus"></i> @lang('admin.add')</a>
                                @endif
                            </div>
                  
                            
                      </div>
                 
                  </form>
                </div>
                </div> 
                
                <div class="box-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>@lang('admin.first_name')</th>
                            <th>@lang('admin.last_name')</th>
                            <th>@lang('admin.email')</th>
                            <th>@lang('admin.controll')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($users) > 0)
                            @foreach($users as $index=>$user)
                            <tr>
                              <td>{{$index + 1}}</td>
                              <td>{{$user->first_name}}</td>
                              <td>{{$user->last_name}}</td>
                              <td>{{$user->email}}</td>
                              <td><img src="{{ asset('/image/upload/users/'. auth()->user()->image) }}" style="width: 100px;" class="img-thumbnail" alt=""></td>
                              <t
                            </tr>
                            @endforeach

                        @else

                            <tr>@lang('site.not_found_data')</tr>
                        @endif
                    
                    </tbody>
                </table>
                {{$users->appends(request()->query())->links()}}
                </div>             
            </div><!-- /.box --> 
        </div>    
     
@endsection