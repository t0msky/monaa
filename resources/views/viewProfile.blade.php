@extends('layouts.master')

@section('content')
<div class="br-subleft">
  <div class="widget-4">

    <div class="avatar-upload-2">
      <div class="avatar-preview">
      <?php if ($profile->usr_pic != '') { ?>
      <img src="<?php echo env('BASE_URL');?>img/pic/<?php echo $profile->usr_pic;?>" >
      <?php } else { ?>
      <img src="<?php echo env('BASE_URL');?>img/default.png" >
      <?php } ?>
       </div><!-- card-profile-img -->
    </div><!-- card-profile-img -->

    <div class="tx-center">
      <div class="justify-content-between align-items-center mg-t-20 pd-x-10 bd-b bd-white-1 pd-b-5">
        <div class="tx-capitalize tx-14 mg-b-0 tx-white-7"><?php echo $profile->usr_firstname.' '.$profile->usr_lastname;?></div>
      </div>

      <div class="mg-b-25 pd-x-10 pd-t-5">ON<?php echo $profile->usr_employment_id;?></div>
    </div><!-- row-->
  </div><!-- widget-4-->
</div><!-- br-subleft -->

<div class="br-contentpanel">
  <div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
      <span class="breadcrumb-item active">Personnels</span>
      <a class="breadcrumb-item" href="personnel-board.html">Personnel Board</a>
      <span class="breadcrumb-item active">User Profile</span>
    </nav>
  </div><!-- br-pageheader -->

  <div class="br-pagetitle hidden-xs-down">
    <i class="icon typcn typcn-user tx-24"></i>
    <div>
      <h4 class="pd-y-15">Personnels</h4>
    </div>
    <?php
            if ($profile->usr_id == $user->usr_id) {
              echo '<div class="form-layout-footer mg-l-auto hidden-xs-down">';
              echo "<a href='".env('BASE_URL')."profile' class='btn btn-info'>Edit My Profile</a>";
              echo '</div>';
            }
            ?>
  </div><!-- d-flex -->

  <div class="br-pagebody pd-x-20 pd-sm-x-30 pd-b-30">
    <div class="row row-sm">
      <div class="col-lg mg-lg-t-0">
        <div class="card shadow-base bd-0">

          <div class="card-header bg-transparent pd-x-25 pd-y-25 d-flex justify-content-between align-items-center">
            <div class="card-title tx-capitalize mg-b-0">User Profile</div>

          </div><!-- card-header -->

          <div class="card">
            <div class="card-header">
              <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                  <a class="nav-link active" href="#t01" data-toggle="tab"><i class="fa fa-caret-right tx-success mg-r-10"></i>User Profile</a>
                </li>

              </ul>
            </div><!-- card-header -->

            <div class="tab-content">
              <div class="tab-pane active" id="t01">
                <?php if ($user->usr_role == 'AD') { ?>
                <form method="post" action="<?php echo env('BASE_URL');?>profile" data-parsley-validate data-parsley-errors-messages-disabled>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <?php } ?>
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
                  <div class="card-body color-gray-lighter pd-t-0">
                    <div class="row row-sm mg-t-20 pd-b-20">
                      <div class="col-lg-6 mg-t-20 mg-lg-t-0">
                        <table class="table mg-b-0">
                          <thead style='visibility: collapse;'>
                            <tr>
                             <th class="wd-35p">Name</th>
                             <th>Position</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                            <td>Employment ID</td>
                            <td>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <div class="input-group-text">
                                    <div class="tx-uppercase tx-gray-500">ON</div>
                                  </div>
                                </div><!-- input-group-prepend -->
                                <input id="employid" class="form-control" type="text" name="usr_employment_id" value="<?php echo $profile->usr_employment_id;?>" placeholder="00-0000" required <?php echo $disabled;?>>
                              </div><!-- input-group -->
                              </td>
                            </tr>
                            <tr>
                            <td>Roles</td>
                            <td>
                              <select class="form-control select2" style="width: 100%" name="usr_role" data-placeholder="Choose one" required <?php echo $disabled;?>>
                                <option label="Choose Roles"></option>
                                <option value="AD" <?php if($profile->usr_role=="AD"){echo ' selected';}?>>Administration</option>
                                <option value="CP" <?php if($profile->usr_role=="CP"){echo ' selected';}?>>Mooring Master</option>
                              </select>
                              </td>
                            </tr>
                            <tr>
                            <td>First Name</td>
                            <td>
                              <input class="form-control bd-transparent" type="text" name="usr_firstname" value="<?php echo $profile->usr_firstname;?>" placeholder="Enter Firstname" required <?php echo $disabled;?>>
                              </td>
                            </tr>
                            <tr>
                            <td>Last Name</td>
                            <td>
                              <input class="form-control bd-transparent" type="text" name="usr_lastname" value="<?php echo $profile->usr_lastname;?>" placeholder="Enter Lastname" required <?php echo $disabled;?>>
                              </td>
                            </tr>
                            <tr>
                            <td>NRIC / Passport No.</td>
                            <td>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <div class="input-group-text">
                                    <!-- <i class="fa fa fa-address-card-o tx-16 lh-0 op-6"></i> -->
                                    <i class="icon ion-android-person tx-16 lh-0 op-6"></i>
                                  </div>
                                </div><!-- input-group-prepend -->
                                <input id="nric" type="text" class="form-control" name="usr_nric" value="<?php echo $profile->usr_nric;?>" placeholder="00000000-00-0000" required <?php echo $disabled;?>>
                              </div><!-- input-group -->
                              </td>
                            </tr>
                            <tr>
                            <td>Date Of Birth (DOB)</td>
                            <td>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <div class="input-group-text">
                                    <i class="icon ion-calendar tx-16 lh-0 op-6"></i>
                                  </div>
                                </div>
                                <input id="dob" type="text" name="usr_dob" class="form-control" placeholder="MM/DD/YYYY"  required <?php echo $disabled;?> value="<?php echo $profile->usr_dob;?>">
                              </div>
                              </td>
                            </tr>
                            <tr>
                            <td>Citizenship</td>
                            <td>
                              <input class="form-control" type="text" name="usr_citizen" value="<?php echo $profile->usr_citizen;?>" placeholder="Insert Citizenship" required <?php echo $disabled;?>>
                              </td>
                            </tr>
                            <tr>
                            <td>Residential Address</td>
                            <td>
                               <input class="form-control" type="text" name="usr_add1" value="<?php echo $profile->usr_add1;?>" placeholder="Address Line 1" required <?php echo $disabled;?>>
                               <input class="form-control mg-t-10" type="text" name="usr_add2" value="<?php echo $profile->usr_add2;?>" placeholder="Address Line 2" required <?php echo $disabled;?>>
                              </td>
                            </tr>
                            <tr>
                            <td>Postal Code</td>
                            <td>
                              <input id="postal" class="form-control" type="text" name="usr_postcode" value="<?php echo $profile->usr_postcode;?>" placeholder="00000" required <?php echo $disabled;?>>
                              </td>
                            </tr>
                            <tr>
                            <td>State / Region</td>
                            <td>
                              <select class="form-control bd-transparent select2-show-search" style="width: 100%" name="usr_state" value="<?php echo $profile->usr_state;?>" <?php echo $disabled;?>>
                              <option>Choose State / Region</option>
                              <option value="Johor" <?php if($profile->usr_state == "Johor"){ echo 'selected';} ?>>Johor</option>
                              <option value="Kedah" <?php if($profile->usr_state == "Kedah"){ echo 'selected';} ?>>Kedah</option>
                              <option value="Kelantan" <?php if($profile->usr_state == "Kelantan"){ echo 'selected';} ?>>Kelantan</option>
                              <option value="Kuala Lumpur" <?php if($profile->usr_state == "Kuala Lumpur"){ echo 'selected';} ?>>Kuala Lumpur</option>
                              <option value="Labuan" <?php if($profile->usr_state == "Labuan"){ echo 'selected';} ?>>Labuan</option>
                              <option value="Malacca" <?php if($profile->usr_state == "Malacca"){ echo 'selected';} ?>>Malacca</option>
                              <option value="Negeri Sembilan" <?php if($profile->usr_state == "Negeri Sembilan"){ echo 'selected';} ?>>Negeri Sembilan</option>
                              <option value="Pahang" <?php if($profile->usr_state == "Pahang"){ echo 'selected';} ?>>Pahang</option>
                              <option value="Perak" <?php if($profile->usr_state == "Perak"){ echo 'selected';} ?>>Perak</option>
                              <option value="Perlis" <?php if($profile->usr_state == "Perlis"){ echo 'selected';} ?>>Perlis</option>
                              <option value="Penang" <?php if($profile->usr_state == "Penang"){ echo 'selected';} ?>>Penang</option>
                              <option value="Sabah" <?php if($profile->usr_state == "Sabah"){ echo 'selected';} ?>>Sabah</option>
                              <option value="Sarawak" <?php if($profile->usr_state == "Sarawak"){ echo 'selected';} ?>>Sarawak</option>
                              <option value="Selangor" <?php if($profile->usr_state == "Selangor"){ echo 'selected';} ?>>Selangor</option>
                              <option value="Terengganu" <?php if($profile->usr_state == "Terengganu"){ echo 'selected';} ?>>Terengganu</option>
                            </select>
                              <!--<input class="form-control" type="text" name="usr_state" value="<?php echo $profile->usr_state;?>" required <?php echo $disabled;?>>-->
                              </td>
                            </tr>
                            <tr>
                            <td>Country</td>
                            <td>
                              <input class="form-control" type="text" name="usr_country" placeholder="Insert Country" value="<?php echo $profile->usr_country;?>" required <?php echo $disabled;?>>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div><!-- col-6 -->

                      <div class="col-lg-6 mg-t-20 mg-lg-t-0">
                        <table class="table mg-b-0">
                          <thead style='visibility: collapse;'>
                            <tr>
                             <th class="wd-35p">Name</th>
                             <th>Position</th>
                            </tr>
                          </thead>
                          <tbody>
                           <tr>
                            <td>Education</td>
                            <td>
                              <select class="form-control select2" name="usr_education" style="width: 100%" required <?php echo $disabled;?>>
                                <option>Choose Education Level</option>
                                <option value="Master/PHD" <?php if($profile->usr_education == "Master/PHD"){ echo ' selected';} ?>>Master/PHD</option>
                                <option value="Bachelor Degree" <?php if($profile->usr_education == "Bachelor Degree"){ echo ' selected';} ?>>Bachelor Degree</option>
                                <option value="Diploma" <?php if($profile->usr_education == "Diploma"){ echo ' selected';} ?>>Diploma</option>
                                <option value="Certificate" <?php if($profile->usr_education == "CertificateD"){ echo ' selected';} ?>>Certificate</option>
                              </select>
                           </tr>
                           <tr>
                            <td>Qualification Field</td>
                            <td>
                              <input class="form-control" type="text" name="usr_qualification" value="<?php echo $profile->usr_qualification;?>" placeholder="Eg : Bsc Engineering" <?php echo $disabled;?>>
                           </tr>
                           <tr>
                            <td>Appointed Position</td>
                            <td>
                              <input class="form-control" type="text" name="usr_jobtitle" value="<?php echo $profile->usr_jobtitle;?>" placeholder="Eg : Project Manager" required <?php echo $disabled;?>>
                           </tr>
                           <tr>
                            <td>Assigned Division</td>
                            <td>
                              <select class="form-control select2" name="usr_division" style="width: 100%" required <?php echo $disabled;?>>
                                <option>Choose Division</option>
                                <option value="Administration" <?php if($profile->usr_division == "Administration"){ echo ' selected';} ?>>Administration</option>
                                <option value="Operation" <?php if($profile->usr_division == "Operation"){ echo ' selected';} ?>>Operation</option>
                                <option value="Finance" <?php if($profile->usr_division == "Finance"){ echo ' selected';} ?>>Finance</option>
                                <option value="Technical" <?php if($profile->usr_division == "Technical"){ echo ' selected';} ?>>Technical</option>
                              </select>
                           </tr>
                           <tr>
                            <td>Employment</td>
                            <td>
                              <select class="form-control select2" name="usr_employment" style="width: 100%" required <?php echo $disabled;?>>
                                <option>Employment Status</option>
                                <option value="Permanent" <?php if($profile->usr_employment == "Permanent"){ echo ' selected';} ?>>Permanent</option>
                                <option value="Contract" <?php if($profile->usr_employment == "Contract"){ echo ' selected';} ?>>Contract</option>
                                <option value="Freelancer" <?php if($profile->usr_employment == "Freelancer"){ echo ' selected';} ?>>Freelancer</option>
                                <option value="Internship" <?php if($profile->usr_employment == "Internship"){ echo ' selected';} ?>>Internship</option>
                              </select>
                           </tr>
                           <tr>
                            <td>Contact No.</td>
                            <td>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <div class="input-group-text">
                                    <i class="fa fa-phone tx-16 lh-0 op-6"></i>
                                  </div>
                                </div><!-- input-group-prepend -->
                                <input id="phoneMask" type="text" name="usr_mobile" value="<?php echo $profile->usr_mobile;?>" class="form-control"  placeholder="(000) 000-0000" required <?php echo $disabled;?>>
                              </div><!-- input-group -->
                           </tr>
                           <tr>
                            <td>Email Address</td>
                            <td>
                              <input type="email" name="usr_email" value="<?php echo $profile->usr_email;?>" class="form-control bd-transparent" required <?php echo $disabled;?>>
                           </tr>
                           <tr>
                            <td>Bank Name</td>
                            <td>
                              <input class="form-control" type="text" name="usr_bank_name" value="<?php echo $profile->usr_bank_name;?>" placeholder="Insert Bank Name" <?php echo $disabled;?>>
                           </tr>
                           <tr>
                            <td>Bank Account No.</td>
                            <td>
                              <input class="form-control" type="text" name="usr_bank_acc_no" value="<?php echo $profile->usr_bank_acc_no;?>" placeholder="Insert Bank Account No." <?php echo $disabled;?>>
                           </tr>
                           <tr>
                            <td>KWSP No.</td>
                            <td>
                              <input class="form-control" type="text" name="usr_kwsp_no" value="<?php echo $profile->usr_kwsp_no;?>" placeholder="Insert KWSP No." <?php echo $disabled;?>>
                           </tr>
                          </tbody>
                        </table>
                      </div><!-- col-6 -->
                    </div><!-- row -->
                  </div><!-- card-body -->

                  <div class="modal-footer">
                    <?php if ($role == 'Admin') { ?>
                    <input type="hidden" name="tab" value="profile">
                    <input type="hidden" name="usr_id" value="<?php echo $profile->usr_id;?>">
                    <button type="submit" class="btn btn-info">Save Profile</button>
                    <!-- <button type="reset" class="btn btn-secondary" data-dismiss="modal">Deactivate</button> -->
                    <?php } ?>

                  </div><!-- form-layout-footer -->
                  <?php if ($user->usr_role == 'AD') { ?>
                  </form>
                  <?php } ?>
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
  $('#employid').mask('99-9999');
  $('#postal').mask('99999');
  $('#phoneMask').mask('(999) 999-9999');
  $('#nric').mask('999999-99-9999');
</script>
@stop
