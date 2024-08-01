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
        Category::factory(10)->create();
        Product::factory(200)->create();
        User::factory(20)->create();
        ShippingAddress::factory(20)->create();
        Order::factory(20)->create();
        OrderLine::factory(60)->create();
    }
}
