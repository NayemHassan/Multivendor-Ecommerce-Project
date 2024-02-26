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
								<li class="breadcrumb-item active" aria-current="page">All Permission</li>
							</ol>
						</nav>
                        
					</div>

                    <div class="ms-auto">
						<div class="btn-group">
						<a href="{{route('add.permission')}}" class="btn btn-primary">Add Permission</a>
							
						</div>
					</div>

				</div>
				<!--end breadcrumb-->
				
				
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example2" class="table table-striped table-bordered">
								<thead>
                                <tr>
                                <th>ID</th>
                                <th>Permission Name</th>
                                <th>Group Name</th>
                                <th>Action</th>
                                </tr>
								</thead>
								<tbody>
                                @foreach($permissions as $key => $permission)

                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$permission->name}}</td>
                                    <td>{{$permission->group_name}}</td>
                                    <td>
                                    <a href="{{route('edit.permission',$permission->id)}}" class="btn btn-sm btn-warning" title="Edit Data">Edit</a>
                                    <a href="{{route('delete.permission',$permission->id)}}"  class="btn btn-sm btn-danger" id ="delete" title="Delete Data">Delete</a>
                                    </td>

                                </tr>
                                @endforeach
								</tbody>
								<tfoot>
                                <tr>
                                <th>ID</th>
                                <th>Permission Name</th>
                                <th>Group Name</th>
                                <th>Action</th>
                                </tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
			</div>
@endsection