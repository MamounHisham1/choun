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
    public function boot()
    {
    view()->composer('*', function (View $view) {
        $carts = Cart::getCart();
        $productIds = $carts->pluck('product_id')->toArray();
        $products = Product::whereIn('id', $productIds)->get()->keyBy('id');
        $cartProducts = [];

        foreach ($carts as $cart) {
            if (isset($products[$cart['product_id']])) {
                $cartProducts[] = $products[$cart['product_id']];
            }
        }

        $view->with('cartProducts', $cartProducts);
    });
}
