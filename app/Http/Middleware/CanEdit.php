<?php

namespace Backend\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Session;
class CanEdit
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
        $currenturl = url()->current();
        $edituser = action('UserController@edit', ['id' => Auth::user()->id]);
        if($currenturl == $edituser){
            return $next($request);
        }elseif(Auth::user()->role_id != 1){
            Session::flash('message', 'You can not Edit this users Profile');
            return redirect()->action('UserController@index');
        }else{
            return $next($request);
        }
    }
}
