<?php

namespace Backend\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Session;
class IsActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
        if(Auth::user()->active == 0){
            Session::flush();
            Session::flash('message', 'User is not Validate, check email box');
            return redirect('/login');
               
        }else{
            return $next($request);
        }
        
    }
}
