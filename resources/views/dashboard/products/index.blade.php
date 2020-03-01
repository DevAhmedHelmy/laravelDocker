@extends('admin/layouts.master')
@section('content-header')

    <h1>@lang('site.dashboard')</h1>
    <ol class="breadcrumb">
        <li><a href="{{route('dashboard.welcome')}}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
        <li class="active"><i class="fa fa-users"></i> @lang('site.products')</li>
        
    </ol>

@endsection

    
@section('content')
   <div class="row">
       <div class="col-md-12">
              <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">@lang('site.products')</h3>

                  <form action="{{route('dashboard.products.index')}}" method="get">
                      <div class="row">
                            <div class="col-md-4">
                              
                                
                                <input type="text" name="search" class="form-control" placeholder="@lang('site.search')" value="{{ request()->search }}">
                            
                               
                            </div>
                            <div class="col-md-4">
                                <select name="category_id" class="form-control">
                                <option>@lang('site.all_categories')</option>
                                    @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">

                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> @lang('site.search')
                                    </button>
                                @if (auth()->user()->hasPermission('create_products'))
                                    <a class="btn btn-primary" href="{{route('dashboard.products.create')}}">
                                        <i class="fa fa-plus"></i> @lang('site.add')</a>
                                 @else
                                    <a href="#" class="btn btn-primary disabled"><i class="fa fa-plus"></i> @lang('site.add')</a>
                                @endif
                            </div>
                  
                            
                      </div>
                 
                  </form>
                </div>
                </div> 
                
                <div class="box-body">
                    @if(count($products) > 0)
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                        <th>#</th>
                                        <th>@lang('site.name')</th>
                                        <th>@lang('site.description')</th>
                                        <th>@lang('site.category')</th>
                                        <th>@lang('site.image')</th>
                                        <th>@lang('site.purchase_price')</th>
                                        <th>@lang('site.sale_price')</th>
                                        <th>@lang('site.profit_percent') %</th>
                                        <th>@lang('site.stock')</th>
                                        <th>@lang('site.controll')</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                    @foreach ($products as $index=>$product)
                                        <tr>
                                        <td>{{$index + 1}}</td>
                                        <td>{{$product->name}}</td>
                                        <td>{!!$product->description!!}</td>
                                        <td>{{ $product->category->name }}</td>
                                        <td><img src="{{ asset('image/upload/products/'.$product->image) }}" style="width: 100px"  class="img-thumbnail" alt=""></td>
                                        <td>{{$product->purchase_price}}</td>
                                        <td>{{$product->sale_price}}</td>
                                        <td>{{ $product->profit_percent }} %</td>
                                        <td>{{$product->stock}}</td>

                                        <td>
                                            @if (auth()->user()->hasPermission('update_products'))
                                                <a href="{{route('dashboard.products.edit',$product->id)}}" class="btn btn-primary" 
                                                    data-toggle="tooltip" data-placement="top" title="@lang('site.edit')">
                                                    <i class="fa fa-edit fa-1x"></i>
                                                </a>
                                            @else
                                                <a href="#" class="btn btn-info btn-sm disabled"><i class="fa fa-edit"></i> @lang('site.edit')</a>
                                            @endif
                                            @if (auth()->user()->hasPermission('delete_products'))
                                                <a href="{{route('dashboard.products.destroy',$product->id)}}"class="btn btn-danger" onclick="if(!confirm('@lang('site.confirm_delete_user')')) return false;" data-toggle="tooltip" data-placement="top" 
                                                    title="@lang('site.confirm_delete')">
                                                    <i class="fa fa-trash-o fa-1x"></i>
                                                </a>
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
        </div>    
    </div>
@endsection