<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\User;
use App\Models\Wishlist;
use App\Policies\OrderPolicy;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Illuminate\Support\Facades\Gate;
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
            $wishlistItems = once(fn() => Wishlist::getItems(auth()->id()));

            $view->with([
                'wishlistItems' => $wishlistItems,
            ]);
        });

        Select::configureUsing(fn(Select $select) => $select->native(false));
        DatePicker::configureUsing(fn(DatePicker $date) => $date->native(false));

        // Gate::before(fn(?User $user) => $user?->role !== 'admin');
    }
}


