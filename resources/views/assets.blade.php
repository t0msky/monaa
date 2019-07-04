@extends('layouts.master')

@section('content')
<div class="br-mainpanel">
  <div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
      <a class="breadcrumb-item" href="#">Data Assets</a>
      <a class="breadcrumb-item" href="job-record.html">Assets</a>
      <span class="breadcrumb-item active">Assets Registration</span>
    </nav>
  </div><!-- br-pageheader -->
  <div class="br-pagetitle">
    <i class="icon typcn typcn-briefcase tx-24"></i>
    <div>
      <h4 class="pd-y-15">Operations</h4>
      <!-- <p class="mg-b-0">Register New Job</p> -->
    </div>
  </div><!-- d-flex -->

  <div class="br-pagebody pd-x-20 pd-sm-x-30 pd-b-40">
    <div class="row row-sm mg-t-20 pd-b-40">
      <div class="col-lg mg-t-20 mg-lg-t-0">
        <div class="card shadow-base bd-0">
          <div class="card-header-02 bg-transparent pd-x-25 pd-y-25 d-flex justify-content-between align-items-center">
            <div class="card-title mg-b-0">Assets Registration</div>
          </div><!-- card-header -->

          <div class="card">
            <div class="card-header">
              <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                  <a class="nav-link active" href="#t01" data-toggle="tab">Company</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#t02" data-toggle="tab">Vessels</a>
                </li>
              </ul>
            </div><!-- card-header -->

            <div class="tab-content">
              <div class="tab-pane active" id="t01">
                <form method="post" action="#" data-parsley-validate data-parsley-errors-messages-disabled>
                  <div class="form-layout form-layout-1">
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="row mg-b-40">
                          <div class="col-lg-12">
                            <div class="d-flex justify-content-between align-items-center pd-b-20">
                              <div class="mg-b-0">
                                <div class="card-title mg-b-0">STS Client</div>
                              </div><!-- form-group -->
                              <div class="btn-group" role="group" aria-label="Basic example">
                                <button id="buttonprint" type="button" class="btn btn-third" data-toggle="modal" data-target="#addclient-1"><i class="icon ion-plus tx-20"></i></button>
                              </div>
                            </div>
                            <div class="table-wrapper">
                              <table id="datatable1" class="table display responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                  <tr>
                                    <th class="wd-5p">No.</th>
                                    <th class="wd-15p">Company Name</th>
                                    <th class="wd-20p">Address</th>
                                    <th class="wd-10p">Phone No.</th>
                                    <th class="wd-10p">Contact Person</th>
                                    <th class="wd-5p">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td>1</td>
                                    <td>Company 01</td>
                                    <td>01-12-07, Menara Bangkok Bank, No. 105, Jalan Ampang, 50450 Kuala Lumpur, Malaysia.</td>
                                    <td>+60106610843</td>
                                    <td>Husin Lempoyang</td>
                                    <td class="dropdown hidden-xs-down tx-center">
                                      <a href="#" data-toggle="dropdown" class="tx-gray-500 hover-info"><i class="icon ion-more tx-16"></i></a>
                                      <div class="dropdown-menu dropdown-menu-right pd-10">
                                        <nav class="nav nav-style-2 flex-column">
                                          <a href="job-info.html" class="nav-link">Edit</a>
                                          <a href="" class="nav-link" data-toggle="modal" data-target="#deletealert">Delete</a>
                                        </nav>
                                      </div><!-- dropdown-menu -->
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>2</td>
                                    <td>Company 02</td>
                                    <td>01-12-07, Menara Bangkok Bank, No. 105, Jalan Ampang, 50450 Kuala Lumpur, Malaysia.</td>
                                    <td>+60106610843</td>
                                    <td>Husin Lempoyang</td>
                                    <td class="dropdown hidden-xs-down tx-center">
                                      <a href="#" data-toggle="dropdown" class="tx-gray-500 hover-info"><i class="icon ion-more tx-16"></i></a>
                                      <div class="dropdown-menu dropdown-menu-right pd-10">
                                        <nav class="nav nav-style-2 flex-column">
                                          <a href="job-info.html" class="nav-link">Edit</a>
                                          <a href="" class="nav-link" data-toggle="modal" data-target="#deletealert">Delete</a>
                                        </nav>
                                      </div><!-- dropdown-menu -->
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>3</td>
                                    <td>Company 03</td>
                                    <td>01-12-07, Menara Bangkok Bank, No. 105, Jalan Ampang, 50450 Kuala Lumpur, Malaysia.</td>
                                    <td>+60106610843</td>
                                    <td>Husin Lempoyang</td>
                                    <td class="dropdown hidden-xs-down tx-center">
                                      <a href="#" data-toggle="dropdown" class="tx-gray-500 hover-info"><i class="icon ion-more tx-16"></i></a>
                                      <div class="dropdown-menu dropdown-menu-right pd-10">
                                        <nav class="nav nav-style-2 flex-column">
                                          <a href="job-info.html" class="nav-link">Edit</a>
                                          <a href="" class="nav-link" data-toggle="modal" data-target="#deletealert">Delete</a>
                                        </nav>
                                      </div><!-- dropdown-menu -->
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>4</td>
                                    <td>Company 04</td>
                                    <td>01-12-07, Menara Bangkok Bank, No. 105, Jalan Ampang, 50450 Kuala Lumpur, Malaysia.</td>
                                    <td>+60106610843</td>
                                    <td>Husin Lempoyang</td>
                                    <td class="dropdown hidden-xs-down tx-center">
                                      <a href="#" data-toggle="dropdown" class="tx-gray-500 hover-info"><i class="icon ion-more tx-16"></i></a>
                                      <div class="dropdown-menu dropdown-menu-right pd-10">
                                        <nav class="nav nav-style-2 flex-column">
                                          <a href="job-info.html" class="nav-link">Edit</a>
                                          <a href="" class="nav-link" data-toggle="modal" data-target="#deletealert">Delete</a>
                                        </nav>
                                      </div><!-- dropdown-menu -->
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </div><!-- table-wrapper -->
                          </div><!-- col-12 -->
                        </div><!-- row -->
                        <div class="row mg-b-40">
                          <div class="col-lg-12">
                            <div class="d-flex justify-content-between align-items-center pd-b-20">
                              <div class="mg-b-0">
                                <div class="card-title mg-b-0">STS Service Provider</div>
                              </div><!-- form-group -->
                              <div class="btn-group" role="group" aria-label="Basic example">
                                <button id="buttonprint" type="button" class="btn btn-third" data-toggle="modal" data-target="#addprovider-1"><i class="icon ion-plus tx-20"></i></button>
                              </div>
                            </div>
                            <div class="table-wrapper">
                              <table id="datatable2" class="table display responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                  <tr>
                                    <th class="wd-5p">No.</th>
                                    <th class="wd-15p">Company Name</th>
                                    <th class="wd-20p">Address</th>
                                    <th class="wd-10p">Phone No.</th>
                                    <th class="wd-10p">Contact Person</th>
                                    <th class="wd-5p">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td>1</td>
                                    <td>Company 01</td>
                                    <td>01-12-07, Menara Bangkok Bank, No. 105, Jalan Ampang, 50450 Kuala Lumpur, Malaysia.</td>
                                    <td>+60106610843</td>
                                    <td>Husin Lempoyang</td>
                                    <td class="dropdown hidden-xs-down tx-center">
                                      <a href="#" data-toggle="dropdown" class="tx-gray-500 hover-info"><i class="icon ion-more tx-16"></i></a>
                                      <div class="dropdown-menu dropdown-menu-right pd-10">
                                        <nav class="nav nav-style-2 flex-column">
                                          <a href="job-info.html" class="nav-link">Edit</a>
                                          <a href="" class="nav-link" data-toggle="modal" data-target="#deletealert">Delete</a>
                                        </nav>
                                      </div><!-- dropdown-menu -->
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>2</td>
                                    <td>Company 02</td>
                                    <td>01-12-07, Menara Bangkok Bank, No. 105, Jalan Ampang, 50450 Kuala Lumpur, Malaysia.</td>
                                    <td>+60106610843</td>
                                    <td>Husin Lempoyang</td>
                                    <td class="dropdown hidden-xs-down tx-center">
                                      <a href="#" data-toggle="dropdown" class="tx-gray-500 hover-info"><i class="icon ion-more tx-16"></i></a>
                                      <div class="dropdown-menu dropdown-menu-right pd-10">
                                        <nav class="nav nav-style-2 flex-column">
                                          <a href="job-info.html" class="nav-link">Edit</a>
                                          <a href="" class="nav-link" data-toggle="modal" data-target="#deletealert">Delete</a>
                                        </nav>
                                      </div><!-- dropdown-menu -->
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>3</td>
                                    <td>Company 03</td>
                                    <td>01-12-07, Menara Bangkok Bank, No. 105, Jalan Ampang, 50450 Kuala Lumpur, Malaysia.</td>
                                    <td>+60106610843</td>
                                    <td>Husin Lempoyang</td>
                                    <td class="dropdown hidden-xs-down tx-center">
                                      <a href="#" data-toggle="dropdown" class="tx-gray-500 hover-info"><i class="icon ion-more tx-16"></i></a>
                                      <div class="dropdown-menu dropdown-menu-right pd-10">
                                        <nav class="nav nav-style-2 flex-column">
                                          <a href="job-info.html" class="nav-link">Edit</a>
                                          <a href="" class="nav-link" data-toggle="modal" data-target="#deletealert">Delete</a>
                                        </nav>
                                      </div><!-- dropdown-menu -->
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>4</td>
                                    <td>Company 04</td>
                                    <td>01-12-07, Menara Bangkok Bank, No. 105, Jalan Ampang, 50450 Kuala Lumpur, Malaysia.</td>
                                    <td>+60106610843</td>
                                    <td>Husin Lempoyang</td>
                                    <td class="dropdown hidden-xs-down tx-center">
                                      <a href="#" data-toggle="dropdown" class="tx-gray-500 hover-info"><i class="icon ion-more tx-16"></i></a>
                                      <div class="dropdown-menu dropdown-menu-right pd-10">
                                        <nav class="nav nav-style-2 flex-column">
                                          <a href="job-info.html" class="nav-link">Edit</a>
                                          <a href="" class="nav-link" data-toggle="modal" data-target="#deletealert">Delete</a>
                                        </nav>
                                      </div><!-- dropdown-menu -->
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </div><!-- table-wrapper -->
                          </div><!-- col-12 -->
                        </div><!-- row -->
                        <div class="row mg-b-10">
                          <div class="col-lg-12">
                            <div class="d-flex justify-content-between align-items-center pd-b-20">
                              <div class="mg-b-0">
                                <div class="card-title mg-b-0">STS Operator</div>
                              </div><!-- form-group -->
                              <div class="btn-group" role="group" aria-label="Basic example">
                                <button id="buttonprint" type="button" class="btn btn-third" data-toggle="modal" data-target="#addoperator-1"><i class="icon ion-plus tx-20"></i></button>
                              </div>
                            </div>
                            <div class="table-wrapper">
                              <table id="datatable3" class="table display responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                  <tr>
                                    <th class="wd-5p">No.</th>
                                    <th class="wd-15p">Company Name</th>
                                    <th class="wd-20p">Address</th>
                                    <th class="wd-10p">Phone No.</th>
                                    <th class="wd-10p">Contact Person</th>
                                    <th class="wd-5p">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td>1</td>
                                    <td>Company 01</td>
                                    <td>01-12-07, Menara Bangkok Bank, No. 105, Jalan Ampang, 50450 Kuala Lumpur, Malaysia.</td>
                                    <td>+60106610843</td>
                                    <td>Husin Lempoyang</td>
                                    <td class="dropdown hidden-xs-down tx-center">
                                      <a href="#" data-toggle="dropdown" class="tx-gray-500 hover-info"><i class="icon ion-more tx-16"></i></a>
                                      <div class="dropdown-menu dropdown-menu-right pd-10">
                                        <nav class="nav nav-style-2 flex-column">
                                          <a href="job-info.html" class="nav-link">Edit</a>
                                          <a href="" class="nav-link" data-toggle="modal" data-target="#deletealert">Delete</a>
                                        </nav>
                                      </div><!-- dropdown-menu -->
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>2</td>
                                    <td>Company 02</td>
                                    <td>01-12-07, Menara Bangkok Bank, No. 105, Jalan Ampang, 50450 Kuala Lumpur, Malaysia.</td>
                                    <td>+60106610843</td>
                                    <td>Husin Lempoyang</td>
                                    <td class="dropdown hidden-xs-down tx-center">
                                      <a href="#" data-toggle="dropdown" class="tx-gray-500 hover-info"><i class="icon ion-more tx-16"></i></a>
                                      <div class="dropdown-menu dropdown-menu-right pd-10">
                                        <nav class="nav nav-style-2 flex-column">
                                          <a href="job-info.html" class="nav-link">Edit</a>
                                          <a href="" class="nav-link" data-toggle="modal" data-target="#deletealert">Delete</a>
                                        </nav>
                                      </div><!-- dropdown-menu -->
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>3</td>
                                    <td>Company 03</td>
                                    <td>01-12-07, Menara Bangkok Bank, No. 105, Jalan Ampang, 50450 Kuala Lumpur, Malaysia.</td>
                                    <td>+60106610843</td>
                                    <td>Husin Lempoyang</td>
                                    <td class="dropdown hidden-xs-down tx-center">
                                      <a href="#" data-toggle="dropdown" class="tx-gray-500 hover-info"><i class="icon ion-more tx-16"></i></a>
                                      <div class="dropdown-menu dropdown-menu-right pd-10">
                                        <nav class="nav nav-style-2 flex-column">
                                          <a href="job-info.html" class="nav-link">Edit</a>
                                          <a href="" class="nav-link" data-toggle="modal" data-target="#deletealert">Delete</a>
                                        </nav>
                                      </div><!-- dropdown-menu -->
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>4</td>
                                    <td>Company 04</td>
                                    <td>01-12-07, Menara Bangkok Bank, No. 105, Jalan Ampang, 50450 Kuala Lumpur, Malaysia.</td>
                                    <td>+60106610843</td>
                                    <td>Husin Lempoyang</td>
                                    <td class="dropdown hidden-xs-down tx-center">
                                      <a href="#" data-toggle="dropdown" class="tx-gray-500 hover-info"><i class="icon ion-more tx-16"></i></a>
                                      <div class="dropdown-menu dropdown-menu-right pd-10">
                                        <nav class="nav nav-style-2 flex-column">
                                          <a href="job-info.html" class="nav-link">Edit</a>
                                          <a href="" class="nav-link" data-toggle="modal" data-target="#deletealert">Delete</a>
                                        </nav>
                                      </div><!-- dropdown-menu -->
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </div><!-- table-wrapper -->
                          </div><!-- col-12 -->
                        </div><!-- row -->
                      </div><!-- col-12 -->
                    </div><!-- row -->
                  </div><!-- form-layout -->
                </form>
              </div><!-- tab-pane -->
              <div class="tab-pane" id="t02">
                <form method="post" action="#" data-parsley-validate data-parsley-errors-messages-disabled>
                  <div class="form-layout form-layout-1">
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="row mg-b-10">
                          <div class="col-lg-12">
                            <div class="d-flex justify-content-between align-items-center pd-b-20">
                              <div class="mg-b-0">
                                <div class="card-title mg-b-0">Mother Ship</div>
                              </div><!-- form-group -->
                              <div class="btn-group" role="group" aria-label="Basic example">
                                <button id="buttonprint" type="button" class="btn btn-third" data-toggle="modal" data-target="#addmothership-1"><i class="icon ion-plus tx-20"></i></button>
                              </div>
                            </div>
                            <div class="table-wrapper">
                              <table id="datatable-mothership" class="table display responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                  <tr>
                                    <th class="wd-5p">No.</th>
                                    <th class="wd-15p">Vessel Name</th>
                                    <th class="wd-20p">Vessel Type</th>
                                    <th class="wd-10p">LOA (m)</th>
                                    <th class="wd-10p">DWT (t)</th>
                                    <th class="wd-5p">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td>1</td>
                                    <td>Vessel 01</td>
                                    <td>Aframax</td>
                                    <td>344</td>
                                    <td>104,875</td>
                                    <td class="dropdown hidden-xs-down tx-center">
                                      <a href="#" data-toggle="dropdown" class="tx-gray-500 hover-info"><i class="icon ion-more tx-16"></i></a>
                                      <div class="dropdown-menu dropdown-menu-right pd-10">
                                        <nav class="nav nav-style-2 flex-column">
                                          <a href="job-info.html" class="nav-link">Edit</a>
                                          <a href="" class="nav-link" data-toggle="modal" data-target="#deletealert">Delete</a>
                                        </nav>
                                      </div><!-- dropdown-menu -->
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>2</td>
                                    <td>Vessel 02</td>
                                    <td>LR</td>
                                    <td>269</td>
                                    <td>104,875</td>
                                    <td class="dropdown hidden-xs-down tx-center">
                                      <a href="#" data-toggle="dropdown" class="tx-gray-500 hover-info"><i class="icon ion-more tx-16"></i></a>
                                      <div class="dropdown-menu dropdown-menu-right pd-10">
                                        <nav class="nav nav-style-2 flex-column">
                                          <a href="job-info.html" class="nav-link">Edit</a>
                                          <a href="" class="nav-link" data-toggle="modal" data-target="#deletealert">Delete</a>
                                        </nav>
                                      </div><!-- dropdown-menu -->
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>3</td>
                                    <td>Vessel 03</td>
                                    <td>Aframax</td>
                                    <td>368</td>
                                    <td>104,875</td>
                                    <td class="dropdown hidden-xs-down tx-center">
                                      <a href="#" data-toggle="dropdown" class="tx-gray-500 hover-info"><i class="icon ion-more tx-16"></i></a>
                                      <div class="dropdown-menu dropdown-menu-right pd-10">
                                        <nav class="nav nav-style-2 flex-column">
                                          <a href="job-info.html" class="nav-link">Edit</a>
                                          <a href="" class="nav-link" data-toggle="modal" data-target="#deletealert">Delete</a>
                                        </nav>
                                      </div><!-- dropdown-menu -->
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>4</td>
                                    <td>Vessel 04</td>
                                    <td>Aframax</td>
                                    <td>269</td>
                                    <td>104,875</td>
                                    <td class="dropdown hidden-xs-down tx-center">
                                      <a href="#" data-toggle="dropdown" class="tx-gray-500 hover-info"><i class="icon ion-more tx-16"></i></a>
                                      <div class="dropdown-menu dropdown-menu-right pd-10">
                                        <nav class="nav nav-style-2 flex-column">
                                          <a href="job-info.html" class="nav-link">Edit</a>
                                          <a href="" class="nav-link" data-toggle="modal" data-target="#deletealert">Delete</a>
                                        </nav>
                                      </div><!-- dropdown-menu -->
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </div><!-- table-wrapper -->
                          </div><!-- col-12 -->
                        </div><!-- row -->
                      </div><!-- col-12 -->
                      <div class="col-lg-6">
                        <div class="row mg-b-10">
                          <div class="col-lg-12">
                            <div class="d-flex justify-content-between align-items-center pd-b-20">
                              <div class="mg-b-0">
                                <div class="card-title mg-b-0">Manuevering Ship</div>
                              </div><!-- form-group -->
                              <div class="btn-group" role="group" aria-label="Basic example">
                                <button id="buttonprint" type="button" class="btn btn-third" data-toggle="modal" data-target="#addmanueveringship-1"><i class="icon ion-plus tx-20"></i></button>
                              </div>
                            </div>
                            <div class="table-wrapper">
                              <table id="datatable-manueveringship" class="table display responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                  <tr>
                                    <th class="wd-5p">No.</th>
                                    <th class="wd-15p">Vessel Name</th>
                                    <th class="wd-20p">Vessel Type</th>
                                    <th class="wd-10p">LOA (m)</th>
                                    <th class="wd-10p">DWT (t)</th>
                                    <th class="wd-5p">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td>1</td>
                                    <td>Vessel 01</td>
                                    <td>Aframax</td>
                                    <td>344</td>
                                    <td>104,875</td>
                                    <td class="dropdown hidden-xs-down tx-center">
                                      <a href="#" data-toggle="dropdown" class="tx-gray-500 hover-info"><i class="icon ion-more tx-16"></i></a>
                                      <div class="dropdown-menu dropdown-menu-right pd-10">
                                        <nav class="nav nav-style-2 flex-column">
                                          <a href="job-info.html" class="nav-link">Edit</a>
                                          <a href="" class="nav-link" data-toggle="modal" data-target="#deletealert">Delete</a>
                                        </nav>
                                      </div><!-- dropdown-menu -->
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>2</td>
                                    <td>Vessel 02</td>
                                    <td>LR</td>
                                    <td>269</td>
                                    <td>104,875</td>
                                    <td class="dropdown hidden-xs-down tx-center">
                                      <a href="#" data-toggle="dropdown" class="tx-gray-500 hover-info"><i class="icon ion-more tx-16"></i></a>
                                      <div class="dropdown-menu dropdown-menu-right pd-10">
                                        <nav class="nav nav-style-2 flex-column">
                                          <a href="job-info.html" class="nav-link">Edit</a>
                                          <a href="" class="nav-link" data-toggle="modal" data-target="#deletealert">Delete</a>
                                        </nav>
                                      </div><!-- dropdown-menu -->
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>3</td>
                                    <td>Vessel 03</td>
                                    <td>Aframax</td>
                                    <td>368</td>
                                    <td>104,875</td>
                                    <td class="dropdown hidden-xs-down tx-center">
                                      <a href="#" data-toggle="dropdown" class="tx-gray-500 hover-info"><i class="icon ion-more tx-16"></i></a>
                                      <div class="dropdown-menu dropdown-menu-right pd-10">
                                        <nav class="nav nav-style-2 flex-column">
                                          <a href="job-info.html" class="nav-link">Edit</a>
                                          <a href="" class="nav-link" data-toggle="modal" data-target="#deletealert">Delete</a>
                                        </nav>
                                      </div><!-- dropdown-menu -->
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>4</td>
                                    <td>Vessel 04</td>
                                    <td>Aframax</td>
                                    <td>269</td>
                                    <td>104,875</td>
                                    <td class="dropdown hidden-xs-down tx-center">
                                      <a href="#" data-toggle="dropdown" class="tx-gray-500 hover-info"><i class="icon ion-more tx-16"></i></a>
                                      <div class="dropdown-menu dropdown-menu-right pd-10">
                                        <nav class="nav nav-style-2 flex-column">
                                          <a href="job-info.html" class="nav-link">Edit</a>
                                          <a href="" class="nav-link" data-toggle="modal" data-target="#deletealert">Delete</a>
                                        </nav>
                                      </div><!-- dropdown-menu -->
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </div><!-- table-wrapper -->
                          </div><!-- col-12 -->
                        </div><!-- row -->
                      </div><!-- col-12 -->
                    </div><!-- row -->
                  </div><!-- form-layout -->
                </form>
              </div><!-- tab-pane -->
            </div><!-- tab-content -->
          </div><!-- card -->
        </div><!-- card -->
      </div><!-- col-6 -->
    </div><!-- row -->

  </div><!-- br-pagebody -->
