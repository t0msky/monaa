<?php namespace App\Http\Controllers;


use DB;
use PDF;
use Carbon\Carbon;
use App\Log;
use App\User;
use App\Client;
use App\Card;
use App\Ship;
use App\Operation;
use App\Voucher;
use App\Asset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class OperationController extends Controller {


	public function __construct(){

		$this->middleware('loggedin');
	}

  public function jobRecords (request $request) {

		//dapatkan variable daripada middleware
		$userInfo = resolve('userInfo');

		if ($userInfo->usr_role == "CP") {
			return redirect('jobrecords-poac');
		}

		//check date, auto set status to onboard
		$checking = Self::doCheckAndUpdateJobStatus();

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
		} else {
			$selectMonth = $currentMonth;
			$selectYear = $currentYear;
			$selectMonthInNumber = date('m', strtotime($selectMonth));
		}
		$selectMonthYear = $selectMonth.' '.$selectYear;

		$jobs = Operation::getAllJobByCat('FSU', $selectMonthInNumber, $selectYear);
		$jobsSpot = Operation::getAllJobByCat('SPOT', $selectMonthInNumber, $selectYear);
		$jobsPilotage = Operation::getAllPilotageJob($selectMonthInNumber, $selectYear);

    return view('jobRecords')
					->with('jobs',$jobs)
					->with('jobsSpot',$jobsSpot)
					->with('jobsPilotage',$jobsPilotage)
					->with('currentMonth',$currentMonth)
					->with('currentYear',$currentYear)
					->with('selectMonth',$selectMonth)
					->with('selectYear',$selectYear)
					->with('selectMonthYear',$selectMonthYear)
					->with('months',$months)
					->with('user',$userInfo);
  }
	public function jobRecordsPoac (request $request) {

		//dapatkan variable daripada middleware
		$userInfo = resolve('userInfo');

		//check date, auto set status to onboard
		$checking = Self::doCheckAndUpdateJobStatus();

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
		} else {
			$selectMonth = $currentMonth;
			$selectYear = $currentYear;
			$selectMonthInNumber = date('m', strtotime($selectMonth));
		}
		$selectMonthYear = $selectMonth.' '.$selectYear;

		$jobs = Operation::getAllJobByCatAndByUser('FSU', $userInfo->usr_id, $selectMonthInNumber, $selectYear);
		$jobsSpot = Operation::getAllJobByCatAndByUser('SPOT', $userInfo->usr_id, $selectMonthInNumber, $selectYear );
		$jobsPilotage = Operation::getAllPilotageJobByUserId($userInfo->usr_id, $selectMonthInNumber, $selectYear);

		return view('jobRecordsPoac')
					->with('jobs',$jobs)
					->with('jobsSpot',$jobsSpot)
					->with('jobsPilotage',$jobsPilotage)
					->with('currentMonth',$currentMonth)
					->with('currentYear',$currentYear)
					->with('selectMonth',$selectMonth)
					->with('selectYear',$selectYear)
					->with('selectMonthYear',$selectMonthYear)
					->with('months',$months)
					->with('user',$userInfo);
	}

	public function doCheckAndUpdateJobStatus() {

		$check = DB::table('jobs')
							 ->whereDate('job_commence_date', '<=', date('Y-m-d'))
							 ->where('job_status', '=', 'In-coming')
							 ->get();
		$checkPilotage = DB::table('jobs_pilotage')
							 				 ->whereDate('pil_onboard_date', '<=', date('Y-m-d'))
							 			 	 ->where('pil_status', '=', 'In-coming')
							 			 	 ->get();

		foreach ($check as $c) :
			$update = DB::table('jobs')->where('job_id','=',$c->job_id)->update(array('job_status'=>'On-Board'));
		endforeach;

		foreach ($checkPilotage as $c) :
			$update = DB::table('jobs_pilotage')->where('pil_id','=',$c->pil_id)->update(array('pil_status'=>'On-Board'));
		endforeach;

	}

  public function addNewJob (request $request) {

		//dapatkan variable daripada middleware
		$userInfo = resolve('userInfo');

		//dapatkan client
		$client = Client::getAllClient();

		//dapatkan rate cards yang active
		$cards = Card::getAllCards('Active');

		//dapatkan ships
		$mothership = Ship::getAllShipByCat('Mothership');
		$moneuvering = Ship::getAllShipByCat('Maneuvering');

		//dapatkan locations
		$locations = DB::table('locations')->get();

		//dapatkan sts operator dan service provider
		$stsOperator = DB::table('sts_operator_service')->where('sts_type','Operator')->get();
		$stsProvider = DB::table('sts_operator_service')->where('sts_type','Service Provider')->get();

		//dapatkan user cp
		$users = User::getAllUserByRole('CP');

    return view('addNewJob')
					->with('user',$userInfo)
					->with('cards',$cards)
					->with('mothership',$mothership)
					->with('moneuvering',$moneuvering)
					->with('locations',$locations)
					->with('users',$users)
					->with('stsOperator',$stsOperator)
					->with('stsProvider',$stsProvider)
					->with('client',$client);
  }

	public function doAddNewJob (request $request) {

		//dapatkan variable daripada middleware
		$userInfo = resolve('userInfo');

		//check status berdasarkan tarikh
		$today = strtotime(date('Y-m-d'));
		$jobCommenceDate = strtotime($request->job_commence_date);
		if ($jobCommenceDate < $today) {
			$status = 'Completed';
		} else {
			$status = 'In-coming';
		}
		// echo '<pre>'; print_r($b); die();

		$explode_date = explode('/',$request->job_commence_date);
		$date = $explode_date[2].'-'.$explode_date[0].'-'.$explode_date[1];
		$data = array(
				'job_code' => $request->job_code,
				'job_client' => $request->job_client,
				'job_operator' => $request->job_operator,
				'job_provider' => $request->job_provider,
				'job_sts' => $request->job_sts,
				'job_mothership' => $request->job_mothership,
				'job_maneuveringship' => $request->job_maneuveringship,
				'job_commence_date' => $date,
				'job_commence_time' => $request->job_commence_time.' '.$request->job_commence_time_ampm,
				'job_location' => $request->job_location,
				'job_mooring_master' => $request->job_mooring_master,
				'job_poac1' => $request->job_poac1,
				'job_poac2' => $request->job_poac2,
				'job_remark' => $request->job_remark,
				'job_owner' => $userInfo->usr_id,
				'job_status' => $status,
				'job_created' => Carbon::now()
		);
		// echo '<pre>'; print_r($data); die();
		$insert = DB::table('jobs')->insertGetId($data);

		if ($insert) {

			Log::doAddLog ("Add new STS job", $insert, $request->job_code);

			// notification
			// $foreign_note = $request->job_commence_time.' '.$request->job_commence_time_ampm;
			// app('App\Http\Controllers\NotificationController')->doInsertNotification($insert, $foreign_note, $request->job_mooring_master, 'newjob');
			// app('App\Http\Controllers\NotificationController')->doInsertNotification($insert, $foreign_note, $request->job_poac1, 'newjob');
			// app('App\Http\Controllers\NotificationController')->doInsertNotification($insert, $foreign_note, $request->job_poac2, 'newjob');

			if ($status == "Completed") {
				return redirect('jobinfo/'.$insert)->with('success', "Successfully added new job. Please complete the form to continue.");
			} else {
				return redirect('jobrecords')->with('success', "Successfully added new job.");
			}

		} else {
			return redirect('addNewJob')->with('error',"Unable to add new job. Check your form and please try again.");
		}
	}

	public function doAddNewJobPilotage (request $request) {

		//dapatkan variable daripada middleware
		$userInfo = resolve('userInfo');

		$ratePilotage = '1250';
		//check status berdasarkan tarikh
		$today = strtotime(date('Y-m-d'));
		$onboardDate = strtotime($request->pil_onboard_date);
		if ($onboardDate < $today) {
			$status = 'Completed';
		} else {
			$status = 'In-coming';
		}

		$explode_date = explode('/',$request->pil_onboard_date);
		$date = $explode_date[2].'-'.$explode_date[0].'-'.$explode_date[1];

		$data = array(
				'pil_code' 					=> $request->pil_code,
				'pil_owner' 				=> $userInfo->usr_id,
				'pil_status' 				=> $status,
				'pil_piloting_ship' => $request->pil_piloting_ship,
				'pil_provider' 			=> $request->pil_provider,
				'pil_operator' 			=> $request->pil_operator,
				'pil_onboard_date' 	=> $date,
				'pil_onboard_time' 	=> $request->pil_onboard_time.' '.$request->pil_onboard_time_ampm,
				'pil_event' 				=> $request->pil_event,
				'pil_location' 			=> $request->pil_location,
				'pil_rate' 					=> $ratePilotage,
				'pil_poac' 					=> $request->pil_poac,
				'pil_remark' 				=> $request->pil_remark,
				'pil_created' 			=> Carbon::now()
		);

		$insert = DB::table('jobs_pilotage')->insertGetId($data);

		if ($insert) {

			Log::doAddLog ("Add new Pilotage job", $insert, $request->pil_code);

			if ($status == "Completed") {
				return redirect('jobinfo-pilotage/'.$insert)->with('success', "Successfully added new job. Please complete the form to continue.");
			} else {
				return redirect('jobrecords')->with('success', "Successfully added new Pilotage job.");
			}

		} else {
			return redirect('addnewjob#t02')->with('error',"Unable to add new job. Check your form and please try again.");
		}
		// echo '<pre>'; print_r($data); die();
	}

  public function jobInfo ($job_id) {

		//dapatkan variable daripada middleware
		$userInfo = resolve('userInfo');

		$job = Operation::getJobByid($job_id);

		if ($userInfo->usr_role == "CP") {
			return redirect('jobinfo-poac/'.$job_id);
		}

		//dapatkan sts operator dan service provider
		$stsOperator = DB::table('sts_operator_service')->where('sts_type','Operator')->get();
		$stsProvider = DB::table('sts_operator_service')->where('sts_type','Service Provider')->get();

		//dapatkan rate cards yang active
		$cards = Card::getAllCardsByClient($job->job_client);

		//dapatkan ships
		$mothership = Ship::getAllShipByCat('Mothership');
		$moneuvering = Ship::getAllShipByCat('Maneuvering');

		//dapatkan locations
		$locations = DB::table('locations')->get();

		//dapatkan user cp
		$users = User::getAllUserByRole('CP');

		// dapatkan vouchers
		$voucher_berthing = Voucher::getVoucherByJobIdAndType($job_id, 'Berthing');
		$voucher_unberthing = Voucher::getVoucherByJobIdAndType($job_id, 'Unberthing');

    return view('jobInfo')
				 ->with('job',$job)
				 ->with('stsOperator',$stsOperator)
				 ->with('stsProvider',$stsProvider)
				 ->with('cards',$cards)
				 ->with('mothership',$mothership)
				 ->with('moneuvering',$moneuvering)
				 ->with('locations',$locations)
				 ->with('users',$users)
				 ->with('voucher_berthing',$voucher_berthing)
				 ->with('voucher_unberthing',$voucher_unberthing)
				 ->with('user',$userInfo);
  }

	public function jobInfoPoac ($job_id) {

		#Dapatkan variable daripada middleware
		$userInfo 					= resolve('userInfo');

		$job 								= Operation::getJobByid($job_id);

		#Dapatkan sts operator dan service provider
		$stsOperator 				= DB::table('sts_operator_service')->where('sts_type','Operator')->get();
		$stsProvider 				= DB::table('sts_operator_service')->where('sts_type','Service Provider')->get();

		#Dapatkan rate cards yang active
		$cards 							= Card::getAllCardsByClient($job->job_client);

		#Dapatkan ships
		$mothership 				= Ship::getAllShipByCat('Mothership');
		$moneuvering 				= Ship::getAllShipByCat('Maneuvering');

		#Dapatkan locations
		$locations 					= DB::table('locations')->get();

		#Dapatkan user cp
		$users 							= User::getAllUserByRole('CP');

		#Dapatkan vouchers
		$voucher_berthing 	= Voucher::getVoucherByJobIdAndType($job_id, 'Berthing');
		$voucher_unberthing = Voucher::getVoucherByJobIdAndType($job_id, 'Unberthing');

		return view('jobInfoPoac')
				 ->with('job',$job)
				 ->with('stsOperator',$stsOperator)
				 ->with('stsProvider',$stsProvider)
				 ->with('cards',$cards)
				 ->with('mothership',$mothership)
				 ->with('moneuvering',$moneuvering)
				 ->with('locations',$locations)
				 ->with('users',$users)
				 ->with('voucher_berthing',$voucher_berthing)
				 ->with('voucher_unberthing',$voucher_unberthing)
				 ->with('user',$userInfo);
	}

	public function jobInfoPilotage ($pil_id) {

		//dapatkan variable daripada middleware
		$userInfo = resolve('userInfo');

		//check priviledge admin
		if ($userInfo->usr_role == "CP") {
			return redirect('jobinfo-pilotage-poac/'.$pil_id);
		}

		$job = Operation::getPilotageJobByid($pil_id);

		//dapatkan sts operator dan service provider
		$stsOperator = DB::table('sts_operator_service')->where('sts_type','Operator')->get();
		$stsProvider = DB::table('sts_operator_service')->where('sts_type','Service Provider')->get();
		//dapatkan locations
		$locations = DB::table('locations')->get();



		$moneuvering = Ship::getAllShipByCat('Maneuvering');
		//dapatkan poac
		$users = User::getAllUserByRole('CP');

		// echo '<pre>'; print_r($users); die();

		return view('jobInfoPilotage')
				 ->with('job',$job)
				 ->with('moneuvering',$moneuvering)
				 ->with('users',$users)
				 ->with('stsOperator',$stsOperator)
				 ->with('stsProvider',$stsProvider)
				 ->with('locations',$locations)
				 ->with('user',$userInfo);

	}

	public function jobInfoPilotagePoac ($pil_id) {

		//dapatkan variable daripada middleware
		$userInfo = resolve('userInfo');

		$job = Operation::getPilotageJobByid($pil_id);

		//dapatkan sts operator dan service provider
		$stsOperator = DB::table('sts_operator_service')->where('sts_type','Operator')->get();
		$stsProvider = DB::table('sts_operator_service')->where('sts_type','Service Provider')->get();
		//dapatkan locations
		$locations = DB::table('locations')->get();

		$moneuvering = Ship::getAllShipByCat('Maneuvering');
		//dapatkan poac
		$users = User::getAllUserByRole('CP');

		// echo '<pre>'; print_r($users); die();

		return view('jobInfoPilotagePoac')
				 ->with('job',$job)
				 ->with('moneuvering',$moneuvering)
				 ->with('users',$users)
				 ->with('stsOperator',$stsOperator)
				 ->with('stsProvider',$stsProvider)
				 ->with('locations',$locations)
				 ->with('user',$userInfo);

	}

	public function doEditJob (request $request) {

		$job = Operation::getJobByid($request->job_id);

		$explode_date1 = explode('/',$request->job_commence_date);
		$date_commence = $explode_date1[2].'-'.$explode_date1[0].'-'.$explode_date1[1];

		if ($request->job_complete_date != '') {
			$explode_date2 = explode('/',$request->job_complete_date);
			$date_complete = $explode_date2[2].'-'.$explode_date2[0].'-'.$explode_date2[1];
		} else {
			$date_complete = NULL;
		}

		//check job exceeding
		$job_exceeding24 = 0;
		$job_exceeding48 = 0;
		if ($request->job_exceeding_select == "24") {
			$job_exceeding24 = $request->job_exceeding_number;
		} else if ($request->job_exceeding_select == "48") {
			$job_exceeding48 = $request->job_exceeding_number;
		}

		//Overtime Calculation
		$overtimeCharges = 0;
		$checkRateCard = Asset::getRateCardById($request->job_sts);
		if ($checkRateCard->card_overtime != '' || $checkRateCard->card_overtime != 0) {
			if ($request->job_exceeding_select == "24") {
				$overtimeCharges = $checkRateCard->card_overtime * $job_exceeding24;
			} else if ($request->job_exceeding_select == "48") {
				$overtimeCharges = $checkRateCard->card_overtime * $job_exceeding48;
			}
		}
		$dataUpdate = array(
				'job_operator' 				=> $request->job_operator,
				'job_provider' 				=> $request->job_provider,
				'job_sts' 						=> $request->job_sts,
				'job_mothership' 			=> $request->job_mothership,
				'job_maneuveringship' => $request->job_maneuveringship,
				'job_commence_date' 	=> $date_commence,
				'job_commence_time' 	=> $request->job_commence_time.' '.$request->job_commence_time_ampm,
				'job_complete_date' 	=> $date_complete,
				'job_complete_time' 	=> $request->job_complete_time.' '.$request->job_complete_time_ampm,
				'job_location' 				=> $request->job_location,
				'job_mooring_master' 	=> $request->job_mooring_master,
				'job_poac1' 					=> $request->job_poac1,
				// 'job_poac2' 					=> $request->job_poac2,
				'job_remark' 					=> $request->job_remark,
				'job_status' 					=> $request->job_status,
				'job_hour' 						=> $request->job_hour,
				'job_exceeding24' 		=> $job_exceeding24,
				'job_exceeding48' 		=> $job_exceeding48,
				'job_overtime_charges'=> $overtimeCharges,
				'job_updated' 				=> Carbon::now()
		);

		$updateJob = DB::table('jobs')->where('job_id', $request->job_id)->update($dataUpdate);
		Log::doAddLog ("Update STS job", $request->job_id, $job->job_code);
		return redirect('jobinfo/'.$request->job_id)->with('success', "Successfully update this job information.");
	}

	public function doEditJobPilotage (request $request) {

		//dapatkan variable daripada middleware
		$userInfo = resolve('userInfo');

		$job = Operation::getPilotageJobByid($request->pil_id);

		$explode_date = explode('/',$request->pil_onboard_date);
		$dateOnboard = $explode_date[2].'-'.$explode_date[0].'-'.$explode_date[1];

		if ($request->pil_complete_date != '') {
			$explode_date_complete = explode('/',$request->pil_complete_date);
			$dateComplete = $explode_date_complete[2].'-'.$explode_date_complete[0].'-'.$explode_date_complete[1];
		} else {
			$dateComplete = NULL;
		}

		$data = array(
				'pil_status' 				=> $request->pil_status,
				'pil_piloting_ship' => $request->pil_piloting_ship,
				'pil_onboard_date' 	=> $dateOnboard,
				'pil_onboard_time' 	=> $request->pil_onboard_time.' '.$request->pil_onboard_time_ampm,
				'pil_complete_date' => $dateComplete,
				'pil_complete_time' => $request->pil_complete_time.' '.$request->pil_complete_time_ampm,
				'pil_operator' 			=> $request->pil_operator,
				'pil_provider' 			=> $request->pil_provider,
				'pil_event' 				=> $request->pil_event,
				'pil_poac' 					=> $request->pil_poac,
				'pil_remark' 				=> $request->pil_remark,
				'pil_voucher_code' 	=> $request->pil_voucher_code,
				'pil_created' 			=> Carbon::now()
		);

		$updateJob = DB::table('jobs_pilotage')->where('pil_id', $request->pil_id)->update($data);
		Log::doAddLog ("Update Pilotage job", $request->pil_id, $job->pil_code);

		return redirect('jobinfo-pilotage/'.$request->pil_id)->with('success', "Successfully update this job information.");
		// echo '<pre>'; print_r($data); die();
	}

  public function poacStatus (request $request) {

		//dapatkan variable daripada middleware
		$userInfo = resolve('userInfo');

		//check date, auto set status to onboard
		$checking = Self::doCheckAndUpdateJobStatus();

		//dapatkan user cp
		$poac = User::getAllUserByRole('CP');

		foreach ($poac as $p) :

			//search job utk setiap poac
			$jobs = DB::table('jobs as j')
								->where('j.job_mooring_master', $p->usr_id)
								->orWhere('j.job_poac1', $p->usr_id)
								->orWhere('j.job_poac2', $p->usr_id)
								->join('locations as l','l.loc_id','=','j.job_location')
								->select('j.job_code','j.job_id','j.job_status','l.loc_name')
								->get();

			$array_poac[] = array(
					'poac_id' 	=> $p->usr_id,
					'poac_pic' 	=> $p->usr_pic,
					'poac_name' => $p->usr_firstname.' '.$p->usr_lastname,
					'poac_job' 	=> $jobs
			);


		endforeach;

		// echo '<pre>'; print_r($array_poac); die();

    return view('poacStatus')
				 ->with('poac',$array_poac)
				 ->with('user',$userInfo);
  }

	public function doDeleteJob(request $request) {

		$job_id = $request->job_id;

		$job = Operation::getJobByid($job_id);

		//get voucher detail
		$voucher = DB::table('vouchers')->where('vou_job_id', $job_id)->get();

		DB::table('jobs')->where('job_id', $job_id)->delete();
		DB::table('vouchers')->where('vou_job_id', $job_id)->delete();

		Log::doAddLog ("Delete STS job", 0, $job->job_code);

		foreach ($voucher as $v) :
			DB::table('voucher_job_items')->where('vjob_vou_id', $v->vou_id)->delete();
			Log::doAddLog ("Delete voucher for job ".$job->job_code."", 0, $v->vou_code);
		endforeach;

		return redirect('jobrecords')->with('success', "Successfully delete job.");

	}

	public function doDeleteJobPilotage(request $request) {

		$pil_id = $request->pil_id;
		$job = Operation::getPilotageJobByid($pil_id);
		//get voucher detail
		$voucher = DB::table('vouchers_pilotage')->where('vou_job_id', $pil_id)->get();

		DB::table('jobs_pilotage')->where('pil_id', $pil_id)->delete();
		DB::table('vouchers_pilotage')->where('vou_job_id', $pil_id)->delete();

		Log::doAddLog ("Delete Pilotage job", 0, $job->pil_code);

		foreach ($voucher as $v) :
			DB::table('voucher_job_items_pilotage')->where('vjob_vou_id', $v->vou_id)->delete();
			Log::doAddLog ("Delete voucher for job ".$job->pil_code."", 0, $v->vou_code);
		endforeach;

		return redirect('jobrecords')->with('success', "Successfully delete Pilotage Job.");

	}

	public function getPdfJobRecords ($type, $month, $year) {

		$monthNumber = date('m', strtotime($month));
		$userInfo = resolve('userInfo');

		if ($userInfo->usr_role == "AD") {
			$jobs = Operation::getAllJobByCat($type, $monthNumber, $year);
		} else {
			$jobs = Operation::getAllJobByCatAndByUser($type, $monthNumber, $year);
		}

		$pdf = PDF::loadView('pdfs.pdf_job_records', compact('jobs','month','year'))->setPaper('a3', 'landscape');
		// $pdf = PDF::loadView('pdfs.pdf', compact($user));
		return $pdf->download('job-record.pdf');

		// return view('pdfs.pdf_job_records')
		// 		 ->with('user',$userInfo)
		// 		 ->with('jobs',$jobs);
	}

	public function printJobRecords ($type, $month, $year) {

		$monthNumber = date('m', strtotime($month));
		$userInfo = resolve('userInfo');

		if ($userInfo->usr_role == "AD") {
			$jobs = Operation::getAllJobByCat($type, $monthNumber, $year);
		} else {
			$jobs = Operation::getAllJobByCatAndByUser($type, $monthNumber, $year);
		}

		return view('pdfs.pdf_job_records')
				 ->with('type',$type)
				 ->with('year',$year)
				 ->with('month',$month)
				 ->with('jobs',$jobs);
	}

	public function getRateCardSelect ($id) {

		$cards = Asset::getCardByClientId($id);
		// echo '<select name="job_sts" class="form-control select2" style="width: 100%" data-placeholder="Choose STS Charges" required>';
		foreach ($cards as $c):
			echo '<option value="'.$c->card_id.'">'.$c->card_type.' - '.$c->card_name.'</option>';
		endforeach;
		// echo '</select>';
	}

	public function doCalculateHour () {

		$endDate = $_GET['endDate'];
		$startDate = $_GET['startDate'];

		//Split date and time
		$split1 = str_split($startDate, 10);
		$split2 = str_split($endDate, 10);

		$startTime_24_hour_format  = date("H:i", strtotime($split1[1]));
		$endTime_24_hour_format  = date("H:i", strtotime($split2[1]));

		$start = Carbon::parse($split1[0].' '.$startTime_24_hour_format)->format('m/d/Y H:i');
		$end = Carbon::parse($split2[0].' '.$endTime_24_hour_format)->format('m/d/Y H:i');
		// $startDateTime = $start.' '.$startTime_24_hour_format;
		// echo $end = Carbon::parse($endDate)->format('m/d/Y');
		// $endDateTime = $end.' '.$endTime_24_hour_format;

		// echo '<br>Start Date : '.$startDate;
		// echo '<br>End Date : '.$endDate;
		// echo '<br>New Start Time : '.$startTime_24_hour_format;
		// echo '<br>New End Time : '.$endTime_24_hour_format;
		// echo '<br>New Start Date Time : '.$start;
		// echo '<br>New End Date Time : '.$end;


		$start = new Carbon($start);
		$end = new Carbon($end);
		$diff = $start->diffInMinutes($end);
		$diffInHour = $diff/60;
		$diffInHour = sprintf("%.2f", $diffInHour);

		// echo '<pre>'; print_r($endDate);
		// echo '<pre>'; print_r($diffInHour);
		// die();

		echo '<input type="text" id="job_hour1" class="form-control" value="'.$diffInHour.'" disabled>';
		// echo '<input type="text" id="job_hour2" class="form-control" name="job_hour1" value="'.$diffInHour.'" required>';
	}

	public function doCheckCode($type) {

		$code = $_GET['code'];
		if ($type == "stsjob") {
			$check = DB::table('jobs')->where('job_code','=',$code)->count();
		} else if ($type == "pilotagejob") {
			$check = DB::table('jobs_pilotage')->where('pil_code','=',$code)->count();
		} else if ($type == "stsvoucher" || $type == "pilotagevoucher") {
			$check1 = DB::table('vouchers')->where('vou_code','=',$code)->count();
			$check2 = DB::table('vouchers_pilotage')->where('vou_code','=',$code)->count();

			if ($check1 == 0 && $check2 == 0) {
				$check = 0;
			} else {
				$check = 1;
			}

		}

		if ($check == 0) {
			return 'available';
		} else {
			return 'notavailable';
		}
	}

}
