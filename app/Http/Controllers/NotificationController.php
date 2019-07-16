<?php namespace App\Http\Controllers;


use DB;
use Carbon\Carbon;
use App\User;
use App\Asset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class NotificationController extends Controller {


	public function __construct(){

		$this->middleware('loggedin');
	}

  public function doInsertNotification ($not_foreign_id, $not_foreign_note, $not_receiver, $not_type) {

		$data = array(
			'not_foreign_id' 	=> $not_foreign_id,
			'not_foreign_note' 	=> $not_foreign_note,
			'not_receiver' 		=> $not_receiver,
			'not_type' 				=> $not_type,
			'not_sender' 			=> session('user'),
			'not_created' 		=> Carbon::now()
		);
		// echo '<pre>'; print_r($dataNotice); die();
		$insert = DB::table('notification')->insert($data);

  }

	public function getNotifications () {

		$userInfo = resolve('userInfo');

		return view('notifications')
					->with('user',$userInfo);
	}


}
