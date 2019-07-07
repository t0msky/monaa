@extends('layouts.home')

@section('content')

<div class="d-flex align-items-center justify-content-center ht-100v">
  <img src="../img/bground-001.jpg" class="wd-100p ht-100p object-fit-cover" alt="">
  <div class="overlay-body d-flex align-items-center justify-content-center">
    <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white rounded shadow-base">
      <div class="signin-logo tx-center pd-b-40"><img src="../img/favicon.png" class="signin-logo"></div>

      <div class="tx-center mg-b-60"><h3>Congratulations!</h3></div>

      <div class="tx-center mg-b-60">Your account has been verified.</div>

      <div class="mg-t-30 tx-center"><a href="login" class="tx-info">Sign In</a></div>

    </div><!-- login-wrapper -->
  </div><!-- overlay-body -->
</div><!-- d-flex -->


@stop

@section('docready')

@stop
