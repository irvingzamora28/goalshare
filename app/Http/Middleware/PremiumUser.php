<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PremiumUser
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->subscription_status === 'premium') {
            return $next($request);
        }

        return response()->json(['error' => 'Access denied. Premium users only.'], 403);
    }
}
