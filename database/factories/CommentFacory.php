<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'text'          => $faker->sentence($nbWords = 12, $variableNbWords = true),
        'article_id'    => $faker->numberBetween($min = 1, $max = 50),
        'user_id'       => $faker->numberBetween($min = 2, $max = 21),
    ];
});
