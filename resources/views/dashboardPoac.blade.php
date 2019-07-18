@extends('layouts.master')

@section('content')
<div class="br-mainpanel">
  <div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
      <a class="breadcrumb-item" href="#">Monaa</a>
      <span class="breadcrumb-item active">Dashboard Cards</span>
    </nav>
  </div><!-- br-pageheader -->
  <div class="br-pagetitle hidden-xs-down">
    <i class="icon typcn typcn-th-large-outline tx-24"></i>
    <div>
      <h4 class="pd-y-15">Dashboard Cards</h4>
    </div>
  </div><!-- d-flex -->

  <div class="br-pagebody pd-x-20 pd-sm-x-30">

    <div class="row row-sm mg-t-20">
      <div class="col-lg-6">

        <div class="card shadow-base bd-0">
          <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs pd-xs-b-15">
              <li class="nav-item">
                <a class="nav-link active" href="#t01" data-toggle="tab">
                  <i class="fa fa-caret-right tx-success mg-r-10"></i>Incoming STS Jobs
                  <?php
                    if (sizeof($incomingJobsSTS) > 0) {
                      echo '<span class="badge badge-success">'.sizeof($incomingJobsSTS).'</span>';
                    }
                  ?>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#t02" data-toggle="tab">
                  <i class="fa fa-caret-right tx-success mg-r-10"></i>Incoming Pilotage Jobs
                  <?php
                    if (sizeof($incomingJobsPilotage) > 0) {
                      echo '<span class="badge badge-success">'.sizeof($incomingJobsPilotage).'</span>';
                    }
                  ?>
                </a>
              </li>
            </ul>
          </div><!-- card-header -->

          <div class="bd-gray-300 rounded table-responsive">
            <div class="card-body color-gray-lighter">
            <div class="tab-content">
              <div class="tab-pane active" id="t01">
                <table class="table table-striped mg-b-0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Assigned Job</th>
                      <th>Service</th>
                      <th>Commence Date/Time</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach ($incomingJobsSTS as $i) :
                    ?>
                    <tr>
                      <th scope="row"><?php echo $no;?></th>
                      <td><a href="jobinfo-poac/<?php echo $i->job_id;?>"><?php echo $i->job_code;?></a></td>
                      <td><?php echo $i->card_type;?></td>
                      <td><?php echo date('d M Y, H:i A', strtotime($i->job_commence_date.$i->job_commence_time)); ?></td>
                    </tr>
                    <?php
                    $no = $no + 1;
                    endforeach;
                    ?>
                  </tbody>
                </table>
              </div>

              <div class="tab-pane" id="t02">

                <table class="table table-striped mg-b-0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Assigned Job</th>
                      <th>Event</th>
                      <th>Commence Date/Time</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach ($incomingJobsPilotage as $i) :
                    ?>
                    <tr>
                      <th scope="row"><?php echo $no;?></th>
                      <td><a href="jobinfo-pilotage-poac/<?php echo $i->pil_id;?>"><?php echo $i->pil_code;?></a></td>
                      <td><?php echo $i->pil_event;?></td>
                      <td><?php echo date('d M Y, H:i A', strtotime($i->pil_onboard_date.$i->pil_onboard_time)); ?></td>
                    </tr>
                    <?php
                    $no = $no + 1;
                    endforeach;
                    ?>
                  </tbody>
                </table>

              </div>

            </div> <!-- tab-content -->
            </div>
          </div><!-- bd -->

        </div><!-- card -->

      </div><!-- col-6 -->
      <div class="col-lg-6 mg-t-20 mg-lg-t-0">

        <div class="row no-gutters widget-1 shadow-base">

          <div class="col-sm-6 col-lg-6">
            <div class="card">
              <div class="card-header">
                <h6 class="card-title">STS Charges</h6>
                <h6 class="card-title"><?php echo date('F', mktime(0, 0, 0, $month, 10)).' '.$year;?></h6>
              </div><!-- card-header -->
              <div class="card-body">
                <div class="tx-24 tx-bold tx-inverse tx-lato tx-spacing-4">MYR</div> <div class="tx-24 tx-bold tx-inverse tx-lato tx-spacing-4"><?php echo number_format($totalStsCurrentMonth * 0.8,2);?></div>
              </div><!-- card-body -->

            </div><!-- card -->
          </div><!-- col-3 -->

          <div class="col-sm-6 col-lg-6 mg-t-1 mg-sm-t-0">
            <div class="card">
              <div class="card-header">
                <h6 class="card-title">Pilotage Charges</h6>
                <h6 class="card-title"><?php echo date('F', mktime(0, 0, 0, $month, 10)).' '.$year;?></h6>
              </div><!-- card-header -->
              <div class="card-body">
                <div class="tx-24 tx-bold tx-inverse tx-lato tx-spacing-4">MYR</div> <div class="tx-24 tx-bold tx-inverse tx-lato tx-spacing-4"><?php echo number_format($totalPilotageCurrentMonth * 0.8,2);?></div>
              </div><!-- card-body -->

            </div><!-- card -->
          </div><!-- col-3 -->
        </div><!-- row -->

        <div class="row no-gutters widget-1 mg-t-20 shadow-base">
          <div class="col-sm-6 col-lg-6">
            <div class="card">
              <div class="card-header">
                <h6 class="card-title">Total STS Charges</h6>
                <h6 class="card-title"><?php echo $year;?></h6>
              </div><!-- card-header -->
              <div class="card-body">
                <div class="tx-24 tx-bold tx-inverse tx-lato tx-spacing-4">MYR</div> <div class="tx-24 tx-bold tx-inverse tx-lato tx-spacing-4"><?php echo number_format($totalStsCurrentYear * 0.8,2);?></div>
              </div><!-- card-body -->

            </div><!-- card -->
          </div><!-- col-3 -->
          <div class="col-sm-6 col-lg-6 mg-t-1 mg-sm-t-0">
            <div class="card">
              <div class="card-header">
                <h6 class="card-title">Total Pilotage Charges</h6>
                <h6 class="card-title"><?php echo $year;?></h6>
              </div><!-- card-header -->
              <div class="card-body">
                <div class="tx-24 tx-bold tx-inverse tx-lato tx-spacing-4">MYR</div> <div class="tx-24 tx-bold tx-inverse tx-lato tx-spacing-4"><?php echo number_format($totalPilotageCurrentYear * 0.8,2);?></div>
              </div><!-- card-body -->

            </div><!-- card -->
          </div><!-- col-3 -->

        </div><!-- row -->

      </div><!-- col-6 -->
    </div><!-- row -->

    <div class="row row-sm mg-t-20">
      <div class="col-lg-6">
        <div class="widget-2">
          <div class="card shadow-base overflow-hidden">
            <div class="card-header">
              <h6 class="card-title">Revenue Statistics</h6>
              <div class="btn-group hidden-xs-down" role="group" aria-label="Basic example">
                <span class="btn btn-secondary pd-x-25 active">Last 6 Months</span>
                <!-- <button type="button" class="btn btn-secondary pd-x-25 active">Active Month</button> -->
              </div>
            </div><!-- card-header -->

            <div class="card-body pd-0">
              <div id="morrisBar1" class="ht-200 ht-sm-300"></div>
            </div><!-- card-body -->
          </div><!-- card -->
        </div><!-- widget-2 -->
      </div><!-- col-6 -->
      <div class="col-lg-6 mg-t-20 mg-lg-t-0">
        <div class="widget-2">
          <div class="card shadow-base overflow-hidden">
            <div class="card-header">
              <h6 class="card-title">Job Statistics</h6>
              <div class="btn-group hidden-xs-down" role="group" aria-label="Basic example">
                <span class="btn btn-secondary pd-x-25 active">Last 6 Months</span>
                <!-- <button type="button" class="btn btn-secondary pd-x-25 active">Active Month</button> -->
              </div>
            </div><!-- card-header -->
            <div class="card-body pd-0">
              <div id="morrisBar2" class="ht-200 ht-sm-300"></div>
            </div><!-- card-body -->
          </div><!-- card -->
        </div><!-- widget-2 -->
      </div><!-- col-6 -->
    </div><!-- row -->

    <div class="row row-sm mg-t-20">
      <div class="col-sm-6 col-lg-4">
        <div class="card shadow-base bd-0">
          <div class="card-header pd-y-20 bg-transparent d-flex justify-content-between align-items-center">
            <h6 class="card-title tx-uppercase mg-b-0">Total STS Jobs</h6>
          </div><!-- card-header -->
          <div class="card-body d-xs-flex justify-content-between align-items-center">
            <h3 class="mg-b-0 tx-inverse tx-lato tx-bold"><?php echo number_format($totalStsJob);?></h3>
          </div><!-- card-body -->
        </div><!-- card -->
      </div><!-- col-4 -->
      <div class="col-sm-6 col-lg-4 mg-t-20 mg-sm-t-0">
        <div class="card shadow-base bd-0">
          <div class="card-header pd-y-20 bg-transparent d-flex justify-content-between align-items-center">
            <h6 class="card-title tx-uppercase mg-b-0">Total Pilotage Jobs</h6>
          </div><!-- card-header -->
          <div class="card-body d-xs-flex justify-content-between align-items-center">
            <h3 class="mg-b-0 tx-inverse tx-lato tx-bold"><?php echo number_format($totalPilotageJob);?></h3>
          </div><!-- card-body -->
        </div><!-- card -->
      </div><!-- col-4 -->
      <div class="col-sm-6 col-lg-4 mg-t-20 mg-lg-t-0">
        <div class="card shadow-base bd-0">
          <div class="card-header pd-y-20 bg-transparent d-flex justify-content-between align-items-center">
            <h6 class="card-title tx-uppercase mg-b-0">Total Issued Voucher</h6>
          </div><!-- card-header -->
          <div class="card-body d-xs-flex justify-content-between align-items-center">
            <h3 class="mg-b-0 tx-inverse tx-lato tx-bold"><?php echo number_format($totalVoucher);?></h3>
          </div><!-- card-body -->
        </div><!-- card -->
      </div><!-- col-4 -->
    </div><!-- row -->
  </div><!-- br-pagebody -->

  <div class="br-pagebody pd-x-20 pd-sm-x-30">
    <div class="card shadow-base bd-0 mg-t-20 mg-b-10">
      <div class="card-header-02 bg-transparent pd-x-25 pd-y-25 d-flex justify-content-between align-items-center">
        <div class="card-title mg-b-0 tx-excerpt-200">Ship-To-Ship Operations Records</div>
        <div class="card-title mg-b-0"><?php echo date('F', mktime(0, 0, 0, $month, 10)).' '.$year;?></div>
      </div><!-- card-header -->

      <div class="card">
        <div class="card-header">
          <ul class="nav nav-tabs card-header-tabs pd-xs-b-15">
            <li class="nav-item">
              <a class="nav-link active" href="#t-fsu" data-toggle="tab"><i class="fa fa-caret-right tx-success mg-r-10"></i>FSU</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#t-spot" data-toggle="tab"><i class="fa fa-caret-right tx-success mg-r-10"></i>SPOT</a>
            </li>
          </ul>
        </div><!-- card-header -->

        <div class="card-body color-gray-lighter">

          <div class="tab-content">
            <div class="tab-pane active" id="t-fsu">
              <div class="card-header-03 bg-transparent d-flex justify-content-between align-items-center pd-b-20 pd-xs-b-0">
                <div class="form-group mg-b-0">

                </div><!-- form-group -->

                <div class="dataTables_filter mg-r-auto pd-t-10 hidden-xs-down">
                  <div class="input-group">
                    <input type="text" placeholder="Search ..." id="filterbox-fsu" style="width:250px">
                    <div class="input-group-append">
                     <span class="input-group-text"><i class="icon ion-search tx-18 lh-0 op-6"></i></span>
                    </div>
                  </div><!-- input-group -->
                </div>

                <div class="btn-group hidden-xs-down" role="group" aria-label="Basic example">
                  <!-- <a href="<?php #echo env('BASE_URL');?>pdf-job-records/FSU/{{date('F', mktime(0, 0, 0, $month, 10))}}/{{$year}}"
                    class="btn btn-third" data-toggle="tooltip" data-placement="top" title="PDF"><i class="icon typcn typcn-document-text tx-24"></i></a> -->
                  <a target="_blank" href="<?php echo env('BASE_URL');?>print-job-detail/FSU/{{date('F', mktime(0, 0, 0, $month, 10))}}/{{$year}}"
                    class="btn btn-third" data-toggle="tooltip" data-placement="top" title="Print"><i class="icon typcn typcn-printer tx-24"></i></a>
                </div>
              </div><!-- card-header -->
              <div class="table-wrapper">
                <table id="datatable-1" class="table display responsive nowrap" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th class="wd-5p"></th>
                      <th class="wd-5p">No.</th>
                      <th class="wd-15p">Job Code</th>
                      <th class="wd-15p">Client</th>
                      <th class="wd-15p">Job Status</th>
                      <th class="wd-5p-force">STS</th>
                      <th class="wd-15p">Mother Ship</th>
                      <th class="wd-15p">Manuevering Ship</th>
                      <th class="wd-10p">Commence Date/Time</th>
                      <!-- <th class="wd-10p">Commence Time</th> -->
                      <th class="wd-10p">Complete Date/Time</th>
                      <!-- <th class="wd-10p">Complete Time</th> -->
                      <th class="wd-10p">Exposure Hour</th>
                      <th class="wd-10p">Exceeding Hour > 24</th>
                      <th class="wd-10p">Exceeding Hour > 48</th>
                      <th class="wd-10p">Berthing</th>
                      <th class="wd-10p">Unberthing</th>
                      <th class="wd-15p">Mooring Master</th>
                      <th class="wd-15p">Pilot</th>
                      <th class="wd-30p">Remarks</th>
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
                      <td><?php echo $j->job_code;?></td>
                      <td><?php echo $j->client_name;?></td>
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
                      <td><?php echo date('d M Y, H:i A', strtotime($j->job_commence_date.$j->job_commence_time)); ?></td>
                      <!-- <td><?php #echo $j->job_commence_time;?></td> -->
                      <td><?php if($j->job_complete_date != '') { echo date('d M Y, H:i A', strtotime($j->job_complete_date.$j->job_complete_time) ); } else { echo '-'; } ?></td>
                      <!-- <td><?php #echo $j->job_complete_time;?></td> -->
                      <td><?php echo $j->job_hour;?></td>
                      <td><?php echo ($j->job_exceeding24 != 0) ? $j->job_exceeding24 : '-';?></td>
                      <td><?php echo ($j->job_exceeding48 != 0) ? $j->job_exceeding48 : '-';?></td>
                      <td><?php echo $j->job_berthing;?></td>
                      <td><?php echo $j->job_unberthing;?></td>
                      <td><?php echo $j->u1_firstname.' '. $j->u1_lastname;?></td>
                      <td><?php echo $j->u2_firstname.' '. $j->u2_lastname;?></td>
                      <td><?php echo $j->job_remark;?></td>

                    </tr>
                    <?php
                    $no = $no+1;
                    endforeach;
                    ?>
                  </tbody>
                </table>
              </div><!-- table-wrapper -->
            </div><!-- tab-pane -->
            <div class="tab-pane" id="t-spot">
              <div class="card-header-03 bg-transparent d-flex justify-content-between align-items-center pd-b-20 pd-xs-b-0">
                <div class="form-group mg-b-0">

                </div><!-- form-group -->

                <div class="dataTables_filter mg-r-auto pd-t-10 hidden-xs-down">
                  <div class="input-group">
                    <input type="text" placeholder="Search ..." id="filterbox-spot" style="width:250px">
                    <div class="input-group-append">
                     <span class="input-group-text"><i class="icon ion-search tx-18 lh-0 op-6"></i></span>
                    </div>
                  </div><!-- input-group -->
                </div>

                <div class="btn-group hidden-xs-down" role="group" aria-label="Basic example">
                  <!-- <a href="<?php #echo env('BASE_URL');?>pdf-job-records/SPOT/{{$month}}/{{$year}}"
                    class="btn btn-third" data-toggle="tooltip" data-placement="top" title="PDF"><i class="icon typcn typcn-document-text tx-24"></i></a> -->
                  <a target="_blank" href="<?php echo env('BASE_URL');?>print-job-detail/SPOT/{{$month}}/{{$year}}"
                    class="btn btn-third" data-toggle="tooltip" data-placement="top" title="Print"><i class="icon typcn typcn-printer tx-24"></i></a>
                </div>
              </div><!-- card-header -->
              <div class="table-wrapper">
                <table id="datatable-2" class="table display responsive nowrap" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th class="wd-5p"></th>
                      <th class="wd-5p">No.</th>
                      <th class="wd-15p">Job Code</th>
                      <th class="wd-15p">Client</th>
                      <th class="wd-15p">Job Status</th>
                      <th class="wd-5p-force">STS</th>
                      <th class="wd-15p">Mother Ship</th>
                      <th class="wd-15p">Manuevering Ship</th>
                      <th class="wd-10p">Commence Date/Time</th>
                      <!-- <th class="wd-10p">Commence Time</th> -->
                      <th class="wd-10p">Complete Date/Time</th>
                      <!-- <th class="wd-10p">Complete Time</th> -->
                      <th class="wd-10p">Exposure Hour</th>
                      <th class="wd-10p">Exceeding Hour > 24</th>
                      <th class="wd-10p">Exceeding Hour > 48</th>
                      <th class="wd-10p">Berthing</th>
                      <th class="wd-10p">Unberthing</th>
                      <th class="wd-15p">Mooring Master</th>
                      <th class="wd-15p">Pilot</th>
                      <th class="wd-30p">Remarks</th>
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
                      <td><?php echo $j->job_code;?></td>
                      <td><?php echo $j->client_name;?></td>
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
                      <td><?php echo date('d M Y, H:i A', strtotime($j->job_commence_date.$j->job_commence_time)); ?></td>
                      <!-- <td><?php #echo $j->job_commence_time;?></td> -->
                      <td><?php if($j->job_complete_date != '') { echo date('d M Y, H:i A', strtotime($j->job_complete_date.$j->job_complete_time)); } else { echo '-'; } ?></td>
                      <!-- <td><?php #echo $j->job_complete_time;?></td> -->
                      <td><?php echo $j->job_hour;?></td>
                      <td><?php echo ($j->job_exceeding24 != 0) ? $j->job_exceeding24 : '-';?></td>
                      <td><?php echo ($j->job_exceeding48 != 0) ? $j->job_exceeding48 : '-';?></td>
                      <td><?php echo $j->job_berthing;?></td>
                      <td><?php echo $j->job_unberthing;?></td>
                      <td><?php echo $j->u1_firstname.' '. $j->u1_lastname;?></td>
                      <td><?php echo $j->u2_firstname.' '. $j->u2_lastname;?></td>
                      <td><?php echo $j->job_remark;?></td>

                    </tr>
                    <?php
                    $no = $no+1;
                    endforeach;
                    ?>
                  </tbody>
                </table>
              </div><!-- table-wrapper -->
            </div><!-- tab-pane -->
          </div><!-- tab-content -->

        </div><!-- card-body -->
      </div><!-- card -->
    </div><!-- card -->
  </div><!-- br-pagebody -->

  <div class="br-pagebody pd-x-20 pd-sm-x-30 pd-b-25">
    <div class="card shadow-base bd-0 mg-t-20">
      <div class="card-header bg-transparent pd-x-25 pd-y-25 d-flex justify-content-between align-items-center">
        <div class="card-title mg-b-0 tx-excerpt-200">Pilotage Conduct, Anchoring And Shifting Movement Records</div>
        <div class="card-title mg-b-0"><?php echo date('F', mktime(0, 0, 0, $month, 10)).' '.$year;?></div>
      </div><!-- card-header -->
      <div class="card-body color-gray-lighter">
        <div class="card-header-03 bg-transparent pd-b-25 pd-xs-b-0 d-flex justify-content-between align-items-center">
          <div class="form-group mg-b-0">

          </div><!-- form-group -->

          <div class="dataTables_filter mg-r-auto pd-t-10 hidden-xs-down">
            <div class="input-group">
              <input type="text" placeholder="Search ..." id="filterbox-pilotage" style="width:250px">
              <div class="input-group-append">
               <span class="input-group-text"><i class="icon ion-search tx-18 lh-0 op-6"></i></span>
              </div>
            </div><!-- input-group -->
          </div>

          <div class="btn-group hidden-xs-down" role="group" aria-label="Basic example">
            <!-- <button type="button" class="btn btn-third"><i class="icon typcn typcn-document-text tx-24"></i></button> -->
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
                <th class="wd-10p">On-board Date/Time</th>
                <th class="wd-10p">Complete Date/Time</th>
                <th class="wd-20p">Job Event</th>
                <th class="wd-10p">Voucher No.</th>
                <th class="wd-15p">Pilot Assigned</th>
                <th class="wd-30p">Remarks</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach ($jobsPilotage as $p) :
              ?>
              <tr>
                <td></td>
                <td><?php echo $no;?></td>
                <td><?php echo $p->pil_code;?></td>
                <td>
                  <?php
                    if ($p->pil_status == "In-coming") {
                        echo '<i class="icon ion-checkmark tx-primary pd-r-10"></i>';
                    } else if ($p->pil_status == "On-Board") {
                        echo '<i class="icon ion-checkmark tx-warning pd-r-10"></i>';
                    } else if ($p->pil_status == "Completed") {
                        echo '<i class="icon ion-checkmark tx-success pd-r-10"></i>';
                    }
                    echo $p->pil_status;
                  ?>
                </td>
                <td class="dropdown hidden-xs-down">
                  <a href="#" data-toggle="dropdown" class="tx-gray-600 hover-info"><i class="icon ion-add tx-22"></i>
                  <?php echo $p->ship_name;?></a>
                  <div class="dropdown-menu dropdown-menu-left pd-x-15">
                    <div class="d-flex justify-content-between bd-b pd-y-5 align-items-center">
                      <div class="tx-capitalize">Type</div>
                      <div class="tx-capitalize"><?php echo $p->ship_type;?></div>
                    </div>
                    <div class="d-flex justify-content-between bd-b pd-y-5 align-items-center">
                      <div class="tx-capitalize">LOA</div>
                      <div class="tx-capitalize"><?php echo $p->ship_LOA;?> m</div>
                    </div>
                    <div class="d-flex justify-content-between pd-y-5 align-items-center">
                      <div class="tx-capitalize">DWT</div>
                      <div class="tx-capitalize"><?php echo $p->ship_DWT;?> t</div>
                    </div>
                  </div><!-- dropdown-menu -->
                </td>
                <td><?php echo date('d M Y, H:i A', strtotime($p->pil_onboard_date.$p->pil_onboard_time)); ?></td>
                <td><?php if($p->pil_complete_date != '') { echo date('d M Y, H:i A', strtotime($p->pil_complete_date.$p->pil_complete_time)); } else { echo '-'; } ?></td>
                <td><?php echo $p->pil_event;?></td>
                <td><?php echo ($p->pil_voucher_code != '') ? $p->pil_voucher_code : '-' ;?></td>
                <td><a href="<?php echo env('BASE_URL');?>view-profile/<?php echo $p->usr_id;?>"><?php echo $p->usr_firstname.' '. $p->usr_lastname;?></a></td>
                <td><?php echo $p->pil_remark;?></td>

              </tr>
              <?php
              $no = $no + 1;
              endforeach;
              ?>
            </tbody>
          </table>
        </div><!-- table-wrapper -->
      </div><!-- card-body -->
    </div><!-- card -->
  </div><!-- br-pagebody -->
