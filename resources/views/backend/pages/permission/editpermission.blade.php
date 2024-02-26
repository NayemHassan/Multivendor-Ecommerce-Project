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
                    <li class="breadcrumb-item active" aria-current="page">Edit Permission</li>
                </ol>
            </nav>
            
        </div>

        <div class="ms-auto">
            <div class="btn-group">
            <a href="{{route('all.permission')}}" class="btn btn-primary">All Permission</a>
                
            </div>
        </div>

    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{route('update.permission',$permission->id)}}" id="myForm" method="post">
                @csrf
            <div class="row mb-3">
                <div class="col-sm-3">
                    <h6 class="mb-0 ">Permission Name</h6>
                </div>
                <div class="col-sm-9 form-group text-secondary">
                    <input type="text" name="name" class="form-control @error('name') is-invalid  @enderror" value="{{$permission->name}}">
                    @error('name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror

                </div>
            </div>
    
            <div class="row mb-3">
                <div class="col-sm-3">
                    <h6 class="mb-0 ">Group Name</h6>
                </div>
                <div class="col-sm-9 form-group text-secondary">
                <select class="form-select mb-3" name="group_name" aria-label="Default select example">
                    <option selected="" disabled selected hidden>Open this select Group</option>
                    <option value="brand" {{ $permission->group_name == 'brand'? 'selected' :'' }}> Brand</option>
                    <option value="category" {{ $permission->group_name == 'category'? 'selected' :'' }}>Category</option>
                    <option value="subcategory" {{ $permission->group_name == 'subcategory'? 'selected' :'' }}>Sub-Category</option>
                    <option value="product" {{ $permission->group_name == 'product'? 'selected' :'' }}>Product Management</option>
                    <option value="slider" {{ $permission->group_name == 'slider'? 'selected' :'' }}>Slider</option>
                    <option value="banner" {{ $permission->group_name == 'banner'? 'selected' :'' }}>Banner</option>
                    <option value="coupon" {{ $permission->group_name == 'coupon'? 'selected' :'' }}>Coupon</option>
                    <option value="shipping" {{ $permission->group_name == 'shipping'? 'selected' :'' }}>Shipping Area</option>
                    <option value="vendor" {{ $permission->group_name == 'vendor'? 'selected' :'' }}>Vendor Manage</option>
                    
                </select>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-9 text-secondary">
                    <input type="submit" class="btn btn-primary px-4" value="Update Permission">
                </div>
            </div>
        </form>
        </div>
    </div>
</div>
<script type = "text/javascript">

    $(document).ready(function(){
    $('#myForm').validate({
            rules: {
                name: {
                    required : true,
                },
                group_name: {
                    required : true,
                },
            },
            messages :{
                name: {
                    required : 'Please Enter The Permission  Name',
                },
                group_name: {
                    required : 'Please Select The Group name',
                },
            },
            errorElement : 'span',
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
                $(element).addClass('is-valid');
            },
        });
    });
    </script>
@endsection
