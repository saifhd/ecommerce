<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Wishlist;
use Auth;

class WishlistController extends Controller
{
    //
    public function addWishlist($id){
        $userid=Auth::id();
        $check=Wishlist::where('user_id',$userid)->where('product_id',$id)->first();
        $wishlist=new Wishlist();
        $wishlist->user_id=$userid;
        $wishlist->product_id=$id;
        if(Auth::check()){
            if($check){
                return \Response::json(['error' => 'Product already Has On Wishlist']);
                    
            }
            else{
                $wishlist->save();
                return \Response::json(['success'=>'Product Added on Wishlist']);
            }
            

        }
        else{
            return \Response::json(['error'=>'At First Loging your Account']);
        }
    }
    
}
