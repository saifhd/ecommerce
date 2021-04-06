<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin;
use App\Model\Admin\Product;
use Hash;
use Image;

class UserRoleController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function alluser(){
        $user=Admin::where('type',2)->get();
        return view('admin.role.alluser',compact('user'));

    }
    public function editAdmin($id){
        $admin=Admin::find($id);
        return view('admin.role.edit_role',compact('admin'));

    }
    public function deleteAdmin($id){
        $admin=Admin::find($id);
        $admin->delete();
        $notification=array(
            'messege'=>'Child Admin Deleted succesfully',
            'alert-type'=>'success'
            );
        return Redirect()->route('admin.all.user')->with($notification);

    }
    public function createAdmin(){
        return view('admin.role.create_role');
    }
    public function storeRole(Request $request){
        $admin=new Admin();
        $admin->name=$request->name;
        $admin->phone=$request->phone;
        $admin->password=Hash::make($request->password);
        $admin->email=$request->email;

        $admin->category=$request->category;
        $admin->coupon=$request->coupon;
        $admin->product=$request->product;
        $admin->blog=$request->blog;
        $admin->order_pro=$request->order_pro;
        $admin->other=$request->other;
        $admin->report=$request->report;
        $admin->role=$request->role;
        $admin->return_pro=$request->return_pro;
        
        $admin->comment=$request->comment;
        $admin->setting=$request->setting;
        $admin->contact=$request->contact;
        $admin->stock=$request->stock;
        $admin->type=2;

        $admin->save();
        $notification=array(
            'messege'=>'Child Admin Inserted succesfully',
            'alert-type'=>'success'
            );
        return Redirect()->route('admin.all.user')->with($notification);
        
    }
    public function updateRole($id,Request $request){
        $admin=Admin::find($id);

        $admin->name=$request->name;
        $admin->phone=$request->phone;
        if($request->password){
            $admin->password=Hash::make($request->password);
        }
        
        $admin->email=$request->email;

        $admin->category=$request->category;
        $admin->coupon=$request->coupon;
        $admin->product=$request->product;
        $admin->blog=$request->blog;
        $admin->order_pro=$request->order_pro;
        $admin->other=$request->other;
        $admin->report=$request->report;
        $admin->role=$request->role;
        $admin->return_pro=$request->return_pro;
        
        $admin->comment=$request->comment;
        $admin->setting=$request->setting;
        $admin->contact=$request->contact;
        $admin->stock=$request->stock;
        $admin->type=2;

        $admin->update();
        $notification=array(
            'messege'=>'Child Admin Updated succesfully',
            'alert-type'=>'success'
            );
        return Redirect()->route('admin.all.user')->with($notification);

    }
    public function productStock(){
        $product=Product::all();
        return view('admin.stock.product_stock',compact('product'));
    }
    public function editAdminProfile($id){
        $admin=Admin::findOrFail($id);
        // dd($id);
        // dd($admin);
        return view('admin.role.edit_admin',compact('admin'));
    }
    public function updateAdminProfile($id,Request $request){
        $admin=Admin::find($id);
        // dd($admin);
        $admin->name=$request->name;
        if($request->email){
            $admin->email=$request->email;
        }
        
        $admin->phone=$request->phone;
        if($request->password){
            $admin->password=Hash::make($request->password);
        }
        


        $image_one=$request->file('image_one');

        
        
        
        
        if($image_one){
            
            
            $image_one_name=hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
            
            Image::make($image_one)->resize(300,300)->save('public/media/Profile_Images/'.$image_one_name);
            $admin->avatar='public/media/Profile_Images/'.$image_one_name;
            
            
           
        }

        // dd($admin);
        $admin->update();
        $notification=array(
            'messege'=>'Your Profile succesfully',
            'alert-type'=>'success'
            );
        return Redirect()->back()->with($notification);

        
    }
}
