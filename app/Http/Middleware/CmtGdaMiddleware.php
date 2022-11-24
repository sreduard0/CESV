<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CmtGdaMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (session('CESV')['profileType'] == 0) {
            return $next($request);
        }
        return redirect()->route('login');
    }
}
