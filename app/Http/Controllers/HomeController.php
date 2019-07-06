<?php namespace App\Http\Controllers;


use DB;
use Carbon\Carbon;
use App\User;
use App\Operation;
use App\Notice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller {


	public function __construct(){

		$this->middleware('loggedin');
	}

  public function dashboard () {

		// $from_Currency = "SGD";
		// $get = file_get_contents("https://api.exchangerate-api.com/v4/latest/".$from_Currency);
		// $response_object = json_decode($get);
		// $sgdToMyr = $response_object->rates->MYR;

    $user = User::getUser(session('user'));

		//current month
		$currentMonth = date('m');
		$currentYear = date('Y');

		// get past 6 month
		$months = array(
			Carbon::now()->subMonths(5),
			Carbon::now()->subMonths(4),
			Carbon::now()->subMonths(3),
			Carbon::now()->subMonths(2),
			Carbon::now()->subMonths(1),
			$cm = Carbon::now()
		);

		if ($user->usr_role == "AD") {

			$totalStsCurrentMonth = DB::table('jobs as j')
																->join('ratecards as r','j.job_sts','=','r.card_id')
																->whereMonth('j.job_commence_date', '=', $currentMonth)
																->whereYear('j.job_commence_date', '=', $currentYear)
																->where('j.job_status', 'Completed')
																->sum('r.card_rate');
																// ->get();
			$totalPilotageCurrentMonth = 0;
			$totalStsCurrentYear = DB::table('jobs as j')
																->join('ratecards as r','j.job_sts','=','r.card_id')
																->whereYear('j.job_commence_date', '=', $currentYear)
																->where('j.job_status', 'Completed')
																->sum('r.card_rate');

			$totalPilotageCurrentYear = 0;
			$totalStsJob = DB::table('jobs as j')
											 ->join('ratecards as r','j.job_sts','=','r.card_id')
											 ->count();
			$totalPilotageJob = 0;
			$totalVoucher = DB::table('vouchers')
											  ->count();

			$strStsRevenue = '';
			$strJobStatistic = '';
			$a = 0;
			foreach ($months as $m):
				$month = $m->month;
				$monthText = date('F', mktime(0, 0, 0, $month, 10));
				$year = $m->year;
				$totalStsRevenue = DB::table('jobs as j')
															->join('ratecards as r','j.job_sts','=','r.card_id')
															->whereMonth('j.job_commence_date', '=', $month)
															->whereYear('j.job_commence_date', '=', $year)
															->where('j.job_status', 'Completed')
															->sum('r.card_rate');

				$totalJobStatistic = DB::table('jobs as j')
															->whereMonth('j.job_commence_date', '=', $month)
															->whereYear('j.job_commence_date', '=', $year)
															->where('j.job_status', 'Completed')
															->count();

				$strStsRevenue .= "{ y: '".$monthText."', a: ".$totalStsRevenue.", b: 0 },";
				$strJobStatistic .= "{ y: '".$monthText."', a: ".$totalJobStatistic.", b: 0 },";

			endforeach;

			$jobs = Operation::getAllJobByCat('FSU',$currentMonth,$currentYear);
			$jobsSpot = Operation::getAllJobByCat('SPOT',$currentMonth,$currentYear);

		} else {
			$totalStsCurrentMonth = DB::table('jobs as j')
																->join('ratecards as r','j.job_sts','=','r.card_id')
																->whereMonth('j.job_commence_date', '=', $currentMonth)
																->whereYear('j.job_commence_date', '=', $currentYear)
																->where('j.job_status', 'Completed')
																->where('j.job_owner', session('user'))
																->sum('r.card_rate');

			$totalPilotageCurrentMonth = 0;
			$totalStsCurrentYear = DB::table('jobs as j')
																->join('ratecards as r','j.job_sts','=','r.card_id')
																->whereYear('j.job_commence_date', '=', $currentYear)
																->where('j.job_status', 'Completed')
																->where('j.job_owner', session('user'))
																->sum('r.card_rate');
			$totalPilotageCurrentYear = 0;
			$totalStsJob = DB::table('jobs as j')
											 ->join('ratecards as r','j.job_sts','=','r.card_id')
											 ->where('j.job_owner', session('user'))
											 ->count();
			$totalPilotageJob = 0;
			$totalVoucher = DB::table('vouchers as v')
												->join('jobs as j','v.vou_job_id','=','j.job_id')
												->where('j.job_owner', session('user'))
											  ->count();

			$strStsRevenue = '';
			$strJobStatistic = '';
			$a = 0;
			foreach ($months as $m):
				$month = $m->month;
				$monthText = date('F', mktime(0, 0, 0, $month, 10));
				$year = $m->year;
				$totalStsRevenue = DB::table('jobs as j')
															->join('ratecards as r','j.job_sts','=','r.card_id')
															->whereMonth('j.job_commence_date', '=', $month)
															->whereYear('j.job_commence_date', '=', $year)
															->where('j.job_status', 'Completed')
															->where('j.job_owner', session('user'))
															->sum('r.card_rate');

				$totalJobStatistic = DB::table('jobs as j')
															->whereMonth('j.job_commence_date', '=', $month)
															->whereYear('j.job_commence_date', '=', $year)
															->where('j.job_status', 'Completed')
															->where('j.job_owner', session('user'))
															->count();

				$strStsRevenue .= "{ y: '".$monthText."', a: ".$totalStsRevenue.", b: 0 },";
				$strJobStatistic .= "{ y: '".$monthText."', a: ".$totalJobStatistic.", b: 0 },";

			endforeach;

			// echo '<pre>'; print_r($totalStsCurrentMonth); die();
			$jobs = Operation::getAllJobByCatAndByUser('FSU', session('user'));
			$jobsSpot = Operation::getAllJobByCatAndByUser('SPOT', session('user'));
		}

    // echo '<pre>'; print_r($str); die();
    return view('dashboard')
         ->with('month',$currentMonth)
         ->with('year',$currentYear)
         ->with('totalStsCurrentMonth',$totalStsCurrentMonth)
         ->with('totalPilotageCurrentMonth',$totalPilotageCurrentMonth)
         ->with('totalStsCurrentYear',$totalStsCurrentYear)
         ->with('totalPilotageCurrentYear',$totalPilotageCurrentYear)
         ->with('totalStsJob',$totalStsJob)
         ->with('totalPilotageJob',$totalPilotageJob)
         ->with('totalVoucher',$totalVoucher)
         ->with('strStsRevenue',$strStsRevenue)
         ->with('strJobStatistic',$strJobStatistic)
         ->with('jobs',$jobs)
         ->with('jobsSpot',$jobsSpot)
         // ->with('from_Currency',$from_Currency)
         // ->with('sgdToMyr',$sgdToMyr)
         ->with('user',$user);
  }

	public function noticeboard () {

    $user = User::getUser(session('user'));

		$notice = Notice::getAllNotice();

    return view('noticeboard')
         ->with('notice',$notice)
         ->with('user',$user);
  }

	public function getNoticeBody ($nid) {

		$notice = Notice::getNoticeById($nid);

		echo '<div class="tx-success tx-medium tx-18">'.$notice->notice_subject.'</div>';
		echo '<br><br>';
		echo '<p class="mg-b-30 mg-x-20">';
		echo date('d M Y', strtotime($notice->notice_created));
		echo '<br>';
		echo 'by '. $notice->usr_firstname.' '.$notice->usr_lastname;
		echo '<br><br>';
		echo $notice->notice_content;
		echo '</p>';
		echo '<div class="text-center"><a href="" class="btn btn-info"  data-dismiss="modal" aria-label="Close">Close</a></div>';
	}

	public function doDeleteNotice(request $request) {

		DB::table('notice')->where('notice_id', $request->noticeId)->delete();
		return redirect('noticeboard')->with('success', "Successfully delete notice.");

	}

	public function doAddNotice(request $request) {

		$dataNotice = array(
			'notice_subject' 	=> $request->notice_subject,
			'notice_content' 	=> $request->notice_content,
			'notice_sender' 	=> session('user'),
			'notice_created' 	=> Carbon::now()
		);
		// echo '<pre>'; print_r($dataNotice); die();
		$insert = DB::table('notice')->insertGetId($dataNotice);
		return redirect('noticeboard')->with('success', "Successfully add new notice.");

	}

	public function error() {

		$user = User::getUser(session('user'));
		return view('errors.error')->with('user',$user);
	}

}
