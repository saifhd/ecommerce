<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Admin\Post_category;
use Faker\Generator as Faker;

$factory->define(Post_category::class, function (Faker $faker) {
    return [
        'category_name' => $faker->word,
    ];
});
