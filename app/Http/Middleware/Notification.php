<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use DB;
use Carbon\Carbon;
use View;
use App\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class Notification{
  public function handle($request, Closure $next){


    if (session('user')) {

      $user = User::getUser(session('user'));

      // $checkNoti = DB::table('notification')->where('not_receiver',session('user'))->get();
      // // app()->instance('notification', $checkNoti);
      // View::share('notification', $checkNoti);

      if ($user->usr_role == "AD") {
        $countVoucherUnverified = DB::table('vouchers')->where('vou_status','Unverified')->count();
        $countVoucherPilotageUnverified = DB::table('vouchers_pilotage')->where('vou_status','Unverified')->count();
        $countStsNoVoucher = DB::table('jobs as j')->where('j.job_berthing', '=', NULL)->orWhere('j.job_unberthing', '=', NULL)->count();
        $countPilotageNoVoucher = DB::table('jobs_pilotage as j')->where('j.pil_voucher_id', '=', NULL)->count();
        // echo $countVoucherUnverified; die();
        View::share('countVoucherUnverified', $countVoucherUnverified);
        View::share('countVoucherPilotageUnverified', $countVoucherPilotageUnverified);
        View::share('countStsNoVoucher', $countStsNoVoucher);
        View::share('countPilotageNoVoucher', $countPilotageNoVoucher);
      }

      return $next($request);
    }



  }
}
