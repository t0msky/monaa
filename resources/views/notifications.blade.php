@extends('layouts.master')

@section('content')
<div class="br-subleft">

  <nav class="nav br-nav-mailbox flex-column">
    <a href="" class="nav-link active"><i class="icon typcn typcn-user tx-24"></i> Display All </a>
    <a href="" class="nav-link"><i class="icon typcn typcn-user tx-24"></i> Freelancers</a>
    <a href="" class="nav-link"><i class="icon typcn typcn-user tx-24"></i> Administration</a>
    <a href="" class="nav-link"><i class="icon typcn typcn-user tx-24"></i> In-house Pilots</a>
  </nav>
</div><!-- br-subleft -->

<div class="br-contentpanel">
  <div class="br-pageheader pd-y-15 pd-md-l-20">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
      <span class="breadcrumb-item active">Personnels</span>
      <span class="breadcrumb-item active">Personnel Board</span>
    </nav>
  </div><!-- br-pageheader -->

  <div class="br-pagetitle">
    <i class="icon typcn typcn-user tx-24"></i>
    <div>
      <h4 class="pd-y-15">Notifications</h4>
    </div>
  </div><!-- d-flex -->

  <div class="br-pagebody pd-x-20 pd-sm-x-30 pd-b-40">
    <div class="card bd-0 bd-t-0 shadow-base">
      <div class="card">
        <table class="table mg-b-0 bd-t-0 table-contact">
          <thead style="display:none;">
            <tr>
              <th class="wd-2p">#</th>
              <th class="wd-80p tx-uppercase"></th>
              <th class="wd-15p tx-right"></th>
              <th class="wd-2p"></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td class="tx-medium">You have 1 job notification</td>
              <td class="tx-right">March 03, 2019, 8:45 AM</td>
              <td></td>
            </tr>
            <tr>
              <td>2</td>
              <td class="tx-medium">You have 2 unread announcements</td>
              <td class="tx-right">March 03, 2019, 8:45 AM</td>
              <td></td>
            </tr>
            <tr>
              <td>3</td>
              <td>You have 3 verified vouchers</td>
              <td class="tx-right">March 03, 2019, 8:45 AM</td>
              <td></td>
            </tr>
            <tr>
              <td>4</td>
              <td>You have 1 job notification</td>
              <td class="tx-right">March 03, 2019, 8:45 AM</td>
              <td></td>
            </tr>
            <tr>
              <td>5</td>
              <td>You have 2 unread announcements</td>
              <td class="tx-right">March 03, 2019, 8:45 AM</td>
              <td></td>
            </tr>
            <tr>
              <td>6</td>
              <td>You have 3 verified vouchers</td>
              <td class="tx-right">March 03, 2019, 8:45 AM</td>
              <td></td>
            </tr>
          </tbody>
        </table>
      </div><!-- card -->
    </div>
  </div><!-- br-pagebody -->
</div><!-- br-contentpanel -->

@stop

@section('docready')

@stop
