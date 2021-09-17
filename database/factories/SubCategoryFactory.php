<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Admin\Subcategory;
use Faker\Generator as Faker;

$factory->define(Subcategory::class, function (Faker $faker) {
    return [
        'subcategory_name' => $faker->word,
    ];
});
