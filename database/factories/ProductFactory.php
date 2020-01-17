<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
        'description' => $faker->paragraph(),
        // 'image_url' => $faker->imageUrl(400, 400),
        'image_url' => 'https://via.placeholder.com/400',
        'price' => $faker->randomFloat(2,100,300),
        'stock' => $faker->numberBetween(5,200)
    ];
});
