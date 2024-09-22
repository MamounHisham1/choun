<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Filament\Resources\OrderResource\RelationManagers\OrderLinesRelationManager;
use App\Models\Order;
use App\Models\Product;
use App\Models\ShippingAddress;
use App\Models\User;
use App\OrderStatus;
use App\PaymentStatus;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Form;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Icetalker\FilamentTableRepeater\Forms\Components\TableRepeater;
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
                                Select::make('user_id')
                                    ->label('Customer')
                                    ->visible(fn($get): bool => $get('returning_customer?'))
                                    ->options(User::whereRole('customer')->get()->pluck('name', 'id'))
                                    ->live()
                                    ->required(),
                                Select::make('shipping_address_id')
                                    ->label('Shipping Address')
                                    ->visible(fn($get): bool => $get('returning_customer?'))
                                    ->disabled(fn($get): bool => !$get('user_id'))
                                    ->options(fn($get) => ShippingAddress::where('user_id', $get('user_id'))->get()->pluck('full_address', 'id'))
                                    ->live()
                                    ->required(),
                                Toggle::make('returning_customer?')
                                    ->live(),
                            ]),
                            Fieldset::make()->schema([
                                Select::make('status')
                                    ->options(OrderStatus::getStatuses())
                                    ->default(OrderStatus::Pending)
                                    ->required(),
                                Select::make('payment_method')
                                    ->default('cash')
                                    ->required(),
                                Select::make('payment_status')
                                    ->options(PaymentStatus::getStatuses())
                                    ->default(PaymentStatus::Pending)
                                    ->required(),
                            ])->columns(3),
                            Section::make('Shipping Address')
                                ->visible(fn($get): bool => !$get('returning_customer?'))
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
                                ]),
                            MarkdownEditor::make('note')
                                ->columnSpanFull(),
                        ]),
                    Wizard\Step::make('Order Items')->schema([
                        TableRepeater::make('orderLines')->schema([
                            Select::make('product_id')
                                ->label('Product')
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
