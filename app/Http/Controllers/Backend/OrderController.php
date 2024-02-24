<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\orders;
use App\Models\OrderItem;
use Barryvdh\DomPDF\Facade\Pdf;
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
   public function AdminDetailsOrder($id){
      $detailsOrder= orders::with('division','district','state')->where('id',$id)->orderBy('id','DESC')->first();
      $orderItem = OrderItem::with('order','product','vendor')->where('order_id',$id)->orderBy('id','DESC')->get();
    return view('backend.order.admin_order_details_view',compact('detailsOrder','orderItem'));
   }//End MEthod
   public function AllConfirmOrder(){
      $order = orders::where('status','confirmed')->get();
      return view('backend.order.confirm_order',compact('order'));
   }
   public function AllProcessingOrder(){
      $order = orders::where('status','processing')->get();
      return view('backend.order.processing_order',compact('order'));
   }//End MEthod
   public function AllDeleveredOrder(){
      $order = orders::where('status','deliverd')->get();
      return view('backend.order.delevired_order',compact('order'));
   }//End MEthod
   public function PendingToConfirm($id){
   orders::findOrFail($id)->update([
         'status' => 'confirmed',
      ]);
      return redirect()->route('all.confirm.order');
   }//End Method
   public function ConfirmToProcessing($id){
   orders::findOrFail($id)->update([
         'status' => 'processing',
      ]);
      return redirect()->route('all.processing.order');
   }//End Method
   public function ProcessingToDelevered($id){
   orders::findOrFail($id)->update([
         'status' => 'deliverd',
      ]);
      return redirect()->route('all.delevered.order');
   }//End Method
   public function AdminInvoiceDawnload($id){
      $detailsOrder= orders::with('division','district','state')->where('id',$id)->orderBy('id','DESC')->first();
    $orderItem = OrderItem::with('product','vendor')->where('order_id',$id)->orderBy('id','DESC')->get();
    $pdf = Pdf::loadView('backend.order.admin_order_invoice',compact('detailsOrder','orderItem'))->setPaper('a4')->setOption([
        'teamDir' => public_path(), 
        'chroot' => public_path(), 
    ]); 
    return $pdf->download('invoice.pdf');
   }
}