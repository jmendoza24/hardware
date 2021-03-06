<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\proyectos;
use Faker\Generator as Faker;

$factory->define(proyectos::class, function (Faker $faker) {

    return [
        'nombre' => $faker->word,
        'nombre_corto' => $faker->word,
        'direccion' => $faker->word,
        'geolocalizacion' => $faker->text,
        'rfc' => $faker->text,
        'cp' => $faker->text,
        'municipio' => $faker->randomDigitNotNull,
        'estado' => $faker->randomDigitNotNull,
        'pais' => $faker->randomDigitNotNull,
        'correo_due o' => $faker->text,
        'telefono' => $faker->text,
        'arquitecto_correo' => $faker->text,
        'tel_arq' => $faker->text,
        'comprador_correo' => $faker->text,
        'tel_comprador' => $faker->text,
        'tipo' => $faker->randomDigitNotNull,
        'comentarios' => $faker->text,
        'estatus' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
