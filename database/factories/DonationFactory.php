<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DonationFactory extends Factory
{
    public function definition(): array
    {
        return [
            'amount' => fake()->randomFloat(2, 10, 1000),
            'donor_name' => fake()->name(),
            'donor_email' => fake()->email(),
            'message' => fake()->sentence(),
        ];
    }
}