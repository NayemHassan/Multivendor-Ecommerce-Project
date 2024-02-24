<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Image;
use App\Models\orders;
use App\Models\OrderItem;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
class AllUserController extends Controller
{
   public function UserDatails(){
    $id = Auth::user()->id;
        $userData = User::find($id);
    return view('frontend.userdashboard.account_details',compact('userData'));
   }//End Method
   public function UserPassword(){
    return view('frontend.userdashboard.password_page');
   }//End Method
   public function UserAddress(){
    return view('frontend.userdashboard.user_address');
   }//End Method
   public function UserTrackOrder(){
    return view('frontend.userdashboard.track_order');
   }//End Method
   public function UserOrder(){
   $order= orders::where('user_id',Auth::user()->id)->orderBy('id','DESC')->get();

    return view('frontend.userdashboard.order_page',compact('order'));
   }//End Method

   public function OrderDetails($id){
    $detailsOrder= orders::with('division','district','state')->where('user_id',Auth::user()->id)->where('id',$id)->orderBy('id','DESC')->first();
    $orderItem = OrderItem::with('product','vendor')->where('order_id',$id)->orderBy('id','DESC')->get();
    return view('frontend.userdashboard.order_Details',compact('detailsOrder','orderItem'));
   }//End Method
   public function OrderInvoice($id){
    $detailsOrder= orders::with('division','district','state')->where('user_id',Auth::user()->id)->where('id',$id)->orderBy('id','DESC')->first();
    
    $orderItem = OrderItem::with('product','vendor')->where('order_id',$id)->orderBy('id','DESC')->get();
    $pdf = Pdf::loadView('frontend.userdashboard.order_invoice',compact('detailsOrder','orderItem'))->setPaper('a4')->setOption([
        'teamDir' => public_path(), 
        'chroot' => public_path(), 
    ]); 
    return $pdf->download('invoice.pdf');
    
   }//End Method
   public function OrderReturn(Request $request,$return_order){
         $request->validate([
            'return_reason' => 'required'
        ],[
            'return_reason' => 'Please Give Us Return Reason'
        ]);

        orders::findOrFail($return_order)->update([
             'return_reason' => $request->return_reason,
              'return_date' => Carbon::now()->format('d F Y'),
              'return_order' => 1,
        ]);
        $notification = array(
            'message' =>'Return reason Send Successfully',
            'alert-type'=> 'info'
         );
        return redirect()->route('user.order.page')->with($notification);
   }
}
