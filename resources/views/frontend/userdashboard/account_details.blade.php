@extends('dashboard')
@section('user')
<div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                    <span></span> Account Details
                </div>
            </div>
        </div>
        <div class="page-content pt-110 pb-150">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 m-auto">
                        <div class="row">
                        @include('frontend.body.dashboard_side_menu')

                                    <div class="col-md-9">
                                    <div class="tab-content account dashboard-content pl-50">
                                    <!-- //// -->
                                    <div class="tab-pane fade active show" id="account-detail" role="tabpanel" aria-labelledby="account-detail-tab">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Account Details</h5>
                                            </div>
                                            <div class="card-body">
                                                <p>Already have an account? <a href="page-login.html">Log in instead!</a></p>
                                                
                                                <form method="post" action="{{route('user.profile.update')}}" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="form-group col-md-6">
                                                            <label> Name <span class="required">*</span></label>
                                                            <input class="form-control" value="{{$userData->name}}" name="name" type="text" />
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>User Name <span class="required">*</span></label>
                                                            <input  class="form-control" value="{{$userData->username}}" name="username" type="text" />
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label>Email Address <span class="required">*</span></label>
                                                            <input  class="form-control" value="{{$userData->email}}" name="email" type="email" />
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label>Phone <span class="required">*</span></label>
                                                            <input  class="form-control" value="{{$userData->phone}}" name="phone" type="text" />
                                                        </div>
                                                        
                                                        <div class="form-group col-md-12">
                                                            <label>User Address <span class="required">*</span></label>
                                                            <input  class="form-control" value="{{$userData->address}}" name="address" type="text" />
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label>Profile Image <span class="required">*</span></label>
                                                            <input  class="form-control" type="file" id="image" name="profile_image"  />
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label> <span class="required"></span></label>
                                                            <img class="rounded avatar-lg" id ="showImage" src="{{(!empty($userData->photo))?url('frontend_upload/user_upload/'.$userData->photo):url('admin_upload/no_image.jpg')}}" height="100" width="100" alt="profile">
                                                        </div>
                                                        <div class="col-md-12">
                                                            <button type="submit" class="btn btn-fill-out submit font-weight-bold" name="submit" value="Submit">Save Change</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                          
                                        </div> 
                                    </div>
                      <!-- /// -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection