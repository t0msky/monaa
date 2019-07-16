<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    public static function getAllCards($status){

  		$cards = DB::table('ratecards')
                ->where('card_status',$status)
  							->get();

  		return $cards;
  	}

    public static function getAllCardsByClient($client_id){

  		$cards = DB::table('ratecards')
                ->where('card_client',$client_id)
                ->where('card_status','Active')
  							->get();

  		return $cards;
  	}
}
