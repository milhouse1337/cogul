<?php

namespace Milhouse1337\Cogul;

use Illuminate\Support\ServiceProvider;

class CogulServiceProvider extends ServiceProvider
{

    public function boot() {

        $this->publishes([
            __DIR__.'/config/cogul.php' => config_path('cogul.php'),
        ]);

        $this->loadRoutesFrom(__DIR__.'/routes.php');

        $this->app['router']->aliasMiddleware('auth.cogul', \Milhouse1337\Cogul\CogulMiddleware::class);

    }

    public function register() {

        $this->mergeConfigFrom(
            __DIR__.'/config/cogul.php', 'cogul'
        );

    }
}
