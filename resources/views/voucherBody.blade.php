<div class="card bd-0 shadow-base">
  <div class="card-header bg-transparent pd-x-25 pd-y-25 d-flex justify-content-between align-items-center">
    <div class="form-layout-footer hidden-xs-down">
      <?php
      if ($user->usr_role == "AD"){

        if ($voucher->vou_status == "Unverified") {
          echo '<a href="#" class="btn btn-info" data-toggle="modal" data-target="#verifyalert" id="modalVerify" data-id="'.$voucher->vou_id.'">Verify</a>';
        } else if ($voucher->vou_status == "Verified") {
          echo '<div class="card-title tx-success mg-b-0"><i class="icon ion-checkmark tx-success tx-24 pd-r-10"></i>Verified</div>';
        }
      } else if($user->usr_role == "CP") {

        if ($voucher->vou_status == "Verified") {
          echo '<h3 class="tx-success">Verified</h3>';
        } else if ($voucher->vou_status == "Unverified") {
          echo '<h3 class="tx-danger">Unverified</h3>';
        }
      }
      ?>

    </div>
    <div class="btn-group" role="group" aria-label="Basic example">
      <span data-toggle="tooltip" data-placement="top" title="Delete">
        <button type="button" class="btn btn-third" data-toggle="modal" data-target="#deletealert" id="deleteVoucherId" vou_id="<?php echo $voucher->vou_id;?>">
          <i class="icon typcn typcn-trash tx-24"></i>
        </button>
      </span>
      <!-- <button type="button" class="btn btn-third"><i class="icon typcn typcn-edit tx-24"></i></button> -->
      <a href="<?php echo env('BASE_URL');?>pdf-voucher-detail/<?php echo $voucher->vou_id;?>"
        class="btn btn-third" data-toggle="tooltip" data-placement="top" title="PDF"><i class="icon typcn typcn-document-text tx-24"></i></a>
        <a target="_blank" href="<?php echo env('BASE_URL');?>print-voucher-detail/<?php echo $voucher->vou_id;?>"
          class="btn btn-third" data-toggle="tooltip" data-placement="top" title="Print"><i class="icon typcn typcn-printer tx-24"></i></a>
    </div>
  </div><!-- card-header -->
  <div class="card-body pd-30 pd-md-30">
    <div class="d-md-flex justify-content-between flex-row-reverse">
      <h2 class="mg-b-0 tx-capitalize tx-gray-400 tx-medium">Service Voucher</h2>
    </div><!-- d-flex -->

    <div class="row mg-t-40">
      <div class="col-md-3">
        <label class="tx-uppercase tx-14 tx-medium mg-b-20">STS Operator</label>
        <h6 class="tx-inverse"><?php echo $operator->sts_name;?></h6>
        <p class="lh-7"><?php echo $operator->sts_address;?></p>
      </div><!-- col -->
      <div class="col-md-3">
        <label class="tx-uppercase tx-14 tx-medium mg-b-20">STS Service Provider</label>
        <h6 class="tx-inverse"><?php echo $provider->sts_name;?></h6>
        <p class="lh-7"><?php echo $provider->sts_address;?></p>
      </div>
      <div class="col-md-6">
        <div class="table-responsive">
          <table class="table">
            <tbody>
              <tr>
                <td class="tx-left">Service Voucher No.</td>
                <td class="tx-right"><?php echo $voucher->vou_code;?></td>
              </tr>
              <tr>
                <td class="tx-left">Job Assigned</td>
                <td class="tx-right"><?php echo $voucher->job_code;?></td>
              </tr>
              <tr>
                <td class="tx-left">Issued Date</td>
                <td class="tx-right"><?php echo date('d M Y', strtotime($voucher->vou_date));?></td>
              </tr>
              <tr>
                <td class="tx-left">Job Scope</td>
                <td class="tx-right"><?php echo $voucher->vou_type;?></td>
              </tr>
            </tbody>
          </table>
        </div><!-- table-responsive -->
      </div><!-- row -->
    </div><!-- row -->

    <div class="row mg-t-20">
      <div class="col-md-6">
        <div class="bd bd-gray-300 rounded table-responsive">
          <table class="table">
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
          <table class="table">
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
        <h6 class="tx-inverse"><?php echo $provider->sts_name;?></h6>
        <p class="lh-7">
          <?php echo $provider->sts_address;?>
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
                <td class="wd-30p tx-right"><?php echo $agent->usr_firstname.' '.$agent->usr_lastname;?></td>
              </tr>
            </tbody>
          </table>
        </div><!-- table-responsive -->
        <div class="mg-t-20 mg-md-t-0">
          <div class="card card-body bg-gray-200 bd-0">
            <p class="card-text">Note : Vessel are at all time Master's command and responsibility. The presence of Advisor/Pilot/Mooring Master are deemed on as servant of the master for his local knowledge, expertise, experience and shall not be liable for any losses, damages and claims cause by any act omission or default during engagement.</p>
          </div><!-- card -->
        </div><!-- col -->
      </div><!-- col -->
    </div><!-- row -->
  </div><!-- card-body -->
</div><!-- card -->
<script>
$('[data-toggle="tooltip"]').tooltip()
</script>
