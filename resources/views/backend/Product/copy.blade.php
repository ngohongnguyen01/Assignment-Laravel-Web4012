@extends('backend.layout-admin.index')
@push('link-script')
    <link rel="stylesheet" type="text/css"
          href="{{asset('/app-assets/css/plugins/forms/validation/form-validation.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/pages/app-invoice.css')}}">
    <!-- END: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/forms/select/select2.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('/app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('/app-assets/vendors/css/tables/datatable/extensions/dataTables.checkboxes.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('/app-assets/vendors/css/tables/datatable/responsive.bootstrap.min.css')}}">
    <script>
        tinymce.init({
            selector: '#mytextarea'
        });
    </script>
    <style>
        .message {
            width: 100%;
            margin-top: .25rem;
            font-size: .875em;
            color: #dc3545;
        }

        .bottom {
            display: none;
        }
    </style>
@endpush
@section('content-body')
    <div class="content-header row">
        <div class="content-header-left col-12 mb-2 mt-1">
            <div class="row breadcrumbs-top">
                <div class="col-12" style="padding-top: 20px;">
                    <h5 class="content-header-title float-left pr-1 mb-0">Products Tables</h5>
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb p-0 mb-0">
                            <li class="breadcrumb-item"><a href="{{route('backend.admin')}}"><i
                                        class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active">
                                Products
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="app-content content" style="width: 100%;margin: 0px;">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- invoice list -->
                <section class="invoice-list-wrapper">
                    <!-- create invoice button-->
                    <div class="invoice-create-btn mb-1">
                        <a href="{{route('product.create')}}" class="btn btn-primary glow invoice-create" role="button"
                           aria-pressed="true">Create
                            Product</a>
                    </div>
                    <!-- Options and filter dropdown button-->
                    <div class="action-dropdown-btn d-none">
                        <div class="dropdown invoice-filter-action">
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table invoice-data-table dt-responsive nowrap" style="width:100%">
                            <thead>
                            <tr>
                                <th></th>
                                <th>ID</th>
                                <th>image</th>
                                <th>NAME</th>
                                <th>Price</th>
                                <th>Category</th>
                                <th>STATUS</th>
                                <th>Highlight</th>
                                <th>ACTION</th>
                                <th></th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($data as $key => $value)
                                <tr id='colum-{{$value->id}}' style="padding-top: 10px">
                                    <td></td>
                                    <td>{{$value->id}}</td>
                                    <td><img src="{{asset('')}}{{$value->image}}" width="50px" alt=""></td>
                                    <td>{{$value->name}}</td>
                                    <td>{{number_format($value->price,3,'.',",")}}</td>
                                    <td>{{$value->category->name_cate}}</td>
                                    <td width="5%">
                                        @if ($value->status == config('common.products.status.Active'))
                                            <span class="badge badge-light-success">Active</span>
                                        @else
                                            <span class="badge badge-light-danger">Close</span>
                                        @endif
                                    </td>
                                    <td width="5%">
                                        @if ($value->highlight == config('common.products.highlight.Special'))
                                            <span class="badge badge-light-success">Special</span>
                                        @else
                                            <span class="badge badge-light-danger">Normal</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('product.edit',$value->id)}}" style="margin-left: -10px"
                                           class="btn btn-icon btn-primary rounded-circle"><i
                                                class="bx bx-edit-alt"></i></a>&emsp;
                                        <meta name="csrf-token" content="{{ csrf_token() }}">
                                        <a class="btn btn-icon btn-danger rounded-circle" href="#" id='deleteWeb'
                                           data-value='{{$value->id}} ' data-url="{{route('product.destroy',$value->id)}}"
                                           style="margin-left:-10px;color:white">
                                            <i class="bx bx-x"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{route('product.show',$value->id)}}"
                                           class="btn btn-icon btn-danger rounded-circle"><i class="bx bx-show-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="col-12" style="padding-top: 20px;">
                            <span class="text-center">{{ $data->links() }}</span>
                        </div>

                    </div>
                </section>
            </div>
        </div>
    </div>


@endsection

@push('scripts')
    <!-- BEGIN: Page JS-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{asset('/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js')}}"></script>

    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
    <!-- BEGIN: Page Vendor JS-->
    <script src="{{asset('/app-assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
    <script src="{{asset('/app-assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('/app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js')}}"></script>
    <script src="{{asset('/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('/app-assets/vendors/js/tables/datatable/responsive.bootstrap.min.js')}}"></script>
    <!-- END: Page Vendor JS-->
    <!-- BEGIN: Page JS-->
    <script src="{{asset('app-assets/js/scripts/pages/app-invoice.js')}}"></script>
    <!-- END: Page JS-->


    <script>
        $(document).ready(function () {
            $(document).on('click', '#deleteWeb', function (e) {
                e.preventDefault();
                var id = $(this).attr('data-value');
                var url = $(this).data('url');

                if (confirm('Bạn có chắc muốn xóa thông tin này không ??')) {
                    $.ajax({
                        type: "delete",
                        url: url,
                        data: {
                            somefield: "Some field value", _token: '{{csrf_token()}}'
                        },
                        dataType: 'json',
                        success: function (response) {
                            swal({
                                title: 'Thông Báo',
                                text: response.message,
                                icon: 'success',
                                button: 'Ok'
                            })
                            $('#colum-' + id).remove();
                        }

                    })
                }
            })
        })
    </script>
@endpush
