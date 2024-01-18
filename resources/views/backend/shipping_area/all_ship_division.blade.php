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
								<li class="breadcrumb-item active" aria-current="page">All Division</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
							<a href="{{route('add.division')}}" class="btn btn-primary"> Add Division</a>
						</div>
					</div>
				</div>
				<!--end breadcrumb-->
				
				<h6 class="mb-0 text-uppercase">All Division List </h6>
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example2" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>Sl</th>
										<th>Division Name</th>
										<th>Action</th>
								
									</tr>
								</thead>
								<tbody>
                                    @foreach($division as $key => $item)
									<tr>
										<td>{{$key+1}}</td>
										<td>{{$item->division_name}}</td>
                                        
										<td>
                                            <a href="{{route('edit.division',$item->id)}}" class="btn btn-sm btn-warning p-2" title="Edit Data"> <i class="fas fa-edit"></i> </a>
                                            <a href="{{route('delete.division',$item->id)}}"  class="btn btn-sm btn-danger p-2" id ="delete" title="Delete Data"><i class="fas fa-trash-alt"></i></a>
                                         </td>
										
									</tr>
                                    @endforeach
								</tbody>
								<tfoot>
                                     <tr>
                                     <th>Sl</th>
										<th>Division Name</th>
										<th>Action</th>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
			</div>
@endsection