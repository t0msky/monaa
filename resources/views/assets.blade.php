@extends('layouts.master')

@section('content')
<div class="br-mainpanel">
  <div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
      <a class="breadcrumb-item" href="#">Data Assets</a>
      <a class="breadcrumb-item" href="job-record.html">Assets</a>
      <span class="breadcrumb-item active">Assets Registration</span>
    </nav>
  </div><!-- br-pageheader -->
  <div class="br-pagetitle hidden-xs-down">
    <i class="icon typcn typcn-briefcase tx-24"></i>
    <div>
      <h4 class="pd-y-15">Operations</h4>
      <!-- <p class="mg-b-0">Register New Job</p> -->
    </div>
  </div><!-- d-flex -->

  <div class="br-pagebody pd-x-20 pd-sm-x-30 pd-b-25">
    <div class="row row-sm mg-t-20">
      <div class="col-lg mg-lg-t-0">
        <div class="card shadow-base bd-0">
          <div class="card-header-02 bg-transparent pd-x-25 pd-y-25 d-flex justify-content-between align-items-center">
            <div class="card-title mg-b-0">Assets Registration</div>
          </div><!-- card-header -->

          <div class="card">
            <div class="card-header">
              <ul class="nav nav-tabs card-header-tabs pd-xs-b-15">
                <li class="nav-item">
                  <a class="nav-link active" href="#t01" data-toggle="tab"><i class="fa fa-caret-right tx-success mg-r-10"></i>Company</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#t02" data-toggle="tab"><i class="fa fa-caret-right tx-success mg-r-10"></i>Vessels</a>
                </li>
              </ul>
            </div><!-- card-header -->
            
            <div class="card-body color-gray-lighter">

            <div class="tab-content">
              <div class="tab-pane active" id="t01">
                <form method="post" action="#" data-parsley-validate data-parsley-errors-messages-disabled>
                  
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="row mg-b-40">
                          <div class="col-lg-12">
                            <div class="d-flex justify-content-between align-items-center pd-b-10">
                              <div class="mg-b-0">
                                <div class="card-title mg-b-0">STS Client</div>
                              </div><!-- form-group -->
                              <div class="btn-group" role="group" aria-label="Basic example">
                                <button id="buttonprint" type="button" class="btn btn-third" data-toggle="modal" data-target="#addclient-1"><i class="icon ion-plus tx-20"></i></button>
                              </div>
                            </div>
                            <div class="table-wrapper">
                              <table id="datatable1" class="table display responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                  <tr>
                                    <th class="wd-2p"></th>
                                    <th class="wd-20p">Company Name</th>
                                    <th class="wd-30p">Address</th>
                                    <th class="wd-10p">Phone No.</th>
                                    <th class="wd-20p">Contact Person</th>
                                    <th class="wd-5p tx-center">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                  $no = 1;
                                  foreach ($client as $c) :
                                  ?>
                                  <tr>
                                    <td></td>
                                    <td><a href="<?php echo env('BASE_URL');?>edit-company/client/<?php echo $c->client_id;?>"><?php echo $c->client_name;?></a></td>
                                    <td>
                                      <?php echo $c->client_add1;?>
                                      ,
                                      <?php echo $c->client_add2;?>
                                      ,
                                      <?php echo $c->client_zipcode;?>, <?php echo $c->client_state;?>, <?php echo $c->client_country;?>
                                    </td>
                                    <td><?php echo $c->client_phone;?></td>
                                    <td><?php echo $c->client_contact_person;?></td>
                                    <td class="dropdown hidden-xs-down tx-center">
                                      <a href="#" data-toggle="dropdown" class="tx-gray-500 hover-info"><i class="icon ion-more tx-16"></i></a>
                                      <div class="dropdown-menu dropdown-menu-right pd-10">
                                        <nav class="nav nav-style-2 flex-column">
                                          <a href="<?php echo env('BASE_URL');?>edit-company/client/<?php echo $c->client_id;?>" class="nav-link">Edit</a>
                                          <!-- <a href="" class="nav-link" data-toggle="modal" data-target="#deletealert">Delete</a> -->
                                        </nav>
                                      </div><!-- dropdown-menu -->
                                    </td>
                                  </tr>
                                  <?php
                                  $no = $no + 1;
                                  endforeach;
                                  ?>
                                </tbody>
                              </table>
                            </div><!-- table-wrapper -->
                          </div><!-- col-12 -->
                        </div><!-- row -->
                        <hr class="pd-b-5">
                        <div class="row mg-b-40">
                          <div class="col-lg-12">
                            <div class="d-flex justify-content-between align-items-center pd-b-10">
                              <div class="mg-b-0">
                                <div class="card-title mg-b-0">STS Service Provider</div>
                              </div><!-- form-group -->
                              <div class="btn-group" role="group" aria-label="Basic example">
                                <button id="buttonprint" type="button" class="btn btn-third" data-toggle="modal" data-target="#addprovider-1"><i class="icon ion-plus tx-20"></i></button>
                              </div>
                            </div>
                            <div class="table-wrapper">
                              <table id="datatable2" class="table display responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                  <tr>
                                    <th class="wd-2p"></th>
                                    <th class="wd-20p">Company Name</th>
                                    <th class="wd-30p">Address</th>
                                    <th class="wd-10p">Phone No.</th>
                                    <th class="wd-20p">Contact Person</th>
                                    <th class="wd-5p tx-center">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                  $no = 1;
                                  foreach ($provider as $p) :
                                  ?>
                                  <tr>
                                    <td></td>
                                    <td><a href="<?php echo env('BASE_URL');?>edit-company/operator/<?php echo $p->sts_id;?>"><?php echo $p->sts_name;?></a></td>
                                    <td>
                                      <?php echo $p->sts_address;?>
                                      ,
                                      <?php echo $p->sts_address2;?>
                                      ,
                                      <?php echo $p->sts_postcode;?>, <?php echo $p->sts_state;?>, <?php echo $p->sts_country;?>
                                    </td>
                                    <td><?php echo $p->sts_tel;?></td>
                                    <td><?php echo $p->sts_contact_person;?></td>
                                    <td class="dropdown hidden-xs-down tx-center">
                                      <a href="#" data-toggle="dropdown" class="tx-gray-500 hover-info"><i class="icon ion-more tx-16"></i></a>
                                      <div class="dropdown-menu dropdown-menu-right pd-10">
                                        <nav class="nav nav-style-2 flex-column">
                                          <a href="<?php echo env('BASE_URL');?>edit-company/operator/<?php echo $p->sts_id;?>" class="nav-link">Edit</a>
                                          <!-- <a href="" class="nav-link" data-toggle="modal" data-target="#deletealert">Delete</a> -->
                                        </nav>
                                      </div><!-- dropdown-menu -->
                                    </td>
                                  </tr>
                                  <?php
                                  $no = $no + 1;
                                  endforeach;
                                  ?>
                                </tbody>
                              </table>
                            </div><!-- table-wrapper -->
                          </div><!-- col-12 -->
                        </div><!-- row -->
                        <hr class="pd-b-5">
                        <div class="row mg-b-10">
                          <div class="col-lg-12">
                            <div class="d-flex justify-content-between align-items-center pd-b-10">
                              <div class="mg-b-0">
                                <div class="card-title mg-b-0">STS Operator</div>
                              </div><!-- form-group -->
                              <div class="btn-group" role="group" aria-label="Basic example">
                                <button id="buttonprint" type="button" class="btn btn-third" data-toggle="modal" data-target="#addoperator-1"><i class="icon ion-plus tx-20"></i></button>
                              </div>
                            </div>
                            <div class="table-wrapper">
                              <table id="datatable3" class="table display responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                  <tr>
                                    <th class="wd-2p"></th>
                                    <th class="wd-20p">Company Name</th>
                                    <th class="wd-30p">Address</th>
                                    <th class="wd-10p">Phone No.</th>
                                    <th class="wd-20p">Contact Person</th>
                                    <th class="wd-5p tx-center">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                  $no = 1;
                                  foreach ($operator as $p) :
                                  ?>
                                  <tr>
                                    <td></td>
                                    <td><a href="<?php echo env('BASE_URL');?>edit-company/operator/<?php echo $p->sts_id;?>"><?php echo $p->sts_name;?></a></td>
                                    <td>
                                      <?php echo $p->sts_address;?>
                                      ,
                                      <?php echo $p->sts_address2;?>
                                      ,
                                      <?php echo $p->sts_postcode;?>, <?php echo $p->sts_state;?>, <?php echo $p->sts_country;?>
                                    </td>
                                    <td><?php echo $p->sts_tel;?></td>
                                    <td><?php echo $p->sts_contact_person;?></td>
                                    <td class="dropdown hidden-xs-down tx-center">
                                      <a href="#" data-toggle="dropdown" class="tx-gray-500 hover-info"><i class="icon ion-more tx-16"></i></a>
                                      <div class="dropdown-menu dropdown-menu-right pd-10">
                                        <nav class="nav nav-style-2 flex-column">
                                          <a href="<?php echo env('BASE_URL');?>edit-company/operator/<?php echo $p->sts_id;?>" class="nav-link">Edit</a>
                                          <!-- <a href="" class="nav-link" data-toggle="modal" data-target="#deletealert">Delete</a> -->
                                        </nav>
                                      </div><!-- dropdown-menu -->
                                    </td>
                                  </tr>
                                  <?php
                                  $no = $no + 1;
                                  endforeach;
                                  ?>
                                </tbody>
                              </table>
                            </div><!-- table-wrapper -->
                          </div><!-- col-12 -->
                        </div><!-- row -->
                      </div><!-- col-12 -->
                    </div><!-- row -->
                  
                </form>
              </div><!-- tab-pane -->
              <div class="tab-pane" id="t02">
                <form method="post" action="#" data-parsley-validate data-parsley-errors-messages-disabled>
                 
                    <div class="row mg-b-40">
                      <div class="col-lg-12">
                        <div class="row mg-b-10">
                          <div class="col-lg-12">
                            <div class="d-flex justify-content-between align-items-center pd-b-10">
                              <div class="mg-b-0">
                                <div class="card-title mg-b-0">Mother Ship</div>
                              </div><!-- form-group -->
                              <div class="btn-group" role="group" aria-label="Basic example">
                                <button id="" type="button" class="addShip btn btn-third" value="Mothership" data-toggle="modal" data-target="#addBothShip"><i class="icon ion-plus tx-20"></i></button>
                              </div>
                            </div>
                            <div class="table-wrapper">
                              <table id="datatable-mothership" class="table display responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                  <tr>
                                    <th class="wd-2p"></th>
                                    <th class="wd-15p">Vessel Name</th>
                                    <th class="wd-20p">Vessel Type</th>
                                    <th class="wd-10p">LOA (m)</th>
                                    <th class="wd-10p">DWT (t)</th>
                                    <th class="wd-5p tx-center">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                  $no = 1;
                                  foreach ($mothership as $m) :
                                  ?>
                                  <tr>
                                    <td><?php #echo $no;?></td>
                                    <td><a href="<?php echo env('BASE_URL');?>edit-ship/<?php echo $m->ship_id;?>" ><?php echo $m->ship_name;?></a></td>
                                    <td><?php echo $m->ship_type;?></td>
                                    <td><?php echo $m->ship_LOA;?></td>
                                    <td><?php echo $m->ship_DWT;?></td>
                                    <td class="dropdown hidden-xs-down tx-center">
                                      <a href="#" data-toggle="dropdown" class="tx-gray-500 hover-info"><i class="icon ion-more tx-16"></i></a>
                                      <div class="dropdown-menu dropdown-menu-right pd-10">
                                        <nav class="nav nav-style-2 flex-column">
                                          <a href="<?php echo env('BASE_URL');?>edit-ship/<?php echo $m->ship_id;?>" class="nav-link">Edit</a>
                                          <!-- <a href="" class="nav-link" data-toggle="modal" data-target="#deletealert">Delete</a> -->
                                        </nav>
                                      </div><!-- dropdown-menu -->
                                    </td>
                                  </tr>
                                  <?php
                                  $no = $no + 1;
                                  endforeach;
                                  ?>
                                </tbody>
                              </table>
                            </div><!-- table-wrapper -->
                          </div><!-- col-12 -->
                        </div><!-- row -->
                      </div><!-- col-12 -->
                      </div><!-- row -->
                    <hr class="pd-b-5">
                    <div class="row mg-b-40">
                      <div class="col-lg-12">
                        <div class="row mg-b-10">
                          <div class="col-lg-12">
                            <div class="d-flex justify-content-between align-items-center pd-b-10">
                              <div class="mg-b-0">
                                <div class="card-title mg-b-0">Manuevering Ship</div>
                              </div><!-- form-group -->
                              <div class="btn-group" role="group" aria-label="Basic example">
                                <button type="button" class="addShip btn btn-third" value="Maneuvering" data-toggle="modal" data-target="#addBothShip"><i class="icon ion-plus tx-20"></i></button>
                              </div>
                            </div>
                            <div class="table-wrapper">
                              <table id="datatable-manueveringship" class="table display responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                  <tr>
                                    <th class="wd-2p"></th>
                                    <th class="wd-15p">Vessel Name</th>
                                    <th class="wd-20p">Vessel Type</th>
                                    <th class="wd-10p">LOA (m)</th>
                                    <th class="wd-10p">DWT (t)</th>
                                    <th class="wd-5p tx-center">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                  $no = 1;
                                  foreach ($maneuvering as $m) :
                                  ?>
                                  <tr>
                                    <td><?php #echo $no;?></td>
                                    <td><a href="<?php echo env('BASE_URL');?>edit-ship/<?php echo $m->ship_id;?>" ><?php echo $m->ship_name;?></a></td>
                                    <td><?php echo $m->ship_type;?></td>
                                    <td><?php echo $m->ship_LOA;?></td>
                                    <td><?php echo $m->ship_DWT;?></td>
                                    <td class="dropdown hidden-xs-down tx-center">
                                      <a href="#" data-toggle="dropdown" class="tx-gray-500 hover-info"><i class="icon ion-more tx-16"></i></a>
                                      <div class="dropdown-menu dropdown-menu-right pd-10">
                                        <nav class="nav nav-style-2 flex-column">
                                          <a href="<?php echo env('BASE_URL');?>edit-ship/<?php echo $m->ship_id;?>" class="nav-link">Edit</a>
                                          <!-- <a href="" class="nav-link" data-toggle="modal" data-target="#deletealert">Delete</a> -->
                                        </nav>
                                      </div><!-- dropdown-menu -->
                                    </td>
                                  </tr>
                                  <?php
                                  $no = $no + 1;
                                  endforeach;
                                  ?>
                                </tbody>
                              </table>
                            </div><!-- table-wrapper -->
                          </div><!-- col-12 -->
                        </div><!-- row -->
                      </div><!-- col-12 -->
                    </div><!-- row -->
                 
                </form>
              </div><!-- tab-pane -->
            </div><!-- tab-content -->
            
            </div><!-- card-body -->
          </div><!-- card -->
        </div><!-- card -->
      </div><!-- col-6 -->
    </div><!-- row -->

  </div><!-- br-pagebody -->
