<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Gate;

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
        Gate::define('admin',function($user){
            return $user->roles == 'admin';
        });

        Gate::define('user',function($user){
            return $user->roles == 'teacher' || $user->roles == 'student';
        });

        Gate::define('special',function($user){
            return $user->roles == 'teacher' || $user->roles == 'admin';
        });
    }
}
