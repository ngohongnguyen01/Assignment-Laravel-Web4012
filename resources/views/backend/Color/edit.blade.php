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
                    <h5 class="content-header-title float-left pr-1 mb-0">Colors Tables</h5>
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb p-0 mb-0">
                            <li class="breadcrumb-item"><a href="{{route('backend.admin')}}"><i
                                        class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active">
                                Colors
                            </li>
                            <li class="breadcrumb-item active">
                                Edit Colors
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
                <h4 class="card-title">Adit Colors</h4>
            </div>
            <div class="card-content" style="padding: 20px;">
                <div class="container">
                    <form action="{{route('colors.update',$data->id)}}" method="POST" enctype="multipart/form-data"
                          class="needs-validation" novalidate>
                        <div class="row">
                            @csrf
                            @method('PUT')
                            <input type="text" value="{{$data->id}}" hidden name="id">
                            <div class="form-group">
                                <label>T??n m??u</label>
                                <div class="controls">
                                    <input type="text" name="name" class="form-control"
                                           data-validation-required-message="T??n m??u kh??ng ???????c ????? tr???ng !"
                                           placeholder="T??n m??u"
                                           minlength="3"
                                           data-validation-minlength-message="T??n m??u kh??ng d?????i 3 k?? t??? !"
                                           value="{{$data->name}}">
                                </div>
                                @error('name')
                                <span class="message">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Value</label>
                                <div class="controls">
                                    <input type="color" name="value" class="form-control"
                                           data-validation-required-message="Value kh??ng ???????c ????? tr???ng !"
                                           value="{{$data->value}}">
                                </div>
                                    @error('value')
                                               <span class="message">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label>M?? t???</label>
                                <div class="controls">
                                    <input type="text" name="detail" class="form-control"
                                           data-validation-required-message="M?? t??? kh??ng ???????c ????? tr???ng !"
                                           minlength="3"
                                           placeholder="M?? t???"
                                           data-validation-minlength-message="M?? t??? kh??ng d?????i 3 k?? t??? !"
                                           value="{{$data->detail}}">
                                </div>
                                @error('detail')
                                <span class="message">{{$message}}</span>
                                @enderror
                            </div>

                        <div class="form-group">
                            <label for="">Tr???ng th??i</label>
                            <div class="form-control">
                                <div class="controls">
                                    <ul class="list-unstyled mb-0">
                                        <li class="d-inline-block mr-2 mb-1">
                                            <fieldset>
                                                <div class="radio radio-primary radio-glow">
                                                    <input type="radio" id="radioGlow1"
                                                           data-validation-required-message="Tr???ng th??i kh??ng ???????c ????? tr???ng !"
                                                          name="status" value="1"
                                                           @if($data->status == config('common.colors.Active')) checked @endif
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
                                                           data-validation-required-message="Tr???ng th??i kh??ng ???????c ????? tr???ng !"
                                                           value="0"
                                                           @if($data->status == config('common.colors.Inactive')) checked @endif
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
                            <div class="form-group ml-5" style="padding-left: calc(var(--bs-gutter-x) * 36.11);">
                                <button class="btn btn-primary">G???i</button>
                                <a href="{{route('colors.index')}}" class="btn btn-primary">Quay L???i</a>
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
