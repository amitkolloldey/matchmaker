<?php

namespace App\Http\Controllers\admin;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminHomeController extends Controller
{



    public function index(){
        return view('admin.home');
    }



    public function login(){
        return view('admin.login');
    }

}
