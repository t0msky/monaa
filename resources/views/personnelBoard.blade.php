@extends('layouts.master')

@section('content')
<!-- <div class="br-subleft">

  <nav class="nav br-nav-mailbox flex-column">
    <a href="" class="nav-link active"><i class="icon typcn typcn-user tx-24"></i> Display All </a>
    <a href="" class="nav-link"><i class="icon typcn typcn-user tx-24"></i> Freelancers</a>
    <a href="" class="nav-link"><i class="icon typcn typcn-user tx-24"></i> Administration</a>
    <a href="" class="nav-link"><i class="icon typcn typcn-user tx-24"></i> In-house Pilots</a>
  </nav>
</div> -->

<div class="br-contentpanel">
  <div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
      <span class="breadcrumb-item active">Personnels</span>
      <span class="breadcrumb-item active">Personnel Board</span>
    </nav>
  </div><!-- br-pageheader -->

  <div class="br-pagetitle hidden-xs-down">
    <i class="icon typcn typcn-user tx-24"></i>
    <div>
      <h4 class="pd-y-15">Personnels</h4>
    </div>
    <?php if ($user->usr_role == "AD") { ?>
    <div class="form-layout-footer mg-r-auto hidden-xs-down">
      <a href="" class="btn btn-light" data-toggle="modal" data-target="#user-approv">User Approval<span class="badge badge-success mg-l-10" data-toggle="tooltip-success" data-placement="top" title="<?php echo sizeof($approvals);?> user approval"><?php echo sizeof($approvals);?></span></a>
    </div>
    <div class="form-layout-footer mg-l-auto hidden-xs-down">
      <a href="<?php echo env('BASE_URL');?>adduser" class="btn btn-info"><i class="fas fa-plus tx-14 tx-white mg-r-10"></i>New Registration</a>
    </div>
    <?php } ?>
  </div><!-- d-flex -->

  <div class="br-pagebody pd-x-20 pd-sm-x-30 pd-b-30">
    <div class="card bd-0 shadow-base">
      <div class="card-header bg-transparent pd-x-25 pd-y-25 d-flex justify-content-between align-items-center">
        <div class="card-title mg-b-0">Personnel Board</div>
      </div><!-- card-header -->

      <div class="card">
        <div class="card-header">
          <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
              <a class="nav-link active" href="#t01" data-toggle="tab"><i class="fa fa-caret-right tx-success mg-r-10"></i>Advisor / Pilot / Mooring Master</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#t02" data-toggle="tab"><i class="fa fa-caret-right tx-success mg-r-10"></i>Administration</a>
            </li>
          </ul>
        </div><!-- card-header -->
        <div class="tab-content pd-y-20">
          <div class="tab-pane active" id="t01">
            <table class="table mg-b-0 table-contact">
              <thead>
                <tr>
                  <th class="wd-2p">
                    <label class="ckbox mg-b-0">
                      <!-- <input type="checkbox"><span></span> -->#
                    </label>
                  </th>
                  <th class="wd-30p">Personnel Name</th>
                  <th class="wd-20p">Email</th>
                  <th class="wd-15p">Position</th>
                  <th class="wd-10p">Employment</th>
                  <th class="wd-10p">Phone</th>
                  <th class="wd-5p hidden-xs-down">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach ($poac as $p) :
                ?>
                <tr>
                  <td class="valign-middle">
                    <label class="ckbox mg-b-0">
                      <?php echo $no;?>
                      <!-- <input type="checkbox"><span></span> -->
                    </label>
                  </td>
                  <td>
                    <div class="d-flex align-items-center">
                      <div class="nav-link-2 nav-link-profile-2">
                      <?php if ($p->usr_pic != '') { ?>
                      <img src="<?php echo env('BASE_URL');?>img/pic/<?php echo $p->usr_pic;?>" class="wd-40 rounded-circle">
                      <?php } else { ?>
                      <img src="<?php echo env('BASE_URL');?>img/default.png" class="wd-40 rounded-circle">
                      <?php } ?>
                        <span class="square-10 bg-success"></span>
                      </div>
                      <div class="mg-l-15">
                        <div><a href="<?php echo env('BASE_URL');?>view-profile/<?php echo $p->usr_id;?>" class="nav-link"><?php echo $p->usr_firstname.' '.$p->usr_lastname;?></a></div>
                      </div>
                    </div>
                  </td>
                  <td>
                    <?php
                      if ($p->usr_active == "Yes") {
                        echo '<i class="icon ion-checkmark tx-success pd-r-10" data-toggle="tooltip-success" data-placement="left" title="Email Verified"></i> ';
                      } else {
                        echo '<i class="icon ion-close tx-danger pd-r-10" data-toggle="tooltip-success" data-placement="left" title="Email Unverified"></i>  ';
                      }
                      echo $p->usr_email;
                    ?>
                </td>
                  <td><?php echo $p->usr_jobtitle;?></td>
                  <td><?php echo $p->usr_employment;?></td>
                  <td><?php echo $p->usr_mobile;?></td>
                  <td class="dropdown hidden-xs-down">
                    <a href="#" data-toggle="dropdown" class="pd-y-3 tx-gray-500 hover-info tx-20"><i class="icon ion-more"></i></a>
                    <div class="dropdown-menu dropdown-menu-right pd-10">
                      <nav class="nav nav-style-2 flex-column">
                        <a href="<?php echo env('BASE_URL');?>view-profile/<?php echo $p->usr_id;?>" class="nav-link">Personnel Profile</a>
                        <?php if ($user->usr_role == "AD") { ?>
                        <a href="" class="nav-link deleteUser" modal_user_id="<?php echo $p->usr_id;?>" tab="#t01" data-toggle="modal" data-target="#deletealert">Delete</a>
                        <?php } ?>
                      </nav>
                    </div><!-- dropdown-menu -->
                  </td>
                </tr>
                <?php
                $no = $no + 1;
                endforeach;
                ?>
              </tbody>
            </table>
          </div><!-- tab-pane -->

          <div class="tab-pane" id="t02">
            <table class="table mg-b-0 table-contact">
              <thead>
                <tr>
                  <th class="wd-2p">
                    <label class="ckbox mg-b-0">
                      <!-- <input type="checkbox"><span></span> -->#
                    </label>
                  </th>
                  <th class="wd-30p">Personnel Name</th>
                  <th class="wd-20p">Email</th>
                  <th class="wd-15p">Position</th>
                  <th class="wd-10p">Employment</th>
                  <th class="wd-10p">Phone</th>
                  <th class="wd-5p hidden-xs-down">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach ($admins as $a) :
                ?>
                <tr>
                  <td class="valign-middle">
                    <label class="ckbox mg-b-0">
                      <!-- <input type="checkbox"><span></span> --><?php echo $no;?>
                    </label>
                  </td>
                  <td>
                    <div class="d-flex align-items-center">
                      <div class="nav-link-2 nav-link-profile-2">
                      <?php if ($a->usr_pic != '') { ?>
                      <img src="<?php echo env('BASE_URL');?>img/pic/<?php echo $a->usr_pic;?>" class="wd-40 rounded-circle">
                      <?php } else { ?>
                      <img src="<?php echo env('BASE_URL');?>img/default.png" class="wd-40 rounded-circle">
                      <?php } ?>
                      <span class="square-10 bg-success"></span>
                      </div>
                      <div class="mg-l-15">
                        <div><?php echo $a->usr_firstname.' '.$a->usr_lastname;?></div>
                      </div>

                    </div>
                  </td>
                  <td>
                    <?php
                      if ($a->usr_active == "Yes") {
                        echo '<i class="icon ion-checkmark tx-success pd-r-10" data-toggle="tooltip-success" data-placement="left" title="Email Verified"></i> ';
                      } else {
                        echo '<i class="icon ion-close tx-danger pd-r-10" data-toggle="tooltip-success" data-placement="left" title="Email Unverified"></i>  ';
                      }
                      echo $a->usr_email;
                    ?>
                </td>
                  <td><?php echo $a->usr_jobtitle;?></td>
                  <td><?php echo $a->usr_employment;?></td>
                  <td><?php echo $a->usr_mobile;?></td>
                  <td class="dropdown hidden-xs-down">
                    <a href="#" data-toggle="dropdown" class="pd-y-3 tx-gray-500 hover-info tx-22"><i class="icon ion-more"></i></a>
                    <div class="dropdown-menu dropdown-menu-right pd-10">
                      <nav class="nav nav-style-2 flex-column">
                        <a href="<?php echo env('BASE_URL');?>view-profile/<?php echo $a->usr_id;?>" class="nav-link">Personnel Profile</a>
                      </nav>
                    </div><!-- dropdown-menu -->
                  </td>
                </tr>
                <?php
                $no = $no + 1;
                endforeach;
                ?>
              </tbody>
            </table>
          </div><!-- tab-pane -->
        </div><!-- tab-content -->
      </div><!-- card -->
    </div>
  </div><!-- br-pagebody -->
