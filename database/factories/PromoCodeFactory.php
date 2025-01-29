<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PromoCode>
 */
class PromoCodeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => $this->faker->unique()->lexify('PROMO????'),
            'description' => $this->faker->sentence,
            'discount_value' => $this->faker->randomFloat(2, 5, 30),
            'discount_unit' => $this->faker->randomElement(['%', 'руб']),
            'start_date' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'end_date' => $this->faker->dateTimeBetween('now', '+1 month'),
            'usage_limit' => $this->faker->numberBetween(1, 100),
            'times_used' => $this->faker->numberBetween(0, 50),
        ];
    }
}
