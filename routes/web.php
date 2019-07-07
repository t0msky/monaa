<?php

#login
Route::get('/','Auth\LoginController@login');
Route::get('/login','Auth\LoginController@login');
Route::post('/login','Auth\LoginController@login');
Route::get('/logout','Auth\LoginController@doLogout');

#Registration
Route::get('register', 'Auth\RegisterController@getRegister');
Route::post('postRegister', 'Auth\RegisterController@postRegister');
Route::get('verify/{code}', 'Auth\RegisterController@doVerifyAccount');
Route::get('registerSuccess', function () {
    return view('registerSuccess');
});
Route::get('register-verified', function () {
    return view('verifySuccess');
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

  #Test
  Route::get('test', 'HomeController@testemel');
  Route::get('downloadPDF','HomeController@downloadPDF');
  Route::get('doRunTerminal','HomeController@doRunTerminal');

  #Assets
  Route::get('assets', 'AssetController@assets');
  Route::get('ratecard', 'AssetController@rateCard');
  Route::get('jobitems', 'AssetController@jobItems');
  Route::post('do-add-job-items', 'AssetController@doAddJobItems');
  Route::get('edit-company/{type}/{id}', 'AssetController@editCompany');
  Route::post('do-save-company', 'AssetController@doSaveCompany');
  Route::post('do-add-company', 'AssetController@doAddCompany');
  Route::post('add-ship', 'AssetController@doAddShip');
  Route::get('edit-ship/{id}', 'AssetController@editShip');
  Route::post('save-ship', 'AssetController@doSaveShip');

  #Operations
  Route::any('jobrecords','OperationController@jobRecords');
  Route::get('addnewjob','OperationController@addNewJob');
  Route::get('jobinfo/{job_id}','OperationController@jobInfo');
  Route::get('poacstatus','OperationController@poacStatus');
  Route::post('doAddNewJob','OperationController@doAddNewJob');
  Route::post('doDeleteJob','OperationController@doDeleteJob');
  Route::post('doEditJob','OperationController@doEditJob');

  #Vouchers
  Route::any('vouchersrecord','VoucherController@vouchersRecord');
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
  Route::post('delete-user','PersonnelController@doDeleteUser');

  #pdf
  Route::get('pdf-job-records/{type}/{month}/{year}','OperationController@getPdfJobRecords');
  Route::get('pdf-voucher-detail/{vid}','VoucherController@getPdfVoucherDetail');

  #print
  Route::get('print-job-detail/{type}/{month}/{year}','OperationController@printJobRecords');
  Route::get('print-voucher-detail/{vid}','VoucherController@printVoucherDetail');
});
