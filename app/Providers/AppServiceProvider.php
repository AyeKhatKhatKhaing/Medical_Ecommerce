<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (config('app.env') != "local") {
            $this->app['request']->server->set('HTTPS','on'); // this line
            \URL::forceScheme('https');
         };
       
         Validator::extend('valid_video_url', function ($attribute, $value, $parameters, $validator) {
            $allowedExtensions = ['mp4', 'avi', 'mov', 'wmv', 'flv'];
        
            // Extract the file extension from the URL
            $extension = pathinfo(parse_url($value, PHP_URL_PATH), PATHINFO_EXTENSION);
        
            // Check if the file extension is in the list of allowed extensions
            return in_array(strtolower($extension), $allowedExtensions);
        });
    }
}
