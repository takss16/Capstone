<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
// app/Http/Middleware/CheckUserRole.php



public function handle(Request $request, Closure $next)
{
    $user = Auth::user();

    if ($user && ($user->role === 'ADMIN' || $user->role === 'MIDWIFE')) {
        return $next($request);
    }

    abort(403, 'Unauthorized action.');
}


}
