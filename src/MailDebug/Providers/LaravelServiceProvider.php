<?php

namespace App\Subsystem\MailDebug\Providers;

use Illuminate\Support\ServiceProvider;

class LaravelServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . "../views, 'mail.debug');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
    }
}
