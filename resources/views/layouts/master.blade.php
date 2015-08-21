<html class="" lang="en">

<head>

  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <meta name="description" content="Project Astronaut">

  <link rel="shortcut icon" href="../resources/assets/images/favicon.png" type="image/png">

  <title>Project Astronaut - Build 0.1 - @yield('pagetitle')</title>

  <link href="http://fonts.googleapis.com/css?family=Nothing+You+Could+Do" rel="stylesheet" type="text/css">

  <link href="../resources/assets/css/style.css" rel="stylesheet"> <!-- MANDATORY -->

  <link href="../resources/assets/css/theme.css" rel="stylesheet"> <!-- MANDATORY -->

  <link href="../resources/assets/css/ui.css" rel="stylesheet"> <!-- MANDATORY -->
    
  <link href="../resources/assets/css/custom.css" rel="stylesheet"> <!-- CUSTOM -->
    
  <link href="../resources/assets/customcss/page.css" rel="stylesheet">  <!-- PAGE CSS-->   

  <link href="../resources/assets/plugins/datatables/dataTables.min.css" rel="stylesheet">


  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->



  <script src="../resources/assets/plugins/modernizr/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    
     <!--<script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script> -->



</head>
<body class="fixed-topbar fixed-sidebar color-default theme-sdtl  sidefix">

  <section>


<!-- BEGIN SIDEBAR -->

      <div class="sidebar">

        <div class="logopanel">

          <h1><a href="dashboard.html">Astronaut</a></h1>

        </div>

        <div class="sidebar-inner">

          <div class="sidebar-top">
                <form action="#" method="post" class="searchform" id="search-results">

              <input type="text" class="form-control" name="keyword" placeholder="Search here...">

            </form>
              
            </div>

          <div class="menu-title">

            <span>Navigation</span> 

           

          </div>

          <ul class="nav nav-sidebar">

            

            <li class="sideitemb">

              <a href="dashboard"><i class="fa fa-home"></i><span>Dashboard</span> </a>


            </li>
               <li class="sideitemb">

              <a href="report-setup"><i class="fa fa-file-text"></i><span>Report Setup</span> </a>


            </li>
              <li class="sideitemb">

              <a href="company-view"><i class="fa fa-briefcase"></i><span>All Companies</span> </a>


            </li>
              <li class="sideitemb">


              <a href="new-company"><i class="fa fa-plus"></i><span>New Company</span> </a>



            </li>


          </ul>

          <div class="sidebar-widgets" style=""></div>

          <div class="sidebar-footer clearfix" style="">

            <a class="pull-left footer-settings" href="#" data-rel="tooltip" data-placement="top" data-original-title="Settings">

            <i class="icon-settings"></i></a>

        

          </div>

        </div>

      </div>

      <!-- END SIDEBAR -->
      
      <div class="main-content">

        <!-- BEGIN TOPBAR -->

        <div class="topbar">

              
          <div class="header-left">       <div class="topnav">

              <a class="menutoggle" href="#" data-toggle="sidebar-collapsed"><span class="menu__handle"><span>Menu</span></span></a>
              
              </div></div>

          <div class="header-right">

            <ul class="header-menu nav navbar-nav">


              <!-- BEGIN USER DROPDOWN -->

              <li class="dropdown" id="user-header">

                <a href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">


                <span class="username">Hi,</span>

                </a>

                <ul class="dropdown-menu">

                  <li>

                    <a href="#"><i class="icon-user"></i><span>My Profile</span></a>

                  </li>

                  <li>

                    <a href="#"><i class="icon-calendar"></i><span>My Calendar</span></a>

                  </li>

                  <li>

                    <a href="#"><i class="icon-settings"></i><span>Account Settings</span></a>

                  </li>

                  <li>

                    <a href="includes/logout.php"><i class="icon-logout"></i><span>Logout</span></a>

                  </li>

                </ul>

              </li>

              <!-- END USER DROPDOWN -->

              <!-- CHAT BAR ICON -->

      

            </ul>

          </div>

          <!-- header-right -->

            </div>

        <!-- END TOPBAR -->
        
        <div class="page-content">

			@yield('content')

		</div>
 <!-- END PAGE CONTENT -->

      </div>

      <!-- END MAIN CONTENT -->

    </section>



<div id="morphsearch" class="morphsearch">



      <form class="morphsearch-form">

        <input class="morphsearch-input" type="search" placeholder="Search...">

        <button class="morphsearch-submit" type="submit">Search</button>

      </form>

      <div class="morphsearch-content withScroll mCustomScrollbar _mCS_5" style="height: auto;"><div class="mCustomScrollBox mCS-light" id="mCSB_5" style="position:relative; height:100%; overflow:hidden; max-width:100%;"><div class="mCSB_container mCS_no_scrollbar" style="position: relative; top: 0px;">

       

      </div><div class="mCSB_scrollTools" style="position: absolute; display: none;"><div class="mCSB_draggerContainer"><div class="mCSB_dragger" style="position: absolute; top: 0px;" oncontextmenu="return false;"><div class="mCSB_dragger_bar" style="position:relative;"></div></div><div class="mCSB_draggerRail"></div></div></div></div></div>

      <!-- /morphsearch-content -->

      <span class="morphsearch-close"></span>

    </div>

<!-- Preloader -->

<div class="loader-overlay">

  <div class="spinner">

    <div class="bounce1"></div>

    <div class="bounce2"></div>

    <div class="bounce3"></div>

  </div>

</div>

