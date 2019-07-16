@extends('layouts.master')

@section('content')
<div class="br-chatpanel">
  <div class="br-chatpanel-left">
        <div class="br-chatlist">
          <?php
          $no = 1;
          foreach ($jobs as $j) :

            //set select untuk 1st voucher je
            if ($no==1) {
              $firstSelected = " selected";
            } else {
              $firstSelected = "";
            }
          ?>
          <div class="media jobList <?php echo $firstSelected;?>" id="jobListId<?php echo $j->pil_id;?>" style="cursor: pointer;"
            jobId="<?php echo $j->pil_id;?>" jobCode="<?php echo $j->pil_code;?>" ship="<?php echo $j->pil_piloting_ship;?>">
            <div class="media-body">
              <div class="media-contact-name">
                <span>
                  <?php echo $j->pil_code;?>
                </span>
                <span><?php echo date('d M Y', strtotime($j->pil_onboard_date));?></span>

              </div>
            </div><!-- media-body -->
          </div><!-- media -->
          <?php
          $no = $no + 1;
          endforeach;

          if ($jobs->isEmpty()) { ?>
            <!-- echo '<span class="alert alert-warning">No data available in table</span>'; -->
            <br>
            <div class="col-xl-12">
              <div class="alert alert-dark" role="alert">
                <div class="d-flex align-items-center justify-content-start pd-y-5">
              <i class="fa fa-exclamation-triangle tx-24 mg-t-5 mg-xs-t-0"></i>
              <span class="tx-14 pd-l-15">No vouchers submitted</span>
            </div><!-- d-flex -->
              </div>
            </div>
          <?php } ?>
        </div><!-- br-chatlist -->


  </div><!-- br-chatpanel-left -->

  <?php if (!empty($firstJobs)) { ?>
  <div class="br-chatpanel-body">
    <div class="br-pagetitle">
      <i class="icon typcn typcn-document-text tx-24"></i>
      <div>
        <h4 class="pd-y-15">Submit Pilotage Vouchers</h4>
        <!-- <p class="mg-b-0">Summary Of Contracted Service Vouchers Record</p> -->
      </div>
    </div><!-- d-flex -->


    <div class="br-pagebody pd-x-20 pd-sm-x-30 pd-b-20" id="voucherBody">
      <!-- ////////////////// -->
      <div class="card shadow-base bd-0">
        <div class="bg-transparent pd-x-25 pd-t-25 pd-b-0 d-flex justify-content-between align-items-center">
          <div class="mg-b-0 pd-l-5">
            <div class="card-title mg-b-0">

            </div>
          </div><!-- form-group -->
          <div class="tx-medium tx-uppercase pd-r-10">
            <span id="DisplayVoucherCode">
                Job Code : <a class="tx-gray-500" href="<?php echo env('BASE_URL');?>jobinfo-pilotage/<?php echo $firstJobs->pil_id;?>" ><?php echo $firstJobs->pil_code;?></a>
            </span>
          </div>
        </div>

        <form method="post" action="<?php echo env('BASE_URL');?>do-submit-voucher-pilotage" data-parsley-validate data-parsley-errors-messages-disabled id="selectForm-voucher">
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
                            <td>Voucher Code : <span class="tx-success">*</span></td>
                            <td><input class="form-control" type="number" name="vou_code" id="vou_code" value="" style="width: 100%" placeholder="Insert Voucher Code" required></td>
                          </tr>
                          <tr>
                            <td>Job Code</td>
                            <td>
                              <input class="form-control bd-transparent" type="text" id="displayJobCode" value="<?php echo $firstJobs->pil_code;?>" disabled></td>
                          </tr>
                          <tr>
                            <td>Issued Date : <span class="tx-success">*</span></td>
                            <td><div class="input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <i class="icon ion-calendar tx-16 lh-0 op-6"></i>
                                </div>
                              </div>
                              <input id="date-01" type="text" name="vou_date" class="form-control" placeholder="MM/DD/YYYY" value="" required>
                            </div></td>
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
                          <th class="wd-60p">Desc</th>
                          <th class="wd-2p">Action</th>
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
                              <select id="addjob_item" class="form-control select2-show-search addPrefer"  style="width: 100%" placeholder="Choose one" data-parsley-class-handler="#slWrapper03" data-parsley-errors-container="#slErrorContainer" required>
                                <option>Choose One</option>
                                <?php foreach ($jobItems as $j) : ?>
                                  <option value="<?php echo $j->item_name;?>"><?php echo $j->item_name;?></option>
                                <?php endforeach;?>
                              </select>
                            </div>
                          </td>
                          <td class="tx-center">
                            <a href="#add" class="addBtn tx-teal tx-24 tx-primary">
                              <i class="icon typcn typcn-plus"></i>
                            </a>
                          </td>
                        </tr>
                        <tr>
                          <td>Advisor / Pilot / Mooring Master : <span class="tx-success">*</span></td>
                          <td>
                            <div id="slWrapper04" class="parsley-select">
                            <select class="form-control select2-show-search" style="width: 100%" data-placeholder="Choose one (with searchbox)" name="vou_master" data-parsley-class-handler="#slWrapper04" data-parsley-errors-container="#slErrorContainer" required>
                            <option>Choose One</option>
                            <?php foreach ($users as $u) : ?>
                              <option value="<?php echo $u->usr_id;?>"><?php echo $u->usr_firstname.' '.$u->usr_lastname;?></option>
                            <?php endforeach;?>
                          </select>
                          </div>
                        </td>
                        </tr>
                        <tr>
                          <td>Vessel's Master Agent : <span class="tx-success">*</span></td>
                          <td>
                            <div id="slWrapper05" class="parsley-select">
                              <input class="form-control" type="text" name="vou_agent" id="vou_agent" value="" style="width: 100%" placeholder="Insert Vessel's Master Agent" required>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>Remarks</td>
                          <td><textarea rows="2" class="form-control" placeholder="Note" name="vou_remark" value=""></textarea></td>
                        </tr>
                      </tbody>
                    </table>
                  </div><!-- bd -->
                </div><!-- card -->
              </div><!-- col-6 -->
            </div><!-- row -->
          </div><!-- card-body -->
          <div class="modal-footer">
              <input type="hidden" name="vou_job_id" id="displayJobId" value="<?php echo $firstJobs->pil_id;?>">
              <input type="hidden" name="vou_ship" id="vou_ship" value="<?php echo $firstJobs->pil_piloting_ship;?>">
              <button type="submit" class="btn btn-info">Submit Voucher</button>
              <button id="reset" type="reset" class="btn btn-secondary">Reset</button>
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

      $('.jobList').on('click', function(){

        // $("#displayScopeBerthing").hide();
        // $("#displayScopeUnberthing").hide();
        // $("#displayScopeBoth").hide();

        var jobId = $(this).attr('jobId');
        var jobCode = $(this).attr('jobCode');
        var scope = $(this).attr('scope');
        var ship = $(this).attr('ship');

        $('.jobList').removeClass("selected")
        $('#jobListId'+jobId).addClass("selected")

        $("#voucherBody").hide();
        $("#voucherBody").fadeIn();

        // alert(voucherId);
        $('#DisplayVoucherCode').html(' Job Code : <a class="tx-gray-500" href="<?php echo env('BASE_URL');?>jobinfo-pilotage/'+jobId+'" >'+jobCode+'</a>');
        $('#displayJobCode').val(jobCode);
        $('#displayJobId').val(jobId);
        $('#vou_ship').val(ship);
        // alert(scope);
        // $('#displayScope').val(scope);
        // $('#voucherBody').load('<?php #echo env('BASE_URL');?>get-voucher-form-body-pilotage');

      })

      $(document).on("click", "#modalVerify", function () {
           var vou_id = $(this).data('id');
           // alert(vou_id);
           $("#modalDisplayVoucherId").val( vou_id );

      });

      $(document).on("change", "#vou_code", function () {
           var vou_code = $('#vou_code').val();

           $.ajax({
               type: "GET",
               url: "<?php echo env('BASE_URL');?>do-check-code/pilotagevoucher?code=" + vou_code,
               beforeSend: function (xhr) {
                   var token = $('meta[name="csrf_token"]').attr('content');
                   if (token) {
                       return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                   }
               },
               success: function (msg) {
                 if (msg == "available") {
                   toastr.success('Voucher Code <strong>'+vou_code+'</strong> is available.')
                 } else if (msg == "notavailable") {
                   toastr.error('Voucher Code <strong>'+vou_code+'</strong> already existed. Please use another.')
                   $('#vou_code').val('');
                 }
               }
           });
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
