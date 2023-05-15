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
            $table->text('url_web')->nullable();
            $table->text('slug')->unique();

            //$table->text('image');
            //$table->integer('likes');
            
            $table->text("mision")->nullable();
            $table->text("vision")->nullable();
            $table->text("objetivos")->nullable();
            // Maps
            $table->string('latitud',255);
            $table->string('longitud',255);

            $table->string("logo");

            $table->unsignedBigInteger('id_municipio')->nullable();

            $table->foreign('id_municipio')->references('id')->on('municipios')->onDelete('set null');

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
