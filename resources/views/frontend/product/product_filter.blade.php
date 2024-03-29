@extends('frontend.master_dashboard')
@section('main')
<link rel="stylesheet" href="{{asset('backend')}}/assets/css/plugins/slider-range.css" />
<div class="page-header mt-30 mb-50">
            <div class="container">
                <div class="archive-header">
                    <div class="row align-items-center">
                        <div class="col-xl-3">
                            <h1 class="mb-15">{{$cat_name->categories_name}}</h1>
                            <div class="breadcrumb">
                                <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                                <span></span> {{$cat_name->categories_name}}
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
        <div class="container mb-30">
            <div class="row flex-row-reverse">
                <div class="col-lg-4-5">
                    <div class="shop-product-fillter">
                        <div class="totall-product">
                            <p>We found <strong class="text-brand">{{count($products)}}</strong> items for you!</p>
                        </div>
                        <div class="sort-by-product-area">
                            <div class="sort-by-cover mr-10">
                                <div class="sort-by-product-wrap">
                                    <div class="sort-by">
                                        <span><i class="fi-rs-apps"></i>Show:</span>
                                    </div>
                                    <div class="sort-by-dropdown-wrap">
                                        <span> 50 <i class="fi-rs-angle-small-down"></i></span>
                                    </div>
                                </div>
                                <div class="sort-by-dropdown">
                                    <ul>
                                        <li><a class="active" href="#">50</a></li>
                                        <li><a href="#">100</a></li>
                                        <li><a href="#">150</a></li>
                                        <li><a href="#">200</a></li>
                                        <li><a href="#">All</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="sort-by-cover">
                                <div class="sort-by-product-wrap">
                                    <div class="sort-by">
                                        <span><i class="fi-rs-apps-sort"></i>Sort by:</span>
                                    </div>
                                    <div class="sort-by-dropdown-wrap">
                                        <span> Featured <i class="fi-rs-angle-small-down"></i></span>
                                    </div>
                                </div>
                                <div class="sort-by-dropdown">
                                    <ul>
                                        <li><a class="active" href="#">Featured</a></li>
                                        <li><a href="#">Price: Low to High</a></li>
                                        <li><a href="#">Price: High to Low</a></li>
                                        <li><a href="#">Release Date</a></li>
                                        <li><a href="#">Avg. Rating</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row product-grid">
                        @foreach($products as $product)
                        <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                                <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="{{url('product/details/'.$product->id.'/'.$product->product_slug)}}">
                                                <img class="default-img" src="{{asset('frontend_upload/product/thumbnail/'.$product->product_thumbnail)}}" alt="" />
                                                <img class="hover-img" src="{{asset('frontend_upload/product/thumbnail/'.$product->product_thumbnail)}}" alt="" />
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                            <a aria-label="Add To Wishlist" class="action-btn" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                            <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                            <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                        </div>

                                            @php
                                            $amount = $product->selling_price - $product->discount_price;
                                           $discount = ($amount/$product->selling_price)*100;
                                            @endphp
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                          
                                            @if($product->discount_price == NULL)
                                            <span class="new">New</span>
                                           @else                                          
                                            <span class="hot">{{round($discount)}}%</span>
                                            @endif
                                           
                                        </div>

                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href="shop-grid-right.html">{{$product['category']['categories_name']}}</a>
                                        </div>
                                        <h2><a href="{{url('product/details/'.$product->id.'/'.$product->product_slug)}}">{{$product->product_name}}</a></h2>
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 80%"></div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (3.5)</span>
                                        </div>
                                        <div>
                                            @if($product->vendor_id == NULL)
                                            <span class="font-small text-muted">By <a href="vendor-details-1.html">Owner</a></span>
                                            @else
                                            <span class="font-small text-muted">By <a href="vendor-details-1.html">{{$product['vendor']['name']}}</a></span>
                                            @endif
                                            
                                        </div>
                                        <div class="product-card-bottom">
                                            <div class="product-price">
                                            @if($product->discount_price ==NULL)
                                                <span>${{$product->selling_price}}</span>
                                                @else 
                                                <span>${{$product->selling_price}}</span>
                                                <span class="old-price">${{$product->selling_price}}</span>
                                                @endif
                                                
                                            </div>
                                            <div class="add-cart">
                                                <a class="add" href="shop-cart.html"><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <!--end product card-->
                        
                    </div>
                    <!--product grid-->
                    <div class="pagination-area mt-20 mb-20">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-start">
                                <li class="page-item">
                                    <a class="page-link" href="#"><i class="fi-rs-arrow-small-left"></i></a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item active"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link dot" href="#">...</a></li>
                                <li class="page-item"><a class="page-link" href="#">6</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#"><i class="fi-rs-arrow-small-right"></i></a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    
                    <!--End Deals-->
            
                </div>
                <div class="col-lg-1-5 primary-sidebar sticky-sidebar">
                <div class="sidebar-widget price_range range mb-30">
                    <form action="{{route('shop.filter')}}" method="post">
                        @csrf
                        <h5 class="section-title style-1 mb-30">Fill by price</h5>
                        <div class="price-filter">
                            <div class="price-filter-inner">
                                <div id="slider-range" class="mb-20"></div>
                                <div class="d-flex justify-content-between">
                                    <div class="caption">From: <strong id="slider-range-value1" class="text-brand"></strong></div>
                                    <div class="caption">To: <strong id="slider-range-value2" class="text-brand"></strong></div>
                                </div>
                            </div>
                        </div>
                        <div class="list-group">
                            <div class="list-group-item mb-10 mt-10">
                                <label class="fw-900">Category</label>
                                <div class="custome-checkbox">
                                    @foreach($categories as $category)
                                    @php
                                        $product = App\Models\Product::where('category_id',$category->id)->get();
                                    @endphp
                                    <input class="form-check-input" type="checkbox" name="category[]" id="exampleCheckbox{{$category->id}}" value="{{$category->product_slug}}" onchange="this.form.submit()" />
                                    <label class="form-check-label" for="exampleCheckbox{{$category->id}}"><span>{{$category->categories_name}} ({{count($product)}})</span></label>
                                    <br />
                                    @endforeach
                                </div>
                                <label class="fw-900 mt-15">Item Condition</label>
                                <div class="custome-checkbox">
                                    <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox11" value="" />
                                    <label class="form-check-label" for="exampleCheckbox11"><span>New (1506)</span></label>
                                    <br />
                                    <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox21" value="" />
                                    <label class="form-check-label" for="exampleCheckbox21"><span>Refurbished (27)</span></label>
                                    <br />
                                    <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox31" value="" />
                                    <label class="form-check-label" for="exampleCheckbox31"><span>Used (45)</span></label>
                                </div>
                            </div>
                        </div>
                        <a href="#" class="btn btn-sm btn-default"><i class="fi-rs-filter mr-5"></i> Fillter</a>
                    </div>
                    </form>
                    <!-- Product sidebar Widget -->
                    <div class="sidebar-widget product-sidebar mb-30 p-30 bg-grey border-radius-10">
                        <h5 class="section-title style-1 mb-30">New products</h5>
                        @foreach($new_product as $new)
                        <div class="single-post clearfix">
                            <div class="image">
                                <img src="{{asset('frontend_upload/product/thumbnail/'.$new->product_thumbnail)}}" alt="#" />
                            </div>
                            <div class="content pt-10">
                                <h5><a href="{{url('product/details/'.$new->id.'/'.$new->product_slug)}}">{{$new->product_name}}</a></h5>
                                <div class="product-price">
                                    @if($new->discount_price ==NULL)
                                     <span>${{$new->selling_price}}</span>
                                      @else 
                                    <span>${{$new->discount_price}}</span>
                                    
                                    @endif
                                                
                                   </div>
                                <div class="product-rate">
                                    <div class="product-rating" style="width: 90%"></div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                
                </div>
            </div>
        </div>
        <script src="{{asset('backend')}}/assets/js/plugins/slider-range.js"></script>
@endsection