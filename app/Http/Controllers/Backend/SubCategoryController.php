<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategories;
use App\Models\Categories;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Exists;
use Image ;
class SubCategoryController extends Controller
{
    public function SubCategoriesView(){
        $subcat = SubCategories::latest()->get();
        return view('backend.subcategories.subcategory_all_view',compact('subcat'));
    }//End method
    public function AddSubCategories(){
        $subcate =categories::all();
        return view('backend.subcategories.subcategory_add',compact('subcate'));
    }//End method
    public function StoreSubCategories(Request $request){
        $img = $request->file('subcategory_image');
        $img_nam = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
        Image::make($img)->resize(120,120)->save('frontend_upload/sub_categories/'.$img_nam);
        $dv_save = $img_nam;
        SubCategories::insert([
            'subcat_id' =>$request->subcat_id,
            'subcategory_name' => $request->subcategory_name,
            'subcategory_slug' => Str::slug($request->subcategory_name),
            'subcategory_image' => $dv_save,


        ]);
        $notification = array(
            'message' =>'Sub-Category Added Successfully',
            'alert-type'=> 'info'
         );
        return redirect()->route('view.subcategories')->with($notification);
    }//End method
    public function EditSubCategories($slug){
        $Cate  = Categories::all();
        $subsCat = SubCategories::where('subcategory_slug',$slug)->first();
        return view('backend.subcategories.edit_subcategory',compact('Cate','subsCat'));
    }//End Method
    public function UpdateSubCategories(Request $request,$slug){
    if($request->file('subcategory_image')){
        $img = $request->file('subcategory_image');
        $img_nam = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
        Image::make($img)->resize(120,120)->save('frontend_upload/sub_categories/'.$img_nam);
        $dv_save = $img_nam;
        SubCategories::where('subcategory_slug',$slug)->first()->update([
            'subcat_id' =>$request->subcat_id,
            'subcategory_name' => $request->subcategory_name,
            'subcategory_slug' => Str::slug($request->subcategory_name),
            'subcategory_image' => $dv_save,


        ]);
        $notification = array(
            'message' =>'Sub-Category update with image Successfully',
            'alert-type'=> 'info'
         );
        return redirect()->route('view.subcategories')->with($notification);
    }
    else{
        SubCategories::where('subcategory_slug',$slug)->first()->update([
            'subcat_id' =>$request->subcat_id,
            'subcategory_name' => $request->subcategory_name,
            'subcategory_slug' => Str::slug($request->subcategory_name),



        ]);
        $notification = array(
            'message' =>'Sub-Category Updated Without Image Successfully',
            'alert-type'=> 'info'
         );
        return redirect()->route('view.subcategories')->with($notification);
    }
    }//End Method
    public function DeleteSubCategories($slug){
        $delete = SubCategories::where('subcategory_slug',$slug)->first();
        $path = public_path('frontend_upload/sub_categories/'.$delete->subcategory_image);
        if(file_exists($path)){
            @unlink($path);
        }
        SubCategories::where('subcategory_slug',$slug)->first()->delete();
        $notification = array(
            'message' =>'Sub-Category Deleted Successfully',
            'alert-type'=> 'info'
         );
        return redirect()->route('view.subcategories')->with($notification);
    }//End Method 
    public function GetSubCategories($category_id){
        //Ekhan vul name neoa hoise subcat r jaigai cat_id neoa dorkar chilo bujar jonnne
        $subcat = SubCategories::where('subcat_id',$category_id)->orderBy('subcategory_name','ASC')->get();
        return json_encode( $subcat);
    }

}
