@extends('client.layout-client.index')
@push('link-head')
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/charts/apexcharts.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/extensions/swiper.min.css')}}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/themes/dark-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/themes/semi-dark-layout.css')}}">
    <!-- END: Theme CSS-->
    <link rel="stylesheet" type="text/css"
          href="{{asset('/app-assets/vendors/css/forms/spinner/jquery.bootstrap-touchspin.css')}}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/pages/Dashboard-ecommerce.css')}}">
    <link rel="stylesheet" href="{{asset('ratings/rating.css')}}">
    <!-- END: Page CSS-->
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('themeAdmin/assets/css/style.css')}}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css"
          href="{{asset('/app-assets/css/plugins/forms/validation/form-validation.css')}}">
    <style>
        #sapxep {
            height: 40px;
            height: 36px;
            padding: 0 34px 0 12px;
            border: 1px solid #ebebeb;
            background: transparent;
            outline: 0;
        }

        .itemSize {
            margin-bottom: 20px;
            margin-right: 15px;
        }

        .idSize {
            padding-left: 15px;
            border: 1px solid gray;
            border-radius: 16px;
            text-align: center;
        }

        .idSize:hover {
            border: 1px solid orangered;
            color: black;
        }

        .formSl {
            margin: 10px 0px;
        }

        .input-group-prepend {
            margin-right: 38px;
        }

        .evo-product-review-details .evo-product-review-content .ba-text-fpt.has-height {
            height: 250px;
            overflow: hidden;
            -webkit-transition: height 0.2s;
            -moz-transition: height 0.2s;
            transition: height 0.2s;
        }

        .evo-product-review-details .evo-product-review-content.expanded .ba-text-fpt {
            height: auto;
            -webkit-transition: height 0.2s;
            -moz-transition: height 0.2s;
            transition: height 0.2s;
        }

        .evo-product-review-details .evo-product-review-content .show-more {
            position: relative;
            margin-top: 20px;
        }

        .evo-product-review-details .evo-product-review-content .show-more .btn--view-more {
            position: relative;
            bottom: 0px;
            left: 50%;
            width: 120px;
            margin-left: -60px;
            margin-top: 0px;
            text-align: center;
            background-color: #fff;
            color: #333;
            font-weight: normal;
            outline: none;
            box-shadow: none;
            font-size: 14px;
            border: 1px solid #333;
        }

        .evo-product-review-details .evo-product-review-content.expanded .more-text {
            display: none;
        }

        .evo-product-review-details .evo-product-review-content.expanded .less-text {
            display: block;
        }

        .evo-product-review-details .evo-product-review-content .less-text {
            display: none;
        }

        .owl-item .cloned {
            width: 180px;
        }

        .woocommerce #review_form #respond p.stars {
            margin: 0 0 0;
            font-size: 20px;
        }

        .woocommerce #reviews p.stars a {
            margin-right: 3px;
        }


        .woocommerce p.stars a {
            position: relative;
            height: 1em;
            width: 1em;
            text-indent: -999em;
            display: inline-block;
            text-decoration: none;
        }

        .woocommerce p.stars a::before {
            display: block;
            position: absolute;
            top: 0;
            left: 0;
            width: 1em;
            height: 1em;
            line-height: 1;
            font-family: WooCommerce;
            content: "\e021";
            text-indent: 0;
        }

        .message {
            color: red;
        }

        .textDanhGia {
            border-bottom: 1px solid gray;
            width: 100%;
            font-style: italic;
        }

        .boxImage {
            padding-top: 20px;
            padding-left: 20px;
            width: 1000px;
        }

        .contenComment {
            padding-left: 70px;
            border-bottom: 1px solid gray;
            width: 1000px;
        }

        .chinhSach > ul {
            list-style: none;
        }
        .iconCS{
            width: 46%;
            background-color: white;
            border: none;
            outline:none;
        }
        .timHieu{
            color: #767676;
            font-size: 12px;
            margin-top: -18px;
        }
        .infoCS{
            display: inline-block;
            font-size: 18px;
            font-weight: 700;
        }
        .iconbx{
            font-size:30px;
        }
    </style>
