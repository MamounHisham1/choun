<?php

namespace Database\Factories;

use App\Models\ShippingAddress;
use App\Models\User;
use App\OrderStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'status' => OrderStatus::getStatuses()->keys()->random(),
            'total' => fake()->numberBetween(300, 30000),
            'user_id' => User::inRandomOrder()->first()->id,
            'shipping_address_id' => ShippingAddress::inRandomOrder()->first()->id,
            'created_at' => fake()->dateTimeBetween('-10 months', 'now')
        ];
    }
}
