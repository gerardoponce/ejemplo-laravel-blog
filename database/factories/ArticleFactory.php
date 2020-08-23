<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Article;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Article::class, function (Faker $faker) {
    return [
        'title'         => $slug = $faker->sentence($nbWords = 8, $variableNbWords = true),
        'slug'          => Str::slug($slug, '-'),
        'image_path'    => $faker->imageUrl($width = 960, $height = 600),
        'sub_title'     => $faker->sentence($nbWords = 20, $variableNbWords = true),
        'text'          => $faker->text($maxNbChars = 2000),
        'user_id'       => $faker->numberBetween($min = 2, $max = 5),
        'category_id'   => $faker->numberBetween($min = 1, $max = 4)
    ];
});
