<?php

namespace App;

use DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function getUser($usr_id){

  		$user = DB::table('users as u')
  							->where('u.usr_id',$usr_id)
  							->first();

  		return $user;
  	}

    public static function getAllUserByRole($role) {

      $user = DB::table('users as u')
  							->where('u.usr_role',$role)
  							->where('u.usr_delete', 'No')
                ->where('u.usr_active', 'Yes')
                ->where('u.usr_approval', 'Yes')
  							->get();

  		return $user;
    }


    public static function getAllUserByRole2($role) {

      $user = DB::table('users as u')
  							->where('u.usr_role',$role)
  							->where('u.usr_delete', 'No')
  							->where('u.usr_approval', 'Yes')
  							->get();

  		return $user;
    }

    public static function getUserById($id) {

      $user = DB::table('users as u')
  							->where('u.usr_id',$id)
  							->first();

  		return $user;
    }

    public static function getAllApprovalUser () {

      $user = DB::table('users as u')
  							->where('u.usr_delete', 'No')
  							->where('u.usr_approval', 'No')
                ->orderBy('u.usr_created','desc')
  							->get();

  		return $user;

    }
}
