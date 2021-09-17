<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Admin\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'post_title' => $faker->word,
        'post_details' => $faker->sentence(),
        // 'post_image'=>'1234567'

    ];
});
