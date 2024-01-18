<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Coupon;
use App\Models\ShipDivision;
use App\Models\ShipDistricts;
use App\Models\ShipState;
use Gloudemans\Shoppingcart\facades\Cart;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

use Auth;
class CartController extends Controller
{
    public function AddToCart(Request $request,$id){
        $product = Product::findOrFail($id);
        
        if(Session::has('coupon')){
            Session::forget('coupon');
        }

        if( $product->discount_price == NULL){
            Cart::add([
                'id' =>$id,
                'name' =>$request->product_name,
                'qty' =>$request->quantity,
                'price' => $product->selling_price,
                'weight' => 1,

                'options' =>[
                    'image' =>$product->product_thumbnail,
                    'color' => $request->color,
                    'size' => $request->size,
                    'vendor' => $request->vendor,
                ],

            ]);
            return response()->json(['success' =>'Successfully Added On Your Cart']);
        }
        else{
            Cart::add([
                'id' =>$id,
                'name' =>$request->product_name,
                'qty' =>$request->quantity,
                'price' => $product->discount_price,
                'weight' => 1,

                'options' =>[
                   'image' =>$product->product_thumbnail,
                    'color' => $request->color,
                    'size' => $request->size,
                    'vendor' => $request->vendor,
                ],

            ]);
            return response()->json(['success' =>'Successfully Added On Your Cart']);
        }
   
    }
    //Details Add to Cart
    public function AddToCartdetails(Request $request,$id){
        $product = Product::findOrFail($id);
        if(Session::has('coupon')){
            Session::forget('coupon');
        }
        if( $product->discount_price == NULL){
            Cart::add([
                'id' =>$id,
                'name' =>$product->product_name,
                'qty' =>$request->quantity,
                'price' => $product->selling_price,
                'weight' => 1,

                'options' =>[
                    'image' =>$product->product_thumbnail,
                    'color' => $request->color,
                    'size' => $request->size,
                    'vendor' => $request->vendor,
                ],

            ]);
            return response()->json(['success' =>'Successfully Added On Your Cart']);
        }
        else{
            Cart::add([
                'id' =>$id,
                'name' =>$product->product_name,
                'qty' =>$request->quantity,
                'price' => $product->discount_price,
                'weight' => 1,

                'options' =>[
                   'image' =>$product->product_thumbnail,
                    'color' => $request->color,
                    'size' => $request->size,
                    'vendor' => $request->vendor,
                ],
            ]);
            return response()->json(['success' =>'Successfully Added On Your Cart']);
        }
   
    }//end Details Add to cart


