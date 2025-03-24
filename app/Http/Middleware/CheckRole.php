<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle($request, Closure $next, $role): Response
    {
        // Check if the user is authenticated
        if (!auth()->check()) {
            abort(403, 'Unauthorized: User not authenticated');
        }

        // Check the user's role
        if (auth()->user()->role !== $role) {
            abort(403, 'Unauthorized: Insufficient role');
        }

        return $next($request);
    }
}