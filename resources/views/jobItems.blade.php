@extends('layouts.master')

@section('content')
<div class="br-mainpanel">
  <div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
      <a class="breadcrumb-item" href="#">Data Assets</a>
      <span class="breadcrumb-item active">Job Item Description</span>
    </nav>
  </div><!-- br-pageheader -->
  <div class="br-pagetitle hidden-xs-down">
    <i class="icon typcn typcn-shopping-bag tx-24"></i>
    <div>
      <h4 class="pd-y-15">Job Item Description</h4>
      <!-- <p class="mg-b-0">Overview And Summary Of Current Projects</p> -->
    </div>
  </div><!-- d-flex -->

  <div class="br-pagebody pd-x-20 pd-sm-x-30 pd-b-25">
    <div class="row row-sm mg-t-20">
      <div class="col-lg mg-lg-t-0">
        <div class="card shadow-base bd-0">

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
                        <thead>
                          <tr>
                            <th class="wd-30p">Job Item</th>
                            <th>Description</th>
                            <th class="wd-15p">Status</th>
                            <th class="wd-5p">Action</th>
                          </tr>
                        </thead>
                          <tr id="addRow">
                            <td class="bd-t-1-force"><input class="form-control" type="text" id="inputItem" placeholder="Insert Item"</td>
                            <td class="bd-t-1-force"><input class="form-control" type="text" id="inputDesc" placeholder="Insert Description"></td>
                            <td class="bd-t-1-force"></td>
                            <td class="tx-center bd-t-1-force">
                              <a href="#" id="addJobItem" class="tx-teal tx-24 tx-primary">
                                <i class="icon typcn typcn-plus"></i>
                              </a>
                            </td>
                          </tr>
                        <tbody id="displayContent">
                          <?php
                          #foreach ($items as $i):
                          ?>
                          <!-- <tr>
                            <td><input class="form-control tx-uppercase bd-transparent" type="text" value="<?php #echo $i->item_name;?>"></td>
                            <td><input class="form-control bd-transparent" type="text" value="<?php #echo $i->item_desc;?>"></td>
                            <td class="tx-center">
                              <a href="#" onClick="deleteRow(this)" class="tx-teal tx-24 tx-primary  tx-bold"><i class="icon typcn typcn-trash"></i></a>
                            </td>
                          </tr> -->
                          <?php
                          #endforeach;
                          ?>
                        </tbody>
                      </table>
                    </div><!-- bd -->
                  </div><!-- card -->
                </div><!-- col-6 -->
              </div><!-- row -->
            </div><!-- card-body -->


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
        <p class="mg-b-30 mg-x-20">You will not be able to recover this job item!</p>
        <a href="" class="btn btn-info"  data-dismiss="modal" aria-label="Close">Yes, Confirm</a>
      </div><!-- modal-body -->
    </div><!-- modal-content -->
  </div><!-- modal-dialog -->
</div><!-- modal -->


@stop

@section('docready')
<script type="text/javascript">
    $(document).ready(function () {

      <?php if(session()->has('success')){?>
        toastr.success('<?php echo session()->get('success'); ?>')
      <?php } ?>

      //Load jobitems
      $('#displayContent').load('<?php echo env('BASE_URL');?>get-body-job-items');

      $(document).on("click", "#addJobItem", function () {

        var inputItem = $('#inputItem').val();
        var inputDesc = $('#inputDesc').val();

        if (inputItem == '' && inputDesc == '') {
          toastr.error('Both Job Item & Description are required')
        } else {

          $.ajax({
              type: "GET",
              url: "<?php #echo env('BASE_URL');?>do-add-job-items?item=" + inputItem + "&desc=" + inputDesc,
              beforeSend: function (xhr) {
                  var token = $('meta[name="csrf_token"]').attr('content');
                  if (token) {
                      return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                  }
              },
              success: function (msg) {
                  $('#displayContent').load('<?php echo env('BASE_URL');?>get-body-job-items');

                  if (msg == "Success") {
                      toastr.success('Successfully added new job item')
                  } else if (msg == "Error") {
                      toastr.error(''+ inputItem +' item already existed.')
                  }
              }
          });
        }
      });

      $(document).on("click", ".setStatusJobItems", function () {
        var ItemId = $(this).attr('ItemId');
        var act = $(this).attr('act');

        $.ajax({
            type: "GET",
            url: "<?php echo env('BASE_URL');?>do-update-status-job-item/" + ItemId + "/" + act,
            beforeSend: function (xhr) {
                var token = $('meta[name="csrf_token"]').attr('content');
                if (token) {
                    return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                }
            },
            success: function (msg) {
                $('#displayContent').load('<?php echo env('BASE_URL');?>get-body-job-items');
                toastr.success(msg)
            }
        });

      });

      $(document).on("click", ".deleteJobItems", function () {

        var deleteItemId = $(this).attr('deleteItemId');

        $.ajax({
            type: "GET",
            url: "<?php echo env('BASE_URL');?>do-delete-job-item/" + deleteItemId,
            beforeSend: function (xhr) {
                var token = $('meta[name="csrf_token"]').attr('content');
                if (token) {
                    return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                }
            },
            success: function (msg) {
                $('#displayContent').load('<?php echo env('BASE_URL');?>get-body-job-items');
                toastr.success(msg)
            }
        });


      });

    });
</script>
@stop
