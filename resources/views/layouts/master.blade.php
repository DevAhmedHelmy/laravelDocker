<!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <!-- CSRF Token -->
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <title>E-Shop</title>
            <!-- Tell the browser to be responsive to screen width -->
            <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" 
                name="viewport">
            <meta name="description" content="">
            <meta name="author" content="">
            <!-- Styles -->
            <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
            <!-- Font Awesome -->
            <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
            <!-- Ionicons -->
            <link href="{{ asset('css/imagehover.min.css') }}" rel="stylesheet">
            <link href="{{ asset('css/morris.css') }}" rel="stylesheet">
            <!-- Theme style -->
            <link href="{{ asset('css/style.css') }}" rel="stylesheet">
            <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
            <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
            <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
          <![endif]-->

            <!-- Google Font -->
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        </head>
        <body>
        @include('layouts.nav')
        <!-- Content Wrapper. Contains page content -->
        
            
            <section>
                <div class="container">
                @yield('content-header')
            </div>
            </section>
            
            <!-- Main content -->
            <section class="content container">
               <div class="container">
                
                @yield('content')
                
            </div>
            </section>
            <!-- /.content -->
        
        <!-- /.content-wrapper -->
      
        @extends('layouts.footer')
        <!-- jQuery 3 -->
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('js/popper.min.js') }}"></script>
        <script src="{{ asset('js/ckeditor.js') }}"></script>

        {{--morris --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="{{ asset('js/morris.min.js') }}"></script>
    </body>
</html>