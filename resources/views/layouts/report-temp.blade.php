<html lang="en">

<head>

  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <meta name="description" content="Project Astronaut">
    
  <meta name="csrf_token" content="{{ csrf_token() }}" />     

  <link rel="shortcut icon" href="../resources/assets/images/favicon.png" type="image/png">

  <title>Project Astronaut - Build 0.1 - @yield('pagetitle')</title>

  <link href="http://fonts.googleapis.com/css?family=Nothing+You+Could+Do" rel="stylesheet" type="text/css">

  <link href="../resources/assets/css/style.css" rel="stylesheet"> <!-- MANDATORY -->

  <link href="../resources/assets/css/theme.css" rel="stylesheet"> <!-- MANDATORY -->

  <link href="../resources/assets/css/ui.css" rel="stylesheet"> <!-- MANDATORY -->
    
  <link href="../resources/assets/css/custom.css" rel="stylesheet"> <!-- CUSTOM -->
    
  <link href="../resources/assets/customcss/report.css" rel="stylesheet">  <!-- PAGE CSS-->   

  <link href="../resources/assets/plugins/datatables/dataTables.min.css" rel="stylesheet">


  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <script src="../resources/assets/plugins/modernizr/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    
     <!--<script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script> -->



</head> 
<body class="fixed-topbar fixed-sidebar color-default theme-sdtl  sidefix">
    <script>
  dataLayer = [

    ];
    </script>
    <!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-PQKN3J"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PQKN3J');</script>
<!-- End Google Tag Manager -->
@yield('passdata')
    <div id="authcover"></div>   
  <section>

 <div id="reporthead">
        <div style="float:left;">
          <h1>Astronaut</h1>
        </div>
        <div style="float:right">
            <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#inviteModal"><i class="fa fa-paper-plane" style="padding-right:8px;"></i>Invite</button></div>
        <div class="fixer"></div>
</div>


      <!-- END SIDEBAR -->
      
      <!--popup invite-->
      <div class="modal fade" id="inviteModal" tabindex="-1" role="dialog" aria-hidden="true" >
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icons-office-52"></i></button>
        <h4 class="modal-title"><strong>Send</strong>Invitation</h4>
      </div>
      <div class="modal-body">
          <div class="invitebox">
              <p>Spread The Word.<br/>
Awesome, you're almost ready to invite the rest of your dream team to view the report. Fill out the short form below and we'll deliver it lightning speed!
</p><br/>
        <form>
            <label>The full name of the people you want to invire:</label>
    <input type="text" name="invite_name" id="invite_name" class="form-control form-white" >
            <label>The title of this person in your company:</label>
    <input type="text" name="invite_title" id="invite_title" class="form-control form-white" >
            <label>The email you want to invite:</label>
    <input type="email" name="invite_email" id="invite_email" class="form-control form-white" required>
            <label>Message:</label>
            <textarea type="text" name="invite_msg" id="invite_msg" class="form-control form-white" rows="3" ></textarea>
            <div style="text-align:right;margin-top:20px;">
    <input type="submit" value="Send" name="submitinvite"  class="btn btn-dark">
            </div>
              </form>
          </div></div>
      <!--<div class="modal-footer">
        <button type="button" class="btn btn-default btn-embossed" data-dismiss="modal">Close</button>
      </div>-->
    </div>
  </div>
</div>
      
      <!--popup verify-->
      
      <div class="modal fade" id="verifyModal" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        
        <h4 class="modal-title"><strong>Verify</strong>Information</h4>
      </div>
      <div class="modal-body">
          <div class="invitebox">
            <p>Whoops, We Don’t Recognize Your Device Or Browser! </p>
              <form>
            <label>Please Enter Your Email for Validation</label>
    <input type="email" name="verify_email" id="verify_email" class="form-control form-white" >
            <p id="verifyalert"></p>
            <div style="text-align:right;margin-top:20px;">
    <input type="submit" value="Verify" name="verify"  class="btn btn-dark">
            </div>
              </form>
          </div></div>
      <!--<div class="modal-footer">
        <button type="button" class="btn btn-default btn-embossed" data-dismiss="modal">Close</button>
      </div>-->
    </div>
  </div>
