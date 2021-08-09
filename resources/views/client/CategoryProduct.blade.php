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

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/pages/Dashboard-ecommerce.css')}}">

    <!-- END: Page CSS-->
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('themeAdmin/assets/css/style.css')}}">
    <style>
        #sapxep {
            height: 40px;
            height: 36px;
            padding: 0 34px 0 12px;
            border: 1px solid #ebebeb;
            background: transparent;
            outline: 0;
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
                            <li class="breadcrumb-item"><a href="#">Danh Mục</a></li>
                            <li class="breadcrumb-item active"><a href="#">{{$category->name_cate}}</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </section>
    </div>
    <div class="container-fluid" style="background-color: white;padding-top: 40px;">
        <div class="container">

            <div class="row">
                <div class="col-3">
                    <div class="locTheoMau">
                        <div class="filterAttributeColor" style="padding-top: 55px;">
                            <h3 class="text-center"
                                style="background-color: black;color: white;height: 40px;padding-top: 5px"> Màu sắc</h3>
                            <div class="filterColor">
                                <div class="form-group">
                                    <div class="card">
                                        <div class="card-content collapse show">
                                            <div class="card-body" style="padding: 20px;">
                                                <ul style="list-style: none;">
                                                    @foreach($allColor as $colors)
                                                        <li>
                                                            <input type="radio" class="check_children"
                                                                   name="filterOfColor[]"
                                                                   value="{{$colors->id}}"> {{$colors->name}}
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="filterAttributeSize">
                            <h3 class="text-center"
                                style="background-color: black;color: white;height: 40px;padding-top: 5px"> Lọc theo
                                Size</h3>
                            <div class="filterColor">
                                <div class="form-group">
                                    <div class="card">
                                        <div class="card-content collapse show">
                                            <div class="card-body" style="padding: 20px;">
                                                <ul style="list-style: none">
                                                    @foreach($allSize as $sizes)
                                                        <li>
                                                            <input type="radio" class="check_children"
                                                                   name="filterOfSize[]"
                                                                   value="{{$sizes->id}}"> {{$sizes->name}}
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-9">
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-6">
                            <input type="text" name="id" value="{{$category->id}}" hidden>
                            <h1 style="margin: 0;font-size: 18px;text-transform: uppercase;">{{$category->name_cate}}</h1>
                        </div>
                        <div class="col-6">
                            <div class="sapxep" style="float: right;">
                                <span>Sắp xếp theo</span>
                                <span>
                                    <select name="sapxep" id="sapxep">
                                        <option value="0">Sản Phẩm nổi Bật</option>
                                        <option value="1">Giá : Tăng dần</option>
                                        <option value="2">Giá : Giảm dần</option>
                                        <option value="3">Tên : A-Z</option>
                                        <option value="4">Tên : Z-A</option>
                                        <option value="5">Mới nhất</option>
                                        <option value="6">Cũ nhất</option>
                                    </select>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="inPs">
                        @foreach($category->products as $valuePro)
                            <div class="col-3">
                                <a href="{{route('chi_tiet_san_pham',['slug'=>$valuePro->slug,'id'=>$valuePro->id])}}">
                                    <img src="{{asset('')}}{{$valuePro->image}}" alt="{{$valuePro->image_alt}}">
                                </a>
                                <div class="content-product" style="margin-top: 15px;">
                                    <a href="{{route('chi_tiet_san_pham',['slug'=>$valuePro->slug,'id'=>$valuePro->id])}}"><h3
                                            class="text-center" title="{{$valuePro->name}}"
                                            style="font-weight: 400;color: #545050;font-size: 14px;">{{$valuePro->name}}</h3>
                                    </a>
                                    <div class="price">
                                        <span style="color: red">{{number_format($valuePro->price,0,',','.')}} ₫</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('link-footer')

    <script>
        $(document).ready(function () {
            $(document).on('change', '#sapxep', function (e) {
                var keyword = $(this).val();
                var id = $("input[name='id']").val();
                var url = "{{route('sap_sep_yeu_cau',['id'=>'idFilter'])}}"
                var urlDetailProduct = "{{route('chi_tiet_san_pham',['slug'=>'Slug','id'=>'idOfProduct'])}}";
                url = url.replace('idFilter', id);
                $.ajax({
                    type: "get",
                    url: url,
                    data: {
                        keyword: keyword
                    },
                    dataType: 'json',
                    success: function (response) {

                        var _html = '';
                        if (response.length > 0) {
                            for (var item in response) {
                                var obj = response[item];
                                urlDetailProduct=urlDetailProduct.replace('Slug',obj['slug']);
                                urlDetailProduct = urlDetailProduct.replace('idOfProduct',obj['id']);
                                console.log(urlDetailProduct);
                                _html += '<div class="col-3"> <a href="' + urlDetailProduct + '"> <img src="' + obj['image'] + '" alt="' + obj['image_alt'] + '"> </a>';
                                _html += '  <div class="content-product" style="margin-top: 15px;"> <a href="' + urlDetailProduct + '"><h3 class="text-center" title="' + obj['name'] + '"style="font-weight: 400;color: #545050;font-size: 14px;">' + obj['name'] + '</h3></a>';
                                _html += '<div class="price"> <span style="color: red">' + obj['price'] + '</span></div></div></div>';
                            }
                            $('#inPs').html(_html);
                            console.log('Success');
                        } else {
                            _html += '<p class="text-danger">Không tồn tại sản phẩm</p>';
                        }

                    },
                });
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $(document).on('click', '.check_children', function (e) {
                var keyword = $(this).val();
                var id = $("input[name='id']").val();
                var url = "{{route('sap_sep_yeu_cau',['id'=>'filterOfCate'])}}"
                url = url.replace('filterOfCate', id);
                var urlDetailProduct = "{{route('chi_tiet_san_pham',['slug'=>'Slug','id'=>'idOfProduct'])}}";
                console.log(url);
                $.ajax({
                    type: "get",
                    url: url,
                    data: {
                        keyword: keyword
                    },
                    dataType: 'json',
                    success: function (response) {

                        var _html = '';
                        if (response.length > 0) {
                            for (var item in response) {
                                var obj = response[item];
                                urlDetailProduct=urlDetailProduct.replace('Slug',obj['slug']);
                                urlDetailProduct = urlDetailProduct.replace('idOfProduct',obj['id']);
                                console.log(urlDetailProduct);
                                _html += '<div class="col-3"> <a href="' + urlDetailProduct + '"> <img src="' + obj['image'] + '" alt="' + obj['image_alt'] + '"> </a>';
                                _html += '  <div class="content-product" style="margin-top: 15px;"> <a href="' + urlDetailProduct + '"><h3 class="text-center" title="' + obj['name'] + '"style="font-weight: 400;color: #545050;font-size: 14px;">' + obj['name'] + '</h3></a>';
                                _html += '<div class="price"> <span style="color: red">' + obj['price'] + '</span></div></div></div>';
                            }
                            $('#inPs').html(_html);
                            console.log('Success');
                        } else {
                            _html += '<p class="text-danger">Không tồn tại sản phẩm</p>';
                        }

                    },
                });
            });
        });
    </script>
@endpush
