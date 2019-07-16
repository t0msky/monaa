@extends('layouts.master')

@section('content')
<div class="br-chatpanel">
  <div class="br-chatpanel-left">
    <div class="br-active-contacts">
      <div class="row">
        <div class="col-lg">
          <div class="form-group mg-b-0">
            <form method="post" action"<?php echo $_SERVER['PHP_SELF'];?>">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <select class="form-control select2" style="width:100%" name="dropdownMonthYear" data-placeholder="Choose Month" onchange='this.form.submit()'>
                <option value="<?php echo $currentMonth.' '.$currentYear;?>" <?php if($currentMonth.' '.$currentYear == $selectMonthYear){echo ' selected';}?>>
                  <?php echo $currentMonth.' '.$currentYear;?>
                </option>
              <?php foreach ($months as $m) : ?>
                  <option value="<?php echo $m;?>" <?php if($m == $selectMonthYear){echo ' selected';}?>><?php echo $m;?></option>
              <?php endforeach; ?>
              </select>
            </form>
           </div><!-- form-group -->
        </div><!-- col-lg -->
      </div><!-- row -->
    </div><!-- br-active-contacts -->

    <div class="br-chatlist">
          <?php
          $no = 1;
          foreach ($vouchers as $v) :

            //kalau ada voucher redirect, bypass first voucher
            if ($vid != '') {
              $firstSelected = "";
              $redirectSelected = " selected";
            } else {
              //set select untuk 1st voucher je
              if ($no==1) {
                $firstSelected = " selected";
                $redirectSelected = "";
              } else {
                $firstSelected = "";
                $redirectSelected = "";
              }
            }

          $statusArray = array(
            'Unverified' => 'ion-close tx-danger',
            'Verified' => 'ion-checkmark tx-success'
          );
          ?>
          <div class="media voucherList <?php echo $firstSelected;?> <?php if($v->vou_id == $vid){ echo $redirectSelected;} ?>" id="voucherListId<?php echo $v->vou_id;?>" style="cursor: pointer;" voucherId="<?php echo $v->vou_id;?>" voucherCode="<?php echo $v->vou_code;?>">
            <div class="media-body">
              <div class="media-contact-name">
                <span><i class="icon <?php echo $statusArray[$v->vou_status];?> pd-r-10"></i><?php echo $v->vou_code;?>
                  <small><br>by <?php echo $v->usr_firstname.' '.$v->usr_lastname;?></small>
                </span>
                <span><?php echo date('d M Y', strtotime($v->vou_date));?><br>&nbsp;</span>
              </div>
            </div><!-- media-body -->
          </div><!-- media -->
          <?php
          $no = $no + 1;
          endforeach;
          // echo '<pre>'; print_r($vouchers->count() );
          if ( $vouchers->count() == 0 ) { ?>
            <!-- echo '<span class="alert alert-warning">No data available in table</span>'; -->
            <br>
            <div class="col-xl-12">
              <div class="alert alert-dark" role="alert">
                <!--<button type="button" class="close" data-dismiss="alert" aria-label="Close">-->
                <!--  <span aria-hidden="true">×</span>-->
                <!--</button>-->
                <div class="d-flex align-items-center justify-content-start pd-y-5">
                  <i class="fa fa-exclamation-triangle tx-24  mg-t-5 mg-xs-t-0"></i>
                  <span class="tx-14 pd-l-15">No vouchers submitted</span>
                </div><!-- d-flex -->
              </div>
            </div>
          <?php } ?>
        </div><!-- br-chatlist -->


  </div><!-- br-chatpanel-left -->
  <div class="br-chatpanel-body">

    <div class="br-pagetitle">
      <i class="icon typcn typcn-document-text tx-24"></i>
      <div>
        <h4 class="pd-y-15">Pilotage Voucher Records <span id="DisplayVoucherCode"></span></h4>
        <!-- <p class="mg-b-0">Summary Of Contracted Service Vouchers Record</p> -->
      </div>
    </div><!-- d-flex -->


    <div class="br-pagebody pd-x-20 pd-sm-x-30 pd-b-20" id="voucherBody">

      <?php if ( $firstVouchers ) { ?>
      <!-- /////////////////////////////// -->
      <div class="card bd-0 shadow-base">
        <div class="card-header bg-transparent pd-x-25 pd-y-25 d-flex justify-content-between align-items-center">
          <div class="form-layout-footer hidden-xs-down">
            <?php
            if ($user->usr_role == "AD"){

              if ($firstVouchers->vou_status == "Unverified") {
                echo '<a href="#" class="btn btn-info" data-toggle="modal" data-target="#verifyalert" id="modalVerify" data-id="'.$firstVouchers->vou_id.'">Verify</a>';
              } else if ($firstVouchers->vou_status == "Verified") {
                echo '<div class="card-title tx-success mg-b-0"><i class="icon ion-checkmark tx-success tx-24 pd-r-10"></i>Verified</div>';
              }
            } else if($user->usr_role == "CP") {

              if ($firstVouchers->vou_status == "Verified") {
                echo '<h3 class="tx-success">Verified</h3>';
              } else if ($firstVouchers->vou_status == "Unverified") {
                echo '<h3 class="tx-danger">Unverified</h3>';
              }
            }
            ?>

          </div>
          <div class="btn-group" role="group" aria-label="Basic example">
            <span data-toggle="tooltip-success" data-placement="top" title="Delete Voucher">
              <button type="button" class="btn btn-third" data-toggle="modal" data-target="#deletealert" id="deleteVoucherId" vou_id="<?php echo $firstVouchers->vou_id;?>">
                <i class="icon typcn typcn-trash tx-24"></i>
              </button>
            </span>
            <!-- <button type="button" class="btn btn-third"><i class="icon typcn typcn-edit tx-24"></i></button> -->
            <a href="<?php echo env('BASE_URL');?>pdf-voucher-detail/<?php echo $firstVouchers->vou_id;?>"
              class="btn btn-third" data-toggle="tooltip-success" data-placement="top" title="PDF">
              <i class="icon typcn typcn-document-text tx-24"></i></a>
            <a target="_blank" href="<?php echo env('BASE_URL');?>print-voucher-detail/<?php echo $firstVouchers->vou_id;?>"
              class="btn btn-third" data-toggle="tooltip-success" data-placement="top" title="Print"><i class="icon typcn typcn-printer tx-24"></i></a>
          </div>
        </div><!-- card-header -->
        <div class="card-body pd-30 pd-md-30">
          <div class="d-md-flex justify-content-between flex-row-reverse">
            <h2 class="mg-b-0 tx-capitalize tx-gray-400 tx-medium">Service Voucher</h2>
          </div><!-- d-flex -->

          <div class="row mg-t-40">
            <div class="col-md-3">
              <label class="tx-uppercase tx-14 tx-medium mg-b-20">STS Operator</label>
              <h6 class="tx-uppercase"><?php echo $operator->sts_name;?></h6>
              <p class="lh-7">
                <?php echo $operator->sts_address;?><br>
                <?php echo $operator->sts_address2;?><br>
                <?php echo $operator->sts_postcode;?>, <?php echo $operator->sts_state;?>, <?php echo $operator->sts_country;?>
              </p>
            </div><!-- col -->
            <div class="col-md-3">
              <label class="tx-uppercase tx-14 tx-medium mg-b-20">STS Service Provider</label>
              <h6 class="tx-uppercase"><?php echo $provider->sts_name;?></h6>
              <p class="lh-7">
                <?php echo $provider->sts_address;?><br>
                <?php echo $provider->sts_address2;?><br>
                <?php echo $provider->sts_postcode;?>, <?php echo $provider->sts_state;?>, <?php echo $provider->sts_country;?>
              </p>
            </div>
            <div class="col-md-6">
              <div class="table-responsive">
                <table class="table">
                  <tbody>
                    <tr>
                      <td class="tx-left">Service Voucher No.</td>
                      <td class="tx-right"><?php echo $firstVouchers->vou_code;?></td>
                    </tr>
                    <tr>
                      <td class="tx-left">Job Assigned</td>
                      <td class="tx-right"><?php echo $firstVouchers->pil_code;?></td>
                    </tr>
                    <tr>
                      <td class="tx-left">Issued Date</td>
                      <td class="tx-right"><?php echo date('d M Y', strtotime($firstVouchers->vou_date));?></td>
                    </tr>
                  </tbody>
                </table>
              </div><!-- table-responsive -->
            </div><!-- row -->
          </div><!-- row -->

          <div class="row pd-t-20">
            <div class="col-md-6">
              <div class="bd bd-gray-300 rounded table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th class="tx-left">Specifications</th>
                      <th class="tx-right">Vessel Description</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="tx-left">Vessel Name</td>
                      <td class="tx-right"><?php echo $ship->ship_name;?></td>
                    </tr>
                    <tr>
                      <td class="tx-left">Length Overall (m)</td>
                      <td class="tx-right"><?php echo $ship->ship_LOA;?></td>
                    </tr>
                    <tr>
                      <td class="tx-left">Draught (m)</td>
                      <td class="tx-right"><?php echo $ship->ship_DWT;?></td>
                    </tr>
                    <tr>
                      <td class="tx-left">IMO No.</td>
                      <td class="tx-right"><?php echo $ship->ship_imo_no;?></td>
                    </tr>
                  </tbody>
                </table>
              </div><!-- table-responsive -->
            </div><!-- row -->

            <div class="col-md-6">
              <div class="bd bd-gray-300 rounded table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th class="tx-left">Time (LT) HH:MM</th>
                      <th class="tx-right">Event Description</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($items as $i): ?>
                    <tr>
                      <td class="tx-left"><?php echo $i->vjob_job_item_hour;?></td>
                      <td class="tx-right tx-uppercase"><?php echo $i->vjob_job_item_name;?></td>
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div><!-- table-responsive -->
            </div><!-- row -->
          </div><!-- row -->

          <div class="row mg-t-40 mg-b-40">
            <div class="col-md-3">
              <label class="tx-uppercase tx-14 tx-medium mg-b-20">STS Service Provider</label>
              <h6 class="tx-uppercase"><?php echo $provider->sts_name;?></h6>
              <p class="lh-7">
                <?php echo $provider->sts_address;?><br>
                <?php echo $provider->sts_address2;?><br>
                <?php echo $provider->sts_postcode;?>, <?php echo $provider->sts_state;?>, <?php echo $provider->sts_country;?>
              </p>
            </div><!-- col -->
            <div class="col-md-9">
              <div class="table-responsive">
                <table class="table">
                  <tbody>
                    <tr>
                      <td class="tx-left">Advisor / Pilot / Mooring Master</td>
                      <td class="wd-30p tx-right"><?php echo $master->usr_firstname.' '.$master->usr_lastname;?></td>
                    </tr>
                    <tr>
                      <td class="tx-left">Vessel's Master Agent</td>
                      <td class="wd-30p tx-right"><?php echo $firstVouchers->vou_agent;?></td>
                    </tr>
                  </tbody>
                </table>
              </div><!-- table-responsive -->
              <div class="pd-t-30 mg-md-t-0">
                <div class="card card-body bg-gray-200 bd-0">
                  <p class="card-text">Note : Vessel are at all time Master's command and responsibility. The presence of Advisor/Pilot/Mooring Master are deemed on as servant of the master for his local knowledge, expertise, experience and shall not be liable for any losses, damages and claims cause by any act omission or default during engagement.</p>
                </div><!-- card -->
              </div><!-- col -->
            </div><!-- col -->
          </div><!-- row -->
        </div><!-- card-body -->
      </div><!-- card -->

      <!-- /////////////////////////////// -->
      <?php } ?>
    </div><!-- br-pagebody -->
  </div><!-- br-chatpanel-body -->
