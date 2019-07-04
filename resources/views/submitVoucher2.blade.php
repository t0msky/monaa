@extends('layouts.master')

@section('content')
<div class="br-mainpanel">
  <div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
      <a class="breadcrumb-item" href="#">Vouchers</a>
      <a class="breadcrumb-item" href="#">Vouchers Record</a>
      <span class="breadcrumb-item active">Submit Voucher</span>
    </nav>
  </div><!-- br-pageheader -->
  <div class="br-pagetitle">
    <i class="icon typcn typcn-document-text tx-24"></i>
    <div>
      <h4 class="pd-y-15">Submit Voucher</h4>
      <!-- <p class="mg-b-0">Overview And Summary Of Current Projects</p> -->
    </div>
  </div><!-- d-flex -->

  @if ( session()->has('error') )
  <div class="alert alert-danger" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    {{ session()->get('error') }}
  </div><!-- alert -->
  @endif

  <div class="br-pagebody pd-x-20 pd-sm-x-30">
    <div class="row row-sm mg-t-20 mg-b-40">
      <div class="col-lg mg-t-20 mg-lg-t-0">
        <div class="card shadow-base bd-0">
          <div class="card-header-02 bg-transparent pd-x-25 pd-t-25 pd-b-0 d-flex justify-content-between align-items-center">
            <!-- <div class="btn-group" role="group" aria-label="Basic example">
              <button id="buttonprint" type="button" class="btn btn-third" data-toggle="modal" data-target="#deletealert"><i class="icon typcn typcn-times tx-24"></i></button>
            </div> -->
          </div><!-- card-header -->

          <form method="post" action="<?php echo env('BASE_URL');?>do-add-voucher" data-parsley-validate data-parsley-errors-messages-disabled id="selectForm-voucher">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="card-body color-gray-lighter pd-t-0">
              <!-- <div class="row row-sm mg-t-20 pd-b-20">

                <table class="table">
                  <tr>
                    <td>Job Code</td>
                    <td>
                      <input type="hidden" name="vou_job_id" value="<?php //echo $job->job_id;?>">
                      <input class="form-control bd-transparent" type="text" value="<?php //echo $job->job_code;?>" disabled></td>
                  </tr>
                </table>
              </div> -->
              <div class="row row-sm mg-t-20 pd-b-20">
              <div class="col-lg-6 mg-t-20 mg-lg-t-0">
                <table class="table">
                  <tr>
                    <td>Job Code</td>
                    <td>
                      <input type="hidden" name="vou_job_id" value="<?php //echo $job->job_id;?>">
                      <!-- <input class="form-control bd-transparent" type="text" value="<?php //echo $job->job_code;?>" disabled> -->
                      <div id="slWrapper03" class="parsley-select">
                        <select class="form-control select2-show-search addPrefer"  style="width: 100%" placeholder="Choose one" value=""  required>
                          <option label="Choose one" value=""></option>
                          <?php foreach ($jobs as $j) : ?>
                            <option value="<?php echo $j->job_id;?>"><?php echo $j->job_code;?></option>
                          <?php endforeach;?>
                        </select>
                      </div>

                    </td>
                  </tr>
                </table>
              </div>
              </div>

              <div class="row row-sm mg-t-20 pd-b-20" id="displayVoucherDetails">
                <div class="col-lg-6 mg-t-20 mg-lg-t-0">
                  <div class="card shadow-base bd-0">
                      <div class="bd-0 bd-gray-300 rounded table-responsive">
                        <table class="table mg-b-0">
                          <thead style='visibility: collapse;'>
                            <tr>
                              <th class="wd-35p">Name</th>
                              <th>Position</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>Voucher Code : <span class="tx-danger">*</span></td>
                              <td><input class="form-control" type="number" name="vou_code" value="" style="width: 100%" placeholder="Insert Voucher Code" required></td>
                            </tr>

                            <tr>
                              <td>Issued Date : <span class="tx-danger">*</span></td>
                              <td><div class="input-group">
                                <div class="input-group-prepend">
                                  <div class="input-group-text">
                                    <i class="icon ion-calendar tx-16 lh-0 op-6"></i>
                                  </div>
                                </div>
                                <input id="date-01" type="text" name="vou_date" class="form-control" placeholder="00/00/000" value="" required>
                              </div></td>
                            </tr>
                            <tr>
                              <td>Job Scope</td>
                              <td>

                                <input type="hidden" name="vou_type" value="<?php //echo $t;?>">
                                <input class="form-control bd-transparent" type="text" value="<?php //echo $t;?>" disabled>
                              </td>
                            </tr>
                            <tr>
                              <input type="hidden" name="vou_ship" value="<?php //echo $manuevering->ship_id;?>">
                              <td>Maneuvering Ship</td>
                              <td class="tx-right"><?php //echo $manuevering->ship_name;?></td>
                            </tr>
                            <tr>
                              <td>Length Overall (m)</td>
                              <td class="tx-right"><?php #echo $manuevering->ship_LOA;?></td>
                            </tr>
                            <tr>
                              <td>Draught (m)</td>
                              <td class="tx-right"><?php #echo $manuevering->ship_DWT;?></td>
                            </tr>
                            <tr>
                              <td>IMO No.</td>
                              <td class="tx-right"><?php #echo $manuevering->ship_imo_no;?></td>
                            </tr>
                          </tbody>
                        </table>
                      </div><!-- bd -->
                  </div><!-- card -->
                </div><!-- col-6 -->

                <div class="col-lg-6 mg-t-20 mg-lg-t-0">
                  <div class="card shadow-base bd-0">
                    <div class="bd-0 bd-gray-300 rounded table-responsive">
                      <table class="table mg-b-0">
                        <thead style='visibility: collapse;'>
                          <tr>
                            <th class="wd-40p">Items</th>
                            <th>Desc</th>
                            <th class="wd-5p">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr id="addRow">
                            <td>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <div class="input-group-text">
                                    <i class="far fa-clock tx-16 lh-0 op-6"></i>
                                  </div>
                                </div>
                                <input id="time-03" type="text" class="form-control addMain" placeholder="00:00" required>
                              </div><!-- input-group -->
                            </td>
                            <td>
                              <div id="slWrapper03" class="parsley-select">
                                <select class="form-control select2-show-search addPrefer"  style="width: 100%" placeholder="Choose one" value="" data-parsley-class-handler="#slWrapper03" data-parsley-errors-container="#slErrorContainer" required>
                                  <option label="Choose one" value=""></option>
                                  <?php #foreach ($jobItems as $j) : ?>
                                    <option value="<?php #echo $j->item_name;?>"><?php #echo $j->item_name;?></option>
                                  <?php #endforeach;?>
                                </select>
                              </div>
                            </td>
                            <td class="tx-center">
                              <span class="addBtn tx-teal tx-24 tx-primary">
                                <i class="icon typcn typcn-plus"></i>
                              </span>
                            </td>
                          </tr>
                          <tr>
                            <td>Advisor / Pilot / Mooring Master : <span class="tx-danger">*</span></td>
                            <td>
                              <div id="slWrapper04" class="parsley-select">
                              <select class="form-control select2-show-search" data-placeholder="Choose one (with searchbox)" name="vou_master" data-parsley-class-handler="#slWrapper04" data-parsley-errors-container="#slErrorContainer" required>
                              <option label="Choose one" value=""></option>
                              <?php #foreach ($users as $u) : ?>
                                <option value="<?php #echo $u->usr_id;?>"><?php #echo $u->usr_firstname.' '.$u->usr_lastname;?></option>
                              <?php #endforeach;?>
                            </select>
                            </div>
                          </td>
                          </tr>
                          <tr>
                            <td>Vessel's Master Agent : <span class="tx-danger">*</span></td>
                            <td>
                              <div id="slWrapper05" class="parsley-select">
                                <select class="form-control select2-show-search" placeholder="Choose one" name="vou_agent" data-parsley-class-handler="#slWrapper05" data-parsley-errors-container="#slErrorContainer" required>
                                  <option label="Choose one"></option>
                                  <?php #foreach ($users as $u) : ?>
                                    <option value="<?php #echo $u->usr_id;?>"><?php #echo $u->usr_firstname.' '.$u->usr_lastname;?></option>
                                  <?php #endforeach;?>
                                </select>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>Remarks</td>
                            <td><textarea rows="1" class="form-control" placeholder="Note" name="vou_remark" value=""></textarea></td>
                          </tr>
                        </tbody>
                      </table>
                    </div><!-- bd -->
                  </div><!-- card -->
                </div><!-- col-6 -->
              </div><!-- row -->
            </div><!-- card-body -->
            <div class="modal-footer">
              <button type="submit" class="btn btn-info">Submit Voucher</button>
              <button onclick="window.location.href='job-info.html'" class="btn btn-secondary">Back</button>
            </div><!-- form-layout-footer -->
          </form>
        </div><!-- card -->
      </div><!-- col-6 -->
    </div><!-- row -->
  </div><!-- br-pagebody -->

