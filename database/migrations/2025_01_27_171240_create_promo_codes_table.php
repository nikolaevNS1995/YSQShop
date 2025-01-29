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
        Schema::create('promo_codes', function (Blueprint $table) {
            $table->id();
            $table->string('code', 100)->unique(); // Уникальный код
            $table->text('description')->nullable(); // Описание промокода
            $table->decimal('discount_value', 10, 2); // Размер скидки
            $table->string('discount_unit', 10)->default('%'); // Единица измерения (% или сумма)
            $table->timestamp('start_date')->nullable(); // Дата начала действия
            $table->timestamp('end_date')->nullable(); // Дата окончания действия
            $table->integer('usage_limit')->nullable(); // Лимит использования
            $table->integer('times_used')->default(0); // Количество использований
            $table->softDeletes(); // Мягкое удаление
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promo_codes');
    }
};
