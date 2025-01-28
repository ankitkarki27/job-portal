<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Middleware\RoleManager;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton('rolemanager', function ($app) {
            return new RoleManager();
        });
    }

    
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
