<div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>نظام المخازن</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome</span>
                @if(Auth::check())
              <h2> {{Auth::user()->name}}</h2>

                @endif
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                {{-- <h3>General</h3> --}}
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> الرئيسية <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route('dashboard.welcome')}}">الاحصائيات</a></li>
                      <li><a href="#">الإعدادات</a></li>
                      <li><a href="#">الصلاحيات</a></li>

                    </ul>
                  </li>
                  <li><a><i class="fa fa-podcast" aria-hidden="true"></i> البيانات الاساسية <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        @if (\Auth::check() && auth()->user()->hasPermission('read_companies'))
                            <li><a href="{{route('dashboard.companies.index')}}"><i class="fa fa-building"></i> الشركات</a></li>
                        @endif
                        @if (\Auth::check() && auth()->user()->hasPermission('read_departments'))
                            <li><a href="{{route('dashboard.departments.index')}}"><i class="fa fa-list-alt"></i> الادارات </a></li>
                        @endif
                        @if (\Auth::check() && auth()->user()->hasPermission('read_jobs'))
                            <li><a href="{{route('dashboard.jobs.index')}}"><i class="fa fa-list-alt"></i> الوظائق </a></li>
                        @endif
                        @if (\Auth::check() && auth()->user()->hasPermission('read_categories'))
                            <li><a href="{{route('dashboard.categories.index')}}"><i class="fa fa-list-alt"></i> الاصناف </a></li>
                        @endif
                        @if (\Auth::check() && auth()->user()->hasPermission('read_products'))
                            <li><a href="{{route('dashboard.products.index')}}"><i class="fa fa-cart-plus"></i> المنتجات</a></li>
                        @endif
                      <li><a href="#"><i class="fa fa-gift"></i> عرض المبيعات</a></li>
                      {{-- <li><a href="#"><i class="fa fa-hourglass-half"></i> الالوان</a></li>
                      <li><a href="#"><i class="fa fa-university"></i> البنوك</a></li>
                      <li><a href="#"><i class="fa fa-credit-card"></i> اعدادات نوع البطاقة</a></li> --}}

                    </ul>
                  </li>
                  <li><a><i class="fa fa-users"></i> طاقم العمل <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route('dashboard.users.index')}}"> الموظفين</a></li>

                    </ul>
                  </li>

                  <li><a><i class="fa fa-users"></i> العملاء <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route('dashboard.clients.index')}}"> العملاء</a></li>
                      <li><a href="#">  حساب العملاء</a></li>


                    </ul>
                  </li>
                  <li><a><i class="fa fa-users"></i> الموردين <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route('dashboard.suppliers.index')}}"> الموردين</a></li>
                      <li><a href="#">  حساب الموردين</a></li>


                    </ul>
                  </li>
                  <li><a><i class="fa fa-users"></i> مندوبين المبيعات <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route('dashboard.SaleRepresentative.index')}}"> مندوبين المبيعات</a></li>
                      <li><a href="#">  حساب مندوبين المبيعات</a></li>


                    </ul>
                  </li>



                  <li><a><i class="fa fa-shopping-cart"></i> المشتريات <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="#">فاتورة المشتريات</a></li>
                      <li><a href="#">مردودات المشتريات</a></li>


                    </ul>
                  </li>

                  <li><a><i class="fa fa-list"></i> المبيعات <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="#">فاتورة المبيعات</a></li>
                      <li><a href="#">مردودات المبيعات</a></li>


                    </ul>
                  </li>



                  <li><a><i class="fa fa-building-o"></i> المخازن الرئيسية <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a> المخازن الرئيسية 1<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li class="sub_menu"><a href="level2.html">Level Two</a>
                            </li>
                            <li><a href="#level2_1">Level Two</a>

                            </li>
                            <li><a href="#level2_2">Level Two</a>
                            </li>
                          </ul>
                        </li>



                      <li>
                        <a>الفرعية<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li class="sub_menu"><a href="level2.html">Level Two</a>
                            </li>
                            <li><a href="#level2_1">Level Two</a>
                            </li>
                            <li><a href="#level2_2">Level Two</a>
                            </li>
                          </ul>
                        </li>

                    </ul>
                  </li>



                  <li><a><i class="fa fa-list"></i> التفارير <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="#">تقرير المشتريات </a></li>
                      <li><a href="#">تقرير المبيعات</a></li>

                    </ul>
                  </li>


                </ul>
              </div>


            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>
