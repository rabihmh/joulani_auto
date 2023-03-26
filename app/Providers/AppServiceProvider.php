<?php

namespace App\Providers;

use GuzzleHttp\Psr7\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        App::bind('getvehicledata', function () {
            return new \App\Helpers\GetVehicleData;
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrapFour();
        //to remove, I used it only when i test hosting on ngrok
//        if (config('app.url') != \request()->getSchemeAndHttpHost()) {
//            URL::forceScheme('https');
//        }
    }
}
