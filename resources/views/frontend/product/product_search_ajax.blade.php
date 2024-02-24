@if($products -> isEmpty())

<h4 class="text-center text-danger">No Product Found</h4>

@else
<style>
.card{
		background-color: #fff;
		padding: 15px;
		border: none;
	}
	.input-box{
		position: relative;
	}
	.input-box i{
		position: absolute;
		right: 13px;
		top: 15px;
		color: #ced4da;
	}
	.form-control{
		height: 50px;
		background-color: #eeeeee69;
	}
	.form-control:focus{
		background-color: #eeeeee69;
		box-shadow: none;
		border-color: #eee;
	}
	.list{
		padding-top: 20px;
		padding-bottom: 10px;
		display: flex;
		align-items: center;
	}
	.border-bottom{
		border-bottom: 2px solid #eee;
	}
	.list i {
		font-size: 19px;
		color: red;
	}
	.list small{
		color: #dedddd;
	}
</style>
<div class="container">
  <div class="row d-flex justify-content-center">
    <div class="col-md-12">
        <div class="card"> 
            @foreach($products as $product)
        <a href="{{url('product/details/'.$product->id.'/'.$product->product_slug)}}">
            <div class="list border-bottom">
                <img src=" {{asset('frontend_upload/product/thumbnail/'.$product->product_thumbnail)}}" height="50px" width="50px" alt="Product Thumbnail">
                <div class="d-flex flex-column ml-5" style="margin-left:10px; font-size:16px;font-weight:bold">
                    <span>{{$product->product_name}}</span><small>${{$product->selling_price}}</small>
                </div>
            </div>
        </a>
        @endforeach
        </div>
    </div>
  </div>
</div>
@endif