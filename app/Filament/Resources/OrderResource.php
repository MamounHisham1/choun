<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Filament\Resources\OrderResource\RelationManagers\OrderLinesRelationManager;
use App\Models\Order;
use App\Models\Product;
use App\OrderStatus;
use App\PaymentStatus;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Form;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?int $navigationSort = 40;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Wizard::make([
                    Wizard\Step::make('Shipping Address')
                        ->schema([
                            Fieldset::make()->schema([
                                Select::make('status')
                                    ->options(OrderStatus::getStatuses())
                                    ->default(OrderStatus::Pending)
                                    ->native(false)
                                    ->required(),
                                Select::make('payment_method')
                                    ->default('cash')
                                    ->native(false)
                                    ->required(),
                                Select::make('payment_status')
                                    ->options(PaymentStatus::getStatuses())
                                    ->default(PaymentStatus::Pending)
                                    ->native(false)
                                    ->required(),
                            ])->columns(3),
                            Section::make('Shipping Address')
                                ->relationship('shippingAddress')
                                ->columns(2)
                                ->schema([
                                    TextInput::make('city')
                                        ->required(),
                                    TextInput::make('street')
                                        ->required(),
                                    TextInput::make('apartment'),
                                    TextInput::make('phone')
                                        ->required(),
                                    MarkdownEditor::make('note')
                                        ->columnSpanFull(),
                                ]),
                        ]),
                    Wizard\Step::make('Order Items')->schema([
                        Repeater::make('orderLines')->schema([
                            Select::make('product_id')
                                ->options(Product::pluck('name', 'id'))
                                ->live()
                                ->required()
                                ->afterStateUpdated(fn($state, Forms\Set $set) => $set('price', Product::find($state)->price)),
                            TextInput::make('price')
                                ->required()
                                ->numeric()
                                ->prefix('$')
                                ->minValue(0),
                            TextInput::make('quantity')
                                ->required()
                                ->numeric()
                                ->default(1)
                                ->minValue(1),
                        ])->relationship('orderLines'),
                    ]),
                ])->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
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
                Tables\Actions\ViewAction::make(),
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

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
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
                        TextEntry::make('note')
                            ->placeholder('N\A')
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            OrderLinesRelationManager::make(),
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'view' => Pages\ViewOrder::route('/{record}'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
