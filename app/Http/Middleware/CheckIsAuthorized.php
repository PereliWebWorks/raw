<?php

namespace App\Http\Middleware;

use Closure;

class CheckIsAuthorized
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
        if ($request->user()->isAuthorized())
        {
            return $next($request);
        }
        return abort(403);
    }
}
