<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        // Check if the user is an admin
        if (!(auth()->check() && auth()->user()->user_level == Str::upper('admin'))) {
            abort(403, 'Unauthorized action.');
        }
        return $next($request); // naka guard ba yun mga users ng system mo or niyo? ganito pa lo

    }
}
