<?php

namespace Rksugarfree\Gbooks;

use Illuminate\Support\ServiceProvider;

class GbooksServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/gbooks.php' => config_path('gbooks.php'),
            ], 'config');
        }

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'gbooks');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/gbooks.php', 'gbooks');
    }
}
