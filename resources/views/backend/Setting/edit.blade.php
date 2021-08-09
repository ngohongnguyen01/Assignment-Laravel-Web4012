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
                    <h5 class="content-header-title float-left pr-1 mb-0">Settings Tables</h5>
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb p-0 mb-0">
                            <li class="breadcrumb-item"><a href="{{route('backend.admin')}}"><i
                                        class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active">
                                Settings
                            </li>
                            <li class="breadcrumb-item active">
                                Edit Settings
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
                <h4 class="card-title">Edit Settings</h4>
            </div>
            <div class="card-content" style="padding: 20px;">
                <div class="container">
                    <form action="{{route('websetting.update',$data->id)}}" method="POST" enctype="multipart/form-data"
                          class="needs-validation" novalidate>
                        <div class="row">
                            @csrf
                            @method('PUT')
                            <input type="text" name="id" value="{{$data->id}}" hidden>
                            <div class="form-group">
                                <label>Key</label>
                                <div class="controls">
                                    <input type="text" name="key" class="form-control"
                                           data-validation-required-message="Key không được để trống !"
                                           placeholder="Key"
                                           minlength="3"
                                           data-validation-minlength-message="Value không dưới 3 ký tự !"
                                           value="{{$data->key}}">
                                </div>
                                @error('key')
                                <span class="message">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Value</label>
                                <div class="controls">
                                    <input type="text" name="value" class="form-control"
                                           data-validation-required-message="Value không được để trống !"
                                           minlength="3"
                                           data-validation-minlength-message="Value không dưới 3 ký tự !"

                                           placeholder="Value"
                                           value="{{$data->value}}">
                                </div>
                                @error('value')
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
                                                               name="status" value="1"
                                                               @if($data->status== config('common.settings.Active')) checked @endif
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
                                                               @if($data->status== config('common.settings.Inactive')) checked
                                                               @endif
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
                        <div class="row pull-right" style="margin-top: 50px">
                            <div class="form-group">
                                <button class="btn btn-primary">Gửi</button>
                                <a href="{{route('websetting.index')}}" class="btn btn-primary">Quay Lại</a>
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
