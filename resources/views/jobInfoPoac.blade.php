@extends('layouts.master')

@section('content')
<div class="br-mainpanel">
  <div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
      <a class="breadcrumb-item" href="#">Operations</a>
      <a class="breadcrumb-item" href="jobrecord.html">Job Records</a>
      <span class="breadcrumb-item active">Job Information ( Ship-To-Ship )</span>
    </nav>
  </div><!-- br-pageheader -->
  <div class="br-pagetitle">
    <i class="icon typcn typcn-briefcase tx-24"></i>
    <div>
      <h4 class="pd-y-15">Job Information ( Ship-To-Ship )</h4>
      <!-- <p class="mg-b-0">Overview And Summary Of Current Projects</p> -->
    </div>
  </div><!-- d-flex -->

  <?php
      $disabled = " disabled";
  ?>
  <div class="br-pagebody pd-x-20 pd-sm-x-30">
    <div class="row row-sm mg-t-20">
      <div class="col-lg mg-t-20 mg-lg-t-0 pd-b-30">
        <div class="card shadow-base bd-0">
          <div class="card-header-02 bg-transparent pd-x-25 pd-t-25 pd-b-0 d-flex justify-content-between align-items-center">

          </div>

          <div class="card-body color-gray-lighter pd-t-0">
            <div class="row row-sm mg-t-20 pd-b-20">
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
                              <select class="form-control bd-0 select2" name="job_status" <?php echo $disabled;?>>
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
                              <select class="form-control bd-transparent select2" name="job_operator" <?php echo $disabled;?>>
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
                            <td><select class="form-control bd-transparent select2" name="job_provider" <?php echo $disabled;?>>
                              <?php
                              foreach($stsProvider as $p) :
                              ?>
                              <option value="<?php echo $p->sts_id;?>" <?php if($p->sts_id == $job->job_provider) { echo ' selected';} ?> >
                                <?php echo $p->sts_name;?>
                              </option>
                              <?php
                              endforeach;
                              ?>
                            </select></td>
                          </tr>
                          <tr>
                            <td>Service Options</td>
                            <td><select class="form-control bd-transparent select2" name="job_sts" <?php echo $disabled;?>>
                              <?php foreach ($cards as $c): ?>
                                <option value="<?php echo $c->card_id;?>" <?php if($c->card_id == $job->job_sts) { echo ' selected';} ?> >
                                  <?php echo $c->card_type.' - '.$c->card_name;?>
                                </option>
                              <?php endforeach;?>
                            </select></td>
                          </tr>
                          <tr>
                            <td>Mother Ship</td>
                            <td>
                              <select class="form-control bd-transparent select2" name="job_mothership" <?php echo $disabled;?>>
                                <?php foreach($mothership as $m): ?>
                                    <option value="<?php echo $m->ship_id;?>" <?php if($m->ship_id == $job->job_mothership) { echo ' selected';} ?> ><?php echo $m->ship_name;?></option>
                                <?php endforeach; ?>
                              </select>
                            </td>
                          </tr>
                          <tr>
                            <td>Maneuvering Ship</td>
                            <td>
                              <select class="form-control bd-transparent select2-show-search" data-placeholder="Choose one (with searchbox)" name="job_maneuveringship" <?php echo $disabled;?>>
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
                              <input id="date-01" type="text" class="form-control" name="job_commence_date" value="<?php echo $commence_date;?>" <?php echo $disabled;?>>
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
                              <?php
                              if ($job->job_commence_time != '') {
                                $job_commence_time_explode = explode(' ', $job->job_commence_time);
                                $job_commence_time = $job_commence_time_explode[0];
                                $job_commence_time_ampm = $job_commence_time_explode[1];
                              } else {
                                $job_commence_time = '00:00';
                                $job_commence_time_ampm = "am";
                              }
                              // echo $str = strlen($job_commence_time);
                              ?>
                              <input id="time-01" type="text" class="form-control" name="job_commence_time" value="<?php echo $job_commence_time;?>" <?php echo $disabled;?>>
                              <div class="mg-l-10">
                              <select id="job_commence_time_ampm" name="job_commence_time_ampm" class="form-control select2" style="width: 100px" required <?php echo $disabled;?>>
                                <option value="am" <?php if($job_commence_time_ampm=="am"){echo ' selected';}?>>AM</option>
                                <option value="pm" <?php if($job_commence_time_ampm=="pm"){echo ' selected';}?>>PM</option>
                              </select>
                              </div>
                            </div></td>
                          </tr>
                          <tr>
                            <td>Base Location</td>
                            <td><select class="form-control select2" name="job_location" data-placeholder="Choose one" <?php echo $disabled;?>>

                              <?php foreach($locations as $l): ?>
                                  <option value="<?php echo $l->loc_id;?>"  <?php if($l->loc_id == $job->job_location) { echo ' selected';} ?> ><?php echo $l->loc_name;?></option>';
                              <?php endforeach; ?>
                            </select></td>
                          </tr>
                          <tr>
                            <td>Mooring Master</td>
                            <td><select class="form-control select2-show-search" name="job_mooring_master" data-placeholder="Choose one (with searchbox)"  <?php echo $disabled;?>>
                              <option value="">Choose One</option>
                              <?php foreach ($users as $u): ?>
                                <option value="<?php echo $u->usr_id;?>" <?php if ($u->usr_id == $job->job_mooring_master) { echo ' selected';} ?> ><?php echo $u->usr_firstname.' '.$u->usr_lastname;?></option>
                              <?php endforeach; ?>
                            </select></td>
                          </tr>
                          <tr>
                            <td>POAC</td>
                            <td><select class="form-control select2-show-search" name="job_poac1" data-placeholder="Choose one (with searchbox)" <?php echo $disabled;?>>
                              <option value="">Choose One</option>
                              <?php foreach ($users as $u): ?>
                                <option value="<?php echo $u->usr_id;?>" <?php if ($u->usr_id == $job->job_poac1) { echo ' selected';} ?> ><?php echo $u->usr_firstname.' '.$u->usr_lastname;?></option>
                              <?php endforeach; ?>
                            </select></td>
                          </tr>
                          <tr>
                            <td>Remarks</td>
                            <td><textarea rows="1" class="form-control" placeholder="Note" name="job_remark" <?php echo $disabled;?>><?php echo $job->job_remark;?></textarea></td>
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
                        <label class="form-control-label">Completion Date : <span class="tx-success">*</span></label>
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
                          <input id="date-02" name="job_complete_date" type="text" class="form-control" value="<?php echo $complete_date;?>" placeholder="MM/DD/YYYY" <?php echo $disabled;?>>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group mg-b-10-force">
                        <label class="form-control-label">Completion Time : <span class="tx-success">*</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                              <i class="far fa-clock tx-16 lh-0 op-6"></i>
                            </div>
                          </div>
                          <?php
                          if ($job->job_complete_time != '') {
                            $job_complete_time_explode = explode(' ', $job->job_complete_time);
                            $job_complete_time = $job_complete_time_explode[0];
                            $job_complete_time_ampm = $job_complete_time_explode[1];
                          } else {
                            $job_complete_time = "";
                            $job_complete_time_ampm = "am";
                          }

                          ?>
                          <input id="time-02"  name="job_complete_time"  type="text" class="form-control" placeholder="__:__" value="<?php echo $job_complete_time;?>" <?php echo $disabled;?>>
                          <div class="mg-l-10">
                          <select id="job_complete_time_ampm" name="job_complete_time_ampm" class="form-control select2" style="width: 100px" required <?php echo $disabled;?>>
                            <option value="am" <?php if($job_complete_time_ampm=="am"){echo ' selected';}?>>AM</option>
                            <option value="pm" <?php if($job_complete_time_ampm=="pm"){echo ' selected';}?>>PM</option>
                          </select>
                          </div>
                        </div>
                      </div>
                    </div><!-- col-8 -->
                  </div><!-- row -->

                  <div class="row mg-b-10">
                    <div class="col-lg-6">
                      <div class="form-group mg-b-10-force">
                        <label class="form-control-label">Total Exposure Hours :  <span class="tx-success">*</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="far fa-clock tx-16 lh-0 op-6"></i>
                              </div>
                            </div>
                            <span id="job_hour_disabled">
                              <input type="text" id="job_hour1" class="form-control" value="<?php echo $job->job_hour;?>" readonly>
                            </span>
                            <input type="hidden" id="job_hour2" name="job_hour" value="<?php echo $job->job_hour;?>" required>
                          </div><!-- input-group -->
                      </div>
                    </div><!-- col-6 -->
                  </div><!-- row -->

                  <div class="row mg-b-10">
                    <div class="col-lg-6">
                      <div class="form-group mg-b-10-force">
                        <div class="d-flex justify-content-between align-items-center">
                          <label class="form-control-label">Overtime : <span class="tx-success">*</label>
                          <!-- <label class="tx-gray-400 form-control-label">hh : mm</label> -->
                        </div>
                        <div class="input-group" id="divSelectExceedingHour">
                          <select name="job_exceeding_select" id="job_exceeding_select" class="form-control select2" <?php echo $disabled;?>>
                            <option>None</option>
                            <option value="24" <?php if($job->job_exceeding24!="0"){echo ' selected';}?>>Exceeding Hours > 24</option>
                            <option value="48" <?php if($job->job_exceeding48!="0"){echo ' selected';}?>>Exceeding Hours > 48</option>
                          </select>
                          <!-- <div class="input-group-prepend">
                            <div class="input-group-text">
                              <label class="rdiobox wd-16 mg-b-0">
                                <input name="rdio" type="radio" disabled><span></span>
                              </label>
                            </div>
                          </div>
                          <input id="time-03" type="text" class="form-control" placeholder="00:00" name="job_exceeding24"  value="<?php #echo $job->job_exceeding24;?>" <?php #echo $disabled;?>> -->
                        </div>
                      </div>


                    </div>
                    <div class="col-lg-6">
                      <div class="form-group mg-b-10-force">
                        <div class="d-flex justify-content-between align-items-center">
                          <label class="form-control-label">Exceeding Hours : <span class="tx-success">*</label>
                          <label class="tx-gray-400 form-control-label">hh : mm</label>
                        </div>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                              <i class="far fa-clock tx-16 lh-0 op-6"></i>
                            </div>
                          </div>
                          <?php
                          $job_exceeding_number = 0;
                          if ($job->job_exceeding24 != "0") {
                            $job_exceeding_number = $job->job_exceeding24;
                          } else if ($job->job_exceeding48 != 0) {
                            $job_exceeding_number = $job->job_exceeding48;
                          }
                          ?>
                          <input type="text" class="form-control job_exceeding_number" value="<?php echo $job_exceeding_number;?>" disabled>
                          <input type="hidden" class="form-control job_exceeding_number" name="job_exceeding_number" value="<?php echo $job_exceeding_number;?>" <?php echo $disabled;?>>
                        </div><!-- input-group -->
                      </div>
                    </div><!-- col-6 -->
                  </div><!-- row -->
                  <div class="row mg-b-10">
                    <div class="col-lg-12">
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
                        <?php
                          if ($vou_code_berthing != '') {
                            $by = ' - '.$voucher_berthing->usr_firstname.' '.$voucher_berthing->usr_lastname;
                          } else {
                            $by = '';
                          }
                        ?>
                        <input class="form-control" type="text" name="job_berthing_disabled" placeholder="" value="<?php echo $vou_code_berthing.$by;?>" disabled>
                      </div>
                    </div><!-- col-6 -->
                    <div class="col-lg-12">
                      <div class="form-group mg-b-10-force">
                        <div class="d-flex justify-content-between align-items-center">
                          <label class="form-control-label">Unberthing : </label>
                          <div class="dropdown hidden-xs-down">
                            <?php
                            if(!empty($voucher_unberthing)) {
                              $vou_code_unberthing = $voucher_unberthing->vou_code;
                            } else {
                              $vou_code_unberthing = '';
                            }

                            if ($job->job_status != "In-coming" && $vou_code_unberthing == '') {
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
                        <input class="form-control" type="hidden" name="job_unberthing" value="<?php echo $vou_code_unberthing;?>">
                        <?php
                          if ($vou_code_unberthing != '') {
                            $by = ' - '.$voucher_unberthing->usr_firstname.' '.$voucher_unberthing->usr_lastname;
                          } else {
                            $by = '';
                          }
                        ?>
                        <input class="form-control" type="text" name="job_unberthing" value="<?php echo $vou_code_unberthing.$by;?>" disabled>
                      </div>
                    </div><!-- col-6 -->
                  </div><!-- row -->
                </div><!-- card -->

                <div class="modal-footer">
                    <a href="<?php echo env('BASE_URL');?>jobrecords-poac"  class="btn btn-secondary" >Back to Job Records</a>
                </div><!-- form-layout-footer -->

              </div><!-- col-6 -->
            </div><!-- row -->
          </div><!-- card-body -->
        </div><!-- card -->
      </div><!-- col-6 -->
    </div><!-- row -->
  </div><!-- br-pagebody -->

</div><!-- br-mainpanel -->

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
  // $('#time-01').timepicker({'scrollDefault': 'now'});
  $('#time-01').mask('99:99');
  $('#time-02').mask('99:99');
  // $('#time-02').timepicker({'scrollDefault': 'now'});

  // Input Masks
  $('#phoneMask').mask('(999) 999-9999');
  $('#time-03').mask('99:99');
  $('#time-04').mask('99:99');
  $('#time-05').mask('99:99');


</script>
@stop
