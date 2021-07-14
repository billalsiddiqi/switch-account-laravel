<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class SwitchTo
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::guard('admin')->check() && !Auth::user()){
            return redirect('/switch');
        }elseif(Auth::user() && !Auth::guard('admin')->check()) {
            return redirect('/switch');
        }else {
            return $next($request);
        }
    }
}
