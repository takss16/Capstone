<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class preventBackToLoginPage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // To prevent Back HIstory When Logged in
        $response = $next($request);
        $response->headers->set('Cache-Control', 'nocache,no-store,max-age=0;must-revalidate');
        $response->headers->set('Prgram', 'no-cache');
        $response->headers->set('Expire', 'Sun, 02 1990 00:00:00 GMT');

        return $response;
        
    }
}