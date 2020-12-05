<!doctype html>
<html lang="en">

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{url('/')}}/frontend_assets/assets_web/images/icons/Prescription.png"/>
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Online Appoinment</title>

    <!-- CSS -->
    <link href="{{url('/')}}/frontend_assets/assets_web/vendor/bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet" media="all">
    <link href="{{url('/')}}/frontend_assets/assets_web/css/animate.min.css" type="text/css" rel="stylesheet" media="all">
    <link href="{{url('/')}}/frontend_assets/assets_web/vendor/fontawesome/css/all.min.css" type="text/css" rel="stylesheet" media="all">
    <link href="{{url('/')}}/frontend_assets/assets_web/vendor/themify-icons/themify-icons.min.css" type="text/css" rel="stylesheet">
    <link href="{{url('/')}}/frontend_assets/assets_web/vendor/et-line-font/et-line.min.css" type="text/css" rel="stylesheet">
    <link href="{{url('/')}}/frontend_assets/assets_web/vendor/metismenu/metisMenu.min.css" type="text/css" rel="stylesheet">
    <link href="{{url('/')}}/frontend_assets/assets_web/vendor/malihu-scrollbar/jquery.mCustomScrollbar.min.css" rel="stylesheet" type="text/css">
    <link href="{{url('/')}}/frontend_assets/assets_web/vendor/OwlCarousel2/dist/assets/owl.carousel.min.css" rel="stylesheet" type="text/css">
    <link href="{{url('/')}}/frontend_assets/assets_web/vendor/OwlCarousel2/dist/assets/owl.theme.default.min.css" rel="stylesheet" type="text/css">
    <link href="{{url('/')}}/frontend_assets/assets_web/vendor/select2/dist/css/select2.min.css" type="text/css" rel="stylesheet">
    <link href="{{url('/')}}/frontend_assets/assets_web/vendor/select2/dist/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="{{url('/')}}/frontend_assets/assets_web/vendor/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css">
    <link href="{{url('/')}}/frontend_assets/assets_web/css/style.css" type="text/css" rel="stylesheet">
    <!-- <link href="https://bhospital.bdtask.com/assets_web/font/flaticon.css" type="text/css" rel="stylesheet"> -->

    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

    <link rel="stylesheet" type="text/css" href="{{url('/')}}/frontend_assets/assets_web/css/jquery.datetimepicker.min.css"/>

  </head>

  <body>
    <!-- header -->
    <header class="mainHeader">

      <!-- /.Top bar -->
      <div class="middBar">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-4 col-lg-3 col-xl-4">
              <div class="d-flex align-items-center logo-wrap">
                <div class="main-logo">
                  <a href="{{url('/')}}" class="headerLogo"><img src="{{url('/')}}/frontend_assets/assets_web/images/icons/medication-6-248420.png" width="100" height="100" alt=""></a>
                </div>
                <div class="order-md-first sidebar-toggle-btn">
                  <button type="button" id="sidebarCollapse" class="btn">
                    <i class="ti-menu"></i>
                  </button>
                </div>
              </div>
            </div>
            <div class="col-md-8 col-lg-9 col-xl-8 d-none d-md-block">
              <div class="d-flex justify-content-end">
                <div class="media helpInfo">
                  <div class="icon">
                    <i class="icon-clock "></i>
                  </div>
                  <div class="media-body">
                    <h6 class="mb-0 helpInfo-title">Saturday - Friday: 09:00AM - 09:00PM</h6>
                  </div>
                </div>
                <div class="media helpInfo">
                  <div class="icon">
                    <i class="icon-mobile"></i>
                  </div>
                  <div class="media-body">
                    <h6 class="mb-0">
                      (+88)-01704234500</h6>
                    <p class="subText">Contact Us For Help</p>
                  </div>
                </div>
                <div class="media helpInfo">
                  <div class="icon">
                    <i class="icon-map-pin "></i>
                  </div>
                  <div class="media-body">
                    <h6 class="mb-0">
                        Sector-4, Road-4, House-19,
                    </h6>Dhanmondi-1230, Dhaka</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.Middle bar -->
      <nav class="navbar navbar-expand-lg d-none d-lg-block header-sticky">
        <div class="container">
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav mr-auto">

              <!-- Parent menu -->
              <li class="nav-item  ">

                <a class="nav-link" href="{{url('/')}}">Home</a>

                <!-- Sub Menu -->
              </li>

               <li class="nav-item">

                <a class="nav-link" href="{{url('about/view/page')}}">About Us</a>

                <!-- Sub Menu -->
              </li>
              <li class="nav-item">

                <a class="nav-link" href="{{url('department/list')}}">Departments</a>

                <!-- Sub Menu -->
              </li>
              <li class="nav-item">

                <a class="nav-link" href="{{url('doctor/list')}}">Doctors</a>

                <!-- Sub Menu -->
              </li>

              <li class="nav-item">

                <a class="nav-link" href="{{url('/')}}">Contact Us</a>

                <!-- Sub Menu -->
              </li> 
              <!-- <li class="nav-item "> <a class="nav-link" href="patient_login.html">Patient Login</a> </li> -->

            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item nav-btn border-right">
                    <a class="nav-link js-scroll-trigger" href="{{url('home')}}">
                    <i class="icon-calendar"></i>View Appointment</a>
                </li>
                <li class="nav-item nav-btn">
                    <a class="nav-link js-scroll-trigger" href="{{url('home')}}">
                    <i class="icon-calendar"></i>Take Appointment</a>
                </li>
            </ul>
          </div>
        </div>
      </nav>

    </header>
    <!-- /.Main header -->

    <!-- main content -->
    <div class="content-wrapper">
      <!-- slider -->
      <div class="header-slider header-slider-preloader" id="header-slider">
        <div class="animation-slide owl-carousel owl-theme" id="animation-slide">
          <!-- Slide 1-->
          <div class="item" style="background-image: url({{url('/')}}/frontend_assets/assets_web/img/slider/f1891d1147537681a9e19ff2582a500f.jpg);">
            <div class="slide-table">
              <div class="slide-tablecell">
                <div class="container">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="slide-text text-center">
                        <h2>Feel Free to ask Something
                        </h2>
                        <p>We are provide best servises.</p>

                        @php
                        $departments=DB::table('departments')->take(4)->get();
                        @endphp

                    
                        <div class="service-icon d-flex justify-content-center">
                        @foreach($departments as $item)
                          <div class="icon-box" data-toggle="tooltip" data-placement="top" title="{{$item->department}}">
                            <i class="{{$item->icon}}"></i>
                          </div>
                  
                          @endforeach
                          
                          <a href="{{url('/department/list')}}" class="icon-box view-all">
                            <span>
                              <i class="ti-plus"></i>View all</span>
                          </a>
                        </div>
                      

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Slide 2-->
          <div class="item" style="background-image: url({{url('/')}}/frontend_assets/assets_web/img/slider/a40d2efb2b9f7b2e4ce7a109f630a11b.jpg);">
            <div class="slide-table">
              <div class="slide-tablecell">
                <div class="container">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="slide-text">
                        <h2>You are fatching Problem with your Health</h2>
                        <p>If you ar fatching problem, than contact with our Doctors.</p>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Slide 3-->
          <div class="item" style="background-image: url({{url('/')}}/frontend_assets/assets_web/img/slider/41b12160a0d26c64867f000c03a64a21.jpg);">
            <div class="slide-table">
              <div class="slide-tablecell">
                <div class="container">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="slide-text text-right">
                        <h2>Take an Appointment
                        </h2>
                        <p>We are provide 100% pure services.</p>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.End of slider -->
        <!-- Preloader -->
        <div class="slider_preloader">
          <div class="slider_preloader_status">&nbsp;</div>
        </div>
      </div>
      <!-- /.End of slider -->

    </div>
    <!-- about -->



    @yield('content')




    <footer class="main-footer footer-dark" id="contact_html">
        <div class="container">
        <div class="row">
        <div class="col-md-3">

        <div class="footer-des">
        <h3 class="footer-title">About Us</h3>
        @php
        $abouts=DB::table('abouts')->where('id',1)->first();
        @endphp
        <!--<img src="assets/img/logo.png" class="img-responsive footer-logo" alt="">-->
        <p class="des">
            {{$abouts->text}}
        </p>

        </div>

        </div>
        <div class="col-md-9">
        <div class="row">
        <div class="col-md-3">
        <div class="col-block">
        <h3 class="footer-title">Departments</h3>
        <ul class="footer-link list-unstyled">
            
            
                       @php
                        $departments=DB::table('departments')->get();
                        @endphp
        
           @foreach($departments as $item)

            <li>
              <a href="{{url('/doctor/by/deparmtent')}}/{{$item->id}}">{{$item->department}}</a>
            </li>
            @endforeach


       
        </ul>
        </div>
        </div>
        <div class="col-md-4">
        <div class="col-block">
        <h3 class="footer-title">Quick Links</h3>
        <ul class="footer-link list-unstyled quickLink">

        <li>
          <a href="{{url('/')}}">Home</a>
        </li>
        <li>
          <a href="{{url('/doctor/list')}}">Doctors</a>
        </li>
        <li>
          <a href="{{url('/department/list')}}">Departments</a>
        </li>

        </ul>
        </div>
        </div>
        <div class="col-md-5">
        <h3 class="footer-title">Contact Details</h3>
        <div class="addressLink">
        <p>
            Sector-4, Road-4, House-19, Dhanmondi-1230, Dhaka
        </p>
        <ul class="list-unstyled">
        <li>
          <i class="ti-mobile"></i>
          Phone No:
          <a href="">(+88)-01704234500</a>
        </li>
        <li>
          <i class="icon-mobile"></i>
          Text:
          <a href="#">
            01704234500</a>
        </li>
        <li>
          <i class="ti-email"></i>
          Email Address:
          <a href="demo%40hospital.html" class="linkUnderlined">
            <span class="__cf_email__" data-cfemail="ceaaaba3a18ea6a1bdbea7baafa2e0ada1a3">manikbadsha414@gmail.com</span></a>
        </li>

        </ul>

        </div>
        </div>
        </div>
        </div>
        </div>
        </div>
        </footer>
        <!-- /.footer -->
        {{--  <div class="sub-footer dark">
        <div class="container">
        <div class="row">
        <div class="col-md-7">
        <div class="coptText">
        <p>Copyright &copy; 2020-
        <a title="BDtask" href="#" target="_blank">PMS</a>&nbsp;.&nbsp;All rights reserved.</p>
        </div>
        </div>
        </div>
        </div>
        </div>  --}}
        <!-- ./footer -->
        <!-- ./sub footer -->

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script data-cfasync="false" src="cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
        <script src="{{url('/')}}/frontend_assets/assets_web/vendor/jquery/jquery-3.3.1.min.js"></script>
        <script src="{{url('/')}}/frontend_assets/assets_web/js/popper.min.js"></script>
        <script src="{{url('/')}}/frontend_assets/assets_web/vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="{{url('/')}}/frontend_assets/assets_web/vendor/metismenu/metisMenu.min.js"></script>
        <script src="{{url('/')}}/frontend_assets/assets_web/vendor/malihu-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
        <script src="{{url('/')}}/frontend_assets/assets_web/vendor/OwlCarousel2/dist/owl.carousel.min.js"></script>
        <script src="{{url('/')}}/frontend_assets/assets_web/vendor/select2/dist/js/select2.min.js"></script>
        <script src="{{url('/')}}/frontend_assets/assets_web/vendor/masonry/dist/masonry.pkgd.min.js"></script>
        <script src="{{url('/')}}/frontend_assets/assets_web/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
        <script src="{{url('/')}}/frontend_assets/assets_web/js/file-upload.js"></script>
        <script src="{{url('/')}}/frontend_assets/assets_web/js/jquery.easing.min.js"></script>
        <script src="{{url('/')}}/frontend_assets/assets_web/js/script.js"></script>
        <script type="text/javascript"></script>

        <script src="{{url('/')}}/frontend_assets/assets_web/js/jquery.datetimepicker.js"></script>

        @yield('footer_js')

        <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
        {!! Toastr::message() !!}

    </body>
    </html>
