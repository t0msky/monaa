<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="shortcut icon" type='image/x-icon' href="img/monaa.ico">
  <link rel="shortcut icon" type='image/x-icon' href="img/monaa-16.png">
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Meta -->
  <meta name="description" content="MONAA - Monitoring And Navitrack Assets Application">
  <meta name="author" content="Artifex DNA">

  <title>MONAA - Monitoring And Navitrack Assets Application</title>

  <!-- vendor css -->
  <link href="<?php echo env('BASE_URL');?>lib/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="<?php echo env('BASE_URL');?>lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="<?php echo env('BASE_URL');?>lib/typicons.font/typicons.css" rel="stylesheet">
  <link href="<?php echo env('BASE_URL');?>lib/rickshaw/rickshaw.min.css" rel="stylesheet">
  <link href="<?php echo env('BASE_URL');?>lib/select2/css/select2.min.css" rel="stylesheet">
  <link href="<?php echo env('BASE_URL');?>lib/morris.js/morris.css" rel="stylesheet">
  <link href="<?php echo env('BASE_URL');?>lib/highlightjs/styles/github.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo env('BASE_URL');?>css/toastr.css" />
  <link rel="stylesheet" href="<?php echo env('BASE_URL');?>css/monaa.css">
  <!-- Bracket CSS -->
  <link rel="stylesheet" href="<?php echo env('BASE_URL');?>css/bracket.css">
</head>

  <body>
    @yield('content')


    <script src="<?php echo env('BASE_URL');?>lib/jquery/jquery.min.js"></script>
    <script src="<?php echo env('BASE_URL');?>lib/jquery-ui/ui/widgets/datepicker.js"></script>
    <script src="<?php echo env('BASE_URL');?>lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo env('BASE_URL');?>lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="<?php echo env('BASE_URL');?>lib/moment/min/moment.min.js"></script>
    <script src="<?php echo env('BASE_URL');?>lib/peity/jquery.peity.min.js"></script>
    <script src="<?php echo env('BASE_URL');?>lib/select2/js/select2.min.js"></script>
    <script src="<?php echo env('BASE_URL');?>lib/highlightjs/highlight.pack.min.js"></script>
    <script src="<?php echo env('BASE_URL');?>lib/parsleyjs/parsley.min.js"></script>
    <script src="<?php echo env('BASE_URL');?>js/toastr.js"></script>

    <script>
      $(function(){
        'use strict';

        toastr.options = {
          "closeButton": false,
          "debug": false,
          "newestOnTop": false,
          "progressBar": true,
          "positionClass": "toast-bottom-left",
          "preventDuplicates": false,
          "onclick": null,
          "showDuration": "300",
          "hideDuration": "1000",
          "timeOut": "18000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
        }
        <?php if(session()->has('success')){?>
          toastr.success('<?php echo session()->get('success'); ?>')
        <?php } ?>

        <?php if(session()->has('error')){?>
          toastr.error('<?php echo session()->get('error'); ?>')
        <?php } ?>

      });


    </script>
  </body>
</html>
