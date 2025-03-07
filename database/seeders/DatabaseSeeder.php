<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Order;
use App\Models\OrderLine;
use App\Models\Product;
use App\Models\ShippingAddress;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create(['email' => 'admin@admin.com']);
        Category::factory(10)->create();
        Product::factory(200)->create();
        User::factory(50)->create();
        ShippingAddress::factory(50)->create();
        Order::factory(80)->create();
        OrderLine::factory(300)->create();
    }
}
