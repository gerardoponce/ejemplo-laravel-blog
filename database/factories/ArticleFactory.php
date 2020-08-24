<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Article;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Article::class, function (Faker $faker) {
    return [
        'title'         => $slug = $faker->sentence($nbWords = 6, $variableNbWords = true),
        'slug'          => Str::slug($slug, '-'),
        'image_path'    => $faker->imageUrl($width = 960, $height = 600),
        'excerpt'       => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'text'          => $faker->text($maxNbChars = 500),
        'user_id'       => $faker->numberBetween($min = 2, $max = 5),
        'category_id'   => $faker->numberBetween($min = 1, $max = 4)
    ];
});
