@include('dashboard.layouts._header')
<body class="nav-md">
    <div class="container body">
      <div class="main_container">


         @include('dashboard.layouts._sidebar')

        <!-- top navigation -->
        @include('dashboard.layouts._nav')
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            @include('dashboard.layouts.errors')
             @yield('content')




          </div>
        <!-- /page content -->
        <!-- Start Footer area-->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap dashboard Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

@include('dashboard.layouts._footer')
<!-- End Footer area-->
