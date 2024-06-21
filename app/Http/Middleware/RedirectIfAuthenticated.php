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
            // if (Auth::guard($guard)->check()) {
            //     return redirect(RouteServiceProvider::HOME);
            // }

            if (Auth::guard($guard)->check()) {
                $user_roles = Auth::guard($guard)->user()->roles()->pluck('name')->toArray();

                if (in_array('SMME', $user_roles)) {
                    return redirect('/smme/admin/dashboard');
                } elseif (in_array('Administrator (can create other users)', $user_roles)) {
                    return redirect('/admin/admin/dashboard');
                } elseif (in_array('Development Partners', $user_roles)) {
                    return redirect('/development/admin/dashboard');
                } elseif (in_array('Corporate Sponsors', $user_roles)) {
                    return redirect('/corporate/admin/dashboard');
                } elseif (in_array('Individual', $user_roles)) {
                    return redirect('/individual/admin/dashboard');
                }
            }
        }

        return $next($request);
    }
}
