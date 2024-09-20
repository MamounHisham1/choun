<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use App\OrderStatus;
use Filament\Notifications\Notification;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestOrders extends BaseWidget
{
    public function table(Table $table): Table
    {
        return $table
            ->query(
                Order::latest()->limit(10)
            )
            ->columns([
                Tables\Columns\TextColumn::make('user.first_name')
                    ->label('Name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('shippingAddress.city')
                    ->label('City'),
                Tables\Columns\TextColumn::make('shippingAddress.phone')
                    ->label('Phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('total')
                    ->money(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn($state) => $state->color())
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('city')
                    ->relationship('shippingAddress', 'city')
                    ->searchable()
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\Action::make('approve')
                        ->visible(fn($record) => $record->status !== OrderStatus::Approved)
                        ->icon('heroicon-o-check-circle')
                        ->color('success')
                        ->action(fn(Order $record) => $record->approve())
                        ->after(function () {
                            Notification::make()->success()->title('Order Approved')
                                ->duration(1500)
                                ->send();
                        }),
                    Tables\Actions\Action::make('cancel')
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
                ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
