<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Support\Facades\App;

class HttpsProtocol {

    public function handle($request, Closure $next)
    {
        if (!$request->secure() && App::environment() === 'production') {
            return redirect()->secure($request->getRequestUri());
        }
        if ((\Request::server('HTTP_X_FORWARDED_PROTO') == 'https')) {
            \URL::forceScheme('https');
        }
        return $next($request);
    }

}
