@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<div class="page-content">
    <div class="card">
        <div class="card-body">
            <form action="{{route('store.category')}}" id="myForm" method="post" enctype="multipart/form-data">
                @csrf
            <div class="row mb-3">
                <div class="col-sm-3">
                    <h6 class="mb-0 ">Category  Name</h6>
                </div>
                <div class="col-sm-9 form-group text-secondary">
                    <input type="text" name="category_name" class="form-control " value="">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-3">
                    <h6 class="mb-0">Category Image</h6>
                </div>
                <div class="col-sm-9 form-group text-secondary">
                    <input type="file" name="category_image" class="form-control" id="image" value="">
                </div>
            </div>
            <div class="row mb-3 ">
                <div class="col-sm-3 ">
                    <h6 class="mb-0"></h6>
                </div>
                <div class="col-sm-9  text-secondary">
                    <img class="rounded avatar-lg" id ="showImage" height="100" width="100" src="{{url('admin_upload/no_image.jpg')}}" alt="profile">
                </div>
            </div>


            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-9 text-secondary">
                    <input type="submit" class="btn btn-primary px-4" value="Add  Category">
                </div>
            </div>
        </form>
        </div>
    </div>
</div>
<script type = "text/javascript">

    $(document).ready(function(){
    $('#image').change(function(e){
    var reader = new FileReader();
    reader.onload = function(e){
        $('#showImage').attr('src',e.target.result);
    }
    reader.readAsDataURL(e.target.files['0']);
    });
//
    $('#myForm').validate({
            rules: {
                category_name: {
                    required : true,
                },
                category_image: {
                    required : true,
                },
            },
            messages :{
                category_name: {
                    required : 'Please Enter The Category Name',
                },
                category_image: {
                    required : 'Please Select The Image',
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
            },
        });
    });
    </script>
@endsection
