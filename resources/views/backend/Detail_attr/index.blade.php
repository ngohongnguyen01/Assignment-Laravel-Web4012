<!-- @extends('backend.layout_admin.index')
@section('content-title')
<h3 class="text-center"> Danh sách các size</h3>

@endsection
@section('title')
<title>Danh sách size</title>
@endsection
@section('content-main')
<div class="container"  style="margin-left:100px">
    @if(isset($msg))
    <h2>{{$msg}}</h2>
    @endif

    <div id="id" hidden>{{$id}}</div>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Describde</th>
                <th>Describde</th>
                <th>Slug</th>
                <th>Cha</th>

                <th> <a href="{{route('detail_attr.add',$id)}}" class="btn btn-primary pull-left">Thêm</a>
                    <a href="{{route('attribute.index')}}" class="btn btn-primary pull-left">Quay Lại</a>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $value)
            <tr id='colum-{{$value->id}}'>
                <td>{{$value->id}}</td>
                <td>{{$value->name}}</td>
                <td>
                    <div class="wvs-preview wvs-color-preview" style="background-color:{{$value->value}};width: 30px;height: 30px;padding-left:36px;">{{$value->value}}</div>
                </td>
                <td>{{$value->detail}}</td>
                <td>{{$value->slug}}</td>
                <td>{{$value->attribute->name}}</td>
                <td>
                    <a href="{{route('detail_attr.edit',['id'=>$value->id,'idpro'=>$id])}}" class="btn btn-primary pull-left">Sửa</a>
                    <a href="#" id='deleteWeb' data-value='{{$value->id}}' class="btn btn-primary pull-left">Xóa</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@push('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $(document).ready(function() {
        $(document).on('click', '#deleteWeb', function(e) {
            e.preventDefault();
            var id = $(this).attr('data-value');
            var idpro = $('#id').html();
            console.log(idpro);
            if (confirm('Bạn có chắc muốn xóa thông tin này không ??')) {
                $.ajax({
                    type: "delete",
                    url: '/admin_assets/backend/detail_attr/delete/' + id +'/' + idpro,
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType: 'json',
                    success: function(response) {
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
@endsection -->
