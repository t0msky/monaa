<?php

namespace App;

use DB;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    public static function doAddLog ($activity, $keyId = NULL, $displayName = NULL) {

  		$dataLog = array(
  			'log_user_id' 			=> session('user'),
  			'log_primary_key' 	=> $keyId,
  			'log_activity' 			=> $activity,
  			'log_display_name' 	=> $displayName,
  			'log_created' 			=> Carbon::now()
  		);

  		$insert = DB::table('activity_logs')->insert($dataLog);
  	}

    public static function getAllLog () {

      $logs = DB::table('activity_logs as l')
							->join('users as u','l.log_user_id','u.usr_id')
							->orderBy('l.log_created','desc')
							->select('l.*','u.usr_id','u.usr_firstname','u.usr_lastname')
							->paginate(25);

      return $logs;
    }

    public static function getAllLogByUserId ($uid) {

      $logs = DB::table('activity_logs as l')
							->join('users as u','l.log_user_id','u.usr_id')
              ->where('l.log_user_id','=',$uid)
							->orderBy('l.log_created','desc')
							->select('l.*','u.usr_id','u.usr_firstname','u.usr_lastname')
							->paginate(25);

      return $logs;
    }

}
