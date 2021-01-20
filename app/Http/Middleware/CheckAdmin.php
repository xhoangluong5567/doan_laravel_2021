<?php

namespace App\Http\Middleware;



use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
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
        if(Auth::check()) {
            $user = Auth::user();
            if ($user->is_admin == 1) {
                return $next($request);
            } else {
                Auth::logout();
                return redirect()->route('login')->withErrors('Bạn không có quyền truy cập');
            }
        } else {
            return abort(403);
        }

    }
}
