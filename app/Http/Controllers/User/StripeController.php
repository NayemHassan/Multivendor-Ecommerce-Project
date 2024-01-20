<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\orders;
use App\Models\OrderItem;
use Gloudemans\Shoppingcart\facades\Cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderMail;
use Carbon\Carbon;
use App\Jobs\SendMailJob;
use Auth;
class StripeController extends Controller
{
  
    public function StripeOrder( Request $request){
      if(Session::has('coupon')){
          $total_amount = Session::get('coupon')['total_amount'];
      }else{
        $total_amount = round(Cart::total());
      }
        \Stripe\Stripe::setApiKey('sk_test_51OYYE8ErulxAhjeecDhpDqaT0cyslZgK4Z4zS7d5LWOsiQz1mstJivk7C1Lc13rmyx2IfKT3Pxw9vN1G2JG67hMW00k9fvFe9q');
        $token = $_POST['stripeToken'];
        
        $charge = \Stripe\Charge::create([
          'amount' => $total_amount*100,
          'currency' => 'usd',
          'description' => 'EASY SHOP',
          'source' => $token,
          'metadata' => ['order_id' => uniqid()],
        ]);

      //  dd($charge);
        $order_id = orders::insertGetId([
          'user_id' => Auth::id(),
          'division_id' => $request->division_id,
          'district_id' => $request->district_id,
          'state_id' => $request->state_id,
          'name' => $request->name,
          'email' => $request->email,
          'phone' => $request->phone,
          'post_code' => $request->post_code,
          'address' => $request->address,
          'additional_info' => $request->additional_info,

          'payment_type' => $charge->payment_method,
          'payment_method' => 'stripe',
          'transaction_id' => $charge->balance_transaction,
          'currency' => $charge->currency,
          'amount' => $total_amount,
          'order_number' => $charge->metadata->order_id,
          'invoice_no' => 'ECO'.mt_rand(100000000,999999999),
          'order_date' => Carbon::now()->format('d-F-Y'),
          'order_month' => Carbon::now()->format('F'),
          'order_year' => Carbon::now()->format('Y'),
          'status' => 'pending',
          'created_at' =>Carbon::now(),
        ]);


        //Order mail Send Start
        $invoice = orders::findOrfail($order_id);
        $data = [
          'invoice_no' => $invoice->invoice_no,
          'amount' => $total_amount,
          'name' => $invoice->name,
          'email' => $invoice->email,
        ];

        Mail::to($request->email)->send(new OrderMail($data));

        //Order mail Send End
      
       
       // dispatch(new SendMailJob((object)$request->all()));
       
        $carts = Cart::Content();

        foreach($carts as $cart){
          OrderItem::insert([
           'order_id' =>  $order_id,
           'product_id' => $cart->id,
           'vendor_id' => $cart->options->vendor,
           'product_name' => $cart->name,
           'color' => $cart->options->color,
           'size' => $cart->options->size,
           'qty' => $cart->qty,
           'price' => $cart->price,
           'created_at' => Carbon::now(),
          ]);
        }
        if(Session::has('coupon')){
          Session::forget('coupon');
        }
        Cart::destroy();
        $notification = array(
          'message' =>'Your Order Place Successfully ',
          'alert-type'=> 'info'
      );
      return redirect()->route('dashboard')->with($notification);
    }//End Method


    public function CashOrder( Request $request){
      if(Session::has('coupon')){
          $total_amount = Session::get('coupon')['total_amount'];
      }else{
        $total_amount = round(Cart::total());
      }
      
      //  dd($charge);
        $order_id = orders::insertGetId([
          'user_id' => Auth::id(),
          'division_id' => $request->division_id,
          'district_id' => $request->district_id,
          'state_id' => $request->state_id,
          'name' => $request->name,
          'email' => $request->email,
          'phone' => $request->phone,
          'post_code' => $request->post_code,
          'address' => $request->address,
          'additional_info' => $request->additional_info,

          'payment_type' => 'Cash on Delevery',
          'payment_method' => 'Cash on Delevery',
          'currency' => 'Usd',
          'amount' => $total_amount,
          'invoice_no' => 'ECO'.mt_rand(100000000,999999999),
          'order_date' => Carbon::now()->format('d-F-Y'),
          'order_month' => Carbon::now()->format('F'),
          'order_year' => Carbon::now()->format('Y'),
          'status' => 'pending',
          'created_at' =>Carbon::now(),
        ]);

        
        //order Mail Send
        $invoice = orders::findOrfail($order_id);
        $data = [
          'invoice_no' => $invoice->invoice_no,
          'amount' => $total_amount,
          'name' => $invoice->name,
          'email' => $invoice->email,
        ];



      //  dispatch(new SendMailJob((object)$request->all(),$data));

      //dispatch(new SendMailjob($data,$request));
        Mail::to($request->email)->send(new OrderMail($data));
       
        //Order mail Send End
        $carts = Cart::Content();
        foreach($carts as $cart){
          OrderItem::insert([
           'order_id' =>  $order_id,
           'product_id' => $cart->id,
           'vendor_id' => $cart->options->vendor,
           'product_name' => $cart->name,
           'color' => $cart->options->color,
           'size' => $cart->options->size,
           'qty' => $cart->qty,
           'price' => $cart->price,
           'created_at' => Carbon::now(),
          ]);
        }
        if(Session::has('coupon')){
          Session::forget('coupon');
        }
        Cart::destroy();
        $notification = array(
          'message' =>'Your Order Place Successfully ',
          'alert-type'=> 'info'
      );
      return redirect()->route('dashboard')->with($notification);
    }//End Method
   
}//End  Controller
