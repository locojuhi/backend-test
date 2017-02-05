<?php

namespace Backend\Http\Middleware;
/*Middleware for Customer to edit only his(er) profile*/
use Closure;
use Illuminate\Support\Facades\Auth;
class EditOwnProfile
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
        if($request->id == Auth::user()->id){
            return $next($request);
        }else{
            return redirect()->action('UserController@editprofile', ['id' => Auth::user()->id]);
        }
    }
}
