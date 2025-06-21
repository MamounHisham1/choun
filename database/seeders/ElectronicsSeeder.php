<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use App\Models\Coupon;
use App\Models\Attribute;
use App\Models\AttributeValue;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ElectronicsSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $this->createBrands();
        $this->createCategories();
        $this->createTags();
        $this->createAttributes();
        $this->createProducts();
        $this->createCoupons();
    }

    private function createBrands(): void
    {
        $brands = [
            ['name' => 'Apple', 'image' => '/images/brands/apple.png'],
            ['name' => 'Samsung', 'image' => '/images/brands/samsung.png'],
            ['name' => 'Sony', 'image' => '/images/brands/sony.png'],
            ['name' => 'LG', 'image' => '/images/brands/lg.png'],
            ['name' => 'Dell', 'image' => '/images/brands/dell.png'],
            ['name' => 'HP', 'image' => '/images/brands/hp.png'],
            ['name' => 'Lenovo', 'image' => '/images/brands/lenovo.png'],
            ['name' => 'ASUS', 'image' => '/images/brands/asus.png'],
            ['name' => 'Microsoft', 'image' => '/images/brands/microsoft.png'],
            ['name' => 'Google', 'image' => '/images/brands/google.png'],
            ['name' => 'Bose', 'image' => '/images/brands/bose.png'],
            ['name' => 'JBL', 'image' => '/images/brands/jbl.png'],
            ['name' => 'Canon', 'image' => '/images/brands/canon.png'],
            ['name' => 'Nikon', 'image' => '/images/brands/nikon.png'],
            ['name' => 'Garmin', 'image' => '/images/brands/garmin.png'],
        ];

        foreach ($brands as $brand) {
            Brand::create($brand);
        }
    }

    private function createCategories(): void
    {
        $categories = [
            ['name' => 'Smartphones', 'image' => '/images/categories/smartphones.jpg'],
            ['name' => 'Laptops', 'image' => '/images/categories/laptops.jpg'],
            ['name' => 'Tablets', 'image' => '/images/categories/tablets.jpg'],
            ['name' => 'Audio & Headphones', 'image' => '/images/categories/audio.jpg'],
            ['name' => 'Smart Watches', 'image' => '/images/categories/smartwatches.jpg'],
            ['name' => 'Gaming Consoles', 'image' => '/images/categories/gaming.jpg'],
            ['name' => 'Cameras', 'image' => '/images/categories/cameras.jpg'],
            ['name' => 'Home Appliances', 'image' => '/images/categories/appliances.jpg'],
            ['name' => 'Computer Accessories', 'image' => '/images/categories/accessories.jpg'],
            ['name' => 'Smart Home', 'image' => '/images/categories/smarthome.jpg'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }

    private function createTags(): void
    {
        $tags = [
            'Featured',
            'Best Seller',
            'New Arrival',
            'On Sale',
            'Premium',
            'Budget Friendly',
            'Gaming',
            'Professional',
            'Wireless',
            'Fast Charging',
            '5G Ready',
            'AI Powered',
            'Water Resistant',
            'Ultra HD',
            'Portable',
            'Long Battery',
            'High Performance',
            'Eco Friendly',
            'Limited Edition',
            'Smart Technology'
        ];

        foreach ($tags as $tag) {
            Tag::create(['name' => $tag]);
        }
    }

    private function createAttributes(): void
    {
        $attributes = [
            'Color' => ['Black', 'White', 'Silver', 'Gold', 'Blue', 'Red', 'Green', 'Purple'],
            'Storage' => ['64GB', '128GB', '256GB', '512GB', '1TB', '2TB'],
            'RAM' => ['4GB', '8GB', '16GB', '32GB', '64GB'],
            'Screen Size' => ['5.4"', '6.1"', '6.7"', '13"', '14"', '15.6"', '17"', '21"', '24"', '27"'],
            'Processor' => ['Intel i5', 'Intel i7', 'Intel i9', 'AMD Ryzen 5', 'AMD Ryzen 7', 'Apple M1', 'Apple M2', 'Snapdragon 8 Gen 2'],
            'Operating System' => ['iOS', 'Android', 'Windows 11', 'macOS', 'Chrome OS'],
            'Connectivity' => ['WiFi 6', '5G', 'Bluetooth 5.3', 'USB-C', 'Lightning', 'HDMI'],
            'Resolution' => ['1080p', '1440p', '4K', '8K', 'Retina', 'OLED'],
        ];

        foreach ($attributes as $attributeName => $values) {
            // Check if attribute already exists
            $attribute = Attribute::where('name', $attributeName)->first();
            
            if (!$attribute) {
                $attribute = Attribute::create(['name' => $attributeName]);
                
                foreach ($values as $value) {
                    AttributeValue::create([
                        'attribute_id' => $attribute->id,
                        'name' => $value,
                        'value' => $value
                    ]);
                }
            }
        }
    }

    private function createProducts(): void
    {
        $products = [
            ['name' => 'iPhone 15 Pro Max', 'description' => 'The most advanced iPhone yet with titanium design, A17 Pro chip, and pro camera system featuring 5x telephoto zoom.', 'price' => 1199.99, 'quantity' => 50, 'is_featured' => true, 'category_id' => 1, 'brand_id' => 1, 'tags' => [1, 2, 3, 11]],
            ['name' => 'Samsung Galaxy S24 Ultra', 'description' => 'Premium Android flagship with S Pen, 200MP camera, and Galaxy AI features for enhanced productivity.', 'price' => 1299.99, 'quantity' => 45, 'is_featured' => true, 'category_id' => 1, 'brand_id' => 2, 'tags' => [1, 2, 12, 11]],
            ['name' => 'Google Pixel 8 Pro', 'description' => 'Google\'s flagship with advanced computational photography, pure Android experience, and Magic Eraser.', 'price' => 999.99, 'quantity' => 30, 'is_featured' => false, 'category_id' => 1, 'brand_id' => 10, 'tags' => [3, 12, 11]],
            ['name' => 'MacBook Pro 16-inch M3', 'description' => 'Professional laptop with M3 Max chip, Liquid Retina XDR display, and up to 22 hours of battery life.', 'price' => 2499.99, 'quantity' => 25, 'is_featured' => true, 'category_id' => 2, 'brand_id' => 1, 'tags' => [1, 5, 8, 17]],
            ['name' => 'Dell XPS 15', 'description' => 'Ultra-thin laptop with 12th Gen Intel Core processors, OLED display option, and premium carbon fiber design.', 'price' => 1899.99, 'quantity' => 20, 'is_featured' => false, 'category_id' => 2, 'brand_id' => 5, 'tags' => [5, 8, 17]],
            ['name' => 'ASUS ROG Zephyrus G14', 'description' => 'Gaming laptop with AMD Ryzen 9 processor, RTX 4060 graphics, and AniMe Matrix LED display.', 'price' => 1599.99, 'quantity' => 15, 'is_featured' => false, 'category_id' => 2, 'brand_id' => 8, 'tags' => [7, 17, 15]],
            ['name' => 'iPad Pro 12.9-inch M2', 'description' => 'Most advanced iPad with M2 chip, Liquid Retina XDR display, and Apple Pencil hover support.', 'price' => 1099.99, 'quantity' => 40, 'is_featured' => true, 'category_id' => 3, 'brand_id' => 1, 'tags' => [1, 5, 8]],
            ['name' => 'Samsung Galaxy Tab S9 Ultra', 'description' => 'Premium Android tablet with S Pen included, 14.6-inch AMOLED display, and DeX mode for productivity.', 'price' => 1199.99, 'quantity' => 30, 'is_featured' => false, 'category_id' => 3, 'brand_id' => 2, 'tags' => [5, 8, 15]],
            ['name' => 'Microsoft Surface Pro 9', 'description' => '2-in-1 laptop tablet with 12th Gen Intel processors, detachable keyboard, and Surface Pen support.', 'price' => 999.99, 'quantity' => 25, 'is_featured' => false, 'category_id' => 3, 'brand_id' => 9, 'tags' => [8, 15]],
            ['name' => 'Sony WH-1000XM5', 'description' => 'Industry-leading noise canceling headphones with 30-hour battery and crystal clear hands-free calling.', 'price' => 399.99, 'quantity' => 60, 'is_featured' => true, 'category_id' => 4, 'brand_id' => 3, 'tags' => [1, 2, 9, 16]],
            ['name' => 'Bose QuietComfort Ultra', 'description' => 'Premium noise canceling headphones with spatial audio and all-day comfort for immersive listening.', 'price' => 429.99, 'quantity' => 35, 'is_featured' => false, 'category_id' => 4, 'brand_id' => 11, 'tags' => [5, 9, 16]],
            ['name' => 'JBL Charge 5', 'description' => 'Portable Bluetooth speaker with powerful sound, 20-hour playtime, and IP67 waterproof rating.', 'price' => 179.99, 'quantity' => 80, 'is_featured' => false, 'category_id' => 4, 'brand_id' => 12, 'tags' => [6, 9, 13, 15]],
            ['name' => 'Apple Watch Series 9', 'description' => 'Most advanced Apple Watch with S9 chip, Double Tap gesture, and comprehensive health monitoring.', 'price' => 399.99, 'quantity' => 55, 'is_featured' => true, 'category_id' => 5, 'brand_id' => 1, 'tags' => [1, 3, 20]],
            ['name' => 'Samsung Galaxy Watch 6', 'description' => 'Advanced smartwatch with body composition analysis, sleep coaching, and seamless Galaxy ecosystem integration.', 'price' => 329.99, 'quantity' => 40, 'is_featured' => false, 'category_id' => 5, 'brand_id' => 2, 'tags' => [20, 16]],
            ['name' => 'Garmin Forerunner 965', 'description' => 'Premium GPS running smartwatch with AMOLED display, training metrics, and multi-band GPS.', 'price' => 599.99, 'quantity' => 20, 'is_featured' => false, 'category_id' => 5, 'brand_id' => 15, 'tags' => [5, 8]],
            ['name' => 'PlayStation 5', 'description' => 'Next-gen gaming console with ultra-high speed SSD, ray tracing, and immersive 3D audio.', 'price' => 499.99, 'quantity' => 25, 'is_featured' => true, 'category_id' => 6, 'brand_id' => 3, 'tags' => [1, 2, 7, 17]],
            ['name' => 'Xbox Series X', 'description' => 'Most powerful Xbox ever with 4K gaming, Quick Resume, and Smart Delivery technology.', 'price' => 499.99, 'quantity' => 30, 'is_featured' => true, 'category_id' => 6, 'brand_id' => 9, 'tags' => [1, 7, 17]],
            ['name' => 'Steam Deck OLED', 'description' => 'Portable gaming PC with vibrant OLED display, improved battery life, and access to Steam library.', 'price' => 649.99, 'quantity' => 15, 'is_featured' => false, 'category_id' => 6, 'brand_id' => 1, 'tags' => [3, 7, 15]],
            ['name' => 'Canon EOS R6 Mark II', 'description' => 'Full-frame mirrorless camera with 24.2MP sensor, in-body image stabilization, and 4K 60p video.', 'price' => 2499.99, 'quantity' => 15, 'is_featured' => true, 'category_id' => 7, 'brand_id' => 13, 'tags' => [1, 5, 8, 14]],
            ['name' => 'Nikon Z8', 'description' => 'High-resolution mirrorless camera with 45.7MP sensor, 8K video recording, and advanced autofocus.', 'price' => 3999.99, 'quantity' => 10, 'is_featured' => false, 'category_id' => 7, 'brand_id' => 14, 'tags' => [5, 8, 14]],
            ['name' => 'Sony Alpha a7 IV', 'description' => 'Versatile full-frame camera with 33MP sensor, real-time tracking, and 4K 60p video recording.', 'price' => 2499.99, 'quantity' => 20, 'is_featured' => false, 'category_id' => 7, 'brand_id' => 3, 'tags' => [8, 14]],
            ['name' => 'LG OLED C3 65-inch TV', 'description' => 'Premium OLED smart TV with self-lit pixels, α9 Gen6 AI Processor, and webOS 23 platform.', 'price' => 1999.99, 'quantity' => 20, 'is_featured' => true, 'category_id' => 8, 'brand_id' => 4, 'tags' => [1, 5, 14, 20]],
            ['name' => 'Samsung Smart Refrigerator', 'description' => 'Family Hub smart refrigerator with 21.5-inch touchscreen, internal cameras, and Wi-Fi connectivity.', 'price' => 3499.99, 'quantity' => 8, 'is_featured' => false, 'category_id' => 8, 'brand_id' => 2, 'tags' => [5, 20, 18]],
            ['name' => 'Dyson V15 Detect', 'description' => 'Cordless vacuum with laser dust detection, LCD screen showing real-time performance data.', 'price' => 749.99, 'quantity' => 25, 'is_featured' => false, 'category_id' => 8, 'brand_id' => 1, 'tags' => [20, 15]],
            ['name' => 'Apple Magic Keyboard', 'description' => 'Wireless keyboard with scissor mechanism, numeric keypad, and rechargeable battery.', 'price' => 199.99, 'quantity' => 100, 'is_featured' => false, 'category_id' => 9, 'brand_id' => 1, 'tags' => [9, 8]],
            ['name' => 'Logitech MX Master 3S', 'description' => 'Advanced wireless mouse with ultra-fast scrolling, customizable buttons, and multi-device connectivity.', 'price' => 99.99, 'quantity' => 150, 'is_featured' => true, 'category_id' => 9, 'brand_id' => 1, 'tags' => [2, 9, 8]],
            ['name' => 'Dell UltraSharp 27-inch Monitor', 'description' => '4K USB-C monitor with 95% DCI-P3 color coverage, built-in KVM, and height-adjustable stand.', 'price' => 599.99, 'quantity' => 35, 'is_featured' => false, 'category_id' => 9, 'brand_id' => 5, 'tags' => [8, 14]],
            ['name' => 'Amazon Echo Dot 5th Gen', 'description' => 'Smart speaker with Alexa, improved audio, and temperature sensor for enhanced smart home control.', 'price' => 49.99, 'quantity' => 200, 'is_featured' => true, 'category_id' => 10, 'brand_id' => 1, 'tags' => [2, 6, 20]],
            ['name' => 'Google Nest Thermostat', 'description' => 'Programmable smart thermostat with energy-saving features, remote control, and learning capabilities.', 'price' => 129.99, 'quantity' => 75, 'is_featured' => false, 'category_id' => 10, 'brand_id' => 10, 'tags' => [20, 18]],
            ['name' => 'Philips Hue Smart Bulb Starter Kit', 'description' => 'Color-changing smart LED bulbs with bridge, voice control compatibility, and millions of colors.', 'price' => 199.99, 'quantity' => 60, 'is_featured' => false, 'category_id' => 10, 'brand_id' => 1, 'tags' => [20, 18]],
        ];

        foreach ($products as $productData) {
            $tags = $productData['tags'];
            unset($productData['tags']);
            
            $product = Product::create($productData);
            
            if (!empty($tags)) {
                $product->tags()->attach($tags);
            }
        }
    }

    private function createCoupons(): void
    {
        $coupons = [
            ['code' => 'WELCOME20', 'type' => 'percentage', 'amount' => 20.00, 'usage_limit' => 100, 'start_date' => now(), 'end_date' => now()->addMonths(3), 'category_id' => null],
            ['code' => 'SMARTPHONE50', 'type' => 'money', 'amount' => 50.00, 'usage_limit' => 50, 'start_date' => now(), 'end_date' => now()->addMonth(), 'category_id' => 1],
            ['code' => 'LAPTOP100', 'type' => 'money', 'amount' => 100.00, 'usage_limit' => 25, 'start_date' => now(), 'end_date' => now()->addWeeks(2), 'category_id' => 2],
            ['code' => 'GAMING15', 'type' => 'percentage', 'amount' => 15.00, 'usage_limit' => 75, 'start_date' => now(), 'end_date' => now()->addMonths(2), 'category_id' => 6],
            ['code' => 'AUDIO25', 'type' => 'money', 'amount' => 25.00, 'usage_limit' => 100, 'start_date' => now(), 'end_date' => now()->addMonth(), 'category_id' => 4],
            ['code' => 'SMARTHOME10', 'type' => 'percentage', 'amount' => 10.00, 'usage_limit' => 200, 'start_date' => now(), 'end_date' => now()->addMonths(6), 'category_id' => 10],
            ['code' => 'BLACKFRIDAY30', 'type' => 'percentage', 'amount' => 30.00, 'usage_limit' => 500, 'start_date' => now()->addMonths(10), 'end_date' => now()->addMonths(10)->addDays(7), 'category_id' => null],
            ['code' => 'CAMERA200', 'type' => 'money', 'amount' => 200.00, 'usage_limit' => 20, 'start_date' => now(), 'end_date' => now()->addWeeks(3), 'category_id' => 7],
        ];

        foreach ($coupons as $coupon) {
            Coupon::create($coupon);
        }
    }
}
