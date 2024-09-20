<?php

namespace App\Filament\Resources\CustomerResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ShippingAddressesRelationManager extends RelationManager
{
    protected static string $relationship = 'shippingAddresses';

    public function form(Form $form): Form
    {
        return $form
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
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('shippingAddresses')
            ->columns([
                Tables\Columns\TextColumn::make('city'),
                Tables\Columns\TextColumn::make('street'),
                Tables\Columns\TextColumn::make('apartment'),
                Tables\Columns\TextColumn::make('phone'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
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
