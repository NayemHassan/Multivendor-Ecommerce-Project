<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Multi_Img;

use App\Models\Product;
use App\Models\User;
use App\Models\Brand;
use App\Models\Categories;
use Illuminate\Support\Str;
use App\Models\SubCategories;
use Carbon\Carbon;
use Image;
class ProductController extends Controller
{
    public function AllProductView(){
        $products = Product::latest()->get(); 
       return view('backend.product.all_product_view',compact('products'));
    } //End Method 
    public function AddProduct(){
        $vendors = User::where('status','active')->where('role','vendor')->latest()->get();
        $brands= Brand::latest()->get();
        $category = Categories::latest()->get();
        return view('backend.product.add_product',compact('brands','category','vendors'));
    }//End Method

    public function StoreProduct(Request $request){
        $image = $request->file('product_thumbnail');
        $img_nam = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(800,800)->save('frontend_upload/product/thumbnail/'. $img_nam);
        $save = $img_nam;
        $product_id = Product::InsertGetId([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'vendor_id' => $request->vendor_id,
            'product_name' => $request->product_name,
            'product_slug' => str::slug($request->product_name),
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_desc' => $request->short_desc,
            'long_desc' => $request->long_desc,
            'product_color' => $request->product_color,
            'product_size' => $request->product_size,
            'product_tag' => $request->product_tag,
            'product_thumbnail' => $save ,
            'special_offer' =>$request->special_offer,
            'hot_deal' =>$request->hot_deal,
            'special_deal' =>$request->special_deal,
            'featured' =>$request->featured,
            'created_at' =>Carbon::now(),
        ]);

        $img = $request->file('photo_name');

        foreach( $img as $imag){
        $make_nam = hexdec(uniqid()).'.'.$imag->getClientOriginalExtension();
        Image::make($imag)->resize(1100,1100)->save('frontend_upload/product/multiimage/'. $make_nam);
        $saves = $make_nam;
        Multi_Img::insert([
            'product_id' =>$product_id,
            'photo_name' => $saves,
            'created_at' =>Carbon::now(),
        ]);
        }
        $notification = array(
            'message' =>'Add Product Successfully ',
            'alert-type'=> 'info'
         );
        return redirect()->route('all.product.show')->with($notification);
    }//End Method
    public function EditProduct( $id){
        $vendors = User::where('status','active')->where('role','vendor')->latest()->get();
        $product = Product::findOrFail($id);
        $brands =Brand::latest()->get();
        $category = Categories::latest()->get();
        $multiImg = Multi_Img::where('product_id',$id)->get();
        $subCategiry = SubCategories::latest()->get();
        return view('/backend.product.edit_product',compact('product','brands','category','subCategiry','vendors','multiImg'));
    }//End Methed
    public function UpdateProduct(Request $request){
        $produc_id = $request->slug;
        Product::where('product_slug',$produc_id)->first()->update([

            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'vendor_id' => $request->vendor_id,
            'product_name' => $request->product_name,
            'product_slug' => str::slug($request->product_name),
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_desc' => $request->short_desc,
            'long_desc' => $request->long_desc,
            'product_color' => $request->product_color,
            'product_size' => $request->product_size,
            'product_tag' => $request->product_tag,
            'special_offer' =>$request->special_offer,
            'hot_deal' =>$request->hot_deal,
            'special_deal' =>$request->special_deal,
            'featured' =>$request->featured,
            'status' =>1,
            'created_at' =>Carbon::now(),
        ]);
        $notification = array(
            'message' =>'Update Product Without Image Successfully ',
            'alert-type'=> 'info'
         );
        return redirect()->route('all.product.show')->with($notification);
    }//End Method

    public function UpdateProductThumbnail(Request $request){

        $Thumb_id = $request->thumb_id;
      $tid =  Product::where('product_slug', $Thumb_id)->first();
        $path= public_path('frontend_upload/product/thumbnail/'.$tid->product_thumbnail);
        if(file_exists($path)){
            @unlink($path);
        }
        $image = $request->file('product_thumbnail');
        $imge_nam = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(800,800)->save('frontend_upload/product/thumbnail/'. $imge_nam);
        $save_db = $imge_nam;
        Product::where('product_slug', $Thumb_id)->first()->update([
            'product_thumbnail' =>$save_db,
        ]);
        $notification = array(
            'message' =>'Update Product Thumbnail Successfully ',
            'alert-type'=> 'info'
         );
        return redirect()->back()->with($notification);
    }//End Method

    public function UpdateMultiImageEditUpdate(Request $request){
        
        $multi = $request->multi_img;
            foreach($multi as $id => $img){
                $imgDel = Multi_Img::findOrFail($id);
                $paths = public_path('frontend_upload/product/multiimage/'.$imgDel->photo_name);
                if(file_exists($paths)){
                    @unlink($paths);
                }
                $imge_nams = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
                Image::make($img)->resize(800,800)->save('frontend_upload/product/multiimage/'. $imge_nams);
                $save_db = $imge_nams;
                Multi_Img::where('id',$id)->update([
                    'photo_name' => $save_db,
                    'updated_at' =>Carbon::now(),
                ]);

            }//End Foreachh 
        $notification = array(
            'message' =>'Update  Multi image Successfully ',
            'alert-type'=> 'info'
         );
        return redirect()->back()->with($notification);
    }//End Method
       
        public function ProductMultiImageDelete($id){
            $imgDel = Multi_Img::findOrFail($id);
            $paths = public_path('frontend_upload/product/multiimage/'.$imgDel->photo_name);
            if(file_exists($paths)){
                @unlink($paths);
            }
            Multi_Img::findOrFail($id)->delete();
            $notification = array(
                'message' =>'  Multiimage Delete  Successfully ',
                'alert-type'=> 'info'
             );
            return redirect()->back()->with($notification);
            
        }//End Method
        public function ProducInactive($id){
            Product::findOrFail($id)->update([
                'status' => 0,
            ]);
            $notification = array(
                'message' =>'  Product Successfully Inactive ',
                'alert-type'=> 'info'
             );
            return redirect()->back()->with($notification);
        }//End MEthod
        public function ProducActive($id){
            Product::findOrFail($id)->update([
                'status' => 1,
            ]);
            $notification = array(
                'message' =>'  Product Successfully Active ',
                'alert-type'=> 'info'
             );
            return redirect()->back()->with($notification);
        }//End MEthod
        public function ProducDeletes($id){
            $imgeDel = Product::findOrFail($id);
            $paths = public_path('frontend_upload/product/thumbnail/'.$imgeDel->product_thumbnail);
            if(file_exists($paths)){
                @unlink($paths);
            }
            Product::findOrFail($id)->delete();
            $imgemultiDel = Multi_Img::where('product_id',$id)->get();
            foreach($imgemultiDel as $img){
                $paths = public_path('frontend_upload/product/multiimage/'.$img->photo_name);
                if(file_exists($paths)){
                    @unlink($paths);
                }
              Multi_Img::where('product_id',$id)->delete();
            }
            $notification = array(
                'message' =>'Product Deleted Successfully',
                'alert-type'=> 'info' 
             );
            return redirect()->back()->with($notification);
            
        }
 
}