@extends('layouts.master')

@section('content')
<div class="br-mainpanel">
  <div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
      <a class="breadcrumb-item" href="#">Dashboard</a>
      <span class="breadcrumb-item active">Notice Board</span>
    </nav>
  </div><!-- br-pageheader -->
  <div class="br-pagetitle">
    <i class="icon typcn typcn-th-large-outline tx-24"></i>
    <div>
      <h4 class="pd-y-15">Notice Board</h4>
      <!-- <p class="mg-b-0">Announcements And Notice Board</p> -->
    </div>
  </div><!-- d-flex -->

  <div class="br-pagebody pd-x-20 pd-sm-x-30">
    <div class="card shadow-base bd-0 mg-t-20">
      <div class="card">
        <div class="card-header">
          <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
              <a class="nav-link active" href="#t01" data-toggle="tab">Announcements</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#t02" data-toggle="tab">Support</a>
            </li>
          </ul>
        </div><!-- card-header -->

        <div class="card-body color-gray-lighter">
          <div class="tab-content">
            <div class="tab-pane active" id="t01">
              <div class="form-layout-footer mg-l-auto hidden-xs-down tx-right">
                <a href="" class="btn btn-info" data-toggle="modal" data-target="#modalCompose">Compose</a>
              </div>
              <div class="table-wrapper pd-t-20">
                <table id="datatable2" class="table display responsive nowrap" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th class="wd-5p">No.</th>
                      <th class="wd-60p">Subject</th>
                      <th class="wd-10p">Sender</th>
                      <th class="wd-10p">Date</th>
                      <th class="wd-5p">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach ($notice as $n) :
                     ?>
                    <tr>
                      <td><?php echo $no;?></td>
                      <td><a href="#" class="tx-normal notice" data-id="<?php echo $n->notice_id;?>" data-toggle="modal" data-target="#readNotice"><?php echo $n->notice_subject;?></a></td>
                      <td><?php echo $n->usr_firstname.' '.$n->usr_lastname;?></td>
                      <td><?php echo date('d M Y', strtotime($n->notice_created)); ?></td>
                      <td><a href="" class="tx-teal tx-24 tx-primary deleteNotice" data-id="<?php echo $n->notice_id;?>" data-toggle="modal" data-target="#deletealert"><i class="icon typcn typcn-trash"></i></a></td>
                    </tr>
                    <?php
                    $no = $no + 1;
                    endforeach;
                    ?>
                  </tbody>
                </table>
              </div><!-- table-wrapper -->
            </div><!-- tab-pane -->
            <div class="tab-pane" id="t02">
              <div class="card bd-0 shadow-base">
                <table class="table mg-b-0 table-contact">
                  <thead>
                    <tr>
                      <th class="tx-medium">Name</th>
                      <th class="wd-5p hidden-xs-down"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <div class="d-flex align-items-center">
                          <div class="tx-inverse">Irwanshah Hanafiah</div>
                        </div>
                      </td>
                      <td class="valign-middle hidden-xs-down tx-right">irwan@artidexdna.com</td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex align-items-center">
                          <div class="tx-inverse">Syahrun Sulaiman</div>
                        </div>
                      </td>
                      <td class="valign-middle hidden-xs-down tx-right">syahrun@artifexdna.com</td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex align-items-center">
                          <div class="tx-inverse">Siti Hasmizah</div>
                        </div>
                      </td>
                      <td class="valign-middle hidden-xs-down tx-right">mija@artifexdna.com</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div><!-- tab-pane -->
          </div><!-- tab-content -->
        </div><!-- card-body -->
      </div><!-- card -->
    </div><!-- card -->
  </div><!-- br-pagebody -->
</div><!-- br-mainpanel -->

<!-- MODAL ALERT MESSAGE -->
<div id="readNotice" class="modal fade" >
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content tx-size-sm">
      <div class="modal-body  pd-y-20 pd-x-20">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

        <span id="displayNotice">

        </span>
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
        <form method="post" action="<?php echo env('BASE_URL');?>do-delete-notice" data-parsley-validate data-parsley-errors-messages-disabled>
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="noticeId" id="noticeId">
          <div class="tx-success tx-uppercase tx-spacing-1 tx-medium tx-18">Are you sure?</div>
          <p class="mg-b-30 mg-x-20">You will not be able to recover this message!</p>
          <button class="btn btn-info">Yes, Confirm</button>
        </form>
      </div><!-- modal-body -->
    </div><!-- modal-content -->
  </div><!-- modal-dialog -->
</div><!-- modal -->

<div id="modalCompose" class="modal fade">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content tx-size-sm">
      <form method="post" action="<?php echo env('BASE_URL');?>do-add-notice" data-parsley-validate data-parsley-errors-messages-disabled>
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="modal-header pd-x-20">
        <h6 class="tx-14 mg-b-0 tx-capitalize tx-inverse tx-medium">Compose</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body pd-20">
        <div class="form-group">
          <div class="input-group">
            <input type="text" name="notice_subject" class="form-control" placeholder="Insert Announcement Subject">
          </div><!-- input-group -->
        </div><!-- form-group -->
        <textarea id="summernote" name="notice_content"></textarea>
      </div><!-- modal-body -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-info">Submit</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
    </form>
    </div>
  </div><!-- modal-dialog -->
</div><!-- modal -->

@stop

@section('docready')
<script>
  $(function(){
    'use strict';

    $('#datatable2').DataTable({
      bLengthChange: false,
      pageLength: 5,
      searching: false,
      sorting: false,
      responsive: true
    });
    // Summernote editor
    $('#summernote').summernote({
      height: 150,
      tooltip: false
    })

    $('.notice').on('click', function(){
      var noticeId = $(this).attr('data-id');
      $('#displayNotice').load('<?php echo env('BASE_URL');?>get-notice-body/'+noticeId);
      // alert(noticeId);
    })

    $('.deleteNotice').on('click', function(){
      var noticeId = $(this).attr('data-id');
      $('#noticeId').val(noticeId);
      // alert(noticeId);
    })

  });
</script>
<script type="text/javascript">
    jQuery(document).ready(function () {

      <?php if(session()->has('success')){?>
        toastr.success('<?php echo session()->get('success'); ?>')
      <?php } ?>

    });
</script>
@stop