</div><!-- br-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->

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
        <p class="mg-b-30 mg-x-20">You will not be able to recover this data!</p>
        <a href="" class="btn btn-info"  data-dismiss="modal" aria-label="Close">Yes, Confirm</a>
      </div><!-- modal-body -->
    </div><!-- modal-content -->
  </div><!-- modal-dialog -->
</div><!-- modal -->

<div id="addclient-1" class="modal fade">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content tx-size-sm">
      <div class="modal-header pd-x-20">
        <h6 class="tx-14 mg-b-0 tx-capitalize tx-inverse tx-medium tx-uppercase">Add Client</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?php echo env('BASE_URL');?>do-add-company" data-parsley-validate data-parsley-errors-messages-disabled id="selectForm-sts">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="modal-body pd-20">

          <div class="row">
            <div class="col-lg-6">
              <div class="row mg-b-10">
                <div class="col-lg-12">
                  <div class="form-group mg-b-10-force">
                    <label class="form-control-label">Company Name : <span class="tx-success">*</span></label>
                    <input class="form-control" type="text" name="client_name"  placeholder="Insert Company" required>
                  </div>
                </div><!-- col-12 -->
              </div><!-- row -->
              <div class="row mg-b-10">
                <div class="col-lg-12">
                  <div class="form-group mg-b-10-force">
                    <label class="form-control-label">Company Address : <span class="tx-success">*</span></label>
                    <input class="form-control mg-b-10-force" type="text" name="client_add1"  placeholder="Address Line 1" required>
                    <input class="form-control" type="text" name="client_add2"  placeholder="Address Line 2">
                  </div>
                </div><!-- col-12 -->
              </div><!-- row -->
              <div class="row mg-b-10">
                <div class="col-lg-6">
                  <div class="form-group mg-b-10-force">
                    <label class="form-control-label">ZIP / Postal Code : </label>
                    <input class="form-control" type="number" name="client_zipcode" placeholder="">
                  </div>
                </div><!-- col-6 -->
                <div class="col-lg-6">
                  <div class="form-group mg-b-10-force">
                    <label class="form-control-label">State : </label>
                    <input class="form-control" type="text" name="client_state"  placeholder="">
                  </div>
                </div><!-- col-6 -->
                <div class="col-lg-6">
                  <div class="form-group mg-b-10-force">
                    <label class="form-control-label">Country : </label>
                    <input class="form-control" type="text" name="client_country"  placeholder="">
                  </div>
                </div><!-- col-6 -->
              </div><!-- row -->
            </div><!-- col-6 -->
            <div class="col-lg-6">
              <div class="row mg-b-10">
                <div class="col-lg-12">
                  <div class="form-group mg-b-10-force">
                    <label class="form-control-label">Contact Person : <span class="tx-success">*</span></label>
                    <input class="form-control" type="text" name="client_contact_person" placeholder="Insert Name" required>
                  </div>
                </div><!-- col-12 -->
                <div class="col-lg-12">
                  <div class="form-group mg-b-10-force">
                    <label class="form-control-label">Company Email : <span class="tx-success">*</span></label>
                    <input type="email" name="client_email" class="form-control"  placeholder="Enter Email" required>
                  </div>
                </div><!-- col-12 -->
              </div><!-- row -->
              <div class="row mg-b-10">
                <div class="col-lg-12">
                  <div class="form-group mg-b-10-force">
                    <label class="form-control-label">Telephone : <span class="tx-success">*</span></label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fa fa-phone tx-16 lh-0 op-6"></i>
                        </div>
                      </div><!-- input-group-prepend -->
                      <input id="phoneMask" type="text" class="form-control" name="client_phone" placeholder="(000) 000-0000" required>
                    </div><!-- input-group -->
                  </div>
                </div><!-- col-12 -->
              </div><!-- row -->
            </div><!-- col-6 -->
          </div><!-- row -->

        </div><!-- modal-body-->
        <div class="modal-footer">
          <input type="hidden" name="type" value="client">
          <button type="submit" class="btn btn-info">Add Client</button>
          <button type="reset" class="btn btn-secondary">Reset</button>
          <!-- <a href="<?php #echo env('BASE_URL');?>assets"  class="btn btn-secondary" >Back to Assets</a> -->
        </div><!-- form-layout-footer -->
      </form>
    </div>
  </div><!-- modal-dialog -->
