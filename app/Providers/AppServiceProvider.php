<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Wishlist;
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
            $wishlistItems = once(fn() => Wishlist::getItems(auth()->id()));

            $view->with([
                'cartItems' => $cartItems,
                'wishlistItems' => $wishlistItems,
            ]);
        });
    }
}


