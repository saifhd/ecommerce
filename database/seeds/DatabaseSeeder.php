<?php

use Illuminate\Database\Seeder;
// use AdminsTableSeeder;
use App\Admin;
use App\Model\Admin\Brand;
use App\Model\Admin\Category;
use App\Model\Admin\Post;
use App\Model\Admin\Post_category;
use App\Model\Admin\Product;
use App\Model\Admin\Site_Setting;
use App\Model\Admin\Subcategory;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Site_Setting::create([
            'phone1'=>'0771111111',
            'phone2'=>'0812345675',
            'email'=>'ecom@gmail.com',
            'company_name'=>'ECommerce',
            'company_address'=>'No-10,Peradeniya Road, Kandy',
            'facebook'=>'facebook.com',
            'instagram'=>'instagram.com',
            'twitter'=>'twitter.com',
            'youtube'=>'youtube.com'
        ]);
        Admin::create([
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'password'=>Hash::make('admin1234'),
            'phone'=>'0771234567',
            'category'=>'1',
            'coupon'=>'1',
            'product'=>'1',
            'blog'=>'1',
            'order'=>'1',
            'other_pro'=>'1',
            'report'=>'1',
            'role'=>'1',
            'return_pro'=>'1',
            'contact'=>'1',
            'comment'=>'1',
            'type'=>'1',
            'setting'=>'1',
            'stock'=>'1'
        ]);


        factory(Subcategory::class,5)->create([
            'category_id'=>factory(Category::class)->create()
        ]);
        factory(Subcategory::class, 2)->create([
            'category_id' => factory(Category::class)->create()
        ]);
        factory(Brand::class,5)->create();
        factory(Post::class,5)->create([
            'category_id'=>factory(Post_category::class)->create()
        ]);
        factory(Product::class,10)->create([
            'category_id'=>1,
            'subcategory_id'=>1,
            'brand_id'=>1,
        ]);
        factory(Product::class, 10)->create([
            'category_id' => 2,
            'subcategory_id' => 2,
            'brand_id' => 2,
        ]);
    }
}
