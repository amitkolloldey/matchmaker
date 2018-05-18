<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Password;

class MatchMakerResetPasswordController extends Controller
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
    protected $redirectTo = '/matchmaker';



    protected function redirectTo()
    {
        if (Auth::check()) {
            return route('user.profile',Auth::user()->id);
        }
        return '/';
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:matchmaker');
    }

	protected function guard() {
		return Auth::guard( 'matchmaker' );
	}

	protected function broker() {
		return Password::broker( 'matchmakers' );
	}

	public function showResetForm( Request $request, $token = null ) {
		return view( 'auth.passwords.matchmaker-reset' )->with(
			[ 'token' => $token, 'email' => $request->email ]
		);
	}
}
