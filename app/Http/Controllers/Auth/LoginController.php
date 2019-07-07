<?php

namespace App\Http\Controllers\Auth;

use DB;
use Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(request $request) {

      if ($request->isMethod('post')) {

        $errorMsg = [];

        //check email
        if ($request->email != '') {
          $count = DB::table('users')->where('usr_email', $request->email)->count();

          if ($count != 0) {

            $countVerified = DB::table('users')->where('usr_email', $request->email)->where('usr_active', 'Yes')->count();
            if ($countVerified != 0) {
              $requestPass = urldecode($request->pword);
              $pass = hash('sha256', $requestPass);
              // check user db
              $user = DB::table('users')->where('usr_email', $request->email)->where('usr_pword', $pass)->first();

              if ($user) {

                session(['user' => $user->usr_id]);
                session(['role' => $user->usr_role]);

                return Redirect::to('dashboard/');
              } else {

                $errorMsg[] = 'The password you have entered is incorrect.';
              }
            } else {
              $errorMsg[] = 'Account not verified. Please check your email.';
            }
          } else {
            $errorMsg[] = 'Email does not exist.';
          }

        } else {
            $errorMsg[] = 'Email is required.';
        }

        return view('login')
             ->with('errorMsg', $errorMsg);

      } else {

        return view('login');
      }


    }

    public function doLogout(request $request) {

      $request->session()->flush();

      return Redirect::to('login');
    }
}
