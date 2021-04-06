<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Admin\Post;

class BlogController extends Controller
{
    //
    public function blog(){
        $post=Post::all();
        return view('pages.blog',compact('post'));
    }
    public function singleblog($id){
        $post=Post::where('id',$id)->first();
        return view('pages.viewpost',compact('post'));
    }
}
