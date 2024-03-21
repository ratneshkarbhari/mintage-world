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
            return Redirect::to("https://ultrasofttoys.com". $request->getRequestUri() . "/");
        }

        return $next($request);
    }
}
