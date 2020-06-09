<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminAccess
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
        $roles = array();
        if (count(Auth::user('admin')->Roles) > 0){
            $roles = Auth::user('admin')->Roles;
        }
        $adminRoles = $roles->pluck('slug')->toArray();
        if (in_array('super-admin', $adminRoles) || in_array('admin', $adminRoles)) {
            return $next($request);
        }
        return response('Unauthorized Action', 403);
    }
}