@endpush
@section('content-body')
    <div class="container">
        <section id="default-breadcrumb">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb" style="float: none;margin: 0px">
                            <li class="breadcrumb-item"><a href="{{route('index')}}"><i class="bx bx-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Danh M???c</a></li>
                            <li class="breadcrumb-item"><a
                                    href="{{route('tim_danh_muc',['slug'=>$product->category->slug])}}">{{$product->category->name_cate}}</a>
                            </li>

                            <li class="breadcrumb-item"><a href="#">{{$product->name}}</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </section>
    </div>
    <div class="container-fluid" style="background-color: white;padding-top: 40px;">
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <div class="row">
                        <div class="col-9">
                            <img src="{{asset('')}}{{$product->image}}" alt="{{$product->image_alt}}" class="mainImage">
                        </div>
                        <div class="col-3">
                            <ul style="list-style: none">
                                @foreach($product->product_image->where('status','=',1) as $imageDeatil)
                                    <li style="margin-bottom: 20px">
                                        <img src="{{asset('')}}{{$imageDeatil->image}}" class="img_small"
                                             id="{{$imageDeatil->id}}"
                                             onclick="changeImage({{$imageDeatil->id}})"
                                             alt="{{$imageDeatil->image_alt}}">
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-4">

                    <div class="content-detail">
                        <h1 style="font-size: 24px;">{{$product->name}}</h1>
                        <p>
                            <span>S??? view : {{$product->view}}</span>
                            <span>S??? l?????t th??ch : {{$product->like}}</span>
                        </p>
                        <p>
                            <span class="valuePriceProduct" style="font-size: 21px;">{{number_format($product->price,0,',','.')}} VN??</span>
                            <span class="salePrice" style="color: red;"></span>
                        </p>
                        <div>
                            {!! $product->descride_detail !!}
                        </div>
                        <span> <span style="font-size: 18px;">M??u s???c :</span>
                            @foreach($product->product_image->where('status','=',1) as $imageDeatil)
                                @foreach(\App\Models\Color::where('id','=',$imageDeatil->color_id)->where('status','=',1)->get() as $deatilColorProduct)
                                    <span class="colorOfProduct"> {{$deatilColorProduct->name}}, </span>
                                @endforeach
                            @endforeach</span>
                        <span class="color1"></span>
                        <ul class="nav">
                            @foreach($product->product_image->where('status','=',1) as $imageDeatil)
                                @foreach(\App\Models\Color::where('id','=',$imageDeatil->color_id)->where('status','=',1)->get() as $deatilColorProduct)
                                    <li style="margin-bottom: 20px; " class="nav-item">
                                        <a href="javascript:;" class="idColor"
                                           data-toggle="tooltip"
                                           data-placement="top"
                                           title="{{$deatilColorProduct->name}}"
                                           data-idColor="{{$deatilColorProduct->id}}">
                                            <p style="background-color:{{$deatilColorProduct->value}} ;margin-left: 10px; width: 30px ; height: 30px;"></p>
                                        </a>
                                    </li>
                                @endforeach
                            @endforeach
                            <input type="text" name="idColorClick" hidden class="idColorClick">
                        </ul>
                        <p>
                            <span style="font-size: 18px;">Size :</span>
                            <span class="sizeOfProduct">
                                        @foreach($getAllProductSize as $imageDetailSize)
                                    {{$imageDetailSize->name}},
                                @endforeach</span>
                        </p>
                        <ul class="nav" id="textSize">
                            @foreach($getAllProductSize as $imageDetailSize)
                                <li class="nav-item itemSize">
                                    <a href="javascript:;" class='idSize'
                                       data-toggle="tooltip"
                                       data-placement="top"
                                       title="{{$imageDetailSize->name}}"
                                       data-idsize="{{$imageDetailSize->id}}">
                                        {{$imageDetailSize->name}}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        <div class="chinhSach">
                            <ul>
                                <li>
                                    <button type="button" data-toggle="modal"
                                            class="iconCS"
                                            data-target="#default">
                                        <i class="bx bxs-truck iconbx"></i> <p class="infoCS"> Giao h??ng</p> <i
                                            class="bx bxs-help-circle"></i>
                                        <p class="timHieu">T??m hi???u th??m</p>
                                    </button>
                                    <!--Basic Modal -->
                                    <div class="modal fade text-left" id="default" tabindex="-1" role="dialog"
                                         aria-labelledby="myModalLabel1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close rounded-pill"
                                                            data-dismiss="modal" aria-label="Close">
                                                        <i class="bx bx-x"></i>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p style="text-align: justify-all">
                                                    <h5 style="text-align: center;"> CH??NH S??CH GIAO H??NG</h5>
                                                    <br>
                                                    <ul style="list-style: none">
                                                        <li>
                                                            1. Th???i gian giao h??ng:
                                                            Th???i gian l?? 2-3 ng??y ?????i v???i khu v???c trung t??m t???nh th??nh
                                                            ph???, 3-7 ng??y ?????i v???i khu v???c ngo???i th??nh, huy???n, x??, th???
                                                            tr???n???
                                                            ????? ki???m tra th??ng tin ho???c t??nh tr???ng ????n h??ng c???a qu??
                                                            kh??ch, xin vui lo??ng inbox fanpage ho???c g???i s??? hotline, cung
                                                            c???p t??n, s??? ??i???n tho???i ????? ???????c ki???m tra.
                                                            Khi h??ng ???????c giao ?????n qu?? kh??ch, vui l??ng k?? x??c nh???n v???i
                                                            nh??n vi??n giao h??ng v?? ki???m tra l???i s??? l?????ng c??ng nh?? lo???i
                                                            h??ng h??a ???????c giao c?? ch??nh x??c kh??ng. Xin qu?? kh??ch vui
                                                            l??ng gi??? l???i bi??n l???i v???n chuy???n v?? h??a ????n mua h??ng ????? ?????i
                                                            chi???u ki???m tra.
                                                        </li>
                                                        <li>
                                                            2. Ph?? giao h??ng:
                                                            Ph?? ship c??? ?????nh l?? 30,000?? ??p d???ng cho m???i khu v???c
                                                        </li>
                                                    </ul>
                                                    </p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light-secondary"
                                                            data-dismiss="modal">
                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">????ng</span>
                                                    </button>
                                                    <button type="button" class="btn btn-primary ml-1"
                                                            data-dismiss="modal">
                                                        <i class="bx bx-check d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">???? hi???u</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <button type="button" data-toggle="modal" style="width: 36%;"  class="iconCS" data-target="#border-less">
                                        <i class="bx bxs-book-bookmark iconbx"></i>
                                        <p class="infoCS">Quy t???c</p>
                                        <i class="bx bxs-help-circle "></i>
                                        <p class="timHieu" style="padding-left: 25px;">T??m hi???u th??m</p>
                                    </button>
                                    <!--BorderLess Modal Modal -->
                                    <div class="modal fade text-left modal-borderless" id="border-less" tabindex="-1"
                                         role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3 class="modal-title">Quy t???c</h3>
                                                    <button type="button" class="close rounded-pill"
                                                            data-dismiss="modal" aria-label="Close">
                                                        <i class="bx bx-x"></i>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p style="text-align:justify-all">
                                                    <h5 style="text-align: center">Quy t???c</h5>
                                                    <ul>
                                                        <li>
                                                            D???ch v??? thanh to??n khi nh???n h??ng ch??? kh??? d???ng khi t???ng s???
                                                            ti???n t??? 0?? ?????n 4.618.000?? sau khi gi???m gi??(US$200 )
                                                            Kh??ng c???n ch???u ph?? COD.
                                                        </li>
                                                        <li>
                                                            Ch??ng t??i kh??ng h??? tr??? ???????c ki???m tra h??ng tr?????c khi thanh
                                                            to??n
                                                        </li>
                                                        <li>
                                                            Trong c??c tr?????ng h???p sau, kh??ng h??? tr??? ???????c d???ch v??? COD.
                                                        </li>
                                                        <li>
                                                            Theo h??? s?? ????n ?????t h??ng tr?????c ????y c???a b???n, d???ch v??? COD c???a
                                                            b???n ???? b??? h???n ch??? .
                                                        </li>
                                                    </ul>

                                                    </p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light-primary"
                                                            data-dismiss="modal">
                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">????ng</span>
                                                    </button>
                                                    <button type="button" class="btn btn-primary ml-1"
                                                            data-dismiss="modal">
                                                        <i class="bx bx-check d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">???? hi???u</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <button type="button" data-toggle="modal"  class="iconCS" style="width: 68%;"
                                            data-target="#exampleModalCenter">
                                        <i class="bx bxs-badge-check iconbx"></i>
                                        <p class="infoCS">Ch??nh s??ch ho??n tr???</p>
                                        <i class="bx bxs-help-circle"></i>
                                        <p class="timHieu" style="margin-left: -75px;">T??m hi???u th??m</p>

                                    </button>

                                    <!-- Vertically Centered modal Modal -->
                                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div
                                            class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                                            role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalCenterTitle">Ch??nh s??ch ho??n
                                                        tr???</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <i class="bx bx-x"></i>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>
                                                    <h5 style="text-align: center">?????m b???o c???a ch??ng t??i</h5>
                                                    Tr??? l???i ho???c trao ?????i trong v??ng 15 ng??y k??? t??? ng??y giao h??ng.
                                                    Y??u c???u:
                                                    <ul style="list-style: none;">
                                                        <li>
                                                            1. C??c m???t h??ng nh???n ???????c trong v??ng 15 ng??y k??? t??? ng??y giao
                                                            h??ng.
                                                        </li>
                                                        <li>
                                                            2. C??c m???t h??ng nh???n ???????c kh??ng s??? d???ng, kh??ng b??? h?? h???ng v??
                                                            trong g??i ban ?????u.
                                                        </li>
                                                        <li>
                                                            3. Ph?? v???n chuy???n tr??? l???i ???????c tr??? b???i ng?????i mua.
                                                        </li>
                                                    </ul>7olol
                                                    </p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light-secondary"
                                                            data-dismiss="modal">
                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">????ng</span>
                                                    </button>
                                                    <button type="button" class="btn btn-primary ml-1"
                                                            data-dismiss="modal">
                                                        <i class="bx bx-check d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">???? hi???u</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="d-inline-block mb-1 mr-1">
                            <label for="">S??? l?????ng</label>
                            <input type="text" class="touchspin-color" min="1" value="1"
                                   data-bts-button-down-class="btn btn-primary"
                                   data-bts-button-up-class="btn btn-primary"/>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-warning addCart form-control" disabled> Th??m v??o gi??? h??ng</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <input type="text" value="{{$product->id}}" hidden name="idProduct" class="idProduct">
        <section class="men_clothingcurosel_area section-padding">
            <div class="container">
                <span>S???n Ph???m Li??n Quan</span>
                <div class="row" style="margin: 15px 0px;">
                    <div class="col-md-12">
                        <div class="menclothing-carousel">
                            @foreach($getAllGProductInCate as $productOfSpecil)
                                <div class="men-single" style="position: relative;width: 90%">
                                    <a href="{{route('chi_tiet_san_pham',['slug'=>$productOfSpecil->slug,'id'=>$productOfSpecil->id])}}">
                                        <img src="{{asset('')}}{{$productOfSpecil->image}}"
                                             alt="{{$productOfSpecil->image_alt}}" width="150px">
                                    </a>
                                    <div class="hot-wid-rating">
                                        <h4>
                                            <a href="{{route('chi_tiet_san_pham',['slug'=>$productOfSpecil->slug,'id'=>$productOfSpecil->id])}}">{{$productOfSpecil->name}}</a>
                                        </h4>
                                        <div class="product-wid-price">
                                            <ins
                                                style="font-size: 14px;">{{number_format($productOfSpecil->price,0,',','.')}}
                                                VN??
                                            </ins>
                                        </div>
                                    </div>

                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="container">
            <section id="basic-tabs-components">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home"
                           aria-controls="home" role="tab" aria-selected="true">
                            <i class="bx bx-home align-middle"></i>
                            <span class="align-middle">M?? t???</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="about-tab" data-toggle="tab" href="#about"
                           aria-controls="about" role="tab" aria-selected="false">
                            <i class="bx bx-message-square align-middle"></i>
                            <span class="align-middle">B??nh Lu???n</span>
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="home" aria-labelledby="home-tab" role="tabpanel">
                        <div class="container" style="margin-top: 30px;">
                            <div class=" evo-product-review-details">
                                <div class="evo-product-review-content">
                                    <div class="ba-text-fpt has-height">
                                        {!! $product->descride !!}
                                    </div>
                                    <div class="show-more">
                                        <div class="btn btn-default btn--view-more">
                                            <span class="more-text">Xem th??m <i class="bx bxs-downvote"></i></span>
                                            <span class="less-text">Thu g???n <i
                                                    class="bx bxs-upvote"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="about" aria-labelledby="about-tab" role="tabpanel">
                        <form action="{{route('addComment',['id'=>$product->id])}}" method="post"
                              class="needs-validation" novalidate>
                            @csrf
                            @method("POST")
                            <label for="">????nh gi?? </label>
                            <div class="form-group">
                                <div class="controls">
                                    <div class="rate">
                                        <input type="radio" id="star5" name="rating"
                                               data-validation-required-message="????nh gi?? kh??ng ???????c ????? tr???ng !"
                                               value="5"/>
                                        <label for="star5" title="R???t t???t">5 stars</label>
                                        <input type="radio" id="star4" name="rating"
                                               data-validation-required-message="????nh gi?? kh??ng ???????c ????? tr???ng !"
                                               value="4"/>
                                        <label for="star4" title="T???t">4 stars</label>
                                        <input type="radio" id="star3"
                                               data-validation-required-message="????nh gi?? kh??ng ???????c ????? tr???ng !"
                                               name="rating" value="3"/>
                                        <label for="star3" title="B??nh Th?????ng">3 stars</label>
                                        <input type="radio" id="star2"
                                               data-validation-required-message="????nh gi?? kh??ng ???????c ????? tr???ng !"
                                               name="rating" value="2"/>
                                        <label for="star2" title="T???">2 stars</label>
                                        <input type="radio" id="star1"
                                               data-validation-required-message="????nh gi?? kh??ng ???????c ????? tr???ng !"
                                               name="rating" value="1"/>
                                        <label for="star1" title="R???t t???">1 star</label>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <br>
                            @error('rating')
                            <span class="message">{{$message}}</span>
                            @enderror
                            <div class="form-group">
                                <label for="">B??nh lu???n <sup style="color: red;">*</sup></label>
                                <div class="controls">
                                <textarea name="content"
                                          class="form-control"
                                          cols="50" rows="5"
                                          data-validation-required-message="B??nh lu???n kh??ng ???????c ????? tr???ng !"
                                          minlength="6"
                                          data-validation-minlength-message="B??nh lu???n kh??ng ???????c 6 k?? t??? !"
                                          value="{{old('content')}}"
                                          placeholder="M???i b???n ????? l???i b??nh lu???n"></textarea>
                                </div>
                                @error('content')
                                <span class="message">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">H??? t??n <sup style="color: red">*</sup></label>
                                        <div class="controls">
                                            @if(auth()->user())
                                                <input type="text" name="name"
                                                       value="{{auth()->user()->full_name}}"
                                                       placeholder="H??? t??n"
                                                       data-validation-required-message="H??? t??n kh??ng ???????c ????? tr???ng !"
                                                       data-validation-containsnumber-regex="^[a-zA-Z-'(??????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????D) ]*$"
                                                       data-validation-containsnumber-message="T??n ch??? ch???a c??c k?? t??? ch??? c??i !"
                                                       maxlength="255"
                                                       data-validation-maxlength-message="T??n kh??ng qu?? 255 k?? t??? !"
                                                       class="form-control">
                                            @else
                                                <input type="text" name="name"
                                                       placeholder="H??? t??n "
                                                       data-validation-required-message="H??? t??n kh??ng ???????c ????? tr???ng !"
                                                       data-validation-containsnumber-regex="^[a-zA-Z-'(??????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????D) ]*$"
                                                       data-validation-containsnumber-message="T??n ch??? ch???a c??c k?? t??? ch??? c??i !"
                                                       maxlength="255"
                                                       value="{{old('name')}}"

                                                       data-validation-maxlength-message="T??n kh??ng qu?? 255 k?? t??? !"
                                                       class="form-control">
                                            @endif
                                        </div>
                                        @error('name')
                                        <span class="message">{{$message}}</span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">S??? ??i???n tho???i <sup style="color: red">*</sup> </label>
                                        <div class="controls">
                                            @if(auth()->user())
                                                <input type="text" name="numberPhone"
                                                       value="{{auth()->user()->phone}}"
                                                       placeholder="S??? ??i???n tho???i"
                                                       data-validation-required-message="Phone kh??ng ???????c ????? tr???ng !"
                                                       placeholder="Phone"
                                                       data-validation-containsnumber-regex="((^0)(32|33|34|35|36|37|38|39|56|58|59|70|76|77|78|79|81|82|83|84|85|86|88|89|90|92|91|93|94|96|97|98|99)+([0-9]{7}))$"
                                                       data-validation-containsnumber-message="S??? ??i???n tho???i kh??ng h???p l??? !"
                                                       class="form-control">
                                            @else
                                                <input type="text" name="numberPhone"
                                                       value="{{old('numberPhone')}}"
                                                       placeholder="H??? t??n "
                                                       data-validation-required-message="Phone kh??ng ???????c ????? tr???ng !"
                                                       placeholder="Phone"
                                                       data-validation-containsnumber-regex="((^0)(32|33|34|35|36|37|38|39|56|58|59|70|76|77|78|79|81|82|83|84|85|86|88|89|90|92|91|93|94|96|97|98|99)+([0-9]{7}))$"
                                                       data-validation-containsnumber-message="S??? ??i???n tho???i kh??ng h???p l??? !"
                                                       class="form-control">
                                            @endif
                                        </div>
                                        @error('numberPhone')
                                        <span class="message">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group" style="float: right;">
                                        <button class="btn btn-primary">G???i</button>
                                    </div>
                                </div>

                            </div>
                        </form>
                        <div class="row">
                            <span class="textDanhGia"> C??c ????nh gi??</span>
                            <div class="col-12">
                                @foreach($getCommentOfProduct as $comment)
                                    <div class="form-group">
                                        <div class="boxImage">
                                            <img src="{{asset('/image-use/user.png')}}" width="50px"
                                                 alt="{{$comment->name}}">
                                            <span style="font-weight: bold">{{$comment->name}}</span>
                                            <span
                                                style="font-style: italic;float: right">{{$comment->created_at}}</span><br>
                                            <div class="rate" style="margin-top: -20px;padding-left: 57px;">
                                                <input type="radio" id="star5" @if($comment->rating ==5) checked
                                                       @endif name="rating" value="5"/>
                                                <label for="star5" title="R???t t???t" style="font-size:22px;">5
                                                    stars</label>
                                                <input type="radio" id="star4" name="rating" value="4"
                                                       @if($comment->rating ==4) checked @endif/>
                                                <label for="star4" title="T???t" style="font-size:22px;">4 stars</label>
                                                <input type="radio" id="star3" name="rating" value="3"
                                                       @if($comment->rating ==3) checked @endif/>
                                                <label for="star3" title="B??nh Th?????ng" style="font-size:22px;">3
                                                    stars</label>
                                                <input type="radio" id="star2" name="rating" value="2"
                                                       @if($comment->rating ==2) checked @endif/>
                                                <label for="star2" title="T???" style="font-size:22px;">2 stars</label>
                                                <input type="radio" id="star1" name="rating" value="1"
                                                       @if($comment->rating ==1) checked @endif/>
                                                <label for="star1" title="R???t t???" style="font-size:22px;">1 star</label>
                                            </div>
                                        </div>
                                        <br>
                                    </div>
                                    <div class="contenComment">
                                        <p>{{$comment->content}}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>


