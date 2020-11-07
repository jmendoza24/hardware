<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\productos;
use Faker\Generator as Faker;

$factory->define(productos::class, function (Faker $faker) {

    return [
        'fabricante' => $faker->randomDigitNotNull,
        'catalogo' => $faker->randomDigitNotNull,
        'pagina' => $faker->word,
        'familia' => $faker->randomDigitNotNull,
        'categoria' => $faker->randomDigitNotNull,
        'subcategoria' => $faker->randomDigitNotNull,
        'disenio' => $faker->randomDigitNotNull,
        'item' => $faker->word,
        'sufijo' => $faker->randomDigitNotNull,
        'grupo_sufijo' => $faker->word,
        'descripcion' => $faker->word,
        'descripcion_mtk' => $faker->word,
        'especificacion' => $faker->word,
        'selector_mtk' => $faker->word,
        'mortise' => $faker->word,
        'fmm1' => $faker->word,
        'stem' => $faker->word,
        'fmm2' => $faker->word,
        'handle' => $faker->word,
        'fmm3' => $faker->word,
        'wheel' => $faker->word,
        'fastener' => $faker->word,
        'style' => $faker->word,
        'finish' => $faker->word,
        'style_1' => $faker->word,
        'style_2' => $faker->word,
        'style_3' => $faker->word,
        'latch' => $faker->word,
        'strike' => $faker->word,
        'cylinder' => $faker->word,
        'keyling' => $faker->word,
        'finish_det_1' => $faker->word,
        'finish_det_2' => $faker->word,
        'finish_det_3' => $faker->word,
        'finish_det_4' => $faker->word,
        'dependencias' => $faker->randomDigitNotNull,
        'handing' => $faker->randomDigitNotNull,
        'door_thickness' => $faker->word,
        'backset' => $faker->word,
        'costo_1' => $faker->word,
        'costo_2' => $faker->word,
        'costo_3' => $faker->word,
        'costo_4' => $faker->word,
        'calculo_codigo' => $faker->randomDigitNotNull,
        'codigo_sistema' => $faker->word,
        'notas' => $faker->word,
        'exterior_tim_dep_1' => $faker->word,
        'exterior_tim_1_accion' => $faker->word,
        'int_escutcheon_dep_2' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
