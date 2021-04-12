<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;


class StatusCheckMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->user()->status != 1) {
            return redirect(route("acc.activation"));
        }
        return $next($request);
    }
}
