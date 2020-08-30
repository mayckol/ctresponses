<?php

namespace Mayckol\CtResponse;

use Illuminate\Support\ServiceProvider;

class CtResponseServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->mergeConfigFrom(__DIR__ . '/config/ctresponse.php', 'ctresponse');
        $this->publishes([
            __DIR__ . '/config/ctresponse.php' => config_path('response.php')
        ]);
    }

    public function register() {}
}
