<?php

namespace App\Http\Middleware;

use Auth;
use App\User;
use Closure;

class uType
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
        if(Auth::user() && Auth::user()->uType == 1){
            return $next($request);
        }
        return redirect('/');
    }
}
