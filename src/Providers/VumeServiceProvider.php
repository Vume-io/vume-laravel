<?php

namespace Vume\Laravel\Providers;

use Vume\Laravel\Libraries\CMS;
use Illuminate\Support\ServiceProvider;

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
    }
}
