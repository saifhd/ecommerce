<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Admin\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
            'product_name'=>$faker->word(),
            'product_code'=> $faker->word(),
            'product_quantity'=>100,
            'product_detail'=> $faker->paragraph(),
            'product_colour'=>$faker->colorName(),
            'product_size'=>'small',
            'selling_price'=>110,
            'discount_price'=>10,
            'video_link'=>'www.youtube.com',
            'main_slider'=>1,
        'image_one'=> '/media/product/1684534095958646.png',
        'image_two'=> '/mediaproduct/1690778884783366.png',
        'hot_deal' => 1,
        'best_seller' => 1,
        'mid_slider' => 1,
        'hot_new' => 1,
        'buyone_getone' => 1,
        'trent' => 1,
        'status' => 1,
    ];
});
