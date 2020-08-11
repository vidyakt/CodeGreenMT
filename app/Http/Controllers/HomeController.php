<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\UserDetail;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::User();
        $user_details = User::with('user_detail')->find($user->id);
        return view('home',compact('user_details'));
    }
    public function editProfile($id)
    {
        $user=User::with('user_detail')->find($id);
        return view('editprofile',compact('user'));
    }

    public function updateProfile(Request $request,$id)
    {
        $user = UserDetail::where('user_id',$id)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->dob = $request->dob;
        $user->city=$request->city;
        $user->save();
        return redirect('/home');
    }

    public function checkOtp(Request $request)
    {
        $user=Auth::User();
        if($user->user_otp->otp == $request->otp)
        {
            $user->status = true;
            $user->save();

            $user->user_otp->delete();
            return redirect('/home');
        }
        else{
            Session::flash('message', 'Invalid OTP !'); 
            return view('otpcheck');   
        }
    }

}
