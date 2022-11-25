<?php

namespace App\Http\Middleware;

use Closure;

class RolesMiddleware
{
    public function handle($request, Closure $next, $role)
    {
        $roles = explode(">", $role);
        foreach ($roles as $role) {
            $roles = [0 => 'cmtgda', 1 => 'trnp', 2 => 'adj', 3 => 'cost', 4 => 'fiscadm', 5 => 'adm'];
            if ($roles[session('CESV')['profileType']] == $role) {
                return $next($request);
            }

        }
        return redirect()->back();

    }
}
