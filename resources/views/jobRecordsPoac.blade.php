@extends('layouts.master')

@section('content')
<div class="br-mainpanel">
  <div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
      <a class="breadcrumb-item" href="#">Operations</a>
      <span class="breadcrumb-item active">Job Records</span>
    </nav>
  </div><!-- br-pageheader -->
  <div class="br-pagetitle hidden-xs-down">
    <i class="icon typcn typcn-briefcase tx-24"></i>
    <div>
      <h4 class="pd-y-15">Operations</h4>
    </div>

  </div><!-- d-flex -->

  <div class="br-pagebody pd-x-20 pd-sm-x-30">
    <div class="card shadow-base bd-0 mg-t-20 mg-b-10">
      <div class="card-header-02 bg-transparent pd-x-25 pd-y-25 d-flex justify-content-between align-items-center">
        <div class="card-title mg-b-0">Ship-To-Ship Operations Records</div>
      </div><!-- card-header -->

      <div class="card">
        <div class="card-header">
          <ul class="nav nav-tabs card-header-tabs pd-xs-b-15">
            <li class="nav-item">
              <a class="nav-link active" href="#t01" data-toggle="tab"><i class="fa fa-caret-right tx-success mg-r-10"></i>FSU</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#t02" data-toggle="tab"><i class="fa fa-caret-right tx-success mg-r-10"></i>SPOT</a>
            </li>
          </ul>
        </div><!-- card-header -->

        <div class="card-body color-gray-lighter">
          <div class="tab-content">
            <div class="tab-pane active" id="t01">
              <div class="card-header-03 bg-transparent d-flex justify-content-between align-items-center pd-b-20">
                <div class="form-group mg-b-0">
                  <form method="post" action"<?php echo $_SERVER['PHP_SELF'];?>">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <select class="form-control select2 responsiveSelect2" style="width:250px" name="dropdownMonthYear" data-placeholder="Choose Month" onchange='this.form.submit()'>
                      <option value="<?php echo $currentMonth.' '.$currentYear;?>" <?php if($currentMonth.' '.$currentYear == $selectMonthYear){echo ' selected';}?>>
                        <?php echo $currentMonth.' '.$currentYear;?>
                      </option>
                    <?php foreach ($months as $m) : ?>
                        <option value="<?php echo $m;?>" <?php if($m == $selectMonthYear){echo ' selected';}?>><?php echo $m;?></option>
                    <?php endforeach; ?>
                    </select>
                  </form>
                </div><!-- form-group -->

                <div class="dataTables_filter mg-r-auto pd-l-20 pd-t-10 hidden-xs-down">
                  <div class="input-group">
                    <input type="text" placeholder="Search ..." id="filterbox-fsu" style="width:250px">
                    <div class="input-group-append">
                     <span class="input-group-text"><i class="icon ion-search tx-18 lh-0 op-6"></i></span>
                    </div>
                  </div><!-- input-group -->
                </div>

                <?php
                $explode = explode(' ',$selectMonthYear);
                ?>
                <div class="btn-group hidden-xs-down" role="group" aria-label="Basic example">
                  <!-- <a href="<?php #echo env('BASE_URL');?>pdf-job-records/FSU/{{$explode[0]}}/{{$explode[1]}}"
                    class="btn btn-third" data-toggle="tooltip" data-placement="top" title="PDF"><i class="icon typcn typcn-document-text tx-24"></i></a> -->
                  <a href="#" class="btn btn-third" data-toggle="tooltip" data-placement="top" title="Print"><i class="icon typcn typcn-printer tx-24"></i></a>
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
                      <th class="wd-10p">Complete Date/Time</th>
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
                      <td><a href="jobinfo-poac/<?php echo $j->job_id;?>"><?php echo $j->job_code;?></a></td>
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
                      <td><?php if($j->job_complete_date != '') { echo date('d M Y, H:i A', strtotime($j->job_complete_date.$j->job_complete_time) ); } else { echo '-'; } ?></td>
                      <td><?php echo $j->job_hour;?></td>
                      <td><?php echo ($j->job_exceeding24 != 0) ? $j->job_exceeding24 : '-';?></td>
                      <td><?php echo ($j->job_exceeding48 != 0) ? $j->job_exceeding48 : '-';?></td>
                      <td>
                        <?php
                        if ($j->job_berthing != '') {
                          echo '<a href="'.env('BASE_URL').'vouchersrecord/'.$j->vou_id_berthing.'">';
                          echo $j->job_berthing;
                          echo '</a>';
                        } else {
                          echo '-';
                        }
                        ?>
                      </td>
                      <td>
                        <?php
                        if ($j->job_unberthing != '') {
                          echo '<a href="'.env('BASE_URL').'vouchersrecord/'.$j->vou_id_unberthing.'">';
                          echo $j->job_unberthing;
                          echo '</a>';
                        } else {
                          echo '-';
                        }
                        ?>
                      </td>
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
            <div class="tab-pane" id="t02">
              <div class="card-header-03 bg-transparent d-flex justify-content-between align-items-center pd-b-20">
                <div class="form-group mg-b-0">
                  <form method="post" action"<?php echo $_SERVER['PHP_SELF'];?>">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <select class="form-control select2" style="width:250px" name="dropdownMonthYear" data-placeholder="Choose Month" onchange='this.form.submit()'>
                      <option value="<?php echo $currentMonth.' '.$currentYear;?>" <?php if($currentMonth.' '.$currentYear == $selectMonthYear){echo ' selected';}?>>
                        <?php echo $currentMonth.' '.$currentYear;?>
                      </option>
                    <?php foreach ($months as $m) : ?>
                        <option value="<?php echo $m;?>" <?php if($m == $selectMonthYear){echo ' selected';}?>><?php echo $m;?></option>
                    <?php endforeach; ?>
                    </select>
                  </form>
                </div><!-- form-group -->

                <div class="dataTables_filter mg-r-auto pd-l-20 pd-t-10 hidden-xs-down">
                  <div class="input-group">
                    <input type="text" placeholder="Search ..." id="filterbox-spot" style="width:250px">
                    <div class="input-group-append">
                     <span class="input-group-text"><i class="icon ion-search tx-18 lh-0 op-6"></i></span>
                    </div>
                  </div><!-- input-group -->
                </div>

                <div class="btn-group hidden-xs-down" role="group" aria-label="Basic example">
                  <!-- <a href="<?php #echo env('BASE_URL');?>pdf-job-records/SPOT/{{$explode[0]}}/{{$explode[1]}}"
                    class="btn btn-third" data-toggle="tooltip" data-placement="top" title="PDF"><i class="icon typcn typcn-document-text tx-24"></i></a> -->
                  <a href="#" class="btn btn-third" data-toggle="tooltip" data-placement="top" title="Print"><i class="icon typcn typcn-printer tx-24"></i></a>
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
                      <th class="wd-10p">Complete Date/Time</th>
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
                      <td><a href="jobinfo/<?php echo $j->job_id;?>"><?php echo $j->job_code;?></a></td>
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
                      <td><?php if($j->job_complete_date != '') { echo date('d M Y, H:i A', strtotime($j->job_complete_date.$j->job_complete_time)); } else { echo '-'; } ?></td>
                      <td><?php echo $j->job_hour;?></td>
                      <td><?php echo ($j->job_exceeding24 != 0) ? $j->job_exceeding24 : '-';?></td>
                      <td><?php echo ($j->job_exceeding48 != 0) ? $j->job_exceeding48 : '-';?></td>
                      <td>
                        <?php
                        if ($j->job_berthing != '') {
                          echo '<a href="'.env('BASE_URL').'vouchersrecord/'.$j->vou_id_berthing.'">';
                          echo $j->job_berthing;
                          echo '</a>';
                        } else {
                          echo '-';
                        }

                        ?>
                      </td>
                      <td>
                        <?php
                        if ($j->job_unberthing != '') {
                          echo '<a href="'.env('BASE_URL').'vouchersrecord/'.$j->vou_id_unberthing.'">';
                          echo $j->job_unberthing;
                          echo '</a>';
                        } else {
                          echo '-';
                        }
                        ?>
                      </td>
                      <td><?php echo $j->u1_firstname.' '. $j->u1_lastname;?></td>
                      <td><?php echo $j->u2_firstname.' '. $j->u2_lastname;?></td>
                      <!-- <td><?php #echo $j->u3_firstname.' '. $j->u3_lastname;?></td> -->
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
        <div class="card-title mg-b-0">Pilotage Conduct, Anchoring And Shifting Movement Records</div>
      </div><!-- card-header -->
      <div class="card-body color-gray-lighter">
        <div class="card-header-03 bg-transparent pd-b-25 d-flex justify-content-between align-items-center">
          <div class="form-group mg-b-0">
            <form method="post" action"<?php echo $_SERVER['PHP_SELF'];?>">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <select class="form-control select2" style="width:250px" name="dropdownMonthYear" data-placeholder="Choose Month" onchange='this.form.submit()'>
                <option value="<?php echo $currentMonth.' '.$currentYear;?>" <?php if($currentMonth.' '.$currentYear == $selectMonthYear){echo ' selected';}?>>
                  <?php echo $currentMonth.' '.$currentYear;?>
                </option>
              <?php foreach ($months as $m) : ?>
                  <option value="<?php echo $m;?>" <?php if($m == $selectMonthYear){echo ' selected';}?>><?php echo $m;?></option>
              <?php endforeach; ?>
              </select>
            </form>
          </div><!-- form-group -->

          <div class="dataTables_filter mg-r-auto pd-l-20 pd-t-10 hidden-xs-down">
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
                <td><a href="jobinfo-pilotage-poac/<?php echo $p->pil_id;?>"><?php echo $p->pil_code;?></a></td>
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
                <td>
                  <?php

                  if ($p->pil_voucher_code != '') {
                    echo '<a href="'.env('BASE_URL').'vouchersrecord-pilotage/'.$p->pil_voucher_id.'">';
                    echo $p->pil_voucher_code;
                    echo '</a>';
                  } else {
                    echo '-';
                  }

                  ?>
                </td>
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

    $(document).ready(function(){
        $(".responsiveSelect2").select2();
    });

    function DoSubmit(sel){
       if(sel.val()!='0') this.form.submit();
    }

    // Javascript to enable link to tab
    var url = document.location.toString();
    if (url.match('#')) {
      $('.nav-tabs a[href="#' + url.split('#')[1] + '"]').tab('show');
    }

    // Change hash for page-reload
    $('.nav-tabs a').on('shown.bs.tab', function (e) {
      window.location.hash = e.target.hash;
    })
  });
</script>
@stop
