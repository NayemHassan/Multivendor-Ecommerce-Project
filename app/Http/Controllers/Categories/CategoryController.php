<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Str;
use App\Models\Categories;
class CategoryController extends Controller
{
    public function AddCategories(){
        return view('backend.categories.categories_view');
    }//End Method
    public function StoreCategories(Request  $request){
        $image =  $request->file('category_image');
        $img_nam = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(80,80)->save('frontend_upload/categories/'.$img_nam);
        $db_save = $img_nam;
        Categories::insert([
            'categories_name' =>$request->category_name,
            'categories_slug' =>str::slug($request->category_name),
            'categories_image' =>$db_save,
        ]);
        $notification = array(
            'message' =>'Category Added Successfully',
            'alert-type'=> 'info'
         );
        return redirect()->route('view.categories')->with($notification);
    }//End  Method
    public function CategoriesView(){
        $catData = Categories::latest()->get();
        return view('backend.categories.catagory_all_view',compact('catData'));
    }//End Method

    public function EditCategories($slug){
        $catSlug = Categories::where('categories_slug',$slug)->first();
        return view('backend.categories.catagory_edit',compact('catSlug'));
    }//End Method
    public function UpdateCategories(Request $request,$slug){
        if($request->file('category_image')){
        $image =  $request->file('category_image');
        $img_nam = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(80,80)->save('frontend_upload/categories/'.$img_nam);
        $db_save = $img_nam;
        Categories::where('categories_slug',$slug)->first()->update([
            'categories_name' =>$request->category_name,
            'categories_slug' =>str::slug($request->category_name),
            'categories_image' =>$db_save,
        ]);
        $notification = array(
            'message' =>'Category Updated with image Successfully',
            'alert-type'=> 'info'
         );
        return redirect()->route('view.categories')->with($notification);
        }
        else{
            Categories::where('categories_slug',$slug)->first()->update([
                'categories_name' =>$request->category_name,
                'categories_slug' =>str::slug($request->category_name),
            ]);
            $notification = array(
                'message' =>'Category Updated without image Successfully',
                'alert-type'=> 'info'
             );
            return redirect()->route('view.categories')->with($notification);
        }
    }
    public function DeleteCategories($slug){
        $cat = Categories::where('categories_slug',$slug)->first();
        $path = public_path('frontend_upload/categories/'.$cat->categories_image);
        if(file_exists($path)){
            @unlink($path);
        }
        Categories::where('categories_slug',$slug)->first()->delete();
        $notification = array(
            'message' =>'Category Deleted Successfully',
            'alert-type'=> 'info'
         );
        return redirect()->route('view.categories')->with($notification);
    }
}

