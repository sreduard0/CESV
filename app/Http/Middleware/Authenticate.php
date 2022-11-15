<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Authenticate
{
    public function handle(Request $request, Closure $next)
    {
        session()->put([
            'CESV' => [
                'profileType' => 1,
                'notification' => 1,
                'loginID' => 1,
            ],

            'user' => [
                'id' => 1,
                'name' => 'Eduardo Martins',
                'photo' => 'img/viatura.jpg',
                'professionalName' => 'Eduardo',
                'email' => 'dudu.martins373@gmail.com',
                'rank' => 'Cb',
                'company' => [
                    'id' => 2,
                    'name' => 'CCSv',
                ],
            ],

            'theme' => 1,
        ]);

        $s = session('CESV');
        $session = session('user');
        if ($session && $s) {
            return $next($request);
        }
        return redirect()->route('login');
    }
}
