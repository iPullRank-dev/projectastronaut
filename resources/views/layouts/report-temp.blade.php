<html lang="en">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <meta name="description" content="Project Astronaut">

    <meta name="csrf_token" content="{{ csrf_token() }}" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="shortcut icon" href="../resources/assets/images/favicon.png" type="image/png">

    <title>Project Astronaut - Build 0.1 - {{$companyinfo[0]->fc_company_name}}</title>

    <link href="http://fonts.googleapis.com/css?family=Nothing+You+Could+Do" rel="stylesheet" type="text/css">

    <link href="../resources/assets/css/style.css" rel="stylesheet">
    <!-- MANDATORY -->

    <link href="../resources/assets/css/theme.css" rel="stylesheet">
    <!-- MANDATORY -->

    <link href="../resources/assets/css/ui.css" rel="stylesheet">
    <!-- MANDATORY -->

    <link href="../resources/assets/css/custom.css" rel="stylesheet">
    <!-- CUSTOM -->

    <link href="../resources/assets/customcss/report.css" rel="stylesheet">
    <!-- PAGE CSS-->

    <link href="../resources/assets/plugins/datatables/dataTables.min.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <script src="../resources/assets/plugins/modernizr/modernizr-2.6.2-respond-1.1.0.min.js"></script>

    <!--<script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script> -->

    @yield('customcode')

</head>

