<?php

namespace App\Http\Controllers\front;
use App\ActivationCode;
use App\Http\Controllers\Controller;
use App\Http\Requests\HomeRegisterRequest;
use App\Mail\UserActivationCode;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{


    public function showregform()
    {
        return view('front.home');
    }




    public function register(HomeRegisterRequest $request)
    {
        $user_data = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'rewards' => $request['rewards']
        ]);
        $activationcode = ActivationCode::create([
            'user_id' => $user_data->id,
            'token' => str_random(40)
        ]);
        Mail::to($user_data->email)->send(new UserActivationCode($user_data, $activationcode));
        return redirect('/')->with('success_msg', 'Please check email to activate your profile.');
    }



    public function activateuser($token)
    {
        $activateuser = ActivationCode::where('token', $token)->first();
        if (isset($activateuser)) {
            if($activateuser->user->status == NULL){
                $activateuser->user->status = 1;
                $activateuser->user->save();
                return redirect('/password/reset');
            }  else {
                Auth::logout();
                $status = "Your are already verified. You can now login.";
                return redirect('/login')->with('status', $status);
            }
        }
        $status = "Can not verify your email.";
        return redirect('/login')->with('status', $status);
    }

}