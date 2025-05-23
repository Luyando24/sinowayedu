<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Set the application locale based on session
        $this->setLocaleFromSession();
    }

    /**
     * Set the application locale from session
     */
    protected function setLocaleFromSession(): void
    {
        // Get locale from session
        $sessionLocale = Session::get('locale', 'en'); // Default to 'en' if not set
        
        // Log for debugging
        Log::info('AppServiceProvider - Session locale: ' . ($sessionLocale ?? 'null'));
        
        // If session has locale and it's valid, set it
        if ($sessionLocale && in_array($sessionLocale, ['en', 'ru', 'fr'])) {
            App::setLocale($sessionLocale);
            Log::info('AppServiceProvider - Setting locale to: ' . $sessionLocale);
        } else {
            // Set default locale to English
            App::setLocale('en');
            Log::info('AppServiceProvider - Setting default locale to: en');
        }
        
        Log::info('AppServiceProvider - App locale is now: ' . App::getLocale());
    }
}


