

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


    <body class="account separate-inputs boxed" data-page="signup">
        <!-- BEGIN LOGIN BOX -->
       <div class="container" id="login-block">
            <div class="row">
                <div class="col-sm-6 col-md-6 col-md-offset-3">
                    <div class="account-wall">
                
                    @if (count($errors) > 0)
	<div class="alert alert-danger">
	<strong>Whoops!</strong> There were some problems with your input.<br><br>
	<ul style="list-style:none;">
	     @foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
	     @endforeach

        </ul>
                        </div>

                        @endif
        
                        
                <form class="form-signup" action="register" 
                method="post" 
                name="registration_form" role="form">
                    {!! csrf_field() !!}
                    <h3><strong>Create</strong> your account</h3>

                            <div class="append-icon">
                                <input type="text" name='username' value="{{ old('username') }}"
                id='username'  class="form-control form-white lastname" placeholder="Username" required>
                                <i class="icon-user"></i>
                            </div>
                    <div class="append-icon">
                        <input type="email" value="{{ old('email') }}" name="email" id="email" class="form-control form-white email" placeholder="Email" required>
                        <i class="icon-envelope"></i>
                    </div>
                    <div class="append-icon m-b-10">
                        <input type="password" name="password" id="password" class="form-control form-white password" placeholder="Password" required>
                        <i class="icon-lock"></i>
                    </div>
                    <div class="append-icon m-b-20">
                        <input type="password" name="password_confirmation" id="confirmpwd" class="form-control form-white password2" placeholder="Repeat Password" required>
                        <i class="icon-lock"></i>
                    </div>
       

                        <input type="submit" id="submit-form"
                   value="Register" 
                              class="btn btn-lg btn-dark m-t-20" data-style="expand-left"
                   /> 
  
                    <div class="clearfix">
                                <p style="text-align:center;" class="m-t-20"><a href="login">Already have an account? Sign In</a></p>
                            </div>
                </form>
                  </div>
                </div>
            </div>
            <p class="account-copyright">
                <span>Copyright © 2015 </span><span>IPULLRANK</span>.<span>All rights reserved.</span>
            </p>
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