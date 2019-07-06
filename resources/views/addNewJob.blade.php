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
      <span class="breadcrumb-item active">Job Record Registration</span>
    </nav>
  </div><!-- br-pageheader -->
  <div class="br-pagetitle">
    <i class="icon typcn typcn-briefcase tx-24"></i>
    <div>
      <h4 class="pd-y-15">Operations</h4>
      <!-- <p class="mg-b-0">Register New Job</p> -->
    </div>
  </div><!-- d-flex -->

  <div class="br-pagebody pd-x-20 pd-sm-x-30 pd-b-40">
    <div class="row row-sm mg-t-20 pd-b-40">
      <div class="col-lg mg-t-20 mg-lg-t-0">
        <div class="card shadow-base bd-0">
          <div class="card-header-02 bg-transparent pd-x-25 pd-y-25 d-flex justify-content-between align-items-center">
            <div class="card-title mg-b-0">Job Record Registration</div>
          </div><!-- card-header -->


          <div class="card">
            <div class="card-header">
              <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                  <a class="nav-link active" href="#t01" data-toggle="tab">Ship-To-Ship</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#t02" data-toggle="tab">Pilotage</a>
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
                              <label class="form-control-label">Job Code : <span class="tx-danger">*</span></label>
                              <input class="form-control" type="text" value="" name="job_code" placeholder="Enter Job Code" required>
                            </div>
                          </div><!-- col-6 -->
                          <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label">Client : <span class="tx-danger">*</span></label>
                              <select class="form-control select2" style="width: 100%" data-placeholder="Choose one" name="job_client" required>
                                <option value="" label="Choose one"></option>
                                <?php
                                  foreach($client as $c):
                                    echo '<option value="'.$c->client_id.'">'.$c->client_name.'</option>';
                                  endforeach;
                                ?>
                              </select>
                            </div>
                          </div><!-- col-6 -->
                        </div><!-- row -->
                        <div class="row mg-b-10">
                          <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                              <div class="d-flex justify-content-between align-items-center">
                                <label class="form-control-label">STS Operator : <span class="tx-danger">*</span></label>
                                <!-- <div class="dropdown hidden-xs-down">
                                  <a href="#" data-toggle="dropdown" class="tx-success hover-info"><i class="icon ion-plus tx-20"></i></a>
                                  <div class="dropdown-menu dropdown-menu-right pd-10">
                                    <nav class="nav nav-style-2 flex-column">
                                      <a href="" class="nav-link" data-toggle="modal" data-target="#addoperator-1">Add STS Operator</a>
                                    </nav>
                                  </div>
                                </div> -->
                              </div>
                              <select name="job_operator" class="form-control parsley-error select2-show-search" style="width: 100%" data-placeholder="Choose one (with searchbox)" required>
                                <option label="Choose STS Operator"></option>
                                <?php
                                  foreach($stsOperator as $o):
                                    echo '<option value="'.$o->sts_id.'">'.$o->sts_name.'</option>';
                                  endforeach;
                                ?>
                              </select>
                            </div>
                          </div><!-- col-6 -->
                          <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                              <div class="d-flex justify-content-between align-items-center">
                                <label class="form-control-label">STS Service Provider : <span class="tx-danger">*</span></label>
                                <!-- <div class="dropdown hidden-xs-down">
                                  <a href="#" data-toggle="dropdown" class="tx-success hover-info"><i class="icon ion-plus tx-20"></i></a>
                                  <div class="dropdown-menu dropdown-menu-right pd-10">
                                    <nav class="nav nav-style-2 flex-column">
                                      <a href="" class="nav-link" data-toggle="modal" data-target="#addprovider-1">Add Service Provider</a>
                                    </nav>
                                  </div>
                                </div> -->
                              </div>
                              <select name="job_provider" class="form-control select2-show-search" style="width: 100%" data-placeholder="Choose one (with searchbox)" required>
                                <option label="Choose Service Provider"></option>
                                <?php
                                  foreach($stsProvider as $p):
                                    echo '<option value="'.$p->sts_id.'">'.$p->sts_name.'</option>';
                                  endforeach;
                                ?>
                              </select>
                            </div>
                          </div><!-- col-6 -->
                        </div><!-- row -->
                        <div class="row mg-b-10">
                          <div class="col-lg-12">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label">STS : <span class="tx-danger">*</span></label>
                              <select name="job_sts" class="form-control select2" style="width: 100%" data-placeholder="Choose STS" required>
                                <option label="Choose STS"></option>
                                <?php
                                  foreach ($cards as $c) :
                                    echo '<option value="'.$c->card_id.'">'.$c->card_type.' - '.$c->card_name.'</option>';
                                  endforeach;
                                ?>
                              </select>
                            </div>
                          </div><!-- col-12 -->
                        </div><!-- row -->
                        <div class="row mg-b-10">
                          <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                              <div class="d-flex justify-content-between align-items-center">
                                <label class="form-control-label">Mother Ship : <span class="tx-danger">*</span></label>
                                <!-- <div class="dropdown hidden-xs-down">
                                  <a href="#" data-toggle="dropdown" class="tx-success hover-info"><i class="icon ion-plus tx-20"></i></a>
                                  <div class="dropdown-menu dropdown-menu-right pd-10">
                                    <nav class="nav nav-style-2 flex-column">
                                      <a href="" class="nav-link" data-toggle="modal" data-target="#addship-1">Add Mother Ship</a>
                                    </nav>
                                  </div>
                                </div> -->
                              </div>
                              <select name="job_mothership" class="form-control select2-show-search" style="width: 100%" data-placeholder="Choose one (with searchbox)" required>
                                <option label="Choose Mother Ship"></option>
                                <?php
                                  foreach($mothership as $m):
                                    echo '<option value="'.$m->ship_id.'">'.$m->ship_name.'</option>';
                                  endforeach;
                                ?>
                              </select>
                            </div>
                          </div><!-- col-6 -->
                          <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                              <div class="d-flex justify-content-between align-items-center">
                                <label class="form-control-label">Maneuvering Ship : <span class="tx-danger">*</span></label>
                                <!-- <div class="dropdown hidden-xs-down">
                                  <a href="#" data-toggle="dropdown" class="tx-success hover-info"><i class="icon ion-plus tx-20"></i></a>
                                  <div class="dropdown-menu dropdown-menu-right pd-10">
                                    <nav class="nav nav-style-2 flex-column">
                                      <a href="" class="nav-link" data-toggle="modal" data-target="#addship-2">Add Maneuvering Ship</a>
                                    </nav>
                                  </div>
                                </div> -->
                              </div>
                              <select name="job_maneuveringship" class="form-control select2-show-search" style="width: 100%" data-placeholder="Choose one (with searchbox)" required>
                                <option label="Choose Mother Ship"></option>
                                <?php
                                  foreach($moneuvering as $m):
                                    echo '<option value="'.$m->ship_id.'">'.$m->ship_name.'</option>';
                                  endforeach;
                                ?>
                              </select>
                            </div>
                          </div><!-- col-6 -->
                        </div><!-- row -->
                        <div class="row mg-b-10">
                          <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label">Commence Date : <span class="tx-danger">*</span></label>
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
                              <label class="form-control-label">Commence Time :</label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <div class="input-group-text">
                                    <i class="far fa-clock tx-16 lh-0 op-6"></i>
                                  </div>
                                </div>
                                <input id="time-01" name="job_commence_time" type="text" class="form-control" placeholder="00:00" required>
                                <select name="job_commence_time_ampm" class="form-control select2" required>
                                  <option value="am">am</option>
                                  <option value="pm">pm</option>
                                </select>
                              </div>
                            </div>
                          </div><!-- col-8 -->
                        </div><!-- row -->
                        <!-- <div class="row mg-b-10">
                          <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label">Completion Date : <span class="tx-danger">*</span></label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <div class="input-group-text">
                                    <i class="icon ion-calendar tx-16 lh-0 op-6"></i>
                                  </div>
                                </div>
                                <input id="date-02" type="text" class="form-control" placeholder="MM/DD/YYYY" disabled>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label">Completion Time : <span class="tx-danger">*</label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <div class="input-group-text">
                                    <i class="far fa-clock tx-16 lh-0 op-6"></i>
                                  </div>
                                </div>
                                <input id="time-02" type="text" class="form-control" placeholder="Set time" disabled>
                              </div>
                            </div>
                          </div>
                        </div> -->
                        <!-- <div class="row mg-b-10">
                          <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label">Total Exposure Hours <span class="tx-danger">*</label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text">
                                      <i class="far fa-clock tx-16 lh-0 op-6"></i>
                                    </div>
                                  </div>
                                  <input id="time-05" type="text" class="form-control" placeholder="00:00" disabled>
                                </div>
                            </div>
                          </div>
                        </div> -->
                      </div><!-- col-6 -->
                      <div class="col-lg-6">
                        <!-- <div class="row mg-b-10">
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
                                <input id="time-03" type="text" class="form-control" placeholder="00:00" disabled>
                              </div>
                            </div>
                          </div>
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
                                <input id="time-04" type="text" class="form-control" placeholder="00:00" disabled>
                              </div>
                            </div>
                          </div>
                        </div> -->
                        <!-- <div class="row mg-b-10">
                          <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                              <div class="d-flex justify-content-between align-items-center">
                                <label class="form-control-label">Berthing : </label>

                              </div>
                              <input class="form-control" type="text" value="-" placeholder=""disabled>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                              <div class="d-flex justify-content-between align-items-center">
                                <label class="form-control-label">Unberthing : </label>

                              </div>
                              <input class="form-control" type="text" value="-" placeholder="" disabled>
                            </div>
                          </div>
                        </div> -->
                        <div class="row mg-b-10">
                          <div class="col-lg-12">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label">Base Location : </label>
                              <select name="job_location" class="form-control select2-show-search" style="width: 100%" data-placeholder="Choose one (with searchbox)" required>
                                <option label="Choose Base Location"></option>
                                <?php
                                  foreach($locations as $l):
                                    echo '<option value="'.$l->loc_id.'">'.$l->loc_name.'</option>';
                                  endforeach;
                                ?>
                              </select>
                            </div>
                          </div><!-- col-12 -->
                        </div><!-- row -->
                        <div class="row mg-b-10">
                          <div class="col-lg-12">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label">Mooring Master : <span class="tx-danger">*</span></label>
                              <select name="job_mooring_master" class="form-control select2-show-search" style="width: 100%" data-placeholder="Choose one (with searchbox)" required>
                                <option label="Choose Mooring Master"></option>
                                <?php
                                  foreach($users as $u):
                                    echo '<option value="'.$u->usr_id.'">'.$u->usr_firstname.' '.$u->usr_lastname.'</option>';
                                  endforeach;
                                ?>
                              </select>
                            </div>
                          </div><!-- col-12 -->
                        </div><!-- row -->
                        <div class="row mg-b-10">
                          <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label">POAC 01 : <span class="tx-danger">*</span></label>
                              <select name="job_poac1" class="form-control select2-show-search" style="width: 100%" data-placeholder="Choose one (with searchbox)" required>
                                <option label="Choose Mooring Master"></option>
                                <?php
                                  foreach($users as $u):
                                    echo '<option value="'.$u->usr_id.'">'.$u->usr_firstname.' '.$u->usr_lastname.'</option>';
                                  endforeach;
                                ?>
                              </select>
                            </div>
                          </div><!-- col-6 -->
                          <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label">POAC 02 : <span class="tx-danger">*</span></label>
                              <select name="job_poac2" class="form-control select2-show-search" style="width: 100%" data-placeholder="Choose one (with searchbox)" required>
                                <option label="Choose Mooring Master"></option>
                                <?php
                                  foreach($users as $u):
                                    echo '<option value="'.$u->usr_id.'">'.$u->usr_firstname.' '.$u->usr_lastname.'</option>';
                                  endforeach;
                                ?>
                              </select>
                            </div>
                          </div><!-- col-6 -->
                        </div><!-- row -->
                        <div class="row mg-b-10">
                          <div class="col-lg-12">
                            <div class="form-group mg-b-10-force">
                              <label class="form-control-label">Remarks : </label>
                              <textarea name="job_remark" rows="1" class="form-control" placeholder="Note"></textarea>
                            </div>
                          </div><!-- col-12 -->
                        </div><!-- row -->
                      </div><!-- col-6 -->
                    </div><!-- row -->
                  </div><!-- form-layout -->
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-info">Submit Job</button>
                    <button type="reset" class="btn btn-secondary" data-dismiss="modal">Reset</button>
                  </div><!-- form-layout-footer -->
                </form>
              </div><!-- tab-pane -->
              <div class="tab-pane" id="t02">
                <form method="post" action="#" data-parsley-validate id="selectForm-pilotage">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-info">Submit Job</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
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

