<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Categorie;
use Faker\Generator as Faker;

$factory->define(Categorie::class, function (Faker $faker) {
    return [
        'name' => $faker->name
    ];
});
