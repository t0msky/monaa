<?php namespace App\Http\Controllers;


use DB;
use Carbon\Carbon;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AssignmentController extends Controller {


	public function __construct(){

		$this->middleware('loggedin');
	}

  public function getAssignment (request $request) {

		//dapatkan variable daripada middleware
		$userInfo = resolve('userInfo');

    return view('assignment')->with('user',$userInfo);
  }

	public function addAssignment (request $request) {

		//dapatkan variable daripada middleware
		$userInfo = resolve('userInfo');

    return view('addAssignment')->with('user',$userInfo);
  }

}
