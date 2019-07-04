<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    public static function getAllNotice(){

      $notice = DB::table('notice as n')
                  ->join('users as u','.usr_id','=','n.notice_sender')
                  ->orderBy('n.notice_created','desc')
  							  ->get();

  		return $notice;
  	}

    public static function getNoticeById($nid){

      $notice = DB::table('notice as n')
                  ->join('users as u','.usr_id','=','n.notice_sender')
                  ->where('n.notice_id',$nid)
  							  ->first();

  		return $notice;
  	}

}
