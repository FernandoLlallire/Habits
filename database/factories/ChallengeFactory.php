<?php

use Faker\Generator as Faker;

$factory->define(App\Challenge::class, function (Faker $faker) {
    return [
      "name" => $faker->name,
      "description" => $faker->company,
      "metaChallenge"=> $faker->numberBetween(0,10),
      "points" => $faker->numberBetween(0,100),
    ];
});
