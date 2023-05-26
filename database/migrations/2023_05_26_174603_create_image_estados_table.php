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
        Schema::create('image_estados', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_estado')->nullable();
            $table->text("ruta");
        
            $table->foreign('id_estado')->references('id')->on('estados')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('image_estados');
    }
};
