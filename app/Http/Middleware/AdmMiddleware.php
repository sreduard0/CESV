<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdmMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $session = session('user');
        if ($session && session('CESV')['profileType'] == 1) {
            return $next($request);
        }
        return redirect()->route('login');
    }
}
