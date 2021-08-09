@extends('backend.layout_admin.index')
@section('content-title')
<h3 class="text-center">Thêm thuộc tính</h3>
@endsection
@section('title')
<title>Thêm thuộc tính</title>
<style>
    .hop {
        width: 18%;
        height: 34px;
        padding: 6px 12px;
        font-size: 14px;
        line-height: 1.42857143;
        color: #555;
        background-color: #fff;
        background-image: none;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
</style>
@endsection
@section('content-main')
<div class="container" style="margin-left:100px">
    <form action="{{route('product_attr.store',$id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">Tên sản phẩm</label>
            <input type="text" disabled value="{{$dataProduct->name}}" class="form-control">
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <div class="field_wrapper" style="width:110%;margin:20px 0px">
                <div>
                    <input type="text" name='namecolor' class="hop" placeholder="Tên màu">
                    <input type="color" name="color">
                    <select name="size[]" class="hop">
                        <option value=""> --Xin mời chọn size --</option>
                        @foreach($attribute as $value)
                        <option value="{{$value->id}}">{{$value->name}}</option>
                        @endforeach
                    </select>
                    <input type="text" placeholder="giá" name="price[]" class="hop" value="" />
                    <a class='them'><i class="fas fa-plus-circle"></i></a>
                    <label for="">Ảnh</label>
                    <a id="lfm" data-input="thumbnail" data-preview="holder">
                        <img width="50px" src="{{asset('/storage/image-out/images.png')}}" alt="">
                    </a>
                    <input id="thumbnail" hidden type="text" name="image">
                    @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <input type="number" name='so_luong' placeholder="Số Lượng" class="hop">
                    <img src="" id='image' style="width:50px;" alt="Hình ảnh">
                    <!-- <a href="javascript:void(0);" class="add_button btn btn-primary" title="Add field">Thêm</a> -->
                </div>
            </div>
        </div>
        <div class="form-group">
            <button class="btn btn-primary">Gửi</button>
            <a href="{{route('product_attr.index',$id)}}" class="btn btn-primary pull-left">Quay Lại</a>
        </div>
    </form>
</div>
@push('scripts')

<script type="text/javascript">
    $(document).ready(function() {
        var maxField = 10; //Input fields increment limitation
        var addButton = $('.add_button'); //Add button selector
        var wrapper = $('.field_wrapper'); //Input field wrapper
        // var fieldHTML = '<div><input type="text" name="color" class="hop" placeholder="Tên màu"><input type="color" name="color"><select name="size[]" class="hop"><option value=""> --Xin mời chọn size --</option>  @foreach($attribute as $value)<option value="{{$value->id}}">{{$value->name}}</option>@endforeach</select><input type="text" placeholder="giá" name="price[]" class="hop" value="" /><a class="them"><i class="fas fa-plus-circle"></i></a><label for="">Ảnh</label><a id="lfm" data-input="thumbnail" data-preview="holder"><img width="50px" src="{{asset("/storage/image-out/images.png")}}" alt=""></a><input class="thumbnail" hidden type="text" name="image">@error("image")<div class="alert alert-danger">{{ $message }}</div>@enderror<img src="" id="image" hidden style="width:200px;height:200px" alt="Hình ảnh">    <a href="javascript:void(0);" class="remove_button  btn btn-danger">Xóa</a></div>'; //New input field html 
        var x = 1; //Initial field counter is 1
        var fieldHTMLS = '<div><select name="size[]" class="hop"><option value=""> --Xin mời chọn size --</option>@foreach($attribute as $value)<option value="{{$value->id}}">{{$value->name}}</option>@endforeach</select> <input type="text" placeholder="giá" name="price[]" class="hop" value="" />                     <input type="number" name="so_luong" placeholder="Số Lượng" class="hop"><a href="javascript:void(0);" class="remove_button  btn btn-danger">Xóa</a></div>'; //New input field html 

        //Once add button is clicked
        $(addButton).click(function() {
            //Check maximum number of input fields
            if (x < maxField) {
                x++; //Increment field counter
                $(wrapper).append(fieldHTML); //Add field html
            }
        });
        //Once remove button is clicked
        $(wrapper).on('click', '.remove_button', function(e) {
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            x--; //Decrement field counter
        });
        $('.them').on('click', function(e) {
            e.preventDefault();
            $(this).parent('div').append(fieldHTMLS); //Remove field html
            //Decrement field counter
        });
    });
</script>
<script src="/path-to-your-tinymce/tinymce.min.js"></script>
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script>
    $(document).ready(function() {
        $("#image").hide();
        $('#thumbnail').on('change', function() {
            if ($('#thumbnail').val().length > 0) {
                var image = "{{ env('APP_URL') }}" + $("#thumbnail").val();
                $('#image').attr('src', image);
                $("#image").show();
            } else {
                $("#image").hide();
            }
        });
    });
</script>
<script>
    $('#lfm').filemanager('file');
</script>
@endpush
@endsection