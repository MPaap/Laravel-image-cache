<?php

namespace MPaap\LaravelImageCache;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/laravel-image-cache.php' => config_path('laravel-image-cache.php'),
        ], 'image-cache');

        $this->loadRoutesFrom(__DIR__.'/routes/laravel-image-cache.php');
    }

    public function register()
    {
        //
    }
}
