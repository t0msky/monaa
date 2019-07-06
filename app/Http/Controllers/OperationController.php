<?php namespace App\Http\Controllers;


use DB;
use Carbon\Carbon;
use App\User;
use App\Client;
use App\Card;
use App\Ship;
use App\Operation;
use App\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class OperationController extends Controller {


	public function __construct(){

		$this->middleware('loggedin');
	}

  public function jobRecords (request $request) {

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
		// echo '<pre>'; print_r($currentMonth); die();

		if ($userInfo->usr_role == "AD") {
			$jobs = Operation::getAllJobByCat('FSU', $selectMonthInNumber, $selectYear);
			$jobsSpot = Operation::getAllJobByCat('SPOT', $selectMonthInNumber, $selectYear);
		} else {
			$jobs = Operation::getAllJobByCatAndByUser('FSU', $userInfo->usr_id, $selectMonthInNumber, $selectYear);
			$jobsSpot = Operation::getAllJobByCatAndByUser('SPOT', $userInfo->usr_id, $selectMonthInNumber, $selectYear );
		}


    return view('jobRecords')
					->with('jobs',$jobs)
					->with('jobsSpot',$jobsSpot)
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

		foreach ($check as $c) :
			$update = DB::table('jobs')->where('job_id','=',$c->job_id)->update(array('job_status'=>'On-Board'));
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

		$insert = DB::table('jobs')->insertGetId($data);

		if ($insert) {
			if ($status == "Completed") {
				return redirect('jobinfo/'.$insert)->with('success', "Successfully added new job. Please complete the form to continue.");
			} else {
				return redirect('jobrecords')->with('success', "Successfully added new job.");
			}

		} else {
			return redirect('addNewJob')->with('error',"Unable to add new job. Check your form and please try again.");
		}
	}

  public function jobInfo ($job_id) {

		//dapatkan variable daripada middleware
		$userInfo = resolve('userInfo');

		$job = Operation::getJobByid($job_id);

		//check priviledge admin dan owner
		if ($userInfo->usr_role == "CP" && $job->job_owner != $userInfo->usr_id) {
			return redirect('jobrecords');
		}
		//dapatkan sts operator dan service provider
		$stsOperator = DB::table('sts_operator_service')->where('sts_type','Operator')->get();
		$stsProvider = DB::table('sts_operator_service')->where('sts_type','Service Provider')->get();

		//dapatkan rate cards yang active
		$cards = Card::getAllCards('Active');

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

		// echo '<pre>'; print_r($job); die();

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

	public function doEditJob (request $request) {

		$explode_date1 = explode('/',$request->job_commence_date);
		$date_commence = $explode_date1[2].'-'.$explode_date1[0].'-'.$explode_date1[1];

		if ($request->job_complete_date != '') {
			$explode_date2 = explode('/',$request->job_complete_date);
			$date_complete = $explode_date2[2].'-'.$explode_date2[0].'-'.$explode_date2[1];
		} else {
			$date_complete = NULL;
		}

		//check job exceeding
		$job_exceeding24 = '';
		$job_exceeding48 = '';
		if ($request->job_exceeding_select == "24") {
			$job_exceeding24 = $request->job_exceeding_number;
		} else if ($request->job_exceeding_select == "48") {
			$job_exceeding48 = $request->job_exceeding_number;
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
				'job_poac2' 					=> $request->job_poac2,
				'job_remark' 					=> $request->job_remark,
				'job_status' 					=> $request->job_status,
				'job_hour' 						=> $request->job_hour,
				'job_exceeding24' 		=> $job_exceeding24,
				'job_exceeding48' 		=> $job_exceeding48,
				'job_updated' 				=> Carbon::now()
		);
		// echo '<pre>'; print_r($dataUpdate); die();
		$updateJob = DB::table('jobs')->where('job_id', $request->job_id)->update($dataUpdate);

		return redirect('jobinfo/'.$request->job_id)->with('success', "Successfully update this job information.");
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
								->select('j.job_code','j.job_status','l.loc_name')
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

		//get voucher detail
		$voucher = DB::table('vouchers')->where('vou_job_id', $job_id)->get();

		DB::table('jobs')->where('job_id', $job_id)->delete();
		DB::table('vouchers')->where('vou_job_id', $job_id)->delete();

		foreach ($voucher as $v) :
			DB::table('voucher_job_items')->where('vjob_vou_id', $v->vou_id)->delete();
		endforeach;

		return redirect('jobrecords')->with('success', "Successfully delete job.");

	}

}
