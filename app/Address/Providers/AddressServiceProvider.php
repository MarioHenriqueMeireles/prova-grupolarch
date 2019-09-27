<?php

namespace App\Packages\Address\Providers;

use Illuminate\Support\ServiceProvider;

class AddressServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../../resources/migrations');
   /*     $this->publishes([
            __DIR__ . '/../../resources/migrations' => base_path('database/migrations')
                ], 'migrations');*/
        $this->publishes([
            __DIR__ . '/../../resources/assets' => base_path('resources/assets')
                ], 'assets');
        $this->publishes([
            __DIR__ . '/../../resources/seeds' => base_path('database/seeds')
                ], 'migrations');
        $this->loadViewsFrom(__DIR__ . '/../../resources/views/addresses', 'addresses');
        $this->loadViewsFrom(__DIR__ . '/../../resources/views/layouts', 'layouts');

        require __DIR__ . '/../../routes.php';
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {


        $this->app->bind(\Address\Repositories\AddressRepository::class, \Address\Repositories\AddressRepositoryEloquent::class);
        //:end-bindings:
    }

}
