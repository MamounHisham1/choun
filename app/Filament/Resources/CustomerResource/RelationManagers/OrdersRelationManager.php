<?php

namespace App\Filament\Resources\CustomerResource\RelationManagers;

use App\Models\Product;
use App\Models\ShippingAddress;
use App\PaymentStatus;
use App\OrderStatus;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrdersRelationManager extends RelationManager
{
    protected static string $relationship = 'orders';

    public function form(Form $form): Form
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

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('orders')
            ->columns([
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
                //
            ])
            ->headerActions([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
