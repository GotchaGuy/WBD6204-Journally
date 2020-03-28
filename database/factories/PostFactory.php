<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
        'body' => $faker->paragraph(3),
        'image' => 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.whoatravel.com%2Fjapan&psig=AOvVaw22J9FlSfa3j2yZw2m4OME2&ust=1584279518580000&source=images&cd=vfe&ved=0CAIQjRxqFwoTCNj6wqeLmugCFQAAAAAdAAAAABAD',
        'user_id' => $faker->numberBetween(1, 20),
        'category_id' => $faker-> numberBetween(1, 4)
        ];
});
