<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<img src="{{asset('adminbackend')}}/assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
				</div>
				<div>
					<h4 class="logo-text">Admin</h4>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
				</div>
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
			<li>
					<a href="{{route('admin.dashboard')}}">
						<div class="parent-icon"><i class='bx bx-cookie'></i>
						</div>
						<div class="">Dashboard</div>
					</a>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-home-circle'></i>
						</div>
						<div class="menu-title">Brand</div>
					</a>
					<ul>
						<li> <a href="{{route('all.brand')}}"><i class="bx bx-right-arrow-alt"></i>All Brand</a>
						</li>
						<li> <a href="{{route('add.brand')}}"><i class="bx bx-right-arrow-alt"></i>Add brand</a>
						</li>

					</ul>
				</li>
                <li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-home-circle'></i>
						</div>
						<div class="menu-title">Categories</div>
					</a>
					<ul>
						<li> <a href="{{route('view.categories')}}"><i class="bx bx-right-arrow-alt"></i>All Categories</a>
						</li>
						<li> <a href="{{route('add.categories')}}"><i class="bx bx-right-arrow-alt"></i>Add Categories</a>
						</li>

					</ul>
				</li>
                <li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-home-circle'></i>
						</div>
						<div class="menu-title">Sub Categories</div>
					</a>
					<ul>
						<li> <a href="{{route('view.subcategories')}}"><i class="bx bx-right-arrow-alt"></i>All Sub Categories</a>
						</li>
						<li><a href=" {{route('add.subcategories')}}"><i class="bx bx-right-arrow-alt"></i>Add Sub-Categories</a>
						</li>

					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">Product Manage</div>
					</a>
					<ul>
						<li> <a href="{{route('all.product.show')}}"><i class="bx bx-right-arrow-alt"></i>All Product</a>
						</li>
				<li> <a href="{{route('add.product')}}"><i class="bx bx-right-arrow-alt"></i>Add Product</a>
						</li>
						
					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">Slider Manage</div>
					</a>
					<ul>
						<li> <a href="{{route('show.all.slider')}}"><i class="bx bx-right-arrow-alt"></i>All Slider</a>
						</li>
				         <li> <a href="{{route('add.slider')}}"><i class="bx bx-right-arrow-alt"></i>Add Slider</a>
						</li>
						
					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">Banner Manage</div>
					</a>
					<ul>
						<li> <a href="{{route('show.all.banner')}}"><i class="bx bx-right-arrow-alt"></i>All Banner</a>
						</li>
				         <li> <a href="{{route('add.banner')}}"><i class="bx bx-right-arrow-alt"></i>Add Banner</a>
						</li>
						
					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">Coupon Manage</div>
					</a>
					<ul>
						<li> <a href="{{route('all.coupon')}}"><i class="bx bx-right-arrow-alt"></i>All Coupon</a>
						</li>
				         <li> <a href="{{route('add.coupon')}}"><i class="bx bx-right-arrow-alt"></i>Add Coupon</a>
						</li>
						
					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">Shipping Area Manage</div>
					</a>
					<ul>
						<li> <a href="{{route('all.division')}}"><i class="bx bx-right-arrow-alt"></i>All Division</a>
						</li>
				         <li> <a href="{{route('add.division')}}"><i class="bx bx-right-arrow-alt"></i>Add Division</a>
						</li>
						<li> <a href="{{route('all.districts')}}"><i class="bx bx-right-arrow-alt"></i>All Districts</a>
						</li>
				         <li> <a href="{{route('add.districts')}}"><i class="bx bx-right-arrow-alt"></i>Add Districts</a>
						</li>
						<li> <a href="{{route('all.state')}}"><i class="bx bx-right-arrow-alt"></i>All State</a>
						</li>
				         <li> <a href="{{route('add.state')}}"><i class="bx bx-right-arrow-alt"></i>Add State</a>
						</li>
						
					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">Pending Order Manage</div>
					</a>
					<ul>
						<li> <a href="{{route('pending.order')}}"><i class="bx bx-right-arrow-alt"></i>All Pending Order</a>
						</li>
				        
						
					</ul>
				</li>
				<li class="menu-label">UI Elements</li>

				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">Manage Vendor</div>
					</a>
					<ul>
						<li> <a href="{{route('vendor.inactive')}}"><i class="bx bx-right-arrow-alt"></i>InActive</a>
						</li>
						<li> <a href="{{route('vendor.active')}}"><i class="bx bx-right-arrow-alt"></i>Active</a>
						</li>
						
					</ul>
				</li>
				<li>
					<a href="widgets.html">
						<div class="parent-icon"><i class='bx bx-cookie'></i>
						</div>
						<div class="menu-title">Widgets</div>
					</a>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-cart'></i>
						</div>
						<div class="menu-title">eCommerce</div>
					</a>
					<ul>
						<li> <a href="ecommerce-products.html"><i class="bx bx-right-arrow-alt"></i>Products</a>
						</li>
						<li> <a href="ecommerce-products-details.html"><i class="bx bx-right-arrow-alt"></i>Product Details</a>
						</li>
						<li> <a href="ecommerce-add-new-products.html"><i class="bx bx-right-arrow-alt"></i>Add New Products</a>
						</li>
						<li> <a href="ecommerce-orders.html"><i class="bx bx-right-arrow-alt"></i>Orders</a>
						</li>
					</ul>
				</li>
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
