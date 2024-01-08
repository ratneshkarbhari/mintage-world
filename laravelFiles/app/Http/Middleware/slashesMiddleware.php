<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Redirect;

class slashesMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $lastChar = $request->getRequestUri()[-1];

        if ($lastChar != "/") {
            return Redirect::to("http://192.168.5.51" . $request->getRequestUri() . "/");
        }

        return $next($request);
    }
}
