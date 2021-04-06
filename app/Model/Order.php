<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\OrderDetail;
use App\User;
class Order extends Model
{
    //
    // protected $primaryKey='stripe_order_id';
    protected $fillable = [
        'user_id','product_id','payment_id','paying_amount','balance_transection','stripe_order_id',
        'subtotal','shipping','vat','total','status','month','date','year','payment_type'
    ];
    public function orderdetails(){
        return $this->hasMany(OrderDetail::class,'order_id','stripe_order_id');
    }
    public function shippingDet(){
        return $this->hasOne(Shipping::class,'order_id','stripe_order_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    
}
