@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="page-content">

	<!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">eCommerce</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Edit Product</li>
							</ol>
						</nav>
					</div>
                    <div class="ms-auto">
						<div class="btn-group">
							<a href="{{route('add.product')}}" class="btn btn-primary" >
							All Product List
							</a>
						</div>
					</div>
				</div>
				<!--end breadcrumb-->
              <div class="card">
				  <div class="card-body p-4">
					  <h5 class="card-title">Edit Product</h5>
					  <hr/>
					  <form action="{{route('update.product')}}" id ="myForm" method="post" >
                       @csrf
                       <input type="hidden" name="slug" value="{{$product->product_slug}}">
                       <div class="form-body mt-4">
					    <div class="row">
						   <div class="col-lg-8">
                           <div class="border border-3 p-4 rounded">
							<div class="mb-3 form-group">
								<label for="inputProductTitle " class="form-label ">Product Name</label>
								<input type="text" class="form-control"  name="product_name" id="inputProductTitle" value="{{$product->product_name}}" placeholder="Enter product Name">
							  </div>
							<div class="mb-3 form-group">
								<label for="inputProductTitle" class="form-label">Product Tag</label>
								<input type="text" class="form-control visually-hidden" name="product_tag" value="{{$product->product_tag}}" data-role="tagsinput" >
							  </div>
							<div class="mb-3 form-group">
								<label for="inputProductTitle" class="form-label">Product Size</label>
								<input type="text" class="form-control visually-hidden" name="product_size" value="{{$product->product_size}}"  data-role="tagsinput" value="Small,Mediam,Large,">
							  </div>
							<div class="mb-3 form-group">
								<label for="inputProductTitle" class="form-label">Product Color</label>
								<input type="text" class="form-control visually-hidden" name="product_color" value="{{$product->product_color}}" data-role="tagsinput" value="Red,Blue,Black,Purple">
							  </div>
							  <div class="mb-3 form-group">
								<label for="inputProductDescription" class="form-label">Short Description</label>
								<textarea class="form-control" name="short_desc" id="inputProductDescription"  rows="3">{{$product->short_desc}}</textarea>
							  </div>
							  <div class="mb-3 form-group">
								<label for="ipnutlongdes" class="form-label">Long Description</label>
								<textarea id="mytextarea" id="ipnutlongdes" name="long_desc" >{!!$product->long_desc!!}</textarea>
							  </div>
                            </div>
						   </div>
						   <div class="col-lg-4">
							<div class="border border-3 p-4 rounded">
                              <div class="row g-3">
								<div class="col-md-6 form-group">
									<label for="inputPrice" class="form-label">Product Price</label>
									<input type="text" name="selling_price" class="form-control"  value="{{$product->selling_price}}" placeholder="00.00">
								  </div>
								  <div class="col-md-6 ">
									<label for="inputCompareatprice" class="form-label">Discount Price</label>
									<input type="text" name="discount_price" class="form-control"  value="{{$product->discount_price}}" placeholder="00.00">
								  </div>
								  <div class="col-md-6 form-group">
									<label for="inputCostPerPrice" class="form-label">Product Code</label>
									<input type="text" name="product_code" class="form-control"  value="{{$product->product_code}} " placeholder="00.00">
								  </div>
								  <div class="col-md-6 form-group">
									<label for="inputStarPoints" class="form-label">Product QTY</label>
									<input type="text" name="product_qty" class="form-control"  value="{{$product->product_qty}} "placeholder="00.00">
								  </div>
								  <div class="col-12 form-group">
									<label for="inputProductType" class="form-label">Brand Name</label>
									<select class="form-select" name="brand_id" id="inputProductType">
										<option></option>
                                        @foreach($brands as $brand)
										<option value="{{$brand->id}}" {{$brand->id == $product->brand_id ? 'selected' :' '}} >{{$brand->brand_name}}</option>
										@endforeach
									  </select>
								  </div>
								  <div class="col-12 form-group">
									<label for="inputVendor" class="form-label">Category Name</label>
									<select class="form-select" name="category_id" id="inputVendor">
										<option></option>
                                        @foreach($category as $cat)
										<option value="{{$cat->id}}" {{$cat->id ==$product->category_id? 'selected':''}}>{{$cat->categories_name}}</option>
										@endforeach
									  </select>
								  </div>
								  <div class="col-12 form-group">
                                 
									<label for="inputCollection" class="form-label">Sub-Category Name</label>
									<select class="form-select" name="subcategory_id" id="inputCollection">
                                    <option></option>
                                    @foreach($subCategiry as $subCat)
										<option value="{{$subCat->id}}" {{$subCat->id == $product->subcategory_id? 'selected' :''}} {{$subCat->subcategory_name}} </option>
									  </select>
                                      @endforeach
								  </div>
								  <div class="col-12 form-group">
									<label for="inputCollection" class="form-label">Select The Vendor</label>
									<select class="form-select" name="vendor_id" id="inputCollection">
										<option></option>
                                        @foreach($vendors as $vendor )
										<option value="{{$vendor->id}}" {{$vendor->id == $product->vendor_id? 'selected':''}}>{{$vendor->name}}</option>
                                        @endforeach
									  </select>
								  </div>
								  <div class="col-12">
                                  <div class="row g-3">
                                    <div class="col-6">
                                    <div class="form-check">
									<input class="form-check-input" type="checkbox" name="hot_deal" {{$product->hot_deal == 1?'checked' : ''}} value="1"  id="flexCheckDefault">
									<label class="form-check-label"for="flexCheckDefault">Hot Deals</label>
								</div>
                                    </div>
                                    <div class="col-6">
                                    <div class="form-check">
									<input class="form-check-input" type="checkbox" name="special_deal"  {{$product->special_deal == 1 ?'checked':''}} value="1" id="flexCheckDefault1">
									<label class="form-check-label"  for="flexCheckDefault1">Special Deals</label>
								</div>
                                    </div>
                                    <div class="col-6">
                                    <div class="form-check">
									<input class="form-check-input" type="checkbox" name="featured"  {{$product->featured == 1 ?'checked':''}} value="1" id="flexCheckDefault2">
									<label class="form-check-label"  for="flexCheckDefault2">Fetured</label>
								</div>
                                    </div>
                                    <div class="col-6">
                                    <div class="form-check">
									<input class="form-check-input" type="checkbox"  name="special_offer"  {{$product->special_offer == 1 ?'checked':''}} value="1" id="flexCheckDefault3">
									<label class="form-check-label" for="flexCheckDefault3">Special Offer</label>
								</div>
                                    </div>
                                  </div>
								  </div>
                                  <hr>
								  <div class="col-12">
									  <div class="d-grid">
                                         <button type="submit" class="btn btn-primary">Save Product</button>
									  </div>
								  </div>
							  </div> 
						  </div>
						  </div>
					   </div><!--end row-->
					</div>
					</form>

				  </div>
			  </div>




