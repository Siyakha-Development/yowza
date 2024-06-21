<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isCorporate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            return redirect('/login');
        }

        $userRoles = auth()->user()->roles()->pluck('name')->toArray();

        $prefix = null;

        // Check user roles and set prefix accordingly
        if (in_array('Corporate Sponsors', $userRoles)) {
            $prefix = 'corporate';
        } elseif (in_array('SMME', $userRoles)) {
            $prefix = 'smme';
        } elseif (in_array('Development Partners', $userRoles)) {
            $prefix = 'development';
        } elseif (in_array('Idividual', $userRoles)) {
            $prefix = 'individual';
        } elseif (in_array('Administrator (can create other users', $userRoles)) {
            $prefix = 'admin';
        }

        if ($prefix !== null) {
            $request->route()->setParameter('prefix', $prefix);
        }

        return $next($request);
    }
}
