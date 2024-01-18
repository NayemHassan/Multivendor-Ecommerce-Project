<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Image;
class UserController extends Controller
{
    public function UserDashboard(){
        $id = Auth::user()->id;
        $userData = User::find($id);
        return view('index',compact('userData'));
    }//End Method
    public function UserProfileUpdate(Request $request){
        $id = Auth::user()->id;
        $userData = User::find($id);
        $userData->name = $request->name;
        $userData->username = $request->username;
        $userData->email = $request->email;
        $userData->phone = $request->phone;
        $userData->address = $request->address;
        if($request->file('profile_image')){
            $image = $request->file('profile_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
           @unlink('frontend_upload/user_upload/'.$userData->photo);
            Image::make($image)->resize(250,250)->save('frontend_upload/user_upload/'.$name_gen);
            $userData['photo'] = $name_gen;
        }
        $userData->save();
        $notification = array(
            'message' =>'Profile Update  Successfully',
            'alert-type'=> 'info'
         );
        return redirect()->back()->with($notification);
    }//End Method
    public function UserPasswordUpdate(Request $request){
       
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);
        //Check Password
        if(!Hash::check($request->old_password,Auth::user()->password)){
            return redirect()->back()->with('error',"Password Doesn't Match!!");
        }
        //
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password),
        ]);
        return redirect()->back()->with('status','Password Change Succesfully');
    }//End Method
    public function  UserLogOut(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            'message' =>'User Logout Successfully',
            'alert-type'=> 'info'
         );
        return redirect('/login')->with($notification);
    }
}
