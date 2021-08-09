@extends('backend.layout-admin.index')
@section('content-body')
    <div class="content-header row">
        <div class="content-header-left col-12 mb-2 mt-1">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h5 class="content-header-title float-left pr-1 mb-0">Posts Tables</h5>
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb p-0 mb-0">
                            <li class="breadcrumb-item"><a href="{{route('backend.admin')}}"><i
                                        class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active">
                                Posts
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
                    <h4 class="card-title">List Post</h4>
                </div>
                <div class="card-content">
                    <!-- table bordered -->
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Number Phone</th>
                                <th>Đánh giá</th>
                                <th>Nội dung</th>
                                <th>Trạng thái</th>
                                <th width="15%">ACTION</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($showCommentProduct as $key => $value)
                                <tr id='colum-{{$value->id}}'>
                                    <td class="text-bold-500">{{$key+1}}</td>
                                    <td>{{$value->name}}</td>
                                    <td>{{$value->numberPhone}}</td>
                                    <td>{{$value->rating}}</td>
                                    <td>{{$value->content}}</td>
                                    <td>
                                        <meta name="csrf-token" content="{{ csrf_token() }}">
                                        @if ($value->status == config('common.Comments.status.Active'))
                                            <button
                                                class="btn btn-sm btn-primary delete-article-btn mybtn-{{$value->id}}"
                                                rel="{{$value->id}}"
                                                rel2="{{config('common.Comments.status.Active')}}"
                                                data-url="{{route('comments.update',$value->id)}}"
                                            >Active
                                            </button>
                                        @else
                                            <button
                                                class="btn btn-sm btn-danger delete-article-btn mybtn-{{$value->id}}"
                                                rel="{{$value->id}}"
                                                rel2="{{config('common.Comments.status.Inactive')}}"
                                                data-url="{{route('comments.update',$value->id)}}"
                                            >Inactive
                                            </button>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-icon btn-danger rounded-circle" href="#" id='deleteWeb'
                                           data-value='{{$value->id}}'
                                           data-url="{{route('comments.destroy',$value->id)}}"
                                           style="margin-left:-13px;color:white">
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
        </div>
    </div>


@endsection

@push('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $(document).on('click', '.delete-article-btn', function () {
            var id = $(this).attr('rel');
            var status = $(this).attr('rel2');
            var url = $(this).data('url');
            console.log(status);
            $.ajax({
                url: url,
                type: 'post',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {'status': status},
                success: function (response) {
                    console.log(response);
                    if (response == 1) {

                        $('.mybtn-' + id).html('Active');
                        $('.mybtn-' + id).attr('rel2', 1);
                        $('.mybtn-' + id).attr('class', 'btn btn-sm btn-primary delete-article-btn mybtn-'+id+'');

                    } else {
                        $('.mybtn-' + id).html('Inactive');
                        $('.mybtn-' + id).attr('rel2', 0);
                        $('.mybtn-' + id).attr('class', 'btn btn-sm btn-danger delete-article-btn mybtn-'+id+'');

                    }
                }, error: function (error) {
                }
            });
        })

    </script>
    <script>
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
    </script>
@endpush
