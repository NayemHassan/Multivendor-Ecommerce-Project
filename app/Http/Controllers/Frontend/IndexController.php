<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Categories;
use App\Models\SubCategories;
use App\Models\Multi_Img;
use App\Models\User;

class IndexController extends Controller
{

   public function Index(){
      $skip_cat_0 = Categories::skip(0)->first();
      $skip_product_0 = Product::where('status',1)->where('category_id',$skip_cat_0->id)->orderBy('id','DESC')->limit(5)->get();
      $skip_cat_7 = Categories::skip(7)->first();
      $skip_product_7 = Product::where('status',1)->where('category_id',$skip_cat_7->id)->orderBy('id','DESC')->limit(5)->get();
      $skip_cat_2 = Categories::skip(2)->first();
      $skip_product_2 = Product::where('status',1)->where('category_id',$skip_cat_2->id)->orderBy('id','DESC')->limit(5)->get();
      $hot_deal = Product::where('status',1)->where('hot_deal',1)->orderBy('id','DESC')->limit(3)->get();
      $special_deal = Product::where('status',1)->where('special_deal',1)->where('discount_price','!=',NULL)->orderBy('id','DESC')->limit(3)->get();
      $recently_added = Product::where('status',1)->orderBy('id','DESC')->limit(3)->get();
      $special_offer = Product::where('status',1)->where('special_offer',1)->where('discount_price','!=',NULL)->orderBy('id','DESC')->limit(3)->get();
      return view('frontend.index',compact('skip_cat_0','skip_product_0','skip_cat_7','skip_product_7','skip_cat_2','skip_product_2','hot_deal','special_deal','recently_added','special_offer'));
   }//End Method
   public function ProductDetails($id,$slug){
    $vproduct =Product::findOrFail($id);
    $size = $vproduct->product_size;
    $checkSize = explode(',',$size);
    $color = $vproduct->product_color;
    $checkColor = explode(',',$color);
    $multiImage = Multi_Img::where('product_id',$id)->get();
    $productCat = $vproduct->category_id;
    $relatedProduct = Product::where('category_id',$productCat)->where('id','!=',$id)->orderBy('id','DESC')->limit(4)->get();
    return view('frontend.product.product_details',compact('vproduct','checkSize','checkColor','multiImage','relatedProduct'));
   }//End Method
   public function VendorDetails($id){
      $vendor_details = User::findOrFail($id);
      $vendor_product = Product::where('vendor_id',$id)->get();
      return view('frontend.vendor.vendor_details',compact('vendor_details','vendor_product'));
   }//End Method
   public function AllVendorList(){
      $vendors = User::where('status','active')->where('role','vendor')->orderBy('id','DESC')->get();
    
      return view('frontend.vendor.all_vendor_list',compact('vendors'));
   }//
   public function ProductCategories($id,$slug){
      $category = Categories::orderBy('categories_name','ASC')->limit(5)->get();
      $products = Product::where('status',1)->where('category_id',$id)->orderBy('id','DESC')->get();
      $new_product = Product::where('status',1)->orderBy('id','ASC')->limit(3)->get();
      $cat_name = Categories::where('id',$id)->orderBy('id','ASC')->first();
       return view('frontend.product.category_product_view',compact('category','products','new_product','cat_name'));
   }//End Method 
   public function ProductSubCategories($id,$slug){
      $category = Categories::orderBy('categories_name','ASC')->limit(5)->get();
      $products = Product::where('status',1)->where('category_id',$id)->orderBy('id','DESC')->get();
      $new_product = Product::where('status',1)->orderBy('id','ASC')->limit(3)->get();
      $subcat_name = SubCategories::where('id',$id)->orderBy('id','ASC')->first();
       return view('frontend.product.subcategory_product_view',compact('subcat_name','products','new_product','category'));
   }//


   public function ProductViewModal($id){
       $product = Product::with('category','brand')->findOrFail($id);
       $color  = $product->product_color;
       $product_color = explode(',',$color);
       $size  = $product->product_size;
       $product_size = explode(',',$size);

    return response()->json(array(
      'product' =>$product ,
      'color' =>$product_color ,
      'size' =>$product_size ,
    )); 
   }//End Method
}
