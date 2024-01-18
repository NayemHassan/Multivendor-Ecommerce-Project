<?php

namespace App\Http\Controllers\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Image;
class AdminController extends Controller
{
    public function AdminDashboard(){
        return view('admin.index');
    }//End Method

    public function AdminDestroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            'message' =>'Logout Successfull',
            'alert-type'=> 'info'
         );
        return redirect('/login')->with($notification);
    }//End Method

    public function AdminLogin(){
        return view('admin.admin_login');
    }//End Method
    public function AdminProfile(){
        $id= Auth::user()->id;
        $adminData = User::find($id); 
        return view('admin.admin_profile',compact('adminData'));
    }//End Method
    public function AdminUpdateProfile(Request $request){
        $id =Auth::user()->id;
        $data =User::find($id);
        $data->username = $request->username;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        if($request->file('photo')){
            $image = $request->file('photo');
            @unlink(public_path('admin_upload/'.$data->photo));
            $img_nam = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(110,110)->save('admin_upload/'.$img_nam);
            $data['photo'] = $img_nam;
        }
        $data->save();
        $notification = array(
            'message' =>'Admin Profile Updated Sccessflly ',
            'alert-type'=> 'info'
         );
        return redirect()->back()->with($notification);
    }//End Method

    public function AdminChangePassword(){
        return view('admin.change_password');
    }//End Method

    public function AdminUpdatePassword(Request $request){
        //Validate
        $request->validate([
            'old_password' =>'required',
            'new_password' =>'required|confirmed',
        ]);
       //Old Password Match
       if(!Hash::check($request->old_password,auth::user()->password)){
        return redirect()->back()->with("error","Old Password Doesn't Match!!");
       }
       //Password Update
       User::whereId(auth()->user()->id)->update([
        'password' =>Hash::make($request->new_password),
       ]);

       return redirect()->back()->with("status","Password Changed Successfuly");
    }//End MEthod

    public function VendorInactive(){
        $vendorInactive = User::where('status','inactive')->where('role','vendor')->latest()->get();
        return view('backend.vendor.vendor_inactive',compact('vendorInactive'));
    }//End Method
    public function DetailsInactive($id){
        $dInactive  = User::findOrFail($id);
        return view('backend.vendor.vendor_details_inactive',compact('dInactive'));
    }//End Method 
    public function UpdateInactiveApply($id){
        User::findOrFail($id)->update([
            'status' =>'active',
        ]);
        $notification = array(
            'message' =>'Vendor Sccessflly Active',
            'alert-type'=> 'info'
         );
       return redirect()->route('vendor.active')->with($notification);
    }//End MEthod 
    public Function VendorActive(){
        $vendorActive = User::where('status','active')->where('role','vendor')->latest()->get();
        return view('backend.vendor.vendor_active',compact('vendorActive'));
    }//End Method
    public function DetailsActive($id){
        $dActive = User::findOrFail($id);
        return view('backend.vendor.vendor_details_active',compact('dActive'));
    }//End Method
    public function UpdateActiveApply($id){
        User::findOrFail($id)->update([
            'status' =>'inactive',
        ]);
        $notification = array(
            'message' =>'Vendor Sccessflly InActive',
            'alert-type'=> 'info'
         );
       return redirect()->route('vendor.inactive')->with($notification);
    }
}
