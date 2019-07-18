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
      <span class="breadcrumb-item active">Job Registration</span>
    </nav>
  </div><!-- br-pageheader -->
  <div class="br-pagetitle hidden-xs-down">
    <i class="icon typcn typcn-briefcase tx-24"></i>
    <div>
      <h4 class="pd-y-15">Operations</h4>
      <!-- <p class="mg-b-0">Register New Job</p> -->
    </div>
  </div><!-- d-flex -->

  <div class="br-pagebody pd-x-20 pd-sm-x-30 pd-b-30">
    <div class="row row-sm mg-t-20">
      <div class="col-lg mg-lg-t-0">
        <div class="card shadow-base bd-0">
          <div class="card-header-02 bg-transparent pd-x-25 pd-y-25 d-flex justify-content-between align-items-center">
            <div class="card-title mg-b-0">Job Registration</div>
          </div><!-- card-header -->


          <div class="card">
            <div class="card-header">
              <ul class="nav nav-tabs card-header-tabs pd-xs-b-15">
                <li class="nav-item">
                  <a class="nav-link active" href="#t01" data-toggle="tab"><i class="fa fa-caret-right tx-success mg-r-10"></i>Ship-To-Ship</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#t02" data-toggle="tab"><i class="fa fa-caret-right tx-success mg-r-10"></i>Pilotage</a>
                </li>
              </ul>
            </div><!-- card-header -->

            <div class="tab-content">
              <div class="tab-pane active" id="t01">
                <form method="post" action="<?php echo env('BASE_URL');?>doAddNewJob" data-parsley-validate data-parsley-errors-messages-disabled id="selectForm-sts">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="form-layout form-layout-1">
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="row mg-b-10">
                          <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label">Job Code : <span class="tx-success">*</span></label>
                              <input class="form-control" type="text" value="" name="job_code" id="job_code" placeholder="Enter Job Code" required>
                            </div>
                          </div><!-- col-6 -->
                          <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label">Client : <span class="tx-success">*</span></label>
                              <div id="slWrapper01" class="parsley-select">
                              <select class="form-control parsley-error select2-show-search" style="width: 100%" data-parsley-class-handler="#slWrapper01" data-parsley-errors-container="#slErrorContainer" data-placeholder="Choose one" id="job_client" name="job_client" required>
                                <option value="">Choose One</option>
                                <?php
                                  foreach($client as $c):
                                    echo '<option value="'.$c->client_id.'">'.$c->client_name.'</option>';
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
                              <div class="d-flex justify-content-between align-items-center">
                                <label class="form-control-label">STS Operator : <span class="tx-success">*</span></label>
                                <!-- <div class="dropdown hidden-xs-down">
                                  <a href="#" data-toggle="dropdown" class="tx-success hover-info"><i class="icon ion-plus tx-20"></i></a>
                                  <div class="dropdown-menu dropdown-menu-right pd-10">
                                    <nav class="nav nav-style-2 flex-column">
                                      <a href="" class="nav-link" data-toggle="modal" data-target="#addoperator-1">Add STS Operator</a>
                                    </nav>
                                  </div>
                                </div> -->
                              </div>
                              <div id="slWrapper02" class="parsley-select">
                              <select name="job_operator" class="form-control parsley-error select2-show-search" style="width: 100%" data-parsley-class-handler="#slWrapper02" data-parsley-errors-container="#slErrorContainer" data-placeholder="Choose One" required>
                                <option value="">Choose One</option>
                                <?php
                                  foreach($stsOperator as $o):
                                    echo '<option value="'.$o->sts_id.'">'.$o->sts_name.'</option>';
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
                                <!-- <div class="dropdown hidden-xs-down">
                                  <a href="#" data-toggle="dropdown" class="tx-success hover-info"><i class="icon ion-plus tx-20"></i></a>
                                  <div class="dropdown-menu dropdown-menu-right pd-10">
                                    <nav class="nav nav-style-2 flex-column">
                                      <a href="" class="nav-link" data-toggle="modal" data-target="#addprovider-1">Add Service Provider</a>
                                    </nav>
                                  </div>
                                </div> -->
                              </div>
                              <div id="slWrapper03" class="parsley-select">
                              <select name="job_provider" class="form-control select2-show-search" style="width: 100%" data-parsley-class-handler="#slWrapper03" data-parsley-errors-container="#slErrorContainer"data-placeholder="Choose One" required>
                                <option value="">Choose One</option>
                                <?php
                                  foreach($stsProvider as $p):
                                    echo '<option value="'.$p->sts_id.'">'.$p->sts_name.'</option>';
                                  endforeach;
                                ?>
                              </select>
                              </div>
                            </div>
                          </div><!-- col-6 -->
                        </div><!-- row -->
                        <div class="row mg-b-10">
                          <div class="col-lg-12">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label">Service Options : <span class="tx-success">*</span></label>

                              <!-- <div id="displayRateCard"> -->

                              <select name="job_sts" class="form-control select2" style="width: 100%" data-placeholder="Choose STS Charges" id="displayRateCard" required disabled>
                              <!-- <input name="job_sts" class="form-control" style="width: 100%" placeholder="- Please select Client first -" disabled> -->
                                <!-- <option label="Choose STS"></option> -->
                                <?php
                                  // foreach ($cards as $c) :
                                  //   echo '<option value="'.$c->card_id.'">'.$c->card_type.' - '.$c->card_name.'</option>';
                                  // endforeach;
                                ?>
                              </select>

                              <!-- </div> -->

                            </div>
                          </div><!-- col-12 -->
                        </div><!-- row -->
                        <div class="row mg-b-10">
                          <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                              <div class="d-flex justify-content-between align-items-center">
                                <label class="form-control-label">Mother Ship : <span class="tx-success">*</span></label>
                                <!-- <div class="dropdown hidden-xs-down">
                                  <a href="#" data-toggle="dropdown" class="tx-success hover-info"><i class="icon ion-plus tx-20"></i></a>
                                  <div class="dropdown-menu dropdown-menu-right pd-10">
                                    <nav class="nav nav-style-2 flex-column">
                                      <a href="" class="nav-link" data-toggle="modal" data-target="#addship-1">Add Mother Ship</a>
                                    </nav>
                                  </div>
                                </div> -->
                              </div>
                              <div id="slWrapper04" class="parsley-select">
                              <select name="job_mothership" class="form-control select2-show-search" style="width: 100%" data-parsley-class-handler="#slWrapper04" data-parsley-errors-container="#slErrorContainer"data-placeholder="Choose One" required>
                                <option value="">Choose One</option>
                                <?php
                                  foreach($mothership as $m):
                                    echo '<option value="'.$m->ship_id.'">'.$m->ship_name.'</option>';
                                  endforeach;
                                ?>
                              </select>
                              </div>
                            </div>
                          </div><!-- col-6 -->
                          <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                              <div class="d-flex justify-content-between align-items-center">
                                <label class="form-control-label">Maneuvering Ship : <span class="tx-success">*</span></label>
                                <!-- <div class="dropdown hidden-xs-down">
                                  <a href="#" data-toggle="dropdown" class="tx-success hover-info"><i class="icon ion-plus tx-20"></i></a>
                                  <div class="dropdown-menu dropdown-menu-right pd-10">
                                    <nav class="nav nav-style-2 flex-column">
                                      <a href="" class="nav-link" data-toggle="modal" data-target="#addship-2">Add Maneuvering Ship</a>
                                    </nav>
                                  </div>
                                </div> -->
                              </div>
                              <div id="slWrapper05" class="parsley-select">
                              <select name="job_maneuveringship" class="form-control select2-show-search" style="width: 100%" data-parsley-class-handler="#slWrapper05" data-parsley-errors-container="#slErrorContainer" data-placeholder="Choose One" required>
                                <option value="">Choose One</option>
                                <?php
                                  foreach($moneuvering as $m):
                                    echo '<option value="'.$m->ship_id.'">'.$m->ship_name.'</option>';
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
                              <label class="form-control-label">Commence Date : <span class="tx-success">*</span></label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <div class="input-group-text">
                                    <i class="icon ion-calendar tx-16 lh-0 op-6"></i>
                                  </div>
                                </div>
                                <input id="date-01" name="job_commence_date" type="text" class="form-control" placeholder="MM/DD/YYYY" required>
                              </div>
                            </div>
                          </div><!-- col-6 -->
                          <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label">Commence Time : </label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <div class="input-group-text">
                                    <i class="far fa-clock tx-16 lh-0 op-6"></i>
                                  </div>
                                </div>
                                <input id="time-01" name="job_commence_time" type="text" class="form-control" placeholder="00:00" >
                                <div class="mg-l-10">
                                <select name="job_commence_time_ampm" class="form-control select2" style="width: 100px" required>
                                  <option value="am">AM</option>
                                  <option value="pm">PM</option>
                                </select>
                                </div>
                              </div>
                            </div>
                          </div><!-- col-8 -->
                        </div><!-- row -->
                      </div><!-- col-6 -->
                      <div class="col-lg-6">

                        <div class="row mg-b-10">
                          <div class="col-lg-12">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label">Base Location : <span class="tx-success">*</span></label>
                              <div id="slWrapper11" class="parsley-select">
                                <select name="job_location" class="form-control select2-show-search" style="width: 100%" data-parsley-class-handler="#slWrapper11" data-parsley-errors-container="#slErrorContainer" data-placeholder="Choose One" required>
                                  <option value="">Choose One</option>
                                  <?php
                                    foreach($locations as $l):
                                      echo '<option value="'.$l->loc_id.'">'.$l->loc_name.'</option>';
                                    endforeach;
                                  ?>
                                </select>
                              </div>
                            </div>
                          </div><!-- col-12 -->
                        </div><!-- row -->

                        <div class="row mg-b-10">

                          <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label">Advisor / Pilot / Mooring Master : </label>
                              <div id="slWrapper06" class="parsley-select">
                              <select name="job_mooring_master" class="form-control select2-show-search" style="width: 100%" data-parsley-class-handler="#slWrapper06" data-parsley-errors-container="#slErrorContainer">
                                <option value="">Choose One</option>
                                <?php
                                  foreach($users as $u):
                                    echo '<option value="'.$u->usr_id.'">'.$u->usr_firstname.' '.$u->usr_lastname.'</option>';
                                  endforeach;
                                ?>
                              </select>
                              </div>
                            </div>
                          </div><!-- col-6 -->

                          <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label">POAC : </label>
                              <div id="slWrapper10" class="parsley-select">
                              <select name="job_poac1" class="form-control select2-show-search" style="width: 100%" data-parsley-class-handler="#slWrapper10" data-parsley-errors-container="#slErrorContainer">
                                <option value="">Choose One</option>
                                <?php
                                  foreach($users as $u):
                                    echo '<option value="'.$u->usr_id.'">'.$u->usr_firstname.' '.$u->usr_lastname.'</option>';
                                  endforeach;
                                ?>
                              </select>
                              </div>
                            </div>
                          </div><!-- col-6 -->
                          <!-- <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label">POAC 02 : </label>
                              <select name="job_poac2" class="form-control select2-show-search" style="width: 100%" data-placeholder="Choose One">

                                <?php
                                  #foreach($users as $u):
                                    #echo '<option value="'.$u->usr_id.'">'.$u->usr_firstname.' '.$u->usr_lastname.'</option>';
                                  #endforeach;
                                ?>
                              </select>
                            </div>
                          </div> -->

                        </div><!-- row -->
                        <div class="row mg-b-10">
                          <div class="col-lg-12">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label">Remarks : </label>
                              <textarea name="job_remark" rows="2" class="form-control" placeholder="Note"></textarea>
                            </div>
                          </div><!-- col-12 -->
                        </div><!-- row -->
                      </div><!-- col-6 -->
                    </div><!-- row -->
                  </div><!-- form-layout -->
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-info">Submit Job</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                  </div><!-- form-layout-footer -->
                </form>
              </div><!-- tab-pane -->
              <div class="tab-pane" id="t02">
                <form method="post" action="<?php echo env('BASE_URL');?>doAddNewJobPilotage" data-parsley-validate data-parsley-errors-messages-disabled id="selectForm-pilotage">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">

                  <div class="form-layout form-layout-1">
                    <div class="row">
                      <div class="col-lg-6">

                        <div class="row mg-b-10">

                          <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label">Job Code : <span class="tx-success">*</span></label>
                              <input class="form-control" type="text" value="" name="pil_code" id="pil_code" placeholder="Enter Job Code" required>
                            </div>
                          </div>

                          <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                              <div class="d-flex justify-content-between align-items-center">
                                <label class="form-control-label">Piloting Ship : <span class="tx-success">*</span></label>
                              </div>
                              <div id="slWrapper07" class="parsley-select">
                              <select name="pil_piloting_ship" class="form-control select2-show-search" style="width: 100%" data-parsley-class-handler="#slWrapper07" data-parsley-errors-container="#slErrorContainer" data-placeholder="Choose One" required>
                                <option value="">Choose One</option>
                                <?php
                                  foreach($moneuvering as $m):
                                    echo '<option value="'.$m->ship_id.'">'.$m->ship_name.'</option>';
                                  endforeach;
                                ?>
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
                              <div id="slWrapper08" class="parsley-select">
                              <select name="pil_operator" class="form-control parsley-error select2-show-search" style="width: 100%" data-parsley-class-handler="#slWrapper08" data-parsley-errors-container="#slErrorContainer" data-placeholder="Choose One" required>
                                <option>Choose One</option>
                                <?php
                                  foreach($stsOperator as $o):
                                    echo '<option value="'.$o->sts_id.'">'.$o->sts_name.'</option>';
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
                              <div id="slWrapper09" class="parsley-select">
                              <select name="pil_provider" class="form-control select2-show-search" style="width: 100%" data-parsley-class-handler="#slWrapper09" data-parsley-errors-container="#slErrorContainer"data-placeholder="Choose One" required>
                                <option>Choose One</option>
                                <?php
                                  foreach($stsProvider as $p):
                                    echo '<option value="'.$p->sts_id.'">'.$p->sts_name.'</option>';
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
                              <label class="form-control-label">On-board Date : <span class="tx-success">*</span></label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <div class="input-group-text">
                                    <i class="icon ion-calendar tx-16 lh-0 op-6"></i>
                                  </div>
                                </div>
                                <input id="date-pil_onboard_date" name="pil_onboard_date" type="text" class="form-control" placeholder="MM/DD/YYYY" required>
                              </div>
                            </div>
                          </div><!-- col-6 -->
                          <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label">On-board Time : </label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <div class="input-group-text">
                                    <i class="far fa-clock tx-16 lh-0 op-6"></i>
                                  </div>
                                </div>
                                <input id="time-pil_onboard_time" name="pil_onboard_time" type="text" class="form-control" placeholder="00:00">
                                <div class="mg-l-10">
                                <select name="pil_onboard_time_ampm" class="form-control select2" style="width: 100px" required>
                                  <option value="am">AM</option>
                                  <option value="pm">PM</option>
                                </select>
                                </div>
                              </div>
                            </div>
                          </div><!-- col-8 -->
                        </div><!-- row -->

                        <div class="row mg-b-10">
                          <div class="col-lg-12">
                              <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Job Event : <span class="tx-success">*</span></label>
                                <div id="slWrapper13" class="parsley-select">
                                <select name="pil_event" id="select-pil_event" class="form-control select2" style="width: 100%" data-parsley-class-handler="#slWrapper13" data-parsley-errors-container="#slErrorContainer" data-placeholder="Choose One" required>
                                  <option>Choose One</option>
                                  <option value="Inward Pilotage">Inward Pilotage</option>
                                  <option value="Outward Pilotage">Outward Pilotage</option>
                                  <option value="Shifting Anchorage">Shifting Anchorage</option>
                                </select>
                                </div>
                              </div>
                          </div>

                        </div><!-- row -->

                        <div class="row mg-b-10">
                          <div class="col-lg-12">
                              <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Advisor / Pilot / Mooring Master : </label>
                                <div id="slWrapper14" class="parsley-select">
                                <select name="pil_poac" class="form-control select2-show-search" style="width: 100%" data-parsley-class-handler="#slWrapper14" data-parsley-errors-container="#slErrorContainer"  data-placeholder="Choose One">
                                  <option value="">Choose One</option>
                                  <?php
                                    foreach($users as $u):
                                      echo '<option value="'.$u->usr_id.'">'.$u->usr_firstname.' '.$u->usr_lastname.'</option>';
                                    endforeach;
                                  ?>
                                </select>
                                </div>
                              </div>
                          </div>
                        </div><!-- row -->

                      </div>

                      <div class="col-lg-6">
                          <div class="row mg-b-10">
                          <div class="col-lg-12">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label">Base Location : <span class="tx-success">*</span> </label>
                              <div id="slWrapper12" class="parsley-select">
                              <select name="pil_location" class="form-control select2" style="width: 100%" data-parsley-class-handler="#slWrapper12" data-parsley-errors-container="#slErrorContainer" data-placeholder="Choose One" required>
                                <option>Choose One</option>
                                <?php
                                  foreach($locations as $l):
                                    echo '<option value="'.$l->loc_id.'">'.$l->loc_name.'</option>';
                                  endforeach;
                                ?>
                              </select>
                              </div>
                            </div>
                          </div><!-- col-12 -->
                        </div><!-- row -->
                        <div class="row mg-b-10">
                          <div class="col-lg-12">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label">Remarks : </label>
                              <textarea name="pil_remark" rows="2" class="form-control" placeholder="Note"></textarea>
                            </div>
                          </div><!-- col-12 -->
                        </div><!-- row -->
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" id="btnSubmitJob" class="btn btn-info">Submit Job</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                  </div><!-- form-layout-footer -->
                </form>
              </div><!-- tab-pane -->
            </div><!-- tab-content -->
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
    $(document).ready(function () {

    <?php if(session()->has('success')){?>
      toastr.success('<?php echo session()->get('success'); ?>')
    <?php } ?>

    <?php if(session()->has('error')){?>
      toastr.error('<?php echo session()->get('error'); ?>')
    <?php } ?>

    $(document).on("change", "#job_client", function () {
         var job_client = $('#job_client').val();
         // alert(job_client);
         $('#displayRateCard').load('<?php echo env('BASE_URL');?>get-rate-card-select/'+job_client);
         $('#displayRateCard').prop("disabled", false);
    });

    $(document).on("change", "#job_code", function () {
         var job_code = $('#job_code').val();

         $.ajax({
             type: "GET",
             url: "<?php echo env('BASE_URL');?>do-check-code/stsjob?code=" + job_code,
             beforeSend: function (xhr) {
                 var token = $('meta[name="csrf_token"]').attr('content');
                 if (token) {
                     return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                 }
             },
             success: function (msg) {
               if (msg == "available") {
                 toastr.success('Job Code '+job_code+' is available')
               } else if (msg == "notavailable") {
                 toastr.error('Job Code '+job_code+' already existed')
                 $('#job_code').val('');
               }
             }
         });

    });

    $(document).on("change", "#pil_code", function () {
         var pil_code = $('#pil_code').val();

         $.ajax({
             type: "GET",
             url: "<?php echo env('BASE_URL');?>do-check-code/pilotagejob?code=" + pil_code,
             beforeSend: function (xhr) {
                 var token = $('meta[name="csrf_token"]').attr('content');
                 if (token) {
                     return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                 }
             },
             success: function (msg) {
               if (msg == "available") {
                 toastr.success('Job Code '+pil_code+' is available')
               } else if (msg == "notavailable") {
                 toastr.error('Job Code '+pil_code+' already existed')
                 $('#pil_code').val('');
               }
             }
         });

    });

    $('#time-01').blur(function(){

        var validTime = $(this).val().match(/^(0?[1-9]|1[012])(:[0-5]\d)$/);
        if (!validTime) {
            $(this).val('').focus().css('background', '#fdd');
            toastr.error('Commence Time must in 12 hour format')
        } else {
            $(this).css('background', 'transparent');
        }
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
  $('#date-pil_onboard_date').datepicker({
    showOtherMonths: true,
    selectOtherMonths: true,
    numberOfMonths: 2
  });

  // Time Picker
  // $('#time-01').timepicker({'scrollDefault': 'now'});
  $('#time-01').mask('99:99');
  $('#time-02').timepicker({'scrollDefault': 'now'});

  // Input Masks
  $('#phoneMask').mask('(999) 999-9999');
  $('#time-03').mask('99:99');
  $('#time-04').mask('99:99');
  $('#time-05').mask('99:99');
  $('#time-pil_onboard_time').mask('99:99');


</script>
@stop
