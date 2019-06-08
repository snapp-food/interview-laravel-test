<?php

namespace App\Providers;

use App\Model\Product;
use App\Repositories\ProductRepository;
use App\Repositories\UserRepository;
use App\Model\Restaurant;
use App\Repositories\RestaurantRepository;
use App\Model\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(RestaurantRepository::class, function ($app) {
            return new RestaurantRepository(Restaurant::class);
        });

        $this->app->bind(ProductRepository::class, function ($app) {
            return new ProductRepository(Product::class);
        });

        $this->app->bind(UserRepository::class, function ($app) {
            return new UserRepository(User::class);
        });
    }
}
