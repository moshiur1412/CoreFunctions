<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use JonathanTorres\MediumSdk\Medium;
 

class MediumServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('medium-php-sdk', function(){
            return new Medium(config('medium'));
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
