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
        Schema::create('order_bonuses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->cascadeOnDelete(); // Привязка к заказу
            $table->foreignId('loyalty_program_id')->constrained('loyalty_programs')->cascadeOnDelete(); // Привязка к программе лояльности
            $table->integer('used_bonus_points')->default(0); // Количество использованных бонусов
            $table->softDeletes(); // Мягкое удаление записи
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_bonuses');
    }
};