</div><!-- modal -->

<div id="addoperator-1" class="modal fade">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content tx-size-sm">
      <div class="modal-header pd-x-20">
        <h6 class="tx-14 mg-b-0 tx-capitalize tx-inverse tx-medium tx-uppercase">Add STS Operator</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?php echo env('BASE_URL');?>do-add-company" data-parsley-validate data-parsley-errors-messages-disabled id="selectForm-sts">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="modal-body pd-20">

          <div class="row">
            <div class="col-lg-6">
              <div class="row mg-b-10">
                <div class="col-lg-12">
                  <div class="form-group mg-b-10-force">
                    <label class="form-control-label">Company Name : <span class="tx-success">*</span></label>
                    <input class="form-control" type="text" name="sts_name" placeholder="Insert Company" required>
                  </div>
                </div><!-- col-12 -->
              </div><!-- row -->
              <div class="row mg-b-10">
                <div class="col-lg-12">
                  <div class="form-group mg-b-10-force">
                    <label class="form-control-label">Company Address : <span class="tx-success">*</span></label>
                    <input class="form-control mg-b-10-force" type="text" name="sts_address"  placeholder="Address Line 1" required>
                    <input class="form-control" type="text" name="sts_address2"  placeholder="Address Line 2">
                  </div>
                </div><!-- col-12 -->
              </div><!-- row -->
              <div class="row mg-b-10">
                <div class="col-lg-6">
                  <div class="form-group mg-b-10-force">
                    <label class="form-control-label">ZIP / Postal Code : </label>
                    <input class="form-control" type="number" name="sts_postcode"  placeholder="">
                  </div>
                </div><!-- col-6 -->
                <div class="col-lg-6">
                  <div class="form-group mg-b-10-force">
                    <label class="form-control-label">State : </label>
                    <input class="form-control" type="text" name="sts_state"  placeholder="">
                  </div>
                </div><!-- col-6 -->
                <div class="col-lg-6">
                  <div class="form-group mg-b-10-force">
                    <label class="form-control-label">Country : </label>
                    <input class="form-control" type="text" name="sts_country"  placeholder="">
                  </div>
                </div><!-- col-6 -->
              </div><!-- row -->
            </div><!-- col-6 -->
            <div class="col-lg-6">
              <div class="row mg-b-10">
                <div class="col-lg-12">
                  <div class="form-group mg-b-10-force">
                    <label class="form-control-label">Contact Person : <span class="tx-success">*</span></label>
                    <input class="form-control" type="text"  name="sts_contact_person" placeholder="Insert Name" required>
                  </div>
                </div><!-- col-12 -->
                <div class="col-lg-12">
                  <div class="form-group mg-b-10-force">
                    <label class="form-control-label">Company Email : <span class="tx-success">*</span></label>
                    <input type="email" name="sts_email" class="form-control"  placeholder="Enter Email" required>
                  </div>
                </div><!-- col-12 -->
              </div><!-- row -->
              <div class="row mg-b-10">
                <div class="col-lg-12">
                  <div class="form-group mg-b-10-force">
                    <label class="form-control-label">Telephone : <span class="tx-success">*</span></label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fa fa-phone tx-16 lh-0 op-6"></i>
                        </div>
                      </div><!-- input-group-prepend -->
                      <input id="phoneMask" type="text" class="form-control" name="sts_tel" placeholder="(000) 000-0000" required>
                    </div><!-- input-group -->
                  </div>
                </div><!-- col-12 -->
              </div><!-- row -->
            </div><!-- col-6 -->
          </div><!-- row -->

        </div><!-- modal-body -->
        <div class="modal-footer">
          <input type="hidden" name="type" value="Operator">
          <button type="submit" class="btn btn-info">Add Operator</button>
          <button type="reset" class="btn btn-secondary">Reset</button>
        </div><!-- form-layout-footer -->
      </form>
    </div>
  </div><!-- modal-dialog -->
