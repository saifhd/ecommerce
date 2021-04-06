<?php

namespace App\Model\Admin;
use App\Model\Wishlist;
use App\Model\OrderDetail;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = [
        'category_id','subcategory_id','brand_id','product_name','product_code','product_quantity',
        'product_detail','product_colour','product_size','selling_price','discount_price',
        'video_link','main_slider','hot_deal','best_seller','mid_slider','hot_new','trent','image_one',
        'image_two','image_three','status'
    ];
    public function categories(){
        return $this->belongsTo(Category::class,'category_id');
    }
    public function scategories(){
        return $this->belongsTo(Subcategory::class,'subcategory_id');
    }
    public function brand(){
        return $this->belongsTo(Brand::class,'brand_id');
    }
    public function order(){
        return $this->hasMany(OrderDetail::class);
    }
    
}
