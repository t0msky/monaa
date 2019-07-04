@extends('layouts.master')

@section('content')
<!-- <div class="br-subleft">
  <div class="widget-4">
    <div class="card-profile-img pd-t-10">
      <img src="../img/Irwanshah.jpg" alt="">
    </div>
    <div class="pd-t-140 tx-center">
      <div class="justify-content-between align-items-center mg-t-20 pd-x-10 bd-b bd-white-1 pd-b-5">
        <div class="tx-capitalize tx-14 mg-b-0 tx-white-7">Irwanshah Bin Hanafiah</div>
      </div>
      <div class="mg-b-25 pd-x-10 pd-t-5">ON2-0918</div>
    </div>
  </div>
</div> -->

<div class="br-mainpanel">
  <div class="br-pageheader pd-y-15 pd-md-l-20">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
      <span class="breadcrumb-item active">Personnels</span>
      <a class="breadcrumb-item" href="personnel-board.html">Personnel Board</a>
      <span class="breadcrumb-item active">New Registration</span>
    </nav>
  </div><!-- br-pageheader -->

  <div class="br-pagetitle pd-t-20">
    <i class="icon typcn typcn-user tx-24"></i>
    <div>
      <h4 class="pd-y-15">Personnels</h4>
    </div>
  </div><!-- d-flex -->

  <div class="br-pagebody pd-x-20 pd-sm-x-30 pd-b-40">
    <div class="card bd-0 shadow-base">
      <div class="card-header bg-transparent pd-x-25 pd-y-25 d-flex justify-content-between align-items-center">
        <div class="card-title tx-capitalize mg-b-0">New Registration</div>
      </div><!-- card-header -->

      <div class="card">
        <form method="post" action="<?php echo env('BASE_URL');?>do-add-user" data-parsley-validate data-parsley-errors-messages-disabled>
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
                        <input class="form-control" type="text" name="usr_employment_id" placeholder="" required>
                      </div><!-- input-group -->
                    </div>
                  </div><!-- col-6 -->
                  <div class="col-lg-6">
                    <div class="form-group mg-b-10-force">
                      <label class="form-control-label">Roles </label>
                      <select class="form-control select2" name="usr_role" style="width: 100%" data-placeholder="Choose one" required>
                        <option label="Choose Roles"></option>
                        <option value="CP">Mooring Master</option>
                        <option value="AD">Administration</option>
                      </select>
                    </div>
                  </div><!-- col-6 -->
                </div><!-- row -->
                <div class="row mg-b-10">
                  <div class="col-lg-6">
                    <div class="form-group mg-b-10-force">
                      <label class="form-control-label">Firstname <span class="tx-danger">*</span></label>
                      <input class="form-control" type="text" name="usr_firstname" placeholder="Enter Firstname" required>
                    </div>
                  </div><!-- col-6 -->
                  <div class="col-lg-6">
                    <div class="form-group mg-b-10-force">
                      <label class="form-control-label">Lastname <span class="tx-danger">*</span></label>
                      <input class="form-control" type="text" name="usr_lastname" placeholder="Enter Lastname" required>
                    </div>
                  </div><!-- col-6 -->
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
                        <input id="nric" type="text" class="form-control" name="usr_nric" placeholder="999999-99-9999" required>
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
                        <input id="dob" type="text" class="form-control" name="usr_dob" placeholder="MM/DD/YYYY">
                      </div>
                    </div>
                  </div><!-- col-6 -->
                  <div class="col-lg-6">
                    <div class="form-group mg-b-10-force">
                      <label class="form-control-label">Citizen </label>
                      <input class="form-control" type="text" name="usr_citizen" placeholder="Enter Citizenship">
                    </div>
                  </div><!-- col-6 -->
                </div><!-- row -->
                <div class="row mg-b-10">
                  <div class="col-lg-12">
                    <div class="form-group mg-b-10-force">
                      <label class="form-control-label">Residential Address <span class="tx-danger">*</span></label>
                      <input class="form-control" type="text" name="usr_add1" placeholder="Address Line 1" required>
                    </div>
                    <div class="form-group mg-b-10-force">
                      <input class="form-control" type="text" name="usr_add2" placeholder="Address Line 2">
                    </div>
                  </div><!-- col-12 -->
                </div><!-- row -->
                <div class="row mg-b-10">
                  <div class="col-lg-6">
                    <div class="form-group mg-b-10-force">
                      <label class="form-control-label">Postal Code </label>
                      <input class="form-control" type="number" name="usr_postcode" placeholder="">
                    </div>
                  </div><!-- col-6 -->
                  <div class="col-lg-6">
                    <div class="form-group mg-b-10-force">
                      <label class="form-control-label">State / Region </label>
                      <input class="form-control" type="text" name="usr_state" placeholder="">
                    </div>
                  </div><!-- col-6 -->
                </div><!-- row -->
                <div class="row mg-b-10">
                  <div class="col-lg-6">
                    <div class="form-group mg-b-10-force">
                      <label class="form-control-label">Country </label>
                      <input class="form-control" type="text" name="usr_country" placeholder="">

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
                        <option value="Master/PHD">Master/PHD</option>
                        <option value="Bachelor Degree">Bachelor Degree</option>
                        <option value="Diploma">Diploma</option>
                        <option value="Certificate">Certificate</option>
                      </select>
                    </div>
                  </div><!-- col-6 -->
                  <div class="col-lg-6">
                    <div class="form-group mg-b-10-force">
                      <label class="form-control-label">Qualification </label>
                      <input class="form-control" type="text" name="usr_qualification" placeholder="Enter Qualification">
                    </div>
                  </div><!-- col-6 -->
                </div><!-- row -->
                <div class="row mg-b-10">
                  <div class="col-lg-6">
                    <div class="form-group mg-b-10-force">
                      <label class="form-control-label">Appointed Position </label>
                      <input class="form-control" type="text" name="usr_jobtitle" placeholder="Enter Position">
                    </div>
                  </div><!-- col-6 -->
                  <div class="col-lg-6">
                    <div class="form-group mg-b-10-force">
                      <label class="form-control-label">Assigned Division </label>
                      <select class="form-control select2" name="usr_division" style="width: 100%" data-placeholder="Choose one">
                        <option label="Choose Division"></option>
                        <option value="Administration">Administration</option>
                        <option value="Operation">Operation</option>
                        <option value="Finance">Finance</option>
                        <option value="Technical">Technical</option>
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
                        <option value="Permanent">Permanent</option>
                        <option value="Contract">Contract</option>
                        <option value="Freelancer">Freelancer</option>
                        <option value="Internship">Internship</option>
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
                        <input id="phoneMask" type="text" class="form-control" name="usr_mobile" placeholder="(999) 999-9999" required>
                      </div><!-- input-group -->
                    </div>
                  </div><!-- col-6 -->
                </div><!-- row -->
                <div class="row mg-b-10">
                  <div class="col-lg-12">
                    <div class="form-group mg-b-10-force">
                      <label class="form-control-label">Email Address <span class="tx-danger">*</span></label>
                      <input type="email" name="usr_email" class="form-control" placeholder="Email" required>
                    </div>
                  </div><!-- col-12 -->
                </div><!-- row -->

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
            <button type="submit" class="btn btn-info">Add Personnel</button>
            <button type="reset" class="btn btn-secondary" data-dismiss="modal">Reset</button>
          </div><!-- form-layout-footer -->
        </form>
      </div><!-- card -->
    </div>
  </div><!-- br-pagebody -->
</div><!-- br-contentpanel -->

@stop

@section('docready')
<script type="text/javascript">
    jQuery(document).ready(function () {

  <?php if(session()->has('error')){?>
    toastr.error('<?php echo session()->get('error'); ?>')
  <?php } ?>

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
});
</script>
@stop
