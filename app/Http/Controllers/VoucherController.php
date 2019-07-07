<?php namespace App\Http\Controllers;


use DB;
use PDF;
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

		for ($i = 1; $i <= 12; $i++) {
    	$months[] = date("M Y", strtotime( date( '01-m-Y' )." -$i months"));
		}

		$currentMonth = date('M');
		$currentYear = date('Y');

		if ($request->isMethod('post') ) {
			$explodeDate = explode (' ', $request->dropdownMonthYear);
			$selectMonth = $explodeDate[0];
			$selectYear = $explodeDate[1];
			$selectMonthInNumber = date('m', strtotime($selectMonth));

			if ($userInfo->usr_role == "AD") {

				$vouchers = Voucher::getAllVoucher($selectMonthInNumber, $selectYear);
				$firstVouchers = Voucher::getFirstVoucher($selectMonthInNumber, $selectYear);

			} else if ($userInfo->usr_role == "CP") {
				// $vouchers = Voucher::getAllVoucherByUserId($userInfo->usr_id);
				// $firstVouchers = Voucher::getFirstVoucherByUserId($userInfo->usr_id);
			}

		} else {

			$selectMonth = $currentMonth;
			$selectYear = $currentYear;
			$selectMonthInNumber = date('m', strtotime($selectMonth));

			if ($userInfo->usr_role == "AD") {

				$vouchers = Voucher::getAllVoucher($selectMonthInNumber, $selectYear);
				$firstVouchers = Voucher::getFirstVoucher($selectMonthInNumber, $selectYear);

			} else if ($userInfo->usr_role == "CP") {
				$vouchers = Voucher::getAllVoucherByUserId($userInfo->usr_id,$selectMonthInNumber, $selectYear);
				$firstVouchers = Voucher::getFirstVoucherByUserId($userInfo->usr_id,$selectMonthInNumber, $selectYear);
			}
		}
		$selectMonthYear = $selectMonth.' '.$selectYear;

		//dapatkan operator dan service provider
		if (!empty($firstVouchers)) {
		$operator = DB::table('sts_operator_service')->where('sts_id', $firstVouchers->job_operator)->first();
		$provider = DB::table('sts_operator_service')->where('sts_id', $firstVouchers->job_provider)->first();
		//dapatkan ship data
		$ship = DB::table('ships')->where('ship_id', $firstVouchers->vou_ship)->first();
		//get all job items
		$items = DB::table('voucher_job_items')->where('vjob_vou_id', $firstVouchers->vou_id)->get();
		//get master mooring
		$master = User::getUserById($firstVouchers->vou_master);
		$agent = User::getUserById($firstVouchers->vou_agent);

		} else {
			$operator = "";
			$provider = "";
			$ship = "";
			$items = "";
			$master = "";
			$agent = "";
		}
    return view('vouchersRecord')
				 ->with('vouchers',$vouchers)
				 ->with('firstVouchers',$firstVouchers)
				 ->with('operator',$operator)
				 ->with('provider',$provider)
				 ->with('ship',$ship)
				 ->with('items',$items)
				 ->with('master',$master)
				 ->with('agent',$agent)
				 ->with('months',$months)
				 ->with('currentMonth',$currentMonth)
				 ->with('currentYear',$currentYear)
				 ->with('selectMonthYear',$selectMonthYear)
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

	public function getPdfVoucherDetail ($vid) {

		$userInfo = resolve('userInfo');
		$voucher = Voucher::getVoucherDetail($vid);
		$operator = DB::table('sts_operator_service')->where('sts_id', $voucher->job_operator)->first();
		$provider = DB::table('sts_operator_service')->where('sts_id', $voucher->job_provider)->first();
		$ship = DB::table('ships')->where('ship_id', $voucher->vou_ship)->first();
		$items = DB::table('voucher_job_items')->where('vjob_vou_id', $voucher->vou_id)->get();
		$master = User::getUserById($voucher->vou_master);
		$agent = User::getUserById($voucher->vou_agent);

		$pdf = PDF::loadView('pdfs.pdf_voucher_detail', compact('voucher','user','operator','provider','ship','items','master','agent'));
		return $pdf->download('voucher'.$voucher->vou_code.'.pdf');

		// return view('pdfs.pdf_voucher_detail')
		// 		 ->with('user',$userInfo)
		// 		 ->with('operator',$operator)
		// 		 ->with('provider',$provider)
		// 		 ->with('ship',$ship)
		// 		 ->with('items',$items)
		// 		 ->with('master',$master)
		// 		 ->with('agent',$agent)
		// 		 ->with('voucher',$voucher);
	}

	public function printVoucherDetail ($vid) {

		$userInfo = resolve('userInfo');
		$voucher = Voucher::getVoucherDetail($vid);
		$operator = DB::table('sts_operator_service')->where('sts_id', $voucher->job_operator)->first();
		$provider = DB::table('sts_operator_service')->where('sts_id', $voucher->job_provider)->first();
		$ship = DB::table('ships')->where('ship_id', $voucher->vou_ship)->first();
		$items = DB::table('voucher_job_items')->where('vjob_vou_id', $voucher->vou_id)->get();
		$master = User::getUserById($voucher->vou_master);
		$agent = User::getUserById($voucher->vou_agent);

		return view('pdfs.pdf_voucher_detail')
				 ->with('user',$userInfo)
				 ->with('operator',$operator)
				 ->with('provider',$provider)
				 ->with('ship',$ship)
				 ->with('items',$items)
				 ->with('master',$master)
				 ->with('agent',$agent)
				 ->with('voucher',$voucher);
	}

}
