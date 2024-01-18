@extends('admin.admin_dashboard')
@section('admin')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Tables</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Product Table <span class=" badge rounded-pill bg-danger"> {{count($products)}}</span> </li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
							<a href="{{route('add.product')}}" class="btn btn-sm btn-primary" >
							<button type="button" class="btn btn-primary">Add Product</button>
							</a>
						</div>
					</div>
				</div>
				<!--end breadcrumb-->
				
				<h6 class="mb-0 text-uppercase">Product DataTable</h6>
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example2" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>Sl</th>
										<th>Product Name</th>
										<th>Image</th>
										<th>Selling Price</th>
										<th>QTY</th>
										<th>Discount</th>
										<th>Status</th>
										<th>Action</th>
										
									</tr>
								</thead>
								<tbody>
                                    @foreach($products as $key=> $item)
									<tr>
										<td>{{$key+1}}</td>
										<td>{{$item->product_name}}</td>
										<td><img src="{{asset('frontend_upload/product/thumbnail/'.$item->product_thumbnail)}}"  height="60" width ="60" alt="Product Thumbnail"></td>
										<td>{{$item->selling_price}}</td>
										<td>{{$item->product_qty}}</td>
										
										<td>
										@if($item->discount_price == NULL)
										<span class="badge rounded-pill bg-info">No Discount</span>
										@else
										@php
											$amount =  $item->selling_price - $item->discount_price;
											$discount = ($amount/$item->selling_price )*100;
											
										@endphp
										<span class="badge rounded-pill bg-danger">{{round($discount)}}%</span>
										@endif
										</td>

										<td> @if( $item->status == 1)
											<span class="badge rounded-pill bg-success">Active</span>
											@else
											<span class="badge rounded-pill bg-danger">InActive</span>
											@endif
										</td>
										<td>
                                            <a href="{{route('product.edit',$item->id)}}" class="btn btn-sm btn-warning pb-2" title="Edit Data"><i class="fas fa-edit"></i></i></a>

                                            <a href="{{route('product.delete',$item->id)}}"  class="btn btn-sm btn-danger pb-2" id ="delete" title="Delete Data"><i class="fas fa-trash-alt"></i></a>
                                            <a href=""  class="btn btn-sm btn-info pb-2" title="Eye Data"><i class="fas fa-eye"></i></a>
											@if( $item->status == 1)
                                            <a href="{{route('product.inactive',$item->id)}}"  class="btn btn-sm btn-primary pb-2"  title="Inactive Data"><i class="fas fa-thumbs-up"></i></a>
											@else
											<a href="{{route('product.active',$item->id)}}"  class="btn btn-sm btn-primary pb-2"  title="Active Data"><i class="fas fa-thumbs-down"></i></a>
											@endif
                                        </td>										
									</tr>
                                 @endforeach
								</tbody>
								<tfoot>
									<tr>
                                        <th>Sl</th>
										<th>Product Name</th>
										<th>Image</th>
										<th> SellingPrice</th>
										<th>QTY</th>
										<th>Discount</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
			</div>
@endsection