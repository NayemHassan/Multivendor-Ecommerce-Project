<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Banner;
use Image;
class BannerController extends Controller
{
    
    public function AllBannerView(){
        $banner = Banner::latest()->get();
        return view('Backend.banner.all_banner_view',compact('banner'));
    }//End Method 
    public function AddBanner(){
        return view('Backend.banner.add_banner');
    }//End MEthod 
      public function StoreBanner(Request $request){
        $image= $request->banner_image;
        $img_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(768,450)->save('frontend_upload/banner/'.$img_name);
        $save_db = $img_name;
        Banner::insert([
            'banner_name' =>$request->banner_name,
            'banner_slug' => str::slug($request->banner_name),
            'banner_url' =>$request->banner_url,
            'banner_image' => $save_db,
        ]);
        $notification = array(
            'message' =>'Banner Inserted Successfully ',
            'alert-type'=> 'info'
         );
        return redirect()->route('show.all.banner')->with($notification);
    }//End Method 

    public function EditBanner($slug){
        $banner = Banner::where('banner_slug',$slug)->first();
        return view('Backend.banner.edit_banner',compact('banner'));
    }//End Method 
    public function UpdateBanner(Request $request){
        $id = $request->ban;
        
        if($request->banner_image){
        $image= $request->banner_image;
        $img_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(768,450)->save('frontend_upload/banner/'.$img_name);
        $save_db = $img_name;
        Banner::where('banner_slug',$id )->first()->update([
            'banner_name' =>$request->banner_name,
            'banner_slug' => str::slug($request->banner_name),
            'banner_url' =>$request->banner_url,
            'banner_image' => $save_db,
        ]);
        $notification = array(
            'message' =>'Banner Update with Image Successfully ',
            'alert-type'=> 'info'
         );
        }
        else{
            Banner::where('banner_slug',$id )->first()->update([
                'banner_name' =>$request->banner_name,
                'banner_slug' => str::slug($request->banner_name),
                'banner_url' =>$request->banner_url,
    
          ]);
            $notification = array(
                'message' =>'Banner Update Without Image Successfully ',
                'alert-type'=> 'info'
             );
        }
      
        return redirect()->route('show.all.banner')->with($notification);
    }//End Method 
    public function DeleteBanner($slug){
        
        $id = Banner::where('banner_slug',$slug)->first();
        $path = public_path('frontend_upload/banner/'.$id->banner_image);
        if(file_exists($path)){
            @unlink($path);
        }
        Banner::where('banner_slug',$slug )->first()->delete();
        $notification = array(
            'message' =>'Banner Deleted Successfully ',
            'alert-type'=> 'info'
         );
        return redirect()->route('show.all.banner')->with($notification);
    }//End Method

}
