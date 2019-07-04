@extends('layouts.master')

@section('content')
<div class="br-chatpanel">
  <div class="br-chatpanel-left">
    <div class="br-active-contacts">
      <div class="row">
        <div class="col-lg">
          <div class="form-group mg-b-0">
            <select id="select1" class="form-control select2" style="width:100%" data-placeholder="Choose Month">
                  <option label="Choose"></option>
                  <option value="1">January 2019</option>
                  <option value="2">February 2019</option>
                  <option value="3">March 2019</option>
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
        </div><!-- col-lg -->
      </div><!-- row -->
    </div><!-- br-active-contacts -->

    <div class="br-chatlist">
          <?php
          foreach ($vouchers as $v) :

          $statusArray = array(
            'Unverified' => 'ion-close tx-danger',
            'Verified' => 'ion-checkmark tx-success'
          );
          ?>
          <div class="media voucherList" id="voucherListId<?php echo $v->vou_id;?>" style="cursor: pointer;" voucherId="<?php echo $v->vou_id;?>" voucherCode="<?php echo $v->vou_code;?>">
            <div class="media-body">
              <div class="media-contact-name">
                <span><i class="icon <?php echo $statusArray[$v->vou_status];?> pd-r-10"></i><?php echo $v->vou_code;?></span>
                <span><?php echo date('d M Y', strtotime($v->vou_date));?></span>
              </div>
            </div><!-- media-body -->
          </div><!-- media -->
          <?php
          endforeach;
          ?>
        </div><!-- br-chatlist -->


  </div><!-- br-chatpanel-left -->
  <div class="br-chatpanel-body">
    <div class="br-pageheader">
      <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="#">Vouchers</a>
        <span class="breadcrumb-item active">Vouchers Record</span>
      </nav>
    </div><!-- br-pageheader -->
    <div class="br-pagetitle">
      <i class="icon typcn typcn-document-text tx-24"></i>
      <div>
        <h4 class="pd-y-15">Vouchers Record <span id="DisplayVoucherCode"></span></h4>
        <!-- <p class="mg-b-0">Summary Of Contracted Service Vouchers Record</p> -->
      </div>
    </div><!-- d-flex -->


    <div class="br-pagebody pd-x-20 pd-sm-x-30 pd-b-20" id="voucherBody">

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
        <form method="post" action="<?php echo env('BASE_URL');?>do-verify-voucher" data-parsley-validate data-parsley-errors-messages-disabled id="selectForm-sts">
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
        <form method="post" action="<?php echo env('BASE_URL');?>do-delete-voucher" data-parsley-validate data-parsley-errors-messages-disabled>
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="vou_id" id="deleteDisplayVoucherId">
          <div class="tx-success tx-uppercase tx-spacing-1 tx-medium tx-18">Are you sure?</div>
          <p class="mg-b-30 mg-x-20">You will not be able to recover this message!</p>
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

      $("#voucherBody").hide();

      $('.voucherList').on('click', function(){

        var voucherId = $(this).attr('voucherId');
        var voucherCode = $(this).attr('voucherCode');

        $('.voucherList').removeClass("selected")
        $('#voucherListId'+voucherId).addClass("selected")

        $("#voucherBody").hide();
        $("#voucherBody").fadeIn();

        // alert(voucherId);
        $('#DisplayVoucherCode').html('('+voucherCode+')');
        $('#voucherBody').load('<?php echo env('BASE_URL');?>get-voucher-body/'+voucherId);

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
