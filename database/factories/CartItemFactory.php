<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\CartItem;
use Faker\Generator as Faker;

$factory->define(CartItem::class, function (Faker $faker) {
    $product = \App\Product::get()->random();
    return [
        'cart_id' => \App\Cart::get()->random()->id,
        'product_id' => $product->id,
        'qty' => $faker->numberBetween(1,$product->stock)
    ];
});
