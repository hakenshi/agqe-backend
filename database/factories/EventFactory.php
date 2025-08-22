<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EventFactory extends Factory
{
    public function definition(): array
    {
        $name = fake()->sentence(3);
        
        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'cover_image' => 'https://picsum.photos/800/600',
            'event_type' => fake()->randomElement(['event', 'gallery', 'event_gallery']),
            'date' => fake()->dateTimeBetween('now', '+1 year'),
            'starting_time' => fake()->time('H:i'),
            'ending_time' => fake()->time('H:i'),
            'location' => fake()->address(),
            'markdown' => fake()->paragraphs(3, true),
        ];
    }
}