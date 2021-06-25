<?php

namespace App\Http\Middleware;

use Closure;

class RedirectFromPublic
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
        $segments = $request->segments();
        if(strpos(url('/'), '/public') !== false){
            $new_url = str_replace('/public', '/', url('/')) . implode('/', $segments);

            return redirect()->to($new_url, 301);
        }
        return $next($request);
    }
}
