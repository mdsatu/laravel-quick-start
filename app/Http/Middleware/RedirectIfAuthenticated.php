<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        // Admin Redirection
        if (Auth::guard('back')->check()) {
            return redirect()->route('back.dashboard');
        }
        //User Redirection
        if (Auth::guard($guard)->check()) {
            return redirect()->route('homepage');
        }

        return $next($request);
    }
}
