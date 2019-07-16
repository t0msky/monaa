@extends('layouts.master')

@section('content')
<?php

// print_r($client); die();

?>
<div class="br-mainpanel">
  <div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
      <a class="breadcrumb-item" href="#">Operations</a>
      <a class="breadcrumb-item" href="job-record.html">Job Records</a>
      <span class="breadcrumb-item active">Job Information ( Pilotage )</span>
    </nav>
  </div><!-- br-pageheader -->
  <div class="br-pagetitle hidden-xs-down">
    <i class="icon typcn typcn-briefcase tx-24"></i>
    <div>
      <h4 class="pd-y-15">Job Information ( Pilotage )</h4>
    </div>
  </div><!-- d-flex -->

  <div class="br-pagebody pd-x-20 pd-sm-x-30 pd-b-40">
    <div class="row row-sm mg-t-20 pd-b-40">
      <div class="col-lg mg-t-20 mg-lg-t-0">
        <div class="card shadow-base bd-0">
          <div class="card-header-02 bg-transparent pd-x-25 pd-t-25 pd-b-0 d-flex justify-content-between align-items-center">
            <div class="btn-group" role="group" aria-label="Basic example">
              <button id="buttonprint" type="button" class="btn btn-third" data-toggle="modal" data-target="#deletealert"><i class="icon typcn typcn-trash tx-24"></i></button>
            </div>
          </div>
          <div class="card">
                <form method="post" action="<?php echo env('BASE_URL');?>doEditJobPilotage" data-parsley-validate data-parsley-errors-messages-disabled id="selectForm-pilotage">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">

                  <div class="form-layout form-layout-1">
                    <div class="row">
                      <div class="col-lg-6">

                        <div class="row mg-b-10">

                          <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label">Job Code : <span class="tx-success">*</span></label>
                              <input class="form-control" type="text" value="<?php echo $job->pil_code;?>" name="pil_code" placeholder="Enter Job Code" disabled>
                            </div>
                          </div>

                          <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                              <div class="d-flex justify-content-between align-items-center">
                                <label class="form-control-label">Piloting Ship : <span class="tx-success">*</span></label>
                              </div>
                              <div id="slWrapper05" class="parsley-select">
                              <select name="pil_piloting_ship" class="form-control select2-show-search" style="width: 100%" data-parsley-class-handler="#slWrapper05" data-parsley-errors-container="#slErrorContainer" data-placeholder="Choose One" required>
                                <option value="">Choose One</option>
                                <?php foreach($moneuvering as $m): ?>
                                    <option value="<?php echo $m->ship_id;?>" <?php if($m->ship_id == $job->pil_piloting_ship) { echo ' selected';} ?> ><?php echo $m->ship_name;?></option>
                                <?php endforeach; ?>
                              </select>
                              </div>
                            </div>
                          </div><!-- col-6 -->
                        </div>

                        <div class="row mg-b-10">
                          <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                              <div class="d-flex justify-content-between align-items-center">
                                <label class="form-control-label">STS Operator : <span class="tx-success">*</span></label>
                              </div>
                              <div id="slWrapper02" class="parsley-select">
                              <select name="pil_operator" class="form-control parsley-error select2-show-search" style="width: 100%" data-parsley-class-handler="#slWrapper02" data-parsley-errors-container="#slErrorContainer" data-placeholder="Choose One" required>
                                <option>Choose One</option>
                                <?php
                                foreach($stsOperator as $o) :
                                ?>
                                <option value="<?php echo $o->sts_id;?>" <?php if($o->sts_id == $job->pil_operator) { echo ' selected';} ?> >
                                  <?php echo $o->sts_name;?>
                                </option>
                                <?php
                                endforeach;
                                ?>
                              </select>
                              </div>
                            </div>
                          </div><!-- col-6 -->
                          <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                              <div class="d-flex justify-content-between align-items-center">
                                <label class="form-control-label">STS Service Provider : <span class="tx-success">*</span></label>
                              </div>
                              <div id="slWrapper03" class="parsley-select">
                              <select name="pil_provider" class="form-control select2-show-search" style="width: 100%" data-parsley-class-handler="#slWrapper03" data-parsley-errors-container="#slErrorContainer"data-placeholder="Choose One" required>
                                <option>Choose One</option>
                                <?php
                                foreach($stsProvider as $p) :
                                ?>
                                <option value="<?php echo $p->sts_id;?>" <?php if($p->sts_id == $job->pil_provider) { echo ' selected';} ?> >
                                  <?php echo $p->sts_name;?>
                                </option>
                                <?php
                                endforeach;
                                ?>
                              </select>
                              </div>
                            </div>
                          </div><!-- col-6 -->
                        </div><!-- row -->

                        <div class="row mg-b-10">
                          <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label">Onboard Date : <span class="tx-success">*</span></label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <div class="input-group-text">
                                    <i class="icon ion-calendar tx-16 lh-0 op-6"></i>
                                  </div>
                                </div>
                                <?php
                                $explode_date = explode('-',$job->pil_onboard_date);
                                $pil_onboard_date = $explode_date[1].'/'.$explode_date[2].'/'.$explode_date[0];
                                ?>
                                <input id="date-pil_onboard_date" name="pil_onboard_date" value="<?php echo $pil_onboard_date;?>" type="text" class="form-control" placeholder="MM/DD/YYYY" required>
                              </div>
                            </div>
                          </div><!-- col-6 -->
                          <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label">Onboard Time : <span class="tx-success">*</span></label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <div class="input-group-text">
                                    <i class="far fa-clock tx-16 lh-0 op-6"></i>
                                  </div>
                                </div>
                                <?php
                                if ($job->pil_onboard_time != '') {
                                  $job_onboard_time_explode = explode(' ', $job->pil_onboard_time);
                                  $job_onboard_time = $job_onboard_time_explode[0];
                                  $job_onboard_time_ampm = $job_onboard_time_explode[1];
                                } else {
                                  $job_onboard_time = '00:00';
                                  $job_onboard_time_ampm = "am";
                                }
                                ?>

                                <input id="time-pil_onboard_time" name="pil_onboard_time" value="<?php echo $job_onboard_time;?>" type="text" class="form-control" placeholder="00:00">
                                <div class="mg-l-10">
                                <select name="pil_onboard_time_ampm" class="form-control select2" style="width: 100px" required>
                                  <option value="am" <?php if($job_onboard_time_ampm=="am"){echo ' selected';}?>>AM</option>
                                  <option value="pm" <?php if($job_onboard_time_ampm=="pm"){echo ' selected';}?>>PM</option>
                                </select>
                                </div>
                              </div>
                            </div>
                          </div><!-- col-8 -->
                        </div><!-- row -->

                        <div class="row mg-b-10">
                          <div class="col-lg-6">
                              <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Event : <span class="tx-success">*</span></label>
                                <select name="pil_event" id="select-pil_event" class="form-control select2"  required>
                                  <option value="">Choose One</option>
                                  <option value="Inward Pilotage" <?php echo ($job->pil_event=="Inward Pilotage") ? ' selected' : '' ?>>Inward Pilotage</option>
                                  <option value="Outward Pilotage" <?php echo ($job->pil_event=="Outward Pilotage") ? ' selected' : '' ?>>Outward Pilotage</option>
                                  <option value="Shifting Anchorage" <?php echo ($job->pil_event=="Shifting Anchorage") ? ' selected' : '' ?>>Shifting Anchorage</option>
                                </select>
                              </div>
                          </div>

                          <div class="col-lg-6">
                              <div class="form-group mg-b-10-force">
                                <label class="form-control-label">POAC : <span class="tx-success">*</span></label>
                                <select name="pil_poac" class="form-control select2-show-search" data-placeholder="Choose One" required>
                                  <?php foreach ($users as $u): ?>
                                    <option value="<?php echo $u->usr_id;?>" <?php if ($u->usr_id == $job->pil_poac) { echo ' selected';} ?> ><?php echo $u->usr_firstname.' '.$u->usr_lastname;?></option>
                                  <?php endforeach; ?>
                                </select>
                              </div>
                          </div>

                        </div><!-- row -->

                        <div class="row mg-b-10">
                          <div class="col-lg-12">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label">Base Location : </label>
                              <select name="pil_location" class="form-control select2" style="width: 100%" data-placeholder="Choose One" required>
                                <?php foreach($locations as $l): ?>
                                    <option value="<?php echo $l->loc_id;?>"  <?php if($l->loc_id == $job->pil_location) { echo ' selected';} ?> ><?php echo $l->loc_name;?></option>';
                                <?php endforeach; ?>
                              </select>
                            </div>
                          </div><!-- col-12 -->
                        </div><!-- row -->

                        <div class="row mg-b-10">
                          <div class="col-lg-12">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label">Remarks : </label>
                              <textarea name="pil_remark" rows="4" class="form-control" placeholder="Note"><?php echo $job->pil_remark;?></textarea>
                            </div>
                          </div><!-- col-12 -->
                        </div><!-- row -->
                      </div>

                      <div class="col-lg-6">
                        <div class="row mg-b-10">

                          <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                              <?php
                              if ($job->pil_complete_date != '') {
                                $explode_date = explode('-',$job->pil_complete_date);
                                $complete_date = $explode_date[1].'/'.$explode_date[2].'/'.$explode_date[0];
                              } else {
                                $complete_date = "";
                              }
                              ?>
                              <label class="form-control-label">Complete Date : <span class="tx-success">*</span></label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <div class="input-group-text">
                                    <i class="icon ion-calendar tx-16 lh-0 op-6"></i>
                                  </div>
                                </div>
                                <input id="date-pil_complete_date" name="pil_complete_date" value="<?php echo $complete_date;?>" type="text" class="form-control" placeholder="MM/DD/YYYY" required>
                              </div>
                            </div>
                          </div><!-- col-6 -->
                          <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                              <?php
                              if ($job->pil_complete_time != '') {
                                $job_complete_time_explode = explode(' ', $job->pil_complete_time);
                                $job_complete_time = $job_complete_time_explode[0];
                                $job_complete_time_ampm = $job_complete_time_explode[1];
                              } else {
                                $job_complete_time = "00:00";
                                $job_complete_time_ampm = "am";
                              }

                              ?>
                              <label class="form-control-label">Complete Time : <span class="tx-success">*</span></label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <div class="input-group-text">
                                    <i class="far fa-clock tx-16 lh-0 op-6"></i>
                                  </div>
                                </div>
                                <input id="time-pil_complete_time" name="pil_complete_time" value="<?php echo $job_complete_time;?>" type="text" class="form-control" placeholder="00:00">
                                <div class="mg-l-10">
                                <select name="pil_complete_time_ampm" class="form-control select2" style="width: 100px" required>
                                  <option value="am" <?php if($job_complete_time_ampm=="am"){echo ' selected';}?>>AM</option>
                                  <option value="pm" <?php if($job_complete_time_ampm=="pm"){echo ' selected';}?>>PM</option>
                                </select>
                                </div>
                              </div>
                            </div>
                          </div><!-- col-8 -->
                        </div>

                        <div class="row mg-b-10">
                          <div class="col-lg-6">
                            <label class="form-control-label">Job Status : <span class="tx-success">*</span></label>
                            <?php
                              $incoming = '';
                              $onboard = '';
                              $completed = '';
                              if($job->pil_status == 'In-coming') {
                                $incoming = " selected";
                              } else if($job->pil_status == 'On-Board') {
                                $onboard =  " selected";
                              } else if($job->pil_status == 'Completed') {
                                $completed =  " selected";
                              }
                            ?>
                            <select class="form-control bd-0 select2" name="pil_status" >
                              <option value="In-coming" <?php echo $incoming;?>>In-coming</option>
                              <option value="On-board" <?php echo $onboard;?>>On-board</option>
                              <option value="Completed" <?php echo $completed;?>>Completed</option>
                            </select>
                          </div>

                          <!-- <div class="col-lg-6">
                            <div class="d-flex justify-content-between align-items-center">
                              <label class="form-control-label">Voucher No : </label>
                              <div class="dropdown hidden-xs-down">
                                <?php #if ($job->pil_status != "In-coming" && $job->pil_voucher_code == '') { ?>
                                <a href="#" data-toggle="dropdown" class="tx-success hover-info"><i class="icon ion-plus tx-20"></i></a>
                                <div class="dropdown-menu dropdown-menu-right pd-10">
                                  <nav class="nav nav-style-2 flex-column">
                                    <a href="../add-voucher-pilotage/<?php #echo $job->pil_id;?>/2" class="nav-link" >Submit Voucher</a>
                                  </nav>
                                </div>
                              </div>
                              <?php #} ?>
                            </div>
                            <input class="form-control" type="hidden" name="pil_voucher_code" value="<?php #echo $job->pil_voucher_code;?>">
                            <input class="form-control" type="text" value="<?php #echo $job->pil_voucher_code;?>" disabled>
                          </div> -->

                        </div>
                      </div> <!-- col-lg-6 -->

                    </div>
                  </div>
                  <div class="modal-footer">
                    <input class="form-control" type="hidden" name="pil_id" value="<?php echo $job->pil_id;?>">
                    <button type="submit" class="btn btn-info">Save Job</button>
                    <a href="<?php echo env('BASE_URL');?>jobrecords"  class="btn btn-secondary" >Back to Job Records</a>
                  </div><!-- form-layout-footer -->
                </form>

          </div><!-- card -->
        </div><!-- card -->
      </div><!-- col-6 -->
    </div><!-- row -->
  </div><!-- br-pagebody -->
</div><!-- br-mainpanel -->

<<!-- MODAL ALERT MESSAGE -->
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
        <form method="post" action="<?php echo env('BASE_URL');?>doDeleteJobPilotage" data-parsley-validate data-parsley-errors-messages-disabled id="selectForm-sts">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="pil_id" id="pil_id" value="<?php echo $job->pil_id;?>">
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

    <?php if(session()->has('error')){?>
      toastr.error('<?php echo session()->get('error'); ?>')
    <?php } ?>

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
    $('#selectForm-sts').parsley();
    $('#selectForm-pilotage').parsley();
  });
  // Datepicker
  $('#date-pil_onboard_date').datepicker({
    showOtherMonths: true,
    selectOtherMonths: true,
    numberOfMonths: 2
  });
  $('#date-pil_complete_date').datepicker({
    showOtherMonths: true,
    selectOtherMonths: true,
    numberOfMonths: 2
  });

  // Input Masks
  $('#time-pil_onboard_time').mask('99:99');
  $('#time-pil_complete_time').mask('99:99');


</script>
@stop
