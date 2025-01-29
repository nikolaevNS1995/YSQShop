<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Promotion>
 */
class PromotionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3), // Название акции
            'description' => $this->faker->paragraph, // Описание
            'discount_value' => $this->faker->randomFloat(2, 5, 50), // Размер скидки
            'discount_unit' => $this->faker->randomElement(['%', 'руб']), // Единица измерения
            'start_date' => $this->faker->dateTimeBetween('-1 month', 'now'), // Дата начала
            'end_date' => $this->faker->dateTimeBetween('now', '+1 month'), // Дата окончания
        ];
    }
}
