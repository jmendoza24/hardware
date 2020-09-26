<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Clientes;
use Faker\Generator as Faker;

$factory->define(Clientes::class, function (Faker $faker) {

    return [
        'id_cliente' => $faker->randomDigitNotNull,
        'nombre' => $faker->word,
        'empresa' => $faker->word,
        'telefono1' => $faker->word,
        'telefono2' => $faker->word,
        'correo' => $faker->word,
        'direccion' => $faker->word,
        'rfc' => $faker->word,
        'pais' => $faker->randomDigitNotNull,
        'estado' => $faker->randomDigitNotNull,
        'municipio' => $faker->randomDigitNotNull,
        'cp' => $faker->word,
        'id_tipo1' => $faker->randomDigitNotNull,
        'id_tipo2' => $faker->randomDigitNotNull,
        'id_tipo3' => $faker->randomDigitNotNull,
        'id_tipo4' => $faker->randomDigitNotNull,
        'id_precio' => $faker->randomDigitNotNull,
        'referencia' => $faker->word,
        'activo' => $faker->randomDigitNotNull,
        'dir_facturacion' => $faker->word,
        'contacto' => $faker->word,
        'fax' => $faker->word
    ];
});
