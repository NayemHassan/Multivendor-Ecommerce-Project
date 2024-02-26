@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="page-content">
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Table</div>

        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Add Role in Permission</li>
                </ol>
            </nav>
            
        </div>

        <div class="ms-auto">
            <div class="btn-group">
            <!-- <a href="{{route('all.role')}}" class="btn btn-primary">Check All Role</a> -->
                
            </div>
        </div>

    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{route('store.role')}}" id="myForm" method="post">
                @csrf
            <div class="row mb-3">
                <div class="col-sm-3">
                    <h6 class="mb-0 ">Role Name</h6>
                </div>
                <div class="col-sm-9 form-group text-secondary">
                <select class="form-select mb-3" aria-label="Default select example">
                <option selected="">Open this select menu</option>
                @foreach ( $roles as $role)
                <option value="{{$role->id}}">{{$role->name}}</option>
                @endforeach
                </select>

                </div>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefaultAll">
                <label class="form-check-label" for="flexCheckDefaultAll">All Permisssion Select</label>
                </div>
            <hr>
            @foreach ($permission_group as $group_permission)
            <div class="row mb-3">
                
                <div class="col-sm-3">
                <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">{{$group_permission->group_name}}</label>
                </div>
                </div>
    @php
    $permissions = App\Models\User::getpermissionGroupByName($group_permission->group_name);   
    @endphp
    <!-- //Ekhan theke id pathisi user model  -->
                <div class="col-sm-9 form-group text-secondary">
                @foreach($permissions as $permission)
                <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault1">
                <label class="form-check-label" for="flexCheckDefault1">{{$permission->name}}</label>
                </div>
                @endforeach
                <br>
                </div>
            </div>
           @endforeach
            </div>
            <div class="row mb-2">
                <div class="col-sm-3"></div>
                <div class="col-sm-9 text-secondary ">
                    <input type="submit" class="btn btn-primary px-4" value="Add Role">
                </div>
            </div>
        </form>
        </div>
    </div>
</div>
<script>
    $("#flexCheckDefaultAll").click(function(){
        if($(this).is(':checked')){
            $('input[type=checkbox]').prop('checked',true);
        }else{
            $('input[type=checkbox]').prop('checked',false);
        }
    });
</script>
@endsection
