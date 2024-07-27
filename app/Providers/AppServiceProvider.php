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
            $carts = Cart::getCart();
            $cartProducts = [];

            foreach($carts as $cart) {
                $product = Product::get()->where('id', '=', $cart['product_id']);
                $cartProducts[] = [$product, $cart['quantity']];
            }

            $view->with('cartProducts', $cartProducts);
        });
    }
}
