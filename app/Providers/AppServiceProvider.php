<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
        // THIS IS WHERE YOU CONFIRM THE SERVICES YOU'RE USING
        // e.g. for bootstrap pagination
        // Paginator::useBootstrap();
    }
}
