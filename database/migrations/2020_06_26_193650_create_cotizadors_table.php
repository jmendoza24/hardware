<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCotizadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotizacion_detalle', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_cotizacion')->nullable();
            $table->integer('item')->nullable();
            $table->string('posicion')->nullable();
            $table->integer('bks')->nullable();
            $table->integer('door_t')->nullable();
            $table->integer('fabricante')->nullable();
            $table->string('precio_unit')->nullable();
            $table->integer('cantidad')->nullable();
            $table->string('mod_precio_unit')->nullable();
            $table->integer('mod_cantidad')->nullable();
            $table->string('inst_precio_unit')->nullable();
            $table->integer('inst_cantidad')->nullable();
            $table->integer('usuario')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cotizacion_detalle');
    }
}
