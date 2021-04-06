<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Order;
use App\Model\Admin\Product;
use App\Model\OrderDetail;
use App\Model\Admin\Seo;
use Image;
use App\Admin;
use Auth;

class OrderController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function neworder(){
        $orders=Order::where('status',0)->get();
        // dd($order);
        return view('admin.order.pending',compact('orders'));
    }

    public function vieworder($id){
        $order=Order::where('id',$id)->first();
        // dd($order->orderdetails);
        return view('admin.order.view_order',compact('order'));
    }
    public function orderaccept($id){
        $order=Order::where('id',$id)->first();
        $order->status=1;
        $order->update();
        $notification=array(
            'messege'=>'Payment Accepted Successfully',
            'alert-type'=>'success'
            );
        return Redirect()->route('admin.neworder')->with($notification);

    }

    public function ordercancel($id){
        

        $order=Order::where('id',$id)->first();
        $order->status=5;
        $order->update();
        $notification=array(
            'messege'=>'Order Cancelled Successfully',
            'alert-type'=>'success'
            );
        return Redirect()->route('admin.neworder')->with($notification);

    }


    public function orderprogress($id){
        $order=Order::where('id',$id)->first();
        $order->status=2;
        $order->update();
        $notification=array(
            'messege'=>'Order Cancelled Successfully',
            'alert-type'=>'success'
            );
        return Redirect()->route('admin.neworder')->with($notification);

    }
    public function orderdelevered($id){
        
        $product=OrderDetail::where('order_id',$id)->get();
        // dd($product);
        foreach($product as $row){
            $order_product=Product::find($row->product_id);
            $qty=$order_product->product_quantity;
            
            $order_product->product_quantity=$qty-$row->quantity;
            $order_product->update();
        }

        $order=Order::where('id',$id)->first();
        $order->status=3;
        $order->update();
        $notification=array(
            'messege'=>'Order Cancelled Successfully',
            'alert-type'=>'success'
            );
        return Redirect()->route('admin.neworder')->with($notification);

    }


    public function acceptpayment(){
        $orders=Order::where('status',1)->get();
        // dd($orders);
        // dd($orders);
        return view('admin.order.acceptpayment',compact('orders'));

    }
    public function deleverypayment(){
        $orders=Order::where('status',3)->get();
        // dd($orders);
        // dd($orders);
        return view('admin.order.deleverypayment',compact('orders'));

    }
    public function processpayment(){
        $orders=Order::where('status',2)->get();
        // dd($orders);
        // dd($orders);
        return view('admin.order.processpayment',compact('orders'));

    }
    public function cancelpayment(){
        $orders=Order::where('status',5)->get();
        // dd($orders);
        // dd($orders);
        return view('admin.order.cancelpayment',compact('orders'));

    }

    public function seo(){
        $seo=Seo::all()->first();
        // dd($seo);gg
        return view('admin.coupon.seo',compact('seo'));

    }
    public function updateseo(Request $request){
        $id=$request->id;
        $seo=Seo::find($id);
        // dd($request->all());
        // $seo->id=$id;
        $seo->meta_title=$request->meta_title;
        $seo->meta_author=$request->meta_author;
        $seo->meta_tag=$request->meta_tag;
        $seo->meta_describtion=$request->meta_description;
        $seo->google_analytics=$request->google_analytics;
        $seo->bing_analytics=$request->bing_analytics;
        
        // $seo->update();
        $notification=array(
            'messege'=>'SEO Settings Updated Successfully',
            'alert-type'=>'success'
            );
        return Redirect()->back()->with($notification);


    }
    
}
