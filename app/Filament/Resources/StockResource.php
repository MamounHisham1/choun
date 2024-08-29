<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StockResource\Pages;
use App\Filament\Resources\StockResource\RelationManagers;
use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\Product;
use App\Models\Stock;
use Filament\Forms;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StockResource extends Resource
{
    protected static ?string $model = Stock::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('product_id')
                    ->label('Product')
                    ->options(Product::pluck('name', 'id'))
                    ->searchable()
                    ->required()
                    ->live()
                    ->afterStateUpdated(function (Forms\Get $get, Forms\Set $set) {
                        $set('attribute_values', [
                            'name' => [
                                AttributeValue::pluck('name', 'id')
                            ],
                            'value' => [
                                AttributeValue::pluck('value', 'id')
                            ],
                        ]);
                        // dd($get());
                    }),
                TextInput::make('quantity')
                    ->required()
                    ->numeric(),
                Repeater::make('attribute_values')
                    ->schema([
                        Select::make('attribute_value_id')
                            ->label('Attribute')
                            ->options(function (Forms\Get $get) {
                                $product = Product::findOrFail($get('../../product_id'));
                                return AttributeValue::whereHas('attribute', fn($query) => $query->where('category_id', $product->category_id))->pluck('name', 'id');
                            })
                            ->required(),
                    ])
                    ->defaultItems(0)
                    ->disableItemCreation()
                    ->deletable(false)
            ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('quantity')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('product_id')
                    ->numeric()
                    ->sortable(),
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
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListStocks::route('/'),
            'create' => Pages\CreateStock::route('/create'),
            'edit' => Pages\EditStock::route('/{record}/edit'),
        ];
    }
}
