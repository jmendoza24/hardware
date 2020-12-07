<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\tbl_oc_fab;
use Faker\Generator as Faker;

$factory->define(tbl_oc_fab::class, function (Faker $faker) {

    return [
        'id_cotizacion' => $faker->randomDigitNotNull,
        'estatus' => $faker->randomDigitNotNull,
        'cantidad' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
