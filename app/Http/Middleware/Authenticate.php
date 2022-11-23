<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Authenticate
{
    public function handle(Request $request, Closure $next)
    {
        $s = session('CESV');
        $session = session('user');
        if ($session && $s) {
            return $next($request);
        }
        return redirect()->route('login');
    }
}
