@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Portfolio Datatable</h4>


                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>SI</th>
                                <th>Shop Name</th>
                                <th>User Name</th>
                                <th>Vendor Join Year</th>
                                <th>Vendor Email</th>
                                <th>Status</th>
                                <th>Action</th>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach ( $vendorActive as $key=>$data )


                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$data->name}}</td>
                                <td>{{$data->username}}</td>
                                <td>{{$data->vendor_join}}</td>
                                <td>{{$data->email}}</td>
                                <td> <span class="btn btn-success">{{$data->status}}</span></td>
                                <td ><span  class="btn btn-info"><a href="{{route('details.active',$data->id)}}" style="color: #000" >Stauts Details</a></span></td>

                            </tr>
                            
                            @endforeach
                            <tr>
                                <th>SI</th>
                                <th>Shop Name</th>
                                <th>User Name</th>
                                <th>Vendor Join Year</th>
                                <th>Vendor Email</th>
                                <th>Status</th>
                                <th>Action</th>

                            </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div>
</div>
@endsection
