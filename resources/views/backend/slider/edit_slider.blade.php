@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content" bis_skin_checked="1">
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Edit Slider</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Edit Slider Page</li>
            </ol>
        </nav>
        
    </div>
    <div class="ms-auto">
        <div class="btn-group">
            <a href="{{route('show.all.slider')}}" class="btn btn-primary"> All Slide List</a>
        </div>
	</div>
</div>
<div class="col-lg-12" bis_skin_checked="1">
    <div class="card" bis_skin_checked="1">
        <div class="card-body" bis_skin_checked="1">

            <form action="{{route('update.slider')}}" id ="myForm" method="post" enctype="multipart/form-data">
                @csrf
                    <input type="hidden" name="slide" value="{{$slide->slider_slug}}">
                <div class="row mb-3" bis_skin_checked="1">
                <div class="col-sm-3" bis_skin_checked="1">
                    <h6 class="mb-0">Slide Title</h6>
                </div>
                <div class="col-sm-9 text-secondary form-group" bis_skin_checked="1">
                    <input type="text" name="slider_title" class="form-control" value="{{ $slide->slider_title}}">

                </div>
              </div>
                <div class="row mb-3" bis_skin_checked="1">
                <div class="col-sm-3" bis_skin_checked="1">
                    <h6 class="mb-0">Slide  Short Title</h6>
                </div>
                <div class="col-sm-9 text-secondary form-group" bis_skin_checked="1">
                    <input type="text" name="slider_short_title" class="form-control" value="{{ $slide->slider_short_title}}">

                </div>
              </div>

            <div class="row mb-3" bis_skin_checked="1">
                <div class="col-sm-3" bis_skin_checked="1">
                    <h6 class="mb-0">Photo</h6>
                </div>
                <div class="col-sm-9 text-secondary" bis_skin_checked="1">
                    <input type="file" name="slider_image" id="image" class="form-control ">

                </div>
            </div>
            <div class="row mb-3" bis_skin_checked="1">
                <div class="col-sm-3" bis_skin_checked="1">
                    <h6 class="mb-0"></h6>
                </div>
                <div class="col-sm-9 text-secondary" bis_skin_checked="1">
                <img id="showImage" src="{{asset('frontend_upload/slider/'.$slide->slider_image)}}" width="120" height="120" alt="profile">

            </div>
            </div>
            <div class="row" bis_skin_checked="1">
                <div class="col-sm-3" bis_skin_checked="1"></div>
                <div class="col-sm-9 text-secondary" bis_skin_checked="1">
                    <input type="submit" class="btn btn-primary px-4" value="Update Slide">
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
                slider_title: {
                    required : true,
                },
                slider_short_title: {
                    required : true,
                },
               
            },
            messages :{
                slider_title: {
                    required : 'Please Enter The Slide Title',
                },
                slider_short_title: {
                    required : 'Please Enter The  Short Title',
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
