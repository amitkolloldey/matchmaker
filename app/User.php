<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','rewards','status','preferances','age','other','public_visibility','image','gender','activation_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];



    public function role(){
        return $this->belongsTo('App\Role','role_id');
    }



    public function activation_code(){
        return $this->hasOne('App\ActivationCode');
    }



    public function checkstatus(){
        if($this->status){
            return true;
        }
        return false;
    }
}
