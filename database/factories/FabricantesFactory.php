<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Fabricantes;
use Faker\Generator as Faker;

$factory->define(Fabricantes::class, function (Faker $faker) {

    return [
        'id_fabricante' => $faker->randomDigitNotNull,
        'fabricante' => $faker->word,
        'nombre_largo' => $faker->word,
        'abrev' => $faker->word,
        'descripcion' => $faker->word,
        'datos_bancarios' => $faker->word,
        'direccion' => $faker->word,
        'pais' => $faker->randomDigitNotNull,
        'contacto' => $faker->word,
        'condiciones' => $faker->word,
        'correo' => $faker->word,
        'correo_gen' => $faker->word,
        'web' => $faker->word,
        'telefono_dir' => $faker->word,
        'telefono_gen' => $faker->word,
        'telefono_fax' => $faker->word,
        'gama' => $faker->randomDigitNotNull,
        'modalidad' => $faker->randomDigitNotNull,
        'id_tipo3' => $faker->randomDigitNotNull,
        'id_tipo4' => $faker->randomDigitNotNull,
        'activo' => $faker->randomDigitNotNull,
        'fecha' => $faker->date('Y-m-d H:i:s'),
        'cp' => $faker->randomDigitNotNull,
        'estado' => $faker->word
    ];
});
