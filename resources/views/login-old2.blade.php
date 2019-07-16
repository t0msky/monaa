<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="shortcut icon" type='image/x-icon' href="img/monaa.ico">
    <link rel="shortcut icon" type='image/x-icon' href="img/monaa-16.png">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@monaa">
    <meta name="twitter:creator" content="@monaa">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="MONAA">
    <meta name="twitter:description" content="Monitoring And Navitrack Assets Application">
    <meta name="twitter:image" content="https://monaa.io/apps/img/monaa-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="https://monaa.io/monaa/">
    <meta property="og:title" content="MONAA">
    <meta property="og:description" content="Monitoring And Navitrack Assets Application">

    <meta property="og:image" content="https://monaa.io/apps/img/monaa-social.png">
    <meta property="og:image:secure_url" content="https://monaa.io/monaa/apps/img/monaa-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="MONAA - Monitoring And Navitrack Assets Application">
    <meta name="author" content="MONAA">

    <title>MONAA - Monitoring And Navitrack Assets Application</title>

    <!-- vendor css -->
    <link href="<?php echo env('BASE_URL');?>lib/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
		<link href="<?php echo env('BASE_URL');?>lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="<?php echo env('BASE_URL');?>lib/typicons.font/typicons.css" rel="stylesheet">
    <link href="<?php echo env('BASE_URL');?>lib/select2/css/select2.min.css" rel="stylesheet">
    <link href="<?php echo env('BASE_URL');?>lib/morris.js/morris.css" rel="stylesheet">
    <link href="<?php echo env('BASE_URL');?>lib/timepicker/jquery.timepicker.css" rel="stylesheet">
    <link href="<?php echo env('BASE_URL');?>lib/highlightjs/styles/github.css" rel="stylesheet">
    <link href="<?php echo env('BASE_URL');?>lib/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="<?php echo env('BASE_URL');?>lib/datatables.net-responsive-dt/css/responsive.dataTables.min.css" rel="stylesheet">

    <!-- Monaa CSS -->
    <link rel="stylesheet" href="<?php echo env('BASE_URL');?>css/monaa.css">
    <!-- Start of Async Drift Code -->
    <script>
    "use strict";

    !function() {
    var t = window.driftt = window.drift = window.driftt || [];
     if (!t.init) {
     if (t.invoked) return void (window.console && console.error && console.error("Drift snippet included twice."));
      t.invoked = !0, t.methods = [ "identify", "config", "track", "reset", "debug", "show", "ping", "page", "hide", "off", "on" ], 
      t.factory = function(e) {
       return function() {
         var n = Array.prototype.slice.call(arguments);
         return n.unshift(e), t.push(n), t;
          };
     }, t.methods.forEach(function(e) {
        t[e] = t.factory(e);
       }), t.load = function(t) {
        var e = 3e5, n = Math.ceil(new Date() / e) * e, o = document.createElement("script");
        o.type = "text/javascript", o.async = !0, o.crossorigin = "anonymous", o.src = "https://js.driftt.com/include/" + n + "/" + t + ".js";
          var i = document.getElementsByTagName("script")[0];
          i.parentNode.insertBefore(o, i);
      };
     }
    }();
    drift.SNIPPET_VERSION = '0.3.1';
    drift.load('ahknrdbbgfbu');
    </script>
    <!-- End of Async Drift Code -->
  </head>

  <body>
    <div id="preloader">
      <div id="line"></div><!-- preloader-->
    </div>

    <div class="row no-gutters flex-row-reverse ht-100v">
      <div class="col-md-6 bg-gray-200 d-flex align-items-center justify-content-center">
        <div class="login-wrapper wd-450 wd-xl-400 mg-y-30">
          <?php if (!empty($errorMsg) || count($errors) > 0) { ?>
            <div class="alert alert-danger alert-dismissable">
              Whoops! There were some problems with your input.<br><br>
              <ul>
                <?php
                if(!empty($errorMsg)){
                  foreach($errorMsg as $e){
                      echo '<li>'.$e.'</li>';
                  }
                }
                if(count($errors) > 0){
                  foreach($errors->all() as $error){
                    echo '<li>'.$error.'</li>';
                  }
                }
                ?>
              </ul>
            </div>
          <?php }?>
          <form method="post" action="<?php echo env('BASE_URL');?>login" data-parsley-validate>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <!-- <h5 class="tx-inverse tx-center">Log In To MONAA</h5> -->
            <div class="form-group pd-t-20">
              <input id="input-email" type="email" class="form-control" placeholder="Email" name="email" required>
            </div><!-- form-group -->
            <div class="form-group">
              <div class="input-group">
                <input type="password" class="form-control password" id="password" placeholder="Password" name="pword" required>
                <!-- <button class="unmask" type="button" title="Mask/Unmask password to check content">Unmask</button> -->
              </div><!-- input-group -->
            </div><!-- form-group -->
            <div class="pd-b-7">
              <label class="ckbox">
                <input type="checkbox">
                <span>Remember Me</span>
              </label>
            </div>
              <button id="subBtn" type="submit" class="btn btn-info btn-block submit-button">Log In</button>
          </form>
          <div class="mg-t-40"><a href="#">Forgot Password?</a> Or <a href="register" class="tx-success">Create Account</a></div>
        </div><!-- login-wrapper -->


      </div><!-- col -->
      <div class="col-md-6 bg-br-primary d-flex align-items-center justify-content-center">
        <div class="wd-300 wd-xl-500 mg-y-100">
          <div class="signin-logo tx-center pd-b-60"><img src="<?php echo env('BASE_URL');?>img/favicon.png" class="signin-logo"></div>
          <h5 class="tx-white-8 pd-b-20">Monitoring Operation & Navitrack <br>Assets Apps - MONAA</h5>
          <p class="tx-white-6 pd-b-40">Oceanautik is currently developing its proprietary marine asset tracking software, MONAA (Monitoring Operation & Navitrack Assets Apps) which will allow us to monitor our deployed assets in Real-Time and enable us to manage offshore activity risks both locally and with remote support from our centralized coordination centre in Kuala Lumpur.</p>

          <a href="https://monaa.io/" class="btn btn-outline-light bd bd-success bd-2 tx-white pd-x-45 tx-uppercase tx-14 tx-spacing-2 tx-medium">Back To Website</a>
          <p class="tx-white-3 pd-t-60">Copyright <span class="tx-16">©</span> 2019 MONAA.  All Rights Reserved.</div>
        </div><!-- wd-500 -->
      </div>
    </div><!-- row -->

    <script src="<?php echo env('BASE_URL');?>lib/jquery/jquery.min.js"></script>
    <script src="<?php echo env('BASE_URL');?>lib/jquery-ui/ui/widgets/datepicker.js"></script>
    <script src="<?php echo env('BASE_URL');?>lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo env('BASE_URL');?>lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="<?php echo env('BASE_URL');?>lib/moment/min/moment.min.js"></script>
    <script src="<?php echo env('BASE_URL');?>lib/peity/jquery.peity.min.js"></script>
    <script src="<?php echo env('BASE_URL');?>lib/select2/js/select2.min.js"></script>
    <script src="<?php echo env('BASE_URL');?>lib/timepicker/jquery.timepicker.min.js"></script>
    <script src="<?php echo env('BASE_URL');?>lib/jquery.maskedinput/jquery.maskedinput.js"></script>
    <script src="<?php echo env('BASE_URL');?>lib/highlightjs/highlight.pack.min.js"></script>
    <script src="<?php echo env('BASE_URL');?>lib/parsleyjs/parsley.min.js"></script>
    <script src="<?php echo env('BASE_URL');?>lib/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo env('BASE_URL');?>lib/datatables.net-dt/js/dataTables.dataTables.min.js"></script>
    <script src="<?php echo env('BASE_URL');?>lib/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo env('BASE_URL');?>lib/datatables.net-responsive-dt/js/responsive.dataTables.min.js"></script>

    <script src="<?php echo env('BASE_URL');?>js/bracket.js"></script>
    <script src="<?php echo env('BASE_URL');?>js/ResizeSensor.js"></script>

    <script>
      $(function(){
        'use strict';
        $('#selectForm-login').parsley();
      });
    </script>
  </body>
</html>
