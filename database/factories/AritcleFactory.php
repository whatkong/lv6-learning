<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Article::class, function (Faker $faker) {
    return [
        'uid' => rand(1,3),
        'title' => $faker->sentence,
        'content' => $faker->realText()
    ];
});
