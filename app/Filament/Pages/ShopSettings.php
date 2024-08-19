<?php

namespace App\Filament\Pages;

use App\Models\HomeSetting;
use App\Models\Product;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class ShopSettings extends Page
{
    use InteractsWithForms;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.shop-settings';

    public ?array $data = [];
    public function mount(): void
    {
        $this->form->fill(HomeSetting::get()->first()['json_value']);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Offers')
                    ->schema([
                        TextInput::make('one.message')
                            ->required(),
                        Select::make('one.product')
                            ->options(Product::get()->pluck('name', 'id'))
                            ->searchable()
                            ->required(),
                        ColorPicker::make('one.color')
                            ->label('Background color')
                            ->hintColor('Light color recommended')
                            ->required(),
                        TextInput::make('two.message')
                            ->required(),
                        Select::make('two.product')
                            ->options(Product::get()->pluck('name', 'id'))
                            ->searchable()
                            ->required(),
                        ColorPicker::make('two.color')
                            ->label('Background color')
                            ->required(),
                    ])
                    ->statePath('offers')
                    ->columns(3),
                Repeater::make('banner_one')
                    ->schema([
                        TextInput::make('message')
                            ->required(),
                        Select::make('product')
                            ->options(Product::get()->pluck('name', 'id'))
                            ->searchable()
                            ->required(),
                        ColorPicker::make('color')
                            ->label('Background color')
                            ->hintColor('Light color recommended')
                            ->required(),
                        RichEditor::make('description')
                            ->columnSpanFull()
                            ->required(),
                    ])
                    ->columns(3)
                    ->defaultItems(1)
                    ->statePath('first_banner')
                    ->collapsible(),
            ])->statePath('data');
    }

    public function create(): void
    {
        $content = $this->form->getState();
        $homeOffers = $content['offers'];
        $firstBanner = $content['first_banner'];
        HomeSetting::updateOrCreate(['key' => 'home_offers'], [
            'json_value' => $homeOffers,
        ]);
        HomeSetting::updateOrCreate(['key' => 'home_first_banner'], [
            'json_value' => $firstBanner,
        ]);
        Notification::make()->success()->title('Saved')->send();
    }
}
