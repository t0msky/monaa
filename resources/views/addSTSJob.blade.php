@extends('layouts.master')

@section('content')
<div class="br-mainpanel">
  <div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
      <a class="breadcrumb-item" href="#">Operation</a>
      <span class="breadcrumb-item active">Add New Assignment</span>
    </nav>
  </div><!-- br-pageheader -->
  <div class="br-pagetitle">
    <!-- <i class="icon icon ion-ios-photos-outline"></i> -->
    <i class="fa fa-clipboard fa-5x"></i>
    <div>
      <h4>New Assignment</h4>
      <p class="mg-b-0">Add new assignment here.</p>
    </div>
  </div><!-- d-flex -->

  <div class="br-pagebody">
    <div class="br-section-wrapper">

      <div class="form-layout form-layout-2">
        <div class="row no-gutters">
          <div class="col-md-4">
            <div class="form-group">
              <label class="form-control-label">Firstname: <span class="tx-danger">*</span></label>
              <input class="form-control" type="text" name="firstname" value="John Paul" placeholder="Enter firstname">
            </div>
          </div><!-- col-4 -->
          <div class="col-md-4 mg-t--1 mg-md-t-0">
            <div class="form-group mg-md-l--1">
              <label class="form-control-label">Lastname: <span class="tx-danger">*</span></label>
              <input class="form-control" type="text" name="lastname" value="McDoe" placeholder="Enter lastname">
            </div>
          </div><!-- col-4 -->
          <div class="col-md-4 mg-t--1 mg-md-t-0">
            <div class="form-group mg-md-l--1">
              <label class="form-control-label">Email address: <span class="tx-danger">*</span></label>
              <input class="form-control" type="text" name="email" value="johnpaul@yourdomain.com" placeholder="Enter email address">
            </div>
          </div><!-- col-4 -->
          <div class="col-md-8">
            <div class="form-group bd-t-0-force">
              <label class="form-control-label">Mail address: <span class="tx-danger">*</span></label>
              <input class="form-control" type="text" name="address" value="Market St., San Francisco" placeholder="Enter address">
            </div>
          </div><!-- col-8 -->
          <div class="col-md-4">
            <div class="form-group mg-md-l--1 bd-t-0-force">
              <label class="form-control-label mg-b-0-force">Country: <span class="tx-danger">*</span></label>
              <select id="select2-a" class="form-control" data-placeholder="Choose country">
                <option label="Choose country"></option>
                <option value="USA" selected>United States of America</option>
                <option value="UK">United Kingdom</option>
                <option value="China">China</option>
                <option value="Japan">Japan</option>
              </select>
            </div>
          </div><!-- col-4 -->
        </div><!-- row -->
        <div class="form-layout-footer bd pd-20 bd-t-0">
          <button class="btn btn-info">Submit Form</button>
          <button class="btn btn-secondary">Cancel</button>
        </div><!-- form-group -->
      </div><!-- form-layout -->
      
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
