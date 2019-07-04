@extends('layouts.master')

@section('content')
<div class="br-mainpanel">
  <div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
      <a class="breadcrumb-item" href="#">Data Assets</a>
      <span class="breadcrumb-item active">Job Items Description</span>
    </nav>
  </div><!-- br-pageheader -->
  <div class="br-pagetitle">
    <i class="icon typcn typcn-shopping-bag tx-24"></i>
    <div>
      <h4 class="pd-y-15">Job Items Description</h4>
      <!-- <p class="mg-b-0">Overview And Summary Of Current Projects</p> -->
    </div>
  </div><!-- d-flex -->

  <div class="br-pagebody pd-x-20 pd-sm-x-30 pd-b-40">
    <div class="row row-sm mg-t-20">
      <div class="col-lg mg-t-20 mg-lg-t-0">
        <div class="card shadow-base bd-0">
          <form method="post" action="<?php echo env('BASE_URL');?>do-add-job-items" data-parsley-validate>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <!-- <div class="card-header-02 bg-transparent pd-x-25 pd-t-25 pd-b-0 d-flex justify-content-between align-items-center">
              <div class="form-layout-footer mg-l-auto hidden-xs-down">
                <button type="submit" class="btn btn-info">Save</button>
              </div>
            </div> -->

            <div class="card-body color-gray-lighter pd-t-0">
              <div class="row row-sm mg-t-20">
                <div class="col-lg mg-t-20 mg-lg-t-0">
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
                          <tr id="addRow">
                            <td class="bd-t-0-force"><input class="form-control addMain" type="text" placeholder="Insert Item"</td>
                            <td class="bd-t-0-force"><input class="form-control addPrefer" type="text" placeholder="Insert Description"></td>
                            <td class="tx-center bd-t-0-force">
                              <span class="addBtn tx-teal tx-24 tx-primary">
                                <i class="icon typcn typcn-plus"></i>
                              </span>
                            </td>
                          </tr>
                          <?php
                          foreach ($items as $i):
                          ?>
                          <tr>
                            <td><input class="form-control tx-uppercase bd-transparent" type="text" value="<?php echo $i->item_name;?>"></td>
                            <td><input class="form-control bd-transparent" type="text" value="<?php echo $i->item_desc;?>"></td>
                            <td class="tx-center">
                              <!-- <a href="#" onClick="deleteRow(this)" class="tx-teal tx-24 tx-primary  tx-bold"><i class="icon typcn typcn-trash"></i></a> -->
                            </td>
                          </tr>
                          <?php
                          endforeach;
                          ?>
                        </tbody>
                      </table>
                    </div><!-- bd -->
                  </div><!-- card -->
                </div><!-- col-6 -->
              </div><!-- row -->
            </div><!-- card-body -->
            <div class="modal-footer">
              <button type="submit" class="btn btn-info">Save</button>
              <button type="reset" class="btn btn-secondary">Reset</button>
            </div><!-- form-layout-footer -->
          </form>
        </div><!-- card -->
      </div><!-- col-6 -->
    </div><!-- row -->
  </div><!-- br-pagebody -->

</div><!-- br-mainpanel -->

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
        <div class="tx-success tx-uppercase tx-spacing-1 tx-medium tx-18">Are you sure?</div>
        <p class="mg-b-30 mg-x-20">You will not be able to recover this message!</p>
        <a href="" class="btn btn-info"  data-dismiss="modal" aria-label="Close">Yes, Confirm</a>
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

    });
</script>
@stop