</div><!-- br-chatpanel -->

<div id="verifyalert" class="modal fade">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content tx-size-sm">
      <div class="modal-body tx-center pd-y-20 pd-x-20">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <!-- <i class="icon ion-ios-checkmark-outline tx-100 tx-success lh-1 mg-t-20 d-inline-block"></i> -->
        <div class="tx-center pd-l-20">
          <i class="icon ion-checkmark-circled tx-success tx-120"></i>
        </div>
        <div class="tx-success tx-uppercase tx-spacing-1 tx-medium tx-18">Verify Voucher</div>
        <form method="post" action="<?php echo env('BASE_URL');?>do-verify-voucher-pilotage" data-parsley-validate data-parsley-errors-messages-disabled id="selectForm-sts">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="vou_id" id="modalDisplayVoucherId">
          <p class="mg-b-30 mg-x-20">You are about to verify this voucher.</p>
          <button class="btn btn-info" type="submit">Yes, Confirm</button>
        </form>
      </div><!-- modal-body -->
    </div><!-- modal-content -->
  </div><!-- modal-dialog -->
</div><!-- modal -->

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
        <form method="post" action="<?php echo env('BASE_URL');?>do-delete-voucher-pilotage" data-parsley-validate data-parsley-errors-messages-disabled>
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="vou_id" id="deleteDisplayVoucherId">
          <div class="tx-success tx-uppercase tx-spacing-1 tx-medium tx-18">Are you sure?</div>
          <p class="mg-b-30 mg-x-20">You will not be able to recover this voucher!</p>
          <button class="btn btn-info">Yes, Confirm</button>
        </form>
      </div><!-- modal-body -->
    </div><!-- modal-content -->
  </div><!-- modal-dialog -->
