<?php

namespace App\Http\Middleware;

use Closure;

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
                if(Auth::check() && ($user->role('superadmin'))) {
                    return $next($request);
                } else 
                {
                    return redirect('/access-denied');
                }
                
            }

            else if(strtolower($role) == 'sekolah') 
            {
                if(Auth::check() && ($user->role('sekolah'))){
                    return $next($request);
                } else 
                {
                    return redirect('/access-denied');
                }
            }
            else 
            {
                if(Auth::check() && ($user->role($role))){
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
