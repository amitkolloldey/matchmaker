<?php

namespace App\Http\Controllers\back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class MatchMaker extends Controller {

	public function __construct() {
		$this->middleware( 'auth:matchmaker' );
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		//return view( 'front.matchmaker_login' );
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view( 'front.matchmaker' );
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function store( Request $request ) {
		$data = $request->all();

		if ( $data['password_1'] == $data['password_2'] ) {
			$name     = $data['name'];
			$email    = $data['email'];
			$password = bcrypt( $data['password_1'] );
			$image    = $data['thumb'];

			$create = \App\MatchMaker::create( [
				'name'     => $name,
				'email'    => $email,
				'status'   => 0,
				'image'    => $image,
				'password' => $password
			] );
			if ( $create ) {
				return redirect( route( 'matchmaker.profile', $create->id ) );
			} else {
				return redirect( route( 'matchmaker.create' ) );
			}
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function show( $id ) {
		if ( isset( $id ) ) {
			$mm_user = \App\MatchMaker::findOrFail( $id );

			return view( 'front.matchmaker_view' )->with( 'user', $mm_user );
		} else {
			//redirect to somewhere else
		}
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function edit( $id ) {
		if ( isset( $id ) ) {
			$mm_user = \App\MatchMaker::findOrFail( $id );

			return view( 'front.matchmaker_edit' )->with( 'user', $mm_user );
		} else {
			//redirect to somewhere else
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function update( Request $request, $id ) {
		$data    = $request->all();
		$mm_user = \App\MatchMaker::findOrFail( $id );

		$name       = $data['name'];
		$email      = $data['email'];
		$image      = $data['thumb'];
		$password_1 = $data['password_1'];
		$password_2 = $data['password_2'];

		$arrayData          = array();
		$arrayData['name']  = $name;
		$arrayData['email'] = $email;
		if ( ! is_null( $image ) ) {
			$arrayData['image'] = $image;
		}
		if ( ! is_null( $password_1 ) && ! is_null( $password_2 ) ) {
			$arrayData['password'] = $password_1;
		}

		$mm_user->update( $arrayData );


		return redirect( route( 'matchmaker.profile', $id ) );
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function destroy( $id ) {
		//
	}
}
