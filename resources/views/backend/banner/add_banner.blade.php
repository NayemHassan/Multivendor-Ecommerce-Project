@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content" bis_skin_checked="1">
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Banner</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Add Banner Page</li>
            </ol>
        </nav>
        
    </div>
    <div class="ms-auto">
        <div class="btn-group">
            <a href="{{route('show.all.banner')}}" class="btn btn-primary"> All Banner</a>
        </div>
	</div>
</div>
<div class="col-lg-12" bis_skin_checked="1">
    <div class="card" bis_skin_checked="1">
        <div class="card-body" bis_skin_checked="1">

            <form action="{{route('store.banner')}}" id ="myForm" method="post" enctype="multipart/form-data">
                @csrf
                    
                <div class="row mb-3" bis_skin_checked="1">
                <div class="col-sm-3" bis_skin_checked="1">
                    <h6 class="mb-0">Banner Name</h6>
                </div>
                <div class="col-sm-9 text-secondary form-group" bis_skin_checked="1">
                    <input type="text" name="banner_name" class="form-control" value="{{old('banner_name')}}">

                </div>
              </div>
                <div class="row mb-3" bis_skin_checked="1">
                <div class="col-sm-3" bis_skin_checked="1">
                    <h6 class="mb-0">Banner Url</h6>
                </div>
                <div class="col-sm-9 text-secondary form-group" bis_skin_checked="1">
                    <input type="text" name="banner_url" class="form-control" value="">

                </div>
              </div>

            <div class="row mb-3" bis_skin_checked="1">
                <div class="col-sm-3" bis_skin_checked="1">
                    <h6 class="mb-0">Banner Image</h6>
                </div>
                <div class="col-sm-9 text-secondary" bis_skin_checked="1">
                    <input type="file" name="banner_image" id="image" class="form-control ">

                </div>
            </div>
            <div class="row mb-3" bis_skin_checked="1">
                <div class="col-sm-3" bis_skin_checked="1">
                    <h6 class="mb-0"></h6>
                </div>
                <div class="col-sm-9 text-secondary" bis_skin_checked="1">
                <img id="showImage" src="{{url('admin_upload/no_image.jpg')}}" width="120" height="120" alt="profile">

            </div>
            </div>
            <div class="row" bis_skin_checked="1">
                <div class="col-sm-3" bis_skin_checked="1"></div>
                <div class="col-sm-9 text-secondary" bis_skin_checked="1">
                    <input type="submit" class="btn btn-primary px-4" value="Add Banner">
                </div>
            </div>
            </form>

        </div>
    </div>

</div>
</div>


<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                banner_name: {
                    required : true,
                },
                banner_url: {
                    required : true,
                },
                banner_image: {
                    required : true,
                },
            },
            messages :{
                banner_name: {
                    required : 'Please Enter The Banner Name',
                },
                banner_url: {
                    required : 'Please Enter The  Banner URL',
                },
                banner_image: {
                    required : 'Please Select Banner Image',
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
