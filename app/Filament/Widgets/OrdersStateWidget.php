<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use App\Models\OrderLine;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Number;

class OrdersStateWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Orders Count', Order::count())
            ->description('Total of all orders')
            ->descriptionIcon('heroicon-o-star'),
            Stat::make('Total Paid', Number::currency(OrderLine::sum('subtotal')), 'USD')
            ->description('Total of all paid orders')
        ];
    }
}
