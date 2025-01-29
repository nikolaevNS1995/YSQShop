<?php

namespace Database\Factories;

use App\Models\Favorite;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FavoriteProduct>
 */
class FavoriteProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // Случайное избранное или создание нового
            'favorite_id' => Favorite::inRandomOrder()->first()?->id ?? Favorite::factory()->create()->id,
            // Случайный товар или создание нового
            'product_id' => Product::inRandomOrder()->first()?->id ?? Product::factory()->create()->id,
            'quantity' => 1, // Обычно в избранном количество = 1
        ];
    }
}
