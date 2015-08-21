<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 
sec_session_start();
 
if (login_check($mysqli) == true) {
    $logged = 'in';
     header('Location: ../dashboard.php');
} else {
    $logged = 'out';
}
?>

<html class="" lang="en">

<head>

  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <meta name="description" content="Project Astronaut">

  <link rel="shortcut icon" href="assets/images/favicon.png" type="image/png">

  <title>Project Astronaut - Build 0.1</title>

  <link href="http://fonts.googleapis.com/css?family=Nothing+You+Could+Do" rel="stylesheet" type="text/css">

  <link href="assets/css/style.css" rel="stylesheet"> <!-- MANDATORY -->

  <link href="assets/css/theme.css" rel="stylesheet"> <!-- MANDATORY -->

  <link href="assets/css/ui.css" rel="stylesheet"> <!-- MANDATORY -->
    
  <link href="assets/css/custom.css" rel="stylesheet"> <!-- CUSTOM -->

  <link href="assets/plugins/datatables/dataTables.min.css" rel="stylesheet">

  <link href="page-builder/plugins/slider-pips/jquery-ui-slider-pips.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->



  <script src="assets/plugins/modernizr/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    
     <script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script> 



</head>
