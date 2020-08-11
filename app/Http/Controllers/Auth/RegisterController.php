<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use App\UserDetail;
use App\UserOtp;
use Carbon\Carbon;
use PHPMailer\PHPMailer\PHPMailer;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = '/otpcheck';

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
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'email' => ['required','email' ,'string', 'max:255'],
            'dob' => ['required'],
            'city' => ['required', 'string', 'max:255'],
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
        $user = new User;
        $user->username = $data['username'];
        $user->password = Hash::make($data['password']);
        $user->status = false;
        $user->save();

        $detail = new UserDetail;
        $detail->user_id = $user->id;
        $detail->name = $data['name'];
        $detail->email = $data['email'];
        $detail->dob = Carbon::parse($data['dob']);
        $detail->city = $data['city'];
        $detail->save();

        $otp = new UserOtp;
        $otp->user_id = $user->id;
        $otp->otp = rand(1000,9999);
        $otp->save();

        $mail = new PHPMailer;
        $mail->setFrom('test@gmail.com','Test');
        $mail->addAddress($data['email'], $data['name']);
        $mail->isHTML(true);                                  
        $mail->Subject = 'Please confirm your account';
        $mail->Body    = 'Your OTP is <b>'.$otp->otp.'</b>';
        $mail->send();
        
        return $user;
    }
}
