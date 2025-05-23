<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

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
        
        // Share auth user with all views
        View::composer('*', function ($view) {
            $view->with('authUser', Auth::user());
        });
    }

    /**
     * Set the application locale from session
     */
    protected function setLocaleFromSession(): void
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
    }
}




