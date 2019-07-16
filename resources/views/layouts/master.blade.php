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

        <?php if ($user->usr_role == "AD") { ?>
        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub <?php if($uri=='dashboard' || $uri=='noticeboard' || $uri=='activity-log'){echo 'active';}?>">
            <i class="tx-icon typcn typcn-th-large-outline tx-20 pd-r-2"></i>
            <span class="menu-item-label">Dashboard</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="<?php echo env('BASE_URL');?>dashboard" class="sub-link <?php if($uri=='dashboard'){echo 'active';}?>">Dashboard Cards</a></li>
            <li class="sub-item"><a href="<?php echo env('BASE_URL');?>noticeboard" class="sub-link <?php if($uri=='noticeboard'){echo 'active';}?>">Notice Board</a></li>
            <li class="sub-item"><a href="<?php echo env('BASE_URL');?>activity-log" class="sub-link <?php if($uri=='activity-log'){echo 'active';}?>">Activity Log</a></li>
          </ul>
        </li><!-- br-menu-item -->
        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub <?php if($uri=='ratecard' || $uri=='jobitems' || $uri=='assets' || $uri=='edit-company' || $uri=='edit-ship'){echo 'active';}?>">
            <i class="tx-icon typcn typcn-shopping-bag tx-24 pd-r-4"></i>
            <span class="menu-item-label">Data Assets</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="<?php echo env('BASE_URL');?>assets" class="sub-link <?php if($uri=='assets' || $uri=='edit-company' || $uri=='edit-ship'){echo 'active';}?>">Assets</a></li>
            <li class="sub-item"><a href="<?php echo env('BASE_URL');?>ratecard" class="sub-link <?php if($uri=='ratecard'){echo 'active';}?>">Rate Card</a></li>
            <li class="sub-item"><a href="<?php echo env('BASE_URL');?>jobitems" class="sub-link <?php if($uri=='jobitems'){echo 'active';}?>">Job Items</a></li>
          </ul>
        </li>
        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub <?php if($uri=='jobrecords' || $uri=='addnewjob' || $uri=='poacstatus' || $uri=='jobinfo' || $uri=='jobinfo-pilotage'){echo 'active';}?>">
            <i class="tx-icon typcn typcn-briefcase tx-24 pd-r-4"></i>
            <span class="menu-item-label">Operations</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="<?php echo env('BASE_URL');?>jobrecords" class="sub-link <?php if($uri=='jobrecords' || $uri=='jobinfo' || $uri=='jobinfo-pilotage'){echo 'active';}?>">Job Records</a></li>
            <li class="sub-item"><a href="<?php echo env('BASE_URL');?>addnewjob" class="sub-link <?php if($uri=='addnewjob'){echo 'active';}?>">Job Registration</a></li>
            <li class="sub-item"><a href="<?php echo env('BASE_URL');?>poacstatus" class="sub-link <?php if($uri=='poacstatus'){echo 'active';}?>">POAC Status</a></li>
          </ul>
        </li>
        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub <?php if($uri=='vouchersrecord' || $uri== "add-voucher" || $uri=='vouchersrecord-pilotage' || $uri=='submit-voucher' || $uri=='submit-voucher-pilotage'){echo 'active';}?>">
            <i class="tx-icon typcn typcn-document-text tx-24 pd-r-4"></i>
            <span class="menu-item-label">Vouchers</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item d-flex justify-content-between align-items-center">
              <a href="<?php echo env('BASE_URL');?>vouchersrecord" class="sub-link <?php if($uri=='vouchersrecord'){echo 'active';}?>">STS Records</a>
                <?php if ($countVoucherUnverified > 0) { ?>
                <span class="badge badge-success" data-toggle="tooltip-success" data-placement="right" title="{{$countVoucherUnverified}} Unverified Voucher">{{$countVoucherUnverified}}</span>
                <?php } ?>
            </li>

            <li class="sub-item d-flex justify-content-between align-items-center">
              <a href="<?php echo env('BASE_URL');?>submit-voucher" class="sub-link <?php if($uri=='submit-voucher'  || $uri== "add-voucher"){echo 'active';}?>">STS Submission</a>
                <?php if ($countStsNoVoucher > 0) { ?>
                <span class="badge badge-success" data-toggle="tooltip-success" data-placement="right" title="{{$countStsNoVoucher}} STS Job Voucher">{{$countStsNoVoucher}}</span>
                <?php } ?>
            </li>

            <li class="sub-item d-flex justify-content-between align-items-center">
              <a href="<?php echo env('BASE_URL');?>vouchersrecord-pilotage" class="sub-link <?php if($uri=='vouchersrecord-pilotage'){echo 'active';}?>">PLT Records</a>
                <?php if ($countVoucherPilotageUnverified > 0) { ?>
                <span class="badge badge-success" data-toggle="tooltip" data-placement="right" title="{{$countVoucherPilotageUnverified}} Unverified Voucher">{{$countVoucherPilotageUnverified}}</span>
                <?php } ?>
            </li>

            <li class="sub-item d-flex justify-content-between align-items-center">
              <a href="<?php echo env('BASE_URL');?>submit-voucher-pilotage" class="sub-link <?php if($uri=='submit-voucher-pilotage'){echo 'active';}?>">PLT Submission</a>
                <?php if ($countPilotageNoVoucher > 0) { ?>
                <span class="badge badge-success" data-toggle="tooltip" data-placement="right" title="{{$countPilotageNoVoucher}} PLT Job Voucher">{{$countPilotageNoVoucher}}</span>
                <?php } ?>
            </li>
          </ul>
        </li>
        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub">
            <i class="tx-icon typcn typcn-map tx-24 pd-r-5"></i>
            <span class="menu-item-label">Naveetrac ™</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="" class="sub-link" data-toggle="modal" data-target="#comingsoon">Coming Soon</a></li>
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
            <li class="sub-item"><a href="<?php echo env('BASE_URL');?>adduser" class="sub-link <?php if($uri=='adduser'){echo 'active';}?>">Registration</a></li>
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
            <li class="sub-item"><a href="" class="sub-link" data-toggle="modal" data-target="#comingsoon">Coming Soon</a></li>
          </ul>
        </li><!-- br-menu-item -->
        <hr>
        <li class="br-menu-item">
          <a href="#" class="br-menu-link" data-toggle="modal" data-target="#comingsoon">
            <i class="tx-icon typcn typcn-message tx-24 pd-r-5"></i>
            <span class="menu-item-label">Mailbox</span>
          </a><!-- br-menu-link -->
        </li><!-- br-menu-item -->
        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub <?php if($uri=='notifications'){echo 'active';}?>">
            <i class="tx-icon typcn typcn-cog-outline tx-24 pd-r-2"></i>
            <span class="menu-item-label">Settings</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="<?php echo env('BASE_URL');?>notifications" class="sub-link <?php if($uri=='notifications'){echo 'active';}?>">Notifications</a></li>
            <li class="sub-item"><a href="<?php echo env('BASE_URL');?>#" class="sub-link" data-toggle="modal" data-target="#comingsoon">Billing</a></li>
          </ul>
        </li><!-- br-menu-item -->


      <?php } ?>

      <?php if ($user->usr_role == "CP") { ?>

        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub <?php if($uri=='dashboard-poac' || $uri=='noticeboard' || $uri=='activity-log'){echo 'active';}?>">
            <i class="tx-icon typcn typcn-th-large-outline tx-20 pd-r-2"></i>
            <span class="menu-item-label">Dashboard</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="<?php echo env('BASE_URL');?>dashboard-poac" class="sub-link <?php if($uri=='dashboard-poac'){echo 'active';}?>">Dashboard Cards</a></li>
            <li class="sub-item"><a href="<?php echo env('BASE_URL');?>noticeboard" class="sub-link <?php if($uri=='noticeboard'){echo 'active';}?>">Notice Board</a></li>
            <!-- <li class="sub-item"><a href="<?php echo env('BASE_URL');?>activity-log" class="sub-link <?php if($uri=='activity-log'){echo 'active';}?>">Activity Log</a></li> -->
          </ul>
        </li><!-- br-menu-item -->

      <?php } ?>
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
              <span class="square-8 bg-success pos-absolute t-15 r-5 rounded-circle"></span>
              <!-- end: if statement -->
            </a>
            <div class="dropdown-menu dropdown-menu-header">
              <div class="dropdown-menu-label">
                <label>Notifications</label>
                <a href="">Mark All As Read</a>
              </div><!-- d-flex -->

              <div class="media-list">
                <!-- loop starts here -->
                <?php
                // echo '<pre>'; print_r($notification); die();
                // $msg = '';
                // foreach ($notification as $n) :
                //   if ($n->not_type == "newjob") {
                //     $msg .= "You have 1 job on ";
                //
                //     $note_explode = explode(' ', $n->not_foreign_note);
                //     $date1 = $note_explode[0];
                //     $time = $note_explode[1];
                //     $ampm = $note_explode[2];
                //     $date2 = date('M d Y', strtotime($date1));
                //     $msg .= '<strong>'.$date2.' '.$time.$ampm.'</strong>';
                //     $href = env('BASE_URL').'jobinfo/'.$n->not_foreign_id;
                //   }
                ?>
                <!-- <a href="<?php #echo $href;?>" class="media-list-link read">
                  <div class="media">
                    <div class="media-body">
                      <p class="noti-text"><?php #echo $msg;?> </p>
                      <span><?php #echo date('M d Y H:i:s', strtotime($n->not_created));?></span>
                    </div>
                  </div>
                </a> -->
                <?php
                // endforeach;
                ?>
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
              <span class="logged-name hidden-md-down">Hello, <?php echo $user->usr_firstname.' '.$user->usr_lastname;?>!</span>


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

      </div><!-- br-header-right -->
    </div><!-- br-header -->
    <!-- ########## END: HEAD PANEL ########## -->

    <!-- MODAL ALERT MESSAGE -->
    <div id="comingsoon" class="modal fade">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content tx-size-sm">
          <div class="modal-body tx-center pd-y-20 pd-x-20">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <div class="tx-center pd-l-20">
              <i class="icon typcn typcn-warning-outline tx-120 tx-success"></i>
            </div>
            <div class="tx-success tx-uppercase tx-spacing-1 tx-medium tx-18">Coming Soon</div>
            <p class="mg-b-30 mg-x-20">This section is currently under development. </p>
          </div><!-- modal-body -->
        </div><!-- modal-content -->
      </div><!-- modal-dialog -->
    </div><!-- modal -->

    <!-- ########## START: MAIN PANEL ########## -->
    @yield('content')

    <script src="<?php echo env('BASE_URL');?>lib/jquery/jquery.min.js"></script>
    <script src="<?php echo env('BASE_URL');?>lib/jquery/jquery.mockjax.min.js"></script>
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
    <script src="<?php echo env('BASE_URL');?>js/tooltip-colored.js"></script>

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
        $('[data-toggle="tooltip"]').tooltip()

        var dataTable = $('#datatable-1').DataTable( {
         "bLengthChange": false,
         "paging": true,
         "ordering": false,
         "info": true,
         "sDom": 'ltipr'
        });

        var dataTable2 = $('#datatable-2').DataTable( {
        "bLengthChange": false,
        "paging": true,
        "ordering": false,
        "info": true,
        "sDom": 'ltipr'
        });

        var dataTable3 = $('#datatable-3').DataTable( {
        "bLengthChange": false,
        "paging": true,
        "ordering": false,
        "info": true,
        "sDom": 'ltipr'
        });

        $('#filterbox-fsu').keyup(function() {
          dataTable.search(this.value).draw();
         });

        $('#filterbox-spot').keyup(function() {
          dataTable2.search(this.value).draw();
         });

        $('#filterbox-pilotage').keyup(function() {
          dataTable3.search(this.value).draw();
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
