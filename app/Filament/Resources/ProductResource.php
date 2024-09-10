<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Components\Actions;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\Section as InfolistSection;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?int $navigationSort = 30;

    protected static ?string $navigationIcon = 'heroicon-o-cube';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Product Information')
                    ->schema([
                        Select::make('category_id')
                            ->label('Category')
                            ->options(Category::pluck('name', 'id'))
                            ->live()
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
                    ])->columns(2),
                Section::make()
                    ->schema([
                        TextInput::make('name')
                            ->required()
                            ->live()
                            ->maxLength(255),
                        MarkdownEditor::make('description')
                            ->required()
                            ->columnSpanFull(),
                    ]),
                Section::make('Pricing')
                    ->schema([
                        TextInput::make('price')
                            ->required()
                            ->numeric()
                            ->prefix('$'),
                        TextInput::make('quantity')
                            ->required()
                            ->numeric(),
                    ])->columns(2),
                Section::make('Details')
                    ->schema([
                        Repeater::make('attributes')
                            ->schema([
                                Select::make('attribute_id')
                                    ->label('Name')
                                    ->options(fn(Forms\Get $get) => Attribute::where('category_id', $get('../../category_id'))->orWhere('category_id', null)->pluck('name', 'id'))
                                    ->disabled(fn(Forms\Get $get): bool => !filled($get('../../category_id')))
                                    ->live()
                                    ->searchable()
                                    ->distinct()
                                    ->required(),
                                Select::make('values')
                                    ->options(fn(Forms\Get $get) => AttributeValue::where('attribute_id', $get('attribute_id'))->pluck('name', 'id'))
                                    ->disabled(fn(Forms\Get $get): bool => !filled($get('../../category_id')))
                                    ->multiple()
                                    ->searchable()
                                    ->required(),
                            ])
                            ->columns(2)
                            ->distinct()
                    ]),
                Section::make('images')
                    ->schema([
                        SpatieMediaLibraryFileUpload::make('images')
                            ->collection('product-images')
                            ->columnSpan(2)
                            ->multiple()
                            ->image()
                            ->imageEditor(),
                    ]),
                Section::make('visibility')
                    ->schema([
                        Toggle::make('is_featured'),
                        Toggle::make('is_published')
                            ->default(true),
                    ])
                    ->columns(2)
                    ->columnSpan(1),
                Actions::make([
                    Action::make('random_fill')
                        ->label('Random Fill')
                        ->icon('heroicon-o-clipboard-document-list')
                        ->visible(fn(string $operation) => app()->environment('local') && $operation == 'create')
                        ->action(function ($livewire) {
                            $data = Product::factory()->make()->toArray();
                            $livewire->form->fill($data);
                        })
                ])->columnSpanFull(1)

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
                Tables\Columns\ToggleColumn::make('is_published'),
                Tables\Columns\TextColumn::make('category.name')
                    ->numeric()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
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
                InfolistSection::make('Product Info')
                    ->schema([
                        TextEntry::make('category.name')
                            ->label('Category'),
                        TextEntry::make('brand.name')
                            ->label('Brand')
                    ])
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
            // 'view' => Pages\ViewProduct::route('/{record}'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
