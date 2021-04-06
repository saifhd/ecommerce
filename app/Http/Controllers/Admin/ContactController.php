<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Contact;

class ContactController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function allContact(){
        $contact=Contact::all();
        return view('admin.contact.all_contact',compact('contact'));
    }
    public function readed($id){
        $contact=Contact::find($id);
        $contact->status=1;
        $contact->update();
        // dd($contact);
        return view('admin.contact.contact_view',compact('contact'));
        // $notification=array(
        //     'messege'=>'Message Readed succesfully',
        //     'alert-type'=>'success'
        //     );
        // return Redirect()->back()->with($notification);
    }
}
