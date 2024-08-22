<?php

namespace App\Filament\Pages;

use App\Models\HomeSetting;
use App\Models\Product;
use App\Models\Category;
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
    protected static ?string $navigationIcon = 'heroicon-o-cog';

    protected static ?int $navigationSort = 5;

    protected static string $view = 'filament.pages.shop-settings';

    public ?array $data = [];
    public function mount(): void
    {
        $settings = HomeSetting::all();
        // dd($settings->firstWhere('key', 'home_first_banner')->json_value);
        $this->form->fill([
            'offers' => $settings->firstWhere('key', 'home_offers')?->json_value,
            'first_banner' => $settings->firstWhere('key', 'home_first_banner')?->json_value,
            'second_banner' => $settings->firstWhere('key', 'home_second_banner')?->json_value,
            'categories' => $settings->firstWhere('key', 'home_categories')?->json_value,
        ]);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('offers')
                    ->schema([
                        TextInput::make('one.message')
                            ->required(),
                        Select::make('one.product')
                            ->options(Product::get()->pluck('name', 'id'))
                            ->searchable()
                            ->required(),
                        ColorPicker::make('one.color')
                            ->label('Background color')
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
                            ->required(),
                        RichEditor::make('description')
                            ->columnSpanFull()
                            ->required(),
                    ])
                    ->defaultItems(2)
                    ->columns(3)
                    ->statePath('first_banner')
                    ->collapsible(),

                Section::make('Banner')
                    ->schema([
                        Select::make('category')
                            ->options(Category::get()->pluck('name', 'id'))
                            ->searchable()
                            ->required(),
                        ColorPicker::make('color')
                            ->label('Background color')
                            ->required(),
                        RichEditor::make('message')
                            ->columnSpanFull()
                            ->required(),
                    ])
                    ->statePath('second_banner')
                    ->columns(2),
                
                    Section::make('categories')
                    ->schema([
                        Select::make('categories')
                            ->multiple()
                            ->options(Category::get()->pluck('name', 'id'))
                            ->searchable()
                            ->minItems(1)
                            ->maxItems(6),
                    ]),

            ])->statePath('data');
    }

    public function create(): void
    {
        $content = $this->form->getState();
        $homeOffers = $content['offers'];
        $firstBanner = $content['first_banner'];
        $secondBanner = $content['second_banner'];
        $homeCategories = $content['categories'];

        HomeSetting::set('home_offers', $homeOffers);
        HomeSetting::set('home_first_banner', $firstBanner);
        HomeSetting::set('home_second_banner', $secondBanner);
        HomeSetting::set('home_categories', $homeCategories);

        Notification::make()->success()->title('Saved')->send();
    }
}
