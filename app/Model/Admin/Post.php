<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable=[
        'category_id','post_title','post_image','post_details'
    ];
    public function category(){
        return $this->belongsTo(Post_category::class,'category_id');
    }
}
