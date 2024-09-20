<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Wishlist;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;
use LukePOLO\LaraCart\Facades\LaraCart;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer('*', function (View $view) {
            $cartItems = LaraCart::getItems();
            $wishlistItems = once(fn() => Wishlist::getItems(auth()->id()));

            $view->with([
                'cartItems' => $cartItems,
                'wishlistItems' => $wishlistItems,
            ]);
        });

        Select::configureUsing(fn(Select $select) => $select->native(false));
        DatePicker::configureUsing(fn(DatePicker $date) => $date->native(false));
    }
}


