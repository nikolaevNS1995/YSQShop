<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Status::factory()->create(['title' => 'Создан']);
        Status::factory()->create(['title' => 'Обрабатывается']);
        Status::factory()->create(['title' => 'Доставляется']);
        Status::factory()->create(['title' => 'Завершён']);
        Status::factory()->create(['title' => 'Отменён']);
    }
}
