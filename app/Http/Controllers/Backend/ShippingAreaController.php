<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShipDivision;
use App\Models\ShipDistricts;
use App\Models\ShipState;
use Carbon\Carbon;
class ShippingAreaController extends Controller
{
    public function AllDivisionView(){
        $division  = ShipDivision::latest()->get();
       return view('backend.shipping_area.all_ship_division',compact('division'));
    }//End Method
    public function AddDivision(){
       return view('backend.shipping_area.add_ship_division');
    }//End Method

    public function StoreDivision(Request $request){
        ShipDivision::insert([
            'division_name' =>  $request->division_name,
            'created_at' =>  Carbon::now(),

        ]);
        $notification = array(
            'message' =>'Add Division Successfully ',
            'alert-type'=> 'info'
         );
           return redirect()->route('all.division')->with($notification);
    }//End MEthod
  
    public function EditDivision($id){
        $divi = ShipDivision::findOrFail($id);
        return view('backend.shipping_area.edit_division',compact('divi'));

    }//End Method
    public function UpdateDivision(Request $request){
        $division = $request->division_id;
        ShipDivision::findOrFail($division)->update([
            'division_name' =>  $request->division_name,
            'updated_at' =>  Carbon::now(),

        ]);
        $notification = array(
            'message' =>'Update Division Successfully ',
            'alert-type'=> 'info'
         );
           return redirect()->route('all.division')->with($notification);
    }//End MEthod
    public function DeleteDivision($id){
        ShipDivision::findOrFail($id)->delete();
        $notification = array(
            'message' =>'Delete Division Successfully ',
            'alert-type'=> 'info'
         );
           return redirect()->route('all.division')->with($notification);
    }
    //End Method
    /////Distrits Method Start////
    public function AllDistrictsView(){
        $districts = ShipDistricts::latest()->get();
        return view('backend.shipping_area.all_districts_view',compact('districts'));
    }//End Method
    /////Distrits Method Start////
    public function AddDistricts(){
        $division = ShipDivision::orderBy('division_name','ASC')->get();
        return view('backend.shipping_area.add_districts',compact('division'));
    }//End Method
    public function StoreDistricts(Request $request){
        ShipDistricts::insert([
            'division_id' => $request->division_name,
            'distrits_name' => $request->distrits_name,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' =>'Insert Disrict Successfully ',
            'alert-type'=> 'info'
        );
        return redirect()->route('all.districts')->with($notification);
    }//End Method

    public function EditDistrict($id){
        $divi = ShipDivision::orderBy('division_name','ASC')->get();
      $dist =   ShipDistricts::findOrFail($id);
        return view('backend.shipping_area.edit_districts',compact('dist','divi'));
    }//End Method
    public function UpdateDistricts(Request $request){
        $district= $request->district_id;
        ShipDistricts::findOrFail($district)->update([
            'division_id' => $request->division_id,
            'distrits_name' => $request->distrits_name,
            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' =>'Update District Successfully ',
            'alert-type'=> 'info'
        );
        return redirect()->route('all.districts')->with($notification);
    }//End Method
    public function DeleteDistricts($id){
        ShipDistricts::findOrFail($id)->delete();
        $notification = array(
            'message' =>'Delete District Successfully ',
            'alert-type'=> 'info'
        );
        return redirect()->route('all.districts')->with($notification);
    }//End Method
    public function AllStateView(){
        $state = ShipState::latest()->get();

        return view('backend.shipping_area.all_state',compact('state'));
    }//End Method
    ///////////////States/////////////
    public function AddState(){
        $division = ShipDivision::orderBy('division_name','ASC')->get();
        return view('backend.shipping_area.add_state',compact('division'));
    }//End Method

    public function DistrictsAjax($division_id){
        $districts =ShipDistricts::where('division_id',$division_id)->orderBy('distrits_name','ASC')->get();
       return  json_encode($districts);
    }//End Method
    public function StoreState(Request $request){
        ShipState::insert([
            'division_id' =>$request->division_id,
            'districts_id' =>$request->district_id,
            'state_name' =>$request->State_name,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' =>'State Inserted Successfully ',
            'alert-type'=> 'info'
        );
        return redirect()->route('all.state')->with($notification);
    }//End Method
    public function EditState($id){
        $division = ShipDivision::orderBy('division_name','ASC')->get();
        $dist = ShipDistricts::orderBy('distrits_name','ASC')->get();
        $state = ShipState::findOrFail($id);
        return view('backend.shipping_area.edit_state',compact('division','state','dist'));
    }//End Method 

    public function UpdateState(Request $request){
        $state_id = $request->state_id;
        ShipState::findOrFail($state_id)->update([
            'division_id' =>$request->division_id,
            'districts_id' =>$request->districts_id,
            'state_name' =>$request->State_name,
            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' =>'State Updated Successfully ',
            'alert-type'=> 'info'
        );
        return redirect()->route('all.state')->with($notification);
    }//End Method
    public function DeleteState($id){
        ShipState::findOrFail($id)->delete();
        $notification = array(
            'message' =>'State Deleted Successfully ',
            'alert-type'=> 'info'
        );
        return redirect()->route('all.state')->with($notification);
    }






}