</div><!-- br-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->

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
        <div class="tx-success tx-uppercase tx-spacing-1 tx-medium tx-18">Are you sure?</div>
        <p class="mg-b-30 mg-x-20">You will not be able to recover this data!</p>
        <a href="" class="btn btn-info"  data-dismiss="modal" aria-label="Close">Yes, Confirm</a>
      </div><!-- modal-body -->
    </div><!-- modal-content -->
  </div><!-- modal-dialog -->
</div><!-- modal -->

<div id="addclient-1" class="modal fade">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content tx-size-sm">
      <div class="modal-header pd-x-20">
        <h6 class="tx-14 mg-b-0 tx-capitalize tx-inverse tx-medium">Add Client</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="#" data-parsley-validate data-parsley-errors-messages-disabled>
        <div class="modal-body pd-20">
          <div class="row">
            <div class="col-lg-6">
              <div class="row mg-b-10">
                <div class="col-lg-12">
                  <div class="form-group mg-b-10-force">
                    <label class="form-control-label">Company Name : </label>
                    <input class="form-control" type="text" value="" placeholder="Insert Company" required>
                  </div>
                </div><!-- col-12 -->
              </div><!-- row -->
              <div class="row mg-b-10">
                <div class="col-lg-12">
                  <div class="form-group mg-b-10-force">
                    <label class="form-control-label">Company Address : </label>
                    <input class="form-control mg-b-10-force" type="text" value="" placeholder="Address Line 1" required>
                    <input class="form-control" type="text" value="" placeholder="Address Line 2">
                  </div>
                </div><!-- col-12 -->
              </div><!-- row -->
              <div class="row mg-b-10">
                <div class="col-lg-6">
                  <div class="form-group mg-b-10-force">
                    <label class="form-control-label">ZIP / Postal Code : </label>
                    <input class="form-control" type="number" value="" placeholder="">
                  </div>
                </div><!-- col-6 -->
                <div class="col-lg-6">
                  <div class="form-group mg-b-10-force">
                    <label class="form-control-label">Country : </label>
                    <input class="form-control" type="text" value="" placeholder="">
                  </div>
                </div><!-- col-6 -->
                <div class="col-lg-12">
                  <div class="form-group mg-b-10-force">
                    <label class="form-control-label">Contact Person : </label>
                    <input class="form-control" type="text" value="" placeholder="Insert Name" required>
                  </div>
                </div><!-- col-12 -->
              </div><!-- row -->
            </div><!-- col-6 -->
            <div class="col-lg-6">
              <div class="row mg-b-10">
                <div class="col-lg-12">
                  <div class="form-group mg-b-10-force">
                    <label class="form-control-label">Company Email : </label>
                    <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
                  </div>
                </div><!-- col-12 -->
              </div><!-- row -->
              <div class="row mg-b-10">
                <div class="col-lg-12">
                  <div class="form-group mg-b-10-force">
                    <label class="form-control-label">Telephone : </label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fa fa-phone tx-16 lh-0 op-6"></i>
                        </div>
                      </div><!-- input-group-prepend -->
                      <input id="phoneMask" type="text" class="form-control" placeholder="(000) 000-0000" required>
                    </div><!-- input-group -->
                  </div>
                </div><!-- col-12 -->
              </div><!-- row -->
            </div><!-- col-6 -->
          </div><!-- row -->
        </div><!-- modal-body -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-info">Add</button>
          <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
      </form>
    </div>
  </div><!-- modal-dialog -->
