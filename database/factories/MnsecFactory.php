<?php

use Faker\Generator as Faker;

$factory->define(App\mnsec::class,  function (Faker $faker) {
    return [
        'ner' => substr($faker->sentence(2), 0, -1),
		'ovog' => substr($faker->sentence(2), 0, -1),
        'email' => $faker->email,
        'info1' => $faker->paragraph,
		'info2' => $faker->paragraph,
		'info3' => $faker->paragraph,
		'company' => substr($faker->sentence(2), 0, -1),
		'position' => substr($faker->sentence(2), 0, -1),
 	 
		 
    ];
});