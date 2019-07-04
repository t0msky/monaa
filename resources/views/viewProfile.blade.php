@extends('layouts.master')

@section('content')
<div class="br-subleft">
  <div class="widget-4">
    <div class="card-profile-img pd-t-10">
      <?php if ($profile->usr_pic != '') { ?>
      <img src="<?php echo env('BASE_URL');?>img/pic/<?php echo $profile->usr_pic;?>" >
      <?php } else { ?>
      <img src="<?php echo env('BASE_URL');?>img/default.png" >
      <?php } ?>
    </div><!-- card-profile-img -->
    <div class="pd-t-140 tx-center">
      <div class="justify-content-between align-items-center mg-t-20 pd-x-10 bd-b bd-white-1 pd-b-5">
        <div class="tx-capitalize tx-14 mg-b-0 tx-white-7"><?php echo $profile->usr_firstname.' '.$profile->usr_lastname;?></div>
      </div>

      <div class="mg-b-25 pd-x-10 pd-t-5">ON-<?php echo $profile->usr_employment_id;?></div>
    </div><!-- row-->
  </div><!-- widget-4-->
</div><!-- br-subleft -->

<div class="br-contentpanel">
  <div class="br-pageheader pd-y-15 pd-md-l-20">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
      <span class="breadcrumb-item active">Personnels</span>
      <a class="breadcrumb-item" href="personnel-board.html">Personnel Board</a>
      <span class="breadcrumb-item active">User Profile</span>
    </nav>
  </div><!-- br-pageheader -->

  <div class="br-pagetitle pd-t-20">
    <i class="icon typcn typcn-user tx-24"></i>
    <div>
      <h4 class="pd-y-15">Personnels</h4>
    </div>

  </div><!-- d-flex -->

  <div class="d-flex align-items-center justify-content-start pd-x-20 pd-sm-x-30 mg-b-20 mg-sm-b-30">
    <button id="showSubLeft" class="btn btn-secondary mg-r-10 hidden-lg-up"><i class="fa fa-navicon"></i></button>

    <!-- START: DISPLAYED FOR MOBILE ONLY -->
    <div class="dropdown hidden-sm-up">
      <a href="#" class="btn btn-outline-secondary" data-toggle="dropdown"><i class="icon ion-more"></i></a>
      <div class="dropdown-menu pd-10">
        <nav class="nav nav-style-1 flex-column">
          <a href="" class="nav-link">Share</a>
          <a href="" class="nav-link">Download</a>
          <div class="dropdown-divider"></div>
          <a href="" class="nav-link">Edit</a>
          <a href="" class="nav-link">Delete</a>
        </nav>
      </div><!-- dropdown-menu -->
    </div><!-- dropdown -->
    <!-- END: DISPLAYED FOR MOBILE ONLY -->
  </div><!-- d-flex -->

  <div class="br-pagebody pd-x-20 pd-sm-x-30 pd-b-40">
    <div class="row row-sm mg-t-20">
      <div class="col-lg mg-t-20 mg-lg-t-0">
        <div class="card shadow-base bd-0">

          <div class="card-header bg-transparent pd-x-25 pd-y-25 d-flex justify-content-between align-items-center">
            <div class="card-title tx-capitalize mg-b-0">User Profile</div>
            <?php
            if ($profile->usr_id == $user->usr_id) {
              echo '<div class="form-layout-footer mg-l-auto hidden-xs-down">';
              echo "<a href='".env('BASE_URL')."profile' class='btn btn-info'>Edit My Profile</a>";
              echo '</div>';
            }
            ?>
          </div><!-- card-header -->

          <div class="card">
            <div class="card-header">
              <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                  <a class="nav-link active" href="#t01" data-toggle="tab">User Profile</a>
                </li>

              </ul>
            </div><!-- card-header -->

            <div class="tab-content">
              <div class="tab-pane active" id="t01">
                <form method="post" action="<?php echo env('BASE_URL');?>profile" data-parsley-validate data-parsley-errors-messages-disabled>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <?php
                if ($user->usr_role == 'AD') {
                  $disabled = "";
                  $ad = ' selected';
                  $cp = ' ';
                  $role = "Admin";
                } else {
                  $disabled = " disabled";
                  $cp = ' selected';
                  $ad = ' ';
                  $role = "Pilot";
                }
                ?>
                  <div class="form-layout form-layout-1">
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="row mg-b-10">
                          <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label">Employment ID </label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <div class="input-group-text">
                                    <div class="tx-uppercase tx-gray-500">ON</div>
                                  </div>
                                </div><!-- input-group-prepend -->
                                <input class="form-control" type="text" name="usr_employment_id" value="<?php echo $profile->usr_employment_id;?>" required <?php echo $disabled;?>>
                              </div><!-- input-group -->
                            </div>
                          </div><!-- col-6 -->
                          <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label">Roles</label>

                              <select class="form-control select2" style="width: 100%" name="usr_role" data-placeholder="Choose one" required <?php echo $disabled;?>>
                                <option label="Choose Roles"></option>
                                <option value="AD" <?php if($profile->usr_role=="AD"){echo ' selected';}?>>Administration</option>
                                <option value="CP" <?php if($profile->usr_role=="CP"){echo ' selected';}?>>Mooring Master</option>
                              </select>
                            </div>
                          </div><!-- col-6 -->
                        </div><!-- row -->
                        <div class="row mg-b-10">
                          <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label">Firstname <span class="tx-danger">*</span></label>
                              <input class="form-control" type="text" name="usr_firstname" value="<?php echo $profile->usr_firstname;?>" placeholder="Enter Firstname" required <?php echo $disabled;?>>
                            </div>
                          </div><!-- col-6 -->
                          <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label">Lastname <span class="tx-danger">*</span></label>
                              <input class="form-control" type="text" name="usr_lastname" value="<?php echo $profile->usr_lastname;?>" placeholder="Enter Lastname" required <?php echo $disabled;?>>
                            </div>
                          </div><!-- col-6 -->

                        </div><!-- row -->
                        <div class="row mg-b-10">
                          <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label">NRIC <span class="tx-danger">*</span></label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <div class="input-group-text">
                                    <!-- <i class="fa fa fa-address-card-o tx-16 lh-0 op-6"></i> -->
                                    <i class="icon ion-android-person tx-16 lh-0 op-6"></i>
                                  </div>
                                </div><!-- input-group-prepend -->
                                <input id="nric" type="text" class="form-control" name="usr_nric" value="<?php echo $profile->usr_nric;?>" required <?php echo $disabled;?>>
                              </div><!-- input-group -->
                            </div>
                          </div><!-- col-6 -->
                          <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label">Date Of Birth <span class="tx-danger">*</span></label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <div class="input-group-text">
                                    <i class="icon ion-calendar tx-16 lh-0 op-6"></i>
                                  </div>
                                </div>
                                <input id="dob" type="text" name="usr_dob" class="form-control" required <?php echo $disabled;?> value="<?php echo $profile->usr_dob;?>">
                              </div>
                            </div>
                          </div><!-- col-6 -->
                          <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label">Citizen </label>
                              <input class="form-control" type="text" name="usr_citizen" value="<?php echo $profile->usr_citizen;?>" required <?php echo $disabled;?>>
                            </div>
                          </div><!-- col-6 -->
                        </div><!-- row -->
                        <div class="row mg-b-10">
                          <div class="col-lg-12">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label">Residential Address <span class="tx-danger">*</span></label>
                              <input class="form-control" type="text" name="usr_add1" value="<?php echo $profile->usr_add1;?>" required <?php echo $disabled;?>>
                            </div>
                            <div class="form-group mg-b-10-force">
                              <input class="form-control" type="text" name="usr_add2" value="<?php echo $profile->usr_add2;?>" required <?php echo $disabled;?>>
                            </div>
                          </div><!-- col-12 -->
                        </div><!-- row -->
                        <div class="row mg-b-10">
                          <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label">Postal Code </label>
                              <input class="form-control" type="number" name="usr_postcode" value="<?php echo $profile->usr_postcode;?>" required <?php echo $disabled;?>>
                            </div>
                          </div><!-- col-6 -->
                          <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label">State / Region </label>
                              <input class="form-control" type="text" name="usr_state" value="<?php echo $profile->usr_state;?>" required <?php echo $disabled;?>>
                            </div>
                          </div><!-- col-6 -->
                        </div><!-- row -->
                        <div class="row mg-b-10">
                          <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label">Country </label>
                              <input class="form-control" type="text" name="usr_country" value="<?php echo $profile->usr_country;?>" required <?php echo $disabled;?>>
                            </div>
                          </div><!-- col-6 -->
                          <div class="col-lg-6">

                          </div><!-- col-8 -->
                        </div><!-- row -->
                      </div><!-- col-6 -->
                      <div class="col-lg-6">
                        <div class="row mg-b-10">
                          <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label">Education </label>
                              <select class="form-control select2" name="usr_education" style="width: 100%" required <?php echo $disabled;?>>
                                <option label="Choose Education"></option>
                                <option value="Master/PHD" <?php if($profile->usr_education == "Master/PHD"){ echo ' selected';} ?>>Master/PHD</option>
                                <option value="Bachelor Degree" <?php if($profile->usr_education == "Bachelor Degree"){ echo ' selected';} ?>>Bachelor Degree</option>
                                <option value="Diploma" <?php if($profile->usr_education == "Diploma"){ echo ' selected';} ?>>Diploma</option>
                                <option value="Certificate" <?php if($profile->usr_education == "CertificateD"){ echo ' selected';} ?>>Certificate</option>
                              </select>
                            </div>
                          </div><!-- col-6 -->
                          <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label">Qualification </label>
                              <input class="form-control" type="text" name="usr_qualification" value="<?php echo $profile->usr_qualification;?>" required <?php echo $disabled;?>>
                            </div>
                          </div><!-- col-6 -->
                        </div><!-- row -->
                        <div class="row mg-b-10">
                          <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label">Appointed Position </label>
                              <input class="form-control" type="text" name="usr_jobtitle" value="<?php echo $profile->usr_jobtitle;?>" required <?php echo $disabled;?>>
                            </div>
                          </div><!-- col-6 -->
                          <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label">Assigned Division </label>
                              <select class="form-control select2" name="usr_division" style="width: 100%" required <?php echo $disabled;?>>
                                <option label="Choose Division"></option>
                                <option value="Administration" <?php if($profile->usr_division == "Administration"){ echo ' selected';} ?>>Administration</option>
                                <option value="Operation" <?php if($profile->usr_division == "Operation"){ echo ' selected';} ?>>Operation</option>
                                <option value="Finance" <?php if($profile->usr_division == "Finance"){ echo ' selected';} ?>>Finance</option>
                                <option value="Technical" <?php if($profile->usr_division == "Technical"){ echo ' selected';} ?>>Technical</option>
                              </select>
                            </div>
                          </div><!-- col-6 -->
                        </div><!-- row -->
                        <div class="row mg-b-10">
                          <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label">Employment </label>
                              <select class="form-control select2" name="usr_employment" style="width: 100%" required <?php echo $disabled;?>>
                                <option label="Choose Employment"></option>
                                <option value="Permanent" <?php if($profile->usr_employment == "Permanent"){ echo ' selected';} ?>>Permanent</option>
                                <option value="Contract" <?php if($profile->usr_employment == "Contract"){ echo ' selected';} ?>>Contract</option>
                                <option value="Freelancer" <?php if($profile->usr_employment == "Freelancer"){ echo ' selected';} ?>>Freelancer</option>
                                <option value="Internship" <?php if($profile->usr_employment == "Internship"){ echo ' selected';} ?>>Internship</option>
                              </select>
                            </div>
                          </div><!-- col-6 -->
                          <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label">Contact No <span class="tx-danger">*</span></label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <div class="input-group-text">
                                    <i class="fa fa-phone tx-16 lh-0 op-6"></i>
                                  </div>
                                </div><!-- input-group-prepend -->
                                <input id="phoneMask" type="text" name="usr_mobile" value="<?php echo $profile->usr_mobile;?>" class="form-control" required <?php echo $disabled;?>>
                              </div><!-- input-group -->
                            </div>
                          </div><!-- col-6 -->
                        </div><!-- row -->
                        <div class="row mg-b-10">
                          <div class="col-lg-12">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label">Email Address <span class="tx-danger">*</span></label>
                              <input type="email" name="usr_email" value="<?php echo $profile->usr_email;?>" class="form-control" required <?php echo $disabled;?>>
                            </div>
                          </div><!-- col-12 -->
                        </div><!-- row -->
                      </div><!-- col-6 -->
                    </div><!-- row -->
                  </div><!-- form-layout -->
                  <div class="modal-footer">
                    <?php if ($role == 'Admin') { ?>
                    <input type="hidden" name="tab" value="profile">
                    <input type="hidden" name="usr_id" value="<?php echo $profile->usr_id;?>">
                    <button type="submit" class="btn btn-info">Save Profile</button>
                    <!-- <button type="reset" class="btn btn-secondary" data-dismiss="modal">Deactivate</button> -->
                    <?php } ?>

                  </div><!-- form-layout-footer -->
                  </form>
              </div><!-- tab-pane -->

            </div><!-- tab-content -->
          </div><!-- card -->
        </div><!-- card -->
      </div><!-- col-6 -->
    </div><!-- row -->
  </div><!-- br-pagebody -->