<a href="#" class="scrollup"><i class="fa fa-angle-up"></i></a>

<script src="../resources/assets/plugins/jquery/jquery-1.11.1.min.js"></script>

<script src="../resources/assets/plugins/jquery/jquery-migrate-1.2.1.min.js"></script>

<script src="../resources/assets/plugins/gsap/main-gsap.min.js"></script> <!-- HTML Animations -->

<script src="../resources/assets/plugins/jquery-ui/jquery-ui-1.11.2.min.js"></script>

<script src="../resources/assets/plugins/jquery-block-ui/jquery.blockUI.min.js"></script> <!-- simulate synchronous behavior when using AJAX -->

<script src="../resources/assets/plugins/bootbox/bootbox.min.js"></script>

<script src="../resources/assets/plugins/mcustom-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script> <!-- Custom Scrollbar sidebar -->

<script src="../resources/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<script src="../resources/assets/plugins/bootstrap-dropdown/bootstrap-hover-dropdown.min.js"></script> <!-- Show Dropdown on Mouseover -->

<script src="../resources/assets/plugins/bootstrap-progressbar/bootstrap-progressbar.min.js"></script> <!-- Animated Progress Bar -->

<script src="../resources/assets/plugins/switchery/switchery.min.js"></script> <!-- IOS Switch -->

<script src="../resources/assets/plugins/charts-sparkline/sparkline.min.js"></script> <!-- Charts Sparkline -->

<script src="../resources/assets/plugins/retina/retina.min.js"></script>  <!-- Retina Display -->

<script src="../resources/assets/plugins/jquery-cookies/jquery.cookies.js"></script> <!-- Jquery Cookies, for theme -->

<script src="../resources/assets/plugins/bootstrap/js/jasny-bootstrap.min.js"></script> <!-- File Upload and Input Masks -->

<script src="../resources/assets/plugins/select2/select2.min.js"></script> <!-- Select Inputs -->

<script src="../resources/assets/plugins/bootstrap-tags-input/bootstrap-tagsinput.min.js"></script> <!-- Select Inputs -->

<script src="../resources/assets/plugins/bootstrap-loading/lada.min.js"></script> <!-- Buttons Loading State -->

<script src="../resources/assets/plugins/timepicker/jquery-ui-timepicker-addon.min.js"></script> <!-- Time Picker -->

<script src="../resources/assets/plugins/multidatepicker/multidatespicker.min.js"></script> <!-- Multi dates Picker -->

<script src="../resources/assets/plugins/colorpicker/spectrum.min.js"></script> <!-- Color Picker -->

<script src="../resources/assets/plugins/touchspin/jquery.bootstrap-touchspin.min.js"></script> <!-- A mobile and touch friendly input spinner component for Bootstrap -->

<script src="../resources/assets/plugins/autosize/autosize.min.js"></script> <!-- Textarea autoresize -->

<script src="../resources/assets/plugins/icheck/icheck.min.js"></script> <!-- Icheck -->

<script src="../resources/assets/plugins/bootstrap-editable/js/bootstrap-editable.min.js"></script> <!-- Inline Edition X-editable -->

<script src="../resources/assets/plugins/bootstrap-context-menu/bootstrap-contextmenu.min.js"></script> <!-- File Upload and Input Masks -->

<script src="../resources/assets/plugins/prettify/prettify.min.js"></script> <!-- Show html code -->

<script src="../resources/assets/plugins/slick/slick.min.js"></script> <!-- Slider -->

<script src="../resources/assets/plugins/countup/countUp.min.js"></script> <!-- Animated Counter Number -->

<script src="../resources/assets/plugins/noty/jquery.noty.packaged.min.js"></script>  <!-- Notifications -->

<script src="../resources/assets/plugins/backstretch/backstretch.min.js"></script> <!-- Background Image -->

<script src="../resources/assets/plugins/charts-chartjs/Chart.min.js"></script>  <!-- ChartJS Chart -->

<script src="../resources/assets/plugins/bootstrap-slider/bootstrap-slider.js"></script> <!-- Bootstrap Input Slider -->

<script src="../resources/assets/plugins/visible/jquery.visible.min.js"></script> <!-- Visible in Viewport -->

<script src="../resources/assets/js/builder.js"></script>

<script src="../resources/assets/js/sidebar_hover.js"></script>

<script src="../resources/assets/js/application.js"></script> <!-- Main Application Script -->

<script src="../resources/assets/js/plugins.js"></script> <!-- Main Plugin Initialization Script -->

<script src="../resources/assets/js/widgets/notes.js"></script>

<script src="../resources/assets/js/quickview.js"></script> <!-- Quickview Script -->

<script src="../resources/assets/js/pages/search.js"></script> <!-- Search Script -->

<!-- BEGIN PAGE SCRIPTS -->

<script src="../resources/assets/plugins/datatables/jquery.dataTables.min.js"></script> <!-- Tables Filtering, Sorting & Editing -->

<script src="../resources/assets/plugins/summernote/summernote.js"></script>

<script src="../resources/assets/plugins/skycons/skycons.js"></script>

<script src="../resources/assets/plugins/simple-weather/jquery.simpleWeather.min.js"></script>

<script src="../resources/assets/js/widgets/widget_weather.js"></script>

<script src="../resources/assets/js/widgets/todo_list.js"></script>

<script src="../resources/assets/customjs/table_editable.js"></script>

<script src="../resources/assets/customjs/global.js"></script>

@yield('pagejs')

<!-- END PAGE SCRIPTS -->

</body>

</html>