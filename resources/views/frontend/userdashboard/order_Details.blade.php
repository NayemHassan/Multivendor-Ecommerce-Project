@extends('dashboard')
@section('user')
<div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                    <span></span>Shipping Details
                </div>
            </div>
        </div>
        <div class="page-content pt-110 pb-150">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 m-auto">
                        <div class="row">
                          @include('frontend.body.dashboard_side_menu')
                                    <div class="col-md-5">
                                    <div class="tab-content account dashboard-content pl-50">
                                  
                                    <div class="tab-pane fade active show" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                                        <div class="card">
                                            <div class="card-header" style="background:#F4F6FA">
                                                <h3 class="mb-0"> Order Details</h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table" style="background:#F4F6FA">
                                                        <tbody>
                                                       <tr>
                                                            <td ><label>Shipping Name:</label></td>
                                                            <td ><label>{{$detailsOrder->name}}</label></td>
                                                       </tr>
                                                       <tr>
                                                            <td ><label>Shipping Phone:</label></td>
                                                            <td><label>{{$detailsOrder->phone}}</label></td>
                                                       </tr>
                                                       <tr>
                                                            <td ><label>Shipping Email:</label></td>
                                                            <td ><label>{{$detailsOrder->email}}</label></td>
                                                       </tr>
                                                       <tr>
                                                            <td><label>Shipping Address:</label></td>
                                                            <td ><label>{{$detailsOrder->address}}</label></td>
                                                       </tr>
                                                       <tr>
                                                            <td ><label>Division</label></td>
                                                            <td ><label>{{$detailsOrder['division']['division_name']}}</label></td>
                                                       </tr>
                                                       <tr>
                                                            <td ><label>District</label></td>
                                                            <td ><label>{{$detailsOrder['district']['distrits_name']}}</label></td>
                                                       </tr>
                                                       <tr>
                                                            <td ><label>State</label></td>
                                                            <td ><label>{{$detailsOrder['state']['state_name']}}</label></td>
                                                       </tr>
                                                       <tr>
                                                            <td ><label>Post Code:</label></td>
                                                            <td ><label>{{$detailsOrder->post_code}}</label></td>
                                                       </tr>
                                                       <tr>
                                                            <td ><label>Order Date:</label></td>
                                                            <td >{{$detailsOrder->order_date}}</td>
                                                       </tr>     
                                                        </tbody>   
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                              <div class="col-md-4">
                                    <div class="tab-content account dashboard-content pl-50">
                                  
                                    <div class="tab-pane fade active show" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                                        <div class="card">
                                            <div class="card-header" style="background:#F4F6FA">
                                                <h4 class="mb-0">Shipping Details <span class="text-danger">Invoice:{{$detailsOrder->invoice_no}}</span></h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table" style="background:#F4F6FA">
                                                    <tbody>
                                                       <tr>
                                                            <td ><label> Name:</label></td>
                                                            <td ><label>{{$detailsOrder->name}}</label></td>
                                                       </tr>
                                                       <tr>
                                                            <td ><label> Phone:</label></td>
                                                            <td><label>{{$detailsOrder->phone}}</label></td>
                                                       </tr>
                                                       <tr>
                                                            <td ><label>Payment Type:</label></td>
                                                            <td ><label>{{$detailsOrder->payment_method}}</label></td>
                                                       </tr>
                                                       <tr>
                                                            <td><label>Tranx ID</label></td>
                                                            <td ><label>{{$detailsOrder->transaction_id}}</label></td>
                                                       </tr>
                                                       <tr>
                                                            <td ><label>Invoice</label></td>
                                                            <td class="text-danger"><label>{{$detailsOrder->invoice_no}}</label></td>
                                                       </tr>
                                                       <tr>
                                                            <td ><label>Order Amount</label></td>
                                                            <td ><label>${{$detailsOrder->amount}}</label></td>
                                                       </tr>
                                                       <tr>
                                                            <td ><label>Status</label></td>
                                                            <td  ><label class="badge rounded-pill bg-warning">{{$detailsOrder->status}}</label></td>
                                                       </tr>                          
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                                                <th>Image</th>
                                                                <th>Product Name</th>
                                                                <th>Vendor Name</th>
                                                                <th>Color</th>
                                                                <th>Size</th>
                                                                <th>Product Code</th>
                                                                <th>Quantity</th>
                                                                <th>Price</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                          @foreach($orderItem as $order)
                                                             <tr>
                                                                <td > <img src="{{asset('frontend_upload/product/thumbnail/'.$order->product->product_thumbnail)}}" style="height:60px;width:60px" alt=""></td>
                                                                <td>{{$order->product_name}}</td>
                                                                @if( $order->vendor_id == NULL)
                                                                <td>Admin</td>
                                                                @else
                                                                <td>{{$order['vendor']['name']}}</td>
                                                                @endif
                                                                <td>{{$order->color}}</td>
                                                                <td>{{$order->size}}</td>
                                                                <td>{{$order['product']['product_code']}}</td>
                                                                <td>{{$order->qty}}</td>
                                                                <td><label>${{$order->price}} </label> <br>Total Price = ${{$order->price*$order->qty }}</td>
                                                            </tr>
                                                           @endforeach                                                               
                                                        </tbody>
                                                        <tfoot>
                                                             <tr>
                                                                <th>Image</th>
                                                                <th>Product Name</th>
                                                                <th>Vendor Name</th>
                                                                <th>Color</th>
                                                                <th>Size</th>
                                                                <th>Product Code</th>
                                                                <th>Quantity</th>
                                                                <th>Price</th>
                                                            </tr> 
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           <!-- ///////// -->
                           @if($detailsOrder->status != "deliverd")
                           @else 
                           @php
                            $order = App\Models\orders::where('id',$detailsOrder->id)->where('return_reason', '=','NULL')->first();
                           @endphp
                           @if($order)
                           <div class="col-md-9">
                                    <div class="tab-content account dashboard-content pl-50">
                                    <div class="tab-pane fade active show" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                                        <div class="card">
                                        <div class="card-header">
                                                <h3 class="mb-0">Return Product</h3>
                                            </div>
                                           <form action="{{route('return.order.message.store',$detailsOrder->id)}}" method="post">
                                            @csrf
                                            <div class="form-group">
                                            <label for="">Enter Retarn Reason</label>

                                            <textarea name="return_reason" class="form-control @error('return_reason') is-invalid @enderror"></textarea><br>
                                            @error('return_reason')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                             @enderror
                                            <button type="submit" class="btn btn-success">Return Order</button>
                                            </div>
                                           </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="col-md-4">
                            <h5 class="badge badge-pill bg-danger p-3 h2" style="font-size:20px">You Alredy Sumbmited Return Reason</h5>
                            </div>
                            @endif
                           <!-- ////////// -->
                           @endif
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection