<?php namespace App\Http\Controllers;


use DB;
use Carbon\Carbon;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PersonnelController extends Controller {


	public function __construct(){

		$this->middleware('loggedin');
	}

  public function personnelBoard (request $request) {

		//dapatkan variable daripada middleware
		$userInfo = resolve('userInfo');
		//dapatkan semua poac
		$poac = User::getAllUserByRole2('CP');
		$admins = User::getAllUserByRole2('AD');
		$approvals = User::getAllApprovalUser();

    return view('personnelBoard')
				 ->with('poac',$poac)
				 ->with('admins',$admins)
				 ->with('approvals',$approvals)
				 ->with('user',$userInfo);
  }

  public function addUser (request $request) {

		//dapatkan variable daripada middleware
		$userInfo = resolve('userInfo');

		if ($userInfo->usr_role != "AD") {
			return redirect('error');
		}

    return view('addUser')
				 ->with('user',$userInfo);
  }

  public function profile (request $request) {

		//dapatkan variable daripada middleware
		$userInfo = resolve('userInfo');

		if ($request->isMethod('post') && $request->tab == "profile") {

			if ($userInfo->usr_role == 'AD') {
				$usr_role = $request->usr_role;
			} else {
				$usr_role = 'CP';
			}

			$dataProfile = array(
				'usr_employment_id' => $request->usr_employment_id,
				'usr_role' 					=> $usr_role,
				'usr_firstname' 		=> $request->usr_firstname,
				'usr_lastname' 			=> $request->usr_lastname,
				'usr_nric' 					=> $request->usr_nric,
				'usr_dob' 					=> $request->usr_dob,
				'usr_citizen' 			=> $request->usr_citizen,
				'usr_add1' 					=> $request->usr_add1,
				'usr_add2' 					=> $request->usr_add2,
				'usr_postcode' 			=> $request->usr_postcode,
				'usr_state' 				=> $request->usr_state,
				'usr_country' 			=> $request->usr_country,
				'usr_education' 		=> $request->usr_education,
				'usr_qualification' => $request->usr_qualification,
				'usr_jobtitle' 			=> $request->usr_jobtitle,
				'usr_division' 			=> $request->usr_division,
				'usr_employment' 		=> $request->usr_employment,
				'usr_mobile' 				=> $request->usr_mobile,
				'usr_email' 				=> $request->usr_email,
				'usr_bank_name' 		=> $request->usr_bank_name,
				'usr_bank_acc_no' 	=> $request->usr_bank_acc_no,
				'usr_kwsp_no' 			=> $request->usr_kwsp_no,
				'usr_updated' 			=> Carbon::now()
			);
			// echo '<pre>'; print_r($request->usr_role); die();
			$updateProfile = DB::table('users')->where('usr_id', $request->usr_id)->update($dataProfile);

			if ($userInfo->usr_role == 'AD') {
				return redirect('view-profile/'.$request->usr_id)->with('success', "Successfully update user profile.");
			} else {
				return redirect('profile')->with('success', "Successfully update user profile.");
			}


		} else if ($request->isMethod('post') && $request->tab == "password"){

			// echo $request->password2; die();
			if($request->password1 != $request->password2){
				return redirect('profile')->with('error', "Password confirmation didnt match. Please try again.");
			} else {
				$pass = hash('sha256', $request->password1);

				$dataPassword = array (
					'usr_pword' => $pass
				);
				$updatePassword = DB::table('users')->where('usr_id', $request->usr_id)->update($dataPassword);
				return redirect('profile#t02')->with('success', "Successfully update new password.");
			}
		} else if ($request->isMethod('post') && $request->tab == "bank"){

			$dataBank = array (
				'usr_bank_name' 	=> $request->usr_bank_name,
				'usr_bank_acc_no' => $request->usr_bank_acc_no,
				'usr_kwsp_no' 		=> $request->usr_kwsp_no
			);

			$updateBank = DB::table('users')->where('usr_id', $request->usr_id)->update($dataBank);
			return redirect('profile#t04')->with('success', "Successfully update Bank & KWSP info.");
		}

    return view('profile')->with('user',$userInfo);
  }

	public function viewProfile	($uid) {

		//dapatkan variable daripada middleware
		$userInfo = resolve('userInfo');

		$profile = User::getUserById($uid);

		return view('viewProfile')
				 ->with('user',$userInfo)
				 ->with('profile',$profile);
	}

	public function doUploadPic (request $request) {

		//dapatkan variable daripada middleware
		$userInfo = resolve('userInfo');

		request()->validate([
      'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

		$imageName = time().'.'.request()->image->getClientOriginalExtension();

		request()->image->move(public_path('img/pic'), $imageName);

		$updatePic = DB::table('users')->where('usr_id', $userInfo->usr_id)->update(array('usr_pic' => $imageName));

		return back()
					->with('success','You have successfully upload image.')
					->with('image',$imageName);

	}

	public function doAddUser (request $request) {

		//dapatkan variable daripada middleware
		$userInfo = resolve('userInfo');

		$pass = '';
		if ($request->password1 != $request->password2) {
			return redirect('adduser')->with('error', "Your password and password confirmation did not match.");
		} else {
			$pass = hash('sha256', $request->password1);
		}

		$dataProfile = array(
			'usr_employment_id' => $request->usr_employment_id,
			'usr_role' 					=> $request->usr_role,
			'usr_firstname' 		=> $request->usr_firstname,
			'usr_lastname' 			=> $request->usr_lastname,
			'usr_pword' 				=> $pass,
			'usr_nric' 					=> $request->usr_nric,
			'usr_dob' 					=> $request->usr_dob,
			'usr_citizen' 			=> $request->usr_citizen,
			'usr_add1' 					=> $request->usr_add1,
			'usr_add2' 					=> $request->usr_add2,
			'usr_postcode' 			=> $request->usr_postcode,
			'usr_state' 				=> $request->usr_state,
			'usr_country' 			=> $request->usr_country,
			'usr_education' 		=> $request->usr_education,
			'usr_qualification' => $request->usr_qualification,
			'usr_jobtitle' 			=> $request->usr_jobtitle,
			'usr_division' 			=> $request->usr_division,
			'usr_employment' 		=> $request->usr_employment,
			'usr_mobile' 				=> $request->usr_mobile,
			'usr_email' 				=> $request->usr_email,
			'usr_bank_name' 		=> $request->usr_bank_name,
			'usr_bank_acc_no' 	=> $request->usr_bank_acc_no,
			'usr_kwsp_no' 			=> $request->usr_kwsp_no,
			'usr_approval' 			=> 'Yes',
			'usr_active' 				=> 'Yes',
			'usr_updated' 			=> Carbon::now()
		);

		// echo '<pre>'; print_r($dataProfile); die();
		DB::table('users')->insert($dataProfile);

		return redirect('personnelboard')->with('success', "Successfully added new user.");
	}

	public function doDeleteUser (request $request) {

		//dapatkan variable daripada middleware
		$userInfo = resolve('userInfo');

		if ($userInfo->usr_role != "AD") {
			return redirect('error');
		}

		//check user first
		$check = DB::table('jobs')
							 ->where('job_owner', $request->user_id)
							 ->orWhere('job_mooring_master', $request->user_id)
							 ->orWhere('job_poac1', $request->user_id)
							 ->orWhere('job_poac2', $request->user_id)
							 ->count();

		if ($request->tab != '') {
			$tab = $request->tab;
		} else {
			$tab = '';
		}

		if ($check == 0) {
			DB::table('users')->where('usr_id', $request->user_id)->delete();
			return redirect('personnelboard'.$tab)->with('success', "Successfully delete user.");
		} else {
			DB::table('users')->where('usr_id', $request->user_id)->update(array('usr_delete'=>'Yes'));
			return redirect('personnelboard'.$tab)->with('success', "Successfully delete user.");
		}

	}

	public function doApproveUser ($uid) {

		//dapatkan variable daripada middleware
		$userInfo = resolve('userInfo');

		if ($userInfo->usr_role != "AD") {
			return redirect('error');
		}

		DB::table('users')->where('usr_id', $uid)->update(array('usr_approval'=>'Yes'));
		return redirect('personnelboard')->with('success', "User has been approved");

	}
}
