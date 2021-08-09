@extends('backend.layout-admin.index')
@push('link-script')
    <link rel="stylesheet" type="text/css"
          href="{{asset('/app-assets/css/plugins/forms/validation/form-validation.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/forms/select/select2.min.css')}}">

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
                    <h5 class="content-header-title float-left pr-1 mb-0">Permission Tables</h5>
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb p-0 mb-0">
                            <li class="breadcrumb-item"><a href="{{route('backend.admin')}}"><i
                                        class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active">
                                Permission
                            </li>
                            <li class="breadcrumb-item active">
                                Edit Permission
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Permission</h4>
            </div>
            <div class="card-content" style="padding: 20px;">
                <div class="container">
                    <form action="{{route('permission.update',$dataPermission->id)}}" method="POST" enctype="multipart/form-data"
                          class="needs-validation" novalidate>
                        <div class="row">
                            @csrf
                            @method('PUT')
                            <input type="text" name="id" value="{{$dataPermission->id}}" hidden>
                            <div class="form-group">
                                <label>Name</label>
                                <div class="controls">
                                    <input type="text" name="name" class="form-control"
                                           data-validation-required-message="Namekhông được để trống !"
                                           placeholder="Tên "
                                           maxlength="255"
                                           data-validation-maxlength-message="Name không quá 255 ký tự !"
                                           value="{{$dataPermission->name}}">
                                </div>
                                @error('name')
                                <span class="message">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Display Name</label>
                                <div class="controls">
                                    <input type="text" name="display_name" class="form-control"
                                           data-validation-required-message="Mô tả không được để trống !"
                                           minlength="3"
                                           placeholder="Mô tả"
                                           minlength="3"
                                           data-validation-minlength-message="Mô tả không dưới 3 ký tự !"
                                           maxlength="255"
                                           data-validation-maxlength-message="Mô tả không quá 255 ký tự !"
                                           value="{{$dataPermission->display_name}}">
                                </div>
                                @error('display_name')
                                <span class="message">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Key Code</label>
                                <div class="controls">
                                    <input type="text" name="key_code" class="form-control"
                                           placeholder="Key Code"
                                           value="{{$dataPermission->key_code}}">
                                </div>

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="controls">
                                <select class="select2 form-control" name="prarent_id"
                                        data-validation-required-message="Danh mục không được để trống !">
                                    <option value='0'>---Nhập danh mục---</option>
                                    @foreach($data as $value)
                                        <option value="{{$value->id}}" @if($dataPermission->prarent_id == $value->id) selected @endif>{{$value->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row pull-right" style="margin-top: 50px">
                            <div class="form-group ml-5" style="padding-left: calc(var(--bs-gutter-x) * 36.11);">
                                <button class="btn btn-primary">Gửi</button>
                                <a href="{{route('permission.index')}}" class="btn btn-primary">Quay Lại</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
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
    <script src="{{asset('/app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
    <script src="{{asset('/app-assets/js/scripts/forms/select/form-select2.js')}}"></script>

    <script>
        $(document).ready(function () {
            $("#image").hide();
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
