<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class BookingItemsServiceProvider extends ServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    public function boot() {
        
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {
        $this->app->bind('App\Repositories\BookingItems\BookingItemsInterface', 'App\Repositories\BookingItems\BookingItemsRepository');
    }

}
