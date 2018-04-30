<?php

namespace App\Http\Controllers\back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MatchMaker extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		//
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
				return "ok";
			} else {

				return $data;
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
		$data               = $request->all();
		$mm_user            = \App\MatchMaker::findOrFail( $id );

		$name               = $data['name'];
		$email              = $data['email'];
		$image              = $data['thumb'];
		$password_1         = $data['password_1'];
		$password_2         = $data['password_2'];

		$arrayData          = array();
		$arrayData['name']  = $name;
		$arrayData['email'] = $email;
		if ( isset( $image ) ) {
			$arrayData['image'] = $image;
		}
		if ( isset( $password_1 ) && isset( $password_2 ) ) {
			$arrayData['password'] = $password_1;
		}

		$mm_user->update( $arrayData );


		return redirect( route( 'admin.matchmaker.show', $id ) );
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
