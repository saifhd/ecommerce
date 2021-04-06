<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Model\Admin\Coupon;

use  App\Model\Admin\Newsletter;
class CouponController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function coupon()
    {
         $coupons=Coupon::all();
         return view('admin.coupon.coupon',compact('coupons'));
    }
    public function storecoupon(Request $request)
    {
        $validateData=$request->validate([
            'coupon'=>'required|unique:coupon|max:55',
            'discount'=>'required|integer'
        ]);
        $coupon=new Coupon();
        $coupon->coupon=$request->coupon;
        $coupon->discount=$request->discount;
        $coupon->save();
        $notification=array(
            'messege'=>'Coupon added succesfully',
            'alert-type'=>'success'
             );
         return Redirect()->back()->with($notification);
    }
    public function deletecoupon($id){
        $coupon=Coupon::find($id);
        $coupon->delete();
        $notification=array(
            'messege'=>'Coupon deleted succesfully',
            'alert-type'=>'success'
             );
         return Redirect()->back()->with($notification);
    }
    public function editcoupon($id)
    {
        $coupon=Coupon::where('id',$id)->first();
        // echo $category->category_name;
        return view('admin.coupon.edit',compact('coupon'));

    }
    public function updatecoupon($id,Request $request){
        $validateData=$request->validate([
            'coupon'=>'required|unique:coupons|max:55',
            'discount'=>'required|integer'
        ]);
        $coupon=Coupon::where('id',$id)->first();
        $coupon->coupon=$request->coupon;
        $coupon->discount=$request->discount;
        $coupon->update();
        $notification=array(
            'messege'=>'Coupon updated succesfully',
            'alert-type'=>'success'
             );
        return Redirect()->route('admin.coupon')->with($notification);
    }
    public function newsletter()
    {
         $newsletters=Newsletter::all();
         return view('admin.coupon.newsletter',compact('newsletters'));
    }
    
    public function deletenewsletter($id){
        $newsletter=Newsletter::find($id);
        $newsletter->delete();
        $notification=array(
            'messege'=>'Newsletter Deleted succesfully',
            'alert-type'=>'success'
             );
         return Redirect()->back()->with($notification);
    }
}
