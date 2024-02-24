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
								<li class="breadcrumb-item active" aria-current="page">All Processing Order</li>
							</ol>
						</nav>
					</div>
					
				</div>
				<!--end breadcrumb-->
				
				<h6 class="mb-0 text-uppercase">Processing Order List </h6>
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example2" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>Sl</th>
										<th>Order Date</th>
										<th>Amount</th>
										<th>Invoice No</th>
										<th>Status</th>
										<th>Action</th>	
									</tr>
								</thead>
								<tbody>
                                    @foreach($order as $key => $item)
									<tr>
										<td>{{$key+1}}</td>
										<td>{{$item->order_date}}</td>
                                        <td>${{$item->amount}}</td>
										<td>{{$item->invoice_no}}</td>
										<td>
                                        <span class="badge rounded-pill bg-success">{{$item->status}}</span>
                                        </td>
										<td>
                                            <a href="{{route('pending.order.edit',$item->id)}}" class="btn btn-sm btn-warning p-2" title="Edit Data"> <i class="fas fa-eye"></i> </a>
											<a href="{{route('admin.invoicr.dawnload',$item->id)}}" class="btn btn-sm btn-danger p-2" title="Invoice Pdf Dawnload"> <i class="fa fa-dawnload"></i>Invoice </a>
                                         </td>
										
									</tr>
                                    @endforeach
								</tbody>
								<tfoot>
                                     <tr>
                                        <th>Sl</th>
										<th>Order Date</th>
										<th>Amount</th>
										<th>Invoice No</th>
										<th>Status</th>
										<th>Action</th>	
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
			</div>
@endsection