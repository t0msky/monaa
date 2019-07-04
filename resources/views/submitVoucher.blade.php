@extends('layouts.master')

@section('content')
<div class="br-chatpanel">
  <div class="br-chatpanel-left">

        <div class="br-active-contacts">
          <div class="row">
            <div class="col-lg">
              <div class="form-group mg-b-0">
              </div><!-- form-group -->
            </div><!-- col-lg -->
          </div><!-- row -->
        </div><!-- br-active-contacts -->
        <div class="br-chatlist">

          <?php
          $no = 1;
          foreach ($jobs as $j) :

            if ($j->job_berthing != NULL) {
              $berthing = 1;
            } else {
              $berthing = 0;
            }
            if($j->job_unberthing != NULL) {
              $unberthing = 1;
            } else {
              $unberthing = 0;
            }

            if ($berthing == 1 && $unberthing == 0) {
              $act = "unberthing";
            } else if ($berthing == 0 && $unberthing == 1) {
              $act = "berthing";
            } else {
              $act = "both";
            }

            //set select untuk 1st voucher je
            if ($no==1) {
              $firstSelected = " selected";
            } else {
              $firstSelected = "";
            }
          ?>
          <div class="media jobList <?php echo $firstSelected;?>" id="jobListId<?php echo $j->job_id;?>" style="cursor: pointer;"
            jobId="<?php echo $j->job_id;?>" jobCode="<?php echo $j->job_code;?>" scope="<?php echo $act;?>" ship="<?php echo $j->job_maneuveringship;?>">
            <div class="media-body">
              <div class="media-contact-name">
                <span>
                  <?php echo $j->job_code;?>
                </span>
                <span><?php echo date('d M Y', strtotime($j->job_commence_date));?></span>

              </div>
            </div><!-- media-body -->
          </div><!-- media -->
          <?php
          $no = $no + 1;
          endforeach;
          ?>
        </div><!-- br-chatlist -->


  </div><!-- br-chatpanel-left -->

  <?php if (!empty($firstJobs)) { ?>
  <div class="br-chatpanel-body">
    <div class="br-pageheader">
      <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="#">Vouchers</a>
        <span class="breadcrumb-item active">Submit Vouchers</span>
      </nav>
    </div><!-- br-pageheader -->
    <div class="br-pagetitle">
      <i class="icon typcn typcn-document-text tx-24"></i>
      <div>
        <h4 class="pd-y-15">Vouchers Record
          <span id="DisplayVoucherCode">
            - Job Code : <a class="tx-success" href="<?php echo env('BASE_URL');?>jobinfo/<?php echo $firstJobs->job_id;?>" ><?php echo $firstJobs->job_code;?></a>

          </span>
        </h4>
        <!-- <p class="mg-b-0">Summary Of Contracted Service Vouchers Record</p> -->
      </div>
    </div><!-- d-flex -->


    <div class="br-pagebody pd-x-20 pd-sm-x-30 pd-b-20" id="voucherBody">
      <!-- ////////////////// -->
      <div class="card shadow-base bd-0">
        <div class="bg-transparent pd-x-25 pd-t-25 pd-b-0 d-flex justify-content-between align-items-center">
          <div class="mg-b-0">
                      <div class="card-title mg-b-0">
                        <?php
                          if ($j->job_berthing != NULL) {
                            #echo '<div class="tx-success">';
                            $berthing = 1;
                          } else {
                            #echo '<div class="tx-gray-400">';
                            $berthing = 0;
                          }
                          #echo 'Berthing ';
                          #echo '</div>';
                        //   echo "|";
                          if($j->job_unberthing != NULL) {
                            #echo '<div class="tx-success">';
                            $unberthing = 1;
                          } else {
                            #echo '<div class="tx-gray-400">';
                            $unberthing = 0;
                          }
                          #echo ' Unberthing';
                          #echo '</div>';
                        ?>
                        <span id="displayBethingUnberthing">
                          <?php
                            if($firstJobs->job_berthing == NULL){
                              echo '<span class="tx-gray-400">Berthing</span>';
                            } else {
                              echo '<span class="tx-success">Berthing</span>';
                            }
                            echo " | ";
                            if($firstJobs->job_unberthing == NULL){
                              echo '<span class="tx-gray-400">Unberthing</span>';
                            } else {
                              echo '<span class="tx-success">Unberthing</span>';
                            }
                          ?>
                        </span>
                      </div>
                    </div><!-- form-group -->
        </div>

        <form method="post" action="<?php echo env('BASE_URL');?>do-submit-voucher" data-parsley-validate data-parsley-errors-messages-disabled id="selectForm-voucher">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="card-body color-gray-lighter pd-t-0">
            <div class="row row-sm mg-t-20 pd-b-20">
              <div class="col-lg-12 mg-t-20 mg-lg-t-0">
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
                            <td>Voucher Code : <span class="tx-danger">*</span></td>
                            <td><input class="form-control" type="number" name="vou_code" value="" style="width: 100%" placeholder="Insert Voucher Code" required></td>
                          </tr>
                          <tr>
                            <td>Job Code</td>
                            <td>
                              <input class="form-control bd-transparent" type="text" id="displayJobCode" value="<?php echo $firstJobs->job_code;?>" disabled></td>
                          </tr>
                          <tr>
                            <td>Issued Date : <span class="tx-danger">*</span></td>
                            <td><div class="input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <i class="icon ion-calendar tx-16 lh-0 op-6"></i>
                                </div>
                              </div>
                              <input id="date-01" type="text" name="vou_date" class="form-control" value="" required>
                            </div></td>
                          </tr>
                          <tr>
                            <td>Job Scope</td>
                            <td>
                              <?php #if ($type == 1) { $t = "Berthing"; } else if ($type == 2) { $t = "Unberthing"; } ?>
                              <div id="displayScopeBerthing">
                                <select class="form-control select2" data-placeholder="Choose one" name="vou_type" required>
                                  <option value="Berthing" selected>Berthing</option>
                                </select>
                              </div>
                              <div id="displayScopeUnberthing">
                                <select class="form-control select2" data-placeholder="Choose one" name="vou_type" required>

                                  <option value="Unberthing" selected>Unberthing</option>
                                </select>
                              </div>
                              <div id="displayScopeBoth">
                                <select class="form-control select2" data-placeholder="Choose one" name="vou_type" required>
                                  <option label="Choose one" value=""></option>
                                  <option value="Berthing">Berthing</option>
                                  <option value="Unberthing">Unberthing</option>
                                </select>
                              </div>
                              <div id="displayFirstScope">
                                <select class="form-control select2" data-placeholder="Choose one" name="vou_type" required>
                                  <option label="Choose one" value=""></option>
                                  <?php if($firstJobs->job_berthing == NULL){ ?><option value="Berthing">Berthing</option><?php } ?>
                                  <?php if($firstJobs->job_unberthing == NULL){ ?><option value="Unberthing">Unberthing</option><?php } ?>
                                </select>
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div><!-- bd -->
                </div><!-- card -->
              <!-- </div>

              <div class="col-lg-6 mg-t-20 mg-lg-t-0"> -->
                <div class="card shadow-base bd-0">
                  <div class="bd-0 bd-gray-300 rounded table-responsive">
                    <table class="table mg-b-0">
                      <thead style='visibility: collapse;'>
                        <tr>
                          <th class="wd-30p">Items</th>
                          <th>Desc</th>
                          <th class="wd-5p">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <!-- <tr>
                          <td colspan=3>Job Items</td>
                        </tr> -->
                        <tr id="addRow">
                          <td>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <i class="far fa-clock tx-16 lh-0 op-6"></i>
                                </div>
                              </div>
                              <input id="time-03" type="text" class="form-control addMain" placeholder="00:00" required>
                            </div><!-- input-group -->
                          </td>
                          <td>

                            <div id="slWrapper03" class="parsley-select">
                              <select class="form-control select2-show-search addPrefer"  style="width: 100%" placeholder="Choose one" value="" data-parsley-class-handler="#slWrapper03" data-parsley-errors-container="#slErrorContainer" required>
                                <option label="Choose one" value=""></option>
                                <?php foreach ($jobItems as $j) : ?>
                                  <option value="<?php echo $j->item_name;?>"><?php echo $j->item_name;?></option>
                                <?php endforeach;?>
                              </select>
                            </div>
                          </td>
                          <td class="tx-center">

                            <span class="addBtn tx-teal tx-24 tx-primary">
                              <i class="icon typcn typcn-plus"></i>
                            </span>
                          </td>
                        </tr>
                        <tr>
                          <td>Advisor / Pilot / Mooring Master : <span class="tx-danger">*</span></td>
                          <td>
                            <div id="slWrapper04" class="parsley-select">
                            <select class="form-control select2-show-search" data-placeholder="Choose one (with searchbox)" name="vou_master" data-parsley-class-handler="#slWrapper04" data-parsley-errors-container="#slErrorContainer" required>
                            <option label="Choose one" value=""></option>
                            <?php foreach ($users as $u) : ?>
                              <option value="<?php echo $u->usr_id;?>"><?php echo $u->usr_firstname.' '.$u->usr_lastname;?></option>
                            <?php endforeach;?>
                          </select>
                          </div>
                        </td>
                        </tr>
                        <tr>
                          <td>Vessel's Master Agent : <span class="tx-danger">*</span></td>
                          <td>
                            <div id="slWrapper05" class="parsley-select">
                              <select class="form-control select2-show-search" placeholder="Choose one" name="vou_agent" data-parsley-class-handler="#slWrapper05" data-parsley-errors-container="#slErrorContainer" required>
                                <option label="Choose one"></option>
                                <?php foreach ($users as $u) : ?>
                                  <option value="<?php echo $u->usr_id;?>"><?php echo $u->usr_firstname.' '.$u->usr_lastname;?></option>
                                <?php endforeach;?>
                              </select>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>Remarks</td>
                          <td><textarea rows="1" class="form-control" placeholder="Note" name="vou_remark" value=""></textarea></td>
                        </tr>
                      </tbody>
                    </table>
                  </div><!-- bd -->
                </div><!-- card -->
              </div><!-- col-6 -->
            </div><!-- row -->
          </div><!-- card-body -->
          <div class="modal-footer">
              <input type="hidden" name="vou_job_id" id="displayJobId" value="<?php echo $firstJobs->job_id;?>">
              <input type="hidden" name="vou_ship" id="vou_ship" value="<?php echo $firstJobs->job_maneuveringship;?>">
              <button type="submit" class="btn btn-info">Submit Voucher</button>
            </div><!-- form-layout-footer -->
        </form>
      </div><!-- card -->

      <!-- ////////////////// -->
    </div><!-- br-pagebody -->
  </div><!-- br-chatpanel-body -->
  <?php } ?>
