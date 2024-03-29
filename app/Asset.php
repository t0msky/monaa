<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    public static function getAllClient(){

      $client = DB::table('clients')
                  ->orderBy('client_name','desc')
  							  ->get();

  		return $client;
  	}

    public static function getAllOperator($type){

      $client = DB::table('sts_operator_service')
                  ->where('sts_type',$type)
                  ->orderBy('sts_name','desc')
  							  ->get();

  		return $client;
  	}

    public static function getCompanyById($table, $id){

      if ($table == "clients") {
        $companyId = "client_id";
      } else {
        $companyId = "sts_id";
      }

      $query = DB::table($table)
                  ->where($companyId,$id)
  							  ->first();

  		return $query;
  	}

    public static function getAllShipByType($type){

      $ship = DB::table('ships')
                  ->where('ship_category',$type)
                  ->orderBy('ship_name','desc')
  							  ->get();

  		return $ship;
  	}

    public static function getShipById($id){

      $ship = DB::table('ships')
                  ->where('ship_id', $id)
  							  ->first();

  		return $ship;
  	}

    public static function getCardByClientId($id){

      $card= DB::table('ratecards as r')
               ->join('clients as c','c.client_id','=','r.card_client')
               ->where('r.card_client', $id)
               ->where('r.card_status', 'Active')
  						 ->get();

  		return $card;
  	}

    public static function getRateCardById($id){

      $card= DB::table('ratecards')
               ->where('card_id', $id)
  						 ->first();

  		return $card;
  	}

}
