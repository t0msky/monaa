<?php namespace App\Http\Controllers;


use DB;
use Carbon\Carbon;
use App\User;
use App\Asset;
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

		//dapatkan variable daripada middleware
		$userInfo = resolve('userInfo');

		if ($userInfo->usr_role != "AD") {
			return redirect('error');
		}

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

	public function assets() {

		//dapatkan variable daripada middleware
		$userInfo = resolve('userInfo');
		//Client
		$client = Asset::getAllClient();
		$provider = Asset::getAllOperator('Service Provider');
		$operator = Asset::getAllOperator('Operator');
		$mothership = Asset::getAllShipByType('Mothership');
		$maneuvering = Asset::getAllShipByType('Maneuvering');

		return view('assets')
				 ->with('client',$client)
				 ->with('provider',$provider)
				 ->with('operator',$operator)
				 ->with('mothership',$mothership)
				 ->with('maneuvering',$maneuvering)
				 ->with('user',$userInfo);
	}

	public function editCompany ($type, $id) {

		//dapatkan variable daripada middleware
		$userInfo = resolve('userInfo');

		if ($userInfo->usr_role != "AD") {
			return redirect('error');
		}

		//dapatkan variable daripada middleware
		$userInfo = resolve('userInfo');

		if ($type == "client") {
			$table = "clients";
			$view = "editClient";
		} else if ($type == "operator") {
			$table = "sts_operator_service";
			$view = "editOperator";
		} else if ($type == "servis") {
			$table = "sts_operator_service";
			$view = "editOperator";
		}

		$company = Asset::getCompanyById($table, $id);

		return view($view)
				 ->with('company',$company)
				 ->with('type',$type)
				 ->with('user',$userInfo);

		// echo '<pre>'; print_r($company); die();

	}

	public function doSaveCompany (request $request) {

		//dapatkan variable daripada middleware
		$userInfo = resolve('userInfo');

		if ($userInfo->usr_role != "AD") {
			return redirect('error');
		}

		if ($request->type == "client") {

			$data = array(
				'client_name' 					=> $request->client_name,
				'client_add1' 					=> $request->client_add1,
				'client_add2' 					=> $request->client_add2,
				'client_zipcode' 				=> $request->client_zipcode,
				'client_state' 					=> $request->client_state,
				'client_country' 				=> $request->client_country,
				'client_contact_person' => $request->client_contact_person,
				'client_email' 					=> $request->client_email,
				'client_phone' 					=> $request->client_phone
			);
			DB::table('clients')->where('client_id',$request->client_id)->update($data);
			return redirect('edit-company/client/'.$request->client_id)->with('success',"Company info updated.");
		}
		else {
			$data = array(
				'sts_name' 						=> $request->sts_name,
				'sts_address' 				=> $request->sts_address,
				'sts_address2' 				=> $request->sts_address2,
				'sts_postcode' 				=> $request->sts_postcode,
				'sts_state' 					=> $request->sts_state,
				'sts_country' 				=> $request->sts_country,
				'sts_email' 					=> $request->sts_email,
				'sts_tel' 						=> $request->sts_tel,
				'sts_contact_person'	=> $request->sts_contact_person
			);
			DB::table('sts_operator_service')->where('sts_id',$request->sts_id)->update($data);
			return redirect('edit-company/operator/'.$request->sts_id)->with('success',"Company info updated.");
		}
	}

	public function doAddCompany (request $request) {

		//dapatkan variable daripada middleware
		$userInfo = resolve('userInfo');

		if ($userInfo->usr_role != "AD") {
			return redirect('error');
		}

		if ($request->type == "client") {

			$data = array(
				'client_name' 					=> $request->client_name,
				'client_add1' 					=> $request->client_add1,
				'client_add2' 					=> $request->client_add2,
				'client_zipcode' 				=> $request->client_zipcode,
				'client_state' 					=> $request->client_state,
				'client_country' 				=> $request->client_country,
				'client_contact_person' => $request->client_contact_person,
				'client_email' 					=> $request->client_email,
				'client_phone' 					=> $request->client_phone
			);
			DB::table('clients')->insert($data);
			return redirect('assets')->with('success',"New Company added.");

		} else {

			$data = array(
				'sts_name' 						=> $request->sts_name,
				'sts_address' 				=> $request->sts_address,
				'sts_address2' 				=> $request->sts_address2,
				'sts_postcode' 				=> $request->sts_postcode,
				'sts_state' 					=> $request->sts_state,
				'sts_country' 				=> $request->sts_country,
				'sts_email' 					=> $request->sts_email,
				'sts_tel' 						=> $request->sts_tel,
				'sts_contact_person'	=> $request->sts_contact_person,
				'sts_type'						=> $request->type,
			);

			DB::table('sts_operator_service')->insert($data);
			return redirect('assets')->with('success',"New Company added.");

		}

	}

	public function doAddShip (request $request) {

		//dapatkan variable daripada middleware
		$userInfo = resolve('userInfo');

		if ($userInfo->usr_role != "AD") {
			return redirect('error');
		}

		$data = array(
			'ship_imo_no' 	=> $request->ship_imo_no,
			'ship_name' 		=> $request->ship_name,
			'ship_category' => $request->ship_category,
			'ship_type' 		=> $request->ship_type,
			'ship_LOA' 			=> $request->ship_LOA,
			'ship_DWT' 			=> $request->ship_DWT
		);

		DB::table('ships')->insert($data);
		return redirect('assets')->with('success',"New Vessel added.");
	}

	public function editShip ($shipId) {

		//dapatkan variable daripada middleware
		$userInfo = resolve('userInfo');
		$ship = Asset::getShipById($shipId);

		if ($userInfo->usr_role != "AD") {
			return redirect('error');
		}
		// echo '<pre>'; print_r($ship); die();

		return view('editShip')
				 ->with('ship',$ship)
				 ->with('user',$userInfo);
	}

	public function doSaveShip (request $request) {

		//dapatkan variable daripada middleware
		$userInfo = resolve('userInfo');

		if ($userInfo->usr_role != "AD") {
			return redirect('error');
		}

		$data = array(
			'ship_imo_no' 	=> $request->ship_imo_no,
			'ship_name' 		=> $request->ship_name,
			'ship_type' 		=> $request->ship_type,
			'ship_LOA' 			=> $request->ship_LOA,
			'ship_DWT' 			=> $request->ship_DWT
		);

		DB::table('ships')->where('ship_id', $request->ship_id)->update($data);
		return redirect('edit-ship/'.$request->ship_id)->with('success',"Vessel info updated.");
	}
}
