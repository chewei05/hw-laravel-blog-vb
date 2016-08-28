<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class TinyMceServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'\..\..\vendor\tinymce\tinymce' => public_path('asset/tinymce'),
        ], 'tinymce');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