</div>

<!--Product Thumbnail Upadte-->
<div class="page-content">
              <div class="card">
				  <div class="card-body p-4">
					  <h5 class="card-title">Edit Thumbnail</h5>
                      <hr>
					
					  <form action="{{route('update.product.thumbnail')}}" id ="myForm" method="post" enctype="multipart/form-data">
                       @csrf
                       <input type="hidden" name="thumb_id" value="{{$product->product_slug}}">
                       <div class="form-body mt-4">
					    <div class="row">
						   <div class="col-lg-8">
                           <div class="border border-3 p-4 rounded">
                           <div class="mb-3 form-group">
								<label for="inputProductTitle" class="form-label"></label>
								<input type="file" class="form-control" name="product_thumbnail" id="inputProductTitle" onChange="mainThamUrl(this)">
                                <br>
                                <img src="{{asset('frontend_upload/product/thumbnail/'.$product->product_thumbnail)}}" height="100" width ="100" id="mainThmb" />
							  </div>
                              <button type="submit" class="btn btn-primary">Update Thumbnail</button>
                            </div>
                            </div>
							</div>
                                
								  
							</div> 
						
					</form>

				  </div>
			  </div>          
</div>
<!-- Update multiimage -->
<div class="page-content">            
            <h5 class="card-title">Update Multi Image</h5>
            <hr>					
            <div class="card">
            <div class="card-body">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th scope="col">#SI</th>
                            <th scope="col">Image</th>
                            <th scope="col">Change Image</th>
                            <th scope="col">Update Image</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                    <form action="{{route('update.product.multiimage')}}" id ="myForm" method="post" enctype="multipart/form-data">
                        @csrf
                        @foreach($multiImg as $key=> $img)
                        <tr>  
                            <td>{{$key+1}}</td>
                            <td>
                                <img src="{{asset('frontend_upload/product/multiimage/'.$img->photo_name)}}" height="70" width="40" alt="">
                            </td>
                            <td>
                                <input type="file" class="form-group" name="multi_img[{{$img->id}}]">
                            </td>
                            <td>
                                <input type="submit" class="btn btn-info btn-sm" value="Update Image"></td>                            
                            <td>
                                <a href="{{route('product.multiimage.delete',$img->id)}}" id="delete" class="btn btn-sm btn-danger">Delete</a>
                           </td>   
                        </tr>
                        @endforeach
                        </form>	
                    </tbody>
                    <tfoot>
                        <tr>
                            <th scope="col">#SI</th>
                            <th scope="col">Image</th>
                            <th scope="col">Change Image</th>
                            <th scope="col">Update Image</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            </div>                        				          
