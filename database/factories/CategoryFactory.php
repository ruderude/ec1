<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
      'parent_id' => $faker->randomDigitNotNull,
      'category_name' => $faker->realText(10),
    ];
});
