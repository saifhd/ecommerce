<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Cart;
use Session;
use App\Model\Order;
use App\Model\Shipping;
use App\Model\OrderDetail;

class PaymentController extends Controller
{
    //
    public function payment(Request $request){
        // dd($request->all());
        // $payment=$request->payment;
        $data=array();
        $data['name']=$request->name;
        $data['phone']=$request->phone;
        $data['email']=$request->email;
        $data['address']=$request->address;
        $data['city']=$request->city;
        $data['payment']=$request->payment;
        // dd($data);
        if($request->payment == 'stripe'){
            return view('pages.payment.stripe',compact('data'));
        }
        elseif($request->payment=='paypal'){

        }
        elseif($request->payment=='mollie'){

        }
        else{
            echo "cash";
        }
    }
    public function stripeCharge(Request $request){
        $user=Auth::id();
        // Set your secret key. Remember to switch to your live secret key in production!
        // See your keys here: https://dashboard.stripe.com/account/apikeys
        \Stripe\Stripe::setApiKey('sk_test_51GxHHTF72ZfWswJgnLKi63giCFvwydChqzUeleV6LEufMmVt1yTAq6kNicilfG06lxOjOYd8Ioa58rpyIwnYgKLF00j38jeH51');

        // Token is created using Checkout or Elements!
        // Get the payment token ID submitted by the form:
        $token = $_POST['stripeToken'];

        $charge = \Stripe\Charge::create([
        'amount' => $request->total*100,
        'currency' => 'usd',
        'description' => 'EEcommerce',
        'source' => $token,
        'metadata' => ['order_id' => uniqid()],
        ]);
        // dd($charge);
        $data=new Order();
        $data->user_id=Auth::id();
        $data->payment_id=$charge->payment_method;
        $data->paying_amount=$charge->amount;
        $data->balance_transection=$charge->balance_transaction;
        $data->stripe_order_id=$charge->metadata->order_id;
        if(Session::has('coupon')){
            $data->subtotal=Session::get('coupon')['balance'];
        }
        else{
            $data->subtotal=Cart::Subtotal();
        }
        
        $data->shipping=$request->shipping;
        $data->vat=$request->vat;
        if(Session::has('coupon')){
            $data->total=Session::get('coupon')['balance']+$request->shipping+Session::get('coupon')['balance']*$request->vat/100;
        }
        else{
            $data->total=$request->total;
        }
        
        $data->status=0;
        $data->month=date('F');
        $data->date=date('d-m-y');
        $data->year=date('Y');
        $data->payment_type=$request->payment;
        $data->status_code=mt_rand(100000,999999);
        

        $data->save();
        $order_id=$data->id;
        
       

        $shipping=new Shipping();
        $shipping->order_id=$charge->metadata->order_id;
        $shipping->ship_name=$request->ship_name;
        $shipping->ship_phone=$request->ship_phone;
        $shipping->ship_email=$request->ship_email;
        $shipping->ship_address=$request->ship_address;
        $shipping->ship_city=$request->ship_city;
        $shipping->save();
        
        $cart=Cart::content();
        foreach($cart as $row){
            $orderdetail=new OrderDetail();
            $orderdetail->order_id=$order_id;
            $orderdetail->product_id=$row->id;
            $orderdetail->product_name=$row->name;
            $orderdetail->product_color=$row->options->colour;
            $orderdetail->product_size=$row->options->size;
            $orderdetail->quantity=$row->qty;
            $orderdetail->single_price=$row->price;
            $orderdetail->total_price=$row->qty*$row->price;
        
            $orderdetail->save();
        }
        Cart::destroy();
        if(Session::has('coupon')){
            Session::forget();
        }
        $notification=array(
            'messege'=>'Order Processed Successfully Done',
            'alert-type'=>'success'
             );
           return Redirect()->route('index')->with($notification);


        


    }
    public function successList(){
        $order=Order::where('user_id',Auth::id())->where('status',3)->orderBy('id','DESC')->get();
        return view('pages.return_order',compact('order'));
    }

    public function returnRequest($id){
        $order=Order::find($id);
        $order->return_order=1;
        $order->update();
        $notification=array(
            'messege'=>'Order Returned Request Successfully Done',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);
    }
}
