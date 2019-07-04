<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Ship extends Model
{
    public static function getAllShipByCat($cat){

  		$ship = DB::table('ships')
                ->where('ship_category',$cat)
  							->get();

  		return $ship;
  	}

    public static function getShipById($id){

      $ship = DB::table('ships')
                ->where('ship_id',$id)
  							->first();

  		return $ship;
    }
}
