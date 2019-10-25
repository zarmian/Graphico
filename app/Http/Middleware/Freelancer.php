<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class Freelancer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    function handle($request, Closure $next)
{
    if (Auth::check() && Auth::user()->role == '2') {
        return $next($request);
    }
    elseif (Auth::check() && Auth::user()->role == '3') {
        return redirect('/client');
    }
    else {
        return redirect('/admin');
    }
}
}
