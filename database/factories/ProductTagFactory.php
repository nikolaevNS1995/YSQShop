<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductTag>
 */
class ProductTagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // Случайный товар или создание нового
            'product_id' => Product::inRandomOrder()->first()?->id ?? Product::factory()->create()->id,
            // Случайный тег или создание нового
            'tag_id' => Tag::inRandomOrder()->first()?->id ?? Tag::factory()->create()->id,
        ];
    }
}
