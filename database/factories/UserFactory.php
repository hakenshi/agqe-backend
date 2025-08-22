<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    protected static ?string $password;

    public function definition(): array
    {
        return [
            'cpf' => fake()->numerify('###.###.###-##'),
            'first_name' => fake()->firstName(),
            'second_name' => fake()->lastName(),
            'photo' => 'https://picsum.photos/200/200',
            'occupation' => fake()->jobTitle(),
            'password' => static::$password ??= Hash::make('password123'),
            'birth_date' => fake()->date(),
            'joined_at' => fake()->date(),
            'color' => fake()->randomElement(['black', 'pink', 'purple', 'blue', 'teal', 'red', 'indigo', 'yellow', 'green', 'gray', 'orange', 'cyan', 'lime']),
        ];
    }
}