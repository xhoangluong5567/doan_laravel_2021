<?php

namespace App\Http\Middleware;

use Closure;

class CheckName
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
        
        if($request->name == 'abc'){
            return 'spam';
        }
        return $next($request);
    }
}
