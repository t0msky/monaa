@extends('layouts.master')

@section('content')
<div class="br-mainpanel">
  <div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
      <a class="breadcrumb-item" href="#">Data Assets</a>
      <span class="breadcrumb-item active">Rate Card</span>
    </nav>
  </div><!-- br-pageheader -->
  <div class="br-pagetitle">
    <i class="icon typcn typcn-shopping-bag tx-24"></i>
    <div>
      <h4 class="pd-y-15">Rate Card</h4>
      <!-- <p class="mg-b-0">Table Of Contracted Service Charges</p> -->
    </div>
  </div><!-- d-flex -->

  <div class="br-pagebody pd-x-20 pd-sm-x-30">
    <div class="row no-gutters widget-1 shadow-base">

      <div class="col-sm-6 col-lg-6">
        <div class="card">
          <div class="card-header">
            <h6 class="card-title"><span class="tx-teal">FSU</span> - Service Vessels LOA Greater Than 150m</h6>
          </div><!-- card-header -->
          <div class="card-body">
            <span>$ 6,500.00</span>
          </div><!-- card-body -->
          <div class="card-footer">
            <div>
              <i class="icon typcn typcn-tick tx-16 pd-r-10"></i>
              <span class="tx-14">Mooring Master On-Board</span><br>
              <i class="icon typcn typcn-tick tx-16 pd-r-10"></i>
              <span class="tx-14">Pilotage ( In-Bound, Out-Bound, Shifting )</span>
            </div>
            <div>
              <i class="icon typcn typcn-times tx-16 pd-r-10"></i>
              <span class="tx-inverse">1</span><br>
              <i class="icon typcn typcn-times tx-16 pd-r-10"></i>
              <span class="tx-inverse">2</span>
            </div>
          </div><!-- card-footer -->
        </div><!-- card -->
      </div><!-- col-3 -->

      <div class="col-sm-6 col-lg-6 mg-t-1 mg-sm-t-0">
        <div class="card">
          <div class="card-header">
            <h6 class="card-title"><span class="tx-teal">FSU</span> - Service Vessels LOA 150m Or Less</h6>
            <!-- <div class="dropdown hidden-xs-down">
              <a href="#" data-toggle="dropdown" class="tx-gray-500 hover-info"><i class="icon ion-more tx-22"></i></a>
              <div class="dropdown-menu dropdown-menu-right pd-10">
                <nav class="nav nav-style-2 flex-column">
                  <a href="" class="nav-link" data-toggle="modal" data-target="#editrate">Edit</a>
                </nav>
              </div>
            </div> -->
          </div><!-- card-header -->
          <div class="card-body">
            <span>$ 4,000.00</span>
          </div><!-- card-body -->
          <div class="card-footer">
            <div>
              <i class="icon typcn typcn-tick tx-16 pd-r-10"></i>
              <span class="tx-14">Mooring Master On-Board</span><br>
              <i class="icon typcn typcn-tick tx-16 pd-r-10"></i>
              <span class="tx-14">Pilotage ( In-Bound, Out-Bound, Shifting )</span>
            </div>
            <div>
              <i class="icon typcn typcn-times tx-16 pd-r-10"></i>
              <span class="tx-inverse">1</span><br>
              <i class="icon typcn typcn-times tx-16 pd-r-10"></i>
              <span class="tx-inverse">0</span>
            </div>
          </div><!-- card-footer -->
        </div><!-- card -->
      </div><!-- col-3 -->
    </div><!-- row -->

    <div class="row no-gutters widget-1 shadow-base pd-t-20">
      <div class="col-sm-6 col-lg-6 mg-t-1 mg-lg-t-0">
        <div class="card">
          <div class="card-header">
            <h6 class="card-title"><span class="tx-teal">SPOT</span> - First 24 Hours</h6>
            <!-- <div class="dropdown hidden-xs-down">
              <a href="#" data-toggle="dropdown" class="tx-gray-500 hover-info"><i class="icon ion-more tx-22"></i></a>
              <div class="dropdown-menu dropdown-menu-right pd-10">
                <nav class="nav nav-style-2 flex-column">
                  <a href="" class="nav-link" data-toggle="modal" data-target="#editrate">Edit</a>
                </nav>
              </div>
            </div> -->
          </div><!-- card-header -->
          <div class="card-body">
            <span>$ 4,100.00</span>
          </div><!-- card-body -->
          <div class="card-footer">
            <div>
              <i class="icon typcn typcn-tick tx-16 pd-r-10"></i>
              <span class="tx-14">Mooring Master On-Board</span><br>
              <i class="icon typcn typcn-tick tx-16 pd-r-10"></i>
              <span class="tx-14">Pilotage ( In-Bound, Out-Bound, Shifting )</span>
            </div>
            <div>
              <i class="icon typcn typcn-times tx-16 pd-r-10"></i>
              <span class="tx-inverse">1</span><br>
              <i class="icon typcn typcn-times tx-16 pd-r-10"></i>
              <span class="tx-inverse">2</span>
            </div>
          </div><!-- card-footer -->
        </div><!-- card -->
      </div><!-- col-3 -->
      <div class="col-sm-6 col-lg-6 mg-t-1 mg-lg-t-0">
        <div class="card">
          <div class="card-header">
            <h6 class="card-title"><span class="tx-teal">SPOT</span> - Subsequent Hours & Part Thereof</h6>
            <!-- <div class="dropdown hidden-xs-down">
              <a href="#" data-toggle="dropdown" class="tx-gray-500 hover-info"><i class="icon ion-more tx-22"></i></a>
              <div class="dropdown-menu dropdown-menu-right pd-10">
                <nav class="nav nav-style-2 flex-column">
                  <a href="" class="nav-link" data-toggle="modal" data-target="#editrate">Edit</a>
                </nav>
              </div>
            </div> -->
          </div><!-- card-header -->
          <div class="card-body">
            <span>$ 100.00</span>
          </div><!-- card-body -->
          <div class="card-footer">
            <div>
              <i class="icon typcn typcn-tick tx-16 pd-r-10"></i>
              <span class="tx-14">Mooring Master On-Board</span><br>
              <i class="icon typcn typcn-tick tx-16 pd-r-10"></i>
              <span class="tx-14">Pilotage ( In-Bound, Out-Bound, Shifting )</span>
            </div>
            <div>
              <i class="icon typcn typcn-times tx-16 pd-r-10"></i>
              <span class="tx-inverse">0</span><br>
              <i class="icon typcn typcn-times tx-16 pd-r-10"></i>
              <span class="tx-inverse">0</span>
            </div>
          </div><!-- card-footer -->
        </div><!-- card -->
      </div><!-- col-3 -->
    </div><!-- row -->

    <div class="row no-gutters widget-1 shadow-base pd-t-20">
      <div class="col-sm col-lg mg-t-1 mg-lg-t-0">
        <div class="card">
          <div class="card-footer">
            <div>
              <i class="icon typcn typcn-star tx-20 pd-r-5 tx-gray-500"></i>
              <span class="tx-14 tx-capitalize tx-gray-500">Last updated on -</span>&nbsp;Monday, 20 June 2019, 08:36 AM - IP address : 115.164.83.226<br>
            </div>
            <div>
              <i class="icon typcn typcn-user tx-20 pd-r-10 tx-gray-500"></i>
              <span class="tx-inverse tx-gray-500">Last updated by -</span>&nbsp;Syahrun Sulaiman<br>
            </div>
          </div><!-- card-footer -->
        </div><!-- card -->
      </div><!-- col-3 -->

    </div><!-- row -->
  </div><!-- br-pagebody -->
</div><!-- br-mainpanel -->

<div id="editrate" class="modal fade">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content tx-size-sm">
      <div class="modal-header pd-x-20">
        <h6 class="tx-14 mg-b-0 tx-capitalize tx-inverse tx-medium">Edit Rate Card</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body pd-20">

      </div><!-- modal-body -->
      <div class="modal-footer">
        <button type="button" class="btn btn-info">Submit</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div><!-- modal-dialog -->
</div><!-- modal -->


@stop

@section('docready')

@stop
