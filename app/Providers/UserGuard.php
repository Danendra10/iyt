<?php

namespace App\Providers;

use FTP\Connection;
use Illuminate\Support\ServiceProvider;

class UserGuard extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //  
        $this->app->singleton(Connection::class, function($app){
            return new Connection(config('users'));
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
