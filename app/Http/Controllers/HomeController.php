<?php namespace App\Http\Controllers;


use DB;
use Mail;
use PDF;
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

    $user = User::getUser(session('user'));

		if ($user->usr_role != "AD") {
			return redirect('dashboard-poac');
		}

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

			$totalStsCurrentMonth = 			DB::table('jobs as j')
																		->join('ratecards as r','j.job_sts','=','r.card_id')
																		->whereMonth('j.job_commence_date', '=', $currentMonth)
																		->whereYear('j.job_commence_date', '=', $currentYear)
																		->where('j.job_status', 'Completed')
																		->sum(DB::raw('r.card_rate + j.job_overtime_charges'));

			$totalPilotageCurrentMonth = 	DB::table('jobs_pilotage as j')
																		->whereMonth('j.pil_onboard_date', '=', $currentMonth)
																		->whereYear('j.pil_onboard_date', '=', $currentYear)
																		->where('j.pil_status', 'Completed')
																		->sum(DB::raw('j.pil_rate'));

			$totalStsCurrentYear = 				DB::table('jobs as j')
																		->join('ratecards as r','j.job_sts','=','r.card_id')
																		->whereYear('j.job_commence_date', '=', $currentYear)
																		->where('j.job_status', 'Completed')
																		->sum(DB::raw('r.card_rate + j.job_overtime_charges'));

			$totalPilotageCurrentYear = 	DB::table('jobs_pilotage as j')
																		->whereYear('j.pil_onboard_date', '=', $currentYear)
																		->where('j.pil_status', 'Completed')
																		->sum(DB::raw('j.pil_rate'));

			$totalStsJob = 								DB::table('jobs as j')
											 							->join('ratecards as r','j.job_sts','=','r.card_id')
											 							->count();
			$totalPilotageJob = 					DB::table('jobs_pilotage as j')->count();

			$totalVoucherSts = 						DB::table('vouchers')->count();
			$totalVoucherPilotage = 			DB::table('vouchers_pilotage')->count();

			$totalVoucher = $totalVoucherSts + $totalVoucherPilotage;

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
															->sum(DB::raw('r.card_rate + j.job_overtime_charges'));

				$totalPilotageRevenue = DB::table('jobs_pilotage as j')
															->whereMonth('j.pil_onboard_date', '=', $month)
															->whereYear('j.pil_onboard_date', '=', $year)
															->where('j.pil_status', 'Completed')
															->sum('j.pil_rate');

				$totalJobStatistic = DB::table('jobs as j')
															->whereMonth('j.job_commence_date', '=', $month)
															->whereYear('j.job_commence_date', '=', $year)
															->where('j.job_status', 'Completed')
															->count();

				$totalJobStatistic = DB::table('jobs_pilotage as j')
															->whereMonth('j.pil_onboard_date', '=', $month)
															->whereYear('j.pil_onboard_date', '=', $year)
															->where('j.pil_status', 'Completed')
															->count();

				$strStsRevenue .= "{ y: '".$monthText."', a: ".$totalStsRevenue*0.8.", b: ".$totalPilotageRevenue*0.8."},";

				$strJobStatistic .= "{ y: '".$monthText."', a: ".$totalJobStatistic.", b: ".$totalJobStatistic." },";

			endforeach;
			// echo '<pre>'; print_r($strStsRevenue); die();
			$jobs 				= Operation::getAllJobByCat('FSU',$currentMonth,$currentYear);
			$jobsSpot 		= Operation::getAllJobByCat('SPOT',$currentMonth,$currentYear);
			$jobsPilotage = Operation::getAllPilotageJob($currentMonth,$currentYear);

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
         ->with('jobsPilotage',$jobsPilotage)
         ->with('user',$user);
  }

	public function dashboardPoac () {

		$user = User::getUser(session('user'));

		if ($user->usr_role != "CP") { return redirect('dashboard'); }

		//current month
		$currentMonth = date('m');
		$currentYear  = date('Y');

		// get past 6 month
		$months = array(
			Carbon::now()->subMonths(5),
			Carbon::now()->subMonths(4),
			Carbon::now()->subMonths(3),
			Carbon::now()->subMonths(2),
			Carbon::now()->subMonths(1),
			$cm = Carbon::now()
		);

		#Incoming jobs Sts
		$incomingJobsSTS = 				DB::table('jobs as j')
												 			->join('ratecards as r','j.job_sts','=','r.card_id')
												 			->where('j.job_status','=', 'In-coming')
												 			->where('j.job_mooring_master','=', $user->usr_id)
												 			->orWhere('j.job_poac1','=', $user->usr_id)
												 			->orderBy('j.job_commence_date', 'asc')
												 		 	->select('j.job_id','j.job_code','j.job_commence_date','j.job_commence_time',
												 					'r.card_type'
												 			)
												 			->get();
		#Incoming jobs Pilotage
		$incomingJobsPilotage = 	DB::table('jobs_pilotage')
														  ->where('pil_status','=', 'In-coming')
														  ->where('pil_poac','=', $user->usr_id)
														  ->orderBy('pil_onboard_date', 'asc')
														  ->select('pil_id','pil_code','pil_onboard_date','pil_onboard_time','pil_event')
														  ->get();

		$totalStsCurrentMonth = 0;

		$totalPilotageCurrentMonth = 0;
		$totalStsCurrentYear = 0;
		$totalPilotageCurrentYear = 0;
		$totalStsJob = 						DB::table('jobs')
															->where('job_mooring_master','=', $user->usr_id)
															->orWhere('job_poac1','=', $user->usr_id)
														 	->count();
		$totalPilotageJob = 			DB::table('jobs_pilotage')
															->where('pil_poac','=', $user->usr_id)
														 	->count();
		$totalVoucherSts = 				DB::table('vouchers')->where('vou_master','=',$user->usr_id)->count();
		$totalVoucherPilotage = 	DB::table('vouchers_pilotage')->where('vou_master','=',$user->usr_id)->count();

		$totalVoucher = $totalVoucherSts + $totalVoucherPilotage;

		$strStsRevenue = '';
		$strJobStatistic = '';
		$a = 0;
		foreach ($months as $m):
			$month = $m->month;
			$monthText = date('F', mktime(0, 0, 0, $month, 10));
			$year = $m->year;
			$totalStsRevenue = 0;

			$totalJobStatistic = 0;

			$strStsRevenue .= "{ y: '".$monthText."', a: ".$totalStsRevenue.", b: 0 },";
			$strJobStatistic .= "{ y: '".$monthText."', a: ".$totalJobStatistic.", b: 0 },";

		endforeach;


		$jobs 				= Operation::getAllJobByCatAndByUser('FSU', session('user'),$currentMonth, $currentYear);
		$jobsSpot 		= Operation::getAllJobByCatAndByUser('SPOT', session('user'),$currentMonth, $currentYear);
		$jobsPilotage = Operation::getAllPilotageJobByUserId(session('user'), $currentMonth, $currentYear);
		// echo '<pre>'; print_r($jobsSpot); die();
		return view('dashboardPoac')
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
         ->with('jobsPilotage',$jobsPilotage)
         ->with('incomingJobsSTS',$incomingJobsSTS)
         ->with('incomingJobsPilotage',$incomingJobsPilotage)
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

		echo '<div class="modal-header pd-x-20">';
		echo '	<h6 class="tx-14 mg-b-0 tx-capitalize tx-inverse tx-medium">'.$notice->notice_subject.'</h6>';
		echo '	<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
		echo '		<span aria-hidden="true">&times;</span>';
		echo '	</button>';
		echo '</div>';
		echo '<div class="modal-body pd-20">';
		echo date('d M Y H:i A', strtotime($notice->notice_created));
		echo '<br>';
		echo 'by '. $notice->usr_firstname.' '.$notice->usr_lastname;
		echo '<br><br>';
		echo $notice->notice_content;
		echo '</div>';

		// echo '<div class="tx-success tx-medium tx-18">'.$notice->notice_subject.'</div>';
		// echo '<br><br>';
		// echo '<p class="mg-b-30 mg-x-20">';
		// echo date('d M Y', strtotime($notice->notice_created));
		// echo '<br>';
		// echo 'by '. $notice->usr_firstname.' '.$notice->usr_lastname;
		// echo '<br><br>';
		// echo $notice->notice_content;
		// echo '</p>';
		// echo '<div class="text-center"><a href="" class="btn btn-info"  data-dismiss="modal" aria-label="Close">Close</a></div>';
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


		public function testemel () {

			$user = User::getUser(session('user'));

			$message = '';
			$subject = 'Test Registration Verification';
			$email = "syahrunsulaiman@gmail.com";
			$name = "Husin Lempoyang";

			$mail = Mail::send('emails.mail', ['name' => $user->usr_firstname, 'userid' => $user->usr_id], function($message) use ($subject, $email, $name) {
					$message->to($email, $name)
									->subject($subject);
			});

			if ($mail) {
				echo 'sent!';
			} else {
				echo 'tak sent!';
			}
		}

		public function activityLog () {

			$user = User::getUser(session('user'));

			return view('activityLog')->with('user',$user);
		}
		// public function downloadPDF(){
		//
    //   $user = User::getUser(session('user'));
		// 	// $user = "Syahrun";
		// 	// $pdf = PDF::loadView('pdf.test_pdf')->setPaper('a4', 'landscape');
		//
    //   $pdf = PDF::loadView('pdfs.pdf', compact('user'))->setPaper('a4', 'landscape');
    //   // $pdf = PDF::loadView('pdfs.pdf', compact($user));
    //   return $pdf->download('invoice.pdf');
		//
    // }
		//
		// public function doRunTerminal () {
		//
		// 	$user = User::getUser(session('user'));
		// 	if ($user->usr_role == "AD") {
		// 		// shell_exec('php artisan vendor:publish');
		// 		shell_exec('php artisan config:clear');
		// 	} else {
		// 		echo 'Die'; die();
		// 	}
		//
		// }
}
