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
}