</div><!-- modal -->

<div id="addprovider-1" class="modal fade">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content tx-size-sm">
      <div class="modal-header pd-x-20">
        <h6 class="tx-14 mg-b-0 tx-capitalize tx-inverse tx-medium tx-uppercase">Add STS Service Provider</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?php echo env('BASE_URL');?>do-add-company" data-parsley-validate data-parsley-errors-messages-disabled id="selectForm-sts">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        
        <div class="modal-body pd-20">

          <div class="row">
            <div class="col-lg-6">
              <div class="row mg-b-10">
                <div class="col-lg-12">
                  <div class="form-group mg-b-10-force">
                    <label class="form-control-label">Company Name : <span class="tx-success">*</span></label>
                    <input class="form-control" type="text" name="sts_name" placeholder="Insert Company" required>
                  </div>
                </div><!-- col-12 -->
              </div><!-- row -->
              <div class="row mg-b-10">
                <div class="col-lg-12">
                  <div class="form-group mg-b-10-force">
                    <label class="form-control-label">Company Address : <span class="tx-success">*</span></label>
                    <input class="form-control mg-b-10-force" type="text" name="sts_address"  placeholder="Address Line 1" required>
                    <input class="form-control" type="text" name="sts_address2"  placeholder="Address Line 2">
                  </div>
                </div><!-- col-12 -->
              </div><!-- row -->
              <div class="row mg-b-10">
                <div class="col-lg-6">
                  <div class="form-group mg-b-10-force">
                    <label class="form-control-label">ZIP / Postal Code : </label>
                    <input class="form-control" type="number" name="sts_postcode"  placeholder="">
                  </div>
                </div><!-- col-6 -->
                <div class="col-lg-6">
                  <div class="form-group mg-b-10-force">
                    <label class="form-control-label">State : </label>
                    <input class="form-control" type="text" name="sts_state"  placeholder="">
                  </div>
                </div><!-- col-6 -->
                <div class="col-lg-6">
                  <div class="form-group mg-b-10-force">
                    <label class="form-control-label">Country : </label>
                    <input class="form-control" type="text" name="sts_country"  placeholder="">
                  </div>
                </div><!-- col-6 -->
              </div><!-- row -->
            </div><!-- col-6 -->
            <div class="col-lg-6">
              <div class="row mg-b-10">
                <div class="col-lg-12">
                  <div class="form-group mg-b-10-force">
                    <label class="form-control-label">Contact Person : <span class="tx-success">*</span></label>
                    <input class="form-control" type="text"  name="sts_contact_person" placeholder="Insert Name" required>
                  </div>
                </div><!-- col-12 -->
                <div class="col-lg-12">
                  <div class="form-group mg-b-10-force">
                    <label class="form-control-label">Company Email : <span class="tx-success">*</span></label>
                    <input type="email" name="sts_email" class="form-control"  placeholder="Enter Email" required>
                  </div>
                </div><!-- col-12 -->
              </div><!-- row -->
              <div class="row mg-b-10">
                <div class="col-lg-12">
                  <div class="form-group mg-b-10-force">
                    <label class="form-control-label">Telephone : <span class="tx-success">*</span></label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fa fa-phone tx-16 lh-0 op-6"></i>
                        </div>
                      </div><!-- input-group-prepend -->
                      <input id="phoneMask" type="text" class="form-control" name="sts_tel" placeholder="(000) 000-0000" required>
                    </div><!-- input-group -->
                  </div>
                </div><!-- col-12 -->
              </div><!-- row -->
            </div><!-- col-6 -->
          </div><!-- row -->

        </div><!-- modal-body -->
        <div class="modal-footer">
          <input type="hidden" name="type" value="Service Provider">
          <button type="submit" class="btn btn-info">Add Provider</button>
          <button type="reset" class="btn btn-secondary">Reset</button>
        </div><!-- form-layout-footer -->
      </form>
    </div>
  </div><!-- modal-dialog -->
