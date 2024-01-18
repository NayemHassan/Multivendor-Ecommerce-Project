@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Table</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Categories Datatable</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
				
				<h6 class="mb-0 text-uppercase">DataTable List</h6>
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example2" class="table table-striped table-bordered">
								<thead>
                                <tr>
                                <th>ID</th>
                                <th>Category Name</th>
                                <th>Category Slug</th>
                                <th>Category  Image</th>
                                <th>Action</th>

                            </tr>
								</thead>
								<tbody>
                                @foreach($catData as $key => $data)

                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$data->categories_name}}</td>
                                    <td>{{$data->categories_slug}}</td>
                                    <td><img src="{{asset('frontend_upload/categories/'.$data->categories_image)}}" height="60" width="60"></td>
                                    <td><a href="{{route('view.edit.category',$data->categories_slug)}}" class="btn btn-sm btn-warning" title="Edit Data">Edit</a>
                                            <a href="{{route('delete.categories',$data->categories_slug)}}"  class="btn btn-sm btn-danger" id ="delete" title="Delete Data">Delete</a></td>

                                </tr>
                                @endforeach
								</tbody>
								<tfoot>
                                <th>ID</th>
                                <th>Category Name</th>
                                <th>Category Slug</th>
                                <th>Category  Image</th>
                                <th>Action</th>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
			</div>
@endsection