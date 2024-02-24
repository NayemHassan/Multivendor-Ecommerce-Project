@extends('admin.admin_dashboard')
@section('admin')
<div class="page-header breadcrumb-wrap">
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Admin Order Details</li>
							</ol>
						</nav>
					</div>
					
				</div>
        </div>
        <div class="page-content pt-110 pb-150">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 m-auto">
                        <div class="row">
                         
                                    <div class="col-md-6">
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
                              <div class="col-md-6">
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
                                                            <td  ><label class="badge rounded-pill bg-info">{{$detailsOrder->status}}</label></td>
                                                       </tr>                          
                                                       <tr>
                                                            <td ><label></label></td>

                                                            <td>
                                                                @if($detailsOrder->status =='pending')
                                                                <a href="{{route('confirm.order.active',$detailsOrder->id)}}" id="confirm_id" class="btn text-light bg-success">Confirm Order</a>
                                                                @elseif($detailsOrder->status =='confirmed')
                                                                <a href="{{route('processing.order.active',$detailsOrder->id)}}" id="processing_id"  class="btn text-light bg-success">Processing Order</a>
                                                                @elseif($detailsOrder->status =='processing')
                                                                <a href="{{route('deleverd.order.active',$detailsOrder->id)}}" id="delevered_id" class="btn text-light bg-success">Deliver Order</a>
                                                                @endif
                                                                
                                                            </td>
                                                       </tr>                          
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div class="col-md-12">
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
                      
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- //Sweet alert Confirm Order -->

       
@endsection