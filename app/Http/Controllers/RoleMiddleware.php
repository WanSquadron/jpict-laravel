<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\User;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role = null)
    {
        if($role != null) 
        {
            $user = User::find(Auth::user()->id);

            if(strtolower($role) == 'superadmin') {
                if(Auth::check() && ($user->role == 'SuperAdmin')) {
                    return $next($request);
                } else 
                {
                    die('testing');//return redirect('/access-denied');
                }
                
            }


            else if(strtolower($role) == 'sekolah') 
            {
                if(Auth::check() && ($user->role == 'Sekolah')){
                    return $next($request);
                } else 
                {
                    return redirect('/access-denied');
                }
            }
            else 
            {
                if(Auth::check() && ($user->role == $role)){
                    return $next($request);
                } 
                else 
                {
                    return redirect('/access-denied');
                }
            }
        } 
        else
        {
            return redirect('/access-denied');
        }
    
    }
}
