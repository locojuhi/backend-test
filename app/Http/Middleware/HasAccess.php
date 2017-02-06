<?php

namespace Backend\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;
use Session;

class HasAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
        if(Auth::user()==null){
            Session::flash('message', 'You must sign in to have access');
            return redirect('/login');
               
        }else{
            if (Auth::user()->role_id == 3) {
               Session::flash('message', 'You have not permited enter');
               return redirect('home'); 
            } 
        }
        return $next($request);
    }
}
