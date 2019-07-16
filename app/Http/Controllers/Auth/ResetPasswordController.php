<?php

namespace App\Http\Controllers\Auth;

use DB;
use Mail;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
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
        $this->middleware('guest');
    }

    public function forgotPassword (request $request) {

      if ($request->isMethod('post') ) {

        $user = DB::table('users')->where('usr_email',$request->email)->first();

        if (!$user) {

          return redirect('forgot-password')->with('error',"Your email did not return any results. Please try again with other email.");
        } else {

          // Generate code
          $length = 20;
          $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
          $charactersLength = strlen($characters);
          $randomString = '';
          for ($i = 0; $i < $length; $i++) {
              $randomString .= $characters[rand(0, $charactersLength - 1)];
          }

          //update code
          DB::table('users')->where('usr_id',$user->usr_id)->update( array('usr_verify_password' => $randomString) );

          // Email
          $message = '';
    			$subject = 'Monaa - Forgot Password';
    			$email = $request->email;
    			$name = $user->usr_firstname.' '.$user->usr_lastname;

    			$mail = Mail::send('emails.mail-forgot-password', ['name' => $name, 'verifyCode' => $randomString], function($message) use ($subject, $email, $name) {
    					$message->to($email, $name)
    									->subject($subject);
    			});

          return redirect('forgot-password')->with('success',"Thanks! Please check ".$email." for a link to reset your password.");
        }
        // echo '<pre>'; print_r($user); die();
      }
      // return view('emails.mail-forgot-password');
      return view('forgotPassword');
    }

    public function resetPassword ($code) {

      $user = DB::table('users')->where('usr_verify_password',$code)->first();

      if (!$user) {

        return redirect('forgot-password')->with('error',"This is not a valid link.");
      } else {

        return view('resetPassword')
             ->with('code',$code)
             ->with('user',$user);
      }
    }

    public function doResetPassword (request $request) {

        // echo $request->code;
        // echo $request->password1;
        // echo $request->password2;

        $user = DB::table('users')->where('usr_verify_password',$request->code)->first();

        if (!$user) {

          return redirect('reset-password/'.$request->code)->with('error',"Something wrong. Please try again later.");
        } else {

          if ($request->password1 != $request->password2) {

            return redirect('reset-password/'.$request->code)->with('error', "Password confirmation didnt match. Please try again.");
          } else {

            $pass = hash('sha256', $request->password1);

    				$dataPassword = array (
    					'usr_pword' => $pass,
              'usr_verify_password' => ''
    				);
    				$updatePassword = DB::table('users')->where('usr_verify_password', $request->code)->update($dataPassword);

    				return redirect('login')->with('success', "Successfully update new password. You now can login using your new password.");
          }
        }

    }
}
