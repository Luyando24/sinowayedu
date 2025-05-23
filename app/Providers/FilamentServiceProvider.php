<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Filament\Infolists\Components\DocumentViewer;

class FilamentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Check if the Infolists class exists before trying to use it
        if (class_exists(\Filament\Infolists\Infolists::class)) {
            \Filament\Infolists\Infolists::registerComponents([
                DocumentViewer::class,
            ]);
        }
    }
}

