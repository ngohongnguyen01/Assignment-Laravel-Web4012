@extends('backend.layout-admin.index')
@section('content-body')
    <div class="content-header row">
        <div class="content-header-left col-12 mb-2 mt-1">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h5 class="content-header-title float-left pr-1 mb-0">Bootstrap Tables</h5>
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb p-0 mb-0">
                            <li class="breadcrumb-item"><a href="{{route('backend.admin')}}"><i
                                        class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active">
                                Category
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
                    <h4 class="card-title">List Category</h4>
                </div>
                <div class="card-content">
                    <!-- table bordered -->
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>NAME</th>
                                <th>SLUG</th>
                                <th>IMAGE</th>
                                <th>STATUS</th>
                                <th>DATE ADD</th>
                                <th width="15%">ACTION</th>
                                <th><a href="{{route('category.create')}}" class="btn btn-primary pull-left">Add</a>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($data as $key => $value)
                                <tr id='colum-{{$value->id}}'>
                                    <td class="text-bold-500">{{$key+1}}</td>
                                    <td>{{$value->name_cate}}</td>
                                    <td class="text-bold-500">{{$value->slug}}</td>
                                    <td><img
                                            src="{{url('')}}{{$value->image}}"
                                            width="50px" alt=""></td>
                                    <td>
                                        @if ($value->status == config('common.categories.Active'))
                                            <span class="badge badge-light-success">Active</span>
                                        @else
                                            <span class="badge badge-light-danger">Close</span>
                                        @endif
                                    </td>
                                    <td>{{$value->date_add}}</td>
                                    <td>
                                        <a href="{{route('category.edit',$value->id)}}" style="margin-left: -10px"
                                           class="btn btn-icon btn-primary rounded-circle"><i
                                                class="bx bx-edit-alt"></i></a>
                                        &emsp;
                                        <meta name="csrf-token" content="{{ csrf_token() }}">
                                        <a class="btn btn-icon btn-danger rounded-circle" href="#" id='deleteWeb'
                                           data-value='{{$value->id}}' data-url="{{route('category.destroy',$value->id)}}" style="margin-left:-10px;color:white">
                                            <i class="bx bx-x"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <span class="text-center">{{ $data->links() }}</span>
                </div>
            </div>
        </div>
    </div>


@endsection

@push('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $(document).ready(function () {
            $(document).on('click', '#deleteWeb', function (e) {
                e.preventDefault();
                var id = $(this).attr('data-value');
                var url =$(this).data('url');
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
