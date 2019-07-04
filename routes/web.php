<?php

#login
Route::get('/','Auth\LoginController@login');
Route::get('/login','Auth\LoginController@login');
Route::post('/login','Auth\LoginController@login');
Route::get('/logout','Auth\LoginController@doLogout');

#Registration
Route::get('register', 'Auth\RegisterController@getRegister');
Route::post('postRegister', 'Auth\RegisterController@postRegister');
Route::get('registerSuccess', function () {
    return view('registerSuccess');
});

#error
Route::get('error', 'HomeController@error');

Route::group(['middleware' => 'loggedin'], function() {

  #dashboard
  Route::get('dashboard', 'HomeController@dashboard');
  Route::get('noticeboard', 'HomeController@noticeboard');
  Route::get('get-notice-body/{nid}', 'HomeController@getNoticeBody');
  Route::post('do-delete-notice', 'HomeController@doDeleteNotice');
  Route::post('do-add-notice', 'HomeController@doAddNotice');

  #Assets
  Route::get('ratecard', 'AssetController@rateCard');
  Route::get('jobitems', 'AssetController@jobItems');
  Route::post('do-add-job-items', 'AssetController@doAddJobItems');

  #Operations
  Route::get('jobrecords','OperationController@jobRecords');
  Route::get('addnewjob','OperationController@addNewJob');
  Route::get('jobinfo/{job_id}','OperationController@jobInfo');
  Route::get('poacstatus','OperationController@poacStatus');
  Route::post('doAddNewJob','OperationController@doAddNewJob');
  Route::post('doDeleteJob','OperationController@doDeleteJob');
  Route::post('doEditJob','OperationController@doEditJob');

  #Vouchers
  Route::get('vouchersrecord','VoucherController@vouchersRecord');
  Route::get('add-voucher/{job_id}/{type}','VoucherController@addVoucher');
  Route::post('do-add-voucher','VoucherController@doAddVoucher');
  Route::post('do-submit-voucher','VoucherController@doSubmitVoucher');
  Route::get('get-voucher-body/{voucherId}','VoucherController@getVoucherBody');
  Route::post('do-verify-voucher','VoucherController@doVerifyVoucher');
  Route::get('submit-voucher','VoucherController@submitVoucher');
  Route::get('get-voucher-form-body','VoucherController@getVoucherFormBody');
  Route::post('do-delete-voucher','VoucherController@doDeleteVoucher');

  #Personnel
  Route::get('personnelboard','PersonnelController@personnelBoard');
  Route::get('adduser','PersonnelController@addUser');
  Route::post('do-add-user','PersonnelController@doAddUser');
  Route::any('profile','PersonnelController@profile');
  Route::get('view-profile/{id}','PersonnelController@viewProfile');
  Route::post('do-upload-picture','PersonnelController@doUploadPic');



});
