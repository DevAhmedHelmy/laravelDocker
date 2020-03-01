@extends('dashboard.layouts.master')
@section('header')
    <div class="col-sm-6">
            <h3 class="m-0 text-dark">{{ trans('admin.users') }}</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">{{ trans('admin.dashboard') }}</a></li>
              <li class="breadcrumb-item active">{{ trans('admin.users') }}</li>
            </ol>
          </div><!-- /.col -->
@endsection
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Users</h3>
    </div>
    <div class="card-body">

            {{ $dataTable->table([ 'class' => 'table table-bordered table-hover dataTable'], true) }}


    </div>






@include('dashboard.users.confirmModal')
</div>

@push('js')

<script>deleteAll();</script>
{!! $dataTable->scripts() !!}

@endpush
@endsection
