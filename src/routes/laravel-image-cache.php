<?php

Route::group(['middleware' => 'web'], function () {
    Route::get('image/{w}/{h}/{path}', function ($w, $h, $path) {
        $hash = 'cached_images/' . hash('sha512', $w . $h . $path);
        $final_path = storage_path('app/cached_images/' . hash('sha512', $w . $h . $path));

        if (!Illuminate\Support\Facades\Storage::exists($hash)) {
            $file = file_get_contents(config('laravel-image-cache.cache_from') . $path);
            Storage::put($hash, $file);

            $canvas = Intervention\Image\Facades\Image::canvas($w, $h);

            $image = Intervention\Image\Facades\Image::make($final_path)->fit($w, $h);

            $canvas->insert($image, 'center');

            $canvas->save($final_path, 70);
        }

        return response()->file($final_path);
    })->where('path', '.*');
});
