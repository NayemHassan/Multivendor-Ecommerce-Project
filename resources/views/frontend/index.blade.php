@extends('frontend.master_dashboard')
@section('main')
@include('frontend.home.home_slider')
        <!--End hero slider-->
        @include('frontend.home.home_featured_categories')
        <!--End category slider-->
        @include('frontend.home.home_banner')
        <!--End banners-->
        <!--Products Tabs-->
        @include('frontend.home.home_new_products')
        <!--End Best Sales-->
        @include('frontend.home.home_featured_product')
        <!-- TV Category -->

    <section class="product-tabs section-padding position-relative">
            <div class="container">
                <div class="section-title style-2 wow animate__animated animate__fadeIn">
                    <h3>{{$skip_cat_0->categories_name}} Category</h3>

                </div>
                <!--End nav-tabs-->

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                        <div class="row product-grid-4">


                        @foreach($skip_product_0 as $item )

                            <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                                <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="{{url('product/details/'.$item->id.'/'.$item->product_slug)}}">
                                                <img class="default-img" src="{{asset('frontend_upload/product/thumbnail/'.$item->product_thumbnail)}}" alt="" />
                                                <img class="hover-img" src="{{asset('frontend_upload/product/thumbnail/'.$item->product_thumbnail)}}" alt="" />
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                            <a aria-label="Add To Wishlist" class="action-btn" id="{{$item->id}}" onClick="addToWishList(this.id)"><i class="fi-rs-heart"></i></a>

                                            <a aria-label="Compare" class="action-btn" id="{{$item->id}}" onClick="addToCompare(this.id)"><i class="fi-rs-shuffle"></i></a>

                                              <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal" id="{{$item->id}}" onClick="productView(this.id)"><i class="fi-rs-eye"></i></a>
                                        </div>

                                            @php
                                            $amount = $item->selling_price - $item->discount_price;
                                           $discount = ($amount/$item->selling_price)*100;
                                            @endphp
                                        <div class="product-badges product-badges-position product-badges-mrg">

                                            @if($item->discount_price == NULL)
                                            <span class="new">New</span>
                                           @else
                                            <span class="hot">{{round($discount)}}%</span>
                                            @endif

                                        </div>

                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href="shop-grid-right.html">{{$item['category']['categories_name']}}</a>
                                        </div>
                                        <h2><a href="{{url('product/details/'.$item->id.'/'.$item->product_slug)}}">{{$item->product_name}}</a></h2>
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 80%"></div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (3.5)</span>
                                        </div>
                                        <div>


                                            @if($item->vendor_id == NULL)
                                            <span class="font-small text-muted">By <a href="vendor-details-1.html">Owner</a></span>
                                            @else
                                            <span class="font-small text-muted">By <a href="vendor-details-1.html">{{$item['vendor']['name']}}</a></span>
                                            @endif

                                        </div>
                                        <div class="product-card-bottom">


                                            <div class="product-price">
                                            @if($item->discount_price ==NULL)
                                                <span>${{$item->selling_price}}</span>
                                                @else
                                                <span>${{$item->selling_price}}</span>
                                                <span class="old-price">${{$item->selling_price}}</span>
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
                        </div>
                        <!--End product-grid-4-->
                    </div>


                </div>
                <!--End tab-content-->
            </div>


  </section>
        <!--End TV Category -->




        <!-- Tshirt Category -->

    <section class="product-tabs section-padding position-relative">
            <div class="container">
                <div class="section-title style-2 wow animate__animated animate__fadeIn">
                    <h3>{{$skip_cat_7->categories_name}} Category</h3>

                </div>
                <!--End nav-tabs-->
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                        <div class="row product-grid-4">


                                @foreach($skip_product_7 as $item)

                                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                                <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="{{url('product/details/'.$item->id.'/'.$item->product_slug)}}">
                                                <img class="default-img" src="{{asset('frontend_upload/product/thumbnail/'.$item->product_thumbnail)}}" alt="" />
                                                <img class="hover-img" src="{{asset('frontend_upload/product/thumbnail/'.$item->product_thumbnail)}}" alt="" />
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                            <a aria-label="Add To Wishlist" class="action-btn" id="{{$item->id}}" onClick="addToWishList(this.id)"><i class="fi-rs-heart"></i></a>

                                            <a aria-label="Compare" class="action-btn" id="{{$item->id}}" onClick="addToCompare(this.id)"><i class="fi-rs-shuffle"></i></a>

                                              <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal" id="{{$item->id}}" onClick="productView(this.id)"><i class="fi-rs-eye"></i></a>
                                        </div>

                                            @php
                                            $amount = $item->selling_price - $item->discount_price;
                                           $discount = ($amount/$item->selling_price)*100;
                                            @endphp
                                        <div class="product-badges product-badges-position product-badges-mrg">

                                            @if($item->discount_price == NULL)
                                            <span class="new">New</span>
                                           @else
                                            <span class="hot">{{round($discount)}}%</span>
                                            @endif

                                        </div>

                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href="shop-grid-right.html">{{$item['category']['categories_name']}}</a>
                                        </div>
                                        <h2><a href="{{url('product/details/'.$item->id.'/'.$item->product_slug)}}">{{$item->product_name}}</a></h2>
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 80%"></div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (3.5)</span>
                                        </div>
                                        <div>


                                            @if($item->vendor_id == NULL)
                                            <span class="font-small text-muted">By <a href="vendor-details-1.html">Owner</a></span>
                                            @else
                                            <span class="font-small text-muted">By <a href="vendor-details-1.html">{{$item['vendor']['name']}}</a></span>
                                            @endif

                                        </div>
                                        <div class="product-card-bottom">


                                            <div class="product-price">
                                            @if($item->discount_price ==NULL)
                                                <span>${{$item->selling_price}}</span>
                                                @else
                                                <span>${{$item->selling_price}}</span>

                                                <span class="old-price">${{$item->selling_price}}</span>
                                                @endif

                                            </div>


                                            <div class="add-cart">
                                                <a class="add" href="shop-cart.html"><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                            @endforeach
                            <!--end product card-->

                            <!--end product card-->




                        </div>
                        <!--End product-grid-4-->
                    </div>


                </div>
                <!--End tab-content-->
            </div>


  </section>
        <!--End Tshirt Category -->
        <!-- Computer Category -->

    <section class="product-tabs section-padding position-relative">
            <div class="container">
                <div class="section-title style-2 wow animate__animated animate__fadeIn">
                    <h3>{{$skip_cat_2->categories_name}} Category</h3>

                </div>
                <!--End nav-tabs-->
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                        <div class="row product-grid-4">
                            @foreach($skip_product_2 as $item)
                            <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                                <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="{{url('product/details/'.$item->id.'/'.$item->product_slug)}}">
                                                <img class="default-img" src="{{asset('frontend_upload/product/thumbnail/'.$item->product_thumbnail)}}" alt="" />
                                                <img class="hover-img" src="{{asset('frontend_upload/product/thumbnail/'.$item->product_thumbnail)}}" alt="" />
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                            <a aria-label="Add To Wishlist" class="action-btn" id="{{$item->id}}" onClick="addToWishList(this.id)"><i class="fi-rs-heart"></i></a>

                                            <a aria-label="Compare" class="action-btn" id="{{$item->id}}" onClick="addToCompare(this.id)"><i class="fi-rs-shuffle"></i></a>

                                              <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal" id="{{$item->id}}" onClick="productView(this.id)"><i class="fi-rs-eye"></i></a>
                                        </div>
                                            @php
                                            $amount = $item->selling_price - $item->discount_price;
                                            $discount = ($amount/$item->selling_price)*100;
                                            @endphp
                                        <div class="product-badges product-badges-position product-badges-mrg">

                                            @if($item->discount_price == NULL)
                                            <span class="new">New</span>
                                           @else
                                            <span class="hot">{{round($discount)}}%</span>
                                            @endif

                                        </div>

                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href="shop-grid-right.html">{{$item['category']['categories_name']}}</a>
                                        </div>
                                        <h2><a href="{{url('product/details/'.$item->id.'/'.$item->product_slug)}}">{{$item->product_name}}</a></h2>
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 80%"></div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (3.5)</span>
                                        </div>
                                        <div>


                                            @if($item->vendor_id == NULL)
                                            <span class="font-small text-muted">By <a href="vendor-details-1.html">Owner</a></span>
                                            @else
                                            <span class="font-small text-muted">By <a href="vendor-details-1.html">{{$item['vendor']['name']}}</a></span>
                                            @endif
                                        </div>
                                        <div class="product-card-bottom">

                                            <div class="product-price">
                                            @if($item->discount_price ==NULL)
                                                <span>${{$item->selling_price}}</span>
                                                @else

                                                <span>${{$item->discount_price}}</span>
                                                <span class="old-price">${{$item->selling_price}}</span>
                                                @endif

                                            </div>


                                            <div class="add-cart">
                                                <a class="add" href="shop-cart.html"><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end product card-->
                            @endforeach
                        </div>
                        <!--End product-grid-4-->
                    </div>


                </div>
                <!--End tab-content-->
            </div>


  </section>
        <!--End Computer Category -->






    <section class="section-padding mb-30">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 wow animate__animated animate__fadeInUp" data-wow-delay="0">
                    <h4 class="section-title style-1 mb-30 animated animated"> Hot Deals </h4>
                    <div class="product-list-small animated animated">
                        @foreach($hot_deal as $hot)
                        <article class="row align-items-center hover-up">
                            <figure class="col-md-4 mb-0">
                                <a href="{{url('product/details/'.$hot->id.'/'.$hot->product_slug)}}"><img src="{{asset('frontend_upload/product/thumbnail/'.$hot->product_thumbnail)}}" alt="" /></a>
                            </figure>
                            <div class="col-md-8 mb-0">
                                <h6>
                                    <a href="{{url('product/details/'.$hot->id.'/'.$hot->product_slug)}}">{{$hot->product_name}}</a>
                                </h6>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div class="product-price">
                                    @if($hot->discount_price ==NULL)
                                        <span>${{$hot->selling_price}}</span>
                                        @else
                                        <span>${{$hot->discount_price}}</span>
                                        <span class="old-price">${{$hot->selling_price}}</span>
                                        @endif

                                    </div>
                            </div>
                        </article>
                       @endforeach
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 mb-md-0 wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                    <h4 class="section-title style-1 mb-30 animated animated">  Special Deal </h4>
                    <div class="product-list-small animated animated">
                    @foreach($special_deal as $specail)
                        <article class="row align-items-center hover-up">

                            <figure class="col-md-4 mb-0">
                                <a href="{{url('product/details/'.$specail->id.'/'.$specail->product_slug)}}"><img src="{{asset('frontend_upload/product/thumbnail/'.$specail->product_thumbnail)}}"></a>
                            </figure>
                            <div class="col-md-8 mb-0">
                                <h6>
                                    <a href="{{url('product/details/'.$specail->id.'/'.$specail->product_slug)}}">{{$specail->product_name}}</a>
                                </h6>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div class="product-price">
                                 @if($specail->discount_price ==NULL)
                                <span>${{$specail->selling_price}}</span>
                                @else
                                <span>${{$specail->discount_price}}</span>
                                <span class="old-price">${{$specail->selling_price}}</span>
                                @endif
                                </div>
                            </div>
                        </article>
                       @endforeach
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 d-none d-lg-block wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                    <h4 class="section-title style-1 mb-30 animated animated">Recently added</h4>
                    <div class="product-list-small animated animated">
                        @foreach($recently_added as $recent)
                        <article class="row align-items-center hover-up">
                            <figure class="col-md-4 mb-0">
                                <a href="{{url('product/details/'.$recent->id.'/'.$recent->product_slug)}}"><img src="{{asset('frontend_upload/product/thumbnail/'.$recent->product_thumbnail)}}" alt="" /></a>
                            </figure>
                            <div class="col-md-8 mb-0">
                                <h6>
                                    <a href="{{url('product/details/'.$recent->id.'/'.$recent->product_slug)}}">{{$recent->product_name}}</a>
                                </h6>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div class="product-price">
                                @if($recent->discount_price ==NULL)
                                <span>${{$recent->selling_price}}</span>
                                @else
                                <span>${{$recent->discount_price}}</span>
                                <span class="old-price">${{$recent->selling_price}}</span>
                                @endif
                                </div>
                            </div>
                        </article>
                       @endforeach
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 d-none d-xl-block wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
                    <h4 class="section-title style-1 mb-30 animated animated"> Special Offer </h4>
                    <div class="product-list-small animated animated">
                        @foreach($special_offer as $offer)
                        <article class="row align-items-center hover-up">

                            <figure class="col-md-4 mb-0">
                                <a href="{{url('product/details/'.$offer->id.'/'.$offer->product_slug)}}"><img src="{{asset('frontend_upload/product/thumbnail/'.$offer->product_thumbnail)}}" alt="" /></a>
                            </figure>
                            <div class="col-md-8 mb-0">
                                <h6>
                                    <a href="{{url('product/details/'.$offer->id.'/'.$offer->product_slug)}}">{{$offer->product_name}}</a>
                                </h6>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div class="product-price">
                                @if($offer->discount_price ==NULL)
                                <span>${{$offer->selling_price}}</span>
                                @else
                                <span>${{$offer->discount_price}}</span>
                                <span class="old-price">${{$offer->selling_price}}</span>
                                @endif
                                </div>
                            </div>
                        </article>
                       @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
        <!--End 4 columns-->


  <!--Vendor List -->
@include('frontend.home.home_vendor_list')
 <!--End Vendor List -->
@endsection
