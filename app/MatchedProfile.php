<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MatchedProfile extends Model {
	protected $table = 'matched_profiles';
	protected $fillable = [
		'req_profile',
		'mac_profile',
		'match_maker'
	];
}
