<?php

namespace Backend\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class IsNotCustomer
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
        if(Auth::user()==null){
            return redirect('/login');
               
        }else{
            if (Auth::user()->role_id != 3){ 
                return redirect('/dashboard');
            }else{
                return $next($request);
            }
        }
    }
}