</div><!-- modal -->

<div id="addoperator-1" class="modal fade">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content tx-size-sm">
      <div class="modal-header pd-x-20">
        <h6 class="tx-14 mg-b-0 tx-capitalize tx-inverse tx-medium">Add STS Operator</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="#" data-parsley-validate data-parsley-errors-messages-disabled>
        <div class="modal-body pd-20">
          <div class="row">
            <div class="col-lg-6">
              <div class="row mg-b-10">
                <div class="col-lg-12">
                  <div class="form-group mg-b-10-force">
                    <label class="form-control-label">Company Name : </label>
                    <input class="form-control" type="text" value="" placeholder="Insert Company" required>
                  </div>
                </div><!-- col-12 -->
              </div><!-- row -->
              <div class="row mg-b-10">
                <div class="col-lg-12">
                  <div class="form-group mg-b-10-force">
                    <label class="form-control-label">Company Address : </label>
                    <input class="form-control mg-b-10-force" type="text" value="" placeholder="Address Line 1" required>
                    <input class="form-control" type="text" value="" placeholder="Address Line 2">
                  </div>
                </div><!-- col-12 -->
              </div><!-- row -->
              <div class="row mg-b-10">
                <div class="col-lg-6">
                  <div class="form-group mg-b-10-force">
                    <label class="form-control-label">ZIP / Postal Code : </label>
                    <input class="form-control" type="number" value="" placeholder="">
                  </div>
                </div><!-- col-6 -->
                <div class="col-lg-6">
                  <div class="form-group mg-b-10-force">
                    <label class="form-control-label">Country : </label>
                    <input class="form-control" type="text" value="" placeholder="">
                  </div>
                </div><!-- col-6 -->
                <div class="col-lg-12">
                  <div class="form-group mg-b-10-force">
                    <label class="form-control-label">Contact Person : </label>
                    <input class="form-control" type="text" value="" placeholder="Insert Name" required>
                  </div>
                </div><!-- col-12 -->
              </div><!-- row -->
            </div><!-- col-6 -->
            <div class="col-lg-6">
              <div class="row mg-b-10">
                <div class="col-lg-12">
                  <div class="form-group mg-b-10-force">
                    <label class="form-control-label">Company Email : </label>
                    <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
                  </div>
                </div><!-- col-12 -->
              </div><!-- row -->
              <div class="row mg-b-10">
                <div class="col-lg-12">
                  <div class="form-group mg-b-10-force">
                    <label class="form-control-label">Telephone : </label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fa fa-phone tx-16 lh-0 op-6"></i>
                        </div>
                      </div><!-- input-group-prepend -->
                      <input id="phoneMask" type="text" class="form-control" placeholder="(000) 000-0000" required>
                    </div><!-- input-group -->
                  </div>
                </div><!-- col-12 -->
              </div><!-- row -->
            </div><!-- col-6 -->
          </div><!-- row -->
        </div><!-- modal-body -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-info">Add</button>
          <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
      </form>
    </div>
  </div><!-- modal-dialog -->
