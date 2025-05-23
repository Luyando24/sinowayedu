<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class TranslationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // The t() function is now defined in app/helpers.php
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
