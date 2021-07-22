<?php

namespace Vume\Laravel\Providers;

use Vume\Laravel\Libraries\CMS;
use Vume\Laravel\Commands\ClearCache;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class VumeServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('CMS', function ($app) {
            return new CMS();
        });

        $this->mergeConfigFrom(
            __DIR__ . '/../Config/vume.php',
            'vume'
        );
    }

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../Config/vume.php' => config_path('vume.php'),
        ]);

        Route::group(['prefix' => 'vume'], function () {
            $this->loadRoutesFrom(__DIR__.'/../Routes/vume.php');
        });

        if ($this->app->runningInConsole()) {
            $this->commands([
                ClearCache::class
            ]);
        }
    }
}
