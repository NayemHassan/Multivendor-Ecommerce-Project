<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShipDivision;
use App\Models\ShipDistricts;
use App\Models\ShipState;
use Gloudemans\Shoppingcart\facades\Cart;
class CheckoutController extends Controller
{
    public function Shippingdistricts($division_id){
        $districts =ShipDistricts::where('division_id',$division_id)->orderBy('distrits_name','ASC')->get();
        return json_encode($districts);
    }//End Method
    public function ShippingState($district_id){
        $state =ShipState::where('districts_id',$district_id)->orderBy('state_name','ASC')->get();
        return json_encode($state);
    }//End Method
    public function StoreCheckout(Request $request){
      $data = array();
      $data['shipping_name'] = $request->shipping_name;
      $data['shipping_email'] = $request->shipping_email;
      $data['shipping_phone'] = $request->shipping_phone;
      $data['shipping_post_code'] = $request->shipping_post_code;   
      $data['division_id'] = $request->division_id;
      $data['district_id'] = $request->district_id;
      $data['state_id'] = $request->state_id;
      $data['shipping_address'] = $request->shipping_address;
      $data['additional_info'] = $request->additional_info;
      $cartTotal =Cart::total();
       if($request->payment == 'stripe'){
        return view('frontend.payment.stripe',compact('data','cartTotal'));
       }else if($request->payment == 'onlineCash'){
        return 'Online Payment';
       }else{
            return view('frontend.payment.cash',compact('data','cartTotal'));
       }
    }//End Method

}//End Controller
