<?php

namespace App\Http\Controllers\back;

use App\RequestMachMaker;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CompareController extends Controller {

	public function compareTo( $id, $compare_id = null ) {
		$findUser = RequestMachMaker::where( 'user_id', $id )->first();

		if ( $findUser ) {
			$user  = User::findOrFail( $id );
			$users = User::all()->sortByDesc( "id" );
			if ( ! is_null( $compare_id ) ) {
				$compareUser = User::findOrFail( $compare_id );
			} else {
				$compareUser = null;
			}

			return view( 'front.compare' )
				->with( 'users', $users )
				->with( 'compareUser', $compareUser )
				->with( 'user', $user );
		}
	}

	public function getUsers( Request $request ) {
		$users = User::all('id','name','age','gender','image')->sortByDesc( 'id' );

		return $users->toJson( JSON_PRETTY_PRINT );
	}

	public function getUser( Request $request ) {
		$users = User::all('name','age','gender','image')->sortByDesc( 'id' );

		return $users->toJson( JSON_PRETTY_PRINT );
	}
}
