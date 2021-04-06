<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    //
    protected $fillable = [
        'order_id','ship_name','ship_phone','ship_email','ship_address','ship_city'
    ];
}
