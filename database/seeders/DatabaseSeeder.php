<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
            SizeSeeder::class,
            ColorSeeder::class,
            TagSeeder::class,
            ProductCardSeeder::class,
            ProductSeeder::class,
            PhotoSeeder::class,
            UserSeeder::class,
            PromotionSeeder::class,
            PromoCodeSeeder::class,
            CartSeeder::class,
            CartProductSeeder::class,
            FavoriteSeeder::class,
            FavoriteProductSeeder::class,
            OrderSeeder::class,
            OrderProductSeeder::class,
            LoyaltyProgramSeeder::class,
            OrderBonusSeeder::class,
            StatusSeeder::class,
            ProductTagSeeder::class,
            PromotionProductSeeder::class,
        ]);
    }
}
