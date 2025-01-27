<?php

namespace Database\Factories;

use App\Models\PromoCode;
use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // Случайный пользователь или создание нового
            'user_id' => User::inRandomOrder()->first()?->id ?? User::factory()->create()->id,
            // Случайный промокод или null
            'promo_code_id' => PromoCode::inRandomOrder()->first()?->id ?? null,
            'total_price' => $this->faker->randomFloat(2, 100, 10000), // Итоговая цена
            'delivery_address' => $this->faker->address, // Адрес доставки
            'status_id' => Status::inRandomOrder()->first()?->id ?? Status::factory()->create()->id,
        ];
    }
}
