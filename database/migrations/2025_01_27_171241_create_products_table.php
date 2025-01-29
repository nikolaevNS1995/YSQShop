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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_card_id')->constrained('product_cards')->cascadeOnDelete(); // Привязка к карточке товара
            $table->foreignId('size_id')->nullable()->constrained('sizes')->cascadeOnDelete();
            $table->foreignId('color_id')->nullable()->constrained('colors')->cascadeOnDelete();
            $table->integer('quantity')->default(0)->index(); // Индексируем количество
            $table->integer('views')->default(0);
            $table->boolean('published')->default(true)->index(); // Индексируем статус публикации
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
