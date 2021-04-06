<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Admin\Product;
use Cart;
use App\Model\Admin\Subcategory;
use App\Model\Admin\Category;
use App\Model\Admin\Brand;

class ProDetController extends Controller
{
    //
    public function productDetails($id){
        $product=Product::where('id',$id)->first();
        // dd($product);
        $colour=$product->product_colour;
        $product_colour=explode(',',$colour);
        $size=$product->product_size;
        $product_size=explode(',',$size);

        $colour=$product->product_colour;
        $product_colour=explode(',',$colour);

        return view('pages.product_details',compact('product','product_colour','product_size'));
    }

    public function addProductCart($id,Request $request){
        $product=Product::where('id',$id)->get();
        // dd($request->all());
        $data=array();
        if($product->discount_price==NULL){
            $data['id']=$product->id;
            $data['name']=$product->product_name;
            $data['qty']=$request->qty;
            $data['price']=$product->selling_price;
            $data['weight']=1;
            $data['options']['image']=$product->image_one;
            $data['options']['colour']=$request->colour;
            $data['options']['size']=$request->size;
            // dd($data);
            Cart::add($data);

            $notification=array(
                'messege'=>'Product added succesfully',
                'alert-type'=>'success'
                );
            return Redirect()->back()->with($notification);
        }
        else{
            $data['id']=$product->id;
            $data['name']=$product->product_name;
            $data['qty']=$request->qty;
            $data['price']=$product->discount_price;
            $data['weight']=1;
            $data['options']['image']=$product->image_one;
            $data['options']['colour']=$request->colour;
            $data['options']['size']=$request->size;
            // dd($data);
            Cart::add($data);

            $notification=array(
                'messege'=>'Product added succesfully',
                'alert-type'=>'success'
                );
            return Redirect()->back()->with($notification);
        }
    }
    public function productview($id){
        $product=Product::where('subcategory_id',$id)->paginate(10);
        $scategory=Subcategory::where('id',$id)->first();
        $scat=$scategory->subcategory_name;
        return view('pages.subcategory',compact('product','scat'));
    }
    public function productcategoryview($id){
        $product=Product::where('category_id',$id)->paginate(10);
        $category=Category::where('id',$id)->first();
        $scat=$category->category_name;
        // dd($scat);
        return view('pages.subcategory',compact('product','scat'));
        
    }
    public function productbrandview($id){
        $product=Product::where('brand_id',$id)->paginate(10);
        $brand=Brand::where('id',$id)->first();
        // dd($brand);
        $scat=$brand->brand_name;
        // dd($scat);
        return view('pages.subcategory',compact('product','scat'));
    }
}
