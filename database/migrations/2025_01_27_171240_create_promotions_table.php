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
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255)->index(); // Название акции
            $table->text('description')->nullable(); // Описание
            $table->decimal('discount_value', 10, 2); // Размер скидки
            $table->string('discount_unit', 10)->default('%'); // Единица измерения (% или сумма)
            $table->timestamp('start_date')->nullable(); // Дата начала
            $table->timestamp('end_date')->nullable(); // Дата окончания
            $table->softDeletes(); // Мягкое удаление
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promotions');
    }
};