</div>

<script type="text/javascript">
	function mainThamUrl(input){
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e){
				$('#mainThmb').attr('src',e.target.result).width(80).height(80);
			};
			reader.readAsDataURL(input.files[0]);
		}
	}
</script>
<script> 
 
  $(document).ready(function(){
   $('#multiImg').on('change', function(){ //on file input change
      if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
      {
          var data = $(this)[0].files; //this file data
           
          $.each(data, function(index, file){ //loop though each file
              if(/(\.|\/)(gif|jpe?g|png|webp)$/i.test(file.type)){ //check supported file type
                  var fRead = new FileReader(); //new filereader
                  fRead.onload = (function(file){ //trigger function on successful read
                  return function(e) {
                      var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(100)
                  .height(80); //create image element 
                      $('#preview_img').append(img); //append image to output element
                  };
                  })(file);
                  fRead.readAsDataURL(file); //URL representing the file's data.
              }
          });
           
      }else{
          alert("Your browser doesn't support File API!"); //if File API is absent
      }
   });
  });
   
  </script>
  <script type="text/javascript">
	$(document).ready(function(){
		$('select[name="category_id"]').on('change',function(){
			var category_id = $(this).val();
			if(category_id){
				$.ajax({
					url:"{{('/subcategory_id/ajax')}}/"+category_id,
					type:"GET",
					dataType:'json',
					success:function(data){
						$('select[name = "subcategory_id"]').html('');
						var d = $('select[name= "subcategory_id"]').empty();
						$.each(data,function(key,value){
							$('select[name= "subcategory_id"]').append(
								'<option value="'+value.id+'">'+value.subcategory_name +'</option>')
						});
					},
				});
			}
			else{
				alert('Danger');
			}
		});
	});
  </script>
  <script>
	    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                product_name: {
                    required : true,
                },
                product_tag: {
                    required : true,
                },
              
                short_desc: {
                    required : true,
                },
                long_desc: {
                    required : true,
                },
                product_thumbnail: {
                    required : true,
                },
                photo_name: {
                    required : true,
                },
                selling_price: {
                    required : true,
                },
               
                product_code: {
                    required : true,
                },
                product_qty: {
                    required : true,
                },
                brand_id: {
                    required : true,
                },
                category_id: {
                    required : true,
                },
                subcategory_id: {
                    required : true,
                },
               

            },
            messages :{
                product_name: {
                    required : 'Please Enter The Product Name',
                },
                product_tag: {
                    required : 'Please Enter The Product Tag',
                },
              
                short_desc: {
                    required : 'Please Enter Short Description',
                },
                long_desc: {
                    required : 'Please Enter long Description ',
                },
                product_thumbnail: {
                    required : 'Please Select Photo Thumbnail',
                },
                selling_price: {
                    required : 'Please Enter Product Price',
                },
                photo_name: {
                    required : 'Please Select Multiple Photo',
                },
                discount_price: {
                    required : 'Please Enter Product Discount',
                },
                product_code: {
                    required : 'Please Enter The Product Code',
                },
                product_qty: {
                    required : 'Please Enter  Product Quantity',
                },
                brand_id: {
                    required : 'Please Enter The Brand Name',
                },
                category_id: {
                    required : 'Please Select The Category',
                },
                subcategory_id: {
                    required : 'Please Select the Sub-Category',
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