</div><!-- br-contentpanel -->

<!-- MODAL ALERT MESSAGE -->

<div id="user-approv" class="modal fade">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content tx-size-sm">
          <div class="modal-header pd-x-20">
            <div class="card-title mg-b-0 pd-l-10">User Registration Approval</div>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <table class="table mg-b-10 table-contact">
              <thead>
                <tr>
                  <th class="wd-2p">
                    #
                  </th>
                  <th class="wd-30p">Personnel Name</th>
                  <th class="wd-20p">Email</th>
                  <th class="wd-15p">Date/Time</th>
                  <!-- <th class="wd-20p">Assign To</th> -->
                  <th class="wd-5p hidden-xs-down">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach ($approvals as $a) :
                ?>
                <tr>
                  <td class="valign-middle"><?php echo $no;?></td>
                  <td><?php echo $a->usr_firstname.' '.$a->usr_lastname;?></td>
                  <td>
                    <?php
                      if ($a->usr_active == "Yes") {
                        echo '<i class="icon ion-checkmark tx-success pd-r-10" data-toggle="tooltip-success" data-placement="left" title="Email Verified"></i> ';
                      } else {
                        echo '<i class="icon ion-close tx-danger pd-r-10" data-toggle="tooltip-success" data-placement="left" title="Email Unverified"></i>  ';
                      }
                      echo $a->usr_email;
                    ?>
                </td>
                  <td><?php echo date('d M Y, H:i A', strtotime($a->usr_created));?></td>
                  <!-- <td>
                      <select class="form-control" name="usr_role" style="width: 100%" data-placeholder="Choose one" required>

                        <option value="CP">POAC</option>
                        <option value="AD">Administration</option>
                      </select>
                  </td> -->
                  <td class="dropdown hidden-xs-down tx-center">
                    <a href="#" data-toggle="dropdown" class="pd-y-3 tx-gray-500 hover-info tx-18"><i class="icon ion-more"></i></a>
                    <div class="dropdown-menu dropdown-menu-right pd-10">
                      <nav class="nav nav-style-2 flex-column">
                        <a href="<?php echo env('BASE_URL');?>approve-user/<?php echo $a->usr_id;?>" class="nav-link">Approve</a>
                        <a href="" class="nav-link deleteUser" modal_user_id="<?php echo $a->usr_id;?>" tab="#t03" data-toggle="modal" data-target="#deletealert">Delete</a>
                      </nav>
                    </div><!-- dropdown-menu -->
                  </td>
                </tr>
                <?php
                $no = $no + 1;
                endforeach;
                ?>
              </tbody>
            </table>


          </div><!-- modal-body -->
        </div>
      </div><!-- modal-dialog -->
    </div><!-- modal -->

