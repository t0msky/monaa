@extends('layouts.home')

@section('content')
<div class="d-flex align-items-center justify-content-center ht-100v">
  <img src="<?php echo env('BASE_URL');?>img/bground-001.jpg" class="wd-100p ht-100p object-fit-cover" alt="">
  <div class="overlay-body d-flex align-items-center justify-content-center">
    <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white rounded shadow-base">
      <div class="signin-logo tx-center pd-b-40"><img src="<?php echo env('BASE_URL');?>img/favicon.png" class="signin-logo"></div>
      <div class="tx-center mg-b-60">Hi <strong><?php echo $user->usr_firstname.' '.$user->usr_lastname;?></strong>, Please enter your new password.</div>

      <form method="post" action="<?php echo env('BASE_URL');?>do-reset-password" data-parsley-validate>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
          <input type="password" class="form-control" placeholder="Enter new password" name="password1" required>
        </div><!-- form-group -->
        <div class="form-group">
          <input type="password" class="form-control" placeholder="Confirm your new password" name="password2" required>
        </div><!-- form-group -->

        <div class="pd-b-10">
          <input type=hidden name="code" value="<?php echo $code;?>">
          <button type="submit" class="btn btn-info btn-block">Submit</button>
        </div>
      </form>
      <div class="mg-t-30 tx-center">Back to <a href="login" class="tx-info">Sign in</a></div>
    </div><!-- login-wrapper -->
  </div><!-- overlay-body -->
</div><!-- d-flex -->
</div>
@stop

@section('docready')

@stop
