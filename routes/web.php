<?php

#login
Route::get('/','Auth\LoginController@login');
Route::get('/login','Auth\LoginController@login');
Route::post('/login','Auth\LoginController@login');
Route::get('/logout','Auth\LoginController@doLogout');
Route::get('logout','Auth\LoginController@doLogout');
Route::get('comingsoon', function () {
    return view('comingsoon');
});

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

#Forgot password
Route::any('forgot-password', 'Auth\ResetPasswordController@forgotPassword');
Route::get('reset-password/{code}', 'Auth\ResetPasswordController@resetPassword');
Route::post('do-reset-password', 'Auth\ResetPasswordController@doResetPassword');

#error
Route::get('error', 'HomeController@error');

Route::group(['middleware' => 'loggedin', 'middleware' => 'notification'], function() {
// Route::group(['middleware' => 'loggedin'], function() {

  #dashboard
  Route::get('dashboard', 'HomeController@dashboard');
  Route::get('noticeboard', 'HomeController@noticeboard');
  Route::get('get-notice-body/{nid}', 'HomeController@getNoticeBody');
  Route::post('do-delete-notice', 'HomeController@doDeleteNotice');
  Route::post('do-add-notice', 'HomeController@doAddNotice');
  Route::get('activity-log', 'HomeController@activityLog');
  Route::get('dashboard-poac', 'HomeController@dashboardPoac');

  #Assets
  Route::get('assets', 'AssetController@assets');
  Route::get('ratecard', 'AssetController@rateCard');
  Route::get('jobitems', 'AssetController@jobItems');
  Route::get('get-body-job-items', 'AssetController@getBodyJobItems');
  Route::get('do-delete-job-item/{id}', 'AssetController@doDeleteJobItem');
  // Route::get('do-add-job-items/{item}/{desc}', 'AssetController@doAddJobItems');
  Route::get('do-add-job-items', 'AssetController@doAddJobItems');
  Route::get('do-update-status-job-item/{item}/{status}', 'AssetController@doUpdateStatusJobItem');
  Route::get('edit-company/{type}/{id}', 'AssetController@editCompany');
  Route::post('do-save-company', 'AssetController@doSaveCompany');
  Route::post('do-add-company', 'AssetController@doAddCompany');
  Route::post('add-ship', 'AssetController@doAddShip');
  Route::get('edit-ship/{id}', 'AssetController@editShip');
  Route::post('save-ship', 'AssetController@doSaveShip');

  #Operations
  Route::any('jobrecords','OperationController@jobRecords');
  Route::any('jobrecords-poac','OperationController@jobRecordsPoac');
  Route::get('addnewjob','OperationController@addNewJob');
  Route::get('jobinfo/{job_id}','OperationController@jobInfo');
  Route::get('jobinfo-poac/{job_id}','OperationController@jobInfoPoac');
  Route::get('poacstatus','OperationController@poacStatus');
  Route::post('doAddNewJob','OperationController@doAddNewJob');
  Route::post('doDeleteJob','OperationController@doDeleteJob');
  Route::post('doEditJob','OperationController@doEditJob');
  Route::get('get-rate-card-select/{id}','OperationController@getRateCardSelect');
  Route::get('do-calculate-hour','OperationController@doCalculateHour');
  Route::post('doAddNewJobPilotage','OperationController@doAddNewJobPilotage');
  Route::get('jobinfo-pilotage/{id}','OperationController@jobInfoPilotage');
  Route::get('jobinfo-pilotage-poac/{id}','OperationController@jobInfoPilotagePoac');
  Route::post('doEditJobPilotage','OperationController@doEditJobPilotage');
  Route::post('doDeleteJobPilotage','OperationController@doDeleteJobPilotage');
  Route::get('do-check-code/{type}','OperationController@doCheckCode');

  #Vouchers
  Route::any('vouchersrecord/{id?}','VoucherController@vouchersRecord');
  Route::any('vouchersrecord-pilotage/{id?}','VoucherController@vouchersRecordPilotage');
  Route::get('add-voucher/{job_id}/{type}','VoucherController@addVoucher');
  Route::post('do-add-voucher','VoucherController@doAddVoucher');
  Route::post('do-submit-voucher','VoucherController@doSubmitVoucher');
  Route::post('do-submit-voucher-pilotage','VoucherController@doSubmitVoucherPilotage');
  Route::get('get-voucher-body/{voucherId}','VoucherController@getVoucherBody');
  Route::get('get-voucher-body-pilotage/{voucherId}','VoucherController@getVoucherBodyPilotage');
  Route::post('do-verify-voucher','VoucherController@doVerifyVoucher');
  Route::post('do-verify-voucher-pilotage','VoucherController@doVerifyVoucherPilotage');
  Route::get('submit-voucher','VoucherController@submitVoucher');
  Route::get('submit-voucher-pilotage','VoucherController@submitVoucherPilotage');
  Route::get('get-voucher-form-body','VoucherController@getVoucherFormBody');
  Route::post('do-delete-voucher','VoucherController@doDeleteVoucher');
  Route::post('do-delete-voucher-pilotage','VoucherController@doDeleteVoucherPilotage');

  #Personnel
  Route::get('personnelboard','PersonnelController@personnelBoard');
  Route::get('adduser','PersonnelController@addUser');
  Route::post('do-add-user','PersonnelController@doAddUser');
  Route::any('profile','PersonnelController@profile');
  Route::get('view-profile/{id}','PersonnelController@viewProfile');
  Route::post('do-upload-picture','PersonnelController@doUploadPic');
  Route::post('delete-user','PersonnelController@doDeleteUser');
  Route::get('approve-user/{uid}','PersonnelController@doApproveUser');

  #Notification
  Route::get('notifications','NotificationController@getNotifications');


  #pdf
  Route::get('pdf-job-records/{type}/{month}/{year}','OperationController@getPdfJobRecords');
  Route::get('pdf-voucher-detail/{vid}','VoucherController@getPdfVoucherDetail');

  #print
  Route::get('print-job-detail/{type}/{month}/{year}','OperationController@printJobRecords');
  Route::get('print-voucher-detail/{vid}','VoucherController@printVoucherDetail');
});
