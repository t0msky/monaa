@extends('layouts.master')

@section('content')

<div class="br-mainpanel">
  <div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
      <a class="breadcrumb-item" href="#">Data Assets</a>
      <a class="breadcrumb-item" href="job-record.html">Assets</a>
      <span class="breadcrumb-item active">Vessel Info</span>
    </nav>
  </div><!-- br-pageheader -->
  <div class="br-pagetitle">
    <i class="icon typcn typcn-briefcase tx-24"></i>
    <div>
      <h4 class="pd-y-15">Vessel Info</h4>
      <!-- <p class="mg-b-0">Register New Job</p> -->
    </div>
  </div><!-- d-flex -->

  <div class="br-pagebody pd-x-20 pd-sm-x-30 pd-b-40">
    <div class="row row-sm mg-t-20 pd-b-40">
      <div class="col-lg mg-t-20 mg-lg-t-0">
        <div class="card shadow-base bd-0">
          <div class="card">
            <form method="post" action="<?php echo env('BASE_URL');?>save-ship" data-parsley-validate data-parsley-errors-messages-disabled>
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="modal-body pd-20">
                <div class="row mg-b-10">
                  <div class="col-lg-3">
                    <div class="form-group mg-b-10-force">
                      <label class="form-control-label">IMO No : </label>
                      <input class="form-control" type="text" name="ship_imo_no" value="<?php echo $ship->ship_imo_no;?>" placeholder="" required>
                    </div>
                  </div><!-- col-12 -->
                </div><!-- row -->
                <div class="row mg-b-10">
                  <div class="col-lg-3">
                    <div class="form-group mg-b-10-force">
                      <label class="form-control-label">Vessel Name : </label>
                      <input class="form-control" type="text" name="ship_name" value="<?php echo $ship->ship_name;?>" placeholder="" required>
                    </div>
                  </div><!-- col-12 -->
                </div><!-- row -->
                <div class="row mg-b-10">
                  <div class="col-lg-3">
                    <div class="form-group mg-b-10-force">
                      <label class="form-control-label">Vessel Type : </label>
                      <input class="form-control" type="text" name="ship_type" value="<?php echo $ship->ship_type;?>" placeholder="" required>
                    </div>
                  </div><!-- col-12 -->
                </div><!-- row -->
                <div class="row mg-b-10">
                  <div class="col-lg-3">
                    <div class="form-group mg-b-10-force">
                      <label class="form-control-label">Length Overall - LOA : </label>
                      <div class="input-group">
                        <input type="number" class="form-control" name="ship_LOA" value="<?php echo $ship->ship_LOA;?>" required>
                        <div class="input-group-append">
                          <span class="input-group-text">m</span>
                        </div>
                      </div><!-- input-group -->
                    </div>
                  </div><!-- col-12 -->
                </div><!-- row -->
                <div class="row mg-b-10">
                  <div class="col-lg-3">
                    <div class="form-group mg-b-10-force">
                      <label class="form-control-label">Deadweight Tonnage - DWT : </label>
                      <div class="input-group">
                        <input type="text" class="form-control" name="ship_DWT" value="<?php echo $ship->ship_DWT;?>" required>
                        <div class="input-group-append">
                          <span class="input-group-text">t</span>
                        </div>
                      </div><!-- input-group -->
                    </div>
                  </div><!-- col-12 -->
                </div><!-- row -->
              </div><!-- modal-body -->
              <div class="modal-footer">
                <input type="hidden" name="ship_id" value="<?php echo $ship->ship_id;?>">
                <button type="submit" class="btn btn-info">Save</button>
                <a href="<?php echo env('BASE_URL');?>assets" class="btn btn-secondary">Back to Assets</a>
                <button type="reset" class="btn btn-secondary">Reset</button>
              </div>
            </form>

          </div><!-- card -->
        </div><!-- card -->
      </div><!-- col-6 -->
    </div><!-- row -->
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
  });
</script>

@stop
