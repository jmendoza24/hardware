<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\tbl_fotos_productos;
use Faker\Generator as Faker;

$factory->define(tbl_fotos_productos::class, function (Faker $faker) {

    return [
        'id_producto' => $faker->randomDigitNotNull,
        'foto' => $faker->text,
        'activo' => $faker->randomDigitNotNull,
        'tipo' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
