<html lang="en">
<!--<![endif]-->


<!-- Mirrored from premiumlayers.com/html/ecom/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 27 May 2021 12:07:33 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ecomshop | Ecommerce HTL5 template | Home page 2</title>

    <!-- Font css  -->
    <link rel="stylesheet" href="{{asset('layout-client/fonts/fonts.css')}}">

    <!-- Fontawesome css      -->
    <link rel="stylesheet" href="{{asset('layout-client/css/normalize.css')}}">

    <!-- Bootstrap css      -->
    <link rel="stylesheet" href="{{asset('layout-client/css/bootstrap.css')}}">

    <!-- Owncarousel css      -->
    <link rel="stylesheet" href="{{asset('layout-client/css/owl.carousel.css')}}">

    <!-- image zoom -->
    <link rel="stylesheet" href="{{asset('layout-client/css/glasscase.css')}}">
    <link rel="stylesheet" href="{{asset('layout-client/css/glasscase.minf195.css')}}">
    <!-- CSS STYLE-->

    <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
    <link rel="stylesheet" type="text/css" href="{{asset('layout-client/css/extralayers.css')}}" media="screen"/>
    <link rel="stylesheet" type="text/css" href="{{asset('layout-client/rs-plugin/css/settings.css')}}" media="screen"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Main css   -->
    <link rel="stylesheet" href="{{asset('layout-client/style.css')}}">
    <link rel="stylesheet" href="{{asset('layout-client/css/responsive.css')}}">

    <!-- Favicons -->
    <link rel="apple-touch-icon-precomposed" href="">
    <link rel="shortcut icon" href=""/>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
{{--    // plugin link--}}

<!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/vendors.min.css')}}">
    <!-- END: Vendor CSS-->
    @stack('link-head')
    <style>
        .button-search {
            border-radius: 3px;
            height: 41px;
            color: black;
            width: 80px;
            border: 1px solid transparent;
            outline: none;
            background-color: #ffc107;
            border-color: #ffc107;
        }

        #keyword {
            padding-left: 5px;
            width: 70%;
            margin-right: -5px;
            height: 41px;
            outline: none;
            border: 1px solid #ccc;
            border-radius: 2px 0 0 2px;
        }

        .results-box {
            color: #555;
            position: absolute;
            top: 41px;
            z-index: 9999;
            width: 68%;
            background-color: #fff;
            box-shadow: 0px 2px 6px 0px rgb(50 50 50 / 33%);
        }

        .aAA:hover {
            color: #F89D18;
        }
    </style>
</head>

<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->

<!--  HEADER-AREA  -->
<header class="entire_header">
    <div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-5">
                    <div class="user-menu">
                        <ul class="list-unstyled list-inline" style="padding-top: 8px;">
                            <li class="dropdown dropdown-small">
                                <a href="{{getValueSetting('facebook')}}"><i style="font-size: 20px;"
                                                                             class="bx bxl-facebook"></i></a>
                            </li>
                            <li class="dropdown dropdown-small">
                                <a href="{{getValueSetting('Youtube')}}"><i style="font-size: 20px;"
                                                                            class="bx bxl-youtube"></i></a>
                            </li>
                            <li>
                                <a href="{{getValueSetting('twitter')}}"><i style="font-size: 20px;"
                                                                            class="bx bxl-twitter"></i></a>
                            </li>

                            <a href="{{getValueSetting('telegram')}}"><i style="font-size: 20px;"
                                                                         class="bx bxl-telegram"></i></a>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-sm-7">
                    <div class="header-right">
                        <ul>
                            @auth
                                @if (Auth::user()->can('list-admin','App\Policies\BackendAdminPolicy@setAdminBackend'))
                                    <li class="dropdown dropdown-small">
                                        <a  href="{{route('backend.admin')}}"><img class="account" src="{{asset('layout-client/images/account.png')}}" alt="#"><span class="value" style="padding-left: 10px;">Admin </span><i class="fa fa-angle-down"></i>
                                        </a>
                                    </li>
                                    @endif
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                                   style="height: 26px;border-right: none;"
                                   aria-haspopup="true" aria-expanded="false"><img
                                        style="border-radius: 50px;margin-right: 10px;"
                                        src="{{asset('')}}{{auth()->user()->image}}" width="30px" height="30px"
                                        alt="">{{auth()->user()->full_name}}</a>
                                <div class="dropdown-menu" style="margin-top: 10px;">
                                    <a class="dropdown-item aAA" style="color:black;" href="#">Đổi mật khẩu</a>
                                    <a class="dropdown-item aAA" style="color:black;" href="#">Thông tin</a>
                                </div>
                            </li>
                            <li>
                                <a href="{{route('login.logout')}}" style="border-right: none;"><img
                                        src="{{asset('layout-client/images/check.png')}}"
                                        alt="#">
                                    Checkout
                                </a>
                            </li>
                            @endauth
                            @if(!auth()->user())
                                <li><a href="{{route('formDangKy')}}">
                                     <span> Sign Up</span></a>
                                </li>
                                <li class="last-child">
                                    <a class="logg" href="{{route('login')}}"> Login</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header-area:END -->

    <!-- Logo-area -->
    <div class="logo_area">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-md-4 col-xs-12">
                    <div class="logo">
                        <a href="index.html"><img src="{{asset('layout-client/images/logo.png')}}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-sm-8 col-md-8 col-xs-12">
                    <div class="form-search">
                        <form action="">
                            <input type="text" name="keyword"
                                   id="keyword" placeholder="Tìm kiếm....">
                            <button class="button-search">Tìm kiếm</button>
                        </form>
                    </div>
                    <div class="results-box"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- LOGO-AREA:END -->

    <!-- MENU-AREA -->
    <div class="menu-area">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="categories">
                        <ul id="nav">
                            <li><span>Categories </span> <i class="bx bx-menu" style="    margin-left: 100px;
    font-size: 27px;"></i>
                                <ul>
                                    @foreach($dataCate as $valueCate)

                                        <li><a style="margin-left: 0px;color: #777777;text-decoration: none"
                                               href="{{route('tim_danh_muc',[$valueCate->slug])}}"
                                               class="a_cate">{{$valueCate->name_cate}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <nav class="main-menu">
                        <ul id="navigation">
                            <li class="active"><a href="{{route('index')}}">HOME</a>
                            </li>
                            <li><a href="{{route('all_san_pham')}}">Products</a>
                            </li>
                            <li><a href="about-us.html">Posts</a>
                            </li>
                            <li><a href="#"> <i class="fa fa-caret-down"></i></a>
                                <ul class="drop_nav">
                                    <li><a href="blog.html">Blog</a></li>
                                    <li><a href="checkout.html">Checkout</a></li>
                                </ul>
                            </li>

                            <li><a href="contact-us.html">Contact Us</a>
                            </li>
                        </ul>
                    </nav>

                    <!-- Mobile Navigation -->
                    <div class="only-for-mobile">
                        <div class="col-xs-12">
                            <ul class="ofm">
                                <li class="m_nav"><i class="fa fa-bars"></i> Navigation</li>
                            </ul>

                            <!-- MOBILE MENU -->
                            <div class="mobi-menu">
                                <div id='cssmenu'>
                                    <ul>
                                        <li class='has-sub'>
                                            <a href='index.html'><span>Home</span></a>
                                            <ul class="sub-nav">
                                                <li><a href="homepage_02.html"><span>Home version 2</span></a></li>
                                                <li><a href="homepage_03.html"><span>Home version 3</span></a></li>
                                            </ul>
                                        </li>
                                        <li class='has-sub'>
                                            <a href='#'><span>Pages</span></a>
                                            <ul class="sub-nav">
                                                <li><a href="blog.html">Blog</a></li>
                                                <li><a href="checkout.html">Checkout</a></li>
                                                <li><a href="product-list.html">Product list</a></li>
                                                <li><a href="profile.html">Profile</a></li>
                                                <li><a href="search-result.html">Search result</a></li>
                                                <li><a href="single-product.html">Single product</a></li>
                                                <li><a href="wishlist.html">wishlist</a></li>
                                                <li><a href="404.html">404</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href='about-us.html'><span>About Us</span></a>
                                        </li>
                                        <li>
                                            <a href='product-list.html'><span>Men</span></a>
                                        </li>
                                        <li>
                                            <a href='product-list.html'><span>Women</span></a>
                                        </li>
                                        <li>
                                            <a href='contact-us.html'><span>Contact Us</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="menu_right">
                        <a href="cart-page.html"><i class="fa fa-shopping-cart"></i>My Cart</a>
                        <span>2</span>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- MENU-AREA:END -->
</header>
<!-- Header-AREA END -->
<!-- Start Content -->

@yield('content-body')


<!-- End Start Content -->

<!-- Entire FOOTER START -->
<footer class="entire_footer">
    <!-- FOOTER-TOP-AREA -->
    <div class="footer_top_area  footer-padding">
        <div class="container">
            <div class="row">

            </div>
        </div>
    </div>
    <!-- FOOTER-TOP-AREA:END -->

    <!-- FOOTER-WIDGET-AREA -->
    <div class="footer-widget">
        <div class="ovelay">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 col-sm-4 col-xs-12">
                        <div class="widget_logo">
                            <a href="index.html"><img src="{{asset('layout-client/images/logo_footer.png')}}"
                                                      alt="logo"></a>
                            <ul>
                                <li>
                                    <div class="wl_left">
                                        <i class="fa fa-location-arrow"></i>
                                    </div>
                                    <div class="wl_right">
                                        <a href="#"><span>Address :</span> 09 Ecommerceshop, Design Street, Victoria,
                                            Australia</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="wl_left">
                                        <i class="fa fa-envelope-o"></i>
                                    </div>
                                    <div class="wl_right">
                                        <a href="#"><span>E-mail :</span> Info@Ecommerceshop.com</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="wl_left">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <div class="wl_right">
                                        <a href="#"><span>phone :</span> +01 123 456 78</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2 col-sm-2 col-xs-12">
                        <div class="widget_single">
                            <h4><a href="#">My Account</a></h4>
                            <ul>
                                <li><a href="profile.html">My Account</a>
                                </li>
                                <li><a href="wishlist.html">Wishlist</a>
                                </li>
                                <li><a href="cart-page.html">Shopping Cart</a>
                                </li>
                                <li><a href="checkout.html">Checkout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2 col-sm-2 col-xs-12">
                        <div class="widget_single">
                            <h4><a href="#">Information</a></h4>
                            <ul>
                                <li><a href="#">About Our Shop</a>
                                </li>
                                <li><a href="#">Top Seller</a>
                                </li>
                                <li><a href="#">Special Products</a>
                                </li>
                                <li><a href="#">Manufacturers</a>
                                </li>
                                <li><a href="#">Secure Shopping</a>
                                </li>
                                <li><a href="#">Privacy Policy</a>
                                </li>
                                <li><a href="#">Delivery Information</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2 col-sm-2 col-xs-12">
                        <div class="widget_single">
                            <h4><a href="#">Our Support</a></h4>
                            <ul>
                                <li><a href="contact-us.html">Contact Us</a>
                                </li>
                                <li><a href="#">Shipping & Taxes</a>
                                </li>
                                <li><a href="#">Return Policy</a>
                                </li>
                                <li><a href="#">Careers</a>
                                </li>
                                <li><a href="#">Affiliates</a>
                                </li>
                                <li><a href="#">Gift Vouchers</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2 col-sm-2 col-xs-12">
                        <div class="widget_single">
                            <h4><a href="#">Our Services</a></h4>
                            <ul>
                                <li><a href="#">Shipping & Returns</a>
                                </li>
                                <li><a href="#">International Shopping</a>
                                </li>
                                <li><a href="#">Best Customer Support</a>
                                </li>
                                <li><a href="#">Easy Replacement</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FOOTER-WIDGET-AREA:END -->

    <!-- FOOTER-AREA -->
    <div class="footer_area">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="footer_text">
                        <p>&copy;2015 <a href="index.html">E-Comshop</a>. All rights reserved</p>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="footer_right">
                        <ul>
                            <li><a href="#"><img src="{{asset('layout-client/images/mc.png')}}" alt=""/></a></li>
                            <li><a href="#"><img src="{{asset('layout-client/images/visa.png')}}" alt=""/></a></li>
                            <li><a href="#"><img src="{{asset('layout-client/images/crr.png')}}" alt=""/></a></li>
                            <li><a href="#"><img src="{{asset('layout-client/images/disco.png')}}" alt=""/></a></li>
                            <li><a href="#"><img src="{{asset('layout-client/images/bank.png')}}" alt=""/></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FOOTER-AREA:END -->
</footer>
<!-- Entire FOOTER END -->


<!-- jQuery latest -->
<script type="text/javascript" src="{{asset('layout-client/js/jQuery.2.1.4.js')}}"></script>

<!-- js Modernizr -->
<script src="{{asset('layout-client/js/modernizr-2.6.2.min.js')}}"></script>

<!-- js Modernizr -->
<script src="{{asset('layout-client/js/jquery.counterup.min.js')}}"></script>

<!-- Revolution slider -->
<script type="text/javascript" src="{{asset('layout-client/rs-plugin/js/jquery.themepunch.tools.min.js')}}"></script>
<script type="text/javascript"
        src="{{asset('layout-client/rs-plugin/js/jquery.themepunch.revolution.min.js')}}"></script>
{{--ajax--}}

<!-- Bootsrap js -->
<script src="{{asset('layout-client/js/bootstrap.min.js')}}"></script>

<!-- Plugins js -->
<script src="{{asset('layout-client/js/plugins.js')}}"></script>

<!-- Owl js -->
<script src="{{asset('layout-client/js/owl.carousel.min.js')}}"></script>

<!-- Custom js -->
<script src="{{asset('layout-client/js/main.js')}}"></script>

<script>
    $(document).ready(function () {
        $(document).on('keyup', '#keyword', function (e) {
            var keyword = $(this).val();
            var urlDetailProduct = "{{route('chi_tiet_san_pham',['slug'=>'Slug','id'=>'idProduct'])}}";
            var urlImage = "{{asset('')}}";
            var url = "{{route('searchAllProduct')}}";
            if (keyword.length > 2) {
                $.ajax({
                    type: "get",
                    url: url,
                    data: {
                        keyword: keyword
                    },
                    dataType: 'json',
                    success: function (response) {
                        console.log(response.length);
                        var _html = '';
                        if (response.length > 0) {
                            for (var item in response) {
                                if (item == 4) {
                                    break;
                                }
                                var obj = response[item];
                                urlDetailProduct = urlDetailProduct.replace('Slug', obj['slug']);
                                urlDetailProduct = urlDetailProduct.replace('idProduct', obj['id']);
                                var gia = obj.price.toLocaleString('vi', {
                                    style: 'currency',
                                    currency: 'VND'
                                });
                                _html += '<a class="clearfix" href="' + urlDetailProduct + '" title="'+obj['name']+'">';
                                _html += '<div class="img" style="width: 100px;float: left;margin-right: 59px;">';
                                _html += '<img src="' + urlImage + obj['image'] + '" style="max-height:70px;"> ';
                                _html += '</div>';
                                _html += '<div class="d-title" style="margin-top: 10px;width: 460px;">' + obj['name'] + '</div>';
                                _html += '<div class="d-title d-price" style="width: 460px;">' + gia + ' </div>';
                                _html += '</a>';
                                _html += '<hr>'
                            }
                        } else {
                            _html += '<p class="text-danger">Không tồn tại sản phẩm</p>';
                        }
                        $('.results-box').html(_html);

                        $('.results-box').fadeIn();
                    },
                    error: function () {
                        $('.results-box').fadeOut();
                    }
                });
            } else {
                $('.results-box').fadeOut();
            }

        });
    });

</script>
Link phần cuối
@stack('link-footer')


</body>


<!-- Mirrored from premiumlayers.com/html/ecom/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 27 May 2021 12:08:00 GMT -->
</html>