</div>
      
      <!--popup new-->
      
      <div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        
        <h4 class="modal-title"><strong>New</strong>Visitor</h4>
      </div>
      <div class="modal-body">
          <div class="invitebox">
            <p>You seem to be new to our site but boy, we are glad to see you! We’ve got some exciting content prepared for you but first, we need you to fill out the short form below.</p>
              <form>
            <label>Email</label>
    <input type="email" name="new_email" id="mew_email" class="form-control form-white" >
                  
                  <label>Full Name</label>
    <input type="text" name="new_name" id="new_name" class="form-control form-white" >
                  
                  <label>Title in the Company</label>
    <input type="text" name="new_title" id="new_title" class="form-control form-white" >
        
            <div style="text-align:right;margin-top:20px;">
    <input type="submit" value="Verify" name="newsubmit"  class="btn btn-dark">
            </div>
              </form>

          </div></div>
      <!--<div class="modal-footer">
        <button type="button" class="btn btn-default btn-embossed" data-dismiss="modal">Close</button>
      </div>-->
    </div>
  </div>
</div>
      
      <!--popup done-->
      
      <div class="modal fade" id="doneModal" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        
        <h4 class="modal-title"><strong>New</strong>Visitor</h4>
      </div>
      <div class="modal-body">
          <div class="invitebox">
            <p>Congrats, You’re All Done!</p>
              <p>You will receive an email with your visit link very shortly. We are launching you back to the Astronaut site in <span id="countdown">3</span> seconds.</p>
          </div></div>
      <!--<div class="modal-footer">
        <button type="button" class="btn btn-default btn-embossed" data-dismiss="modal">Close</button>
      </div>-->
    </div>
  </div>
</div>
      
<!--main content-->      
      
      
<div class="main-content report-main" style="margin-left:0px;min-height:500px;">
            <div class="page-content" style="margin:0px;padding-top:70px;">
                <!-- PAGE CONTENT -->
                <div class="row report-tank">
                    <div class="col-md-3">
                        <div style="position:relative;">
                        <div class="grade">
                            <div class="gradebox">
                                <div class="gradecontent">
                                    <div style="height:100%;">
                                    <div class="grademain">
                                        <div style="font-size: 70px;color: rgba(255,255,255,0.9);">@yield('grade')</div>
                                        <div style="font-size:17px;">Grade</div>
                                    </div>
                                    </div>
                                </div>
                                     
                            </div>
                        </div>
                        <div class="cinfo">
                        <div class="panel cinfop">
                            @yield('company')
                        </div>
                        <div class="panel cinfopm">
                          <div class="panel-heading">
                            <h4>
                              <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                              @yield('companymname')
                              </a>
                            </h4>
                          </div>
                          <div id="collapseOne" class="panel-collapse collapse">
                            <div class="panel-body">
                             @yield('companym')
                            </div>
                          </div>
                        </div>
                        </div>
                        <div class="fixer"></div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-6 report-core">
                                <div class="panel">
                                    <div class="panel-header">
                                        <h3>Unnatural Linking - <strong>@yield('quad1-level')</strong></h3>
                                    </div>
                                    <div class="panel-content">
                                        @yield('quad1')
                                    </div>
                                </div>
                                <div class="panel">
                                    <div class="panel-header">
                                        <h3>Spam Score - <strong>@yield('quad2-level')</strong></h3>
                                    </div>
                                    <div class="panel-content">
                                        @yield('quad2')
                                    </div>
                            </div>
                            </div>
                            <div class="col-md-6 report-core">
                                <div class="panel">
                                    <div class="panel-header">
                                        <h3>Trust Metrics - <strong>@yield('quad3-level')</strong></h3>
                                    </div>
                                    <div class="panel-content">
                                        @yield('quad3')
                                    </div>
                                </div>
                                <div class="panel">
                                    <div class="panel-header">
                                        <h3>Link Popularity and Visibility - <strong>@yield('quad4-level')</strong></h3>
                                    </div>
                                    <div class="panel-content">
                                        @yield('quad4')
                                    </div>
                            </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>



 <!-- END PAGE CONTENT -->

      </div>

      <!-- END MAIN CONTENT -->

    </section>



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

@yield('pagejs')

<!-- END PAGE SCRIPTS -->

</body>

</html>