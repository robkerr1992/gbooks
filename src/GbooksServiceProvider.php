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
    }

    public function register()
    {
        $this->app->singleton('gbooks', function ($app) {
            return new Gbooks(
                new \Google_Service_Books(new \Google_Client($app['config']['gbooks']))
            );
        });

        $this->mergeConfigFrom(__DIR__ . '/../config/gbooks.php', 'gbooks');
    }
}
