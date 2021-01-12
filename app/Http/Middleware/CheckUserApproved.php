<?php

namespace App\Http\Middleware;

use Closure;

class CheckUserApproved
{
 
    public function handle($request, Closure $next)
    {

        if (auth()->user()->status == '0') {
            return redirect()->route('pending-approval');
        }

        return $next($request);
    }
}
