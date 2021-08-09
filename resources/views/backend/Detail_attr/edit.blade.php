<!-- @extends('backend.layout_admin.index')
@section('content-title')
<h3 class="text-center">Cập nhập thuộc thuộc tính</h3>
@endsection
@section('title')
<title>Cập nhập thuộc tính</title>
@endsection
@section('content-main')
<div class="container" style="margin-left:100px">
    <form action="{{route('detail_attr.update',['id'=>$data->id,'idpro'=>$id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">Tên thuộc tính</label>
            <input type="text" name="name" value="{{$data->name}}" class="form-control">
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        @if( preg_match( '/^#/', $data->value ) )
        <div class="form-group">
            <label for="">Giá Trị</label>
            <input type="color" name="value" value="{{$data->value}}" id='value' class="form-control"><br>
            Lựa chọn : <a href="#" id='lua_chon' class="btn btn-primary">Chọn màu</a>
            @error('value')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        @else
        <div class="form-group">
            <label for="">Giá Trị</label>
            <input type="text" name="value" value="{{$data->value}}" id='value' class="form-control"><br>
            Lựa chọn : <a href="#" id='lua_chon' class="btn btn-primary">Chọn màu</a>
            @error('value')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        @endif

        <div class="form-group">
            <label for="">Mô tả thuộc tính</label>
            <input type="text" name="detail" value="{{$data->detail}}" class="form-control">
            @error('detail')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button class="btn btn-primary">Gửi</button>
        <a href="{{route('detail_attr.index',$id)}}" class="btn btn-primary">Quay Lại</a>
    </form>
</div>
@push('scripts')
<script>
    $(document).ready(function() {
        $("#lua_chon").click(function() {
            if ($('#value').attr('type') == 'text') {
                $('#value').attr('type', 'color');
                $("#value").removeClass();
                $('#lua_chon').text('Text');
            } else {
                $('#value').attr('type', 'text');
                $("#value").attr('class', 'form-control');
                $('#value').val('{{$data->value}}');
                $('#lua_chon').text('Color');


            }
        });
    });
</script>
@endpush
@endsection -->