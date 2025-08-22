<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProjectFactory extends Factory
{
    public function definition(): array
    {
        $name = fake()->sentence(3);
        
        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'cover_image' => 'https://picsum.photos/800/600',
            'project_type' => fake()->randomElement(['social', 'educational', 'environmental']),
            'status' => fake()->randomElement(['active', 'completed', 'archived']),
            'responsibles' => fake()->name(),
            'location' => fake()->city(),
            'markdown' => fake()->paragraphs(3, true),
        ];
    }
}