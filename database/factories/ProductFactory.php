<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_card_id' => \App\Models\ProductCard::factory(), // Генерация карточки товара
            'size_id' => \App\Models\Size::factory(), // Генерация размера
            'color_id' => \App\Models\Color::factory(), // Генерация цвета
            'quantity' => $this->faker->numberBetween(0, 100), // Количество на складе
            'views' => $this->faker->numberBetween(0, 1000), // Количество просмотров
            'published' => $this->faker->boolean, // Статус публикации
        ];
    }
}
