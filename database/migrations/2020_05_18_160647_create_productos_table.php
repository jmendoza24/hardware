<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fabricante')->nullable();
            $table->integer('catalogo')->nullable();
            $table->string('pagina')->nullable();
            $table->integer('familia')->nullable();
            $table->integer('categoria')->nullable();
            $table->integer('subcategoria')->nullable();
            $table->integer('disenio')->nullable();
            $table->string('item')->nullable();
            $table->integer('sufijo')->nullable();
            $table->string('grupo_sufijo')->nullable();
            $table->string('descripcion')->nullable();
            $table->string('descripcion_mtk')->nullable();
            $table->string('especificacion')->nullable();
            $table->string('selector_mtk')->nullable();
            $table->string('mortise')->nullable();
            $table->string('fmm1')->nullable();
            $table->string('stem')->nullable();
            $table->string('fmm2')->nullable();
            $table->string('handle')->nullable();
            $table->string('fmm3')->nullable();
            $table->string('wheel')->nullable();
            $table->string('fastener')->nullable();
            $table->string('style')->nullable();
            $table->string('finish')->nullable();
            $table->string('style_1')->nullable();
            $table->string('style_2')->nullable();
            $table->string('style_3')->nullable();
            $table->string('latch')->nullable();
            $table->string('strike')->nullable();
            $table->string('cylinder')->nullable();
            $table->string('keyling')->nullable();
            $table->string('finish_det_1')->nullable();
            $table->string('finish_det_2')->nullable();
            $table->string('finish_det_3')->nullable();
            $table->string('finish_det_4')->nullable();
            $table->integer('dependencias')->nullable();
            $table->integer('handing')->nullable();
            $table->string('door_thickness')->nullable();
            $table->string('backset')->nullable();
            $table->string('costo_1')->nullable();
            $table->string('costo_2')->nullable();
            $table->string('costo_3')->nullable();
            $table->string('costo_4')->nullable();
            $table->integer('calculo_codigo')->nullable();
            $table->string('codigo_sistema')->nullable();
            $table->string('notas')->nullable();
            $table->string('exterior_tim_dep_1')->nullable();
            $table->integer('exterior_tim_1_accion')->nullable();
            $table->string('int_escutcheon_dep_2')->nullable();
            $table->integer('int_escutcheon_dep2_accion')->nullable();
            $table->string('knob_lever_dep3')->nullable();
            $table->integer('knob_lever_dep3_accion')->nullable();
            $table->string('spindle_dep4')->nullable();
            $table->integer('spindle_dep4_accion')->nullable();
            $table->string('cylinder_dep5')->nullable();
            $table->integer('cylinder_dep5_accion')->nullable();
            $table->string('mortise_lock_dep6')->nullable();
            $table->integer('mortise_lock_dep6_accion')->nullable();
            $table->string('blocking_dep7')->nullable();
            $table->integer('blocking_dep7_accion')->nullable();
            $table->string('turn_knob8')->nullable();
            $table->integer('turn_knob8_accion')->nullable();
            $table->string('dep9')->nullable();
            $table->integer('dep9_accion')->nullable();
            $table->string('dep10_libre')->nullable();
            $table->integer('dep10_libre_accion')->nullable();
            $table->string('dep11_libre')->nullable();
            $table->integer('dep11_libre_accion')->nullable();
            $table->string('dep12_libre')->nullable();
            $table->integer('dep12_libre_accion')->nullable();
            $table->string('dep_rossetes')->nullable();
            $table->integer('dep_rossetes_accion')->nullable();
            $table->string('dep_latches')->nullable();
            $table->integer('dep_latches_accion')->nullable();
            $table->string('dep_adaptor')->nullable();
            $table->integer('dep_adaptor_accion')->nullable();
            $table->string('dep_spindle')->nullable();
            $table->integer('dep_spindle_accion')->nullable();
            $table->string('dep_extension')->nullable();
            $table->integer('dep_extension_accion')->nullable();
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
        Schema::drop('productos');
    }
}
