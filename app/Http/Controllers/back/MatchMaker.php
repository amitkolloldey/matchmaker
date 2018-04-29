<?php

namespace App\Http\Controllers\back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MatchMaker extends Controller {
	public function view( $id ) {
		return view( 'front.matchmaker' )->with( 'id', $id );
	}

	public function requestMatching( $id ) {

	}
}
