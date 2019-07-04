<?php
// echo $uri; die();
?>

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
    <link href="<?php echo env('BASE_URL');?>lib/medium-editor/css/medium-editor.min.css" rel="stylesheet">
    <link href="<?php echo env('BASE_URL');?>lib/summernote/summernote-bs4.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo env('BASE_URL');?>css/sweet-alert2.css" />
    <link rel="stylesheet" href="<?php echo env('BASE_URL');?>css/toastr.css" />

    <!-- Monaa CSS -->
    <link rel="stylesheet" href="<?php echo env('BASE_URL');?>css/monaa.css">
    
  </head>

  <body>

    <!-- ########## START: LEFT PANEL ########## -->
    <div class="br-logo"><img src="<?php echo env('BASE_URL');?>img/Monaa_light-02.png" class="br-logo"></div>
    <div class="br-sideleft sideleft-scrollbar">
      <ul class="br-sideleft-menu mg-t-20">
        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub <?php if($uri=='dashboard' || $uri=='noticeboard'){echo 'active';}?>">
            <i class="tx-icon typcn typcn-th-large-outline tx-20 pd-r-2"></i>
            <span class="menu-item-label">Dashboard</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="<?php echo env('BASE_URL');?>dashboard" class="sub-link <?php if($uri=='dashboard'){echo 'active';}?>">Dashboard Cards</a></li>
            <li class="sub-item"><a href="<?php echo env('BASE_URL');?>noticeboard" class="sub-link <?php if($uri=='noticeboard'){echo 'active';}?>">Notice Board</a></li>
          </ul>
        </li><!-- br-menu-item -->
        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub <?php if($uri=='ratecard' || $uri=='jobitems'){echo 'active';}?>">
            <i class="tx-icon typcn typcn-shopping-bag tx-24 pd-r-4"></i>
            <span class="menu-item-label">Data Assets</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="<?php echo env('BASE_URL');?>#" class="sub-link">Assets</a></li>
            <li class="sub-item"><a href="<?php echo env('BASE_URL');?>ratecard" class="sub-link <?php if($uri=='ratecard'){echo 'active';}?>">Rate Card</a></li>
            <?php if ($user->usr_role == "AD") { ?>
            <li class="sub-item"><a href="<?php echo env('BASE_URL');?>jobitems" class="sub-link <?php if($uri=='jobitems'){echo 'active';}?>">Job Items</a></li>
            <?php } ?>
          </ul>
        </li>
        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub <?php if($uri=='jobrecords' || $uri=='addnewjob' || $uri=='poacstatus' || $uri=='jobinfo'){echo 'active';}?>">
            <i class="tx-icon typcn typcn-briefcase tx-24 pd-r-4"></i>
            <span class="menu-item-label">Operations</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="<?php echo env('BASE_URL');?>jobrecords" class="sub-link <?php if($uri=='jobrecords' || $uri=='jobinfo'){echo 'active';}?>">Job Records</a></li>
            <li class="sub-item"><a href="<?php echo env('BASE_URL');?>addnewjob" class="sub-link <?php if($uri=='addnewjob'){echo 'active';}?>">Add New Job</a></li>
            <li class="sub-item"><a href="<?php echo env('BASE_URL');?>poacstatus" class="sub-link <?php if($uri=='poacstatus'){echo 'active';}?>">POAC Status</a></li>
          </ul>
        </li>
        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub <?php if($uri=='vouchersrecord' || $uri=='submit-voucher'){echo 'active';}?>">
            <i class="tx-icon typcn typcn-document-text tx-24 pd-r-4"></i>
            <span class="menu-item-label">Vouchers</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="<?php echo env('BASE_URL');?>vouchersrecord" class="sub-link <?php if($uri=='vouchersrecord'){echo 'active';}?>">STS Record</a></li>
            
            <li class="sub-item"><a href="<?php echo env('BASE_URL');?>submit-voucher" class="sub-link <?php if($uri=='submit-voucher'){echo 'active';}?>">Submit Vouchers</a></li>

          </ul>
        </li>
        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub">
            <i class="tx-icon typcn typcn-map tx-24 pd-r-5"></i>
            <span class="menu-item-label">Naveetrac ™</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="<?php echo env('BASE_URL');?>#" class="sub-link">Coming Soon</a></li>
          </ul>
        </li><!-- br-menu-item -->
        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub <?php if($uri=='personnelboard' || $uri=='adduser' || $uri=='profile' || $uri=='view-profile'){echo 'active';}?>">
            <i class="tx-icon typcn typcn-user tx-24 pd-l-3 pd-r-2"></i>
            <span class="menu-item-label">Personnels</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="<?php echo env('BASE_URL');?>personnelboard" class="sub-link <?php if($uri=='personnelboard'){echo 'active';}?>">Personnel Board</a></li>
            <?php if ($user->usr_role == "AD") { ?>
            <li class="sub-item"><a href="<?php echo env('BASE_URL');?>adduser" class="sub-link <?php if($uri=='adduser'){echo 'active';}?>">New Registration</a></li>
            <?php } ?>
            <li class="sub-item"><a href="<?php echo env('BASE_URL');?>profile" class="sub-link <?php if($uri=='profile'){echo 'active';}?>">My Profile</a></li>
          </ul>
        </li>
        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub">
            <i class="tx-icon typcn typcn-attachment-outline tx-24 pd-r-2"></i>
            <span class="menu-item-label">Payrolls</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="<?php echo env('BASE_URL');?>#" class="sub-link">Coming Soon</a></li>
          </ul>
        </li><!-- br-menu-item -->
        <hr>
        <li class="br-menu-item">
          <a href="#" class="br-menu-link">
            <i class="tx-icon typcn typcn-message tx-24 pd-r-5"></i>
            <span class="menu-item-label">Mailbox</span>
          </a><!-- br-menu-link -->
        </li><!-- br-menu-item -->
        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub">
            <i class="tx-icon typcn typcn-cog-outline tx-24 pd-r-2"></i>
            <span class="menu-item-label">Settings</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="<?php echo env('BASE_URL');?>#" class="sub-link">Notifications</a></li>
            <li class="sub-item"><a href="<?php echo env('BASE_URL');?>#" class="sub-link">Billing</a></li>
          </ul>
        </li><!-- br-menu-item -->
      </ul><!-- br-sideleft-menu -->
    </div><!-- br-sideleft -->
    <!-- ########## END: LEFT PANEL ########## -->

    <!-- ########## START: HEAD PANEL ########## -->
    <div class="br-header">
      <div class="br-header-left">
        <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
        <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
      </div><!-- br-header-left -->
      <div class="br-header-right">
        <nav class="nav">
          <div class="dropdown">
            <a href="" class="nav-link pd-x-7 pos-relative" data-toggle="dropdown">
              <i class="icon typcn typcn-bell tx-24"></i>
              <!-- start: if statement -->
              <span class="square-8 bg-info pos-absolute t-15 r-5 rounded-circle"></span>
              <!-- end: if statement -->
            </a>
            <div class="dropdown-menu dropdown-menu-header">
              <div class="dropdown-menu-label">
                <label>Notifications</label>
                <a href="">Mark All as Read</a>
              </div><!-- d-flex -->

              <div class="media-list">
                <!-- loop starts here -->
                <a href="" class="media-list-link read">
                  <div class="media">
                    <div class="media-body">
                      <p class="noti-text">You have 1 job notification.</p>
                      <span>March 03, 2019 8:45am</span>
                    </div>
                  </div><!-- media -->
                </a>
                <!-- loop ends here -->
                <a href="" class="media-list-link read">
                  <div class="media">
                    <div class="media-body">
                      <p class="noti-text">You have 1 job notification.</p>
                      <span>March 03, 2019 8:45am</span>
                    </div>
                  </div><!-- media -->
                </a>
                <a href="" class="media-list-link read">
                  <div class="media">
                    <div class="media-body">
                      <p class="noti-text">You have 1 job notification.</p>
                      <span>March 03, 2019 8:45am</span>
                    </div>
                  </div><!-- media -->
                </a>
                <a href="" class="media-list-link read">
                  <div class="media">
                    <div class="media-body">
                      <p class="noti-text">You have 1 job notification.</p>
                      <span>March 03, 2019 8:45am</span>
                    </div>
                  </div><!-- media -->
                </a>
                <div class="dropdown-footer">
                  <a href=""><i class="fa fa-angle-down"></i> Show All Notifications</a>
                </div>
              </div><!-- media-list -->
            </div><!-- dropdown-menu -->
          </div><!-- dropdown -->
          <div class="dropdown">
            <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
              <span class="logged-name hidden-md-down"><?php echo $user->usr_firstname.' '.$user->usr_lastname;?></span>


              <?php if ($user->usr_pic != '') { ?>
              <img src="<?php echo env('BASE_URL');?>img/pic/<?php echo $user->usr_pic;?>" class="wd-40 rounded-circle">
              <?php } else { ?>
              <img src="<?php echo env('BASE_URL');?>img/default.png" class="wd-40 rounded-circle">
              <?php } ?>

              <span class="square-10 bg-success"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-header wd-250">
              <div class="tx-center">


                <?php if ($user->usr_pic != '') { ?>
                <img src="<?php echo env('BASE_URL');?>img/pic/<?php echo $user->usr_pic;?>" class="wd-80 rounded-circle">
                <?php } else { ?>
                <img src="<?php echo env('BASE_URL');?>img/default.png" class="wd-40 rounded-circle">
                <?php } ?>

                <h6 class="logged-fullname"><?php echo $user->usr_firstname.' '.$user->usr_lastname;;?></h6>
                <p><?php echo $user->usr_email;?></p>
              </div>
              <hr>
              <ul class="list-unstyled user-profile-nav">
                <li><a href="<?php echo env('BASE_URL');?>profile"><i class="icon typcn typcn-user tx-24"></i> My Profile</a></li>
                <li><a href="#"><i class="icon typcn typcn-edit tx-24"></i> Settings</a></li>
                <li><a href="<?php echo env('BASE_URL');?>logout"><i class="icon typcn typcn-times-outline tx-24"></i> Sign Out</a></li>
              </ul>
            </div><!-- dropdown-menu -->
          </div><!-- dropdown -->
        </nav>
        <div class="navicon-right">
          <a target="_blank" class="pd-x-8" href="https://www.facebook.com/monaa.io/"><i class="fab fa-facebook tx-20"></i></a>
          <a target="_blank" class="pd-x-8" href="https://twitter.com/monaa.io"><i class="fab fa-twitter tx-20"></i></a>
        </div><!-- navicon-right -->
      </div><!-- br-header-right -->
    </div><!-- br-header -->
    <!-- ########## END: HEAD PANEL ########## -->

    <!-- ########## START: MAIN PANEL ########## -->
    @yield('content')
    <script src="<?php echo env('BASE_URL');?>lib/jquery/jquery.min.js"></script>
    <script src="<?php echo env('BASE_URL');?>lib/jquery-ui/ui/widgets/datepicker.js"></script>
    <script src="<?php echo env('BASE_URL');?>lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo env('BASE_URL');?>lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="<?php echo env('BASE_URL');?>lib/moment/min/moment.min.js"></script>
    <script src="<?php echo env('BASE_URL');?>lib/peity/jquery.peity.min.js"></script>
    <script src="<?php echo env('BASE_URL');?>lib/select2/js/select2.min.js"></script>
    <script src="<?php echo env('BASE_URL');?>lib/timepicker/jquery.timepicker.min.js"></script>
    <script src="<?php echo env('BASE_URL');?>lib/jquery.maskedinput/jquery.maskedinput.js"></script>
    <script src="<?php echo env('BASE_URL');?>lib/summernote/summernote-bs4.min.js"></script>
    <script src="<?php echo env('BASE_URL');?>lib/highlightjs/highlight.pack.min.js"></script>
    <script src="<?php echo env('BASE_URL');?>lib/parsleyjs/parsley.min.js"></script>
    <script src="<?php echo env('BASE_URL');?>lib/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo env('BASE_URL');?>lib/datatables.net-dt/js/dataTables.dataTables.min.js"></script>
    <script src="<?php echo env('BASE_URL');?>lib/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo env('BASE_URL');?>lib/datatables.net-responsive-dt/js/responsive.dataTables.min.js"></script>
    <script src="<?php echo env('BASE_URL');?>lib/raphael/raphael.min.js"></script>
    <script src="<?php echo env('BASE_URL');?>lib/morris.js/morris.min.js"></script>

    <script src="<?php echo env('BASE_URL');?>js/sweet-alert2.min.js"></script>
    <script src="<?php echo env('BASE_URL');?>js/toastr.js"></script>
    <script src="<?php echo env('BASE_URL');?>js/bracket.js"></script>
    <script src="<?php echo env('BASE_URL');?>js/ResizeSensor.js"></script>
    <script src="<?php echo env('BASE_URL');?>js/chart.morris.js"></script>

    <script type="text/javascript">
        jQuery(document).ready(function () {

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
            "timeOut": "8000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
          }
        });
    </script>
    @yield('docready')
    <script>
      $(function(){
        'use strict';

        $('#datatable-1').DataTable({
          bLengthChange: false,
          pageLength: 5,
          searching: false,
          sorting: false,
          responsive: true
        });
        $('#datatable-2').DataTable({
          bLengthChange: false,
          pageLength: 5,
          searching: false,
          sorting: false,
          responsive: true
        });
        $('#datatable-3').DataTable({
          bLengthChange: false,
          pageLength: 5,
          searching: false,
          sorting: false,
          responsive: true
        });
        $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
          $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust()
          .responsive.recalc();
        });
      });
    </script>
  </body>
  </html>