</div><!-- modal -->

<div id="addprovider-1" class="modal fade">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content tx-size-sm">
      <div class="modal-header pd-x-20">
        <h6 class="tx-14 mg-b-0 tx-capitalize tx-inverse tx-medium">Add STS Service Provider</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="#" data-parsley-validate data-parsley-errors-messages-disabled>
        <div class="modal-body pd-20">
          <div class="row">
            <div class="col-lg-6">
              <div class="row mg-b-10">
                <div class="col-lg-12">
                  <div class="form-group mg-b-10-force">
                    <label class="form-control-label">Company Name : </label>
                    <input class="form-control" type="text" value="" placeholder="Insert Company" required>
                  </div>
                </div><!-- col-12 -->
              </div><!-- row -->
              <div class="row mg-b-10">
                <div class="col-lg-12">
                  <div class="form-group mg-b-10-force">
                    <label class="form-control-label">Company Address : </label>
                    <input class="form-control mg-b-10-force" type="text" value="" placeholder="Address Line 1" required>
                    <input class="form-control" type="text" value="" placeholder="Address Line 2">
                  </div>
                </div><!-- col-12 -->
              </div><!-- row -->
              <div class="row mg-b-10">
                <div class="col-lg-6">
                  <div class="form-group mg-b-10-force">
                    <label class="form-control-label">ZIP / Postal Code : </label>
                    <input class="form-control" type="number" value="" placeholder="">
                  </div>
                </div><!-- col-6 -->
                <div class="col-lg-6">
                  <div class="form-group mg-b-10-force">
                    <label class="form-control-label">Country : </label>
                    <input class="form-control" type="text" value="" placeholder="">
                  </div>
                </div><!-- col-6 -->
                <div class="col-lg-12">
                  <div class="form-group mg-b-10-force">
                    <label class="form-control-label">Contact Person : </label>
                    <input class="form-control" type="text" value="" placeholder="Insert Name" required>
                  </div>
                </div><!-- col-12 -->
              </div><!-- row -->
            </div><!-- col-6 -->
            <div class="col-lg-6">
              <div class="row mg-b-10">
                <div class="col-lg-12">
                  <div class="form-group mg-b-10-force">
                    <label class="form-control-label">Company Email : </label>
                    <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
                  </div>
                </div><!-- col-12 -->
              </div><!-- row -->
              <div class="row mg-b-10">
                <div class="col-lg-12">
                  <div class="form-group mg-b-10-force">
                    <label class="form-control-label">Telephone : </label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fa fa-phone tx-16 lh-0 op-6"></i>
                        </div>
                      </div><!-- input-group-prepend -->
                      <input id="phoneMask" type="text" class="form-control" placeholder="(000) 000-0000" required>
                    </div><!-- input-group -->
                  </div>
                </div><!-- col-12 -->
              </div><!-- row -->
            </div><!-- col-6 -->
          </div><!-- row -->
        </div><!-- modal-body -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-info">Add</button>
          <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
      </form>
    </div>
  </div><!-- modal-dialog -->
