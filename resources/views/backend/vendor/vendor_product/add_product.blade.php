@extends('vendor.vendor_dashboard')
@section('vendor')
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
								<li class="breadcrumb-item active" aria-current="page">Add Vendor Product</li>
							</ol>
						</nav>
					</div>
                    <div class="ms-auto">
						<div class="btn-group">
							<a href="{{route('all.vendor.product.show')}}" class="btn btn-primary" >
							All Product List
							</a>
						</div>
					</div>
				</div>
				<!--end breadcrumb-->

              <div class="card">
				  <div class="card-body p-4">
					  <h5 class="card-title">Add New Product</h5>
					  <hr/>
					  <form action="{{route('store.vendor.product')}}" id ="myForm" method="post" enctype="multipart/form-data">
                       @csrf
                       <div class="form-body mt-4">
					    <div class="row">
						   <div class="col-lg-8">
                           <div class="border border-3 p-4 rounded">
							<div class="mb-3 form-group">
								<label for="inputProductTitle " class="form-label ">Product Name</label>
								<input type="text" class="form-control" name="product_name" id="inputProductTitle" placeholder="Enter product Name">
							  </div>
							<div class="mb-3 form-group">
								<label for="inputProductTitle" class="form-label">Product Tag</label>
								<input type="text" class="form-control visually-hidden" name="product_tag" data-role="tagsinput" value="New Product,Top Product">
							  </div>
							<div class="mb-3 form-group">
								<label for="inputProductTitle" class="form-label">Product Size</label>
								<input type="text" class="form-control visually-hidden" name="product_size" data-role="tagsinput" value="Small,Mediam,Large,">
							  </div>
							<div class="mb-3 form-group">
								<label for="inputProductTitle" class="form-label">Product Color</label>
								<input type="text" class="form-control visually-hidden" name="product_color" data-role="tagsinput" value="Red,Blue,Black,Purple">
							  </div>
							  <div class="mb-3 form-group">
								<label for="inputProductDescription" class="form-label">Short Description</label>
								<textarea class="form-control" name="short_desc" id="inputProductDescription" rows="3"></textarea>
							  </div>
							  <div class="mb-3 form-group">
								<label for="ipnutlongdes" class="form-label">Long Description</label>
								<textarea id="mytextarea" id="ipnutlongdes" name="long_desc" ></textarea>
							  </div>
							  <div class="mb-3 form-group">
								<label for="inputProductTitle" class="form-label">Main Thumbnail</label>
								<input type="file" class="form-control" name="product_thumbnail" id="inputProductTitle" onChange="mainThamUrl(this)">
                                <br>
                                <img src="" id="mainThmb" />
							  </div>
							  <div class="mb-3 form-group">
								<label for="inputProductTitle" class="form-label">Product Multiple Image</label>
								<input type="file" class="form-control" name="photo_name[]" id="multiImg" multiple=""><br>
                                <div class="row" id="preview_img"></div>
							  </div>
                            </div>
						   </div>
						   <div class="col-lg-4">
							<div class="border border-3 p-4 rounded">
                              <div class="row g-3">
								<div class="col-md-6 form-group">
									<label for="inputPrice" class="form-label">Product Price</label>
									<input type="text" name="selling_price" class="form-control" id="inputPrice" placeholder="00.00">
								  </div>
								  <div class="col-md-6 ">
									<label for="inputCompareatprice" class="form-label">Discount Price</label>
									<input type="text" name="discount_price" class="form-control" id="inputCompareatprice" placeholder="00.00">
								  </div>
								  <div class="col-md-6 form-group">
									<label for="inputCostPerPrice" class="form-label">Product Code</label>
									<input type="text" name="product_code" class="form-control" id="inputCostPerPrice" placeholder="00.00">
								  </div>
								  <div class="col-md-6 form-group">
									<label for="inputStarPoints" class="form-label">Product QTY</label>
									<input type="text" name="product_qty" class="form-control" id="inputStarPoints" placeholder="00.00">
								  </div>
								  <div class="col-12 form-group">
									<label for="inputProductType" class="form-label">Brand Name</label>
									<select class="form-select" name="brand_id" id="inputProductType">
										<option></option>
                                        @foreach($brands as $brand)
										<option value="{{$brand->id}}">{{$brand->brand_name}}</option>
										@endforeach
									  </select>
								  </div>
								  <div class="col-12 form-group">
									<label for="inputVendor" class="form-label">Category Name</label>
									<select class="form-select" name="category_id" id="inputVendor">
										<option></option>
                                        @foreach($category as $cat)
										<option value="{{$cat->id}}">{{$cat->categories_name}}</option>
										@endforeach
									  </select>
								  </div>
								  <div class="col-12 form-group">
									<label for="inputCollection" class="form-label">Sub-Category Name</label>
									<select class="form-select" name="subcategory_id" id="inputCollection">
										<option></option>
                                       
									  </select>
								  </div>
								 
								  <div class="col-12">
                                  <div class="row g-3">
                                    <div class="col-6">
                                    <div class="form-check">
									<input class="form-check-input" type="checkbox" name="hot_deal" value="1"  id="flexCheckDefault">
									<label class="form-check-label"  for="flexCheckDefault">Hot Deals</label>
								</div>
                                    </div>
                                    <div class="col-6">
                                    <div class="form-check">
									<input class="form-check-input" type="checkbox" name="special_deal" value="1" id="flexCheckDefault1">
									<label class="form-check-label"  for="flexCheckDefault1">Special Deals</label>
								</div>
                                    </div>
                                    <div class="col-6">
                                    <div class="form-check">
									<input class="form-check-input" type="checkbox" name="featured" value="1" id="flexCheckDefault2">
									<label class="form-check-label"  for="flexCheckDefault2">Fetured</label>
								</div>
                                    </div>
                                    <div class="col-6">
                                    <div class="form-check">
									<input class="form-check-input" type="checkbox"  name="special_offer" value="1" id="flexCheckDefault3">
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
                product_size: {
                    required : true,
                },
                product_color: {
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
                vendor_id: {
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
                product_size: {
                    required : 'Please Enter The Product Size',
                },
                product_color: {
                    required : 'Please Enter The Product Color',
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
                vendor_id: {
                    required : 'Please Select The Vendor',
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
