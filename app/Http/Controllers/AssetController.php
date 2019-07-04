<?php namespace App\Http\Controllers;


use DB;
use Carbon\Carbon;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AssetController extends Controller {


	public function __construct(){

		$this->middleware('loggedin');
	}

  public function rateCard (request $request) {

		//dapatkan variable daripada middleware
		$userInfo = resolve('userInfo');

    return view('rateCard')->with('user',$userInfo);
  }

	public function jobItems (request $request) {

		//dapatkan variable daripada middleware
		$userInfo = resolve('userInfo');

		if ($userInfo->usr_role != "AD") {
			return redirect('error');
		}

		//dapatkan job item
		$jobItems = DB::table('job_items')->orderBy('item_name')->get();

    return view('jobItems')
				 ->with('items',$jobItems)
				 ->with('user',$userInfo);
  }

	public function doAddJobItems (request $request) {

		$jobItem = $request->jobItem;
		$jobItemName = $request->jobItemHour;

		$size = sizeof($jobItem);

		for ($no = 0; $no < $size; $no++ ) {

			$dataJobItem = array(
				'item_desc' => $jobItem[$no],
				'item_name' => $jobItemName[$no]
			);

			DB::table('job_items')->insert($dataJobItem);
		}
		return redirect('jobitems')->with('success',"Successfully added new Job Items.");
		// echo '<pre>'; print_r($jobItem); print_r($jobItemName); die();
	}

}