</div><!-- modal -->

<div id="addmothership-1" class="modal fade">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content tx-size-sm">
      <div class="modal-header pd-x-20">
        <h6 class="tx-14 mg-b-0 tx-capitalize tx-inverse tx-medium">Add Mother Ship</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="#" data-parsley-validate data-parsley-errors-messages-disabled>
        <div class="modal-body pd-20">
          <div class="row mg-b-10">
            <div class="col-lg-12">
              <div class="form-group mg-b-10-force">
                <label class="form-control-label">Vessel Name : </label>
                <input class="form-control" type="text" value="" placeholder="" required>
              </div>
            </div><!-- col-12 -->
          </div><!-- row -->
          <div class="row mg-b-10">
            <div class="col-lg-12">
              <div class="form-group mg-b-10-force">
                <label class="form-control-label">Vessel Type : </label>
                <input class="form-control" type="text" value="" placeholder="" required>
              </div>
            </div><!-- col-12 -->
          </div><!-- row -->
          <div class="row mg-b-10">
            <div class="col-lg-12">
              <div class="form-group mg-b-10-force">
                <label class="form-control-label">Length Overall - LOA : </label>
                <div class="input-group">
                  <input type="number" class="form-control" required>
                  <div class="input-group-append">
                    <span class="input-group-text">m</span>
                  </div>
                </div><!-- input-group -->
              </div>
            </div><!-- col-12 -->
          </div><!-- row -->
          <div class="row mg-b-10">
            <div class="col-lg-12">
              <div class="form-group mg-b-10-force">
                <label class="form-control-label">Deadweight Tonnage - DWT : </label>
                <div class="input-group">
                  <input type="number" class="form-control" required>
                  <div class="input-group-append">
                    <span class="input-group-text">t</span>
                  </div>
                </div><!-- input-group -->
              </div>
            </div><!-- col-12 -->
          </div><!-- row -->
        </div><!-- modal-body -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-info">Add</button>
          <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
      </form>
    </div>
  </div><!-- modal-dialog -->