</div><!-- br-chatpanel -->
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

      // $("#voucherBody").hide();
      $("#selectBerthing").hide();
      $("#selectUnberthing").hide();
      $("#displayScopeBerthing").hide();
      $("#displayScopeUnberthing").hide();
      $("#displayScopeBoth").hide();

      $('.jobList').on('click', function(){

        $("#displayScopeBerthing").hide();
        $("#displayScopeUnberthing").hide();
        $("#displayScopeBoth").hide();

        var jobId = $(this).attr('jobId');
        var jobCode = $(this).attr('jobCode');
        var scope = $(this).attr('scope');
        var ship = $(this).attr('ship');

        $('.jobList').removeClass("selected")
        $('#jobListId'+jobId).addClass("selected")

        $("#voucherBody").hide();
        $("#voucherBody").fadeIn();

        // alert(voucherId);
        $('#DisplayVoucherCode').html(' - Job Code : <a class="tx-success" href="<?php echo env('BASE_URL');?>jobinfo/'+jobId+'" >'+jobCode+'</a>');
        $('#displayJobCode').val(jobCode);
        $('#displayJobId').val(jobId);
        $('#vou_ship').val(ship);
        // alert(scope);
        if (scope == 'unberthing') {
          $("#displayFirstScope").hide();
          $("#displayScopeUnberthing").show();
          $("#displayBethingUnberthing").html('<span class="tx-success">Berthing</span> | <span class="tx-gray-400">Unberthing</span>');
        }
        if (scope == 'berthing') {
          $("#displayFirstScope").hide();
          $("#displayScopeBerthing").show();
          $("#displayBethingUnberthing").html('<span class="tx-gray-400">Berthing</span> | <span class="tx-success">Unberthing</span>');
        }
        if (scope == 'both') {
          $("#displayFirstScope").hide();
          $("#displayScopeBoth").show();
          $("#displayBethingUnberthing").html('<span class="tx-gray-400">Berthing</span> | <span class="tx-gray-400">Unberthing</span>');
        }
        // $('#displayScope').val(scope);
        // $('#voucherBody').load('<?php #echo env('BASE_URL');?>get-voucher-form-body');

      })

      $(document).on("click", "#modalVerify", function () {
           var vou_id = $(this).data('id');
           // alert(vou_id);
           $("#modalDisplayVoucherId").val( vou_id );

      });

      $('#date-01').datepicker({
        showOtherMonths: true,
        selectOtherMonths: true,
        numberOfMonths: 1
      });
      $('#time-03').mask('99:99');

    });
</script>

@stop
