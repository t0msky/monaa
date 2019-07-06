@extends('layouts.master')

@section('content')
<div class="br-mainpanel">
  <div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
      <a class="breadcrumb-item" href="#">Operations</a>
      <a class="breadcrumb-item" href="jobrecord.html">Job Records</a>
      <span class="breadcrumb-item active">Job Information</span>
    </nav>
  </div><!-- br-pageheader -->
  <div class="br-pagetitle">
    <i class="icon typcn typcn-briefcase tx-24"></i>
    <div>
      <h4 class="pd-y-15">Job Information</h4>
      <!-- <p class="mg-b-0">Overview And Summary Of Current Projects</p> -->
    </div>
  </div><!-- d-flex -->

  <?php
    if ($job->job_status == "Completed" ) {
      $disabled_completed = " ";
    } else {
      $disabled_completed = " ";
    }
  ?>
  <div class="br-pagebody pd-x-20 pd-sm-x-30">
    <div class="row row-sm mg-t-20">
      <div class="col-lg mg-t-20 mg-lg-t-0">
        <div class="card shadow-base bd-0">
          <div class="card-header-02 bg-transparent pd-x-25 pd-t-25 pd-b-0 d-flex justify-content-between align-items-center">
            <div class="btn-group" role="group" aria-label="Basic example">
              <button id="buttonprint" type="button" class="btn btn-third" data-toggle="modal" data-target="#deletealert"><i class="icon typcn typcn-trash tx-24"></i></button>
            </div>
          </div>

          <div class="card-body color-gray-lighter pd-t-0">
            <div class="row row-sm mg-t-20 pd-b-20">
              <div class="col-lg-6 mg-t-20 mg-lg-t-0">
                <div class="card shadow-base bd-0">
                  <form method="post" action="<?php echo env('BASE_URL');?>doEditJob" data-parsley-validate data-parsley-errors-messages-disabled id="selectForm-sts">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
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
                            <td>Job Code</td>
                            <td><input class="form-control bd-transparent" type="text" value="<?php echo $job->job_code;?>" disabled></td>
                          </tr>
                          <tr>
                            <td>Job Option</td>
                            <td><input class="form-control bd-transparent" type="text" value="Ship-To-Ship" disabled></td>
                          </tr>
                          <tr>
                            <td>Job Status</td>
                            <td>
                              <?php
                                $incoming = '';
                                $onboard = '';
                                $completed = '';
                                if($job->job_status == 'In-coming') {
                                  $incoming = " selected";
                                } else if($job->job_status == 'On-Board') {
                                  $onboard =  " selected";
                                } else if($job->job_status == 'Completed') {
                                  $completed =  " selected";
                                }
                              ?>
                              <select class="form-control bd-0 select2" name="job_status" <?php echo $disabled_completed;?>>
                                <option value="In-coming" <?php echo $incoming;?>>In-coming</option>
                                <option value="On-board" <?php echo $onboard;?>>On-board</option>
                                <option value="Completed" <?php echo $completed;?>>Completed</option>
                              </select>
                            </td>
                          </tr>
                          <!-- <tr>
                            <td>Client</td>
                            <td><select class="form-control bd-transparent select2" >
                              <option value="Ship-To-Ship<">Ship-To-Ship</option>
                              <option value="Pilotage">Pilotage</option>
                            </select></td>
                          </tr> -->
                          <tr>
                            <td>STS Operator</td>
                            <td>
                              <select class="form-control bd-transparent select2" name="job_operator" <?php echo $disabled_completed;?>>
                                <?php
                                foreach($stsOperator as $o) :
                                ?>
                                <option value="<?php echo $o->sts_id;?>" <?php if($o->sts_id == $job->job_operator) { echo ' selected';} ?> >
                                  <?php echo $o->sts_name;?>
                                </option>
                                <?php
                                endforeach;
                                ?>
                              </select>
                          </td>
                          </tr>
                          <tr>
                            <td>STS Service Provider</td>
                            <td><select class="form-control bd-transparent select2" name="job_provider" <?php echo $disabled_completed;?>>
                              <?php
                              foreach($stsProvider as $p) :
                              ?>
                              <option value="<?php echo $p->sts_id;?>" <?php if($p->sts_id == $job->job_operator) { echo ' selected';} ?> >
                                <?php echo $p->sts_name;?>
                              </option>
                              <?php
                              endforeach;
                              ?>
                            </select></td>
                          </tr>
                          <tr>
                            <td>STS</td>
                            <td><select class="form-control bd-transparent select2" name="job_sts" <?php echo $disabled_completed;?>>
                              <?php foreach ($cards as $c): ?>
                                <option value="<?php echo $c->card_id;?>" <?php if($c->card_id == $job->job_sts) { echo ' selected';} ?> ><?php echo $c->card_name;?></option>
                              <?php endforeach;?>
                            </select></td>
                          </tr>
                          <tr>
                            <td>Mother Ship</td>
                            <td>
                              <select class="form-control bd-transparent select2" name="job_mothership" <?php echo $disabled_completed;?>>
                                <?php foreach($mothership as $m): ?>
                                    <option value="<?php echo $m->ship_id;?>" <?php if($m->ship_id == $job->job_mothership) { echo ' selected';} ?> ><?php echo $m->ship_name;?></option>
                                <?php endforeach; ?>
                              </select>
                            </td>
                          </tr>
                          <tr>
                            <td>Maneuvering Ship</td>
                            <td>
                              <select class="form-control bd-transparent select2-show-search" data-placeholder="Choose one (with searchbox)" name="job_maneuveringship" <?php echo $disabled_completed;?>>
                                <?php foreach($moneuvering as $m): ?>
                                    <option value="<?php echo $m->ship_id;?>" <?php if($m->ship_id == $job->job_maneuveringship) { echo ' selected';} ?> ><?php echo $m->ship_name;?></option>
                                <?php endforeach; ?>
                              </select>
                            </td>
                          </tr>
                          <tr>
                            <td>Commence Date</td>
                            <td><div class="input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <i class="icon ion-calendar tx-16 lh-0 op-6"></i>
                                </div>
                              </div>
                              <?php
                              $explode_date = explode('-',$job->job_commence_date);
                              $commence_date = $explode_date[1].'/'.$explode_date[2].'/'.$explode_date[0];
                              ?>
                              <input id="date-01" type="text" class="form-control" name="job_commence_date" value="<?php echo $commence_date;?>" <?php echo $disabled_completed;?>>
                            </div></td>
                          </tr>
                          <tr>
                            <td>Commence Time</td>
                            <td><div class="input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <i class="far fa-clock tx-16 lh-0 op-6"></i>
                                </div>
                              </div>
                              <input id="time-01" type="text" class="form-control" name="job_commence_time" value="<?php echo $job->job_commence_time;?>" <?php echo $disabled_completed;?>>
                            </div></td>
                          </tr>
                          <tr>
                            <td>Base Location</td>
                            <td><select class="form-control select2-show-search" name="job_location" data-placeholder="Choose one (with searchbox)" <?php echo $disabled_completed;?>>

                              <?php foreach($locations as $l): ?>
                                  <option value="<?php echo $l->loc_id;?>"  <?php if($l->loc_id == $job->job_location) { echo ' selected';} ?> ><?php echo $l->loc_name;?></option>';
                              <?php endforeach; ?>
                            </select></td>
                          </tr>
                          <tr>
                            <td>Mooring Master</td>
                            <td><select class="form-control select2-show-search" name="job_mooring_master" data-placeholder="Choose one (with searchbox)"  <?php echo $disabled_completed;?>>
                              <?php foreach ($users as $u): ?>
                                <option value="<?php echo $u->usr_id;?>" <?php if ($u->usr_id == $job->job_mooring_master) { echo ' selected';} ?> ><?php echo $u->usr_firstname.' '.$u->usr_lastname;?></option>
                              <?php endforeach; ?>
                            </select></td>
                          </tr>
                          <tr>
                            <td>POAC 1</td>
                            <td><select class="form-control select2-show-search" name="job_poac1" data-placeholder="Choose one (with searchbox)" <?php echo $disabled_completed;?>>
                              <?php foreach ($users as $u): ?>
                                <option value="<?php echo $u->usr_id;?>" <?php if ($u->usr_id == $job->job_poac1) { echo ' selected';} ?> ><?php echo $u->usr_firstname.' '.$u->usr_lastname;?></option>
                              <?php endforeach; ?>
                            </select></td>
                          </tr>
                          <tr>
                            <td>POAC 2</td>
                            <td><select class="form-control select2-show-search" name="job_poac2" data-placeholder="Choose one (with searchbox)" <?php echo $disabled_completed;?>>
                              <?php foreach ($users as $u): ?>
                                <option value="<?php echo $u->usr_id;?>" <?php if ($u->usr_id == $job->job_poac2) { echo ' selected';} ?> ><?php echo $u->usr_firstname.' '.$u->usr_lastname;?></option>
                              <?php endforeach; ?>
                            </select></td>
                          </tr>
                          <tr>
                            <td>Remarks</td>
                            <td><textarea rows="1" class="form-control" placeholder="Note" name="job_remark" <?php echo $disabled_completed;?>><?php echo $job->job_remark;?></textarea></td>
                          </tr>
                        </tbody>
                      </table>
                    </div><!-- bd -->
                </div><!-- card -->
              </div><!-- col-6 -->

              <div class="col-lg-6 mg-t-20 mg-lg-t-0">
                <div class="card shadow-base bd-0">
                  <div class="row mg-b-10">
                    <div class="col-lg-6">
                      <div class="form-group mg-b-10-force">
                        <label class="form-control-label">Total Exposure Hours <span class="tx-danger">*</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="far fa-clock tx-16 lh-0 op-6"></i>
                              </div>
                            </div>
                            <input id="time-05" type="text" class="form-control" placeholder="00:00" name="job_hour" value="<?php echo $job->job_hour;?>" <?php echo $disabled_completed;?>>
                          </div><!-- input-group -->
                      </div>
                    </div><!-- col-6 -->
                  </div><!-- row -->
                  <div class="row mg-b-10">
                    <div class="col-lg-6">
                      <div class="form-group mg-b-10-force">
                        <label class="form-control-label">Completion Date : <span class="tx-danger">*</span></label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                              <i class="icon ion-calendar tx-16 lh-0 op-6"></i>
                            </div>
                          </div>
                          <?php
                          if ($job->job_complete_date != '') {
                            $explode_date = explode('-',$job->job_complete_date);
                            $complete_date = $explode_date[1].'/'.$explode_date[2].'/'.$explode_date[0];
                          } else {
                            $complete_date = "";
                          }
                          ?>
                          <input id="date-02" name="job_complete_date" type="text" class="form-control" value="<?php echo $complete_date;?>" placeholder="MM/DD/YYYY" <?php echo $disabled_completed;?>>
                        </div>
                      </div>
                    </div><!-- col-6 -->
                    <div class="col-lg-6">
                      <div class="form-group mg-b-10-force">
                        <label class="form-control-label">Completion Time : <span class="tx-danger">*</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                              <i class="far fa-clock tx-16 lh-0 op-6"></i>
                            </div>
                          </div>
                          <input id="time-02"  name="job_complete_time"  type="text" class="form-control" placeholder="Set time" value="<?php echo $job->job_complete_time;?>" <?php echo $disabled_completed;?>>
                        </div>
                      </div>
                    </div><!-- col-8 -->
                  </div><!-- row -->
                  <div class="row mg-b-10">
                    <div class="col-lg-6">
                      <div class="form-group mg-b-10-force">
                        <div class="d-flex justify-content-between align-items-center">
                          <label class="form-control-label">Exceeding Hours > 24 <span class="tx-danger">*</label>
                          <label class="tx-gray-400 form-control-label">hh : mm</label>
                        </div>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                              <label class="rdiobox wd-16 mg-b-0">
                                <input name="rdio" type="radio" disabled><span></span>
                              </label>
                            </div>
                          </div>
                          <input id="time-03" type="text" class="form-control" placeholder="00:00" name="job_exceeding24"  value="<?php echo $job->job_exceeding24;?>" <?php echo $disabled_completed;?>>
                        </div><!-- input-group -->
                      </div>
                    </div><!-- col-6 -->
                    <div class="col-lg-6">
                      <div class="form-group mg-b-10-force">
                        <div class="d-flex justify-content-between align-items-center">
                          <label class="form-control-label">Exceeding Hours > 48 <span class="tx-danger">*</label>
                          <label class="tx-gray-400 form-control-label">hh : mm</label>
                        </div>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                              <label class="rdiobox wd-16 mg-b-0">
                                <input name="rdio" type="radio" disabled><span></span>
                              </label>
                            </div>
                          </div>
                          <input id="time-04" type="text" class="form-control" placeholder="00:00" name="job_exceeding48" value="<?php echo $job->job_exceeding48;?>" <?php echo $disabled_completed;?>>
                        </div><!-- input-group -->
                      </div>
                    </div><!-- col-6 -->
                  </div><!-- row -->
                  <div class="row mg-b-10">
                    <div class="col-lg-6">
                      <div class="form-group mg-b-10-force">
                        <div class="d-flex justify-content-between align-items-center">
                          <label class="form-control-label">Berthing : </label>
                          <div class="dropdown hidden-xs-down">
                            <?php

                            if(!empty($voucher_berthing)) {
                              $vou_code_berthing = $voucher_berthing->vou_code;
                            } else {
                              $vou_code_berthing = '';
                            }
                            if ($job->job_status != "In-coming" && $vou_code_berthing == '') {

                            ?>

                            <a href="#" data-toggle="dropdown" class="tx-success hover-info" data-role="disabled"><i class="icon ion-plus tx-20"></i></a>
                            <!-- <button type="button" data-toggle="dropdown" class="btn btn-third tx-success hover-info"><i class="icon ion-plus tx-20"></i></button> -->
                            <div class="dropdown-menu dropdown-menu-right pd-10">
                              <nav class="nav nav-style-2 flex-column">
                                <a href="../add-voucher/<?php echo $job->job_id;?>/1" class="nav-link">Submit Voucher</a>
                              </nav>
                            </div><!-- dropdown-menu -->
                          <?php } ?>
                          </div>
                        </div>
                        <input type="hidden" name="job_berthing" value="<?php echo $vou_code_berthing;?>">
                        <input class="form-control" type="text" name="job_berthing_disabled" placeholder="" value="<?php echo $vou_code_berthing;?>" disabled>
                      </div>
                    </div><!-- col-6 -->
                    <div class="col-lg-6">
                      <div class="form-group mg-b-10-force">
                        <div class="d-flex justify-content-between align-items-center">
                          <label class="form-control-label">Unberthing : </label>
                          <div class="dropdown hidden-xs-down">
                            <?php
                            if(!empty($voucher_unberthing)) {
                              $voucher_unberthing = $voucher_unberthing->vou_code;
                            } else {
                              $voucher_unberthing = '';
                            }

                            if ($job->job_status != "In-coming" && $voucher_unberthing == '') {
                            ?>
                            <a href="#" data-toggle="dropdown" class="tx-success hover-info"><i class="icon ion-plus tx-20"></i></a>
                            <div class="dropdown-menu dropdown-menu-right pd-10">
                              <nav class="nav nav-style-2 flex-column">
                                <a href="../add-voucher/<?php echo $job->job_id;?>/2" class="nav-link" >Submit Voucher</a>
                              </nav>
                            </div><!-- dropdown-menu -->
                            <?php } ?>
                          </div>
                        </div>
                        <input class="form-control" type="hidden" name="job_unberthing" value="<?php echo $voucher_unberthing;?>">
                        <input class="form-control" type="text" name="job_unberthing" value="<?php echo $voucher_unberthing;?>" disabled>
                      </div>
                    </div><!-- col-6 -->
                  </div><!-- row -->
                </div><!-- card -->
                <div class="modal-footer">
                  <input type="hidden" name="job_id" value="<?php echo $job->job_id;?>">

                  <?php #if ($job->job_status != 'Completed') { ?>
                  <button type="submit" class="btn btn-info">Save Job</button>
                  <?php #} ?>
                  <a href="<?php echo env('BASE_URL');?>jobrecords"  class="btn btn-secondary" >Back to Job Records</a>
                  <?php #if ($job->job_status != 'Completed') { ?>
                  <!--<a href="<?php echo env('BASE_URL');?>jobinfo/<?php echo $job->job_id;?>" type="reset" class="btn btn-secondary">Reset</a>-->
                  <?php #} ?>
                </div><!-- form-layout-footer -->
                </form>
              </div><!-- col-6 -->
            </div><!-- row -->
          </div><!-- card-body -->
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
        <form method="post" action="<?php echo env('BASE_URL');?>doDeleteJob" data-parsley-validate data-parsley-errors-messages-disabled id="selectForm-sts">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="job_id" id="job_id" value="<?php echo $job->job_id;?>">
          <div class="tx-success tx-uppercase tx-spacing-1 tx-medium tx-18">Are you sure?</div>
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
    $('#selectForm-sts').parsley();
    $('#selectForm-pilotage').parsley();
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
