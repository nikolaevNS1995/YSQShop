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
        Schema::create('favorite_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('favorite_id')->constrained('favorites')->cascadeOnDelete(); // Привязка к избранному
            $table->foreignId('product_id')->constrained('products')->cascadeOnDelete(); // Привязка к товару
            $table->integer('quantity')->default(1); // Если нужно хранить количество в избранном
            $table->softDeletes(); // Удаление записи
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('favorite_products');
    }
};