</div><!-- br-mainpanel -->


<div id="welcome" class="modal fade">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content tx-size-sm">
          <div class="modal-header pd-x-20">
              <span class="logged-name pd-l-10 hidden-md-down">Have a great branded day, <?php echo $user->usr_firstname.' '.$user->usr_lastname;?>!</span>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body-2 bg-success">
            <div class="tx-white tx-center pd-t-30 pd-b-20">
                <div class="tx-sm-24 tx-roboto tx-medium tx-uppercase pd-b-30 lh-1">Monaa 1.0 is now up & running!
                </div>
                <div class="mg-b-10 pd-xs-10 pd-x-60">Monaa is officially come into operation effectively on July 2019. Starting with 1.0 version, there will be a 2nd phase of the development with an additional modules and integrations for the better assets and POAC management. Should you have any problems, please feel free to chat with our support at the login page. Gracias!
                </div>
            </div>
            <div class="tx-center pd-t-25 hidden-xs-down"><img class="wd-700" src="img/WelcomeMonaa.png"></img></div>

          </div><!-- modal-body -->
        </div>
      </div><!-- modal-dialog -->
    </div><!-- modal -->

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div id="myModal" class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Welcome Message</h4>
      </div>
      <div class="modal-body">
        <p>Your Message Goes here and you only get to see it once!</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

