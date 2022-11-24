<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdjMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (session('CESV')['profileType'] == 2) {
            return $next($request);
        }
        return redirect()->route('login');
    }

}