</div><!-- br-contentpanel -->

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
    });
</script>
<script>
  $(function(){
    'use strict';


    $('body').addClass("collapsed-menu with-subleft");

    // show only the icons and hide left menu label by default
    $('.menu-item-label,.menu-item-arrow').addClass('op-lg-0-force d-lg-none');

    $(document).on('mouseover', function(e){
      e.stopPropagation();
      if($('body').hasClass('collapsed-menu')) {
        var targ = $(e.target).closest('.br-sideleft').length;
        if(targ) {
          $('body').addClass('expand-menu');

          // show current shown sub menu that was hidden from collapsed
          $('.show-sub + .br-menu-sub').slideDown();

          var menuText = $('.menu-item-label,.menu-item-arrow');
          menuText.removeClass('d-lg-none');
          menuText.removeClass('op-lg-0-force');

        } else {
          $('body').removeClass('expand-menu');

          // hide current shown menu
          $('.show-sub + .br-menu-sub').slideUp();

          var menuText = $('.menu-item-label,.menu-item-arrow');
          menuText.addClass('op-lg-0-force');
          menuText.addClass('d-lg-none');
        }
      }
    });

    // Showing sub left menu
    $('#showSubLeft').on('click', function(){
      if($('body').hasClass('show-subleft')) {
        $('body').removeClass('show-subleft');
      } else {
        $('body').addClass('show-subleft');
      }
    });

  });
</script>
<script>

  $('.disabled').click(function(e){
    e.preventDefault();
  })
  $(".select2").select2({
    width: 'resolve' // need to override the changed default
  });
  $(function(){
    'use strict';
  });
  // Datepicker
  $('#dob').datepicker({
    showOtherMonths: true,
    selectOtherMonths: true
  });

  // Input Masks
  $('#phoneMask').mask('(999) 999-9999');
  $('#nric').mask('999999-99-9999');
</script>
@stop
