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
								<li class="breadcrumb-item active" aria-current="page">Sub-categories Table</li>
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
                                <th>Sub-Category Name</th>
                                <th>Sub-Category Slug</th>
                                <th>Sub-Category Image</th>
                                <th>Action</th>

                            </tr>
								</thead>
								<tbody>
                                @foreach ( $subcat as $key=>$data )
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$data['sub_cat']['categories_name']}}</td>
                                    <td>{{$data->subcategory_name}}</td>
                                    <td>{{$data->subcategory_slug}}</td>
                                    <td>
                                        <img src="{{asset('frontend_upload/sub_categories/'.$data->subcategory_image)}}" height="60" width="60"></td>
                                    <td><a href="{{route('view.edit.subcategory',$data->subcategory_slug)}}" class="btn btn-sm btn-warning" title="Edit Data">Edit</a>
                                        <a href="{{route('delete.subcategories',$data->subcategory_slug)}}"  class="btn btn-sm btn-danger" id ="delete" title="Delete Data">Delete</a>
                                        </td>

                                </tr>
                                @endforeach
								</tbody>
								<tfoot>
                                <tr>
                                <th>ID</th>
                                <th>Category Name</th>
                                <th>Sub-Category Name</th>
                                <th>Sub-Category Slug</th>
                                <th>Sub-Category Image</th>
                                <th>Action</th>

                            </tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
			</div>
@endsection