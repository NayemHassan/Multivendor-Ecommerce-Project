<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use Carbon\Carbon;
class CouponController extends Controller
{
    public function AllCouponView(){
        $coupon = Coupon::latest()->get();
        return view('backend.coupon.all_coupon',compact('coupon'));
    }//End Method
    public function AddCoupon(){
        return view('backend.coupon.add_coupon');
    }//End Method
    public function StoreCoupon(Request $request){
        Coupon::insert([
           'coupon_name' => strtoupper($request->coupon_name),
           'coupon_discount' => $request->coupon_discount,
           'coupon_validity' => $request->coupon_validity,
           'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' =>'Coupon Created Successfully ',
            'alert-type'=> 'info'
         );
        return redirect()->route('all.coupon')->with($notification);
    }//End Method
    public function EditCoupon($id){
        $eCoupon = Coupon::findOrFail($id);
        return view('backend.coupon.edit_coupon',compact('eCoupon'));
        
    }//

   public function UpdateCoupon(Request $request){
    $coupon_id = $request->coupon_id;
    Coupon::findOrfail($coupon_id)->update([
        'coupon_name' => strtoupper($request->coupon_name),
        'coupon_discount' => $request->coupon_discount,
        'coupon_validity' => $request->coupon_validity,
        'created_at' => Carbon::now(),
     ]);
     $notification = array(
         'message' =>'Coupon Updated Successfully ',
         'alert-type'=> 'info'
      );
     return redirect()->route('all.coupon')->with($notification);
   }//End Method
   public function DeleteCoupon($id){
    Coupon::findOrFail($id)->delete();
    $notification = array(
        'message' =>'Coupon Deleted Successfully ',
        'alert-type'=> 'info'
     );
    return redirect()->route('all.coupon')->with($notification);
   }//End Method

}
