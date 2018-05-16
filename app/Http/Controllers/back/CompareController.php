<?php

namespace App\Http\Controllers\back;

use App\MatchedProfile;
use App\RequestMachMaker;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CompareController extends Controller {
	public function __construct() {
		$this->middleware( 'auth:matchmaker');
	}
	public function compareTo( $id ) {

		$user  = User::findOrFail( $id );
		$users = User::all()->sortByDesc( "id" );

		return view( 'front.compare' )
			->with( 'users', $users )
			->with( 'user', $user );
	}

	public function getUsers( Request $request ) {
		$users = User::all( 'id', 'name', 'age', 'gender', 'image' )->sortByDesc( 'id' );

		return $users->toJson( JSON_PRETTY_PRINT );
	}

	public function getUser( Request $request ) {

		$data = $request->all();
		$user = User::findOrFail( $data['id'] );

		return $user->toJson( JSON_PRETTY_PRINT );
	}

	public function matched( Request $request ) {
		$data = $request->all();
		if ( Auth::check() ) {
			//get matchmaker id
			$req_id     = $data['profile_1'];
			$mac_id     = $data['profile_2'];
			$mac_mat_id = Auth::user()->id;
			$create     = MatchedProfile::create( [
				'req_profile' => $req_id,
				'mac_profile' => $mac_id,
				'match_maker' => $mac_mat_id
			] );

			return redirect( route( '/' ) );
		} else {
			return redirect( route( '/' ) );
		}

	}
}
