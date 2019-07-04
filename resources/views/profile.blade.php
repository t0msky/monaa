@extends('layouts.master')

@section('content')
<div class="br-subleft">
  <div class="widget-4">
    <div class="avatar-upload">
      <div class="avatar-edit">
       <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" onchange="previewFile()"/>
       <label for="imageUpload"></label>
      </div>
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
  <div class="br-pageheader pd-y-15 pd-md-l-20">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
      <span class="breadcrumb-item active">Personnels</span>
      <a class="breadcrumb-item" href="personnel-board.html">Personnel Board</a>
      <span class="breadcrumb-item active">My Profile</span>
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
              <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                  <a class="nav-link active" href="#t01" data-toggle="tab">User Profile</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#t02" data-toggle="tab">Change Password</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#t03" data-toggle="tab">Picture</a>
                </li>
              </ul>
            </div><!-- card-header -->

            <div class="tab-content">
              <div class="tab-pane active" id="t01">
                <form method="post" action="<?php echo env('BASE_URL');?>profile" data-parsley-validate data-parsley-errors-messages-disabled>
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
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
                                <input class="form-control" type="text" name="usr_employment_id" value="<?php echo $user->usr_employment_id;?>" placeholder="">
                              </div><!-- input-group -->
                            </div>
                          </div><!-- col-6 -->
                          <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label">Roles</label>
                              <?php
                              if ($user->usr_role == 'AD') {
                                $disabled = "";
                                $ad = ' selected';
                                $cp = ' ';
                              } else {
                                $disabled = " disabled";
                                $cp = ' selected';
                                $ad = ' ';
                              }
                              ?>
                              <select class="form-control select2" style="width: 100%" name="usr_role" data-placeholder="Choose one" required <?php echo $disabled;?>>
                                <option label="Choose Roles"></option>
                                <option value="AD" <?php echo $ad;?>>Administration</option>
                                <option value="CP" <?php echo $cp;?>>Mooring Master</option>
                              </select>
                            </div>
                          </div><!-- col-6 -->
                        </div><!-- row -->
                        <div class="row mg-b-10">
                          <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label">Firstname <span class="tx-danger">*</span></label>
                              <input class="form-control" type="text" name="usr_firstname" value="<?php echo $user->usr_firstname;?>" placeholder="Enter Firstname" required>
                            </div>
                          </div><!-- col-6 -->
                          <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label">Lastname <span class="tx-danger">*</span></label>
                              <input class="form-control" type="text" name="usr_lastname" value="<?php echo $user->usr_lastname;?>" placeholder="Enter Lastname" required>
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
                                <input id="nric" type="text" class="form-control" name="usr_nric" value="<?php echo $user->usr_nric;?>" placeholder="999999-99-9999" required>
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
                                <input id="dob" type="text" name="usr_dob" class="form-control" placeholder="MM/DD/YYYY" value="<?php echo $user->usr_dob;?>">
                              </div>
                            </div>
                          </div><!-- col-6 -->
                          <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label">Citizen </label>
                              <input class="form-control" type="text" name="usr_citizen" value="<?php echo $user->usr_citizen;?>" placeholder="Enter Citizenship">
                            </div>
                          </div><!-- col-6 -->
                        </div><!-- row -->
                        <div class="row mg-b-10">
                          <div class="col-lg-12">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label">Residential Address <span class="tx-danger">*</span></label>
                              <input class="form-control" type="text" name="usr_add1" value="<?php echo $user->usr_add1;?>" placeholder="Address Line 1" required>
                            </div>
                            <div class="form-group mg-b-10-force">
                              <input class="form-control" type="text" name="usr_add2" value="<?php echo $user->usr_add2;?>" placeholder="Address Line 2">
                            </div>
                          </div><!-- col-12 -->
                        </div><!-- row -->
                        <div class="row mg-b-10">
                          <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label">Postal Code </label>
                              <input class="form-control" type="number" name="usr_postcode" value="<?php echo $user->usr_postcode;?>" placeholder="">
                            </div>
                          </div><!-- col-6 -->
                          <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label">State / Region </label>
                              <input class="form-control" type="text" name="usr_state" value="<?php echo $user->usr_state;?>" placeholder="">
                            </div>
                          </div><!-- col-6 -->
                        </div><!-- row -->
                        <div class="row mg-b-10">
                          <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label">Country </label>
                              <input class="form-control" type="text" name="usr_country" value="<?php echo $user->usr_country;?>" placeholder="">
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
                              <select class="form-control select2" name="usr_education" style="width: 100%" data-placeholder="Choose one">
                                <option label="Choose Education"></option>
                                <option value="Master/PHD" <?php if($user->usr_education == "Master/PHD"){ echo ' selected';} ?>>Master/PHD</option>
                                <option value="Bachelor Degree" <?php if($user->usr_education == "Bachelor Degree"){ echo ' selected';} ?>>Bachelor Degree</option>
                                <option value="Diploma" <?php if($user->usr_education == "Diploma"){ echo ' selected';} ?>>Diploma</option>
                                <option value="Certificate" <?php if($user->usr_education == "CertificateD"){ echo ' selected';} ?>>Certificate</option>
                              </select>
                            </div>
                          </div><!-- col-6 -->
                          <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label">Qualification </label>
                              <input class="form-control" type="text" name="usr_qualification" value="<?php echo $user->usr_qualification;?>" placeholder="Enter Qualification">
                            </div>
                          </div><!-- col-6 -->
                        </div><!-- row -->
                        <div class="row mg-b-10">
                          <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label">Appointed Position </label>
                              <input class="form-control" type="text" name="usr_jobtitle" value="<?php echo $user->usr_jobtitle;?>" placeholder="Enter Position">
                            </div>
                          </div><!-- col-6 -->
                          <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label">Assigned Division </label>
                              <select class="form-control select2" name="usr_division" style="width: 100%" data-placeholder="Choose one">
                                <option label="Choose Division"></option>
                                <option value="Administration" <?php if($user->usr_division == "Administration"){ echo ' selected';} ?>>Administration</option>
                                <option value="Operation" <?php if($user->usr_division == "Operation"){ echo ' selected';} ?>>Operation</option>
                                <option value="Finance" <?php if($user->usr_division == "Finance"){ echo ' selected';} ?>>Finance</option>
                                <option value="Technical" <?php if($user->usr_division == "Technical"){ echo ' selected';} ?>>Technical</option>
                              </select>
                            </div>
                          </div><!-- col-6 -->
                        </div><!-- row -->
                        <div class="row mg-b-10">
                          <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label">Employment </label>
                              <select class="form-control select2" name="usr_employment" style="width: 100%" data-placeholder="Choose one">
                                <option label="Choose Employment"></option>
                                <option value="Permanent" <?php if($user->usr_employment == "Permanent"){ echo ' selected';} ?>>Permanent</option>
                                <option value="Contract" <?php if($user->usr_employment == "Contract"){ echo ' selected';} ?>>Contract</option>
                                <option value="Freelancer" <?php if($user->usr_employment == "Freelancer"){ echo ' selected';} ?>>Freelancer</option>
                                <option value="Internship" <?php if($user->usr_employment == "Internship"){ echo ' selected';} ?>>Internship</option>
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
                                <input id="phoneMask" type="text" name="usr_mobile" value="<?php echo $user->usr_mobile;?>" class="form-control" placeholder="(999) 999-9999" required>
                              </div><!-- input-group -->
                            </div>
                          </div><!-- col-6 -->
                        </div><!-- row -->
                        <div class="row mg-b-10">
                          <div class="col-lg-12">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label">Email Address <span class="tx-danger">*</span></label>
                              <input type="email" name="usr_email" value="<?php echo $user->usr_email;?>" class="form-control" placeholder="Email" required>
                            </div>
                          </div><!-- col-12 -->
                        </div><!-- row -->
                      </div><!-- col-6 -->
                    </div><!-- row -->
                  </div><!-- form-layout -->
                  <div class="modal-footer">
                    <input type="hidden" name="tab" value="profile">
                    <input type="hidden" name="usr_id" value="<?php echo $user->usr_id;?>">
                    <button type="submit" class="btn btn-info">Save Profile</button>
                    <!-- <button type="reset" class="btn btn-secondary" data-dismiss="modal">Deactivate</button> -->
                  </div><!-- form-layout-footer -->
                </form>
              </div><!-- tab-pane -->
              <div class="tab-pane" id="t02">
                <form method="post" action="<?php echo env('BASE_URL');?>profile" data-parsley-validate data-parsley-errors-messages-disabled>
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="form-layout form-layout-1">
                    <div class="row">
                      <div class="col-lg-6">
                        <!-- <div class="row mg-b-10">
                          <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label">Username <span class="tx-danger">*</span></label>
                              <input class="form-control" type="text" value="" placeholder="" required>
                            </div>
                          </div>
                        </div> -->
                        <div class="row mg-b-10">
                          <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label">New Password <span class="tx-danger">*</span></label>
                              <input class="form-control" type="password" name="password1" placeholder="" required>
                            </div>
                          </div><!-- col-6 -->
                          <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label">Confirm Password <span class="tx-danger">*</span></label>
                              <input class="form-control" type="password" name="password2" placeholder="" required>
                            </div>
                          </div><!-- col-6 -->
                        </div><!-- row -->
                      </div><!-- col-6 -->
                    </div><!-- row -->
                  </div><!-- form-layout -->
                  <div class="modal-footer">
                    <input type="hidden" name="tab" value="password">
                    <input type="hidden" name="usr_id" value="<?php echo $user->usr_id;?>">
                    <button type="submit" class="btn btn-info">Change Password</button>
                    <button type="reset" class="btn btn-secondary" data-dismiss="modal">Reset</button>
                  </div><!-- form-layout-footer -->
                </form>
              </div><!-- tab-pane -->
              <div class="tab-pane" id="t03">
                <div class="form-layout form-layout-1">
                  <div class="row">
                    <form action="<?php echo env('BASE_URL');?>do-upload-picture" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <?php if ($user->usr_pic != '') { ?>
                    <img src="<?php echo env('BASE_URL');?>img/pic/<?php echo $user->usr_pic;?>" class="img-fluid img-thumbnail" alt="" style="width:300px">
                    <?php } else { ?>
                    <img src="<?php echo env('BASE_URL');?>img/default.png" class="img-fluid img-thumbnail" alt="" style="width:300px">
                    <?php } ?>
                    <br><br>
                    <label class="form-control-label">Select image to upload </label>
                    <div class="custom-file">
                      <input type="file" id="file" class="custom-file-input" name="image">
                      <label class="custom-file-label"></label>
                    </div>
                    <i></i>
                    <p class="mg-b-0"><small>( jpeg, png, jpg, gif, svg ) Max Size : 2 Mb</small></p>
                    <br><br>
                    <button type="submit" class="btn btn-info">Upload</button>

                    </form>
                  </div>
                </div>
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
