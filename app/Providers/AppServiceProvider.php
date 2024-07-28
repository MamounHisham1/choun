<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer('*', function (View $view) {
            $cartItems = Cart::getItems();

            $view->with('cartItems', $cartItems);
        });
    }
}
