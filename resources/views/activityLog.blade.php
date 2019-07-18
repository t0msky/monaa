@extends('layouts.master')

@section('content')
<div class="br-mainpanel">
  <div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
      <a class="breadcrumb-item" href="#">Dashboard</a>
      <span class="breadcrumb-item active">Activity Log</span>
    </nav>
  </div><!-- br-pageheader -->
  <div class="br-pagetitle hidden-xs-down">
    <i class="icon typcn typcn-th-large-outline tx-24"></i>
    <div>
      <h4 class="pd-y-15">Activity Log</h4>
      <!-- <p class="mg-b-0">Announcements And Notice Board</p> -->
    </div>
    <div class="form-layout-footer mg-l-auto hidden-xs-down tx-right">

     </div>
  </div><!-- d-flex -->

  <div class="br-pagebody pd-x-20 pd-sm-x-30">
    <div class="card shadow-base bd-0 mg-t-20">
      <div class="card">

        <!-- <div class="card-header">

        </div> -->

        <div class="card-body color-gray-lighters">

              <div class="card bd-0 shadow-base">
                <table class="table mg-b-0 table-contact display responsive nowrap" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th class="wd-20p">Date/Time</th>
                      <th class="wd-15p hidden-xs-down">Duration</th>
                      <?php if ($user->usr_role == "AD") { ?>
                      <th class="wd-25p hidden-xs-down">Personnels</th>
                      <?php } ?>
                      <th class="wd-40p">Activity Detail</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($logs as $l) : ?>
                    <tr>
                      <td style="font-size:95%"><?php echo date('d M Y H:i:s A', strtotime($l->log_created));?></td>
                      <td style="font-size:95%" class="hidden-xs-down"><?php echo \Carbon\Carbon::parse($l->log_created)->diffForHumans(); ?></td>
                      <?php if ($user->usr_role == "AD") { ?>
                      <td style="font-size:95%" class="hidden-xs-down">
                        <a href="<?php echo env('BASE_URL');?>view-profile/<?php echo $l->usr_id;?>"><?php echo $l->usr_firstname.' '.$l->usr_lastname;?></a>
                      </td>
                      <?php } ?>
                      <td style="font-size:95%">
                        <?php
                          echo $l->log_activity;
                          if ($l->log_display_name != '') {
                            echo ' [ <strong>'.$l->log_display_name.'</strong> ]';
                          }
                        ?>
                      </td>
                    </tr>
                    <?php endforeach;?>
                  </tbody>
                </table>
              </div>

        </div><!-- card-body -->

        <div class="modal-footer">
          {{ $logs->links() }}
        </div>
      </div><!-- card -->
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
