<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Создаём админа
        User::create([
            'first_name' => 'Admin',
            'last_name' => 'User',
            'email' => 'admin@example.com',
            'phone' => '+1234567890',
            'role' => 'admin',
            'password' => Hash::make('password'),
        ]);

        // Создаём менеджера
        User::create([
            'first_name' => 'Manager',
            'last_name' => 'User',
            'email' => 'manager@example.com',
            'phone' => '+1234567891',
            'role' => 'manager',
            'password' => Hash::make('password'),
        ]);

        User::factory(10)->create();
    }
}