    public function ProductMiniCart(){
      $carts =  Cart::content();
      $cartTotal = Cart::total();
      $carQty =  Cart::count();
      return response()->json(array(
        'carts' => $carts,
        'cartTotal' => $cartTotal,
        'cartQty' => $carQty,
      ));
    }
 public function MiniCartRemove($rowId){

    if(Session::has('coupon')){
        Session::forget('coupon');
    }

    Cart::remove($rowId);
    return response()->json(['success'=>'Successfully Product Remove to Cart']);
 }//End MEthod


//Cart Page
public function MyCart(){
return view('frontend.cart.cart_view');
}//End Method
public function MyCartDataPass(){
    $carts =  Cart::content();
    $cartTotal = Cart::total();
    $carQty = Cart::count();
    return response()->json(array(
      'carts' => $carts,
      'cartTotal' => $cartTotal,
      'cartQty' => $carQty,
    ));
}//End MEthod
public function RemoveSingleCart($rowId){
    Cart::remove($rowId);

    if(Session::has('coupon')){
        $coupon_name =Session::get('coupon')['coupon_name'];
        $coupon =Coupon::where('coupon_name',$coupon_name)->first();
        Session::put('coupon',[
         'coupon_name'=>$coupon->coupon_name,
         'coupon_discount'=>$coupon->coupon_discount,
         'discount_amount'=> round(Cart::total()* $coupon->coupon_discount/100),
         'total_amount' =>round(Cart::total() - Cart::total()* $coupon->coupon_discount/100),
     ]);
    }
    return response()->json(['success'=>'Successfully remove Cart']);

 }//End Method
public function CartDecrement($rowId){



    $row = Cart::get($rowId);
    Cart::update($rowId ,$row->qty -1);
    if(Session::has('coupon')){
       $coupon_name =Session::get('coupon')['coupon_name'];
       $coupon =Coupon::where('coupon_name',$coupon_name)->first();
       Session::put('coupon',[
        'coupon_name'=>$coupon->coupon_name,
        'coupon_discount'=>$coupon->coupon_discount,
        'discount_amount'=> round(Cart::total()* $coupon->coupon_discount/100),
        'total_amount' =>round(Cart::total() - Cart::total()* $coupon->coupon_discount/100),
    ]);
    }
    return response()->json(['Decrement']);
}//End Method
public function CartIncrement($rowId){
    $row = Cart::get($rowId);
    Cart::update($rowId ,$row->qty +1);
    if(Session::has('coupon')){
        $coupon_name =Session::get('coupon')['coupon_name'];
        $coupon =Coupon::where('coupon_name',$coupon_name)->first();
        Session::put('coupon',[
         'coupon_name'=>$coupon->coupon_name,
         'coupon_discount'=>$coupon->coupon_discount,
         'discount_amount'=> round(Cart::total()* $coupon->coupon_discount/100),
         'total_amount' =>round(Cart::total() - Cart::total()* $coupon->coupon_discount/100),
     ]);
     }
    return response()->json(['Increment']);
}//End Method

///////Apply Coupon ////
public function ApplyCoupon(Request $request){
 $coupon = Coupon::where('coupon_name',$request->coupon_name)->where('coupon_validity','>=',Carbon::now()->format('Y-m-d'))->first();
 if($coupon){
    Session::put('coupon',[
        'coupon_name'=>$coupon->coupon_name,
        'coupon_discount'=>$coupon->coupon_discount,
        'discount_amount'=> round(Cart::total()* $coupon->coupon_discount/100),
        'total_amount' =>round(Cart::total() - Cart::total()* $coupon->coupon_discount/100),
    ]);
    return response()->json(array(
        'validity' => true,
        'success' =>'Successfully Applyed Coupon'
    ));
 }else{
    return response()->json(['error' =>'invlid Coupon']);
 }
}//End Method
public function CouponCalculation(){
    if(Session::has('coupon')){
        return response()->json(array(
            'subtotal' => Cart::total(),
            'coupon_name' => session()->get('coupon')['coupon_name'],
             'coupon_discount' => session()->get('coupon')['coupon_discount'],
             'discount_amount' => session()->get('coupon')['discount_amount'],
             'total_amount' => session()->get('coupon')['total_amount'],
        ));
       
    }else{
        return response()->json(array(
            'total' =>Cart::total(),
        ));
    }
}//End Method
public function CouponRemove(){
    
        Session::forget('coupon');
    return response()->json([
     'success' => 'Coupon Remove Successfully'
    ]);
   
}

/////////////Checkout Page Method////////////////
public function Checkout(){
    if(Auth::check()){
        if( Cart::total() > 0){
            $carts =  Cart::content();
            $cartTotal = Cart::total();
            $carQty = Cart::count();
            $division =ShipDivision::orderBy('division_name','ASC')->get();
            return view('frontend.checkout.checkout_view',compact('carts','cartTotal','carQty','division'));
        }else{
            $notification = array(
                'error' =>'Shopping At list One Product',
                'alert-type'=> 'error'
             );
            return redirect()->to('/')->with($notification);
        }
       
    }else{
        $notification = array(
            'error' =>'At First login Your Account',
            'alert-type'=> 'error'
         );
        return redirect()->route('login')->with($notification);
    }

}//End Method
//Dependency by Shipping Disivision to Districts to State




}
