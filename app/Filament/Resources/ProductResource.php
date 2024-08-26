<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Attribute;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Components\Actions;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?int $navigationSort = 2;

    protected static ?string $navigationIcon = 'heroicon-o-cube';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('category_id')
                    ->label('Category')
                    ->options(Category::pluck('name', 'id'))
                    ->searchable()
                    ->required(),
                Select::make('brand_id')
                    ->options(Brand::pluck('name', 'id'))
                    ->searchable()
                    ->native(false)
                    ->required()
                    ->createOptionForm([
                        TextInput::make('name')
                            ->required(),
                        FileUpload::make('image')
                            ->image(),
                    ])->createOptionUsing(fn($data) => Brand::create($data)),
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                MarkdownEditor::make('description')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->prefix('$'),
                TextInput::make('quantity')
                    ->required()
                    ->numeric(),
                SpatieMediaLibraryFileUpload::make('images')
                    ->collection('product-images')
                    ->columnSpan(2)
                    ->multiple()
                    ->image()
                    ->imageEditor(),
                Toggle::make('is_featured')
                    ->required(),
                Select::make('attributes')
                    ->options(Attribute::pluck('name', 'id'))
                    ->multiple()
                    ->searchable()
                    ->required(),
                Actions::make([
                    Action::make('random_fill')
                        ->label('Random Fill')
                        ->icon('heroicon-o-clipboard-document-list')
                        ->visible(fn(string $operation) => app()->environment('local') && $operation == 'create')
                        ->action(function ($livewire) {
                            $data = Product::factory()->make()->toArray();
                            $livewire->form->fill($data);
                        })
                ])

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('price')
                    ->money()
                    ->sortable(),
                Tables\Columns\TextColumn::make('quantity')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\ToggleColumn::make('is_featured'),
                Tables\Columns\TextColumn::make('category.name')
                    ->numeric()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'view' => Pages\ViewProduct::route('/{record}'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
