<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use App\OrderStatus;
use Filament\Forms;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?int $navigationSort = 3;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('status')
                    ->options(OrderStatus::getStatuses())
                    ->searchable()
                    ->native(false)
                    ->columns('full')
                    ->required(),
                Section::make('Shipping Address')
                    ->relationship('shippingAddress')
                    ->schema([
                        TextInput::make('first_name')
                            ->required(),
                        TextInput::make('last_name')
                            ->required(),
                        TextInput::make('city')
                            ->required(),
                        TextInput::make('street')
                            ->required(),
                        TextInput::make('apartment')
                            ->required(),
                        TextInput::make('phone')
                            ->required(),
                        MarkdownEditor::make('note')
                            ->required()
                            ->columnSpanFull(),
                    ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('shippingAddress.first_name')
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
                Tables\Actions\EditAction::make(),
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            // 'create' => Pages\CreateOrder::route('/create'),
            'view' => Pages\ViewOrder::route('/{record}'),
            // 'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
