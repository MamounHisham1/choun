<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ShippingAddress>
 */
class ShippingAddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => fake()->name(),
            'last_name' => fake()->name(),
            'street' => fake()->streetAddress(),
            'city' => fake()->city(),
            'apartment' => fake()->postcode(),
            'phone' => fake()->phoneNumber(),
            'user_id' => User::inRandomOrder()->first()->id,
        ];
    }
}
