<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;

class ListOrders extends ListRecords
{
    protected static string $resource = OrderResource::class;

    public function getTabs(): array
    {
        return [
            'all' => Tab::make('All orders'),
            'pending' => Tab::make('Pending')
            ->modifyQueryUsing(fn($query) => $query->where('status', \App\OrderStatus::Pending)),
            'approved' => Tab::make('Approved')
            ->modifyQueryUsing(fn($query) => $query->where('status', \App\OrderStatus::Approved)),
            'shipped' => Tab::make('Shipped')
            ->modifyQueryUsing(fn($query) => $query->where('status', \App\OrderStatus::Shipped)),
            'arrived' => Tab::make('Arrived')
            ->modifyQueryUsing(fn($query) => $query->where('status', \App\OrderStatus::Arrived)),
            'canceled' => Tab::make('Canceled')
            ->modifyQueryUsing(fn($query) => $query->where('status', \App\OrderStatus::Canceled)),
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
