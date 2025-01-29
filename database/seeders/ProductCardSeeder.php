<?php

namespace Database\Seeders;

use App\Models\ProductCard;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductCardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductCard::factory(50)->create(); // Создаём 50 карточек товаров
    }
}
