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
        Schema::create('carreras', function (Blueprint $table) {
            $table->id();

            $table->string('nombre',155);
            $table->string('slug',255); //Ayuda a crear URLs, bonitas


            //Datos informativos
            $table->longText('descripcion');
            $table->longText('perfil_ingreso');
            $table->longText('perfil_egreso');

            
            $table->longText('plan_estudio');


            $table->integer('likes');
            $table->string('tipo',100);
            $table->unsignedBigInteger('id_universidad');
            $table->unsignedBigInteger('id_carrera');


            $table->foreign('id_universidad')->references('id')->on('universidads')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carreras');
    }
};