@stop

@section('docready')
<script type="text/javascript">
$(function(){
  'use strict';

  new Morris.Bar({
    element: 'morrisBar1',
    data: [
      // { y: '2006', a: 100, b: 90 },
      // { y: '2007', a: 75,  b: 65 },
      // { y: '2008', a: 50,  b: 40 },
      // { y: '2009', a: 75,  b: 65 },
      // { y: '2010', a: 50,  b: 40 },
      <?php echo $strStsRevenue;?>
    ],
    xkey: 'y',
    ykeys: ['a', 'b'],
    labels: ['STS', 'Pilotage'],
    barColors: ['#188595', '#4bbec1'],
    // gridTextColor: '#868ba1',
    gridTextSize: 13,
    hideHover: 'auto',
    resize: true
  });

  new Morris.Bar({
    element: 'morrisBar2',
    data: [
      // { y: 'January', a: 38, b: 20 },
      // { y: 'February', a: 25,  b: 18 },
      // { y: 'March', a: 30,  b: 10 },
      // { y: 'April', a: 42,  b: 12 },
      // { y: 'May', a: 28,  b: 10 },
      // { y: 'June', a: 22,  b: 17 },
      <?php echo $strJobStatistic;?>
    ],
    xkey: 'y',
    ykeys: ['a', 'b'],
    labels: ['STS', 'Pilotage'],
    barColors: ['#188595', '#4bbec1'],
    stacked: true,
    gridTextSize: 13,
    hideHover: 'auto',
    resize: true
  });
});
 // Popup
$(document).ready(function () {
    $("#delCookie").click(function(){
        del_cookie("cookie");
    });

    console.log(document.cookie);
    var visit = getCookie("cookie");
    if (visit == null) {
        $("#welcome").modal("show");
        var expire = new Date();
        expire = new Date(expire.getTime() + 7776000000);
        document.cookie = "cookie=here; expires=" + expire;
    }
});

function del_cookie(name)
{
    document.cookie = name + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
}
function getCookie(c_name) {
    var c_value = document.cookie;
    var c_start = c_value.indexOf(" " + c_name + "=");
    if (c_start == -1) {
        c_start = c_value.indexOf(c_name + "=");
    }
    if (c_start == -1) {
        c_value = null;
    } else {
        c_start = c_value.indexOf("=", c_start) + 1;
        var c_end = c_value.indexOf(";", c_start);
        if (c_end == -1) {
            c_end = c_value.length;
        }
        c_value = unescape(c_value.substring(c_start, c_end));
    }
    return c_value;
}
</script>
@stop