</div><!-- modal -->

<div id="addmanueveringship-1" class="modal fade">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content tx-size-sm">
      <div class="modal-header pd-x-20">
        <h6 class="tx-14 mg-b-0 tx-capitalize tx-inverse tx-medium">Add Maneuvering Ship</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="#" data-parsley-validate data-parsley-errors-messages-disabled>
        <div class="modal-body pd-20">
          <div class="row mg-b-10">
            <div class="col-lg-12">
              <div class="form-group mg-b-10-force">
                <label class="form-control-label">Vessel Name : </label>
                <input class="form-control" type="text" value="" placeholder="" required>
              </div>
            </div><!-- col-12 -->
          </div><!-- row -->
          <div class="row mg-b-10">
            <div class="col-lg-12">
              <div class="form-group mg-b-10-force">
                <label class="form-control-label">Vessel Type : </label>
                <input class="form-control" type="text" value="" placeholder="" required>
              </div>
            </div><!-- col-12 -->
          </div><!-- row -->
          <div class="row mg-b-10">
            <div class="col-lg-12">
              <div class="form-group mg-b-10-force">
                <label class="form-control-label">Length Overall - LOA : </label>
                <div class="input-group">
                  <input type="number" class="form-control" required>
                  <div class="input-group-append">
                    <span class="input-group-text">m</span>
                  </div>
                </div><!-- input-group -->
              </div>
            </div><!-- col-12 -->
          </div><!-- row -->
          <div class="row mg-b-10">
            <div class="col-lg-12">
              <div class="form-group mg-b-10-force">
                <label class="form-control-label">Deadweight Tonnage - DWT : </label>
                <div class="input-group">
                  <input type="number" class="form-control" required>
                  <div class="input-group-append">
                    <span class="input-group-text">t</span>
                  </div>
                </div><!-- input-group -->
              </div>
            </div><!-- col-12 -->
          </div><!-- row -->
        </div><!-- modal-body -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-info">Add</button>
          <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
     </form>
    </div>
  </div><!-- modal-dialog -->
