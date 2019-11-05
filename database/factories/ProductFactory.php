<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'price' => $faker->numberBetween(50,10000),
        'product_detail' => $faker->paragraph,
        'product_in_stock' => $faker->randomDigit,
        'product_discount' => $faker->numberBetween(1,70),   
        'product_of_customer_order' => $faker->randomDigit 
    ];
});
