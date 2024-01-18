<section class="banners mb-25">
            <div class="container">
                <div class="row">
                    @php 
                    $banner = App\Models\Banner::OrderBy('banner_name','ASC')->limit(3)->get();
                    @endphp
                    @foreach($banner as $ban)
                    <div class="col-lg-4 col-md-6">
                        <div class="banner-img wow animate__animated animate__fadeInUp" data-wow-delay="0">
                            <img src="{{asset('frontend_upload/banner/'.$ban->banner_image)}}" alt="" />
                            <div class="banner-text">
                                <h4>
                                   {{$ban->banner_name}}
                                </h4>
                                <a href="{{$ban->banner_url}}" class="btn btn-xs">Shop Now <i class="fi-rs-arrow-small-right"></i></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>