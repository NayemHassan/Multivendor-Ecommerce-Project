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
								<li class="breadcrumb-item active" aria-current="page">All Slide</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
							<a href="{{route('add.slider')}}" class="btn btn-primary"> Add Slide</a>
						</div>
					</div>
				</div>
				<!--end breadcrumb-->
				
				<h6 class="mb-0 text-uppercase">All Slider List </h6>
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example2" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>Sl</th>
										<th>Slider Title</th>
										<th>Slider Short Title</th>
										<th>Slider Image</th>
										<th>Action</th>	
									</tr>
								</thead>
								<tbody>
                                    @foreach($slider as $key => $slide)
									<tr>
										<td>{{$key+1}}</td>
										<td>{{$slide->slider_title}}</td>
										<td>{{$slide->slider_short_title}}</td>
										<td><img src="{{asset('frontend_upload/slider/'.$slide->slider_image)}}" height="60px" width="60px" alt="Brand Image"></td>
										<td>
                                            <a href="{{route('view.edit.slide',$slide->slider_slug)}}" class="btn btn-sm btn-warning p-2" title="Edit Data"> <i class="fas fa-edit"></i> </a>
                                            <a href="{{route('delete.slide',$slide->slider_slug)}}"  class="btn btn-sm btn-danger p-2" id ="delete" title="Delete Data"><i class="fas fa-trash-alt"></i></a>
                                         </td>
										
									</tr>
                                    @endforeach
								</tbody>
								<tfoot>
                                     <tr>
										<th>Sl</th>
										<th>Slider Title</th>
										<th>Slider Short Title</th>
										<th>Slider Image</th>
										<th>Action</th>	
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
			</div>
@endsection