<body class="fixed-topbar fixed-sidebar color-default theme-sdtl  sidefix">
    <script>
        dataLayer = [

    ];
    </script>
    <!-- Google Tag Manager -->
    <noscript>
        <iframe src="//www.googletagmanager.com/ns.html?id=GTM-PQKN3J" height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>
    <script>
        (function (w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                '//www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-PQKN3J');
    </script>
    <!-- End Google Tag Manager -->
    @yield('passdata')
    <div id="authcover"></div>
    <section>

        <div id="reporthead">
            <div style="float:left;">
                <h1><img src="../resources/assets/images/logo/black.png" width="120px" height="40px"></a>
</h1>
            </div>
            <div style="float:right">
                <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#inviteModal"><i class="fa fa-paper-plane" style="padding-right:8px;"></i>Invite</button>
            </div>
            <div class="fixer"></div>
        </div>


        <!-- END SIDEBAR -->

        <!--popup invite-->
        <div class="modal fade" id="inviteModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icons-office-52"></i></button>
                        <h4 class="modal-title"><strong>Send</strong>Invitation</h4>
                    </div>
                    <div class="modal-body">
                        <div class="invitebox">
                            <p>Awesome, you’re almost ready to invite a friend to view the report. Fill out the short form below and we’ll deliver it at lightning speed!</p>
                            <br/>
                            <form>
                                <label>Name of the person you’d like to invite:</label>
                                <input type="text" name="invite_name" id="invite_name" class="form-control form-white" required data-required="true">
                                <label>This person’s company title:</label>
                                <input type="text" name="invite_title" id="invite_title" class="form-control form-white">
                                <label>Her/His email address:</label>
                                <input type="email" name="invite_email" id="invite_email" class="form-control form-white" required data-required="true" data-email="true">
                                <label>Message (optional):</label>
                                <textarea type="text" name="invite_msg" id="invite_msg" class="form-control form-white" rows="3"></textarea>
                                <div class="alert alert-danger" role="alert">
                                    <ul></ul>
                                </div>
                                <div style="text-align:right;margin-top:20px;">
                                    <input id="inviteTrack" type="submit" value="Send" name="submitinvite" class="btn btn-dark">
                                </div>
                            </form>
                        </div>
                    </div>
                    <!--<div class="modal-footer">
        <button type="button" class="btn btn-default btn-embossed" data-dismiss="modal">Close</button>
      </div>-->
                </div>
            </div>
        </div>

        <!-- invite confirm-->

        <div class="modal fade" id="inviteConfirm" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icons-office-52"></i></button>
                        <h4 class="modal-title"><strong>Invitation</strong>Sent</h4>
                    </div>
                    <div class="modal-body">

                        <div class="confirm-icon"><i class="fa fa-check-circle"></i></div>
                        <div class="confirm-msg">Your invitation is on the way!</div>
                    </div>
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
                            <p>Whoops! We don’t recognize your device. </p>
                            <form>
                                <label>Please enter your email for access.</label>
                                <input type="email" name="verify_email" id="verify_email" class="form-control form-white">
                                <p id="verifyalert"></p>
                                <div style="text-align:right;margin-top:20px;">
                                    <input type="submit" value="Verify" name="verify" class="btn btn-dark">
                                </div>
                            </form>
                        </div>
                    </div>
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
                            <p>You seem to be new to our site, but boy, are we glad to see you! We’ve got some exciting content prepared for you, but first, we just need some quick info to customize your report.</p>
                            <form>
                                <label>Email</label>
                                <input type="email" name="new_email" id="mew_email" class="form-control form-white" required data-required="true" data-email="true">

                                <label>Full Name</label>
                                <input type="text" name="new_name" id="new_name" class="form-control form-white" required data-required="true">

                                <label>Company Title</label>
                                <input type="text" name="new_title" id="new_title" class="form-control form-white">
                                <div class="alert alert-danger" role="alert">
                                    <ul></ul>
                                </div>
                                <div style="text-align:right;margin-top:20px;">
                                    <input type="submit" value="Back" name="newback" class="btn btn-dark">
                                    <input type="submit" value="Verify" name="newsubmit" class="btn btn-dark">
                                </div>
                            </form>

                        </div>
                    </div>
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
                        </div>
                    </div>
                    <!--<div class="modal-footer">
        <button type="button" class="btn btn-default btn-embossed" data-dismiss="modal">Close</button>
      </div>-->
                </div>
            </div>
        </div>


        <!--popup contact-->

        <div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog ">
                <div class="modal-content">
                    
                                        <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icons-office-52"></i></button>
                        <h4 class="modal-title"><strong>Contact</strong>Us</h4>
                    </div>
                    <div class="modal-body">

                        <form name="insightly_web_to_lead" action="https://upnx0cdb.insight.ly/WebToLead/Create" method="post" target="_blank" id="contactForm-{{$companyinfo[0]->id}}" class="insightlyForm">
                            <input type="hidden" name="formId" value="H+SstglQZgGtzp2OFmhFhQ==" />
                            <label for="insightly_firstName">First Name: *</label>
                            <input id="insightly_FirstName" name="FirstName" type="text" required class="form-control form-white"/>
                            <br/>
                            <label for="insightly_lastName">Last Name: *</label>
                            <input id="insightly_LastName" name="LastName" type="text" class="form-control form-white" required/>
                            <br/>
                            <label for="insightly_organization">Organization: </label>
                            <input id="insightly_Organization" name="OrganizationName" type="text" class="form-control form-white"/>
                            <br/>
                            <label for="email">Email: *</label>
                            <input id="insightly_Email" name="email" type="email" required class="form-control form-white"/>
                            <br/>
                            <label for="phone">Phone: </label>
                            <input id="insightly_Phone" name="phone" type="text" class="form-control form-white"/>
                            <br/>
                            <input type="hidden" id="insightly_ResponsibleUser" name="ResponsibleUser" value="816681" />
                            <br/>
                            <input type="hidden" id="insightly_LeadSource" name="LeadSource" value="624937" />
                            <span>Fields with * are required.</span>
                            <div style="text-align:right;margin-top:20px;">
                            <input type="submit" value="Submit" class="btn btn-dark"/>
                            </div>
                        </form>
                    </div>
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
                                                <div class="rank">
                                                    <span style="color:rgba(0,0,0,0.3)">Overall Rank: @yield('rank')<a id="therank" href="#" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="bottom" data-content="To view the full ranking list of all the reports in our database, click <a href='#'>here</a>"><i class="fa fa-question-circle" aria-hidden="true"></i></a></span>
                                                </div>
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
                                        <h3>Unnatural Linking - <strong>@yield('unnatural_link-level')</strong></h3>
                                    </div>
                                    <div class="panel-content">
                                        @yield('unnatural_link')
                                    </div>
                                </div>
                                <div class="panel">
                                    <div class="panel-header">
                                        <h3>Spam Score - <strong>@yield('spam_score-level')</strong></h3>
                                    </div>
                                    <div class="panel-content">
                                        @yield('spam_score')
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 report-core">
                                <div class="panel">
                                    <div class="panel-header">
                                        <h3>Trust Metrics - <strong>@yield('trust_metrics-level')</strong></h3>
                                    </div>
                                    <div class="panel-content">
                                        @yield('trust_metrics')
                                    </div>
                                </div>
                                <div class="panel">
                                    <div class="panel-header">
                                        <h3>Link Popularity and Visibility - <strong>@yield('link_popularity-level')</strong></h3>
                                    </div>
                                    <div class="panel-content">
                                        @yield('link_popularity')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div id="disclosure">
                    <p>Copyright 2016 © by iPullRank. All Rights Reserved.</p>
                    <a href="http://ipullrank.com/privacy-policy/">Privacy Policy</a>
<!--
                    <span> | </span>
                    <a href="">Terms of Use</a>
-->
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

    <script src="../resources/assets/plugins/gsap/main-gsap.min.js"></script>
    <!-- HTML Animations -->

    <script src="../resources/assets/plugins/jquery-ui/jquery-ui-1.11.2.min.js"></script>

    <script src="../resources/assets/plugins/jquery-block-ui/jquery.blockUI.min.js"></script>
    <!-- simulate synchronous behavior when using AJAX -->

    <script src="../resources/assets/plugins/bootbox/bootbox.min.js"></script>

    <script src="../resources/assets/plugins/mcustom-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- Custom Scrollbar sidebar -->

    <script src="../resources/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <script src="../resources/assets/plugins/bootstrap-dropdown/bootstrap-hover-dropdown.min.js"></script>
    <!-- Show Dropdown on Mouseover -->

    <script src="../resources/assets/plugins/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- Animated Progress Bar -->

    <script src="../resources/assets/plugins/switchery/switchery.min.js"></script>
    <!-- IOS Switch -->

    <script src="../resources/assets/plugins/charts-sparkline/sparkline.min.js"></script>
    <!-- Charts Sparkline -->

    <script src="../resources/assets/plugins/retina/retina.min.js"></script>
    <!-- Retina Display -->

    <script src="../resources/assets/plugins/jquery-cookies/jquery.cookies.js"></script>
    <!-- Jquery Cookies, for theme -->

    <script src="../resources/assets/plugins/bootstrap/js/jasny-bootstrap.min.js"></script>
    <!-- File Upload and Input Masks -->

    <script src="../resources/assets/plugins/select2/select2.min.js"></script>
    <!-- Select Inputs -->

    <script src="../resources/assets/plugins/bootstrap-tags-input/bootstrap-tagsinput.min.js"></script>
    <!-- Select Inputs -->

    <script src="../resources/assets/plugins/bootstrap-loading/lada.min.js"></script>
    <!-- Buttons Loading State -->

    <script src="../resources/assets/plugins/timepicker/jquery-ui-timepicker-addon.min.js"></script>
    <!-- Time Picker -->

    <script src="../resources/assets/plugins/multidatepicker/multidatespicker.min.js"></script>
    <!-- Multi dates Picker -->

    <script src="../resources/assets/plugins/colorpicker/spectrum.min.js"></script>
    <!-- Color Picker -->

    <script src="../resources/assets/plugins/touchspin/jquery.bootstrap-touchspin.min.js"></script>
    <!-- A mobile and touch friendly input spinner component for Bootstrap -->

    <script src="../resources/assets/plugins/autosize/autosize.min.js"></script>
    <!-- Textarea autoresize -->

    <script src="../resources/assets/plugins/icheck/icheck.min.js"></script>
    <!-- Icheck -->

    <script src="../resources/assets/plugins/bootstrap-editable/js/bootstrap-editable.min.js"></script>
    <!-- Inline Edition X-editable -->

    <script src="../resources/assets/plugins/bootstrap-context-menu/bootstrap-contextmenu.min.js"></script>
    <!-- File Upload and Input Masks -->

    <script src="../resources/assets/plugins/prettify/prettify.min.js"></script>
    <!-- Show html code -->

    <script src="../resources/assets/plugins/slick/slick.min.js"></script>
    <!-- Slider -->

    <script src="../resources/assets/plugins/countup/countUp.min.js"></script>
    <!-- Animated Counter Number -->

    <script src="../resources/assets/plugins/noty/jquery.noty.packaged.min.js"></script>
    <!-- Notifications -->

    <script src="../resources/assets/plugins/backstretch/backstretch.min.js"></script>
    <!-- Background Image -->

    <script src="../resources/assets/plugins/charts-chartjs/Chart.min.js"></script>
    <!-- ChartJS Chart -->

    <script src="../resources/assets/plugins/bootstrap-slider/bootstrap-slider.js"></script>
    <!-- Bootstrap Input Slider -->

    <script src="../resources/assets/plugins/visible/jquery.visible.min.js"></script>
    <!-- Visible in Viewport -->

    <script src="../resources/assets/js/builder.js"></script>

    <script src="../resources/assets/js/sidebar_hover.js"></script>

    <script src="../resources/assets/js/application.js"></script>
    <!-- Main Application Script -->

    <script src="../resources/assets/js/plugins.js"></script>
    <!-- Main Plugin Initialization Script -->

    <script src="../resources/assets/js/widgets/notes.js"></script>

    <script src="../resources/assets/js/quickview.js"></script>
    <!-- Quickview Script -->

    <script src="../resources/assets/js/pages/search.js"></script>
    <!-- Search Script -->

    <!-- BEGIN PAGE SCRIPTS -->

    <script src="../resources/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <!-- Tables Filtering, Sorting & Editing -->

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