<?php

namespace App\Http\Controllers\Brand;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Image;
use Illuminate\Support\Str;
class BrandController extends Controller
{
    public function AllBrand(){
        $brand = Brand::latest()->get();
        return view('backend.brand.all_brand',compact('brand'));
    }//End Method
    public function AddBrand(){
       return view('backend.brand.add_brand');
    } //End Method
    public function StoreBrand(Request $request){
        
            $image = $request->file('brand_image');
            $img_nam = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('admin_upload/brand_image/'.$img_nam);
            $Db_save = $img_nam;
            Brand::insert([
                 'brand_name' =>$request->brand_name,
                 'brand_slug' => strtolower(str_replace(' ','-',$request->brand_name)),
                //  Same As work
                //  'brand_slug' => str::slug($request->brand_name),
                 'brand_image' => $Db_save,
            ]);

            $notification = array(
                'message' =>'Brand Added Successfully',
                'alert-type'=> 'info'
             );
            return redirect()->route('all.brand')->with($notification);
    } //End MEthod
    public function ViewEditBrand($slug){
        $editData = Brand::where('brand_slug',$slug)->first();
        return view('backend.brand.edit_view_brand' ,compact('editData'));
    }//End Method
    public function UpdateBrand(Request $request,$id){

        if($request->file('brand_image')){
            $image = $request->file('brand_image');
            $img_nam = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('admin_upload/brand_image/'.$img_nam);
            $Db_save = $img_nam;
            Brand::findOrfail($id)->update([
                'brand_name' =>$request->brand_name,
                'brand_slug' => strtolower(str_replace(' ','-',$request->brand_name)),
                'brand_image' => $Db_save,
            ]);

            $notification = array(
                'message' =>'Brand Updated With Image Successfully',
                'alert-type'=> 'info'
            );
            return redirect()->route('all.brand')->with($notification);
        }else{
            Brand::findOrFail($id)->update([
                'brand_name' =>$request->brand_name,
                'brand_slug' => strtolower(str_replace(' ','-',$request->brand_name)),

        ]);

        $notification = array(
            'message' =>'Brand Updated Without Image Successfully',
            'alert-type'=> 'info'
            );
        return redirect()->route('all.brand')->with($notification);
        }


    }
    public function DeleteeBrand($id){

        $brand = Brand::findOrFail($id);
        $path = public_path('admin_upload/brand_image/'.$brand->brand_image);
        if(file_exists($path)){
            @unlink($path);
        }
        Brand::findOrFail($id)->delete();
        $notification = array(
            'message' =>'Brand  Successfully Deleted',
            'alert-type'=> 'info'
            );
        return redirect()->route('all.brand')->with($notification);
    }
}
