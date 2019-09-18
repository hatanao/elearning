<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next ,  $guard = null)
    {
        // if login user is not the admin go back to home
        
        if(Auth::guard($guard)->check() && auth()->user()->is_admin){
            return $next($request);
        }else{
            return redirect('/home');
        }
    }
}
