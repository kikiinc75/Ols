<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'code'=> $faker->unique()->ean8,
        'name'=> $faker->name,
        'varian' => $faker->name,
        'stock'=> 100,
        'price'=> $faker->randomNumber(5),
        'categorie_id'=> rand(1,9),
        // 'categorie_id'=> factory(Categorie::class)->create(),
        'level'=>'parent',
        'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pharetra tempor so dales. Phasellus sagittis auctor gravida. Integer bibendum sodales arcu id te mpus. Ut consectetur lacus leo, non scelerisque nulla euismod nec.'
    ];
});
