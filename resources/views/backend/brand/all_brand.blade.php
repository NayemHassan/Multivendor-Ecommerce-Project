@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Tables</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Data Table</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
						<a href="{{route('add.brand')}}" class="btn btn-primary">Add Brand</a>
							
						</div>
					</div>
				</div>
				<!--end breadcrumb-->
				
				<h6 class="mb-0 text-uppercase">DataTable Import</h6>
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example2" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>Sl</th>
										<th>Brand Name</th>
										<th>Brand Slug</th>
										<th>Brand Image</th>
										<th>Action</th>
										
									</tr>
								</thead>
								<tbody>
                                    @foreach($brand as $key => $item)
									<tr>
										<td>{{$key+1}}</td>
										<td>{{$item->brand_name}}</td>
										<td>{{$item->brand_slug}}</td>
										<td><img src="{{asset('admin_upload/brand_image/'.$item->brand_image)}}" height="60px" width="60px" alt="Brand Image"></td>
										<td>
                                            <a href="{{route('view.edit.brand',$item->brand_slug)}}" class="btn btn-sm btn-warning" title="Edit Data">Edit</a>
                                            <a href="{{route('delete.brand',$item->id)}}"  class="btn btn-sm btn-danger" id ="delete" title="Delete Data">Delete</a>
                                         </td>
										
									</tr>
                                    @endforeach
								</tbody>
								<tfoot>
									<tr>
                                        <th>Sl</th>
										<th>Brand Name</th>
										<th>Brand Slug</th>
										<th>Brand Image</th>
										<th>Action</th>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
			</div>
@endsection