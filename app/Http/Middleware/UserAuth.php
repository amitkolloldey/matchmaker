<?php

namespace App\Http\Middleware;
use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Route;
class UserAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check()){ 
            if($request->id == Auth::user()->id){
                return $next($request);
            }
        }
          return redirect('/login');

    }
}
