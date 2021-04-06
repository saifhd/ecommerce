<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    //
    protected $fillable = [
        'subcategory_name','category_id'
    ];
    public function categories(){
        return $this->belongsTo('App\Model\Admin\Category','category_id');
    }
    public function prod(){
        return $this->hasMany(Product::class);
    }
}
