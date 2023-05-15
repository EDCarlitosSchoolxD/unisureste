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
        Schema::create('imagenes_universidads', function (Blueprint $table) {
            $table->id();
            $table->text("ruta");
            $table->unsignedBigInteger('id_universidad')->nullable();

            
            $table->foreign('id_universidad')->references('id')->on('universidads')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('imagenes_universidads');
    }
};
