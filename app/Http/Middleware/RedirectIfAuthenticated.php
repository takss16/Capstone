<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) { // ano kasi mga guard mo... anog yun web? alam ko kasu sa normal user lang sa appoitment master 
                if($guard == 'admin') return redirect()->route('admin.index');
                if($guard == 'account') return redirect()->route('account.patient.dashboard');
                else return redirect()->route('appointment.user.info');
                
            }

        }

        return $next($request);
    }
}
