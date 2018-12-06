<?php

use Faker\Generator as Faker;

$factory->define(App\Category::class, function (Faker $faker) {
    return [
      'name' => $faker->unique()->randomElement([
  			'Alimentacion',
  			'Actividad Fisica',
  			'Horas de Sueño',
  			'Fumar',
  			'Lectura',
  		]),
    ];
});
