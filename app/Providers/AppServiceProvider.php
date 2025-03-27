<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
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
    public function boot()
{
    // Load API routes manually
    Route::prefix('api') // Adds /api prefix to all routes
         ->middleware('api') // Applies API middleware
         ->group(base_path('routes/api.php'));
}
}
