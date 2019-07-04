<?php namespace App\Http\Controllers;


use DB;
use Carbon\Carbon;
use App\User;
use App\Operation;
use App\Ship;
use App\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class VoucherController extends Controller {


	public function __construct(){

		$this->middleware('loggedin');
	}

  public function vouchersRecord (request $request) {

		//dapatkan variable daripada middleware
		$userInfo = resolve('userInfo');

		if ($userInfo->usr_role == "AD") {

			$vouchers = Voucher::getAllVoucher();

		} else if ($userInfo->usr_role == "CP") {
			$vouchers = Voucher::getAllVoucherByUserId($userInfo->usr_id);
		}

    return view('vouchersRecord')
				 ->with('vouchers',$vouchers)
				 ->with('user',$userInfo);
  }

  public function addVoucher ($job_id, $type) {

		//dapatkan variable daripada middleware
		$userInfo = resolve('userInfo');

		//dapatkan job info
		$job = Operation::getJobByid($job_id);

		//dapatkan ship manuevering
		$manuevering = Ship::getShipById($job->job_maneuveringship);

		//dapatkan job item
		$jobItems = DB::table('job_items')->get();

		//dapatkan user cp
		$users = User::getAllUserByRole('CP');

    return view('addVoucher')
				 ->with('type',$type)
				 ->with('job',$job)
				 ->with('manuevering',$manuevering)
				 ->with('jobItems',$jobItems)
				 ->with('users',$users)
				 ->with('user',$userInfo);
  }

	public function doAddVoucher (request $request) {

		$jobItem = $request->jobItem;
		$jobItemHour = $request->jobItemHour;

		$explode_date = explode('/',$request->vou_date);
		$vou_date = $explode_date[2].'-'.$explode_date[0].'-'.$explode_date[1];

		if ($request->vou_code != '' && $request->vou_job_id != '' && $vou_date != '' && $request->vou_type != ''
			  && $request->vou_ship != '' && $request->vou_master != '' && $request->vou_agent != '' && $request->vou_agent != '') {

				$process = true;
		} else {
				$process = false;
		}

		if ($process) {

			$dataVoucher = array(
				'vou_code' 		=> $request->vou_code,
				'vou_job_id' 	=> $request->vou_job_id,
				'vou_date' 		=> $vou_date,
				'vou_type' 		=> $request->vou_type,
				'vou_ship' 		=> $request->vou_ship,
				'vou_master' 	=> $request->vou_master,
				'vou_agent' 	=> $request->vou_agent,
				'vou_remark' 	=> $request->vou_remark,
				'vou_created' => Carbon::now()
			);

			$vou_id = DB::table('vouchers')->insertGetId($dataVoucher);

			$size = sizeof($jobItem);

			for ($no = 0; $no < $size; $no++ ) {

				$dataJobItem = array(
					'vjob_vou_id' => $vou_id,
					'vjob_job_item_name' => $jobItem[$no],
					'vjob_job_item_hour' => $jobItemHour[$no]
				);

				DB::table('voucher_job_items')->insert($dataJobItem);
			}

			//update voucher code dlm table jobs
			if ($request->vou_type == "Berthing") {
				$attrName = "job_berthing";
			} else {
				$attrName = "job_unberthing";
			}
			DB::table('jobs')->where('job_id',$request->vou_job_id)->update( array($attrName =>$request->vou_code) );

			return redirect('jobinfo/'.$request->vou_job_id)->with('success', "Successfully added new voucher.");
			// echo '<pre>'; print_r($size); print_r($jobItem); die();

		} else {

			if ($request->vou_type == "Berthing") { $t = "1"; } else if ($request->vou_type == 'Unberthing') { $t = "2"; }

			return redirect('add-voucher/'.$request->vou_job_id.'/'.$t)->with('error',"Unable to add voucher. Check your form and please try again.");
		}

	}

	public function getVoucherBody($voucherId) {

		//dapatkan variable daripada middleware
		$userInfo = resolve('userInfo');

		//dapatkan voucher dan job detail
		$voucher = Voucher::getVoucherDetail($voucherId);
		//dapatkan operator dan service provider
		$operator = DB::table('sts_operator_service')->where('sts_id', $voucher->job_operator)->first();
		$provider = DB::table('sts_operator_service')->where('sts_id', $voucher->job_provider)->first();
		//dapatkan ship data
		$ship = DB::table('ships')->where('ship_id', $voucher->vou_ship)->first();
		//get all job items
		$items = DB::table('voucher_job_items')->where('vjob_vou_id', $voucherId)->get();
		//get master mooring
		$master = User::getUserById($voucher->vou_master);
		$agent = User::getUserById($voucher->vou_agent);

		// echo '<pre>'; print_r($voucher); die();
		return view('voucherBody')
				 ->with('voucher',$voucher)
				 ->with('operator',$operator)
				 ->with('provider',$provider)
				 ->with('ship',$ship)
				 ->with('items',$items)
				 ->with('master',$master)
				 ->with('agent',$agent)
				 ->with('user',$userInfo);
	}

	public function doVerifyVoucher (request $request) {

		//dapatkan variable daripada middleware
		$userInfo = resolve('userInfo');

		if ($userInfo->usr_role != "AD") {
			return redirect('error');
		} else {

			$vou_id = $request->vou_id;

			if ($vou_id) {

				//dapatkan voucher dan job detail
				$voucher = Voucher::getVoucherDetail($vou_id);

				$voucherData = array(
					'vou_status' => 'Verified'
				);
				$updateVoucher = DB::table('vouchers')->where('vou_id', $vou_id)->update($voucherData);

				return redirect('vouchersrecord')->with('success','Voucher '.$voucher->vou_code.' has beed verified.');
			}
			// echo '<pre>'; print_r($vou_id); die();
		}
	}

	public function submitVoucher (request $request) {

		//dapatkan variable daripada middleware
		$userInfo = resolve('userInfo');

		//dapatkan job yang belum complete vouchers
		if ($userInfo->usr_role == "AD") {

			$jobs = Operation::getAllJobNoVoucher();
			$firstJobs = Operation::getFirstJobNoVoucher();


		} else if ($userInfo->usr_role == "CP") {
			$jobs = Operation::getAllJobNoVoucherByUser($userInfo->usr_id);
			$firstJobs = Operation::getFirstJobNoVoucherByUser($userInfo->usr_id);
		}

		// echo '<pre>'; print_r($firstJobs); die();

		//dapatkan job item
		$jobItems = DB::table('job_items')->get();
		//dapatkan user cp
		$users = User::getAllUserByRole('CP');

		return view('submitVoucher')
				 ->with('jobs',$jobs)
				 ->with('firstJobs',$firstJobs)
				 ->with('jobItems',$jobItems)
				 ->with('users',$users)
				 ->with('user',$userInfo);
	}

	public function getVoucherFormBody () {

		//dapatkan job item
		$jobItems = DB::table('job_items')->get();


		return view('voucherFormBody')
				 ->with('jobItems',$jobItems);
	}

	public function doSubmitVoucher (request $request) {

		$jobItem = $request->jobItem;
		$jobItemHour = $request->jobItemHour;

		$explode_date = explode('/',$request->vou_date);
		$vou_date = $explode_date[2].'-'.$explode_date[0].'-'.$explode_date[1];

		if ($request->vou_code != '' && $request->vou_job_id != '' && $vou_date != '' && $request->vou_type != ''
			  && $request->vou_ship != '' && $request->vou_master != '' && $request->vou_agent != '' ) {

				$process = true;
		} else {
				$process = false;
		}

		if ($process) {

			$dataVoucher = array(
				'vou_code' 		=> $request->vou_code,
				'vou_job_id' 	=> $request->vou_job_id,
				'vou_date' 		=> $vou_date,
				'vou_type' 		=> $request->vou_type,
				'vou_ship' 		=> $request->vou_ship,
				'vou_master' 	=> $request->vou_master,
				'vou_agent' 	=> $request->vou_agent,
				'vou_remark' 	=> $request->vou_remark,
				'vou_created' => Carbon::now()
			);
			// echo '<pre>'; print_r($jobItemHour); die();
			$vou_id = DB::table('vouchers')->insertGetId($dataVoucher);

			$size = sizeof($jobItem);

			for ($no = 0; $no < $size; $no++ ) {

				$dataJobItem = array(
					'vjob_vou_id' => $vou_id,
					'vjob_job_item_name' => $jobItem[$no],
					'vjob_job_item_hour' => $jobItemHour[$no]
				);

				DB::table('voucher_job_items')->insert($dataJobItem);
			}

			//update voucher code dlm table jobs
			if ($request->vou_type == "Berthing") {
				$attrName = "job_berthing";
			} else {
				$attrName = "job_unberthing";
			}
			DB::table('jobs')->where('job_id',$request->vou_job_id)->update( array($attrName =>$request->vou_code) );

			return redirect('submit-voucher')->with('success', "Successfully added new voucher.");


		} else {

			if ($request->vou_type == "Berthing") { $t = "1"; } else if ($request->vou_type == 'Unberthing') { $t = "2"; }

			return redirect('add-voucher/'.$request->vou_job_id.'/'.$t)->with('error',"Unable to add voucher. Check your form and please try again.");
		}

	}

	public function doDeleteVoucher (request $request) {

		$voucher = Voucher::getVoucherDetail($request->vou_id);
		if ($voucher->vou_type == "Berthing") {
			$field = "job_berthing";
		} else if ($voucher->vou_type == "Unberthing") {
			$field = "job_unberthing";
		}
		// echo '<pre>'; print_r($voucher); die();

		//delete voucher dan voucher items
		DB::table('vouchers')->where('vou_id', $request->vou_id)->delete();
		DB::table('voucher_job_items')->where('vjob_vou_id', $request->vou_id)->delete();

		//update voucher kat jobs table
		DB::table('jobs')->where('job_id', $voucher->vou_job_id)->update(array($field => NULL));

		return redirect('vouchersrecord')->with('success', "Successfully delete voucher.");
	}

}
