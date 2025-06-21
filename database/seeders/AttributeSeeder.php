<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Attribute;
use App\Models\AttributeValue;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
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
            'Battery' => ['2000mAh', '3000mAh', '4000mAh', '5000mAh', '6000mAh', '7000mAh', '8000mAh', '9000mAh', '10000mAh'],
            'Camera' => ['12MP', '16MP', '24MP', '32MP', '48MP', '64MP', '108MP', '120MP', '130MP', '140MP'],
            'Display' => ['5.4"', '6.1"', '6.7"', '13"', '14"', '15.6"', '17"', '21"', '24"', '27"'],
        ];

        foreach ($attributes as $name => $values) {
            $attribute = Attribute::where('name', $name)->first();
            
            if (!$attribute) {
                $attribute = Attribute::create(['name' => $name]);
                
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
}
