<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Admin\Product;

class Wishlist extends Model
{
    //
    protected $fillable = [
        'user_id','product_id'
    ];
    public function products1(){
        return $this->hasOne(Product::class,'id');
    }
}
