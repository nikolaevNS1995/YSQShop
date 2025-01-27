<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductCard>
 */
class ProductCardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id' => \App\Models\Category::factory(), // Генерация категории
            'title' => $this->faker->sentence(3), // Название товара
            'description' => $this->faker->paragraph, // Описание
            'sku' => $this->faker->unique()->ean8, // Уникальный артикул
            'weight' => $this->faker->randomFloat(2, 0.1, 5), // Вес
            'height' => $this->faker->randomFloat(2, 10, 100), // Высота
            'width' => $this->faker->randomFloat(2, 10, 100), // Ширина
            'length' => $this->faker->randomFloat(2, 10, 100), // Длина
            'price' => $this->faker->randomFloat(2, 100, 10000), // Цена
        ];
    }
}
