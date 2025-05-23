<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
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
        // Get locale from route parameter
        $locale = $request->route('locale');
        
        // If locale is valid, set it
        if ($locale && in_array($locale, ['en', 'ru', 'fr'])) {
            App::setLocale($locale);
            Session::put('locale', $locale);
        } else {
            // If no valid locale is found in the route, check the session
            $sessionLocale = Session::get('locale');
            if ($sessionLocale && in_array($sessionLocale, ['en', 'ru', 'fr'])) {
                App::setLocale($sessionLocale);
            }
        }
        
        return $next($request);
    }
}








