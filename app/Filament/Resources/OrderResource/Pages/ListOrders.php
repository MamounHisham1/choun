<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use App\Models\Order;
use App\OrderStatus;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Filament\Tables;

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

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('code')
                    ->searchable(),
                TextColumn::make('user.first_name')
                    ->label('Name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('shippingAddress.city')
                    ->label('City'),
                TextColumn::make('shippingAddress.phone')
                    ->label('Phone')
                    ->searchable(),
                TextColumn::make('total')
                    ->money(),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn($state) => $state->color())
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('city')
                    ->relationship('shippingAddress', 'city')
                    ->searchable()
            ])
            ->actions([
                ViewAction::make(),
                EditAction::make(),
                ActionGroup::make([
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
                ]),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
