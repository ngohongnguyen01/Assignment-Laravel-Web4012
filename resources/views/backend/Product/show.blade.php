@extends('backend.layout-admin.index')
@section('content-body')
    <div class="content-header row">
        <div class="content-header-left col-12 mb-2 mt-1">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h5 class="content-header-title float-left pr-1 mb-0">Products Tables</h5>
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb p-0 mb-0">
                            <li class="breadcrumb-item"><a href="{{route('backend.admin')}}"><i
                                        class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active">
                                Products
                            </li>
                            <li class="breadcrumb-item active">
                                {{$data->name}}
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row" id="table-bordered">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"></h4>
                </div>
                <div class="card-content">
                    <!-- table bordered -->
                    <div class="table-responsive">
                        <div class="row">
                            <div class="col-4">
                                <img src="{{asset('')}}{{$data->image}}" class="img-thumbnail"
                                     alt="{{$data->image_alt}}">
                            </div>
                            <div class="col-8">
                                <h4 class="text-left">{{$data->name}} <span class="font-small-3"
                                                                            style="padding-left: 400px;">{{$data->date_add}}</span>
                                </h4>
                                <p><span class="font-medium-3">{{$data->view}} <i
                                            class="bx bx-heart text-danger"></i></span> <span class="font-medium-3">{{$data->like}} <i
                                            class="bx bx-show-alt text-primary"></i></span></p>
                                <h5 class="text-danger">{{number_format($data->price,3,'.',',') }}VNĐ</h5>
                                <div class="justify-content-center" style="width: 80%;">
                                    {!! $data->descride_detail !!}
                                </div>
                            </div>
                        </div>
                        <h4 class="text-center" style="margin-top: 20px;">Thông tin sản phẩm</h4>
                        <div class="row">
                            <div class="col-1"></div>
                            <div class="col-10">
                                {!! $data->descride !!}
                            </div>
                            <div class="col-1"></div>
                        </div>

                        @foreach($detail_image as $key=>$value)
                            <div class="card-header">
                                @foreach(\App\Models\Color::where('id','=',$value->color_id)->get() as $nameColor)
                                    <h3 class="text-center btn-primary">  {{$nameColor->name}}</h3>
                                @endforeach
                            </div>
                            <img src="{{url('')}}/{{$value->image}}" width="250px" alt="" style="float:left">
                            <table class="table table-bordered " style=" width:70%">
                                <thead>
                                <tr>
                                    <th>NAME</th>
                                    <th>Số Lượng</th>
                                    <th>Giá Bán</th>
                                    <th>Giá Nhập</th>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(\App\Models\ProductDetail::where('product_image_id','=',$value->id)->get() as $getSize)
                                    @foreach(\App\Models\Size::where('id','=',$getSize->size_id)->get() as $nameSize)
                                        <tr>
                                            <td>Tên size : {{$nameSize->name}}</td>
                                            <td>{{$getSize->so_luong}}</td>
                                            <td> {{number_format($getSize->gia_ban,3,',','.')}} VNĐ</td>
                                            <td> {{number_format($getSize->gia_nhap,3,',','.')}} VNĐ</td>
                                        </tr>
                                    @endforeach
                                @endforeach
                                </tbody>
                            </table>

                    </div>

                    @endforeach
                </div>
                <div class="row pull-right" style="margin-top: 50px">
                    <div class="form-group ml-5" style="padding-left: 900px">
                        <a href="{{route('product.index')}}" class="btn btn-primary">Quay Lại</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

