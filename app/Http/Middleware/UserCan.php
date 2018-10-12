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
        $role=\Auth::user()->role;
        if($role->slug!='superadmin' && !$role->hasAccess(\Request::route()->getName())){
            abort('404','Access Denied');
        }
        return $next($request);
    }

}
