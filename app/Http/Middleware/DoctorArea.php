<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class DoctorArea
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
        // return $next($request);
        if(Auth::user()->role == 'doctor') {

            return $next($request);
        }
        return redirect('/');
    }
}
