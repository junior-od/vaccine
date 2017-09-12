<?php

namespace App\Providers;

use Validator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        Validator::extend('valid_age', function($attribute, $value, $parameters) {

            if ($value > 10) {
                return false;
            }

            return true;
        });

        Validator::extend('valid_time', function($attribute, $value, $parameters) {

          return preg_match("/(2[0-4]|[01][1-9]|10):([0-5][0-9]):([0-5][0-9])/", $value);

        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
