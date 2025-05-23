<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Always log this to confirm middleware is running
        Log::info('SetLocale middleware is running');
        
        // Get locale from session
        $sessionLocale = Session::get('locale', 'en'); // Default to 'en' if not set
        
        // For debugging
        Log::info('SetLocale middleware - Session locale: ' . ($sessionLocale ?? 'null'));
        
        // If session has locale and it's valid, set it
        if ($sessionLocale && in_array($sessionLocale, ['en', 'ru', 'fr'])) {
            App::setLocale($sessionLocale);
            Log::info('SetLocale middleware - Setting locale to: ' . $sessionLocale);
        } else {
            // Set default locale to English
            App::setLocale('en');
            Log::info('SetLocale middleware - Setting default locale to: en');
        }
        
        Log::info('SetLocale middleware - App locale is now: ' . App::getLocale());
        
        return $next($request);
    }
}













