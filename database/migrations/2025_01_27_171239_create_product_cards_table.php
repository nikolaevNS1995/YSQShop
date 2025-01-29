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
        Schema::create('product_cards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete(); // Связь с категорией
            $table->string('title', 255)->index(); // Используем title вместо name
            $table->text('description')->nullable();
            $table->string('sku', 100)->unique(); // Уникальный индекс для артикула
            $table->float('weight')->nullable(); // Вес товара
            $table->float('height')->nullable(); // Высота
            $table->float('width')->nullable(); // Ширина
            $table->float('length')->nullable(); // Длина
            $table->float('price')->index(); // Индексируем цену для фильтров
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_cards');
    }
};
