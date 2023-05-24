<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        /* dd("auth class") */
        if (!Auth::guard('admin')->check()) {
            // If the user is not authenticated, redirect them to the login page or show an error message.
            return redirect()->route('gate.login-admin');
        }
        return $next($request);
    }
}
