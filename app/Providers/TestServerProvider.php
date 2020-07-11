<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use JonathanTorres\MediumSdk\Medium;


class TestServerProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('test-service-prvider', function(){
            return new Medium(config('blog'));
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
