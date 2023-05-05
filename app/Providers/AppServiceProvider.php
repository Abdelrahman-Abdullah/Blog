<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
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
        // Gate Also Can be used as middleware
        Gate::define('admin' , function (User $user){
            // Define a Gate Just authenticated user who is an Admin can Only Throw from
            return $user->username == '3bod';
        });

        // auth()->user()? ==> optional
        // auth()->user()?  ==> Check if the user authenticated , the check his username
        Blade::if('admin' , function (){
            // check if the authenticated user is an admin using gate above
            return request()->user()?->can('admin');
        });
    }
}
