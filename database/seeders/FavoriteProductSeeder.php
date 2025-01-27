<?php

namespace Database\Seeders;

use App\Models\FavoriteProduct;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FavoriteProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FavoriteProduct::factory(50)->create();
    }
}
