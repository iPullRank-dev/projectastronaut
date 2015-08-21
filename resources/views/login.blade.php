

<html class="" lang="en">

<head>

  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <meta name="description" content="Project Astronaut">

  <link rel="shortcut icon" href="../resources/assets/images/favicon.png" type="image/png">

  <title>Project Astronaut - Build 0.1</title>

  <link href="http://fonts.googleapis.com/css?family=Nothing+You+Could+Do" rel="stylesheet" type="text/css">

  <link href="../resources/assets/css/style.css" rel="stylesheet"> <!-- MANDATORY -->

  <link href="../resources/assets/css/theme.css" rel="stylesheet"> <!-- MANDATORY -->

  <link href="../resources/assets/css/ui.css" rel="stylesheet"> <!-- MANDATORY -->
    
  <link href="../resources/assets/css/custom.css" rel="stylesheet"> <!-- CUSTOM -->

  <link href="../resources/assets/plugins/datatables/dataTables.min.css" rel="stylesheet">


  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->



  <script src="../resources/assets/plugins/modernizr/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    




</head>


    <body class="account separate-inputs" data-page="login">
        <!-- BEGIN LOGIN BOX -->
        <div class="container" id="login-block">
            <div class="row">
                <div class="col-sm-6 col-md-4 col-md-offset-4" id="logbox">
                    <div class="account-wall">
                        <p style="text-align:center;color:#fff;font-size:35px;font-weight:200;">ASTRONAUT<strong style="font-size:20px;">Beta</strong></p><br/>
                        <form class="form-signin" action="includes/process_login.php" method="post" name="login_form" role="form">
                            <div class="append-icon">
                                <input type="text" name="email" id="username" class="form-control form-white email" placeholder="Email" required>
                                <i class="icon-user"></i>
                            </div>
                            <div class="append-icon m-b-20">
                                <input type="password" name="password"  id="password" class="form-control form-white password" placeholder="Password" required>
                                <i class="icon-lock"></i>
                            </div>
                            
                             <?php
        if (isset($_GET['error'])) {
            echo '<p style="text-align:center;color:#fff;">Check your email or password.</p>';
        }
?> 
                            
                            <input type="button" 
                   value="Login" 
                   onclick="formhash(this.form, this.form.password);"  class="btn btn-lg btn-danger btn-block ladda-button" >
                        
                            <div class="clearfix">
                                <!--<p class="pull-left m-t-20"><a id="password" href="#">Forgot password?</a></p>-->
                                <p class="m-t-20" style="text-align:center;"><a href="register.php">New here? Sign up</a></p>
                            </div>
                        </form>
                        <!--<form class="form-password" role="form">
                            <div class="append-icon m-b-20">
                                <input type="password" name="password" class="form-control form-white password" placeholder="Password" required>
                                <i class="icon-lock"></i>
                            </div>
                            <button type="submit" id="submit-password" class="btn btn-lg btn-danger btn-block ladda-button" data-style="expand-left">Send Password Reset Link</button>
                            <div class="clearfix">
                                <p class="pull-left m-t-20"><a id="login" href="#">Already got an account? Sign In</a></p>
                                <p class="pull-right m-t-20"><a href="user-signup-v1.html">New here? Sign up</a></p>
                            </div>
                        </form>-->
                    </div>
                </div>
            </div>
            <p class="account-copyright">
                <span>Copyright © 2015 </span><span>IPULLRANK</span>.<span>All rights reserved.</span>
            </p>
            <!--<div id="account-builder">
                <form class="form-horizontal" role="form">
                    <div class="row">
                        <div class="col-md-12">
                            <i class="fa fa-spin fa-gear"></i> 
                            <h3><strong>Customize</strong> Login Page</h3>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-xs-8 control-label">Social Login</label>
                                <div class="col-xs-4">
                                    <label class="switch m-r-20">
                                    <input id="social-cb" type="checkbox" class="switch-input" checked>
                                    <span class="switch-label" data-on="On" data-off="Off"></span>
                                    <span class="switch-handle"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-8 control-label">Boxed Form</label>
                                <div class="col-xs-4">
                                    <label class="switch m-r-20">
                                    <input id="boxed-cb" type="checkbox" class="switch-input">
                                    <span class="switch-label" data-on="On" data-off="Off"></span>
                                    <span class="switch-handle"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-xs-8 control-label">Background Image</label>
                                <div class="col-xs-4">
                                    <label class="switch m-r-20">
                                    <input id="image-cb" type="checkbox" class="switch-input" checked>
                                    <span class="switch-label" data-on="On" data-off="Off"></span>
                                    <span class="switch-handle"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-xs-8 control-label">Background Slides</label>
                                <div class="col-xs-4">
                                    <label class="switch m-r-20">
                                    <input id="slide-cb" type="checkbox" class="switch-input">
                                    <span class="switch-label" data-on="On" data-off="Off"></span>
                                    <span class="switch-handle"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-xs-8 control-label">Separated Inputs</label>
                                <div class="col-xs-4">
                                    <label class="switch m-r-20">
                                    <input id="input-cb" type="checkbox" class="switch-input">
                                    <span class="switch-label" data-on="On" data-off="Off"></span>
                                    <span class="switch-handle"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-xs-8 control-label">User Image</label>
                                <div class="col-xs-4">
                                    <label class="switch m-r-20">
                                    <input id="user-cb" type="checkbox" class="switch-input">
                                    <span class="switch-label" data-on="On" data-off="Off"></span>
                                    <span class="switch-handle"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>-->
        </div>
        <script src="../resources/assets/plugins/jquery/jquery-1.11.1.min.js"></script>
        <script src="../resources/assets/plugins/jquery/jquery-migrate-1.2.1.min.js"></script>
        <script src="../resources/assets/plugins/gsap/main-gsap.min.js"></script>
        <script src="../resources/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="../resources/assets/plugins/backstretch/backstretch.min.js"></script>
        <script src="../resources/assets/plugins/bootstrap-loading/lada.min.js"></script>
        <script src="../resources/assets/plugins/jquery-validation/jquery.validate.min.js"></script>
        <script src="../resources/assets/plugins/jquery-validation/additional-methods.min.js"></script>
        <script src="../resources/assets/js/pages/login-v1.js"></script>
    </body>

</html>