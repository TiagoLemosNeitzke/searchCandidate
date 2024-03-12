<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class CandidateFactory extends Factory
{
    public function definition(): array
    {
        $filters = ['PHP', 'JS', 'C#', 'C++', 'Cobol', 'Basic'];

        return [
            'user_id'           => User::factory(),
            'name'              => fake('pt_BR')->name,
            'avatarUrl'        => fake()->imageUrl,
            'email'             => fake('pt_BR')->email,
            'bio'               => fake('pt_BR')->text,
            'location'          => fake('pt_BR')->country,
            'contributed_count' => rand(10, 999),
            'filters'           => Arr::random($filters),
        ];
    }
}
