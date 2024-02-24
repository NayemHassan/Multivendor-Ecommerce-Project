@extends('dashboard')
@section('user')
<div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                    <span></span>Your Order
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
                                  
                                    <div class="tab-pane fade active show" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="mb-0">Your Orders</h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>SI</th>
                                                                <th>Date</th>
                                                                <th>Payment Method</th>
                                                                <th>Total</th>
                                                                <th class="text-center">Status</th>
                                                                <th class="text-center">Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($order as $keys => $orderInfo)
                                                            <tr>
                                                                <td>{{$keys+1}}</td>
                                                                <td>{{$orderInfo->order_date}}</td>
                                                                <td>{{$orderInfo->payment_method}}</td>
                                                                <td>${{$orderInfo->amount}}</td>
                                                                <td class="text-center">
                                                                    @if($orderInfo->status =="pending")
                                                                    <span  class="badge  rounded-pill btn-small bg-warning ">Pending</span>
                                                                    @elseif($orderInfo->status=='confirmed') 
                                                                    <span  class="badge  rounded-pill btn-small bg-info">Confirm</span>   
                                                                    @elseif($orderInfo->status=="processing") 
                                                                    <span  class="badge  rounded-pill btn-small bg-danger">Processing</span>   
                                                                    @elseif($orderInfo->status=='deliverd')    
                                                                    <span  class="badge  rounded-pill btn-small bg-success">Delivered</span>
                                                                    @if($orderInfo->return_order == 1)
                                                                   <a href="#" class="badge badge-pill bg-danger">Return</a>
                                                                    @endif
                                                                    @endif
                                                                </td>
                                                                <td class="text-center">
                                                                    <a href="{{url('user/order/details/'.$orderInfo->id)}}" class="badge rounded-pill btn-md bg-primary color-dark">View</a>
                                                                    <a href="{{url('user/invoice/pdf/'.$orderInfo->id)}}" class="badge rounded-pill btn-md bg-info color-dark"><i class="fa fa-dawnload"></i>Invoice</a>
                                                                </td>
                                                             </tr>
                                                            @endforeach
                                                        </tbody>
                                                         <tfoot>
                                                             <tr>
                                                                <th>SI</th>
                                                                <th>Date</th>
                                                                <th>Payment Method</th>
                                                                <th>Total</th>
                                                                <th class="text-center">Status</th>
                                                                <th class="text-center">Actions</th>
                                                             </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
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