<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin\Product;
use App\Model\Admin\Category;
use App\Model\Admin\Subcategory;
use App\Model\Admin\Brand;
use Image;

class ProductController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $product=Product::all();
        return view('admin.product.index',compact('product'));

    }
    public function create(){
        $categories=Category::all();

        $brands=Brand::all();
        return view('admin.product.create',compact('categories','brands'));
    }
    public function GetSubcat($category_id){
        $cats=Subcategory::all()->where('category_id',$category_id);
        return json_encode($cats);

    }
    public function store(Request $request){
        $product=new Product();
        $product->product_name=$request->product_name;
        $product->product_code=$request->product_code;
        $product->product_quantity=$request->product_quantity;
        $product->category_id=$request->category_id;
        $product->subcategory_id=$request->subcategory_id;
        $product->brand_id=$request->brand_id;
        $product->discount_price=$request->discount_price;
        $product->product_size=$request->product_size;
        $product->product_colour=$request->product_colour;
        $product->selling_price=$request->selling_price;
        $product->product_detail=$request->product_detail;
        $product->video_link=$request->video_link;

        $product->main_slider=$request->main_slider;
        $product->hot_deal=$request->hot_deal;
        $product->best_seller=$request->best_seller;
        $product->trent=$request->trent;
        $product->mid_slider=$request->mid_slider;
        $product->hot_new=$request->hot_new;
        $product->buyone_getone=$request->buyone_getone;
        $product->status=1;
        
        $image_one=$request->file('image_one');

        $image_two=$request->file('image_two');

        $image_three=$request->file('image_three');
        
        
        
        if($image_one && $image_two && $image_three){
            
            
            $image_one_name=hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
            
            Image::make($image_one)->resize(300,300)->save('public/media/product/'.$image_one_name);
            $product->image_one='public/media/product/'.$image_one_name;
            
            
            $image_two_name=hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
            // dd($image_three);
            Image::make($image_two)->resize(300,300)->save('public/media/product/'.$image_two_name);
            $product->image_two='public/media/product/'.$image_two_name;

            
            $image_three_name=hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
            Image::make($image_three)->resize(300,300)->save('public/media/product/'.$image_three_name);
            $product->image_three='public/media/product/'.$image_three_name;
        }
        //  dd($product);
        $product->save();
        $notification=array(
            'messege'=>'Product added succesfully',
            'alert-type'=>'success'
            );
        return Redirect()->back()->with($notification);
        
    }

    public function inactive($id){
        $product=Product::find($id);
        $product->status=0;
        $product->update();
        $notification=array(
            'messege'=>'Product Deactivated succesfully',
            'alert-type'=>'success'
            );
        return Redirect()->back()->with($notification);
    }
    public function active($id){
        $product=Product::find($id);
        $product->status=1;
        $product->update();
        $notification=array(
            'messege'=>'Product Activated succesfully',
            'alert-type'=>'success'
            );
        return Redirect()->back()->with($notification);
    }
    public function delete($id){
        $product=Product::find($id);
        $image1=$product->image_one;
        $image2=$product->image_two;
        $image3=$product->image_three;
        // dd($product);
        unlink($image1);
        unlink($image2);
        unlink($image3);
        
        $product->delete();
        $notification=array(
            'messege'=>'Product Deleted succesfully',
            'alert-type'=>'success'
            );
        return Redirect()->back()->with($notification);
    }
    public function show($id){
        $product=Product::find($id);
        // dd($product);
        return view('admin.product.show',compact('product'));
    }
    public function editproduct($id){
        $product=Product::find($id);
        return view('admin.product.edit',compact('product'));
    }
    public function update($id,Request $request){
        $product=Product::find($id);
        // dd($request->all());
        $product->product_name=$request->product_name;
        $product->product_code=$request->product_code;
        $product->product_quantity=$request->product_quantity;
        $product->category_id=$request->category_id;
        $product->subcategory_id=$request->subcategory_id;
        $product->brand_id=$request->brand_id;

        $product->product_size=$request->product_size;
        $product->product_colour=$request->product_colour;
        $product->selling_price=$request->selling_price;
        $product->product_detail=$request->product_detail;
        $product->video_link=$request->video_link;

        $product->main_slider=$request->main_slider;
        $product->hot_deal=$request->hot_deal;
        $product->best_seller=$request->best_seller;
        $product->trent=$request->trent;
        $product->mid_slider=$request->mid_slider;
        $product->hot_new=$request->hot_new;
        $product->buyone_getone=$request->buyone_getone;
        $product->status=1;
        $product->update();
        $notification=array(
            'messege'=>'Product Updated succesfully',
            'alert-type'=>'success'
            );
        return Redirect()->back()->with($notification);
    }
    public function updateimage($id,Request $request){
        $product=Product::find($id);
        $image_one=$request->file('image_one');

        $image_two=$request->file('image_two');

        $image_three=$request->file('image_three');
        if($image_one){
            $image_one_name=hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
            
            Image::make($image_one)->resize(300,300)->save('public/media/product/'.$image_one_name);
            $product->image_one='public/media/product/'.$image_one_name;

        }
        if($image_two){
            $image_two_name=hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
            
            Image::make($image_two)->resize(300,300)->save('public/media/product/'.$image_two_name);
            $product->image_two='public/media/product/'.$image_two_name;

        }
        if($image_three){
            $image_three_name=hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
            
            Image::make($image_three)->resize(300,300)->save('public/media/product/'.$image_three_name);
            $product->image_three='public/media/product/'.$image_three_name;

        }
        $product->update();
        $notification=array(
            'messege'=>'Product Image Updated succesfully',
            'alert-type'=>'success'
            );
        return Redirect()->back()->with($notification);
    }
}
