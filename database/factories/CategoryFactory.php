<?php

use Faker\Generator as Faker;

$factory->define(App\Category::class, function (Faker $faker) {
    return [
      'name' => $faker->unique()->randomElement([
  			'category_1',
  			'Category_2',
  			'category_3',
  			'Category_4',
  			'Category_5'
  		]),
      'description' => $faker->unique()->randomElement([
        "description_1",
        "description_2",
        "description_3",
        "description_4",
        "description_5",
      ]),
    ];
});
