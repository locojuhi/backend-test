<?php

namespace Backend\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Session;
class ReadPermission
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
        if(Auth::user()->role_id == 1){
           return $next($request); 
        }else{
            $permission = Auth::user()->permission()->get(['permission']);
            foreach ($permission as $key) {
                $var = json_decode($key->permission);
                $canread = json_decode($key->permission)->user->read;
                if($canread == 1){
                    return $next($request);
                }else{
                    Session::flash('message', "Can not read this user's info");
                    return redirect('/users');
                }
            }
        }
        
    }
}
