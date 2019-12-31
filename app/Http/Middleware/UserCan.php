<?php

namespace App\Http\Middleware;

use Closure;

class UserCan
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $role = \Auth::user()->role;
        if ($role->slug == 'superadmin' || $role->slug == 'admin') {
            return $next($request);
        }

            if ($role != 'admin_dashboard') {
                if (!$role->can(\Request::route()->getName())) {
                    abort('401', 'Access Denied');
                }
            }


    }

}
