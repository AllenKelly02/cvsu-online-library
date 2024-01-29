<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        Validator::extend('student_id', function ($attribute, $value, $parameters, $validator) {
            // Your custom validation logic for student_id
            // Return true if the validation passes, false otherwise
            return true;
        });
    }
}
