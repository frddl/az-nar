<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'text' => $faker->text(20),
        'price' =>3.00,
        'sub_category_id' => \App\SubCategory::inRandomOrder()->select('id')->first(),

    ];
});
