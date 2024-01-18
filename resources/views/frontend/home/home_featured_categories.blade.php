@php 
  $category = App\Models\Categories::orderBy('categories_name','ASC')->get();
@endphp
                       
<section class="popular-categories section-padding">
            <div class="container wow animate__animated animate__fadeIn">
                <div class="section-title">
                    <div class="title">
                        <h3>Featured Categories</h3>
                       
                    </div>
                    <div class="slider-arrow slider-arrow-2 flex-right carausel-10-columns-arrow" id="carausel-10-columns-arrows"></div>
                </div>
                <div class="carausel-10-columns-cover position-relative">
                    
                    <div class="carausel-10-columns" id="carausel-10-columns">
                    @foreach($category as $item)
                        <div class="card-2 bg-9 wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                            <figure class="img-hover-scale overflow-hidden">
                                <a href="{{url('/product/categories/'. $item->id.'/'. $item->categories_slug)}}"><img src="{{asset('frontend_upload/categories/'.$item->categories_image)}}" alt="" /></a>
                            </figure>
                            <h6><a href="{{url('/product/categories/'. $item->id.'/'. $item->categories_slug)}}">{{$item->categories_name}}</a></h6>
                            @php
                            $citem = App\Models\Product::where('category_id',$item->id)->get();
                            @endphp
                            <span>{{count($citem)}} items</span>
                        </div>
                        @endforeach
                        
                    </div>
                </div>
            </div>
        </section>