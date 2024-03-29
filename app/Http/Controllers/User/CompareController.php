<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Compare;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CompareController extends Controller
{
    public function AddToCompare(Request $request,$product_id){
        if(Auth::check()){
            $exists = Compare::where('user_id',Auth::id())->where('product_id',$product_id)->first();

                  if(!$exists){
                    Compare::insert([
                      'user_id' => Auth::id(),
                      'product_id' => $product_id,
                      'created_at' => Carbon::now(),

                     ]);
                     return response()->json(['success' => 'Successfully Added On Your Compare' ]);
                  } else{
                      return response()->json(['error' => 'This Product Has Already on Your Compare' ]);

                  }

              }else{
                  return response()->json(['error' => 'At First Login Your Account' ]);
              }

    }//End Method

    public function CompareViewPage(){
        return view('frontend.compare.compare_view');
    }//End Method
    public function CompareDataLoad(){
     $compare = Compare::with('product')->where('user_id',Auth::id())->latest()->get();
     $compareQty = Compare::count();
     return response()->json([
         'compare' => $compare,
         'compareQty' => $compareQty,
     ]);
    }//End Method
    public function Comparedelete($id){
        Compare::where('user_id',Auth::id())->where('id',$id)->delete();

        return response()->json(['success' => 'Successfully Compare Deleted' ]);
    }//end MEthod
}

