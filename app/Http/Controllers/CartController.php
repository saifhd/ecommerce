<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Admin\Product;
use Cart;
use Response;
use Auth;
use App\Model\Wishlist;
use App\Model\Admin\Coupon;
use Session;

class CartController extends Controller
{
    //
    public function addCart($id){
        $product=Product::where('id',$id)->first();
        $data=array();
        if($product->discount_price==NULL){
            $data['id']=$product->id;
            $data['name']=$product->product_name;
            $data['qty']=1;
            $data['price']=$product->selling_price;
            $data['weight']=1;
            $data['options']['image']=$product->image_one;
            $data['options']['colour']='';
            $data['options']['size']='';
            Cart::add($data);

            return \Response::json(['success'=>'Product Successfully Added on Cart']);
        }
        else{
            $data['id']=$product->id;
            $data['name']=$product->product_name;
            $data['qty']=1;
            $data['price']=$product->discount_price;
            $data['weight']=1;
            $data['options']['image']=$product->image_one;
            $data['options']['colour']='';
            $data['options']['size']='';
            Cart::add($data);

            return \Response::json(['success'=>'Product Successfully Added on Cart']);
        }
    }
    public function showCart(){
        $cart=Cart::content();
        return view('pages.cart',compact('cart'));
    }

    public function removeCart($id){
        Cart::remove($id);
        $notification=array(
            'messege'=>'Product removed from Cart succesfully',
            'alert-type'=>'success'
            );
        return Redirect()->back()->with($notification);

    }

    public function updateCartItem(Request $request){
        $id=$request->productId;
        $qty=$request->qty;
        Cart::update($id,$qty);
        $notification=array(
            'messege'=>'Product Quantity Updated',
            'alert-type'=>'success'
            );
        return Redirect()->back()->with($notification);

    }
    public function viewmodalproduct($id){
        $product=Product::find($id);
        $size=$product->product_size;
        $product_size=explode(',',$size);

        $colour=$product->product_colour;
        $product_colour=explode(',',$colour);
        $brand=$product->brand->brand_name;
        $cat=$product->categories->category_name;
        $scat=$product->scategories->subcategory_name;

        return response::json(array('product'=>$product,'color'=>$product_colour,'size'=>$product_size,'brand'=>$brand,
    'cat'=>$cat,'scat'=>$scat));

    }
    public function insertintocart(Request $request){
        // dd($request->all());
        $id=$request->product_id;
        $product=Product::find($id);
        $color=$request->color;
        $size=$request->size;
        $qty=$request->qty;
        $data=array();
        if($product->discount_price==NULL){
            $data['id']=$product->id;
            $data['name']=$product->product_name;
            $data['qty']=$qty;
            $data['price']=$product->selling_price;
            $data['weight']=1;
            $data['options']['image']=$product->image_one;
            $data['options']['colour']=$color;
            $data['options']['size']=$size;
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
            $data['qty']=$qty;
            $data['price']=$product->discount_price;
            $data['weight']=1;
            $data['options']['image']=$product->image_one;
            $data['options']['colour']=$color;
            $data['options']['size']=$size;
            Cart::add($data);

            $notification=array(
                'messege'=>'Product added succesfully',
                'alert-type'=>'success'
                );
            return Redirect()->back()->with($notification);
        }
    }

    public function check(){
        $content=Cart::content();
        dd($content);
    }
    public function checkout(){

        if(Auth::check()){
            $cart=Cart::content();
            return view('pages.checkout',compact('cart'));
        }
        else{
            $notification=array(
                'messege'=>'At First Login Your Account',
                'alert-type'=>'success'
                );
            return Redirect()->route('login')->with($notification);
        }
    }

    public function wishlist(){
        $userid=Auth::id();
        // dd($userid);
        $product=Wishlist::where('user_id',$userid)->get();
        // dd($product);
        // foreach($product as $pr){
        //     echo $pr->products1->product_name;
        // }
        return view('pages.wishlist',compact('product'));
        
    }
    public function coupon(Request $request){
        $coupon=$request->coupon;
        // dd($coupon);
        $check=Coupon::where('coupon',$coupon)->first();
        if($check){
            SESSION::put('coupon',[
                'name'=>$check->coupon,
                'discount'=>$check->discount,
                'balance'=>Cart::Subtotal()-$check->discount
            ]);
            $notification=array(
                'messege'=>'Successfully Coupon Applied',
                'alert-type'=>'success'
                );
            return Redirect()->back()->with($notification);
            
        }
        else{
            $notification=array(
                'messege'=>'Invalid Coupon',
                'alert-type'=>'danger'
                );
            return Redirect()->back()->with($notification);
            
        }
    }
    public function removecoupon(){
        Session::forget('coupon');
        $notification=array(
            'messege'=>'Coupon Removed Successfully',
            'alert-type'=>'success'
            );
        return Redirect()->back()->with($notification);
    }
    public function paymentpage(){
        $cart=Cart::content();
        return view('pages.payment',compact('cart'));
    }
}
