@extends('layouts.master')

@section('content')

<div class="br-mainpanel">
  <div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
      <a class="breadcrumb-item" href="#">Data Assets</a>
      <a class="breadcrumb-item" href="job-record.html">Assets</a>
      <span class="breadcrumb-item active">Company Info</span>
    </nav>
  </div><!-- br-pageheader -->
  <div class="br-pagetitle">
    <i class="icon typcn typcn-briefcase tx-24"></i>
    <div>
      <h4 class="pd-y-15">Company Info</h4>
      <!-- <p class="mg-b-0">Register New Job</p> -->
    </div>
  </div><!-- d-flex -->

  <div class="br-pagebody pd-x-20 pd-sm-x-30 pd-b-40">
    <div class="row row-sm mg-t-20 pd-b-40">
      <div class="col-lg mg-t-20 mg-lg-t-0">
        <div class="card shadow-base bd-0">
          <div class="card">
                <form method="post" action="<?php echo env('BASE_URL');?>do-save-company" data-parsley-validate data-parsley-errors-messages-disabled id="selectForm-sts">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="form-layout form-layout-1">

                    <div class="row">
                      <div class="col-lg-6">
                        <div class="row mg-b-10">
                          <div class="col-lg-12">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label">Company Name : </label>
                              <input class="form-control" type="text" name="sts_name" value="<?php echo $company->sts_name;?>" placeholder="Insert Company" required>
                            </div>
                          </div><!-- col-12 -->
                        </div><!-- row -->
                        <div class="row mg-b-10">
                          <div class="col-lg-12">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label">Company Address : </label>
                              <input class="form-control mg-b-10-force" type="text" name="sts_address" value="<?php echo $company->sts_address;?>" placeholder="Address Line 1" required>
                              <input class="form-control" type="text" name="sts_address2" value="<?php echo $company->sts_address2;?>" placeholder="Address Line 2">
                            </div>
                          </div><!-- col-12 -->
                        </div><!-- row -->
                        <div class="row mg-b-10">
                          <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label">ZIP / Postal Code : </label>
                              <input class="form-control" type="number" name="sts_postcode" value="<?php echo $company->sts_postcode;?>" placeholder="">
                            </div>
                          </div><!-- col-6 -->
                          <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label">State : </label>
                              <input class="form-control" type="text" name="sts_state" value="<?php echo $company->sts_state;?>" placeholder="">
                            </div>
                          </div><!-- col-6 -->
                          <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label">Country : </label>
                              <input class="form-control" type="text" name="sts_country" value="<?php echo $company->sts_country;?>" placeholder="">
                            </div>
                          </div><!-- col-6 -->
                        </div><!-- row -->
                      </div><!-- col-6 -->
                      <div class="col-lg-6">
                        <div class="row mg-b-10">
                          <div class="col-lg-12">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label">Contact Person : </label>
                              <input class="form-control" type="text" value="<?php echo $company->sts_contact_person;?>" name="sts_contact_person" placeholder="Insert Name" required>
                            </div>
                          </div><!-- col-12 -->
                          <div class="col-lg-12">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label">Company Email : </label>
                              <input type="email" name="sts_email" class="form-control" value="<?php echo $company->sts_email;?>" placeholder="Enter Email" required>
                            </div>
                          </div><!-- col-12 -->
                        </div><!-- row -->
                        <div class="row mg-b-10">
                          <div class="col-lg-12">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label">Telephone : </label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <div class="input-group-text">
                                    <i class="fa fa-phone tx-16 lh-0 op-6"></i>
                                  </div>
                                </div><!-- input-group-prepend -->
                                <input id="phoneMask" type="text" class="form-control" name="sts_tel" value="<?php echo $company->sts_tel;?>" placeholder="(000) 000-0000" required>
                              </div><!-- input-group -->
                            </div>
                          </div><!-- col-12 -->
                        </div><!-- row -->
                      </div><!-- col-6 -->
                    </div><!-- row -->

                  </div><!-- form-layout -->
                  <div class="modal-footer">
                    <input type="hidden" name="type" value="<?php echo $type;?>">
                    <input type="hidden" name="sts_id" value="<?php echo $company->sts_id;?>">
                    <button type="submit" class="btn btn-info">Save</button>
                    <a href="<?php echo env('BASE_URL');?>assets"  class="btn btn-secondary" >Back to Assets</a>
                  </div><!-- form-layout-footer -->
                </form>

          </div><!-- card -->
        </div><!-- card -->
      </div><!-- col-6 -->
    </div><!-- row -->
  </div><!-- br-pagebody -->
</div><!-- br-mainpanel -->

<div id="exitalert" class="modal fade">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content tx-size-sm">
      <div class="modal-body tx-center pd-y-20 pd-x-20">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <div class="tx-center pd-l-20">
          <i class="icon typcn typcn-delete-outline tx-120 tx-success"></i>
        </div>
        <div class="tx-success tx-uppercase tx-spacing-1 tx-medium tx-18">Exit Page</div>
        <p class="mg-b-30 mg-x-20">You are about to exit from this page.</p>
        <a href="" class="btn btn-info" data-dismiss="modal" aria-label="Close">Yes, Confirm</a>
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
  });
</script>

@stop
