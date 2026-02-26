<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  ...$roles
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // Niet ingelogd
        if (!auth()->check()) {
            abort(403, 'Niet geautoriseerd.');
        }

        // Rol niet toegestaan
        if (!in_array(auth()->user()->role, $roles, true)) {
            abort(403, 'Onvoldoende rechten.');
        }

        return $next($request);
    }
}
