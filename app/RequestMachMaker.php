<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestMachMaker extends Model {
	protected $table = 'request_mach_makers';
	protected $fillable = [
		'user_id',
		'request_status'
	];
}
