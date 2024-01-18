@php
$id = Illuminate\Support\Facades\Auth::user()->id;
$vendor =  App\Models\User::find($id);
$status = $vendor->status;
@endphp
<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<img src="{{asset('adminbackend')}}/assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
				</div>
				<div>
					<h4 class="logo-text">Vendor</h4>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
				</div>
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
			<li>
					<a href="{{route('vendor.dashboard')}}">
						<div class="parent-icon"><i class='bx bx-cookie'></i>
						</div>
						<div class="">Dashboard</div>
					</a>
				</li>
		@if($status ==='active')
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-home-circle'></i>
						</div>
						<div class="menu-title">Product Manage</div>
					</a>
					<ul>
					     <li> <a href="{{route('all.vendor.product.show')}}"><i class="bx bx-right-arrow-alt"></i>Product List</a>
						</li>
						<li> <a href="{{route('add.vendor.product')}}"><i class="bx bx-right-arrow-alt"></i>Add Product</a>
						</li>
						
						
					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-home-circle'></i>
						</div>
						<div class="menu-title">Pending Order</div>
					</a>
					<ul>
						<li> <a href="{{route('vendor.pending.order')}}"><i class="bx bx-right-arrow-alt"></i>All Pending Order</a>
						</li>
						
						
					</ul>
				</li>
		@else
		@endif
				
				
				<li>
					<a href="https://themeforest.net/user/codervent" target="_blank">
						<div class="parent-icon"><i class="bx bx-support"></i>
						</div>
						<div class="menu-title">Support</div>
					</a>
				</li>
			</ul>
			<!--end navigation-->
		</div>