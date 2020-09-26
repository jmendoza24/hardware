<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProyectosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyectos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('nombre_corto')->nullable();
            $table->string('direccion')->nullable();
            $table->string('geolocalizacion')->nullable();
            $table->string('rfc')->nullable();
            $table->string('cp')->nullable();
            $table->integer('municipio')->nullable();
            $table->integer('estado')->nullable();
            $table->integer('pais')->nullable();
            $table->string('correo_duenio')->nullable();
            $table->string('telefono')->nullable();
            $table->string('arquitecto_correo')->nullable();
            $table->string('tel_arq')->nullable();
            $table->string('comprador_correo')->nullable();
            $table->string('tel_comprador')->nullable();
            $table->integer('tipo')->nullable();
            $table->string('comentarios')->nullable();
            $table->integer('estatus')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('proyectos');
    }
}
