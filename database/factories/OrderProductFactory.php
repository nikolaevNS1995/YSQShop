<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderProduct>
 */
class OrderProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // Случайный заказ или создание нового
            'order_id' => Order::inRandomOrder()->first()?->id ?? Order::factory()->create()->id,
            // Случайный товар или создание нового
            'product_id' => Product::inRandomOrder()->first()?->id ?? Product::factory()->create()->id,
            'quantity' => $this->faker->numberBetween(1, 5), // Количество товаров
            'price' => $this->faker->randomFloat(2, 100, 5000), // Цена товара на момент заказа
        ];
    }
}
