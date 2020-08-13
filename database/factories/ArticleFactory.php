<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Article;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Article::class, function (Faker $faker) {
    return [
        'title'         => $slug = $faker->sentence($nbWords = 6, $variableNbWords = true),
        'slug'          => Str::slug($slug, '-'),
        'text'       => $faker->text(300),
        'user_id'       => 1,
        'category_id'   => 2,
    ];
});
