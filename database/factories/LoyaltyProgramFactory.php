<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LoyaltyProgram>
 */
class LoyaltyProgramFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // Случайный пользователь или создание нового
            'user_id' => User::inRandomOrder()->first()?->id ?? User::factory()->create()->id,
            'bonus_points' => $this->faker->numberBetween(0, 1000), // Количество бонусов
        ];
    }
}
