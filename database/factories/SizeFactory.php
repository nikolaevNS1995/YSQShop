<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Size>
 */
class SizeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => $this->faker->randomElement(['Одежда', 'Обувь']), // Тип размера
            'manufacturer_size' => $this->faker->word, // Размер производителя
            'russian_size' => $this->faker->randomElement(['S', 'M', 'L', 'XL']), // Российский размер
            'bust_circumference' => $this->faker->randomFloat(1, 80, 120), // Охват груди
            'waist_circumference' => $this->faker->randomFloat(1, 60, 100), // Охват талии
            'hip_circumference' => $this->faker->randomFloat(1, 80, 120), // Охват бедер
        ];
    }
}
