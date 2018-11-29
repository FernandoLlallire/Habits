<?php

use Faker\Generator as Faker;

$factory->define(App\Challenge::class, function (Faker $faker) {
    return [
      "name" => $faker->name,
      "description" => $faker->company,
      "step_1"=> $faker->numberBetween(0,10),
      "step_2" => $faker->numberBetween(10,20),
      "step_3" => $faker->numberBetween(20,30),
      "step_4" => $faker->numberBetween(30,40),
      "step_5" => $faker->numberBetween(40,50),
      "description_step_1" => "Description_1_".$faker->numberBetween(0,10),
      "description_step_2" => "Description_2_".$faker->numberBetween(20,30),
      "description_step_3" => "Description_3_".$faker->numberBetween(30,40),
      "description_step_4" => "Description_4_".$faker->numberBetween(40,50),
      "description_step_5" => "Description_5_".$faker->numberBetween(50,60),
    ];
});
