<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Image;
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
    return view('frontend.userdashboard.order_page');
   }//End Method
   public function UserDashboard(){
    $id = Auth::user()->id;
    $userData = User::find($id);
    return view('frontend.userdashboard.dashboard_page',compact('userData'));
   }//End Method
}
