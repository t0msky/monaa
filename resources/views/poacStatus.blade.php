@extends('layouts.master')

@section('content')
<!--<div class="br-subleft">

  <nav class="nav br-nav-mailbox flex-column">
    <a href="" class="nav-link active"><i class="icon typcn typcn-user tx-24"></i> Display All </a>
    <a href="" class="nav-link"><i class="icon typcn typcn-user tx-24"></i> Freelancers</a>
    <a href="" class="nav-link"><i class="icon typcn typcn-user tx-24"></i> Administration</a>
    <a href="" class="nav-link"><i class="icon typcn typcn-user tx-24"></i> In-house Pilots</a>
  </nav>
</div> -->

<div class="br-contentpanel">
  <div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
      <span class="breadcrumb-item active">Operations</span>
      <span class="breadcrumb-item active">POAC Status</span>
    </nav>
  </div><!-- br-pageheader -->

  <div class="br-pagetitle hidden-xs-down">
    <i class="icon typcn typcn-briefcase tx-24"></i>
    <div>
      <h4 class="pd-y-15">Operations</h4>
    </div>
  </div><!-- d-flex -->

  <div class="br-pagebody pd-x-20 pd-sm-x-30 pd-b-40">
    <div class="card bd-0 shadow-base">
      <div class="card-header bg-transparent pd-x-25 pd-y-25 d-flex justify-content-between align-items-center">
        <div class="card-title tx-capitalize mg-b-0">POAC Status Board</div>
      </div><!-- card-header -->

      <div class="card pd-b-20">
        <div class="table-wrapper">
        <table class="table mg-b-0 table-contact display responsive nowrap" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th class="wd-2p"></th>
              <th class="wd-30p">Advisor / Pilot / Mooring Master</th>
              <th class="wd-15p hidden-xs-down">Status</th>
              <th class="wd-25p hidden-xs-down">Base Location</th>
              <th class="wd-20p hidden-xs-down">Job Assigned</th>
              <th class="wd-10p hidden-xs-down">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($poac as $p) :
            ?>
            <tr>
              <td></td>
              <td>
                <div class="d-flex align-items-center tx-14">

                  <?php if ($p['poac_pic'] != '') { ?>
                  <img src="<?php echo env('BASE_URL');?>img/pic/<?php echo $p['poac_pic'];?>" class="wd-40 rounded-circle">
                  <?php } else { ?>
                  <img src="<?php echo env('BASE_URL');?>img/default.png" class="wd-40 rounded-circle">
                  <?php } ?>
                  <div class="mg-l-15">
                    <div><?php echo $p['poac_name'];?></div>
                  </div>
                </div>
              </td>
              <td class="valign-top hidden-xs-down">
                <?php
                //tukar status job
                $status = array(
                   'In-coming' => '<span class="square-10 bg-warning mg-r-10 rounded-circle"></span>Stand-By',
                   'On-Board' => '<span class="square-10 bg-success mg-r-10 rounded-circle"></span>On-Duty'
                );
                $a = 0;
                foreach ($p['poac_job'] as $j) :
                  if ($j->job_status != "Completed"){
                    // if ($a == 0) {
                      echo $status[$j->job_status];
                      $a = $a+1;
                    // }
                    echo '<div class="">';
                  }

                endforeach;

                if ($a == 0) {
                  echo '<span class="square-10 bg-gray-500 mg-r-10 rounded-circle"></span>Off-Duty';
                }
                ?>
                <!-- <div class="card bg-success tx-white tx-center bd-0 tx-14">
                  <div class="pd-x-10 pd-y-10">On-Duty</div>
                </div> -->

              </td>
              <td class="valign-top hidden-xs-down">
                <?php
                $b = 0;
                foreach ($p['poac_job'] as $j) :
                  if ($j->job_status != "Completed"){
                    // if ($b == 0) {
                      echo $j->loc_name;
                      $b = $b+1;
                    // }
                    echo '<div class="">';
                  }

                endforeach;
                ?>
              </td>
              <td class="valign-top hidden-xs-down">
                <?php
                $c = 0;
                foreach ($p['poac_job'] as $j) :
                  if ($j->job_status != "Completed"){
                    // if($c == 0){
                      echo '<a href="'.env('BASE_URL').'jobinfo/'.$j->job_id.'" >';
                      echo $j->job_code;
                      echo '</a>';
                      $c = $c + 1;
                    // }
                    echo '<div class="">';
                  }

                endforeach;
                ?>
                <!-- <a href="">F(SCR)17-162-03/19</a> -->
              </td>
              <td class="dropdown hidden-xs-down">
                <a href="#" data-toggle="dropdown" class="pd-y-3 tx-gray-500 hover-info tx-20"><i class="icon ion-more"></i></a>
                <div class="dropdown-menu dropdown-menu-right pd-5">
                  <nav class="nav nav-style-2 flex-column">
                    <a href="<?php echo env('BASE_URL');?>view-profile/<?php echo $p['poac_id'];?>" class="nav-link">Personnel Profile</a>
                    <!-- <a href="#" class="nav-link">Send Message</a> -->
                  </nav>
                </div><!-- dropdown-menu -->
              </td>
            </tr>
            <?php
            endforeach;
            ?>
          </tbody>
        </table>
        </div><!-- table-wrapper -->
      </div><!-- card -->
    </div>
  </div><!-- br-pagebody -->
</div><!-- br-contentpanel -->
@stop

@section('docready')

@stop
