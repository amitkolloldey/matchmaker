<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class MatchMakerLoginController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware( 'guest:matchmaker', [ 'except' => [ 'logout' ] ] );
	}


	public function showLoginForm() {
		return view( 'front.matchmaker_login' );
	}

	public function login( Request $request ) {
		$this->validate( $request, [
			'email'    => 'required|email',
			'password' => 'required|min:6'
		] );

		if ( Auth::guard( 'matchmaker' )->attempt( [
			'email'    => $request->email,
			'password' => $request->password
		], $request->remember ) ) {
			return redirect()->intended( route( 'matchmaker.profile' ) );
		}


		return redirect()->back()->withInput( $request->only( 'email', 'remember' ) );
	}

	public function logout() {
		Auth::guard( 'matchmaker' )->logout();

		return redirect( '/' );
	}
}
