@extends('layouts.master')

@section('content')
<div class="br-subleft">
  <div class="widget-4">
    <div class="avatar-upload-2">
      <!--<div class="avatar-edit">-->
      <!-- <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" onchange="previewFile()"/>-->
      <!-- <label for="imageUpload"></label>-->
      <!--</div>-->
      <div class="avatar-preview">
       <img id="imagePreview" src="<?php echo env('BASE_URL');?>img/pic/<?php echo $user->usr_pic;?>">
       <!-- <img id="imagePreview" src="img/default-user-image.png"> -->
      </div>
     </div>
    <div class="tx-center">
      <div class="justify-content-between align-items-center mg-t-20 pd-x-10 bd-b bd-white-1 pd-b-5">
        <div class="tx-capitalize tx-14 mg-b-0 tx-white-7"><?php echo $user->usr_firstname.' '.$user->usr_lastname;?></div>
      </div>

      <!-- <div class="mg-b-25 pd-x-10 pd-t-5">ON2-0918</div> -->
    </div><!-- row-->
  </div><!-- widget-4-->
</div><!-- br-subleft -->

<div class="br-contentpanel">
  <div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
      <span class="breadcrumb-item active">Personnels</span>
      <a class="breadcrumb-item" href="personnel-board.html">Personnel Board</a>
      <span class="breadcrumb-item active">My Profile</span>
    </nav>
  </div><!-- br-pageheader -->

  <div class="br-pagetitle hidden-xs-down">
    <i class="icon typcn typcn-user tx-24"></i>
    <div>
      <h4 class="pd-y-15">Personnels</h4>
    </div>
  </div><!-- d-flex -->

  <div class="d-flex align-items-center justify-content-start pd-x-20 pd-sm-x-10 mg-b-20 pd-xs-t-10">
    <button id="showSubLeft" class="btn btn-secondary mg-r-10 hidden-lg-up"><i class="fa fa-navicon"></i></button>
  </div><!-- d-flex -->

  <!-- @if (count($errors) > 0)
      <div class="alert alert-danger">
          <strong>Whoops!</strong> There were some problems with your input.
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif -->

  <div class="br-pagebody pd-x-20 pd-sm-x-30 pd-b-40">
    <div class="row row-sm mg-t-20">
      <div class="col-lg mg-t-20 mg-lg-t-0">
        <div class="card shadow-base bd-0">

          <div class="card-header bg-transparent pd-x-25 pd-y-25 d-flex justify-content-between align-items-center">
            <div class="card-title tx-capitalize mg-b-0">My Profile</div>

          </div><!-- card-header -->

          <div class="card">
            <div class="card-header">
              <ul class="nav nav-tabs card-header-tabs pd-xs-b-15">
                <li class="nav-item">
                  <a class="nav-link active" href="#t01" data-toggle="tab"><i class="fa fa-caret-right tx-success mg-r-10"></i>User Profile</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#t02" data-toggle="tab"><i class="fa fa-caret-right tx-success mg-r-10"></i>Change Password</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#t03" data-toggle="tab"><i class="fa fa-caret-right tx-success mg-r-10"></i>Avatar</a>
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

                  $disabled = "";
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
                                <?php if ($user->usr_role == 'AD') { ?>
                                <input id="employid" class="form-control" type="text" name="usr_employment_id" value="<?php echo $user->usr_employment_id;?>" placeholder="00-0000" required <?php echo $disabled;?>>
                                <?php } else { echo '<input class="form-control" type="text" value="'.$user->usr_employment_id.'" disabled>'; } ?>
                              </div><!-- input-group -->
                              </td>
                            </tr>

                            <tr>
                            <td>Roles</td>
                            <td>
                              <?php if ($user->usr_role == 'AD') { ?>
                              <select class="form-control select2" style="width: 100%" name="usr_role" data-placeholder="Choose one" required <?php echo $disabled;?>>
                                <option label="Choose Roles"></option>
                                <option value="AD" <?php if($user->usr_role=="AD"){echo ' selected';}?>>Administration</option>
                                <option value="CP" <?php if($user->usr_role=="CP"){echo ' selected';}?>>Mooring Master</option>
                              </select>
                            <?php } else { if($user->usr_role=="AD"){echo 'Administration';} else if($user->usr_role=="CP"){echo 'Mooring Master';}  } ?>
                              </td>
                            </tr>

                            <tr>
                            <td>First Name</td>
                            <td>
                              <input class="form-control" type="text" name="usr_firstname" value="<?php echo $user->usr_firstname;?>" placeholder="Enter Firstname" required <?php echo $disabled;?>>
                              </td>
                            </tr>
                            <tr>
                            <td>Last Name</td>
                            <td>
                              <input class="form-control" type="text" name="usr_lastname" value="<?php echo $user->usr_lastname;?>" placeholder="Enter Lastname" required <?php echo $disabled;?>>
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
                                <input id="nric" type="text" class="form-control" name="usr_nric" value="<?php echo $user->usr_nric;?>" placeholder="00000000-00-0000" required <?php echo $disabled;?>>
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
                                <input id="dob" type="text" name="usr_dob" class="form-control" placeholder="MM/DD/YYYY"  required <?php echo $disabled;?> value="<?php echo $user->usr_dob;?>">
                              </div>
                              </td>
                            </tr>
                            <tr>
                            <td>Citizenship</td>
                            <td>
                              <input class="form-control" type="text" name="usr_citizen" value="<?php echo $user->usr_citizen;?>" placeholder="Insert Citizenship" required <?php echo $disabled;?>>
                              </td>
                            </tr>
                            <tr>
                            <td>Residential Address</td>
                            <td>
                               <input class="form-control" type="text" name="usr_add1" value="<?php echo $user->usr_add1;?>" placeholder="Address Line 1" required <?php echo $disabled;?>>
                               <input class="form-control mg-t-10" type="text" name="usr_add2" value="<?php echo $user->usr_add2;?>" placeholder="Address Line 2" required <?php echo $disabled;?>>
                              </td>
                            </tr>
                            <tr>
                            <td>Postal Code</td>
                            <td>
                              <input id="postal" class="form-control" type="text" name="usr_postcode" value="<?php echo $user->usr_postcode;?>" placeholder="00000" required <?php echo $disabled;?>>
                              </td>
                            </tr>
                            <tr>
                            <td>State / Region</td>
                            <td>
                              <select class="form-control bd-transparent select2-show-search" style="width: 100%" name="usr_state" value="<?php echo $user->usr_state;?>">
                              <option>Choose State / Region</option>
                              <option value="Johor" <?php if($user->usr_state == "Johor"){ echo 'selected';} ?>>Johor</option>
                              <option value="Kedah" <?php if($user->usr_state == "Kedah"){ echo 'selected';} ?>>Kedah</option>
                              <option value="Kelantan" <?php if($user->usr_state == "Kelantan"){ echo 'selected';} ?>>Kelantan</option>
                              <option value="Kuala Lumpur" <?php if($user->usr_state == "Kuala Lumpur"){ echo 'selected';} ?>>Kuala Lumpur</option>
                              <option value="Labuan" <?php if($user->usr_state == "Labuan"){ echo 'selected';} ?>>Labuan</option>
                              <option value="Malacca" <?php if($user->usr_state == "Malacca"){ echo 'selected';} ?>>Malacca</option>
                              <option value="Negeri Sembilan" <?php if($user->usr_state == "Negeri Sembilan"){ echo 'selected';} ?>>Negeri Sembilan</option>
                              <option value="Pahang" <?php if($user->usr_state == "Pahang"){ echo 'selected';} ?>>Pahang</option>
                              <option value="Perak" <?php if($user->usr_state == "Perak"){ echo 'selected';} ?>>Perak</option>
                              <option value="Perlis" <?php if($user->usr_state == "Perlis"){ echo 'selected';} ?>>Perlis</option>
                              <option value="Penang" <?php if($user->usr_state == "Penang"){ echo 'selected';} ?>>Penang</option>
                              <option value="Sabah" <?php if($user->usr_state == "Sabah"){ echo 'selected';} ?>>Sabah</option>
                              <option value="Sarawak" <?php if($user->usr_state == "Sarawak"){ echo 'selected';} ?>>Sarawak</option>
                              <option value="Selangor" <?php if($user->usr_state == "Selangor"){ echo 'selected';} ?>>Selangor</option>
                              <option value="Terengganu" <?php if($user->usr_state == "Terengganu"){ echo 'selected';} ?>>Terengganu</option>
                            </select>
                              <!--<input class="form-control" type="text" name="usr_state" value="<?php echo $user->usr_state;?>" required <?php echo $disabled;?>>-->
                              </td>
                            </tr>
                            <tr>
                            <td>Country</td>
                            <td>
                              <input class="form-control" type="text" name="usr_country" placeholder="Insert Country" value="<?php echo $user->usr_country;?>" required <?php echo $disabled;?>>
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
                                <option value="Master/PHD" <?php if($user->usr_education == "Master/PHD"){ echo ' selected';} ?>>Master/PHD</option>
                                <option value="Bachelor Degree" <?php if($user->usr_education == "Bachelor Degree"){ echo ' selected';} ?>>Bachelor Degree</option>
                                <option value="Diploma" <?php if($user->usr_education == "Diploma"){ echo ' selected';} ?>>Diploma</option>
                                <option value="Certificate" <?php if($user->usr_education == "CertificateD"){ echo ' selected';} ?>>Certificate</option>
                              </select>
                           </tr>
                           <tr>
                            <td>Qualification Field</td>
                            <td>
                              <input class="form-control" type="text" name="usr_qualification" value="<?php echo $user->usr_qualification;?>" placeholder="Eg : Bsc Engineering" <?php echo $disabled;?>>
                           </tr>
                           <tr>
                            <td>Appointed Position</td>
                            <td>
                              <input class="form-control" type="text" name="usr_jobtitle" value="<?php echo $user->usr_jobtitle;?>" placeholder="Eg : Project Manager" required <?php echo $disabled;?>>
                           </tr>

                           <tr>
                            <td>Assigned Division</td>
                            <td>
                               <?php if ($user->usr_role == 'AD') { ?>
                              <select class="form-control select2" name="usr_division" style="width: 100%" required <?php echo $disabled;?>>
                                <option>Choose Division</option>
                                <option value="Administration" <?php if($user->usr_division == "Administration"){ echo ' selected';} ?>>Administration</option>
                                <option value="Operation" <?php if($user->usr_division == "Operation"){ echo ' selected';} ?>>Operation</option>
                                <option value="Finance" <?php if($user->usr_division == "Finance"){ echo ' selected';} ?>>Finance</option>
                                <option value="Technical" <?php if($user->usr_division == "Technical"){ echo ' selected';} ?>>Technical</option>
                              </select>
                            <?php } else { echo $user->usr_division;} ?>
                           </tr>
                           <tr>
                            <td>Employment</td>
                            <td>
                              <?php if ($user->usr_role == 'AD') { ?>
                              <select class="form-control select2" name="usr_employment" style="width: 100%" required <?php echo $disabled;?>>
                                <option>Employment Status</option>
                                <option value="Permanent" <?php if($user->usr_employment == "Permanent"){ echo ' selected';} ?>>Permanent</option>
                                <option value="Contract" <?php if($user->usr_employment == "Contract"){ echo ' selected';} ?>>Contract</option>
                                <option value="Freelancer" <?php if($user->usr_employment == "Freelancer"){ echo ' selected';} ?>>Freelancer</option>
                                <option value="Internship" <?php if($user->usr_employment == "Internship"){ echo ' selected';} ?>>Internship</option>
                              </select>
                              <?php } else { echo $user->usr_employment;} ?>
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
                                <input id="phoneMask" type="text" name="usr_mobile" value="<?php echo $user->usr_mobile;?>" class="form-control"  placeholder="(000) 000-0000" required <?php echo $disabled;?>>
                              </div><!-- input-group -->
                           </tr>
                           <tr>
                            <td>Email Address</td>
                            <td>
                              <input type="email" name="usr_email" value="<?php echo $user->usr_email;?>" class="form-control" required <?php echo $disabled;?>>
                           </tr>
                           <tr>
                            <td>Bank Name</td>
                            <td>
                              <input class="form-control" type="text" name="usr_bank_name" value="<?php echo $user->usr_bank_name;?>" placeholder="Insert Bank Name" <?php echo $disabled;?>>
                           </tr>
                           <tr>
                            <td>Bank Account No.</td>
                            <td>
                              <input class="form-control" type="text" name="usr_bank_acc_no" value="<?php echo $user->usr_bank_acc_no;?>" placeholder="Insert Bank Account No." <?php echo $disabled;?>>
                           </tr>
                           <tr>
                            <td>KWSP No.</td>
                            <td>
                              <input class="form-control" type="text" name="usr_kwsp_no" value="<?php echo $user->usr_kwsp_no;?>" placeholder="Insert KWSP No." <?php echo $disabled;?>>
                           </tr>
                          </tbody>
                        </table>
                      </div><!-- col-6 -->
                    </div><!-- row -->
                  </div><!-- card-body -->

                  <div class="modal-footer">
                    <?php #if ($role == 'Admin') { ?>
                    <input type="hidden" name="tab" value="profile">
                    <input type="hidden" name="usr_id" value="<?php echo $user->usr_id;?>">
                    <button type="submit" class="btn btn-info">Save Profile</button>
                    <!-- <button type="reset" class="btn btn-secondary" data-dismiss="modal">Deactivate</button> -->
                    <?php #} ?>

                  </div><!-- form-layout-footer -->
                  </form>
              </div><!-- tab-pane -->

              <div class="tab-pane" id="t02">
                <form method="post" action="<?php echo env('BASE_URL');?>profile" data-parsley-validate data-parsley-errors-messages-disabled>
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="card-body color-gray-lighter pd-t-0">

                    <div class="row row-sm mg-t-20 pd-b-20">
                      <div class="col-lg-6">

                        <div class="row mg-b-10">
                          <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label">New Password : <span class="tx-success">*</span></label>
                              <div class="main-password">
                        <input id="password-1" type="password" data-parsley-equalto="#password-2" name="password-1" class="form-control input-password pd-y-12" aria-label="password" placeholder="Password" required>
                        <a href="JavaScript:void(0);" class="icon-view"><i class="fa fa-eye tx-18"></i></a>
                      </div>
                            </div>
                          </div><!-- col-6 -->
                          <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label">Confirm New Password : <span class="tx-success">*</span></label>
                              <div class="main-password">
                        <input id="password-2" type="password" data-parsley-equalto="#password-1" name="password-2" class="form-control input-password pd-y-12" aria-label="password" placeholder="Confirm Password" required>
                        <a href="JavaScript:void(0);" class="icon-view"><i class="fa fa-eye tx-18"></i></a>
                      </div>
                            </div>
                          </div><!-- col-6 -->
                        </div><!-- row -->
                      </div><!-- col-6 -->
                    </div><!-- row -->

                  </div><!-- card-body -->
                  <div class="modal-footer">
                    <input type="hidden" name="tab" value="password">
                    <input type="hidden" name="usr_id" value="<?php echo $user->usr_id;?>">
                    <button type="submit" class="btn btn-info">Change Password</button>
                    <button type="reset" class="btn btn-secondary" data-dismiss="modal">Reset</button>
                  </div><!-- form-layout-footer -->
                </form>
              </div><!-- tab-pane -->
              <div class="tab-pane" id="t03">
                <div class="card-body color-gray-lighter pd-t-0">
                  <div class="row row-sm mg-t-20 pd-b-20 pd-xs-b-0">
                    <div class="col-lg-6 mg-t-20 mg-lg-t-0">
                    <form action="<?php echo env('BASE_URL');?>do-upload-picture" method="POST" enctype="multipart/form-data" id="frmimgupld">

                  <div class="row">
                    <div class="col-lg-6">
                    <div class="avatar-upload">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="avatar-preview">
                         <?php if ($user->usr_pic != '') { ?>
                              <img src="<?php echo env('BASE_URL');?>img/pic/<?php echo $user->usr_pic;?>" class="img-fluid img-thumbnail" alt="" style="width:100%">
                             <?php } else { ?>
                             <img src="<?php echo env('BASE_URL');?>img/default.png" class="img-fluid img-thumbnail" alt="" style="width:100%">
                            <?php } ?>
                        </div>
                        <div class="avatar-edit">
                            <input type="file" name="image" id="file" class="inputfile" data-multiple-caption="{count} files selected" multiple>
                             <label for="file" class="if-style-1 if-success">
                             <div class="icon-wrapper tx-white">
                                <i class="typcn typcn-cloud-storage"></i>
                             </div><!-- icon-wrapper -->
                             </label>
                       </div>
                    </div>
                      <div class="tx-center pd-t-20">
                       <button id="imgConfirm" class="btn btn-info" style="display: none">Upload Image</button>
                      </div>
                    </div>
                  </div>

                    </form>
                    </div><!-- col-6 -->
                  </div><!-- row -->
                </div><!-- card -->
              </div>
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

    $(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });

  });
</script>
<script>

  // Javascript to enable link to tab
  var url = document.location.toString();
  if (url.match('#')) {
    $('.nav-tabs a[href="#' + url.split('#')[1] + '"]').tab('show');
  }

  // Change hash for page-reload
  $('.nav-tabs a').on('shown.bs.tab', function (e) {
    window.location.hash = e.target.hash;
  })

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
  $('#phoneMask').mask('(999) 999-9999');
  $('#nric').mask('999999-99-9999');

    function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreview').css('background-image', 'url('+e.target.result +')');
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
      $(document).ready(function(){
        $("#file").change(function() {
            readURL(this);
            $('#imgConfirm').show();
        });
        $('#imgConfirm').click(function(){
          $('#frmimgupld')[0].submit();
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
@stop
