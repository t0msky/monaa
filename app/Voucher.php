<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    public static function getVoucherByJobIdAndType($jobId, $type){

  		$voucher = DB::table('vouchers')
                ->where('vou_job_id',$jobId)
                ->where('vou_type',$type)
                ->first();

  		return $voucher;
  	}

    public static function getAllVoucher($currentMonth, $currentYear) {

      $voucher = DB::table('vouchers')
                   ->whereMonth('vou_date', '=', $currentMonth)
                   ->whereYear('vou_date', '=', $currentYear)
                   ->orderBy('vou_date', 'desc')
                   ->get();

      return $voucher;
    }

    public static function getFirstVoucher($currentMonth, $currentYear) {

      $voucher = DB::table('vouchers as v')
                   ->join('jobs as j','v.vou_job_id','=','j.job_id')
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
                ->where('v.vou_id',$voucherId)
                ->first();

  		return $voucher;

    }


}
