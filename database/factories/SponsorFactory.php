<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SponsorFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->company(),
            'logo' => 'https://picsum.photos/200/200',
            'website' => fake()->url(),
            'sponsoring_since' => fake()->date(),
        ];
    }
}