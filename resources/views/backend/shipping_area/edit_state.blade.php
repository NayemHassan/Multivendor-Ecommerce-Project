@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<div class="page-content" bis_skin_checked="1">
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Edit States</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Edit State Page</li>
            </ol>
        </nav>
       
    </div>
    <div class="ms-auto">
        <div class="btn-group">
            <a href="{{route('all.state')}}" class="btn btn-primary"> All States</a>
        </div>
	</div>
</div>
<div class="col-lg-12" bis_skin_checked="1">
    <div class="card" bis_skin_checked="1">
        <div class="card-body" bis_skin_checked="1">

            <form action="{{route('update.state')}}" id ="myForm" method="post">
                @csrf
                   <input type="hidden" name="state_id" value="{{$state->id}}">
                <div class="row mb-3" bis_skin_checked="1">
                <div class="col-sm-3" bis_skin_checked="1">
                    <h6 class="mb-0">Division Name</h6>
                </div>
                <div class="col-sm-9 text-secondary form-group" bis_skin_checked="1">
                <select class="form-select" name ="division_id"  aria-label="Default select example">
                            <option selected="" value=""> Select Division</option>
                            @foreach ( $division as $div)
                            <option value="{{$div->id}} "{{$div->id ==$state->division_id?'selected':''}}>{{$div->division_name}}</option>
                            @endforeach
                    </select>      
                </div>
              </div>
                <div class="row mb-3" bis_skin_checked="1">
                <div class="col-sm-3" bis_skin_checked="1">
                    <h6 class="mb-0">Districts Name</h6>
                </div>
                <div class="col-sm-9 text-secondary form-group" bis_skin_checked="1">
                <select class="form-select" name ="districts_id"  aria-label="Default select example">
                            <option selected="" value=""> Select District</option>
                            @foreach ( $dist as $item)
                            <option  value="{{$item->id}}" {{$item->id ==$state->districts_id?'selected':''}}>{{$item->distrits_name}}</option>
                            @endforeach
                    </select>       
                </div>
              </div>
                <div class="row mb-3" bis_skin_checked="1">
                <div class="col-sm-3" bis_skin_checked="1">
                    <h6 class="mb-0">State Name</h6>
                </div>
                <div class="col-sm-9 text-secondary form-group" bis_skin_checked="1">
                    <input type="text" name="State_name" class="form-control" value="{{$state->state_name}}">

                </div>
              </div>
                

            <div class="row" bis_skin_checked="1">
                <div class="col-sm-3" bis_skin_checked="1"></div>
                <div class="col-sm-9 text-secondary" bis_skin_checked="1">
                    <input type="submit" class="btn btn-primary px-4" value="Update States">
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
                division_id: {
                    required : true,
                },
                district_id: {
                    required : true,
                },
                State_name: {
                    required : true,
                },
              
            },
            messages :{
                division_id: {
                    required : 'Please Select The Division Name',
                },
                district_id: {
                    required : 'Please Enter The District Name',
                },
                State_name: {
                    required : 'Please Enter The State Name',
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
