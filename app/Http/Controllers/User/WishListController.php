<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Carbon\Carbon;
class WishListController extends Controller
{
    public function AddToWishList(Request $request, $product_id){

        if(Auth::check()){
      $exists = Wishlist::where('user_id',Auth::id())->where('product_id',$product_id)->first();

            if(!$exists){
               Wishlist::insert([
                'user_id' => Auth::id(),
                'product_id' => $product_id,
                'created_at' => Carbon::now(),

               ]);
               return response()->json(['success' => 'Successfully Added On Your Wishlist' ]);
            } else{
                return response()->json(['error' => 'This Product Has Already on Your Wishlist' ]);

            }

        }else{
            return response()->json(['error' => 'At First Login Your Account' ]);
        }

    } // End Method

public function WishListView(){
    return view('frontend.wishlist.wishlist');
}//End Method
public function WishDataView(){
    $wishlist = Wishlist::with('product')->where('user_id',Auth::id())->latest()->get();
    $wishlistQty = Wishlist::count();
    return response()->json([
        'wishlist' => $wishlist,
        'wishlistQty' => $wishlistQty,
    ]);
}//End Method
public function WishlistRemove($id){
  Wishlist::where('user_id',Auth::id())->where('id',$id)->delete();

  return response()->json(['success' => 'Successfully Wishlist Deleted' ]);

}









}
