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
        Schema::create('universidads', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',255)->unique();

            $table->string('tipo');//Privada o publica
            $table->text('url_web');
            $table->text('slug')->unique();

            //$table->text('image');
            //$table->integer('likes');
            
            $table->text("mision");
            $table->text("vision");
            $table->text("objetivos");
            //Google Maps
            $table->string('latitud',255);
            $table->string('longitud',255);

            $table->unsignedBigInteger('id_municipio');

            $table->foreign('id_municipio')->references('id')->on('municipios')->onDelete('cascade');

            //HACER UNA RELACION MUCHOS A MUCHOS

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('universidads');
    }
};