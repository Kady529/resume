
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="theme/production/images/logo_enabel.png" type="image"/>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <title>Sanita </title>

    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300&display=swap" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="{{ asset('theme/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('theme/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('theme/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ asset('theme/vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="{{ asset('theme/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{ asset('theme/vendors/jqvmap/dist/jqvmap.min.css')}}" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="{{ asset('theme/vendors/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="{{ asset('theme/build/css/custom.min.css') }}" rel="stylesheet">
    <!-- Ion.RangeSlider -->
    <link href="{{ asset('theme/vendors/normalize-css/normalize.css')}}" rel="stylesheet">
    <link href="{{ asset('theme/vendors/ion.rangeSlider/css/ion.rangeSlider.css')}}" rel="stylesheet">
    <link href="{{ asset('theme/vendors/ion.rangeSlider/css/ion.rangeSlider.skinFlat.css')}}" rel="stylesheet">
    <link href="{{ asset('theme/ion.rangeSlider/css/ion.rangeSlider.css')}}" rel="stylesheet">
    <!-- Bootstrap Colorpicker -->
    <link href="{{ asset('theme/vendors/widget.css')}}" rel="stylesheet">
    <link href="{{ asset('theme/vendors/theme.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('theme/vendors/rSlider.min.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title">
              <a href="index.html" class="site_title">
                <img src="theme/production/images/logo_enabel.png" alt="" class="pull-left" width=90px height=80px>
                <span>Sanita</span>
              </a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="theme/production/images/user.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bienvenue,</span>
                  @if(Auth::check())
                    <h2>{{ Auth::user()->name}}</h2>
                  @endif
              </div>
            </div>
            <!-- /menu profile quick info -->
            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Differents indicateurs</h3>
                <ul class="nav side-menu">
                  <li><a href="{{ Route('home')}}"><i class="fa fa-home"></i> Accueil </a>
                    <li><a href="{{ Route('ztt')}}"><i class="fa fa-recycle"></i> Gestion des dechets </a>
                    <li><a href=""><i class="fa fa-hand-grab-o"></i> Renforcement de Capacit?? </a>
                    <li><a href="{{ Route('voiries')}}"><i class="fa fa-resistance"></i> Voiries </a>
                  <li><a href="{{ Route('sensibilisation')}}"><i class="fa fa-users"></i> Sensibilisation </a>
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
            <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                      @if(Auth::check())
                          <h2>{{ Auth::user()->name }}</h2>
                      @endif
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item"  href="{{route('login') }}"><i class="fa fa-sign-in pull-right"></i> Connexion</a>
                      <a class="dropdown-item"  href="{{route('logout') }}"><i class="fa fa-sign-out pull-right"></i> D??connexion</a>
                  </div>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->
        <!-- page content -->
        <div class="right_col" role="main">
           @yield('contenu')
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('theme/vendors/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('theme/vendors/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{ asset('theme/vendors/fastclick/lib/fastclick.js')}}"></script>
    <!-- NProgress -->
    <script src="{{ asset('theme/vendors/nprogress/nprogress.js')}}"></script>
    <!-- Chart.js')}} -->
    <script src="{{ asset('theme/vendors/Chart.js/dist/Chart.min.js')}}"></script>
    <!-- gauge.js')}} -->
    <script src="{{ asset('theme/vendors/gauge.js/dist/gauge.min.js')}}"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{ asset('theme/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
    <!-- iCheck -->
    <script src="{{ asset('theme/vendors/iCheck/icheck.min.js')}}"></script>
    <!-- Skycons -->
    <script src="{{ asset('theme/vendors/skycons/skycons.js')}}"></script>
    <!-- Flot -->
    <script src="{{ asset('theme/vendors/Flot/jquery.flot.js')}}"></script>
    <script src="{{ asset('theme/vendors/Flot/jquery.flot.pie.js')}}"></script>
    <script src="{{ asset('theme/vendors/Flot/jquery.flot.time.js')}}"></script>
    <script src="{{ asset('theme/vendors/Flot/jquery.flot.stack.js')}}"></script>
    <script src="{{ asset('theme/vendors/Flot/jquery.flot.resize.js')}}"></script>
    <!-- Flot plugins -->
    <script src="{{ asset('theme/vendors/flot.orderbars/js/jquery.flot.orderBars.js')}}"></script>
    <script src="{{ asset('theme/vendors/flot-spline/js/jquery.flot.spline.min.js')}}"></script>
    <script src="{{ asset('theme/vendors/flot.curvedlines/curvedLines.js')}}"></script>
    <!-- DateJS -->
    <script src="{{ asset('theme/vendors/DateJS/build/date.js')}}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('theme/vendors/jqvmap/dist/jquery.vmap.js')}}"></script>
    <script src="{{ asset('theme/vendors/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
    <script src="{{ asset('theme/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')}}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{ asset('theme/vendors/moment/min/moment.min.js')}}"></script>
    <script src="{{ asset('theme/vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{asset('theme/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{ asset('theme/build/js/custom.min.js')}}"></script>

    <script src="{{ asset('theme/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('theme/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{ asset('theme/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{ asset('theme/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
    <script src="{{ asset('theme/vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
    <script src="{{ asset('theme/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{ asset('theme/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{ asset('theme/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
    <script src="{{ asset('theme/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
    <script src="{{ asset('theme/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset('theme/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
    <script src="{{ asset('theme/vendors/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>
    <script src="{{ asset('theme/vendors/jszip/dist/jszip.min.js')}}"></script>
    <script src="{{ asset('theme/vendors/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{ asset('theme/vendors/pdfmake/build/vfs_fonts.js')}}"></script>
    <!-- Ion.RangeSlider -->
    <script src="{{ asset('theme/ion.rangeSlider/js/ion.rangeSlider.js')}}"></script>
    <script src="{{ asset('theme/vendors/widget.js')}}"></script>
    <script src="{{ asset('theme/vendors/rSlider.min.js')}}"></script>



  </body>
</html>