</div><!-- br-mainpanel -->

<div id="edit-1" class="modal fade">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content tx-size-sm">
      <div class="modal-header pd-x-20">
        <h6 class="tx-14 mg-b-0 tx-capitalize tx-inverse tx-medium">Edit Job Detail</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="#" data-parsley-validate>
        <div class="modal-body pd-20">
          <div class="row">
            <div class="col-lg-6">
              <div class="row mg-b-10">
                <div class="col-lg-12">
                  <div class="form-group mg-b-10-force">
                    <label class="form-control-label">Company Name : </label>
                    <input class="form-control" type="text" value="" placeholder="" required>
                  </div>
                </div><!-- col-12 -->
              </div><!-- row -->
              <div class="row mg-b-10">
                <div class="col-lg-12">
                  <div class="form-group mg-b-10-force">
                    <label class="form-control-label">Company Address: </label>
                    <input class="form-control" type="text" value="" placeholder="">
                  </div>
                </div><!-- col-12 -->
              </div><!-- row -->
              <div class="row mg-b-10">
                <div class="col-lg-6">
                  <div class="form-group mg-b-10-force">
                    <label class="form-control-label">ZIP / Postal Code : </label>
                    <input class="form-control" type="number" value="" placeholder="">
                  </div>
                </div><!-- col-6 -->
                <div class="col-lg-6">
                  <div class="form-group mg-b-10-force">
                    <label class="form-control-label">Country : </label>
                    <input class="form-control" type="text" value="" placeholder="">
                  </div>
                </div><!-- col-6 -->
              </div><!-- row -->
            </div><!-- col-6 -->
            <div class="col-lg-6">
              <div class="row mg-b-10">
                <div class="col-lg-12">
                  <div class="form-group mg-b-10-force">
                    <label class="form-control-label">Company Email : </label>
                    <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
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
                      <input id="phoneMask" type="text" class="form-control" placeholder="(999) 999-9999">
                    </div><!-- input-group -->
                  </div>
                </div><!-- col-12 -->
              </div><!-- row -->
            </div><!-- col-6 -->
          </div><!-- row -->
        </div><!-- modal-body -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-info">Save</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
      </form>
    </div>
  </div><!-- modal-dialog -->
