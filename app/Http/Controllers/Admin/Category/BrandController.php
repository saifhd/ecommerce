<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin\Brand;
class BrandController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function brand(){
        $brands=Brand::all();
        return view('admin.category.brand',compact('brands'));
    }
    public function storebrand(Request $request)
    {
        $validateData=$request->validate([
            'brand_name'=>'required|unique:brands|max:55',
        ]);
        $brand=new Brand();
        $brand->brand_name=$request->brand_name;
        $image=$request->file('brand_logo');
        // dd($image);
        
        
        if($image){
            $image_name=date('dmy_H_s_i');
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/media/brand/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);

            $brand->brand_logo=$image_url;
            $brand->save();
            $notification=array(
                'messege'=>'Brand added succesfully',
                'alert-type'=>'success'
                );
            return Redirect()->back()->with($notification);
        }
        else{
            $brand->save();
            $notification=array(
                'messege'=>'Brand added succesfully',
                'alert-type'=>'success'
                );
            return Redirect()->back()->with($notification);
        }
        

        

        
    }
    public function deletebrand($id){
        $brand=Brand::find($id);
        $image=$brand->brand_logo;
        unlink($image);
        $brand->delete();
        $notification=array(
            'messege'=>'Brand deleted succesfully',
            'alert-type'=>'success'
             );
         return Redirect()->back()->with($notification);
    }
    public function editbrand($id)
    {
        $brand=Brand::where('id',$id)->first();
        // echo $category->category_name;
        return view('admin.category.editbrand',compact('brand'));

    }
    public function updatebrand($id,Request $request){
        $validateData=$request->validate([
            'brand_name'=>'required|unique:brands|max:255',
        ]);
        $brand=Brand::where('id',$id)->first();
        $brand->brand_name=$request->brand_name;
        $image_old=$brand->brand_logo;
        $image=$request->file('brand_logo');
        // dd($image);
        if($image){
            unlink($image_old);
            $image_name=date('dmy_H_s_i');
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/media/brand/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);

            $brand->brand_logo=$image_url;
            $brand->update();
            $notification=array(
                'messege'=>'Brand Updated succesfully',
                'alert-type'=>'success'
                );
            return Redirect()->route('brands')->with($notification);
        }
        else{
            $brand->update();
            $notification=array(
                'messege'=>'Brand Updated succesfully',
                'alert-type'=>'success'
                );
            return Redirect()->route('brands')->with($notification);
        }
        
    }
}
