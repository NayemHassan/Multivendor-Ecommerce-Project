<?php

namespace App\Http\Controllers\Vendor;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Models\User;
use Image;
class VendorController extends Controller
{
   public function VendorDashboard(){
    return view('vendor.index');
   }//End Method
   public function VendorDestroy(Request $request): RedirectResponse
   {
       Auth::guard('web')->logout();

       $request->session()->invalidate();

       $request->session()->regenerateToken();
       $notification = array(
         'message' =>'Vendor logout Sccessfully ',
         'alert-type'=> 'info'
      );
       return redirect('/vendor/login')->with( $notification);
   }//End Method

   public function VendorLogin(){
      return view('vendor.vendor_login');
  }//End Method
  public function VendorProfile(){
   $id= Auth::user()->id;
   $vendorData = User::find($id);
   return view('vendor.vendor_profile',compact('vendorData'));
}//End Method
public function VendorUpdateProfile(Request $request){
   $id =Auth::user()->id;
   $data =User::find($id);
   $data->username = $request->username;
   $data->email = $request->email;
   $data->phone = $request->phone;
   $data->address = $request->address;
   if($request->file('photo')){
       $image = $request->file('photo');
       @unlink(public_path('vendor_upload/'.$data->photo));
       $img_nam = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
       Image::make($image)->resize(110,110)->save('vendor_upload/'.$img_nam);
       $data['photo'] = $img_nam;
   }
   $data->save();
   $notification = array(
       'message' =>'Vendor Profile Updated Successfully ',
       'alert-type'=> 'info'
    );
   return redirect()->back()->with($notification);
}//End Method
public function VendorChangePassword(){
   return view('vendor.change_password');
}//End Method
public function VendorUpdatePassword(Request $request){
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
}//End Method

public function VendorRegister(){
    return view('auth.vendor_register');
}//End Method

public function VendorRegisterStore(Request $request){
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
        'password' => ['required', 'confirmed'],
    ]);

      $user = User::create([
        'name' => $request->name,
        'username' => $request->username,
        'phone' => $request->phone,
        'address' => $request->address,
        'email' => $request->email,
        'vendor_join' => $request->vendor_join,
        'vendor_details' => $request->vendor_details,
        'password' => Hash::make($request->password),
        'role' => 'vendor',
        'status' => 'inactive',
    ]);

    $notification = array(
        'message' =>'Vendor Register Successfully ',
        'alert-type'=> 'info'
     );
    return redirect()->route('vendor.login')->with($notification);

}
}
