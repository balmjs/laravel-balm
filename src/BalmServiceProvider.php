<?php

namespace Balm;

use Illuminate\Support\ServiceProvider;

class BalmServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config' => public_path('vendor/laravel-balm'),
        ], '.');
    }
}
