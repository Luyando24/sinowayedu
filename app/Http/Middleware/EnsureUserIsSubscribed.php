<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsSubscribed
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // For guest users, allow access to programs but not university details
        if (!$request->user()) {
            // Check if the route is for university details
            if (str_contains($request->path(), 'university.details')) {
                return redirect()->route('subscription.required');
            }
            
            // Allow access to programs for guests
            return $next($request);
        }
        
        // For logged-in users, check subscription status
        if (!$request->user()->subscribed()) {
            // This user is not a paying customer
            return redirect()->route('subscription.required');
        }

        return $next($request);
    }
}



