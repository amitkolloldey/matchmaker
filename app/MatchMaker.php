<?php

namespace App;


use App\Notifications\MatchMakerResetPasswordNotification;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class MatchMaker extends Authenticatable {
	use Notifiable;
	protected $guarded = 'match_maker';
	protected $table = 'match_makers';
	protected $fillable = [
		'name',
		'email',
		'password',
		'status',
		'image'
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password',
		'remember_token',
	];

	public function sendPasswordResetNotification( $token ) {
		$this->notify( new MatchMakerResetPasswordNotification( $token ) );
	}
}
