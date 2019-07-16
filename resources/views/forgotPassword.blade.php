@extends('layouts.home')

@section('content')
<div class="d-flex align-items-center justify-content-center ht-100v">
  <img src="<?php echo env('BASE_URL');?>img/bground-001.jpg" class="wd-100p ht-100p object-fit-cover" alt="">
  <div class="overlay-body d-flex align-items-center justify-content-center">
    <div class="login-wrapper wd-300 wd-xs-350 pd-30 pd-xs-40 bg-white rounded shadow-base">
      <div class="tx-gray-600 tx-sm-24 tx-roboto tx-medium tx-uppercase pd-t-10 pd-b-5 lh-1">Recovery</div>
                  <p class="tx-gray-600 mg-b-30">Insert your registered email address</p>
      <form method="post" action="forgot-password" data-parsley-validate>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Email" name="email" required>
        </div><!-- form-group -->

        <div class="pd-b-10">
          <button type="submit" class="btn btn-info btn-block">Reset Password</button>
        </div>
      </form>
      <div class="mg-t-10 tx-center">Back to <a href="login" class="tx-info">Sign in</a></div>
    </div><!-- login-wrapper -->
  </div><!-- overlay-body -->
</div><!-- d-flex -->
</div>
@stop

@section('docready')

@stop
