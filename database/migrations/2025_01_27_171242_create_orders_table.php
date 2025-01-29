<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnDelete(); // Привязка к пользователю
            $table->foreignId('promo_code_id')->nullable()->constrained('promo_codes')->nullOnDelete(); // Привязка к промокоду
            $table->decimal('total_price', 10, 2); // Итоговая стоимость
            $table->text('delivery_address'); // Адрес доставки
            $table->foreignId('status_id')->default(1)->constrained('statuses')->cascadeOnDelete(); // Статус заказа
            $table->softDeletes(); // Удаление заказа
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
