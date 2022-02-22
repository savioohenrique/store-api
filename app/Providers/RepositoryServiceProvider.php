<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    { 
        $this->app->bind(
            'App\Repositories\Interfaces\ProductRepositoryInterface',
            'App\Repositories\ProductRepository'
        );
        $this->app->bind(
            'App\Repositories\Interfaces\TagRepositoryInterface',
            'App\Repositories\TagRepository'
        );
        $this->app->bind(
            'App\Repositories\Interfaces\ProductTagRepositoryInterface',
            'App\Repositories\ProductTagRepository',
        );
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
