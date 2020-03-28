<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Event;
use Faker\Generator as Faker;

$factory->define(Event::class, function (Faker $faker) {
    return [
        'content' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'date' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = '+ 1 month', $timezone = null),
         'user_id' => $faker->numberBetween(1, 2),
        'status_id' => $faker-> numberBetween(1, 2)
    ];
});
