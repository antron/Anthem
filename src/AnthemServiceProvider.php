<?php

namespace Antron\Anthem;

use Illuminate\Support\ServiceProvider;

class AnthemServiceProvider extends ServiceProvider
{

    public function boot()
    {
    }

    public function register()
    {
        $this->app->singleton('anthem', function($app) {
            return new Anthem;
        });
    }

    public function provides()
    {
        return ['anthem'];
    }

}
