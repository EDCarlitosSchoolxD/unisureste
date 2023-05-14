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


        Schema::create('estados', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',255)->unique();
            $table->unsignedBigInteger('id_image');
            $table->text('slug')->unique();

            

            $table->foreign('id_image')->references('id')->on('images')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estados');
    }
};
