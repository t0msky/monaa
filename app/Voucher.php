<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    public static function getVoucherByJobIdAndType($jobId, $type){

  		$voucher = DB::table('vouchers as v')
                ->join('users as u','v.vou_master','=','u.usr_id')
                ->where('v.vou_job_id',$jobId)
                ->where('v.vou_type',$type)
                ->select('v.*','u.usr_id','u.usr_firstname','u.usr_lastname')
                ->first();

  		return $voucher;
  	}

    public static function getAllVoucher($currentMonth, $currentYear) {

      $voucher = DB::table('vouchers as v')
                   ->join('users as u','v.vou_master','=','u.usr_id')
                   ->join('jobs as j','j.job_id','=','v.vou_job_id')
                   ->whereMonth('v.vou_date', '=', $currentMonth)
                   ->whereYear('v.vou_date', '=', $currentYear)
                   ->orderBy('v.vou_date', 'desc')
                   ->select('v.*','u.usr_id','u.usr_firstname','u.usr_lastname')
                   ->get();

      return $voucher;
    }

    public static function getAllVoucherPilotage($currentMonth, $currentYear) {

      $voucher = DB::table('vouchers_pilotage as v')
                   ->join('users as u','v.vou_master','=','u.usr_id')
                   ->whereMonth('v.vou_date', '=', $currentMonth)
                   ->whereYear('v.vou_date', '=', $currentYear)
                   ->orderBy('v.vou_date', 'desc')
                   ->select('v.*','u.usr_id','u.usr_firstname','u.usr_lastname')
                   ->get();

      return $voucher;
    }

    public static function getFirstVoucher($currentMonth, $currentYear) {

      $voucher = DB::table('vouchers as v')
                   ->join('jobs as j','v.vou_job_id','=','j.job_id')
                   ->join('ratecards as r','r.card_id','=','j.job_sts')
                   ->whereMonth('v.vou_date', '=', $currentMonth)
                   ->whereYear('v.vou_date', '=', $currentYear)
                   ->orderBy('v.vou_date', 'desc')
                   ->first();

      return $voucher;
    }

    public static function getFirstVoucherPilotage($currentMonth, $currentYear) {

      $voucher = DB::table('vouchers_pilotage as v')
                   ->join('jobs_pilotage as j','v.vou_job_id','=','j.pil_id')
                   ->whereMonth('v.vou_date', '=', $currentMonth)
                   ->whereYear('v.vou_date', '=', $currentYear)
                   ->orderBy('v.vou_date', 'desc')
                   ->first();

      return $voucher;
    }

    public static function getAllVoucherByUserId($uid,$currentMonth, $currentYear) {

      $voucher = DB::table('vouchers as v')
                   ->join('jobs as j','v.vou_job_id','=','j.job_id')
                   ->where('j.job_owner', $uid)
                   ->whereMonth('v.vou_date', '=', $currentMonth)
                   ->whereYear('v.vou_date', '=', $currentYear)
                   ->orderBy('v.vou_date', 'desc')
                   ->get();

      return $voucher;
    }

    public static function getFirstVoucherByUserId($uid,$currentMonth, $currentYear) {

      $voucher = DB::table('vouchers as v')
                   ->join('jobs as j','v.vou_job_id','=','j.job_id')
                   ->where('j.job_owner', $uid)
                   ->whereMonth('v.vou_date', '=', $currentMonth)
                   ->whereYear('v.vou_date', '=', $currentYear)
                   ->orderBy('v.vou_date', 'desc')
                   ->get();

      return $voucher;
    }

    public static function getVoucherDetail($voucherId){

      $voucher = DB::table('vouchers as v')
                ->join('jobs as j','j.job_id','=','v.vou_job_id')
                ->join('ratecards as r','r.card_id','=','j.job_sts')
                ->where('v.vou_id',$voucherId)
                ->first();

  		return $voucher;

    }

    public static function getVoucherDetailPilotage($voucherId){

      $voucher = DB::table('vouchers_pilotage as v')
                ->join('jobs_pilotage as j','j.pil_id','=','v.vou_job_id')
                ->where('v.vou_id',$voucherId)
                ->first();

      return $voucher;

    }

    public static function getVoucherPilotageDetail($voucherId){

      $voucher = DB::table('vouchers_pilotage as v')
                ->join('jobs_pilotage as j','j.pil_id','=','v.vou_job_id')
                ->where('v.vou_id',$voucherId)
                ->first();

  		return $voucher;

    }


}
