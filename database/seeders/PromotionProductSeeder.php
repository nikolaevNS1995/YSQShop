<?php

namespace Database\Seeders;

use App\Models\PromotionProduct;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PromotionProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PromotionProduct::factory(50)->create(); // Генерация 50 связей между акциями и товарами
    }
}
