<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SoloAccoglienza
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->role != 2 and auth()->user()->role != 0 ) {
            abort("403");
        }

        return $next($request);
    }
}
