<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\orders;
use App\Models\OrderItem;
use Auth;
class OrderController extends Controller
{
   public function OrderPending(){
   // OrderItem::where()
    $order = orders::where('status','pending')->orderBy('id','DESC')->get();
    return view('backend.order.pending_order',compact('order'));
   }//End Method
   public function VendorPendingOrder(){
    $vendor = Auth::user()->id;
    $orders = OrderItem::with('order')->where('vendor_id',$vendor)->orderBy('id','DESC')->get();
    return view('vendor.order.pending_order',compact('orders'));
   }//End MEthod

}