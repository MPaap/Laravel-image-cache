# Laravel image cache

Install

`composer require m-paap/laravel-image-cache`

Add to config/app.php

`MPaap\LaravelImageCache\ServiceProvider::class,
Intervention\Image\ImageServiceProvider::class`

Publish config

`php artisan vendor:publish --tag="image-cache"`

Usage

`/{config or default image}/{w}/{h}/{path to image}`
