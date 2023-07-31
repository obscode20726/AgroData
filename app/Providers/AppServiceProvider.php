<?php

namespace App\Providers;

use Illuminate\Support\Facades\Validator;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('strong_password', function ($attribute, $value, $parameters, $validator) {
            // Check for at least one uppercase letter at the beginning
            if (!preg_match('/^[A-Z]/', $value)) {
                return false;
            }

            // Check for at least one digit
            if (!preg_match('/[0-9]/', $value)) {
                return false;
            }

            // Check for at least one symbol
            if (!preg_match('/[^A-Za-z0-9]/', $value)) {
                return false;
            }

            return true;
        });
    }
}
