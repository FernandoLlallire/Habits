<?php

use Faker\Generator as Faker;

$factory->define(App\Challenge::class, function (Faker $faker) {
    return [
      "name" => $faker->name,
      "description" => $faker->company,
      "metaChallenge"=> $faker->numberBetween(10,20),
      "points" => $faker->numberBetween(1,10),
    ];
});
