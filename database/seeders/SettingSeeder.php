<?php

namespace Database\Seeders;

use App\Models\HomeSetting;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get some existing products and categories
        $products = Product::take(10)->get();
        $categories = Category::take(6)->get();

        if ($products->isEmpty() || $categories->isEmpty()) {
            $this->command->warn('No products or categories found. Please seed products and categories first.');
            return;
        }

        // Home Offers Setting
        $homeOffers = [
            'one' => [
                'message' => 'Special Deal',
                'product' => $products->first()->id,
                'color' => '#ff6b6b'
            ],
            'two' => [
                'message' => 'Limited Time',
                'product' => $products->skip(1)->first()->id,
                'color' => '#4ecdc4'
            ]
        ];

        HomeSetting::updateOrCreate(
            ['key' => 'home_offers'],
            ['json_value' => $homeOffers]
        );

        // Home First Banner Setting
        $firstBanner = [
            [
                'message' => 'Welcome to Our Store',
                'product' => $products->skip(2)->first()->id,
                'color' => '#667eea',
                'description' => '<p>Discover amazing products with <strong>unbeatable prices</strong> and quality you can trust.</p>'
            ],
            [
                'message' => 'Premium Collection',
                'product' => $products->skip(3)->first()->id,
                'color' => '#764ba2',
                'description' => '<p>Explore our <em>premium collection</em> of cutting-edge technology and lifestyle products.</p>'
            ]
        ];

        HomeSetting::updateOrCreate(
            ['key' => 'home_first_banner'],
            ['json_value' => $firstBanner]
        );

        // Home Second Banner Setting
        $secondBanner = [
            'category' => $categories->first()->id,
            'color' => '#2c3e50',
            'message' => '<h2>Explore Our Featured Category</h2><p>Discover the latest trends and innovations in <strong>' . $categories->first()->name . '</strong></p>'
        ];

        HomeSetting::updateOrCreate(
            ['key' => 'home_second_banner'],
            ['json_value' => $secondBanner]
        );

        // Home Categories Setting
        $homeCategories = [
            'categories' => $categories->take(6)->pluck('id')->toArray()
        ];

        HomeSetting::updateOrCreate(
            ['key' => 'home_categories'],
            ['json_value' => $homeCategories['categories']]
        );

        // Shop Price Filter Setting
        $priceFilters = [
            ['from' => 0, 'to' => 100],
            ['from' => 100, 'to' => 500],
            ['from' => 500, 'to' => 1000],
            ['from' => 1000, 'to' => 2000],
            ['from' => 2000, 'to' => 5000]
        ];

        HomeSetting::updateOrCreate(
            ['key' => 'shop_price_filter'],
            ['json_value' => $priceFilters]
        );

        // Additional Settings for Section Visibility
        HomeSetting::updateOrCreate(
            ['key' => 'show_features_section'],
            ['json_value' => true]
        );

        HomeSetting::updateOrCreate(
            ['key' => 'show_testimonials'],
            ['json_value' => true]
        );

        HomeSetting::updateOrCreate(
            ['key' => 'show_product_tabs'],
            ['json_value' => true]
        );

        $this->command->info('✅ Home settings seeded successfully!');
        $this->command->info('📝 Created settings for:');
        $this->command->info('   - Home offers (2 offers)');
        $this->command->info('   - First banner (2 banners)');
        $this->command->info('   - Second banner (1 banner)');
        $this->command->info('   - Categories (' . $categories->count() . ' categories)');
        $this->command->info('   - Price filters (5 ranges)');
        $this->command->info('   - Section visibility toggles');
    }
}
