<?php

namespace Database\Seeders;

use App\Models\OrderBonus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderBonusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OrderBonus::factory(10)->create();
    }
}
