<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin\Post_category;
use App\Model\Admin\Post;
use Image;

class PostController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function BlogCatList(){
        $categories=Post_category::all();
        return view('admin.blog.category.index',compact('categories'));
    }
    public function storeCategory(Request $request){
        $category=new Post_category();
        $category->category_name=$request->category_name;
        $category->save();
        $notification=array(
            'messege'=>'Blog Category added succesfully',
            'alert-type'=>'success'
            );
        return Redirect()->back()->with($notification);

    }
    public function deleteCategory($id){
        $category=Post_category::find($id);
        $category->delete();
        $notification=array(
            'messege'=>'Blog Category Deleted succesfully',
            'alert-type'=>'success'
            );
        return Redirect()->back()->with($notification);

    }
    public function editCategory($id){
        $category=Post_category::find($id);
        return view('admin.blog.category.edit',compact('category'));
    }
    public function updateCategory($id,Request $request){
        // dd($request->all());
        $category=Post_category::find($id);
        $category->category_name=$request->category_name;
        $category->update();
        $notification=array(
            'messege'=>'Blog Category Updated succesfully',
            'alert-type'=>'success'
            );
        return Redirect()->route('add.blog.categorylist')->with($notification);

    }
    public function createPost(){
        $categories=Post_category::all();
        return view('admin.blog.create',compact('categories'));
    }
    public function storePost(Request $request){
        // dd($request->all());
        $post=new Post();
        $post->post_title=$request->post_title;
        $post->post_details=$request->post_details;
        $post->category_id=$request->category_id;
        $image=$request->file('post_image');
        if($image){
            $image_name=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            
            Image::make($image)->resize(300,300)->save('public/media/BlogPost/'.$image_name);
            $post->post_image='public/media/BlogPost/'.$image_name;
        }
        else{
            $post->post_image='';
        }
            
        $post->save();
            $notification=array(
                'messege'=>'Blog Post added succesfully',
                'alert-type'=>'success'
                );
            return Redirect()->route('all.blog.post')->with($notification);
    }
    public function blogPostList(){
        $posts=Post::all();
        return view('admin.blog.index',compact('posts'));

        
    }
    public function deletePost($id){
        $post=Post::find($id);
        unlink($post->post_image);
        $post->delete();
        $notification=array(
            'messege'=>'Blog Post Deleted succesfully',
            'alert-type'=>'success'
            );
        return Redirect()->back()->with($notification);


    }
    public function editPost($id){
        $post=Post::find($id);
        $categories=Post_category::all();
        return view('admin.blog.edit',compact('post','categories'));

    }
    public function updatePost($id,Request $request){
        $post=Post::find($id);
        $post->category_id=$request->category_id;
        $post->post_title=$request->post_title;
        $post->post_details=$request->post_details;
        $image=$request->file('post_image');
        if($image){
            unlink($post->post_image);
            $image_name=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            
            Image::make($image)->resize(300,300)->save('public/media/BlogPost/'.$image_name);
            $post->post_image='public/media/BlogPost/'.$image_name;
        }
        $post->update();
        $notification=array(
            'messege'=>'Blog Post Updated succesfully',
            'alert-type'=>'success'
            );
        return Redirect()->route('all.blog.post')->with($notification);
    }
}
