<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use App\Models\Order;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;

class ListOrders extends ListRecords
{
    protected static string $resource = OrderResource::class;

    public function getTabs(): array
    {
        return [
            'all' => Tab::make('All'),
            'pending' => Tab::make('Pending')
                ->modifyQueryUsing(fn($query) => $query->where('status', \App\OrderStatus::Pending))
                ->badge(fn() => Order::where('status', \App\OrderStatus::Pending)->count())
                ->badgeColor('warning'),
            'approved' => Tab::make('Approved')
                ->modifyQueryUsing(fn($query) => $query->where('status', \App\OrderStatus::Approved))
                ->badge(fn() => Order::where('status', \App\OrderStatus::Approved)->count())
                ->badgeColor('success'),
            'shipped' => Tab::make('Shipped')
                ->modifyQueryUsing(fn($query) => $query->where('status', \App\OrderStatus::Shipped))
                ->badge(fn() => Order::where('status', \App\OrderStatus::Shipped)->count())
                ->badgeColor('primary'),
            'arrived' => Tab::make('Arrived')
                ->modifyQueryUsing(fn($query) => $query->where('status', \App\OrderStatus::Arrived))
                ->badge(fn() => Order::where('status', \App\OrderStatus::Arrived)->count())
                ->badgeColor('gray'),
            'canceled' => Tab::make('Canceled')
                ->modifyQueryUsing(fn($query) => $query->where('status', \App\OrderStatus::Canceled))
                ->badge(fn() => Order::where('status', \App\OrderStatus::Canceled)->count())
                ->badgeColor('danger'),
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
