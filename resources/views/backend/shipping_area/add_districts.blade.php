@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content" bis_skin_checked="1">
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Add Districts</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Add Districts Page</li>
            </ol>
        </nav>
       
    </div>
    <div class="ms-auto">
        <div class="btn-group">
            <a href="{{route('all.districts')}}" class="btn btn-primary"> All Districts</a>
        </div>
	</div>
</div>
<div class="col-lg-12" bis_skin_checked="1">
    <div class="card" bis_skin_checked="1">
        <div class="card-body" bis_skin_checked="1">

            <form action="{{route('store.districts')}}" id ="myForm" method="post">
                @csrf
                   
                <div class="row mb-3" bis_skin_checked="1">
                <div class="col-sm-3" bis_skin_checked="1">
                    <h6 class="mb-0">Division Name</h6>
                </div>
                <div class="col-sm-9 text-secondary form-group" bis_skin_checked="1">
                <select class="form-select" name ="division_name"  aria-label="Default select example">
                            <option selected="" value=""> Select Division</option>
                            @foreach ( $division as $div)
                            <option value="{{$div->id}}">{{$div->division_name}}</option>
                            @endforeach
                        </select>      
                </div>
              </div>
                <div class="row mb-3" bis_skin_checked="1">
                <div class="col-sm-3" bis_skin_checked="1">
                    <h6 class="mb-0">Districts Name</h6>
                </div>
                <div class="col-sm-9 text-secondary form-group" bis_skin_checked="1">
                    <input type="text" name="distrits_name" class="form-control" value="">

                </div>
              </div>
                

            <div class="row" bis_skin_checked="1">
                <div class="col-sm-3" bis_skin_checked="1"></div>
                <div class="col-sm-9 text-secondary" bis_skin_checked="1">
                    <input type="submit" class="btn btn-primary px-4" value="Add Districts">
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
                division_name: {
                    required : true,
                },
                distrits_name: {
                    required : true,
                },
              
            },
            messages :{
                division_name: {
                    required : 'Please Select The Division Name',
                },
                distrits_name: {
                    required : 'Please EnterThe Districts Name',
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
