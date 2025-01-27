<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Promotion;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PromotionProduct>
 */
class PromotionProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // Случайная акция или создание новой
            'promotion_id' => Promotion::inRandomOrder()->first()?->id ?? Promotion::factory()->create()->id,
            // Случайный товар или создание нового
            'product_id' => Product::inRandomOrder()->first()?->id ?? Product::factory()->create()->id,
        ];
    }
}
