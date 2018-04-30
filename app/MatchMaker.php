<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MatchMaker extends Model {
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
		'password'
	];
}