</div><!-- modal -->


@stop

@section('docready')
<script type="text/javascript">
    jQuery(document).ready(function () {

      // $("#voucherBody").hide();

      $('.voucherList').on('click', function(){

        var voucherId = $(this).attr('voucherId');
        var voucherCode = $(this).attr('voucherCode');

        $('.voucherList').removeClass("selected")
        $('#voucherListId'+voucherId).addClass("selected")

        $("#voucherBody").hide();
        $("#voucherBody").fadeIn();

        // alert(voucherId);
        $('#DisplayVoucherCode').html('('+voucherCode+')');
        $('#voucherBody').load('<?php echo env('BASE_URL');?>get-voucher-body-pilotage/'+voucherId);

      })

      $(document).on("click", "#modalVerify", function () {
           var vou_id = $(this).data('id');
           // alert(vou_id);
           $("#modalDisplayVoucherId").val( vou_id );

      });

      $(document).on("click", "#deleteVoucherId", function () {
           var vou_id = $(this).attr('vou_id');
           // alert(vou_id);
           $("#deleteDisplayVoucherId").val( vou_id );

      });

      <?php if(session()->has('success')){?>
        toastr.success('<?php echo session()->get('success'); ?>')
      <?php } ?>

      <?php if(session()->has('error')){?>
        toastr.error('<?php echo session()->get('error'); ?>')
      <?php } ?>

    });
</script>

@stop
