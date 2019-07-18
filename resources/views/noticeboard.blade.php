@extends('layouts.master')

@section('content')
<div class="br-mainpanel">
  <div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
      <a class="breadcrumb-item" href="#">Dashboard</a>
      <span class="breadcrumb-item active">Notice Board</span>
    </nav>
  </div><!-- br-pageheader -->
  <div class="br-pagetitle hidden-xs-down">
    <i class="icon typcn typcn-th-large-outline tx-24"></i>
    <div>
      <h4 class="pd-y-15">Notice Board</h4>
      <!-- <p class="mg-b-0">Announcements And Notice Board</p> -->
    </div>
    <?php if ($user->usr_role == "AD") { ?>
    <div class="form-layout-footer mg-l-auto hidden-xs-down tx-right">
      <a href="" class="btn btn-info" data-toggle="modal" data-target="#modalCompose"><i class="far fa-edit tx-16 mg-r-15"></i>Compose</a>
    </div>
    <?php } ?>
  </div><!-- d-flex -->

  <div class="br-pagebody pd-x-20 pd-sm-x-30">
    <div class="card shadow-base bd-0 mg-t-20">
      <div class="card-header bg-transparent pd-x-25 pd-y-25 d-flex justify-content-between align-items-center">
            <div class="card-title mg-b-0">Notice Board Inbox</div>
          </div><!-- card-header -->


        <div class="card-body color-gray-lighter">

              <div class="table-wrapper">
                <table id="datatable-notice" class="table display responsive nowrap" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th class="wd-2p"></th>
                      <th class="wd-5p">No.</th>
                      <th class="wd-60p">Subject</th>
                      <th class="wd-20p hidden-xs-down">Sender</th>
                      <th class="wd-10p hidden-xs-down">Date</th>
                      <?php if ($user->usr_role == "AD") { ?>
                      <th class="wd-5p hidden-xs-down">Actions</th>
                      <?php } ?>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach ($notice as $n) :
                     ?>
                    <tr>
                      <td></td>
                      <td><?php echo $no;?></td>
                      <td><a href="#" class="tx-normal notice" data-id="<?php echo $n->notice_id;?>" data-toggle="modal" data-target="#readNotice"><?php echo $n->notice_subject;?></a></td>
                      <td class="hidden-xs-down"><?php echo $n->usr_firstname.' '.$n->usr_lastname;?></td>
                      <td class="hidden-xs-down"><?php echo date('d M Y, H:i A', strtotime($n->notice_created)); ?></td>
                      <?php if ($user->usr_role == "AD") { ?>
                      <td class="hidden-xs-down tx-center"><a href="" class="tx-teal tx-24 tx-primary deleteNotice" data-id="<?php echo $n->notice_id;?>" data-toggle="modal" data-target="#deletealert"><i class="icon typcn typcn-trash"></i></a></td>
                      <?php } ?>
                    </tr>
                    <?php
                    $no = $no + 1;
                    endforeach;
                    ?>
                  </tbody>
                </table>
              </div><!-- table-wrapper -->

        </div><!-- card-body -->

    </div><!-- card -->
  </div><!-- br-pagebody -->
</div><!-- br-mainpanel -->

<!-- MODAL ALERT MESSAGE -->
<div id="readNotice" class="modal fade">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content tx-size-sm">
      <span id="displayNotice">

      <!-- <div class="modal-header pd-x-20">
        <h6 class="tx-14 mg-b-0 tx-capitalize tx-inverse tx-medium">Compose</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> -->
      <!-- <div class="modal-body pd-20">

      </div> -->
      </span>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div><!-- modal-dialog -->
</div><!-- modal -->

<!-- <div id="readNotice" class="modal fade" >
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content tx-size-sm">
      <div class="modal-body  pd-y-20 pd-x-20">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

        <span id="displayNotice">

        </span>
      </div>
    </div>
  </div>
</div> -->

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
            <input type="text" name="notice_subject" class="form-control" placeholder="Insert Notice Board Subject" required>
          </div><!-- input-group -->
        </div><!-- form-group -->
        <textarea id="summernote" name="notice_content" required></textarea>
      </div><!-- modal-body -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-info"><i class="far fa-paper-plane tx-16 mg-r-15"></i>Send Message</button>
        <button type="reset" class="btn btn-secondary">Reset</button>
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

    $('#datatable-notice').DataTable({
      bLengthChange: false,
      pageLength: 10,
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
