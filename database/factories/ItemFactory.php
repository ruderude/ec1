<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use App\Item;
use Faker\Generator as Faker;

$factory->define(Item::class, function (Faker $faker) {
    return [
      'name' => $faker->realText(10),
      'manufacturer' => $faker->randomDigitNotNull,
      'item_code' => $faker->numberBetween($min = 1000, $max = 9000),
      'list_price' => $faker->numberBetween($min = 1000, $max = 1000000),
      'sale_price' => $faker->numberBetween($min = 1000, $max = 1000000),
      'category_id' => $faker->randomDigitNotNull,
      'item_description' => $faker->realText(100),

    ];
});
