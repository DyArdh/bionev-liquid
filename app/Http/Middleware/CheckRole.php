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
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated
        if (!$request->user()) {
            return redirect('/login');
        }

        // Check if the user is an admin
        if ($request->user()->role === 'Admin') {
            return $next($request);
        }

        // For regular users, deny access to the /admin path
        return response()->json(['success' => false, 'message' => 'Anda Bukan Admin'], 401);
    }
}
