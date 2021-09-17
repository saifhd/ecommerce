<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Model\Admin\Newsletter;
use  App\Model\Order;
use  App\Model\Admin\Site_Setting;
use App\Model\Contact;
use App\Model\Admin\Product;
use App\User;
use Auth;
// use Image;
use Intervention\Image\Facades\Image;

class FrontController extends Controller
{
    //

    public function storenewsletter(Request $request)
    {
        $validateData=$request->validate([
            'email'=>'required|unique:newsletters|max:55',

        ]);
        // dd($request->all());
        $nl=new Newsletter();
        $nl->email=$request->email;

        $nl->save();
        $notification=array(
            'messege'=>'Thanks For Subscribing ',
            'alert-type'=>'success'
             );
         return Redirect()->back()->with($notification);
    }
    public function tracking(Request $request){
        $code=$request->status_code;
        $track=Order::where('status_code',$code)->first();
        // dd($order);
        if($track){
            return view('pages.tracking',compact('track'));

        }
        else{
            $notification=array(
                'messege'=>'Status Code Invalid ',
                'alert-type'=>'error'
                 );
             return Redirect()->back()->with($notification);
        }

    }
    public function contact(){
        $contact=Site_Setting::all()->first();
        return view('pages.contact',compact('contact'));

    }
    public function sendContact(Request $request){
        $contact=new Contact();
        $contact->name=$request->name;
        $contact->email=$request->email;
        $contact->phone=$request->phone;
        $contact->message=$request->message;
        $contact->save();
        $notification=array(
            'messege'=>'Thanx For Contacting Us ',
            'alert-type'=>'success'
             );
         return Redirect()->back()->with($notification);
    }

    public function search(Request $request){
        $item=$request->search;
        // dd($item);
        $search=Product::where('product_name','LIKE',"%$item%")->paginate(10);
        // dd($search);
        return view('pages.search_result',compact('search'));
    }
    public function editProfile(){
        $id=auth()->user()->id;
        $user=User::find($id);
        // dd($user);
        return view('pages.edit_profile',compact('user'));
    }
    public function updateProfile(Request $request){
        $id=auth()->user()->id;
        $user=User::find($id);
        $user->name=$request->name;
        $user->phone=$request->phone;
        $user->email=$request->email;
        $user->update();
        $notification=array(
            'messege'=>'Profile Details Updated Successfully',
            'alert-type'=>'success'
             );
         return Redirect()->back()->with($notification);
    }
    public function updateProfileImage(Request $request){
        $id=auth()->user()->id;
        $user=User::find($id);
        $image_one=$request->file('image_one');

        if($image_one){


            $image_one_name=hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();

            Image::make($image_one)->resize(300,300)->save('public/media/profile_Images/'.$image_one_name);
            $user->avatar='public/media/Profile_images/'.$image_one_name;



        }

        $user->update();
        $notification=array(
            'messege'=>'Profile Image Changed Successfully',
            'alert-type'=>'success'
             );
         return Redirect()->back()->with($notification);
    }
    public function productAll(){
        $product=Product::Paginate(20);
        // dd($product);
        return view('pages.product_all',compact('product'));
    }

    public function productFilterPrice(){
        $product=Product::orderBy('selling_price','ASC')->paginate(20);
        // dd($product);
        return view('pages.product_price',compact('product'));
    }
}
