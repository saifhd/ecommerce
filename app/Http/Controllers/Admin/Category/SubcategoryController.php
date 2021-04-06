<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin\Subcategory;
use App\Model\Admin\Category;


class SubcategoryController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function subcategory(){
        $categories=Category::all();
        return view('admin.category.subcategory',compact('categories'));

    }
    public function storesubcategory(Request $request)
    {
        $validateData=$request->validate([
            'subcategory_name'=>'required|max:55',
        ]);
        $scategory=new Subcategory();
        $scategory->subcategory_name=$request->subcategory_name;
        $scategory->category_id=$request->category_id;
        $scategory->save();
        $notification=array(
            'messege'=>'Category added succesfully',
            'alert-type'=>'success'
             );
         return Redirect()->back()->with($notification);

        
    }
    public function deletesubcategory($id){
        $subcategory=subcategory::find($id);
        $subcategory->delete();
        $notification=array(
            'messege'=>'Category deleted succesfully',
            'alert-type'=>'success'
             );
         return Redirect()->back()->with($notification);
    }
    public function editsubcategory($id)
    {
        $subcategory=Subcategory::where('id',$id)->first();
        $category=Category::all();
        return view('admin.category.editsubcategory',compact('category','subcategory'));

    }
    public function updatesubcategory($id,Request $request){
        // $validateData=$request->validate([
        //     'subcategory_name'=>'required|max:55',
        // ]);
        // dd($request->all());
        $subcategory=Subcategory::where('id',$id)->first();
        $subcategory->subcategory_name=$request->subcategory_name;
        $subcategory->category_id=$request->category_id;
        $subcategory->update();
        $notification=array(
            'messege'=>'Category updated succesfully',
            'alert-type'=>'success'
             );
        return Redirect()->route('sub.category')->with($notification);
    }
}
