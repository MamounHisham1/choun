<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use App\Models\Order;
use App\OrderStatus;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ViewRecord;

class ViewOrder extends ViewRecord
{
    protected static string $resource = OrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('approve')
                ->visible(fn($record) => $record->status !== OrderStatus::Approved)
                ->icon('heroicon-o-check-circle')
                ->color('success')
                ->action(fn(Order $record) => $record->approve())
                ->after(function () {
                    Notification::make()->success()->title('Order Approved')
                        ->duration(1500)
                        ->send();
                }),
            Action::make('cancel')
                ->visible(fn($record) => $record->status !== OrderStatus::Canceled)
                ->icon('heroicon-o-no-symbol')
                ->color('danger')
                ->requiresConfirmation()
                ->action(function (Order $record) {
                    $record->cancel();
                })
                ->after(function () {
                    Notification::make()->danger()->title('Order Canceled')
                        ->duration(1500)
                        ->send();
                }),
            Actions\EditAction::make(),
        ];
    }
}