</div><!-- modal -->


@stop

@section('docready')
<script type="text/javascript">
  function handleSelect(elm)
  {
    // window.location = elm.value+".html";
  }
</script>
<script>
  $('.disabled').click(function(e){
    e.preventDefault();
  })
  $(".select2").select2({
    width: 'resolve' // need to override the changed default
  });
  $('#datatable1').DataTable({
    bLengthChange: false,
    pageLength: 5,
    searching: false,
    sorting: false,
    responsive: true
  });
  $('#datatable2').DataTable({
    bLengthChange: false,
    pageLength: 5,
    searching: false,
    sorting: false,
    responsive: true
  });
  $('#datatable3').DataTable({
    bLengthChange: false,
    pageLength: 5,
    searching: false,
    sorting: false,
    responsive: true
  });
  $('#datatable-mothership').DataTable({
    bLengthChange: false,
    pageLength: 5,
    searching: false,
    sorting: false,
    responsive: true
  });
  $('#datatable-manueveringship').DataTable({
    bLengthChange: false,
    pageLength: 5,
    searching: false,
    sorting: false,
    responsive: true
  });
  $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
    $($.fn.dataTable.tables(true)).DataTable()
    .columns.adjust()
    .responsive.recalc();
  });
  $(function(){
    'use strict';
    $('#selectForm-01').parsley();
    $('#selectForm-02').parsley();
  });

  // Input Masks
  $('#phoneMask').mask('(999) 999-9999');
  $('#time-03').mask('99:99');
  $('#time-04').mask('99:99');
  $('#time-05').mask('99:99');

  // function printData()
  // {
  //   var divToPrint=document.getElementById("datatable1").innerHTML;
  //
  //   var style = "<style>";
  //   style = style + "table {width: 100%;font: 17px Calibri;}";
  //   style = style + "table, th, td {border: solid 1px #DDD; border-collapse: collapse;";
  //   style = style + "padding: 2px 3px;text-align: center;}";
  //   style = style + "</style>";
  //
  //   var win = window.open('', '', '');
  //   // win.document.write(divToPrint.outerHTML);
  //
  //   win.document.write('<html><head>');
  //   win.document.write('<title>Profile</title>');   // <title> FOR PDF HEADER.
  //   win.document.write(style);          // ADD STYLE INSIDE THE HEAD TAG.
  //   win.document.write('</head>');
  //   win.document.write('<body>');
  //   win.document.write(divToPrint);         // THE TABLE CONTENTS INSIDE THE BODY TAG.
  //   win.document.write('</body></html>');
  //
  //   win.print();
  //   win.close();
  // }
  // $('#buttonprint').on('click',function(){
  //   printData();
  //   // window.print();
  //   return false; // why false?
  // })

</script>
@stop
