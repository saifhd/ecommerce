<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin\Category;

class CategoryController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function category(){
        $categories=category::all();
        return view('admin.category.category',compact('categories'));
    }
    public function storecategory(Request $request)
    {
        $validateData=$request->validate([
            'category_Name'=>'required|unique:categories|max:255',
        ]);
        $category=new Category();
        $category->category_name=$request->category_Name;
        $category->save();
        $notification=array(
            'messege'=>'Category added succesfully',
            'alert-type'=>'success'
             );
         return Redirect()->back()->with($notification);

        
    }
    public function deletecategory($id){
        $category=Category::find($id);
        $category->delete();
        $notification=array(
            'messege'=>'Category deleted succesfully',
            'alert-type'=>'success'
             );
         return Redirect()->back()->with($notification);
    }
    public function editcategory($id)
    {
        $category=Category::where('id',$id)->first();
        // echo $category->category_name;
        return view('admin.category.edit',compact('category'));

    }
    public function updatecategory($id,Request $request){
        $validateData=$request->validate([
            'category_name'=>'required|unique:categories|max:255',
        ]);
        $category=Category::where('id',$id)->first();
        $category->category_name=$request->category_name;
        $category->update();
        $notification=array(
            'messege'=>'Category updated succesfully',
            'alert-type'=>'success'
             );
        return Redirect()->route('categories')->with($notification);
    }
}
