<?php

namespace Database\Factories;

use App\Models\LoyaltyProgram;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bonus>
 */
class OrderBonusFactory extends Factory
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
            // Случайная программа лояльности или создание новой
            'loyalty_program_id' => LoyaltyProgram::inRandomOrder()->first()?->id ?? LoyaltyProgram::factory()->create()->id,
            'used_bonus_points' => $this->faker->numberBetween(10, 500), // Использованные бонусы
        ];
    }
}