@endsection
@push('link-footer')
    <script src="{{asset('/app-assets/vendors/js/vendors.min.js')}}"></script>
    <script src="{{asset('/app-assets/js/scripts/configs/vertical-menu-dark.js')}}"></script>
    <script src="{{asset('/app-assets/js/core/app-menu.js')}}"></script>
    <script src="{{asset('/app-assets/js/core/app.js')}}"></script>
    <script src="{{asset('/app-assets/js/scripts/components.js')}}"></script>
    <script src="{{asset('/app-assets/js/scripts/footer.js')}}"></script>
    <script src="{{asset('/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js')}}"></script>
    <script src="{{asset('/app-assets/js/scripts/forms/validation/form-validation.js')}}"></script>

    <script src="{{asset('/app-assets/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js')}}"></script>
    <script src="{{asset('/app-assets/js/scripts/forms/number-input.js')}}"></script>
    <script src="{{asset('/app-assets/js/scripts/modal/components-modal.js')}}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $('.btn--view-more').on('click', function (e) {
            e.preventDefault();
            var $this = $(this);
            $this.parents('.evo-product-review-details').find('.evo-product-review-content').toggleClass('expanded');
            $('html, body').animate({scrollTop: $('.evo-product-review-details').offset().top - 110}, 'slow');
            $(this).toggleClass('active');
            return false;
        });
    </script>
    <script>
        $('.idSize').on('click', function () {
            swal({
                title: 'Th??ng B??o',
                text: 'Xin m???i b???n ch???n m??u !',
                icon: 'warning',
                button: 'Ok'
            })
        });
    </script>
    <script>
        function changeImage(id) {
            let element = document.getElementById(id);
            let imagePath = element.getAttribute('src');
            var list = $('.img_small');
            $('.mainImage').attr('src', imagePath);
            for (let i = 0; i < list.length; i++) {
                list[i].style.border = "none";
                list[i].style.opacity = "1";
            }
            element.style.border = "2px solid black";
            element.style.opacity = "0.8";
            element.style.padding = "5px";
        }
    </script>
    <script>
        var idProduct = $('.idProduct').val();
        var urlPath = "{{asset('')}}";
        var urlgetAttributeProduct = "{{route('getAttributeProduct')}}"
        var urlvalueDetailOfProduct = "{{route('valueDetailOfProduct')}}";
        $('.idColor').on('click', function () {
            var idColor = $(this).attr('data-idColor');
            var listColor = $('.idColor').children();

            for (var i = 0; i < listColor.length; i++) {
                listColor[i].style.border = "none";
                listColor[i].style.opacity = "1";
                listColor[i].style.color = "black";
            }
            $(this).children().css('border', "2px solid red");
            $.ajax({
                type: "get",
                url: urlgetAttributeProduct,
                data: {
                    idColor: idColor,
                    idProduct: idProduct
                },
                dataType: 'json',
                success: function (response) {
                    var _html = '';
                    var inSize = '';

                    if (response.length > 0) {
                        var arr1 = response[0];
                        var arr2 = response[1];
                        var arr3 = response[2]
                        console.log(response);
                        arr1.forEach(element => {
                            element.forEach(value => {
                                _html += ' <li class="nav-item itemSize">';
                                _html += '<a href="javascript:;" class="idSize" data-toggle="tooltip" data-placement="top" title="' + value['name'] + '" data-idsize="' + value['id'] + '">' + value['name'] + '</a> </li>';
                                inSize += value['name'] + ',';
                            })
                        });
                        $('.sizeOfProduct').html(inSize);
                        $('.mainImage').attr('src', urlPath + arr2['image']);
                        $('.colorOfProduct').remove();
                        $('.color1').html(arr3['name']);
                    }
                    $('.idColorClick').val(idColor);
                    $('#textSize').html(_html);


                    $('.idSize').on('click', function () {
                        var listSize = $('.idSize');
                        for (var i = 0; i < listSize.length; i++) {
                            listSize[i].style.border = "none";
                            listSize[i].style.opacity = "1";
                            listSize[i].style.color = "black";
                        }
                        $(this).css('border', "1px solid orangered");
                        $(this).css('opacity', "0.8");
                        $(this).css('padding', "5px 15px");
                        $(this).css('color', 'red');
                        var idSize = $(this).attr('data-idSize');
                        var nameSize = $(this).text();
                        $('.sizeOfProduct').html(nameSize);
                        if (idColor == "") {
                            alert('Xin m???i b???n ch???n m??u');
                        } else {
                            $.ajax({
                                type: "get",
                                url: urlvalueDetailOfProduct,
                                data: {
                                    idColor: idColor,
                                    idSize: idSize,
                                    idProduct: idProduct,
                                },
                                dataType: 'json',
                                success: function (response) {
                                    var giaNhap = response.gia_nhap.toLocaleString('vi', {
                                        style: 'currency',
                                        currency: 'VND'
                                    });
                                    var giaBan = response.gia_ban.toLocaleString('vi', {
                                        style: 'currency',
                                        currency: 'VND'
                                    });
                                    $('.valuePriceProduct').html(giaBan);
                                    $('.salePrice').html(giaNhap);
                                    $('.addCart').removeAttr("disabled");
                                },
                            });
                        }
                    });
                }
            });
        });

    </script>
    <script>
        (function () {
            'use strict'
            var forms = document.querySelectorAll('.needs-validation')

            Array.prototype.slice.call(forms)
                .forEach(function (form) {
                    form.addEventListener('submit', function (event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }
                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>
@endpush
