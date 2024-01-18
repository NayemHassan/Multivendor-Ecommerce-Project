<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Slider;
use Image;
class SliderController extends Controller
{
    public function AllSliderView(){
        $slider = Slider::latest()->get();
        return view('Backend.slider.all_slider_view',compact('slider'));
    }//End Method
    public function AddSlider(){
        return view('Backend.slider.add_slider');
    }//End MEthod
    public function StoreSlider(Request $request){
        $image= $request->slider_image;
        $img_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(2376,807)->save('frontend_upload/slider/'.$img_name);
        $save_db = $img_name;
        Slider::insert([
            'slider_title' =>$request->slider_title,
            'slider_slug' => str::slug($request->slider_title),
            'slider_short_title' =>$request->slider_short_title,
            'slider_image' => $save_db,
        ]);
        $notification = array(
            'message' =>'Slide Insert Successfully ',
            'alert-type'=> 'info'
         );
        return redirect()->route('show.all.slider')->with($notification);
    }//End Method
    public function EditSlider($slug){
        $slide = Slider::where('slider_slug',$slug)->first();
        return view('Backend.slider.edit_slider',compact('slide'));
    }//End Method
    
    public function UpdateSlider(Request $request){
        $slug = $request->slide;
        if( $request->slider_image){
            $image= $request->slider_image;
            $img_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(2376,807)->save('frontend_upload/slider/'.$img_name);
            $save_db = $img_name;
            Slider::where('slider_slug',$slug )->first()->update([
                'slider_title' =>$request->slider_title,
                'slider_slug' => str::slug($request->slider_title),
                'slider_short_title' =>$request->slider_short_title,
                'slider_image' => $save_db,
            ]);
            $notification = array(
                'message' =>'Slide Update With Image Successfully ',
                'alert-type'=> 'info'
             );
        }
       
        else{
            Slider::where('slider_slug',$slug )->first()->update([
                'slider_title' =>$request->slider_title,
                'slider_slug' => str::slug($request->slider_title),
                'slider_short_title' =>$request->slider_short_title,
            ]); 
            $notification = array(
                'message' =>'Slide Update Without Image Successfully ',
                'alert-type'=> 'info'
             );
        }
      
        return redirect()->route('show.all.slider')->with($notification);
    }//End Method
    public function DeleteSlider($slug){
        
        $id = Slider::where('slider_slug',$slug)->first();
        $path = public_path('frontend_upload/slider/'.$id->slider_image);
        if(file_exists($path)){
            @unlink($path);
        }
        Slider::where('slider_slug',$slug )->first()->delete();
        $notification = array(
            'message' =>'Slide Deleted Successfully ',
            'alert-type'=> 'info'
         );
        return redirect()->route('show.all.slider')->with($notification);
    }//End Method
}