</div><!-- modal -->

<div id="addBothShip" class="modal fade">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content tx-size-sm">
      <div class="modal-header pd-x-20">
        <h6 class="tx-14 mg-b-0 tx-capitalize tx-inverse tx-medium tx-uppercase" id="modalDisplayTitle"></h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?php echo env('BASE_URL');?>add-ship" data-parsley-validate data-parsley-errors-messages-disabled>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        
        <div class="modal-body pd-20">
          <div class="row mg-b-10">
            <div class="col-lg-12">
              <div class="form-group mg-b-10-force">
                <label class="form-control-label">IMO No : <span class="tx-success">*</span></label>
                <input class="form-control" type="text" name="ship_imo_no" value="" placeholder="" required>
              </div>
            </div><!-- col-12 -->
          </div><!-- row -->
          <div class="row mg-b-10">
            <div class="col-lg-12">
              <div class="form-group mg-b-10-force">
                <label class="form-control-label">Vessel Name : <span class="tx-success">*</span></label>
                <input class="form-control" type="text" name="ship_name" value="" placeholder="" required>
              </div>
            </div><!-- col-12 -->
          </div><!-- row -->
          <div class="row mg-b-10">
            <div class="col-lg-12">
              <div class="form-group mg-b-10-force">
                <label class="form-control-label">Vessel Type : <span class="tx-success">*</span></label>
                <input class="form-control" type="text" name="ship_type" value="" placeholder="" required>
              </div>
            </div><!-- col-12 -->
          </div><!-- row -->
          <div class="row mg-b-10">
            <div class="col-lg-12">
              <div class="form-group mg-b-10-force">
                <label class="form-control-label">Length Overall - LOA : <span class="tx-success">*</span></label>
                <div class="input-group">
                  <input type="text" class="form-control" name="ship_LOA" required>
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
                <label class="form-control-label">Deadweight Tonnage - DWT : <span class="tx-success">*</span></label>
                <div class="input-group">
                  <input type="text" class="form-control" name="ship_DWT" required>
                  <div class="input-group-append">
                    <span class="input-group-text">t</span>
                  </div>
                </div><!-- input-group -->
              </div>
            </div><!-- col-12 -->
          </div><!-- row -->
        </div><!-- modal-body -->
        <div class="modal-footer">
          <input type="hidden" name="ship_category"  id="ship_category" value="Mothership">
          <button type="submit" class="btn btn-info">Add Vessel</button>
          <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
      </form>
    </div>
  </div><!-- modal-dialog -->
