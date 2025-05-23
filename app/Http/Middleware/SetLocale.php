<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
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
        // Get locale from session
        $sessionLocale = Session::get('locale', 'en'); // Default to 'en' if not set
        
        // If session has locale and it's valid, set it
        if ($sessionLocale && in_array($sessionLocale, ['en', 'ru', 'fr'])) {
            App::setLocale($sessionLocale);
        } else {
            // Set default locale to English
            App::setLocale('en');
        }
        
        return $next($request);
    }
}















