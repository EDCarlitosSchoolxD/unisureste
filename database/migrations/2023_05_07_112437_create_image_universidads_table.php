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
        Schema::create('image_universidads', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_image')
            ->nullable()
            ->constrained('images')
            ->cascadeOnUpdate()
            ->nullOnDelete();

            $table->foreignId('id_universidad')
            ->nullable()
            ->constrained('universidads')
            ->cascadeOnUpdate()
            ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('image_universidads');
    }
};
