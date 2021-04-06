<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Order;
use App\Model\Admin\Product;
use App\Model\OrderDetail;

class ReturnController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function request(){
        $order=Order::where('return_order',1)->get();
        
        return view('admin.return.return_request',compact('order'));
    }
    public function aprove($id){
        $product=OrderDetail::where('order_id',$id)->get();
        // dd($product);
        foreach($product as $row){
            $order_product=Product::find($row->product_id);
            $qty=$order_product->product_quantity;
            
            $order_product->product_quantity=$qty+$row->quantity;
            $order_product->update();
        }

        $order=Order::find($id);
        $order->return_order=2;
        $order->status=5;
        $order->update();
        $notification=array(
            'messege'=>'Product Returned Successfully',
            'alert-type'=>'success'
            );
        return Redirect()->back()->with($notification);
    }
    public function allRequest(){
        $order=Order::where('return_order',2)->get();
        return view('admin.return.all_request',compact('order'));
    }
}
