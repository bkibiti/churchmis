<?php

namespace App\Http\Middleware;

use Closure;

class CheckUserAdmin
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
        if(auth()->user()->is_admin === 'FALSE')
        {
            return redirect()->route('member-home');
        }
        return $next($request);
    }
}