<div id="deletealert" class="modal fade">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content tx-size-sm">
      <div class="modal-body tx-center pd-y-20 pd-x-20">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <div class="tx-center pd-l-20">
          <i class="icon typcn typcn-trash tx-120 tx-success"></i>
        </div>
        <form method="post" action="<?php echo env('BASE_URL');?>delete-user" data-parsley-validate data-parsley-errors-messages-disabled id="selectForm-sts">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="user_id" id="user_id">
          <input type="hidden" name="tab" id="tab">
          <div class="tx-success tx-uppercase tx-spacing-1 tx-medium tx-18">Delete User. Are you sure?</div>
          <p class="mg-b-30 mg-x-20">You will not be able to recover this data!</p>
          <button type="submit" class="btn btn-info" >Yes, Confirm</button>
          <!-- <a href="" class="btn btn-info"  data-dismiss="modal" aria-label="Close">Yes, Confirm</a> -->
        </form>
      </div><!-- modal-body -->
    </div><!-- modal-content -->
  </div><!-- modal-dialog -->
</div><!-- modal -->
@stop

@section('docready')
<script type="text/javascript">
    jQuery(document).ready(function () {

      <?php if(session()->has('success')){?>
        toastr.success('<?php echo session()->get('success'); ?>')
      <?php } ?>
      <?php if(session()->has('error')){?>
        toastr.error('<?php echo session()->get('error'); ?>')
      <?php } ?>

      // Javascript to enable link to tab
      var url = document.location.toString();
      if (url.match('#')) {
        $('.nav-tabs a[href="#' + url.split('#')[1] + '"]').tab('show');
      }

      // Change hash for page-reload
      $('.nav-tabs a').on('shown.bs.tab', function (e) {
        window.location.hash = e.target.hash;
      })

      $('.deleteUser').on('click', function(){

        var user_id = $(this).attr('modal_user_id');
        var tab = $(this).attr('tab');
        $('#user_id').val(user_id);
        $('#tab').val(tab);

      })
    });
</script>
@stop
