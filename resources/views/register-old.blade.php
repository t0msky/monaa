@extends('layouts.home')

@section('content')

<div class="d-flex align-items-center justify-content-center ht-100v">
  <img src="img/bground-001.jpg" class="wd-100p ht-100p object-fit-cover" alt="">
  <div class="overlay-body d-flex align-items-center justify-content-center">
    <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white rounded shadow-base">
      <div class="signin-logo tx-center pd-b-40"><img src="img/favicon.png" class="signin-logo"></div>
      <!-- <div class="tx-center mg-b-60">The Admin Template For Perfectionist</div> -->

      <?php if (!empty($errorMsg) || count($errors) > 0) { ?>
        <div class="alert alert-danger alert-dismissable">
          Whoops! There were some problems with your input.<br><br>
          <ul>
            <?php
            if(!empty($errorMsg)){
              foreach($errorMsg as $e){
                  echo '<li>'.$e.'</li>';
              }
            }
            if(count($errors) > 0){
              foreach($errors->all() as $error){
                echo '<li>'.$error.'</li>';
              }
            }
            ?>
          </ul>
        </div>
      <?php }?>

      <form method="post" action="<?php echo env('BASE_URL');?>postRegister" data-parsley-validate>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="First Name" name="firstname" required>
        </div><!-- form-group -->
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Last Name" name="lastname" required>
        </div><!-- form-group -->

        <div class="form-group">
          <input type="text" class="form-control" placeholder="Mobile No" name="mobileno" required>
        </div><!-- form-group -->
        <div class="form-group">
          <input type="email" class="form-control" placeholder="Email" name="email" required>
        </div><!-- form-group -->
        <div class="form-group">
          <input type="password" placeholder="Password" id="password" class="form-control password" name="password" required>
        </div><!-- form-group -->
        <div class="form-group">
          <input type="password" placeholder="Confirm Password" id="password" class="form-control password" name="password_confirmation" required>
        </div><!-- form-group -->


        <!-- <div class="pd-b-7">
          <label class="ckbox">
            <input type="checkbox">
            <span>Remember Me</span>
          </label>
        </div> -->
        <!-- <div class="form-group">
          <a href="" class="tx-info tx-12 d-block mg-t-10">Forgot password?</a>
        </div> -->
        <div class="pd-b-10">
          <button type="submit" class="btn btn-info btn-block">Submit</button>
        </div>
      </form>
      <div class="mg-t-30 tx-center">Already Registered? <a href="login" class="tx-info">Sign In</a></div>
    </div><!-- login-wrapper -->
  </div><!-- overlay-body -->
</div><!-- d-flex -->


@stop

@section('docready')

@stop
