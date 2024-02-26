<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Carbon\Carbon;
class RoleController extends Controller
{
    public function AllPermission(){
         $permissions = Permission::all();
         return view('backend.pages.permission.all_permission',compact('permissions'));
     
    }//End Method
    public function AddPermission(){
        return view('backend.pages.permission.add_permission');
    }//End Method
    public function StorePermission(Request $request){
        $request->validate([
            'name' => 'required|unique:permissions,name,NULL,id,guard_name,web',
           
        ]);
        $permission =  Permission::create([
            'name' => $request->name,
            'group_name' => $request->group_name,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
         'message' => 'Permission Added Successfully',
            'alert-type' =>'success'
        );
        return redirect()->route('all.permission')->with($notification);
    }//
    public function EditPermission($id){
        $permission = Permission::findOrFail($id);
        return view('backend.pages.permission.editpermission',compact('permission'));
    }//End Method
    public function UpdatePermission(Request $request,$id){
        $request->validate([
            'name' => 'required|unique:permissions,name,NULL',
        ]);
        $permission = Permission::findOrFail($id)->update([
            'name' =>$request->name,
            'group_name' => $request->group_name,
            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
             'alert-type' =>'success',
             'message' => 'Permission Updated Successfully'
        );
        return redirect()->route('all.permission')->with($notification);

    }//End Method
    public function DeletePermission($id){
        Permission::findOrFail($id)->delete();
        $notification = array(
             'alert-type' =>'success',
            'message' => 'Permission Deleted Successfully'
        );
        return redirect()->route('all.permission')->with($notification);
    }//End Method
     //////////////////////////////////Role//////////////////////////////////
     public function AllRole(){
         $roles = Role::all();
         return view('backend.pages.role.all_role',compact('roles'));
     
    }//End Method
    public function AddRole(){
        return view('backend.pages.role.add_role');
    }//End Method
    public function StoreRole(Request $request){
        $request->validate([
            'name' =>'required|unique:roles,name,NULL,id,guard_name,web',
           
        ]);
        $role =  Role::create([
            'name' => $request->name,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
        'message' => 'Role Added Successfully',
            'alert-type' =>'success'
        );
        return redirect()->route('all.role')->with($notification);
    }//End Method
    public function EditRole($id){
        $role = Role::findOrFail($id);
        return view('backend.pages.role.edit_role',compact('role'));
    }//End Method
    public function UpdateRole(Request $request,$id){

        $request->validate([
            'name' =>'required|unique:roles,name,NULL',
        ]);
        $role = Role::findOrFail($id)->update([
            'name' =>$request->name,
            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
             'alert-type' =>'success',
            'message' => 'Role Updated Successfully'
        );
        return redirect()->route('all.role')->with($notification);
    }//End Method
    public function DeleteRole($id){
        Role::findOrFail($id)->delete();
        $notification = array(
             'alert-type' =>'success',
           'message' => 'Role Deleted Successfully'
        );
        return redirect()->route('all.role')->with($notification);
    }//End Method
    public function AddRolePermission(){
        $roles = Role::all();
        $permissions = Permission::all();
        $permission_group = User::getpermissiongroup();
        return view('backend.pages.role_permission.role_permission',compact('roles','permissions','permission_group'));

    }

































}
