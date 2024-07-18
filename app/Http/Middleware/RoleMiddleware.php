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
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // Check if the user has one of the required roles
        if (!$request->user() || !in_array($request->user()->role, $roles)) {
            // Unauthorized access, redirect or display error message
            return redirect('/')->with('error', 'Unauthorized access');
        }

        return $next($request);
    }
}