<div id="addoperator-1" class="modal fade">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content tx-size-sm">
      <div class="modal-header pd-x-20">
        <h6 class="tx-14 mg-b-0 tx-capitalize tx-inverse tx-medium">Add STS Operator</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="#" data-parsley-validate data-parsley-errors-messages-disabled>
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
                      <input id="phoneMask" type="text" class="form-control" placeholder="(999) 999-9999" required>
                    </div><!-- input-group -->
                  </div>
                </div><!-- col-12 -->
              </div><!-- row -->
            </div><!-- col-6 -->
          </div><!-- row -->
        </div><!-- modal-body -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-info">Add</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
      </form>
    </div>
  </div><!-- modal-dialog -->
</div><!-- modal -->

<div id="addprovider-1" class="modal fade">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content tx-size-sm">
      <div class="modal-header pd-x-20">
        <h6 class="tx-14 mg-b-0 tx-capitalize tx-inverse tx-medium">Add STS Service Provider</h6>
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
          <button type="submit" class="btn btn-info">Add</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
      </form>
    </div>
  </div><!-- modal-dialog -->
</div><!-- modal -->

<div id="addship-1" class="modal fade">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content tx-size-sm">
      <div class="modal-header pd-x-20">
        <h6 class="tx-14 mg-b-0 tx-capitalize tx-inverse tx-medium">Add Mother Ship</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="#" data-parsley-validate>
        <div class="modal-body pd-20">
          <div class="row mg-b-10">
            <div class="col-lg-12">
              <div class="form-group mg-b-10-force">
                <label class="form-control-label">Vessel Name : </label>
                <input class="form-control" type="text" value="" placeholder="" required>
              </div>
            </div><!-- col-12 -->
          </div><!-- row -->
          <div class="row mg-b-10">
            <div class="col-lg-12">
              <div class="form-group mg-b-10-force">
                <label class="form-control-label">Vessel Type : </label>
                <input class="form-control" type="text" value="" placeholder="" required>
              </div>
            </div><!-- col-12 -->
          </div><!-- row -->
          <div class="row mg-b-10">
            <div class="col-lg-12">
              <div class="form-group mg-b-10-force">
                <label class="form-control-label">Length Overall - LOA : </label>
                <div class="input-group">
                  <input type="number" class="form-control">
                  <div class="input-group-append">
                    <span class="input-group-text">m</span>
                  </div>
                </div><!-- input-group -->
              </div>
            </div><!-- col-12 -->
          </div><!-- row -->
          <div class="row mg-b-10">
            <div class="col-lg-12">
              <div class="form-group mg-b-10-force">
                <label class="form-control-label">Deadweight Tonnage - DWT : </label>
                <div class="input-group">
                  <input type="number" class="form-control">
                  <div class="input-group-append">
                    <span class="input-group-text">t</span>
                  </div>
                </div><!-- input-group -->
              </div>
            </div><!-- col-12 -->
          </div><!-- row -->
        </div><!-- modal-body -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-info">Add</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
      </form>
    </div>
  </div><!-- modal-dialog -->