</div><!-- modal -->

<!-- MODAL ALERT MESSAGE -->
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
        <div class="tx-success tx-uppercase tx-spacing-1 tx-medium tx-18">Are you sure?</div>
        <p class="mg-b-30 mg-x-20">You will not be able to recover this voucher!</p>
        <a href="" class="btn btn-info"  data-dismiss="modal" aria-label="Close">Yes, Confirm</a>
      </div><!-- modal-body -->
    </div><!-- modal-content -->
  </div><!-- modal-dialog -->
</div><!-- modal -->
@stop

@section('docready')
<script>

  $("#displayVoucherDetails").hide();

  $(function(){
    'use strict';
    $('#selectForm-voucher').parsley();
  });
  // Datepicker
  $('.fc-datepicker').datepicker({
    showOtherMonths: true,
    selectOtherMonths: true
  });

  $('#date-01').datepicker({
    showOtherMonths: true,
    selectOtherMonths: true,
    numberOfMonths: 2
  });
  $('#date-02').datepicker({
    showOtherMonths: true,
    selectOtherMonths: true,
    numberOfMonths: 2
  });

  // Time Picker
  $('#time-01').timepicker({'scrollDefault': 'now'});
  $('#time-02').timepicker({'scrollDefault': 'now'});

  // Input Masks
  $('#phoneMask').mask('(999) 999-9999');
  $('#time-03').mask('99:99');
  $('#time-04').mask('99:99');
  $('#time-05').mask('99:99');


</script>
@stop