</div><!-- modal -->

<div id="addmanueveringship-1" class="modal fade">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content tx-size-sm">
      <div class="modal-header pd-x-20">
        <h6 class="tx-14 mg-b-0 tx-capitalize tx-inverse tx-medium tx-uppercase">Add Maneuvering Ship</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="#" data-parsley-validate data-parsley-errors-messages-disabled>
        <div class="modal-body pd-20">
          <div class="row mg-b-10">
            <div class="col-lg-12">
              <div class="form-group mg-b-10-force">
                <label class="form-control-label">Vessel Name : <span class="tx-success">*</span></label>
                <input class="form-control" type="text" value="" placeholder="Insert Vessel Name" required>
              </div>
            </div><!-- col-12 -->
          </div><!-- row -->
          <div class="row mg-b-10">
            <div class="col-lg-12">
              <div class="form-group mg-b-10-force">
                <label class="form-control-label">Vessel Type : <span class="tx-success">*</span></label>
                <input class="form-control" type="text" value="" placeholder="Insert Vessel Type" required>
              </div>
            </div><!-- col-12 -->
          </div><!-- row -->
          <div class="row mg-b-10">
            <div class="col-lg-12">
              <div class="form-group mg-b-10-force">
                <label class="form-control-label">Length Overall - LOA : <span class="tx-success">*</span></label>
                <div class="input-group">
                  <input type="text" class="form-control" required>
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
                <label class="form-control-label">Deadweight Tonnage - DWT : <span class="tx-success">*</span></label>
                <div class="input-group">
                  <input type="number" class="form-control" required>
                  <div class="input-group-append">
                    <span class="input-group-text">t</span>
                  </div>
                </div><!-- input-group -->
              </div>
            </div><!-- col-12 -->
          </div><!-- row -->
        </div><!-- modal-body -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-info">Add Vessel</button>
          <button type="reset" class="btn btn-secondary">Reset</button>
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

      $(document).on("click", ".addShip", function () {
           var type = $(this).attr('value');

           if (type == 'Mothership') {
             $("#modalDisplayTitle").html('Add Mother Ship');
           }
           if (type == "Maneuvering") {
             $("#modalDisplayTitle").html('Add Maneuvering Ship');
           }
           $("#ship_category").val( type );
           // alert(type);
      });
    });
