<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    public static function getAllJobByCat($cat, $currentMonth = NULL, $currentYear = NULL){

  		$jobs = DB::table('jobs as j')
                ->join('ratecards as r','j.job_sts','=','r.card_id')
                ->join('ships as s1','j.job_mothership','=','s1.ship_id')
                ->join('ships as s2','j.job_maneuveringship','=','s2.ship_id')
                ->leftjoin('users as u1','j.job_mooring_master','=','u1.usr_id')
                ->leftjoin('users as u2','j.job_poac1','=','u2.usr_id')
                ->leftjoin('vouchers as v1','j.job_berthing','=','v1.vou_code')
                ->leftjoin('vouchers as v2','j.job_unberthing','=','v2.vou_code')
                ->join('clients as c','j.job_client','=','c.client_id')
                ->where('r.card_type', $cat)
                ->whereMonth('j.job_commence_date', '=', $currentMonth)
                ->whereYear('j.job_commence_date', '=', $currentYear)
                ->select('j.*','r.card_type','r.card_rate',
                         's1.ship_name as mot_ship_name','s1.ship_type as mot_ship_type',
                         's1.ship_LOA as mot_ship_LOA','s1.ship_DWT as mot_ship_DWT',
                         's2.ship_name as man_ship_name','s2.ship_type as man_ship_type',
                         's2.ship_LOA as man_ship_LOA','s2.ship_DWT as man_ship_DWT',
                         'u1.usr_firstname as u1_firstname','u1.usr_lastname as u1_lastname',
                         'u2.usr_firstname as u2_firstname','u2.usr_lastname as u2_lastname',
                         'c.client_name','v1.vou_id as vou_id_berthing','v2.vou_id as vou_id_unberthing'
                         )
                ->orderBy('j.job_commence_date','desc')
  							->get();

  		return $jobs;
  	}

    public static function getAllJobByCatAndByUser($cat, $uid, $currentMonth = NULL, $currentYear = NULL){

  		$jobs = DB::table('jobs as j')
                ->join('ratecards as r','j.job_sts','=','r.card_id')
                ->join('ships as s1','j.job_mothership','=','s1.ship_id')
                ->join('ships as s2','j.job_maneuveringship','=','s2.ship_id')
                ->leftjoin('users as u1','j.job_mooring_master','=','u1.usr_id')
                ->leftjoin('users as u2','j.job_poac1','=','u2.usr_id')
                ->leftjoin('vouchers as v1','j.job_berthing','=','v1.vou_code')
                ->leftjoin('vouchers as v2','j.job_unberthing','=','v2.vou_code')
                ->join('clients as c','j.job_client','=','c.client_id')
                ->where('r.card_type', $cat)
                ->whereMonth('j.job_commence_date', '=', $currentMonth)
                ->whereYear('j.job_commence_date', '=', $currentYear)
                ->where(function ($query) use ($uid) {
                    $query->where('j.job_mooring_master','=', $uid)
                          ->orWhere('j.job_poac1','=', $uid);
                })
                ->select('j.*','r.card_type','r.card_rate',
                         's1.ship_name as mot_ship_name','s1.ship_type as mot_ship_type',
                         's1.ship_LOA as mot_ship_LOA','s1.ship_DWT as mot_ship_DWT',
                         's2.ship_name as man_ship_name','s2.ship_type as man_ship_type',
                         's2.ship_LOA as man_ship_LOA','s2.ship_DWT as man_ship_DWT',
                         'u1.usr_firstname as u1_firstname','u1.usr_lastname as u1_lastname',
                         'u2.usr_firstname as u2_firstname','u2.usr_lastname as u2_lastname',
                         'c.client_name','v1.vou_id as vou_id_berthing','v2.vou_id as vou_id_unberthing'
                         )
                ->orderBy('j.job_commence_date','asc')
  							->get();

  		return $jobs;
  	}

    public static function getJobByid($id) {

      $job = DB::table('jobs as j')
                ->join('ratecards as r','j.job_sts','=','r.card_id')
                ->join('ships as s1','j.job_mothership','=','s1.ship_id')
                ->join('ships as s2','j.job_maneuveringship','=','s2.ship_id')
                ->leftjoin('users as u1','j.job_mooring_master','=','u1.usr_id')
                ->leftjoin('users as u2','j.job_poac1','=','u2.usr_id')
                ->where('j.job_id', $id)
                ->select('j.*','r.card_type',
                         's1.ship_name as mot_ship_name','s1.ship_type as mot_ship_type',
                         's1.ship_LOA as mot_ship_LOA','s1.ship_DWT as mot_ship_DWT',
                         's2.ship_name as man_ship_name','s2.ship_type as man_ship_type',
                         's2.ship_LOA as man_ship_LOA','s2.ship_DWT as man_ship_DWT',
                         'u1.usr_firstname as u1_firstname','u1.usr_lastname as u1_lastname',
                         'u2.usr_firstname as u2_firstname','u2.usr_lastname as u2_lastname'
                         )
  							->first();

      return $job;
    }

    public static function getAllPilotageJob ($currentMonth, $currentYear) {

      $jobs = DB::table('jobs_pilotage as j')
                ->join('ships as s','j.pil_piloting_ship','=','s.ship_id')
                ->leftjoin('users as u','j.pil_poac','=','u.usr_id')
                ->whereMonth('j.pil_onboard_date', '=', $currentMonth)
                ->whereYear('j.pil_onboard_date', '=', $currentYear)
                ->orderBy('j.pil_onboard_date','desc')
  							->get();

  		return $jobs;
    }

    public static function getAllPilotageJobByUserId ($uid, $currentMonth, $currentYear) {

      $jobs = DB::table('jobs_pilotage as j')
                ->join('ships as s','j.pil_piloting_ship','=','s.ship_id')
                ->leftjoin('users as u','j.pil_poac','=','u.usr_id')
                ->whereMonth('j.pil_onboard_date', '=', $currentMonth)
                ->whereYear('j.pil_onboard_date', '=', $currentYear)
                ->where('j.pil_poac','=', $uid)
                ->orderBy('j.pil_onboard_date','desc')
  							->get();

  		return $jobs;
    }

    public static function getPilotageJobByid ($id) {

      $jobs = DB::table('jobs_pilotage as j')
                ->join('ships as s','j.pil_piloting_ship','=','s.ship_id')
                ->leftjoin('users as u','j.pil_poac','=','u.usr_id')
                ->where('j.pil_id', $id)
                ->orderBy('j.pil_onboard_date','desc')
  							->first();

  		return $jobs;
    }

    public static function getAllJobNoVoucherDetail() {

      $jobs = DB::table('jobs as j')
                ->join('ratecards as r','j.job_sts','=','r.card_id')
                ->join('ships as s1','j.job_mothership','=','s1.ship_id')
                ->join('ships as s2','j.job_maneuveringship','=','s2.ship_id')
                ->join('users as u1','j.job_mooring_master','=','u1.usr_id')
                ->join('users as u2','j.job_poac1','=','u2.usr_id')
                ->join('users as u3','j.job_poac2','=','u3.usr_id')
                ->where('j.job_berthing', '=', NULL)
                ->orWhere('j.job_unberthing', '=', NULL)
                ->select('j.*','r.card_type','r.card_rate',
                         's1.ship_name as mot_ship_name','s1.ship_type as mot_ship_type',
                         's1.ship_LOA as mot_ship_LOA','s1.ship_DWT as mot_ship_DWT',
                         's2.ship_name as man_ship_name','s2.ship_type as man_ship_type',
                         's2.ship_LOA as man_ship_LOA','s2.ship_DWT as man_ship_DWT',
                         'u1.usr_firstname as u1_firstname','u1.usr_lastname as u1_lastname',
                         'u2.usr_firstname as u2_firstname','u2.usr_lastname as u2_lastname',
                         'u3.usr_firstname as u3_firstname','u3.usr_lastname as u3_lastname'
                         )
                ->orderBy('j.job_commence_date','desc')
  							->get();

      return $jobs;
    }

    public static function getAllJobNoVoucher() {

      $jobs = DB::table('jobs as j')
                ->join('ratecards as r','j.job_sts','=','r.card_id')
                ->where('j.job_status', '!=', 'In-coming')
                ->where(function ($query) {
                    $query->where('j.job_berthing', '=', NULL)
                          ->orWhere('j.job_unberthing', '=', NULL);
                })
                ->orderBy('j.job_commence_date','desc')
  							->get();

      return $jobs;
    }

    public static function getAllPilotageJobNoVoucher() {

      $jobs = DB::table('jobs_pilotage as j')
                ->where('j.pil_voucher_id', '=', NULL)
                ->where('j.pil_status', '!=', 'In-coming')
                ->orderBy('j.pil_onboard_date','desc')
  							->get();

      return $jobs;
    }

    public static function getAllPilotageJobNoVoucherByUser($uid) {

      $jobs = DB::table('jobs_pilotage as j')
                ->where('j.pil_poac', '=', $uid)
                ->where('j.pil_voucher_id', '=', NULL)
                ->where('j.pil_status', '!=', 'In-coming')
                ->orderBy('j.pil_onboard_date','desc')
  							->get();

      return $jobs;
    }

    public static function getFirstJobNoVoucher() {

      $jobs = DB::table('jobs as j')
                ->join('ratecards as r','j.job_sts','=','r.card_id')
                ->where('j.job_status', '!=', 'In-coming')
                ->where(function ($query) {
                    $query->where('j.job_berthing', '=', NULL)
                          ->orWhere('j.job_unberthing', '=', NULL);
                })
                ->orderBy('j.job_commence_date','desc')
  							->first();

      return $jobs;
    }

    public static function getFirstPilotageJobNoVoucher() {

      $jobs = DB::table('jobs_pilotage as j')
                ->where('j.pil_voucher_id', '=', NULL)
                ->where('j.pil_status', '!=', 'In-coming')
                ->orderBy('j.pil_onboard_date','desc')
  							->first();

      return $jobs;
    }

    public static function getAllJobNoVoucherByUser($uid) {

      $jobs = DB::table('jobs as j')
                ->join('ratecards as r','j.job_sts','=','r.card_id')
                ->where('j.job_status', '!=', 'In-coming')
                ->where(function ($query) use ($uid) {
                    $query->where('j.job_mooring_master','=', $uid)
                          ->orWhere('j.job_poac1','=', $uid);
                })
                ->where(function ($query) {
                    $query->where('j.job_berthing', '=', NULL)
                          ->orWhere('j.job_unberthing', '=', NULL);
                })
                ->orderBy('j.job_commence_date','desc')
  							->get();

      return $jobs;
    }

    public static function getFirstJobNoVoucherByUser($uid) {

      $jobs = DB::table('jobs as j')
                ->join('ratecards as r','j.job_sts','=','r.card_id')
                ->where('j.job_status', '!=', 'In-coming')
                ->where(function ($query) use ($uid) {
                    $query->where('j.job_mooring_master','=', $uid)
                          ->orWhere('j.job_poac1','=', $uid);
                })
                ->where(function ($query) {
                    $query->where('j.job_berthing', '=', NULL)
                          ->orWhere('j.job_unberthing', '=', NULL);
                })
                ->orderBy('j.job_commence_date','desc')
  							->first();

      return $jobs;
    }

    public static function getFirstPilotageJobNoVoucherByUser($uid) {

      $jobs = DB::table('jobs_pilotage as j')
                ->where('j.pil_poac', '=', $uid)
                ->where('j.pil_voucher_id', '=', NULL)
                ->where('j.pil_status', '!=', 'In-coming')
                ->orderBy('j.pil_onboard_date','desc')
  							->first();

      return $jobs;
    }

}
