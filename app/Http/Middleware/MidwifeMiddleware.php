<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MidwifeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        // Check if the user is a midwife
        if (!(auth()->check() && auth()->user()->role == Str::upper('midwife'))) {
            abort(403, 'Unauthorized action.');
        }
        return $next($request); // pa try nga i run the munta sa route na yun

    }
}
