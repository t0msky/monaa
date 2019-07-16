<?php

namespace App\Http\Controllers\Auth;

use DB;
use Mail;
use Carbon\Carbon;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function getRegister() {

      return view('register');
    }

    public function postRegister(request $request) {

      $errorMsg = [];

      //validation with input email
      if ($request->email != '') {
          $email = Self::checkEmail($request->email);
          if ($email == 1) {
              $errorMsg[] = 'Email address <strong>' . $request->email . '</strong> is not available.';
          }
      } else {
        $errorMsg[] = 'Email is required.';
      }

      //validate with password
      //validation with input password
      if ($request->password != '' && $request->password_confirmation != '' && $request->password != $request->password_confirmation) {
          $errorMsg[] = 'Your password and password confirmation did not match.';
      }

      if (empty($errorMsg)) {

        $pass = hash('sha256', $request->password);

        // Generate code
        $length = 20;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        DB::table('users')->insert(
          array(
            'usr_firstname'=> $request->firstname,
            'usr_lastname'=> $request->lastname,
            // 'usr_mobile'=> $request->mobileno,
            'usr_email'=> $request->email,
            'usr_pword'=> $pass,
            'usr_role'=> 'CP',
            'usr_active'=> 'No',
            'usr_verify_code'=> $randomString,
            'usr_created' => Carbon::now()
          )
        );

        // Email

        $message = '';
  			$subject = 'Monaa - Email Verification';
  			$email = $request->email;
  			$name = $request->firstname.' '.$request->lastname;

  			$mail = Mail::send('emails.mail', ['name' => $name, 'verifyCode' => $randomString], function($message) use ($subject, $email, $name) {
  					$message->to($email, $name)
  									->subject($subject);
  			});

        // Redirect to Register SUccess page
        return redirect('login')->with('success',"<strong>Congratulations!</strong> Registration has been successful. Please check your email to verify your account.");
      }

      return view('login')
                      ->with('errorMsg', $errorMsg);
    }

    public function checkEmail($email) {

        $count = DB::table('users')->where('usr_email', $email)->count();

        return $count;
    }

    public function doVerifyAccount ($code) {


      $verifyData = array('usr_active' => 'YES');
      DB::table('users')->where('usr_verify_code','=',$code)->update($verifyData);

      return redirect('login')->with('success',"<strong>Congratulations!</strong> Your account has been verified.");

    }
}
