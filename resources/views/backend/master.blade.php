<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Panel</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="{{url('/')}}/backend_assets/vendor/bootstrap/css/bootstrap.min.css">
    <!--Font Awesome CSS-->
    <link rel="stylesheet" href="{{url('/')}}/backend_assets/vendor/font-awesome/css/font-awesome.min.css">
    <!--Fontastic Custom icon font-->
    <link rel="stylesheet" href="{{url('/')}}/backend_assets/css/fontastic.css">
    <!--Google fonts - Roboto-->
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <!--jQuery Circle-->
    <link rel="stylesheet" href="{{url('/')}}/backend_assets/css/grasp_mobile_progress_circle-1.0.0.min.css">
    <!--Custom Scrollbar-->
    <link rel="stylesheet" href="{{url('/')}}/backend_assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
    <!--theme stylesheet-->
    <link rel="stylesheet" href="{{url('/')}}/backend_assets/css/style.default.css" id="theme-stylesheet">
    <!--Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{url('/')}}/backend_assets/css/custom.css">
    <!--Favicon-->
    <link rel="shortcut icon" href="{{url('/')}}/backend_assets/img/icon1.png">

    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

    @yield('header_css')

  </head>
  <body>
    <!-- Side Navbar -->
    <nav class="side-navbar">
      <div class="side-navbar-wrapper">
        <!-- Sidebar Header    -->
        <div class="sidenav-header d-flex align-items-center justify-content-center">
          <!-- User Info-->
          <div class="sidenav-header-inner text-center"><img src="@if(Auth::user()->profile_image != null) {{url(Auth::user()->profile_image)}} @endif" alt="person" class="img-fluid rounded-circle">
            <h2 class="h6">
                @if(Auth::user()->name != null)
                    {{Auth::user()->name}}
                @endif
            </h2>
            <span>
                {{Auth::user()->user_type}}
            </span>
          </div>
          <!-- Small Brand information, appears on minimized sidebar-->
          <div class="sidenav-header-logo"><a href="#" class="brand-small text-center"><strong class="text-primary">bh</strong></a></div>
        </div>
        <!-- Sidebar Navigation Menus-->
        <div class="main-menu">
          <h5 class="sidenav-heading">Control Panel</h5>
          <ul id="side-main-menu" class="side-menu list-unstyled">


             {{--  menu options for admin start  --}}
            @if(Auth::user()->user_type == "admin")
            <li><a href="{{url('Add/department')}}"> <i class="fas fa-user-md"></i>Department</a></li>
            <li><a href="#exampledropdownDropdown1" aria-expanded="false" data-toggle="collapse">  <i class="fas fa-users"></i>User's List</a>
                <ul id="exampledropdownDropdown1" class="collapse list-unstyled ">
                    <li><a href="{{url('doctor/list/for/admin')}}"><i class="fas fa-user-md"></i> Doctor's List <b class="text-success" style="font-weight:800">(</b></a></li>
                    <li><a href="{{url('patient/list')}}"><i class="fas fa-user-injured"></i> Patient's List <b class="text-info" style="font-weight:800">(</b></a></li>
                </ul>
            </li>
            <li><a href="#exampledropdownDropdown3" aria-expanded="false" data-toggle="collapse">  <i class="fas fa-users"></i>Homepage Setting</a>
                <ul id="exampledropdownDropdown3" class="collapse list-unstyled ">
                    <li><a href="{{url('about/page')}}"><i class="fas fa-user-md"></i> About Us <b class="text-success" style="font-weight:800">(</b></a></li>
                    
                </ul>
            </li>
            <li><a href="{{url('admin/register/page')}}"> <i class="fas fa-user-friends"></i>Admin Registration</a></li>
           
            <li><a href="{{url('doctor/list/pdf')}}"> <i class="fas fa-file-alt"></i>Doctor List PDF <b class="text-success" style="font-weight:800"></b></a></li>
            <li><a href="{{url('patient/list/pdf')}}"> <i class="far fa-file-alt"></i>Patient List PDF <b class="text-info" style="font-weight:800"></b></a></li>
            <li><a href="{{url('appoinment/list/pdf')}}"> <i class="far fa-file-alt"></i>Appoinment in PDF <b class="text-info" style="font-weight:800"></b></a></li>
            {{-- <li><a href="{{url('generate/pdf')}}"> <i class="fas fa-file-pdf"></i>Generate Report</a></li> --}}
            @endif

            {{--  menu options for Doctor start  --}}
            @if(Auth::user()->user_type == "doctor")

               
                <li><a href="{{url('my/doctor/profile')}}"> <i class="fas fa-user-md"></i>Doctor Profile</a></li>
                <?php
                    $date = date('Y-m-d H:i:s');
                    $current_date = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
                    $recent_approved = DB::table('appoinments')->where('doctor_id',Auth::user()->id)->where('status',1)->where('appoinment_date','>=',$current_date)->count();
                ?>
                <li><a href="{{url('recent/approved/appoinment/for/doctor')}}"> <i class="far fa-clock"></i>Recent Approved <span class="text-success"><h5>({{$recent_approved}})</h5></span></a></li>
                <?php
                    $date = date('Y-m-d H:i:s');
                    $current_date = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
                    $pending_appoinments = DB::table('appoinments')->where('doctor_id',Auth::user()->id)->where('status',0)->where('appoinment_date','>=',$current_date)->count();
                ?>
                <li><a href="{{url('pending/list/appoinment/for/doctor')}}"> <i class="fas fa-user-clock"></i>Pending List <span class="text-warning"><h5>({{$pending_appoinments}})</h5></span></a></li>
                <?php
                    $date = date('Y-m-d H:i:s');
                    $current_date = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
                    $Previous_Approved = DB::table('appoinments')->where('doctor_id',Auth::user()->id)->where('status',1)->where('appoinment_date','<',$current_date)->count();
                ?>
                <li><a href="{{url('previous/approved/appoinment/by/doctor')}}"> <i class="fas fa-history"></i>Previous Approved <span class="text-info"><h5>({{$Previous_Approved }})</h5></span></a></li>
                <?php
                    $date = date('Y-m-d H:i:s');
                    $current_date = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
                    $cancelled = DB::table('appoinments')->where('doctor_id',Auth::user()->id)->where('status',0)->where('appoinment_date','<',$current_date)->count();
                ?>
                <li><a href="{{url('cancelled/appoinment/by/doctor')}}"> <i class="far fa-calendar-times"></i>Cancelled List <span class="text-danger"><h5>({{$cancelled}})</h5></span></a></li>

            @endif



            {{--  menu options for patient start  --}}
            @if(Auth::user()->user_type == "patient")


                <li><a href="{{url('my/user/profile')}}"> <i class="fas fa-user-injured"></i>Patient Profile</a></li>

                <li><a href="{{url('take/doctor/appoinment')}}"> <i class="far fa-calendar-check"></i>Take an Appoinment</a></li>
                
                <li><a href="{{url('recent/approved/appoinment')}}"> <i class="far fa-clock"></i>Recent Approved <span class="text-success"><h5></h5></span></a></li>
               
                <li><a href="{{url('pending/list/appoinment')}}"> <i class="fas fa-user-clock"></i>Pending List <span class="text-warning"><h5></h5></span></a></li>
               
                <li><a href="{{url('previous/approved/appoinment')}}"> <i class="fas fa-history"></i>Previous Approved <span class="text-info"><h5></h5></span></a></li>
              
                <li><a href="{{url('cancelled/appoinment')}}"> <i class="far fa-calendar-times"></i>Cancelled List <span class="text-danger"><h5></h5></span></a></li>

            @endif


          </ul>
        </div>

      </div>
    </nav>
    <div class="page">
      <!-- navbar-->
      <header class="header">
        <nav class="navbar">
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <div class="navbar-header"><a id="toggle-btn" href="#" class="menu-btn"><i class="icon-bars"> </i></a><a href="{{url('/home')}}" class="navbar-brand">
                  <div class="brand-text d-none d-md-inline-block"><strong class="text-primary">Dashboard</strong></div></a></div>


              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">

                <!-- Log out-->
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>

              </ul>


            </div>
          </div>
        </nav>
      </header>



      @yield('content')



      <footer class="main-footer">
            <div class="container-fluid">
              <div class="row">
                <div class="col-sm-6">
                  <p>Your company &copy; 2020</p>
                </div>
              </div>
            </div>
          </footer>
        </div>
        <!-- JavaScript files-->
        <script src="{{url('/')}}/backend_assets/vendor/jquery/jquery.min.js"></script>
        <script src="{{url('/')}}/backend_assets/vendor/popper.js/umd/popper.min.js"> </script>
        <script src="{{url('/')}}/backend_assets/vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="{{url('/')}}/backend_assets/js/grasp_mobile_progress_circle-1.0.0.min.js"></script>
        <script src="{{url('/')}}/backend_assets/vendor/jquery.cookie/jquery.cookie.js"> </script>
        <script src="{{url('/')}}/backend_assets/vendor/chart.js/Chart.min.js"></script>
        <script src="{{url('/')}}/backend_assets/vendor/jquery-validation/jquery.validate.min.js"></script>
        <script src="{{url('/')}}/backend_assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
        <script src="{{url('/')}}/backend_assets/js/charts-home.js"></script>
        <!-- Main File-->
        <script src="{{url('/')}}/backend_assets/js/front.js"></script>

        @yield('footer_js')

        <script src="//kit.fontawesome.com/c218529370.js"></script>

        <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
        {!! Toastr::message() !!}

      </body>
    </html>
