<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class IssuerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            'App\Interfaces\IssuerRepositoryInterface',
            'App\Repositories\IssuerRepository'
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
