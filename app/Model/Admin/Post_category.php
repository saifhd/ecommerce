<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Post_category extends Model
{
    //
    protected $fillable=[
        'category_name'
    ];
    public function post(){
        return $this->hasMany(Post::class);
    }
}
