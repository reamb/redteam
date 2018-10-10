<?php

use Faker\Generator as Faker;

$factory->define(App\guests::class, function (Faker $faker) {
    return [
		'ner' =>$faker->name,
		'ovog' =>$faker->name,
        'email' => $faker->email,
		'phone' => $faker->Phonenumber,
		'feedback' => '1',
        'info1' => $faker->Phonenumber,
		'info2' => $faker->Phonenumber,
		'info3' => $faker->Phonenumber,
		'company' => $faker->Company,
		'position' =>$faker->Company,

    ];
});
