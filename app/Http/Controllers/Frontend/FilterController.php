<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Categories;
class FilterController extends Controller
{
  public function ShopPage(){
    $products = Product::where('status',1)->orderBy('id','DESC')->get();
    $new_product = Product::where('status',1)->orderBy('id','ASC')->limit(3)->get();
    $categories = Categories::orderBy('id','ASC')->get();
    $cat_name = Categories::orderBy('id','ASC')->first();
    return view('frontend.product.product_filter',compact('products', 'new_product', 'cat_name','categories'));
  }//End Method
  public function ShopFilter(){
  
  }
}
