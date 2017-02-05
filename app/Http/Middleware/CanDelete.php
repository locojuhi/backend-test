<?php

namespace Backend\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Session;
class CanDelete
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
        if(Auth::user()->role_id != 1){
            Session::flash('message', 'You Can not Create or Delete users');
            return redirect('/users');
        }else{
            return $next($request);return $next($request);    

        }
        
    }
}
