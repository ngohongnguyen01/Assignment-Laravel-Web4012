@extends('client.layout-client.index')
@section('content-body')
    <!-- MAIN-SLIDER-AREA -->
    <div class="main_slider">
        <div class="tp-banner-container">
            <div class="tp-banner">
                <ul>
                    @foreach($banner as $banner)
                        <li data-transition="zoomout" data-slotamount="7" data-masterspeed="1000">
                            <!-- MAIN IMAGE -->
                            <img src="{{asset('')}}{{$banner->image}}" alt="darkblurbg" data-bgfit="cover"
                                 data-bgposition="left top" data-bgrepeat="no-repeat">
                            <!-- LAYER NR. 1 -->

                            <!-- LAYER NR. 2 -->
                        {{--              --}}
                        <!-- LAYER NR. 3 -->
                            <div
                                class="tp-caption green_bold_bg_20 skewfromright randomrotateout tp-resizeme rs-parallaxlevel-10"
                                data-x="50"
                                data-y="290"
                                data-speed="1000"
                                data-start="3900"
                                data-easing="Power3.easeInOut"
                                data-splitin="none"
                                data-splitout="none"
                                data-elementdelay="0.1"
                                data-endelementdelay="0.1"
                                data-end="10200"
                                data-endspeed="1000"
                                style="z-index: 15; max-width: auto; max-height: auto; white-space: nowrap;"><a
                                    href="#"><img src="{{asset('layout-client/images/shop-btn.png')}}" alt="#"></a>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <div class="tp-bannertimer"></div>
            </div>
        </div>
    </div>
    <!-- MAIN-SLIDER-AREA END -->

    <!-- MAIN-FEATURED-AREA -->
    <section class="main-featured-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-md-4 col-xs-12">
                    <div class="featured-single">
                        <div class="featured-img">
                            <img src="{{asset('layout-client/images/fetured_prd_1.png')}}" alt="">
                            <div class="featured-text">
                                <h3>Men watches</h3>
                                <P>Collection instore and online</P>
                            </div>
                            <div class="feat-hover">
                                <div class="feat-in"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-4 col-xs-12">
                    <div class="featured-single">
                        <div class="featured-img">
                            <img src="{{asset('layout-client/images/fetured_prd_2.png')}}" alt="">
                            <div class="featured-text">
                                <h3>Shoes for women</h3>
                                <P>Summer collection 2015</P>
                            </div>
                            <div class="feat-hover">
                                <div class="feat-in"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-4 col-xs-12">
                    <div class="featured-single">
                        <div class="featured-img">
                            <img src="{{asset('layout-client/images/fetured_prd_3.png')}}" alt="">
                            <div class="featured-last-text">
                                <h3>Men shoes</h3>
                                <P>Sale up to 50% off</P>
                            </div>
                            <div class="feat-hover">
                                <div class="feat-in"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- MAIN-FEATURED-AREA END -->
    <section class="men_clothingcurosel_area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="headline">
                        <h2>Sản phẩm nối bật</h2>
                    </div>
                    <div class="menclothing-carousel">
                        @foreach($productOfSpecil as $productOfSpecil)
                            <div class="men-single" style="position: relative;">
                                <a href="{{route('chi_tiet_san_pham',['slug'=>$productOfSpecil->slug,'id'=>$productOfSpecil->id])}}"><img src="{{asset('')}}{{$productOfSpecil->image}}"
                                                 alt="{{$productOfSpecil->image_alt}}">
                                </a>
                                <div class="hot-wid-rating">
                                    <div class="action">
                                        <a style="color: #fff;padding: .75rem 0;display: inline-block;width: 49%;position: relative;border-right-color: white"
                                           href="">Xem chi tiết <i class="bx bx-show-alt"></i> </a>
                                        <a style="color: #fff;padding: .75rem 0;display: inline-block;width: 49%;position: relative;"
                                           href="{{route('chi_tiet_san_pham',['slug'=>$productOfSpecil->slug,'id'=>$productOfSpecil->id])}}">Yêu thích <i class="bx bx-heart"></i> </a>
                                    </div>
                                    <h4><a href="">{{$productOfSpecil->name}}</a></h4>
                                    <div class="product-wid-price">
                                        <ins>{{number_format($productOfSpecil->price,0,',','.')}} VNĐ</ins>
                                    </div>
                                </div>

                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- MEN-CLOTHING-AREA -->
    <section class="men_clothingcurosel_area section-padding">
        @foreach($category as $categoryChidren)
            <div class="container" style="padding: 20px 0px">
                <div class="row">
                    <div class="col-md-12">
                        <div class="headline">
                            <h2>{{$categoryChidren->name_cate}}</h2>
                        </div>
                        <div class="menclothing-carousel">
                            @foreach($categoryChidren->products as $productOfCategory)
                                <div class="men-single" style="position: relative;">
                                    <a href="{{route('chi_tiet_san_pham',['slug'=>$productOfCategory->slug,'id'=>$productOfCategory->id])}}">
                                        <img src="{{asset('')}}{{$productOfCategory->image}}" alt="{{$productOfCategory->image_alt}}">
                                    </a>
                                    <div class="hot-wid-rating">
                                        <div class="action">
                                            <a style="color: #fff;padding: .75rem 0;display: inline-block;width: 49%;position: relative;border-right-color: white"
                                               href="">Xem chi tiết <i class="bx bx-show-alt"></i> </a>
                                            <a style="color: #fff;padding: .75rem 0;display: inline-block;width: 49%;position: relative;"
                                               href="{{route('chi_tiet_san_pham',['slug'=>$productOfCategory->slug,'id'=>$productOfCategory->id])}}">Yêu thích <i class="bx bx-heart"></i> </a>
                                        </div>
                                        <h4><a href="{{route('chi_tiet_san_pham',['slug'=>$productOfCategory->slug,'id'=>$productOfCategory->id])}}">{{$productOfCategory->name}}</a></h4>
                                        <div class="product-wid-price">
                                            <ins>{{number_format($productOfCategory->price,0,',','.')}} VNĐ</ins>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </section>
    <!-- MEN-CLOTHING-AREA END -->

    <!-- FEATURED-PROMO-AREA -->
    <section class="features-promo-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <div class="features-promo-single">
                        <div class="features-promo-img">
                            <img src="{{asset('layout-client/images/main-prd1.png')}}" alt="">
                            <div class="features-promo-text">
                                <h3>Top collection</h3>
                                <P>New collection for men</P>
                            </div>
                            <div class="promo-hover">
                                <div class="promo-in"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <div class="features-promo-single">
                        <div class="features-promo-img">
                            <img src="{{asset('layout-client/images/main-prd2.png')}}" alt="">
                            <div class="features-promo-text">
                                <h3>Trends for girls</h3>
                                <P>Accessories collection</P>
                            </div>
                            <div class="promo-hover">
                                <div class="promo-in"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- FEATURED-PROMO-AREA END -->

    <!-- WOMEN-ACCESSORIES-AREA -->
    <section class="women-accessories-area2 section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="headline">
                        <h2>SẢN PHẨM YÊU THÍCH</h2>
                    </div>
                    <div class="product-tab">
                        <ul class="nav nav-tabs women-tab" role="tablist">
                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab"
                                                                      data-toggle="tab">New Products</a>
                            </li>
                            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab"
                                                       data-toggle="tab">Popular Products</a>
                            </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="home">
                                <div class="row">
{{--                                    // Sản phẩm mới nhất--}}
                                    @foreach($newProduct as $newProduct)
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="women-single">
                                            <a href="{{route('chi_tiet_san_pham',['slug'=>$newProduct->slug,'id'=>$newProduct->id])}}">
                                                <img src="{{asset('')}}{{$newProduct->image}}" alt="{{$newProduct->image_alt}}">
                                            </a>
                                            <div class="hot-wid-rating">
                                                <div class="action">
                                                    <a style="color: #fff;padding: .75rem 0;display: inline-block;width: 49%;position: relative;border-right-color: white"
                                                       href="{{route('chi_tiet_san_pham',['slug'=>$newProduct->slug,'id'=>$newProduct->id])}}">Xem chi tiết <i class="bx bx-show-alt"></i> </a>
                                                    <a style="color: #fff;padding: .75rem 0;display: inline-block;width: 49%;position: relative;"
                                                       href="{{route('chi_tiet_san_pham',['slug'=>$newProduct->slug,'id'=>$newProduct->id])}}">Yêu thích <i class="bx bx-heart"></i> </a>
                                                </div>
                                                <h4><a href="{{route('chi_tiet_san_pham',['slug'=>$newProduct->slug,'id'=>$newProduct->id])}}">{{$newProduct->name}}</a></h4>
                                                <div class="product-wid-price">
                                                    <ins>{{number_format($newProduct->price,0,',','.')}} VNĐ</ins>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="profile">
                                <div class="row">
{{--                                    // Sản phẩm yêu thích--}}
                                    @foreach($likeProduct as $likeProduct)
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="women-single">
                                                <a href="">
                                                    <img src="{{asset('')}}{{$likeProduct->image}}" alt="{{$likeProduct->image_alt}}">
                                                </a>
                                                <div class="hot-wid-rating">
                                                    <div class="action">
                                                        <a style="color: #fff;padding: .75rem 0;display: inline-block;width: 49%;position: relative;border-right-color: white"
                                                           href="{{route('chi_tiet_san_pham',['slug'=>$likeProduct->slug,'id'=>$likeProduct->id])}}">Xem chi tiết <i class="bx bx-show-alt"></i> </a>
                                                        <a style="color: #fff;padding: .75rem 0;display: inline-block;width: 49%;position: relative;"
                                                           href="{{route('chi_tiet_san_pham',['slug'=>$likeProduct->slug,'id'=>$likeProduct->id])}}">Yêu thích <i class="bx bx-heart"></i> </a>
                                                    </div>
                                                    <h4><a href="{{route('chi_tiet_san_pham',['slug'=>$likeProduct->slug,'id'=>$likeProduct->id])}}">{{$likeProduct->name}}</a></h4>
                                                    <div class="product-wid-price">
                                                        <ins>{{number_format($likeProduct->price,0,',','.')}} VNĐ</ins>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- WOMEN-ACCESSORIES-AREA END -->

    <!--  TESTIMONIAL-AREA  -->
    <section id="testimonial" class="section-padding">
        <div class="testimonial-overlay">
            <div class="testimonial">
                <div class="container">
                    <div class="testimonial-slide">
                        <div id="carousel-testimonial" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-testimonial" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-testimonial" data-slide-to="1" class=""></li>
                                <li data-target="#carousel-testimonial" data-slide-to="2" class=""></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item">
                                    <div class="item_quote">
                                        <i class="fa fa-quote-left"></i>
                                    </div>
                                    <div class="content">
                                        <p> Till the one day when the lady met this fellow and they knew it was much
                                            more than a hunch. These Happy Days are yours and mine Happy Days. Its
                                            mission to explore strange new worlds to seek out new man has gone
                                            before.</p>
                                    </div>
                                    <div class="client">
                                        <div class="image">
                                            <img src="{{asset('layout-client/images/customer.png')}}" alt="#">
                                        </div>
                                        <div class="c_text_inner">
                                            <h4>Micheal Clerk</h4>
                                            <h5>Customer Sydney</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="item active left">
                                    <div class="item_quote">
                                        <i class="fa fa-quote-left"></i>
                                    </div>
                                    <div class="content">
                                        <p> Till the one day when the lady met this fellow and they knew it was much
                                            more than a hunch. These Happy Days are yours and mine Happy Days. Its
                                            mission to explore strange new worlds to seek out new man has gone
                                            before.</p>
                                    </div>
                                    <div class="client">
                                        <div class="image">
                                            <img src="{{asset('layout-client/images/customer.png')}}" alt="#">
                                        </div>
                                        <div class="c_text_inner">
                                            <h4>Micheal Clerk</h4>
                                            <h5>Customer Sydney</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="item next left">
                                    <div class="item_quote">
                                        <i class="fa fa-quote-left"></i>
                                    </div>
                                    <div class="content">
                                        <p> Till the one day when the lady met this fellow and they knew it was much
                                            more than a hunch. These Happy Days are yours and mine Happy Days. Its
                                            mission to explore strange new worlds to seek out new man has gone
                                            before.</p>
                                    </div>
                                    <div class="client">
                                        <div class="image">
                                            <img src="{{asset('layout-client/images/customer.png')}}" alt="#">
                                        </div>
                                        <div class="c_text_inner">
                                            <h4>Micheal Clerk</h4>
                                            <h5>Customer Sydney</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  TESTIMONIAL-AREA END  -->

    <!-- LATEST-PRODUCT-AREA-AREA -->

    <!-- LATEST-PRODUCT-AREA END -->

    <!-- OUR-BRAND-AREA -->
    <div id="brand-bg" style="margin: 40px;">
        <div class="brand-overlay">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="partners_list">
                            <div class="partners_list_carousel">
                                <div class="item">
                                    <img src="{{asset('layout-client/images/partner.png')}}" alt="">
                                </div>
                                <div class="item">
                                    <img src="{{asset('layout-client/images/partner2.png')}}" alt="">
                                </div>
                                <div class="item">
                                    <img src="{{asset('layout-client/images/partner3.png')}}" alt="">
                                </div>
                                <div class="item">
                                    <img src="{{asset('layout-client/images/partner4.png')}}" alt="">
                                </div>
                                <div class="item">
                                    <img src="{{asset('layout-client/images/partner.png')}}" alt="">
                                </div>
                                <div class="item">
                                    <img src="{{asset('layout-client/images/partner2.png')}}" alt="">
                                </div>
                                <div class="item">
                                    <img src="{{asset('layout-client/images/partner3.png')}}" alt="">
                                </div>
                                <div class="item">
                                    <img src="{{asset('layout-client/images/partner4.png')}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- OUR-BRAND-AREA END -->

    <!-- LATEST-BLOG-AREA -->
    <section class="laest-blog-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="headline">
                        <h2>Latest from our blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($post as $post)
                <div class="col-sm-4">
                    <div class="blog-single">
                        <div class="blog-image">
                            <img src="{{asset('')}}{{$post->image}}" alt="{{$post->image_alt}}">
                        </div>
                        <div class="blog-text">
                            <h3><a href="single-post.html">{{$post->title}}</a></h3>
                            <hr class="blog-text-h3">
                            <p>{!! $post->short_description !!} </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- LATEST-BLOG-AREA END -->
@endsection