</script>
<script type="text/javascript">
  function handleSelect(elm)
  {
    // window.location = elm.value+".html";
  }
</script>
<script>
  $('.disabled').click(function(e){
    e.preventDefault();
  })
  $(".select2").select2({
    width: 'resolve' // need to override the changed default
  });

  $('#datatable1').DataTable({
    bLengthChange: false,
    pageLength: 5,
    searching: false,
    sorting: false,
    responsive: true
  });


  $('#datatable2').DataTable({
    bLengthChange: false,
    pageLength: 5,
    searching: false,
    sorting: false,
    responsive: true
  });
  $('#datatable3').DataTable({
    bLengthChange: false,
    pageLength: 5,
    searching: false,
    sorting: false,
    responsive: true
  });
  $('#datatable-mothership').DataTable({
    bLengthChange: false,
    pageLength: 5,
    searching: false,
    sorting: false,
    responsive: true
  });

  $('#datatable-manueveringship').DataTable({
    bLengthChange: false,
    pageLength: 5,
    searching: false,
    sorting: false,
    responsive: true
  });

  $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
    $($.fn.dataTable.tables(true)).DataTable()
    .columns.adjust()
    .responsive.recalc();
  });
  $(function(){
    'use strict';
    $('#selectForm-01').parsley();
    $('#selectForm-02').parsley();
  });

  // Input Masks
  $('#phoneMask').mask('(999) 999-9999');
  $('#time-03').mask('99:99');
  $('#time-04').mask('99:99');
  $('#time-05').mask('99:99');

  // function printData()
  // {
  //   var divToPrint=document.getElementById("datatable1").innerHTML;
  //
  //   var style = "<style>";
  //   style = style + "table {width: 100%;font: 17px Calibri;}";
  //   style = style + "table, th, td {border: solid 1px #DDD; border-collapse: collapse;";
  //   style = style + "padding: 2px 3px;text-align: center;}";
  //   style = style + "</style>";
  //
  //   var win = window.open('', '', '');
  //   // win.document.write(divToPrint.outerHTML);
  //
  //   win.document.write('<html><head>');
  //   win.document.write('<title>Profile</title>');   // <title> FOR PDF HEADER.
  //   win.document.write(style);          // ADD STYLE INSIDE THE HEAD TAG.
  //   win.document.write('</head>');
  //   win.document.write('<body>');
  //   win.document.write(divToPrint);         // THE TABLE CONTENTS INSIDE THE BODY TAG.
  //   win.document.write('</body></html>');
  //
  //   win.print();
  //   win.close();
  // }
  // $('#buttonprint').on('click',function(){
  //   printData();
  //   // window.print();
  //   return false; // why false?
  // })

</script>

@stop
