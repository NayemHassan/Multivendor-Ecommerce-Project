@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content" bis_skin_checked="1">
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Add Coupon</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Add Coupon Page</li>
            </ol>
        </nav>
        
    </div>
    <div class="ms-auto">
        <div class="btn-group">
            <a href="{{route('all.coupon')}}" class="btn btn-primary"> All Coupon</a>
        </div>
	</div>
</div>
<div class="col-lg-12" bis_skin_checked="1">
    <div class="card" bis_skin_checked="1">
        <div class="card-body" bis_skin_checked="1">

            <form action="{{route('update.coupon')}}" id ="myForm" method="post">
                @csrf
                <input type="hidden" name="coupon_id" value="{{$eCoupon->id}}">
                <div class="row mb-3" bis_skin_checked="1">
                <div class="col-sm-3" bis_skin_checked="1">
                    <h6 class="mb-0">Coupon Name</h6>
                </div>
                <div class="col-sm-9 text-secondary form-group" bis_skin_checked="1">
                    <input type="text" name="coupon_name" class="form-control" value="{{$eCoupon->coupon_name}}">

                </div>
              </div>
                <div class="row mb-3" bis_skin_checked="1">
                <div class="col-sm-3" bis_skin_checked="1">
                    <h6 class="mb-0">Coupon Discount(%)</h6>
                </div>
                <div class="col-sm-9 text-secondary form-group" bis_skin_checked="1">
                    <input type="text" name="coupon_discount" class="form-control" value="{{$eCoupon->coupon_discount}}">
                </div>
              </div>
                <div class="row mb-3" bis_skin_checked="1">
                <div class="col-sm-3" bis_skin_checked="1">
                    <h6 class="mb-0">Coupon Validity</h6>
                </div>
                <div class="col-sm-9 text-secondary form-group" bis_skin_checked="1">
                    <input type="date" name="coupon_validity" class="form-control" value="{{$eCoupon->coupon_validity}}">
                </div>
              </div>

     
            <div class="row" bis_skin_checked="1">
                <div class="col-sm-3" bis_skin_checked="1"></div>
                <div class="col-sm-9 text-secondary" bis_skin_checked="1">
                    <input type="submit" class="btn btn-primary px-4" value="Update Coupon">
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
                coupon_name: {
                    required : true,
                },
                coupon_discount: {
                    required : true,
                },
                coupon_validity: {
                    required : true,
                },
            },
            messages :{
                coupon_name: {
                    required : 'Please Enter The Coupon Name',
                },
                coupon_discount: {
                    required : 'Please Enter The  Coupon Discount(%)',
                },
                coupon_validity: {
                    required : 'Please Enter the Coupon Validity Date',
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
