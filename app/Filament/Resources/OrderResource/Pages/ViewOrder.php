<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use App\Models\Order;
use App\OrderStatus;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
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

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                TextEntry::make('code')
                    ->badge()
                    ->color('gray'),
                TextEntry::make('status')
                    ->badge()
                    ->color(fn($state) => $state->color()),
                \Filament\Infolists\Components\Section::make('Customer Details')
                    ->relationship('user')
                    ->columns(2)
                    ->schema([
                        TextEntry::make('first_name'),
                        TextEntry::make('last_name'),
                        TextEntry::make('email'),
                    ]),
                \Filament\Infolists\Components\Section::make('Shipping Address')
                    ->relationship('shippingAddress')
                    ->columns(2)
                    ->schema([
                        TextEntry::make('city'),
                        TextEntry::make('street'),
                        TextEntry::make('apartment')
                            ->placeholder('N\A'),
                        TextEntry::make('phone'),
                    ]),
                    TextEntry::make('note')
                        ->placeholder('N\A')
                        ->columnSpanFull(),
            ]);
    }

}
