<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Admin\Product;


class OrderDetail extends Model
{
    //
    protected $fillable = [
        'order_id','product_id','product_name','product_color','product_size','quantity','single_price','total_price'
    ];
    public function product(){
        return $this->hasOne(Product::class,'id','product_id');
    }
}
