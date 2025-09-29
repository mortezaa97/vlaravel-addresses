<?php

namespace Mortezaa97\Addresses;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Mortezaa97\Addresses\Models\Address;
use Mortezaa97\Addresses\Policies\AddressPolicy;

class AddressesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        // Load migrations
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        // Load routes
        $this->loadRoutesFrom(__DIR__ . '/../routes/api.php');

        // Register policies
        Gate::policy(Address::class, AddressPolicy::class);

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/config.php' => config_path('address.php'),
            ], 'config');

            $this->publishes([
                __DIR__ . '/../database/migrations' => database_path('migrations'),
            ], 'migrations');

            $this->publishes([
                __DIR__ . '/../database/seeders' => database_path('seeders'),
            ], 'addresses-seeders');
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'addresses');

        // Register the main class to use with the facade
        $this->app->singleton('addresses', function () {
            return new Addresses;
        });
    }
}
