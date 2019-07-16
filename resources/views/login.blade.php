<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="shortcut icon" type='image/x-icon' href="img/monaa.ico">
    <link rel="shortcut icon" type='image/x-icon' href="img/monaa-16.png">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta -->
    <meta property="og:description" content="MONAA - Monitoring And Navitrack Assets Application" />
    <meta property="og:image" content="https://monaa.io/apps/cdn/Monaa_brand01.jpg" />
    <meta name="author" content="Artifex DNA">

    <title>MONAA - Monitoring And Navitrack Assets Application</title>

    <!-- vendor css -->
    <link href="<?php echo env('BASE_URL');?>lib/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="<?php echo env('BASE_URL');?>lib/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
		<link href="<?php echo env('BASE_URL');?>lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="<?php echo env('BASE_URL');?>lib/typicons.font/typicons.css" rel="stylesheet">
    <link href="<?php echo env('BASE_URL');?>lib/select2/css/select2.min.css" rel="stylesheet">
    <link href="<?php echo env('BASE_URL');?>lib/morris.js/morris.css" rel="stylesheet">
    <link href="<?php echo env('BASE_URL');?>lib/timepicker/jquery.timepicker.css" rel="stylesheet">
    <link href="<?php echo env('BASE_URL');?>lib/highlightjs/styles/github.css" rel="stylesheet">
    <link href="<?php echo env('BASE_URL');?>lib/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="<?php echo env('BASE_URL');?>lib/datatables.net-responsive-dt/css/responsive.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo env('BASE_URL');?>css/toastr.css" />

    <!-- Monaa CSS -->
    <link rel="stylesheet" href="<?php echo env('BASE_URL');?>css/monaa.css">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-143458457-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-143458457-1');
    </script>

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

  <body class="pos-relative" data-spy="scroll" data-target="#navbarMain" data-offset="2">

    <div id="headPanel" class="headpanel">
      <div class="container">
        <div class="logo"><a href="https://monaa.io/"><img src="<?php echo env('BASE_URL');?>img/Monaa_light-02.png"></a></div>
        <div class="d-flex align-items-center mg-l-auto">
          <ul id="navbarMain" class="nav mg-lg-r-20 tx-capitalize tx-14 tx-spacing-1 tx-medium hidden-xs-down">
            <li class="nav-item"><a href="#home" class="nav-link">Home</a></li>
            <li class="nav-item"><a href="#whats" class="nav-link">What's Inside</a></li>
            <li class="nav-item"><a href="" class="nav-link">Request Demo</a></li>
            <li class="nav-item"><a href="" class="nav-link" data-toggle="modal" data-target="#poacregister">Registration</a></li>
          </ul>
          <!--<a id="showMenu" href="" class="tx-24 tx-gray-600 hover-info hidden-lg-up"><i class="icon ion-navicon-round"></i></a>-->
          <div class="form-layout-footer mg-l-auto ">
            <form method="post" action="<?php echo env('BASE_URL');?>login" data-parsley-validate data-parsley-errors-messages-disabled>
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="dropdown stay-open">
                <a href="#" data-toggle="dropdown" class="btn btn-info hidden-xs-down">Dashboard<i class="fa fa-angle-down mg-l-10"></i></a>
                <a id="showMenu-2" data-toggle="dropdown" href="" class="tx-24 tx-gray-600 hover-info hidden-lg-up"><i class="icon ion-navicon-round"></i></a>
                <div class="dropdown-menu dropdown-menu-right bg-white pd-30 wd-350">

                  <div class="tx-gray-600 tx-sm-24 tx-roboto tx-medium tx-uppercase pd-b-5 lh-1">Log In</div>
                  <p class="tx-gray-600 mg-b-30">Insert account credentials</p>

                  <div class="form-group">
                    <input id="input-email" type="email" class="form-control" placeholder="Email" name="email" required>
                  </div><!-- form-group -->
                  <div class="form-group">
                    <div class="main-password">
                      <input type="password" class="form-control input-password pd-y-12" aria-label="password"
                       placeholder="Password" id="password" name="pword" required>
                      <a href="JavaScript:void(0);" class="icon-view"><i class="fa fa-eye tx-18"></i></a>
                    </div>
                  </div><!-- form-group -->
                  <div class="pd-b-7">
                    <label class="ckbox">
                      <input type="checkbox">
                      <span>Remember Me</span>
                    </label>
                  </div>
                  
                  <button id="subBtn" type="submit" class="btn btn-info btn-block submit-button">Log In</button>
                  
                  <div class="tx-center pd-t-20">
                     <span class="lh-3"><a href="<?php echo env('BASE_URL');?>forgot-password" class="tx-14">Forgotten Password ?</a></span>
                 </div>
                  
                </div><!-- dropdown-menu -->
              </div><!-- dropdown -->
            </form>
          </div>
        </div>
      </div><!-- container -->
    </div>

    <div id="home" class="br-home-header">
      <div class="container">
        <div class="row no-gutters">
          <div class="col-lg-5 col-xl-4 d-lg-flex align-items-center">
            <div class="pd-t-100 tx-xs-center">
              <div class="lh-1 tx-30 tx-roboto tx-medium tx-gray-600 tx-uppercase pd-b-20">Marine Activities <br>At Your <br>Fingertips</div>
              <h6 class="lh-5 tx-normal mg-b-20 mg-sm-b-40 tx-capitalize">Manage Offshore Activity, Deployed Assets & <br>Personnel In Real-Time, Anywhere.</h6>
              <div class="d-flex align-items-center">
                <div class="form-layout-footer mg-r-auto hidden-xs-down">
                  <a href="#" class="btn btn-info-2">Request Demo Account</a>
                </div>
              </div><!-- d-flex -->
            </div>
          </div><!-- col -->
          <div class="col-lg-7 col-xl-8 pd-sm-t-150-force">
            <img src="<?php echo env('BASE_URL');?>img/Devices_12.png" class="img-fluid mg-lg-b-0" alt="">
          </div><!-- col -->
        </div>
      </div>
    </div><!-- d-flex -->

    <div class="bg-br-primary pos-relative">
      <div id="whats" class="container">
        <div class="row">
          <div class="col-lg-12">

          </div>
        </div><!-- row -->
        <div class="row pd-t-80 pd-xs-t-30">
          <div class="col-lg-8 pd-t-20">
            <img src="<?php echo env('BASE_URL');?>img/monaaui.png" class="img-fluid" alt="">
          </div>
          <div class="col-lg-4 d-flex align-items-center pd-y-40">
            <div class="pd-b-40 tx-xs-center">
              <div class="tx-white-6 tx-30 tx-roboto tx-light tx-uppercase pd-b-20 lh-1">Monitoring Operation & Navitrack Assets Apps - MONAA</div>
              <p class="tx-white-5 tx-sm-14">MONAA (Monitoring Operation & Navitrack Assets Apps) allow us to monitor our deployed assets in Real-Time and enable us to manage offshore activity risks both locally and with remote support from our centralized coordination centre in Kuala Lumpur.</p>
            </div>
          </div><!-- col-5 -->
        </div>
      </div><!-- container -->
    </div>

    <div class="bg-light pos-relative">

      <div id="support" class="br-holder"></div>
      <div class="container pd-y-40 pd-lg-y-80">
        <div class="row">
          <div class="col-lg-12">
            <div class="row tx-white">
              <div class="col-sm-6 col-lg-3 mg-tn-20 pd-xs-b-30">
                <div class="media">
                  <img src="<?php echo env('BASE_URL');?>img/icon001.png" class="wd-80 op-9" alt="">
                  <div class="media-body mg-l-20 pd-xs-t-30">
                    <h6 class="tx-normal tx-dark mg-b-15 lh-5">Personnel Stand-By Time & Scheduling</h6>
                  </div><!-- media-body -->
                </div><!-- media -->
              </div><!-- col-4 -->
              <div class="col-sm-6 col-lg-3 mg-tn-20 pd-xs-b-30">
                <div class="media">
                  <img src="<?php echo env('BASE_URL');?>img/icon002.png" class="wd-80 op-9" alt="">
                  <div class="media-body mg-l-20 pd-xs-t-30">
                    <h6 class="tx-normal tx-dark mg-b-15 lh-5">Personnel Duty Report & Payrolls</h6>
                  </div><!-- media-body -->
                </div><!-- media -->
              </div><!-- col-4 -->
              <div class="col-sm-6 col-lg-3 mg-tn-20 pd-xs-b-30">
                <div class="media">
                  <img src="<?php echo env('BASE_URL');?>img/icon003.png" class="wd-80 op-9" alt="">
                  <div class="media-body mg-l-20 pd-xs-t-30">
                    <h6 class="tx-normal tx-dark lh-5">Asset & Personnel Monitoring</h6>
                  </div><!-- media-body -->
                </div><!-- media -->
              </div><!-- col-4 -->
              <div class="col-sm-6 col-lg-3 mg-tn-20">
                <div class="media">
                  <img src="<?php echo env('BASE_URL');?>img/icon004.png" class="wd-80 op-9" alt="">
                  <div class="media-body mg-l-20 pd-xs-t-30">
                    <h6 class="tx-normal tx-dark mg-b-15 lh-5">Report & Emergency Response</h6>
                  </div><!-- media-body -->
                </div><!-- media -->
              </div><!-- col-4 -->
            </div><!-- row -->
          </div>
        </div><!-- row -->
      </div><!-- container -->
    </div><!-- pd-y-100 -->

    <div class="br-foot">
      <div class="container">
        <div class="tx-white-3 tx-xs-center tx-14">Copyright <span class="tx-14">©</span> 2019 Monaa.  All Rights Reserved.</div>
        <div class="mg-t-10 mg-sm-t-0">
          <span class="social hidden-xs-down tx-20">
            <a href="https://www.facebook.com/monaa.io/"><i class="fab fa-facebook pd-r-10"></i></a>
            <a href="https://www.twitter.com/monaa.io/"><i class="fab fa-twitter"></i></a>
          </span>
        </div>
      </div><!-- container -->
    </div>

    <div id="poacregister" class="modal fade">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content tx-size-sm">
          <div class="modal-header pd-x-20">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body pd-30">
            <form method="post" action="<?php echo env('BASE_URL');?>postRegister" data-parsley-validate data-parsley-errors-messages-disabled>
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="tx-gray-600 tx-sm-24 tx-roboto tx-medium tx-uppercase pd-b-5 lh-1">Sign Up</div>
              <p class="tx-gray-600 mg-b-30">Account credentials registration</p>

              <div class="form-group">
                <input type="text" class="form-control pd-y-12" placeholder="First Name" name="firstname" required>
              </div><!-- form-group -->
              <div class="form-group">
                <input type="text" class="form-control pd-y-12" placeholder="Last Name" name="lastname" required>
              </div><!-- form-group -->
              <div class="form-group">
                <input type="email" class="form-control pd-y-12" placeholder="Email" name="email" required>
              </div><!-- form-group -->
              <div class="form-group">
                <div class="main-password">
                  <input id="password-1" type="password" data-parsley-equalto="#password-2" name="password" class="form-control input-password pd-y-12" aria-label="password" placeholder="Password" required>
                  <a href="JavaScript:void(0);" class="icon-view"><i class="fa fa-eye tx-18"></i></a>
                </div>
              </div><!-- form-group -->
              <div class="form-group">
                <div class="main-password">
                  <input id="password-2" type="password" data-parsley-equalto="#password-1" name="password_confirmation" class="form-control input-password pd-y-12" aria-label="password" placeholder="Confirm Password" required>
                  <a href="JavaScript:void(0);" class="icon-view"><i class="fa fa-eye tx-18"></i></a>
                </div>
              </div><!-- form-group -->
              <div class="pd-b-30 pd-t-10">
                <span class="lh-3">By clicking the 'Create Account' button below you agreed to our <a href="#">Terms & Conditions</a> and <a href="#">Privacy policy</a>.</span>
              </div>
              <!-- <button class="btn btn-info btn-block pd-y-10">Sign In</button> -->
              <button type="submit" class="btn btn-info btn-block submit-button">Create Account</button>
            </form>
          </div><!-- modal-body -->
        </div>
      </div><!-- modal-dialog -->
    </div><!-- modal -->


    <script src="<?php echo env('BASE_URL');?>lib/jquery/jquery.min.js"></script>
    <script src="<?php echo env('BASE_URL');?>lib/jquery-ui/ui/widgets/datepicker.js"></script>
    <script src="<?php echo env('BASE_URL');?>lib/bootstrap/js/bootstrap.bundle.min.js"></script>
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
        // toastr.success('Bla bla bla bla bla bla bla bla bla bla bla bla bla bla ...');
        <?php if(session()->has('success')){?>
          toastr.success('<?php echo session()->get('success'); ?>')
        <?php } ?>

        <?php if(session()->has('error')){?>
          toastr.success('<?php echo session()->get('error'); ?>')
        <?php } ?>

        <?php
        if(!empty($errorMsg)){
          foreach($errorMsg as $e){ ?>
              toastr.success('<?php echo $e; ?>')
        <?php
          }
        }
        ?>
        $(document).on('click', '.stay-open .dropdown-menu', function (e) {
          e.stopPropagation();
        });

        function checkScroll() {
          if($(document).scrollTop() > 80) {
            $('#headPanel').addClass('scroll');
          } else {
            $('#headPanel').removeClass('scroll');
          }
        }

        // sticky header effect
        checkScroll();
        $(window).scroll(function() {
          checkScroll();
        });



        // animated smooth scroll on target from top menu
        $('#navbarMain .nav-link').on('click', function(e){

          $('#navbarMain').addClass('hidden-md-down');

          var target = $(this).attr('href');
          $('html, body').animate({
            scrollTop: $(''+target).offset().top
          }, 500);

          e.preventDefault();
        });

        $('#showMenu').on('click', function(e){
          e.preventDefault();
          $('#navbarMain').toggleClass('hidden-md-down');
        });
      });

      $(document).ready(function () {
      	 $('.main-password').find('.input-password').each(function(index, input) {
      		 var $input = $(input);
      			$input.parent().find('.icon-view').click(function() {
      			  var change = "";
      			   if ($(this).find('i').hasClass('fa-eye')) {
      			    $(this).find('i').removeClass('fa-eye')
      			    $(this).find('i').addClass('fa-eye-slash')
      			       change = "text";
      			    } else {
      			    $(this).find('i').removeClass('fa-eye-slash')
      			    $(this).find('i').addClass('fa-eye')
      			      change = "password";
      			    }
      			    var rep = $("<input type='" + change + "' />")
      			   .attr('id', $input.attr('id'))
      			   .attr('name', $input.attr('name'))
      			   .attr('class', $input.attr('class'))
      			   .val($input.val())
      			   .insertBefore($input);
      			   $input.remove();
      			  $input = rep;
      			}).insertAfter($input);
      		});
      	});
    </script>
  </body>
  </html>
