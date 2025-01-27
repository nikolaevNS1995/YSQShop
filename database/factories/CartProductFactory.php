<?php

namespace Database\Factories;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CartProduct>
 */
class CartProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // Случайная корзина или создание новой
            'cart_id' => Cart::inRandomOrder()->first()?->id ?? Cart::factory()->create()->id,
            // Случайный товар или создание нового
            'product_id' => Product::inRandomOrder()->first()?->id ?? Product::factory()->create()->id,
            'quantity' => $this->faker->numberBetween(1, 10), // Количество товаров в корзине
        ];
    }
}
