<?php

namespace App\Api\V1\Providers;

use Illuminate\Support\ServiceProvider;

class ServiceServiceProvider extends ServiceProvider
{
    protected $services = [
        // 'App\Api\V1\Services\User\UserServiceInterface' => 'App\Api\V1\Services\User\UserService',
        'App\Api\V1\Services\Auth\AuthServiceInterface' => 'App\Api\V1\Services\Auth\AuthService',
    ];
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        foreach ($this->services as $interface => $implement) {
            $this->app->singleton($interface, $implement);
        }
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
