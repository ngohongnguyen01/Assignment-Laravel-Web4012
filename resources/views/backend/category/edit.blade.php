@extends('backend.layout-admin.index')
@push('link-script')
    <link rel="stylesheet" type="text/css"
          href="{{asset('/app-assets/css/plugins/forms/validation/form-validation.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .message {
            width: 100%;
            margin-top: .25rem;
            font-size: .875em;
            color: #dc3545;
        }
    </style>
@endpush
@section('content-body')
    <div class="content-header row mt-3">
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
                            <li class="breadcrumb-item active">
                                Edit Category
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Edit Category</h4>
        </div>
        <div class="card-content" style="padding: 20px;">
            <div class="container">
                <form action="{{route('category.update',$data->id)}}" method="POST" enctype="multipart/form-data"
                      class="needs-validation" novalidate>
                    <div class="row">
                        @csrf
                        @method("PUT")
                        <input type="text" value="{{$data->id}}" name="id" hidden>
                        <div class="col-8">
                            <div class="form-group">
                                <label>Categroy Name</label>
                                <div class="controls">
                                    <input type="text" name="name_cate" class="form-control"
                                           data-validation-required-message="Tên danh mục không được để trống !"
                                           minlength="3"
                                           data-validation-minlength-message=" Mô tả ảnh trên 3 ký tự !"
                                           value="{{$data->name_cate}}">
                                </div>
                                @error('name_cate')
                                <span class="message">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Mô tả Image</label>
                                <div class="controls">
                                    <input type="text" name="image_describe"
                                           data-validation-required-message="Mô tả ảnh không được để trống !"
                                           minlength="3"
                                           data-validation-minlength-message=" Mô tả ảnh trên 3 ký tự !"
                                           maxlength="255"
                                           data-validation-maxlength-message=" Mô tả ảnh dưới 255 ký tự !"
                                           value="{{$data->image_describe}}"
                                           class="form-control">
                                </div>
                                @error('image_describe')
                                <span class="message">{{$message}}</span>
                                @enderror

                            </div>
                            <div class="form-group">
                                <label for="">Trạng thái</label>
                                <div class="form-control">
                                    <div class="controls">
                                        <ul class="list-unstyled mb-0">
                                            <li class="d-inline-block mr-2 mb-1">
                                                <fieldset>
                                                    <div class="radio radio-primary radio-glow">
                                                        <input type="radio" id="radioGlow1"
                                                               data-validation-required-message="Trạng thái không được để trống !"
                                                               @if ($data->status==config('common.categories.Active')) checked @endif
                                                               name="status" value="1"
                                                        >
                                                        <label for="radioGlow1">Active</label>
                                                    </div>
                                                </fieldset>
                                            </li>
                                            <li class="d-inline-block mr-2 mb-1">
                                                <fieldset>
                                                    <div class="radio radio-danger radio-glow">
                                                        <input type="radio"
                                                               name="status"
                                                               data-validation-required-message="Trạng thái không được để trống !"
                                                               value="0"
                                                               @if ($data->status== config('common.categories.Close')) checked @endif
                                                               id="radioGlow6">
                                                        <label for="radioGlow6">Inactive</label>
                                                    </div>
                                                </fieldset>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                @error('status')
                                <span class="message">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">

                                <label for="">Ảnh</label>
                                <div class="input-group">
                                         <span class="input-group-btn">
                                                 <a id="lfm" data-input="thumbnail" data-preview="holder"
                                                    class="btn btn-primary">
                                                      <i class="fa fa-picture-o"></i> Choose
                                                  </a>
                                         </span>
                                    <div class="controls">
                                        <input type="text" name="image"
                                               data-validation-required-message="Xin mời bạn chọn ảnh !"
                                               value="{{$data->image}}"
                                               id="thumbnail" class="form-control">
                                    </div>
                                </div>
                                @error('image')
                                <span class="message">{{$message}}</span>
                                @enderror
                                <br>
                                <img src="{{asset('')}}/{{$data->image}}" id='image' style="width:200px;height:200px"
                                     alt="Hình ảnh">
                            </div>
                        </div>
                    </div>
                    <div class="row pull-right" style="margin-top: 50px">
                        <div class="form-group ml-5" style="padding-left: calc(var(--bs-gutter-x) * 36.11);">
                            <button class="btn btn-primary">Gửi</button>
                            <a href="{{route('category.index')}}" class="btn btn-primary">Quay Lại</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        @endsection

        @push('scripts')


            <script src="{{asset('/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js')}}"></script>

            <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
                    crossorigin="anonymous"></script>
            <script src="{{asset('/app-assets/js/scripts/forms/validation/form-validation.js')}}"></script>

            <script>
                $(document).ready(function () {
                    if ($('#thumbnail').val().length > 0) {
                        var image = "{{ env('APP_URL') }}" + $("#thumbnail").val();
                        $('#image').attr('src', image);
                        $("#image").show();
                    }
                    $('#thumbnail').on('change', function () {
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

            <script>
                // Example starter JavaScript for disabling form submissions if there are invalid fields
                (function () {
                    'use strict'

                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                    var forms = document.querySelectorAll('.needs-validation')

                    // Loop over them and prevent submission
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
