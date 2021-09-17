<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Admin\Brand;
use Faker\Generator as Faker;

$factory->define(Brand::class, function (Faker $faker) {
    return [
        'brand_name' => $faker->word,
        
    ];
});
