@extends('layouts.master')

@section('content')
<div class="br-mainpanel">
  <div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
      <a class="breadcrumb-item" href="#">Operation</a>
      <span class="breadcrumb-item active">My Assignment</span>
    </nav>
  </div><!-- br-pageheader -->
  <div class="br-pagetitle">
    <!-- <i class="icon icon ion-ios-photos-outline"></i> -->
    <i class="fa fa-clipboard fa-5x"></i>
    <div>
      <h4>My Assignment</h4>
      <p class="mg-b-0">View all your assignments.</p>
    </div>
  </div><!-- d-flex -->

  <div class="br-pagebody">
    <div class="br-section-wrapper">

    </div><!-- br-section-wrapper -->
  </div><!-- br-pagebody -->


  <footer class="br-footer">
    <div class="footer-left">
      <div class="mg-b-2">Copyright <span class="tx-16">©</span> 2019.&nbsp;&nbsp;Monaa ™.&nbsp;&nbsp;All Rights Reserved.&nbsp;&nbsp;<span class="op-6">Attentively Developed By Artifex DNA.</span></div>
    </div>
    <div class="footer-right d-flex align-items-center">
      <!-- <span class="tx-uppercase mg-r-10">Share:</span> -->
      <!-- <a target="_blank" class="pd-x-5" href="https://www.facebook.com/"><i class="fab fa-facebook tx-20"></i></a>
      <a target="_blank" class="pd-x-5" href="https://twitter.com/"><i class="fab fa-twitter tx-20"></i></a> -->
    </div>
  </footer>
</div>


@stop

@section('docready')

@stop
