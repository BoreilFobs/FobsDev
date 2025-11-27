<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class PersistentLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Extend session lifetime if user is authenticated and has permanent login enabled
        if (Auth::check() && $request->session()->get('permanent_login')) {
            // Refresh session activity to prevent timeout
            $request->session()->put('last_activity', time());
            
            // Regenerate session periodically to maintain security
            if (!$request->session()->has('last_regeneration') || 
                (time() - $request->session()->get('last_regeneration', 0)) > 3600) {
                $request->session()->regenerate(false);
                $request->session()->put('last_regeneration', time());
            }
        }
        
        return $next($request);
    }
}
