@extends('dashboard')
@section('user')
<div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                    <span></span>Password Change Page
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
                                    <div class="tab-pane fade active show" id="password-change" role="tabpanel" aria-labelledby="password-change-tab">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Password Change Page</h5>
                                            </div>
                                            <div class="card-body">
                                                @if(session('error'))
                                                <div class="alert alert-danger" role="alert">{{session('error')}}</div>
                                                @elseif(session('status'))
                                                <div class="alert alert-success" role="alert">{{session('status')}}</div>
                                                @endif
                                                <form method="post" action="{{route('user.update.password')}}">

                                                    @csrf
                                                    <div class="row">
                                                        <div class="form-group col-md-6">
                                                            <label> Old Password <span class="required"></span></label>
                                                            <input class="form-control @error('old_password') is-invalid @enderror" type="password" name="old_password" type="text" />
                                                            @error('old_password')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>New Password <span class="required">*</span></label>
                                                            <input  class="form-control @error('new_password') is-invalid @enderror" type="password" name="new_password" type="text" />
                                                            @error('new_password')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Confirm Password<span class="required"></span></label>
                                                            <input  class="form-control" type="password" name="new_password_confirmation" type="text" />
                                                        </div>
                                                        <div class="col-md-12">
                                                            <button type="submit" class="btn btn-fill-out submit font-weight-bold" name="submit" value="Submit">Save Change</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                          
                                        </div>
                                        <!-- password change -->
                                        
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