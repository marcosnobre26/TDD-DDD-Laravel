<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Role Repository
        /*$this->app->bind(
            'App\Repositories\Contracts\RoleRepositoryInterface',
            'App\Repositories\Eloquent\RoleRepository'
        );*/

        $this->app->bind(
            'App\Repositories\AbstractRepositoryInterface'
        );

        // Address Repository
        $this->app->bind(
            'App\Repositories\Address\Contracts\AddressRepositoryInterface',
            'App\Repositories\Address\Eloquent\AddressRepository'
        );

        // Users Repository
        $this->app->bind(
            'App\Repositories\Users\Contracts\UsersRepositoryInterface',
            'App\Repositories\Users\Eloquent\UsersRepository'
        );

        // Country Repository
        $this->app->bind(
            'App\Repositories\Country\Contracts\CountryRepositoryInterface',
            'App\Repositories\Country\Eloquent\CountryRepository'
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
