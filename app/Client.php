<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public static function getAllClient(){

  		$client = DB::table('clients')
  							->get();

  		return $client;
  	}
}
