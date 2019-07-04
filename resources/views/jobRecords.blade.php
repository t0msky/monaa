@extends('layouts.master')

@section('content')
<div class="br-mainpanel">
  <div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
      <a class="breadcrumb-item" href="#">Operations</a>
      <span class="breadcrumb-item active">Job Records</span>
    </nav>
  </div><!-- br-pageheader -->
  <div class="br-pagetitle">
    <i class="icon typcn typcn-briefcase tx-24"></i>
    <div>
      <h4 class="pd-y-15">Operations</h4>
      <!-- <p class="mg-b-0">Overview And Summary Of Current Projects</p> -->
    </div>
    <div class="form-layout-footer mg-l-auto hidden-xs-down">
      <a href="<?php echo env('BASE_URL');?>addnewjob" class="btn btn-info">Add New Job</a>
    </div>
  </div><!-- d-flex -->

  <div class="br-pagebody pd-x-20 pd-sm-x-30">
    <div class="card shadow-base bd-0 mg-t-20 mg-b-10">
      <div class="card-header-02 bg-transparent pd-x-25 pd-y-25 d-flex justify-content-between align-items-center">
        <div class="card-title mg-b-0">Ship-To-Ship Operations Records</div>
      </div><!-- card-header -->

      <div class="card">
        <div class="card-header">
          <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
              <a class="nav-link active" href="#t01" data-toggle="tab">Floating Storage Unit - FSU</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#t02" data-toggle="tab">SPOT</a>
            </li>
          </ul>
        </div><!-- card-header -->

        <div class="card-body color-gray-lighter">
          <div class="tab-content">
            <div class="tab-pane active" id="t01">
              <div class="card-header-03 bg-transparent d-flex justify-content-between align-items-center pd-b-20">
                <div class="form-group mg-b-0">
                  <!-- <select class="form-control select2" style="width:300px" data-placeholder="Choose Month">
                    <option value="1">January 2019</option>
                    <option value="2">February 2019</option>
                    <option value="3">March 2019</option>
                    <option value="4">April 2019</option>
                    <option value="5">May 2019</option>
                    <option value="6" selected>June 2019</option>
                    <option value="7">July 2019</option>
                    <option value="8">August 2019</option>
                    <option value="9">September 2019</option>
                    <option value="10">October 2019</option>
                    <option value="11">November 2019</option>
                    <option value="12">December 2019</option>
                  </select> -->
                </div><!-- form-group -->
                <div class="btn-group" role="group" aria-label="Basic example">
                  <button type="button" class="btn btn-third"><i class="icon typcn typcn-document-text tx-24"></i></button>
                  <button id="buttonprint" type="button" class="btn btn-third"><i class="icon typcn typcn-printer tx-24"></i></button>
                </div>
              </div><!-- card-header -->
              <div class="table-wrapper">
                <table id="datatable-1" class="table display responsive nowrap" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th class="wd-5p"></th>
                      <th class="wd-5p">No.</th>
                      <th class="wd-15p">Job Code</th>
                      <th class="wd-15p">Job Status</th>
                      <th class="wd-5p-force">STS</th>
                      <th class="wd-15p">Mother Ship</th>
                      <th class="wd-15p">Manuevering Ship</th>
                      <th class="wd-10p">Commence Date</th>
                      <th class="wd-10p">Commence Time</th>
                      <th class="wd-10p">Complete Date</th>
                      <th class="wd-10p">Complete Time</th>
                      <th class="wd-10p">Exposure Hour</th>
                      <th class="wd-10p">Exceeding Hour > 24</th>
                      <th class="wd-10p">Exceeding Hour > 48</th>
                      <th class="wd-10p">Normal Rate (SGD)</th>
                      <th class="wd-10p">Overtime Rate (SGD)</th>
                      <th class="wd-10p">Total Charge (SGD)</th>
                      <th class="wd-10p">Berthing</th>
                      <th class="wd-10p">Unberthing</th>
                      <th class="wd-15p">Mooring Master</th>
                      <th class="wd-15p">Pilot 1</th>
                      <th class="wd-15p">Pilot 2</th>
                      <th class="wd-15p">Remarks</th>
                      <th class="wd-5p">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach($jobs as $j) :
                    ?>
                    <tr>
                      <td></td>
                      <td><?php echo $no;?></td>
                      <td><a href="jobinfo/<?php echo $j->job_id;?>"><?php echo $j->job_code;?></a></td>
                      <td>
                        <?php
                          if ($j->job_status == "In-coming") {
                              echo '<i class="icon ion-checkmark tx-primary pd-r-10"></i>';
                          } else if ($j->job_status == "On-Board") {
                              echo '<i class="icon ion-checkmark tx-warning pd-r-10"></i>';
                          } else if ($j->job_status == "Cancelled") {
                              echo '<i class="icon ion-close tx-danger pd-r-10"></i>';
                          } else if ($j->job_status == "Completed") {
                              echo '<i class="icon ion-checkmark tx-success pd-r-10"></i>';
                          }
                          echo $j->job_status;
                        ?>
                      </td>
                      <td><?php echo $j->card_type;?></td>
                      <td class="dropdown hidden-xs-down">
                        <a href="#" data-toggle="dropdown" class="tx-gray-600 hover-info"><i class="icon ion-add tx-22"></i><?php echo $j->mot_ship_name;?></a>
                        <div class="dropdown-menu dropdown-menu-left pd-x-15">
                          <div class="d-flex justify-content-between bd-b pd-y-5 align-items-center">
                            <div class="tx-capitalize">Type</div>
                            <div class="tx-capitalize"><?php echo $j->mot_ship_type;?></div>
                          </div>
                          <div class="d-flex justify-content-between bd-b pd-y-5 align-items-center">
                            <div class="tx-capitalize">LOA</div>
                            <div class="tx-capitalize"><?php echo $j->mot_ship_LOA;?> m</div>
                          </div>
                          <div class="d-flex justify-content-between pd-y-5 align-items-center">
                            <div class="tx-capitalize">DWT</div>
                            <div class="tx-capitalize"><?php echo $j->mot_ship_DWT;?> t</div>
                          </div>
                        </div><!-- dropdown-menu -->
                      </td>
                      <td class="dropdown hidden-xs-down">
                        <a href="#" data-toggle="dropdown" class="tx-gray-600 hover-info"><i class="icon ion-add tx-22"></i><?php echo $j->man_ship_name;?></a>
                        <div class="dropdown-menu dropdown-menu-left pd-x-15">
                          <div class="d-flex justify-content-between bd-b pd-y-5 align-items-center">
                            <div class="tx-capitalize">Type</div>
                            <div class="tx-capitalize"><?php echo $j->man_ship_type;?></div>
                          </div>
                          <div class="d-flex justify-content-between bd-b pd-y-5 align-items-center">
                            <div class="tx-capitalize">LOA</div>
                            <div class="tx-capitalize"><?php echo $j->man_ship_LOA;?> m</div>
                          </div>
                          <div class="d-flex justify-content-between pd-y-5 align-items-center">
                            <div class="tx-capitalize">DWT</div>
                            <div class="tx-capitalize"><?php echo $j->man_ship_DWT;?> t</div>
                          </div>
                        </div><!-- dropdown-menu -->
                      </td>
                      <td><?php echo date('d M Y', strtotime($j->job_commence_date)); ?></td>
                      <td><?php echo $j->job_commence_time;?></td>
                      <td><?php if($j->job_complete_date != '') { echo date('d M Y', strtotime($j->job_complete_date)); } else { echo '-'; } ?></td>
                      <td><?php echo $j->job_complete_time;?></td>
                      <td><?php echo $j->job_hour;?></td>
                      <td><?php echo $j->job_exceeding24;?></td>
                      <td><?php echo $j->job_exceeding48;?></td>
                      <td><?php echo number_format($j->card_rate,2);?></td>
                      <td>-</td>
                      <td><?php echo number_format($j->card_rate,2);?></td>
                      <td><?php echo $j->job_berthing;?></td>
                      <td><?php echo $j->job_unberthing;?></td>
                      <td><?php echo $j->u1_firstname.' '. $j->u1_lastname;?></td>
                      <td><?php echo $j->u2_firstname.' '. $j->u2_lastname;?></td>
                      <td><?php echo $j->u3_firstname.' '. $j->u3_lastname;?></td>
                      <td><?php echo $j->job_remark;?></td>
                      <td class="dropdown hidden-xs-down">
                        <?php if ($j->job_status != "Completed") { ?>
                        <a href="#" data-toggle="dropdown" class="tx-gray-500 hover-info"><i class="icon ion-more tx-22"></i></a>
                        <div class="dropdown-menu dropdown-menu-left pd-10">
                          <nav class="nav nav-style-2 flex-column">
                            <!-- <a href="" class="nav-link">Submit Voucher</a> -->
                            <a href="jobinfo/<?php echo $j->job_id;?>" class="nav-link">Edit</a>
                            <a class="deleteJobSts nav-link"  data-id="<?php echo $j->job_id;?>"  data-toggle="modal" data-target="#deletealert">Delete</a>
                          </nav>
                        </div>
                        <?php } ?>
                      </td>
                    </tr>
                    <?php
                    $no = $no+1;
                    endforeach;
                    ?>
                  </tbody>
                </table>
              </div><!-- table-wrapper -->
            </div><!-- tab-pane -->
            <div class="tab-pane" id="t02">
              <div class="card-header-03 bg-transparent d-flex justify-content-between align-items-center pd-b-20">
                <div class="form-group mg-b-0">
                  <!-- <select class="form-control select2" style="width:300px" data-placeholder="Choose Month">
                    <option value="1">January 2019</option>
                    <option value="2">February 2019</option>
                    <option value="3" selected>March 2019</option>
                    <option value="4">April 2019</option>
                    <option value="5">May 2019</option>
                    <option value="6">June 2019</option>
                    <option value="7">July 2019</option>
                    <option value="8">August 2019</option>
                    <option value="9">September 2019</option>
                    <option value="10">October 2019</option>
                    <option value="11">November 2019</option>
                    <option value="12">December 2019</option>
                  </select> -->
                </div><!-- form-group -->
                <div class="btn-group" role="group" aria-label="Basic example">
                  <button type="button" class="btn btn-third"><i class="icon typcn typcn-document-text tx-24"></i></button>
                  <button id="buttonprint" type="button" class="btn btn-third"><i class="icon typcn typcn-printer tx-24"></i></button>
                </div>
              </div><!-- card-header -->
              <div class="table-wrapper">
                <table id="datatable-2" class="table display responsive nowrap" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th class="wd-5p"></th>
                      <th class="wd-5p">No.</th>
                      <th class="wd-15p">Job Code</th>
                      <th class="wd-15p">Job Status</th>
                      <th class="wd-5p-force">STS</th>
                      <th class="wd-15p">Mother Ship</th>
                      <th class="wd-15p">Manuevering Ship</th>
                      <th class="wd-10p">Commence Date</th>
                      <th class="wd-10p">Commence Time</th>
                      <th class="wd-10p">Complete Date</th>
                      <th class="wd-10p">Complete Time</th>
                      <th class="wd-10p">Exposure Hour</th>
                      <th class="wd-10p">Exceeding Hour > 24</th>
                      <th class="wd-10p">Exceeding Hour > 48</th>
                      <th class="wd-10p">Normal Rate (SGD)</th>
                      <th class="wd-10p">Overtime Rate (SGD)</th>
                      <th class="wd-10p">Total Charge (SGD)</th>
                      <th class="wd-10p">Berthing</th>
                      <th class="wd-10p">Unberthing</th>
                      <th class="wd-15p">Mooring Master</th>
                      <th class="wd-15p">Pilot 1</th>
                      <th class="wd-15p">Pilot 2</th>
                      <th class="wd-15p">Remarks</th>
                      <th class="wd-5p">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach($jobsSpot as $j) :
                    ?>
                    <tr>
                      <td></td>
                      <td><?php echo $no;?></td>
                      <td><a href="jobinfo/<?php echo $j->job_id;?>"><?php echo $j->job_code;?></a></td>
                      <td>
                        <?php
                          if ($j->job_status == "In-coming") {
                              echo '<i class="icon ion-checkmark tx-primary pd-r-10"></i>';
                          } else if ($j->job_status == "On-Board") {
                              echo '<i class="icon ion-checkmark tx-warning pd-r-10"></i>';
                          } else if ($j->job_status == "Cancelled") {
                              echo '<i class="icon ion-close tx-danger pd-r-10"></i>';
                          } else if ($j->job_status == "Completed") {
                              echo '<i class="icon ion-checkmark tx-success pd-r-10"></i>';
                          }
                          echo $j->job_status;
                        ?>
                      </td>
                      <td><?php echo $j->card_type;?></td>
                      <td class="dropdown hidden-xs-down">
                        <a href="#" data-toggle="dropdown" class="tx-gray-600 hover-info"><i class="icon ion-add tx-22"></i><?php echo $j->mot_ship_name;?></a>
                        <div class="dropdown-menu dropdown-menu-left pd-x-15">
                          <div class="d-flex justify-content-between bd-b pd-y-5 align-items-center">
                            <div class="tx-capitalize">Type</div>
                            <div class="tx-capitalize"><?php echo $j->mot_ship_type;?></div>
                          </div>
                          <div class="d-flex justify-content-between bd-b pd-y-5 align-items-center">
                            <div class="tx-capitalize">LOA</div>
                            <div class="tx-capitalize"><?php echo $j->mot_ship_LOA;?> m</div>
                          </div>
                          <div class="d-flex justify-content-between pd-y-5 align-items-center">
                            <div class="tx-capitalize">DWT</div>
                            <div class="tx-capitalize"><?php echo $j->mot_ship_DWT;?> t</div>
                          </div>
                        </div><!-- dropdown-menu -->
                      </td>
                      <td class="dropdown hidden-xs-down">
                        <a href="#" data-toggle="dropdown" class="tx-gray-600 hover-info"><i class="icon ion-add tx-22"></i><?php echo $j->man_ship_name;?></a>
                        <div class="dropdown-menu dropdown-menu-left pd-x-15">
                          <div class="d-flex justify-content-between bd-b pd-y-5 align-items-center">
                            <div class="tx-capitalize">Type</div>
                            <div class="tx-capitalize"><?php echo $j->man_ship_type;?></div>
                          </div>
                          <div class="d-flex justify-content-between bd-b pd-y-5 align-items-center">
                            <div class="tx-capitalize">LOA</div>
                            <div class="tx-capitalize"><?php echo $j->man_ship_LOA;?> m</div>
                          </div>
                          <div class="d-flex justify-content-between pd-y-5 align-items-center">
                            <div class="tx-capitalize">DWT</div>
                            <div class="tx-capitalize"><?php echo $j->man_ship_DWT;?> t</div>
                          </div>
                        </div><!-- dropdown-menu -->
                      </td>
                      <td><?php echo date('d M Y', strtotime($j->job_commence_date)); ?></td>
                      <td><?php echo $j->job_commence_time;?></td>
                      <td><?php if($j->job_complete_date != '') { echo date('d M Y', strtotime($j->job_complete_date)); } else { echo '-'; } ?></td>
                      <td><?php echo $j->job_complete_time;?></td>
                      <td><?php echo $j->job_hour;?></td>
                      <td><?php echo $j->job_exceeding24;?></td>
                      <td><?php echo $j->job_exceeding48;?></td>
                      <td><?php echo number_format($j->card_rate,2);?></td>
                      <td>-</td>
                      <td><?php echo number_format($j->card_rate,2);?></td>
                      <td><?php echo $j->job_berthing;?></td>
                      <td><?php echo $j->job_unberthing;?></td>
                      <td><?php echo $j->u1_firstname.' '. $j->u1_lastname;?></td>
                      <td><?php echo $j->u2_firstname.' '. $j->u2_lastname;?></td>
                      <td><?php echo $j->u3_firstname.' '. $j->u3_lastname;?></td>
                      <td><?php echo $j->job_remark;?></td>
                      <td class="dropdown hidden-xs-down">
                        <?php if ($j->job_status != "Completed") { ?>
                        <a href="#" data-toggle="dropdown" class="tx-gray-500 hover-info"><i class="icon ion-more tx-22"></i></a>
                        <div class="dropdown-menu dropdown-menu-left pd-10">
                          <nav class="nav nav-style-2 flex-column">
                            <!-- <a href="" class="nav-link">Submit Voucher</a> -->
                            <a href="jobinfo/<?php echo $j->job_id;?>" class="nav-link">Edit</a>
                            <a class="deleteJobSts nav-link"  data-id="<?php echo $j->job_id;?>"  data-toggle="modal" data-target="#deletealert">Delete</a>
                          </nav>
                        </div>
                        <?php } ?>
                      </td>
                    </tr>
                    <?php
                    $no = $no+1;
                    endforeach;
                    ?>

                    <!-- <tr>
                      <td></td>
                      <td>3</td>
                      <td>F(SCR)17-162-03/19</td>
                      <td><i class="icon ion-checkmark tx-warning pd-r-10"></i>On-Board</td>
                      <td>SPOT</td>
                      <td>Hercules 1</td>
                      <td>Sea Horizon</td>
                      <td>27/02/2019</td>
                      <td>00 : 00</td>
                      <td>-</td>
                      <td>-</td>
                      <td>-</td>
                      <td>-</td>
                      <td>-</td>
                      <td>-</td>
                      <td>-</td>
                      <td>-</td>
                      <td>-</td>
                      <td>-</td>
                      <td>Wan Khairulfaizi Wan Muhammad</td>
                      <td>Ahmad Bunyamin Said</td>
                      <td>Muhamad Farid Muhammad</td>
                      <td></td>
                      <td class="dropdown hidden-xs-down">
                        <a href="#" data-toggle="dropdown" class="tx-gray-500 hover-info"><i class="icon ion-more tx-22"></i></a>
                        <div class="dropdown-menu dropdown-menu-left pd-10">
                          <nav class="nav nav-style-2 flex-column">
                            <a href="" class="nav-link">Submit Voucher</a>
                            <a href="" class="nav-link">Edit</a>
                            <a href="" class="nav-link" data-toggle="modal" data-target="#deletealert">Delete</a>
                          </nav>
                        </div>
                      </td>
                    </tr> -->

                  </tbody>
                </table>
              </div><!-- table-wrapper -->
            </div><!-- tab-pane -->
          </div><!-- tab-content -->
        </div><!-- card-body -->
      </div><!-- card -->
    </div><!-- card -->
  </div><!-- br-pagebody -->

  <div class="br-pagebody pd-x-20 pd-sm-x-30">
    <div class="card shadow-base bd-0 mg-t-20 mg-b-40">
      <div class="card-header bg-transparent pd-x-25 pd-y-25 d-flex justify-content-between align-items-center">
        <div class="card-title mg-b-0">Pilotage Conduct, Anchoring And Shifting Movement Records</div>
      </div><!-- card-header -->
      <div class="card-body color-gray-lighter">
        <div class="card-header-03 bg-transparent pd-b-25 d-flex justify-content-between align-items-center">
          <div class="form-group mg-b-0">
            <select class="form-control select2" style="width:300px" data-placeholder="Choose Month">
              <option value="1">January 2019</option>
              <option value="2">February 2019</option>
              <option value="3" selected>March 2019</option>
              <option value="4">April 2019</option>
              <option value="5">May 2019</option>
              <option value="6">June 2019</option>
              <option value="7">July 2019</option>
              <option value="8">August 2019</option>
              <option value="9">September 2019</option>
              <option value="10">October 2019</option>
              <option value="11">November 2019</option>
              <option value="12">December 2019</option>
            </select>
          </div><!-- form-group -->
          <div class="btn-group" role="group" aria-label="Basic example">
            <button type="button" class="btn btn-third"><i class="icon typcn typcn-document-text tx-24"></i></button>
            <button id="buttonprint" type="button" class="btn btn-third"><i class="icon typcn typcn-printer tx-24"></i></button>
          </div>
        </div><!-- card-header -->
        <div class="table-wrapper">
          <table id="datatable-3" class="table display responsive nowrap" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th class="wd-5p"></th>
                <th class="wd-5p">No.</th>
                <th class="wd-15p">Job Code</th>
                <th class="wd-15p">Job Status</th>
                <th class="wd-15p">Piloting Ship</th>
                <th class="wd-10p">Commence Date</th>
                <th class="wd-10p">Commence Time</th>
                <th class="wd-10p">Complete Date</th>
                <th class="wd-10p">Complete Time</th>
                <th class="wd-10p">Exposure Hour</th>
                <th class="wd-20p">Activity</th>
                <th class="wd-10p">Total Charge (SGD)</th>
                <th class="wd-10p">Voucher No.</th>
                <th class="wd-15p">Pilot Assigned</th>
                <th class="wd-15p">Remarks</th>
                <th class="wd-5p">Action</th>
              </tr>
            </thead>
            <tbody>

              <!-- <tr>
                <td></td>
                <td>1</td>
                <td><a href="jobinfo">F(SCR)17-162-03/19</a></td>
                <td><i class="icon ion-checkmark tx-success pd-r-10"></i>In-coming</td>
                <td class="dropdown hidden-xs-down">
                  <a href="#" data-toggle="dropdown" class="tx-gray-600 hover-info"><i class="icon ion-add tx-22"></i>Sea Horizon</a>
                  <div class="dropdown-menu dropdown-menu-left pd-x-15">
                    <div class="d-flex justify-content-between bd-b pd-y-5 align-items-center">
                      <div class="tx-capitalize">Type</div>
                      <div class="tx-capitalize">LR</div>
                    </div>
                    <div class="d-flex justify-content-between bd-b pd-y-5 align-items-center">
                      <div class="tx-capitalize">LOA</div>
                      <div class="tx-capitalize">183 m</div>
                    </div>
                    <div class="d-flex justify-content-between pd-y-5 align-items-center">
                      <div class="tx-capitalize">DWT</div>
                      <div class="tx-capitalize">50,760 t</div>
                    </div>
                  </div>
                </td>
                <td>27/02/2019</td>
                <td>00 : 00</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>Inward Pilotage</td>
                <td>-</td>
                <td>-</td>
                <td>Wan Khairulfaizi Wan Muhammad</td>
                <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</td>
                <td class="dropdown hidden-xs-down">
                  <a href="#" data-toggle="dropdown" class="tx-gray-500 hover-info"><i class="icon ion-more tx-22"></i></a>
                  <div class="dropdown-menu dropdown-menu-left pd-10">
                    <nav class="nav nav-style-2 flex-column">
                      <a href="" class="nav-link">Submit Voucher</a>
                      <a href="jobinfo" class="nav-link">Edit</a>
                      <a href="" class="nav-link" data-toggle="modal" data-target="#deletealert">Delete</a>
                    </nav>
                  </div>
                </td>
              </tr> -->

            </tbody>
          </table>
        </div><!-- table-wrapper -->
      </div><!-- card-body -->
    </div><!-- card -->
  </div><!-- br-pagebody -->
</div><!-- br-mainpanel -->

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
          <input type="hidden" name="job_id" id="job_id" value="">
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

    $(document).on("click", ".deleteJobSts", function () {
         var job_id = $(this).data('id');
         $("#deletealert #job_id").val( job_id );
         // As pointed out in comments,
         // it is unnecessary to have to manually call the modal.
         // $('#addBookDialog').modal('show');
    });

  });

</script>
@stop