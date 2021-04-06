<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin\Site_Setting;
use Image;
class SettingController extends Controller
{
    //middleware
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function siteSetting(){
        $setting=Site_Setting::all()->first();
        // dd($setting);
        return view('admin.setting.site_setting',compact('setting'));
    }
    public function updateSetting($id,Request $request){
        $setting=Site_Setting::find($id);
        $setting->phone1=$request->phone1;
        $setting->phone2=$request->phone2;
        $setting->email=$request->email;
        $setting->company_name=$request->company_name;
        $setting->company_address=$request->company_address;
        $setting->facebook=$request->facebook;
        $setting->instagram=$request->instagram;
        $setting->twitter=$request->twitter;
        $setting->youtube=$request->youtube;

        $image_two=$request->file('image_two');

        
        
        
        if($image_two){
            
            
            
            
            $image_two_name=hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
            // dd($image_three);
            Image::make($image_two)->resize(300,300)->save('public/media/logo/'.$image_two_name);
            $setting->logo='public/media/logo/'.$image_two_name;

            
            
        }


        $setting->update();
        $notification=array(
            'messege'=>'Site Settings Updated succesfully',
            'alert-type'=>'success'
            );
        return Redirect()->back()->with($notification);
        

    }
}
