@extends('dashboard.layouts.master')


@section('content')

<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="col-md-12 col-sm-12  ">
            <div class="x_panel">
                <div class="x_title">
                    <h2> Company Data</h2>
                    <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>

                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                     <p>company name : {{$company->name}}</p>
                     <p>@lang('admin.created_at') : {{$company->created_at}}</p>
                     <p>@lang('admin.updated_at') : {{$company->updated_at}}</p>

                </div>
            </div>
            </div>
        @if(count($company->products) > 0)
        <div class="col-md-12 col-sm-12  ">
            <div class="x_panel">
                <div class="x_title">
                    <h2> Company Products</h2>
                    <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>

                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>@lang('admin.id')</th>
                                <th>@lang('admin.product_code')</th>
                                <th>@lang('admin.name')</th>
                                <th>@lang('admin.purchase_price')</th>
                                <th>@lang('admin.sale_price')</th>
                                <th>@lang('admin.created_at')</th>
                                <th>@lang('admin.updated_at')</th>
                                <th>@lang('admin.controll')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($company->products as $product)
                                <tr>
                                    <th scope="row">{{$product->id}}</th>
                                    <td>{{$product->code}}</td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->purchase_price}}</td>
                                    <td>{{$product->sale_price}}</td>
                                    <td>{{$product->created_at}}</td>
                                    <td>{{$product->updated_at}}</td>

                                    <td>
                                         
                                        <a href="{{ route('dashboard.products.show', $product->id) }}" class="btn btn-info btn-sm" data-target='tooltip' title="{{ trans('admin.show') }}"><i class="fa fa-eye fa-sm"></i></a>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
            @else
            <h2>No Company product</h2>

            @endif
    </div>
</div>




@endsection
