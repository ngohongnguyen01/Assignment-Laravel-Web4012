@extends('backend.layout_admin.index')
@section('content-title')
<h3 class="text-center"> Danh sách các biến thể</h3>

@endsection
@section('title')
<title>Danh sách các biến thể</title>
@endsection
@section('content-main')
<div class="container" style="margin-left:100px">
    @if(isset($msg))
    <h2>{{$msg}}</h2>
    @endif

    <div id="id" hidden>{{$id}}</div>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Size</th>
                <th>Color</th>
                <th>Price</th>
                <th>Số Lượng</th>
                <th> 
                    <a href="{{route('product_attr.add',$id)}}" class="btn btn-primary pull-left">Thêm</a>
                    <a href="{{route('product.index')}}" class="btn btn-primary pull-left">Quay Lại</a>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $value)
            <tr id='colum-{{$value->id}}'>
                <td>{{$value->id}}</td>
                <td>{{$value->product->name}}</td>
                <td>{{$value->size->name}}</td>
                <td>{{$value->color->name}}</td>
                <td>{{$value->price}}</td>
                <td>{{$value->so_luong}}</td>

                <td>
                    <a href="{{route('product_attr.edit',['id'=>$value->id])}}" class="btn btn-primary pull-left">Sửa</a>
                    <a href="#" id='deleteWeb' data-value='{{$value->id}}' class="btn btn-primary pull-left">Xóa</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <span>{{$data->links()}}</span>
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
                    url: '/admin/backend/product_attr/delete/' + id ,
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
@endsection