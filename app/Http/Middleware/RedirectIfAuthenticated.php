<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated {
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  \Closure $next
	 * @param  string|null $guard
	 *
	 * @return mixed
	 */
	public function handle( $request, Closure $next, $guard = null ) {
		switch ( $guard ) {
			case 'matchmaker':
				if ( Auth::guard( $guard )->check() ) {
					return redirect()->route( 'matchmaker.profile.auth' );
				}
				break;
			default:
				if ( Auth::guard( $guard )->check() ) {
					return redirect()->route( 'user.profile', Auth::user()->id );
				}
				break;
		}

		return $next( $request );
	}
}
