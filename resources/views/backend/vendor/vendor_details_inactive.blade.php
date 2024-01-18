@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content"> 
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Vendor Details</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Vendor Details Page</li>
							</ol>
						</nav>
					</div>
				
				</div>
				<!--end breadcrumb-->
				<div class="container">
					<div class="main-body">
						<div class="row">
							<div class="col-lg-12">
								<div class="card">
								
								</div>
							</div>
							<div class="col-lg-12">
								<div class="card">
									<div class="card-body">
                                        <form action="{{route('update.inactive.apply',$dInactive->id)}}" method="post" >
                                            @csrf
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Shop Name</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" name="name"  value="{{$dInactive->name}}" />
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">User Name</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" name="username" class="form-control" value="{{$dInactive->username}}" />
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Email</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" name="email" class="form-control" value="{{$dInactive->email}}" />
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Join Date</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" name="vendor_join" class="form-control" value="{{$dInactive->vendor_join}}" />
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Address</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" name="address" class="form-control" value="{{$dInactive->address}}" />
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Vendor Info</h6>
											</div>
											<div class="col-sm-9 text-secondary">
                                            <textarea class="form-control"  name ="vendor_details"id="inputAddress2" placeholder="Vendor Details" rows="3">{{$dInactive->vendor_details}}</textarea>
												
											</div>
										</div>

										<div class="row mb-0">
											<div class="col-sm-3">
												<h6 class="mb-0">Profile Image</h6>
											</div>
											
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0"></h6>
											</div>
											<div class="col-sm-9 text-secondary">
											<img  id ="showImage" src="{{(!empty($dInactive->photo))? url('vendor_upload/'.$dInactive->photo):url('admin_upload/no_image.jpg')}}" width="120" height="120" alt="profile">
											</div>
										</div>
										<div class="row">
											<div class="col-sm-3"></div>
											<div class="col-sm-9 text-secondary">
												<input type="submit" class="btn btn-danger px-4" value="Active Vendor" />
											</div>
										</div>
                                        </form>

									</div>
								</div>
								
							</div>
						</div>
					</div>
				</div>
			</div>

            @endsection