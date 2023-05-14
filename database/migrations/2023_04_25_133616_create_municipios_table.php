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
        Schema::create('municipios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',255);
            $table->text('slug');
            $table->unsignedBigInteger('id_estado')->nullable();
            $table->unsignedBigInteger('id_image');

            $table->foreign('id_image')->references('id')->on('images')->onDelete('cascade');
            $table->foreign('id_estado')->references('id')->on('estados')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('municipios');
    }
};
