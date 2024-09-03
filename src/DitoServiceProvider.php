<?php

namespace LiveOficial\Dito;

use Illuminate\Support\ServiceProvider;

class DitoServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(DitoService::class, function ($app) {
            $api = new Api($app->config->get('dito'));
            return new DitoService($api);
        });
    }

    public function boot()
    {
        $this->mergeConfigFrom(__DIR__ . '/config.php', 'dito');
    }
}
