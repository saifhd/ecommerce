<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    //
    protected $table = 'coupons';
    protected $fillable = [
        'discount', 'coupon'
    ];
}