</div><!-- modal -->

<div id="addship-2" class="modal fade">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content tx-size-sm">
      <div class="modal-header pd-x-20">
        <h6 class="tx-14 mg-b-0 tx-capitalize tx-inverse tx-medium">Add Maneuvering Ship</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="#" data-parsley-validate>
        <div class="modal-body pd-20">
          <div class="row mg-b-10">
            <div class="col-lg-12">
              <div class="form-group mg-b-10-force">
                <label class="form-control-label">Vessel Name : </label>
                <input class="form-control" type="text" value="" placeholder="" required>
              </div>
            </div><!-- col-12 -->
          </div><!-- row -->
          <div class="row mg-b-10">
            <div class="col-lg-12">
              <div class="form-group mg-b-10-force">
                <label class="form-control-label">Vessel Type : </label>
                <input class="form-control" type="text" value="" placeholder="" required>
              </div>
            </div><!-- col-12 -->
          </div><!-- row -->
          <div class="row mg-b-10">
            <div class="col-lg-12">
              <div class="form-group mg-b-10-force">
                <label class="form-control-label">Length Overall - LOA : </label>
                <div class="input-group">
                  <input type="number" class="form-control">
                  <div class="input-group-append">
                    <span class="input-group-text">m</span>
                  </div>
                </div><!-- input-group -->
              </div>
            </div><!-- col-12 -->
          </div><!-- row -->
          <div class="row mg-b-10">
            <div class="col-lg-12">
              <div class="form-group mg-b-10-force">
                <label class="form-control-label">Deadweight Tonnage - DWT : </label>
                <div class="input-group">
                  <input type="number" class="form-control">
                  <div class="input-group-append">
                    <span class="input-group-text">t</span>
                  </div>
                </div><!-- input-group -->
              </div>
            </div><!-- col-12 -->
          </div><!-- row -->
        </div><!-- modal-body -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-info">Add</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
     </form>
    </div>
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
  $('#time-02').timepicker({'scrollDefault': 'now'});

  // Input Masks
  $('#phoneMask').mask('(999) 999-9999');
  $('#time-03').mask('99:99');
  $('#time-04').mask('99:99');
  $('#time-05').mask('99:99');


</script>
@stop
