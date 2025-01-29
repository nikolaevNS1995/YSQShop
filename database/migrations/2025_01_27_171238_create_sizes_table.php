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
        Schema::create('sizes', function (Blueprint $table) {
            $table->id();
            $table->string('type', 50)->nullable();
            $table->string('manufacturer_size', 50)->index(); // Индексируем размер производителя
            $table->string('russian_size', 50)->nullable();
            $table->float('bust_circumference')->nullable();
            $table->float('waist_circumference')->nullable();
            $table->float('hip_circumference')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sizes');
    }
};
