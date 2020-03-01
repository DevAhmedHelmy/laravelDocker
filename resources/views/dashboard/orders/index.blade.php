@extends('admin/layouts.master')
@section('content-header')

    <h1>
        @lang('site.orders')
        <small>{{$orders->count()}}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('dashboard.welcome')}}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
        <li class="active"><i class="fa fa-users"></i> @lang('site.orders')</li>
        
    </ol>

@endsection

    
@section('content')
   <div class="row">
       <div class="col-md-8">
              <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">@lang('site.orders')</h3>
                  <form action="{{route('dashboard.orders.index')}}" method="get">
                    <div class="row">
                          <div class="col-md-4">
                              <input type="text" name="search" class="form-control" placeholder="@lang('site.search')" value="">                             
                          </div>
                          <div class="col-md-4">
                              <!-- <input type="submit" class="btn btn-primary" value="بحث"> -->
                              <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> @lang('site.search')</button>
                          </div>
                
                          
                    </div>
               
                </form>
                  
                </div>
                </div> 
                
                <div class="box-body">
                @if(count($orders) > 0)
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>@lang('site.client_name')</th>
                            <th>@lang('site.price')</th>
                            
                            <th>@lang('site.created_at')</th>
                            <th>@lang('site.controll')</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                            @foreach ($orders as $index=>$order)
                                <tr>
                                    <td>{{$index + 1}}</td>
                                    <td>{{$order->client->name}}</td>
                                    <td>{{number_format($order->price, 2)}}</td>
                                    <td>{{$order->created_at}}</td>
                                        
                                    <td>
                                        <button class="btn btn-primary btn-sm order-products" 
                                            data-url="{{route('dashboard.orders.products', $order->id)}}"
                                            data-method="get">
                                            <i class="fa fa-list"></i> @lang('site.view')
                                        </button>
                                        @if (auth()->user()->hasPermission('update_orders'))
                                            <a href="{{ route('dashboard.clients.orders.edit',['client' => $order->client->id, 'order' => $order->id]) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> @lang('site.edit')</a>
                                        @else
                                            <a href="#" class="btn btn-info btn-sm disabled"><i class="fa fa-edit"></i> @lang('site.edit')</a>
                                        @endif
                                        @if (auth()->user()->hasPermission('delete_orders'))
                                            <form action="{{ route('dashboard.orders.destroy', $order->id) }}" method="POST" style="display: inline-block;">
                                                {{ csrf_field() }}
                                                {{ method_field('delete') }}
                                                <button type="submit" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i> @lang('site.delete')</button>
                                            </form>
                                        @else
                                            <button class="btn btn-danger btn-sm disabled"><i class="fa fa-trash"></i> @lang('site.delete')</button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            
                </table>
                @else
                        
                    <h2>@lang('site.no_data_found')</h2>
                
                @endif
                
                </div>             
            </div><!-- /.box --> 
            <div class="col-md-4">
                <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">@lang('site.products')</h3>
    
                      
                    </div>
                    </div> 
                    
                    <div class="box-body">
                            <div style="display: none; flex-direction: column; align-items: center;" class="lds-dual-ring">
                                
                            </div>
                        <div id="order-product-list">

                        </div><!-- end of order product list -->
                    
                    </div>             
                </div><!-- /.box --> 
            </div>
        </div>    
    </div>
@endsection