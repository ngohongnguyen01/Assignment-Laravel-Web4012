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
                    <h5 class="content-header-title float-left pr-1 mb-0">Roles Tables</h5>
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb p-0 mb-0">
                            <li class="breadcrumb-item"><a href="{{route('backend.admin')}}"><i
                                        class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active">
                                Roles
                            </li>
                            <li class="breadcrumb-item active">
                                Add Roles
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
                <h4 class="card-title">Add Colors</h4>
            </div>
            <div class="card-content" style="padding: 20px;">
                <div class="container">
                    <form action="{{route('roles.store')}}" method="POST" enctype="multipart/form-data"
                          class="needs-validation" novalidate>
                        <div class="row">
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <div class="controls">
                                    <input type="text" name="name" class="form-control"
                                           data-validation-required-message="Name không được để trống !"
                                           placeholder="Name"
                                           maxlength="255"
                                           data-validation-maxlength-message="Name không quá 255 ký tự !"
                                           value="{{old('name')}}">
                                </div>
                                @error('name')
                                <span class="message">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Display Name</label>
                                <div class="controls">
                                    <input type="text" name="display_name" class="form-control"
                                           data-validation-required-message="Display Name không được để trống !"
                                           placeholder="Display Name"
                                           maxlength="255"
                                           data-validation-maxlength-message="Display Name không quá 255 ký tự !"
                                           value="{{old('display_name')}}">
                                </div>
                                @error('display_name')
                                <span class="message">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <input type="checkbox" class="checkbox-input" id="checkbox1">
                                    <label for="checkbox1">All</label>
                                </div>
                            </div>
                            <label for="">Mô tả vai trò</label>
                            @foreach($permission as $permission)
                                <div class="form-group">
                                    <div class="card">
                                        <div class="card-header btn-primary">
                                            <h4 class="card-title">
                                                <input type="checkbox" class="check_wrapper checkbox-input">
                                                <label for="">{{$permission->name}}</label>
                                            </h4>
                                            <a class="heading-elements-toggle">
                                                <i class="bx bx-dots-vertical font-medium-3"></i>
                                            </a>
                                            <div class="heading-elements">
                                                <ul class="list-inline mb-0">
                                                    <li>
                                                        <a data-action="collapse">
                                                            <i class="bx bx-chevron-down"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="card-content collapse show">
                                            <div class="card-body" style="padding: 20px;">
                                                @foreach($permission->permissionChildrent as $permissionChildrent)
                                                    <div class="form-group" style="width: 25%;float:left">
                                                        <input type="checkbox" class="check_children"
                                                               value="{{$permissionChildrent->id}}"
                                                               name="permission_id[]">
                                                        <label for="">{{$permissionChildrent->name}}</label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="row pull-right" style="margin-top: 50px">
                            <div class="form-group ml-5" style="padding-left: calc(var(--bs-gutter-x) * 36.11);">
                                <button class="btn btn-primary">Gửi</button>
                                <a href="{{route('roles.index')}}" class="btn btn-primary">Quay Lại</a>
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
        $('.check_wrapper').on('click', function () {
            $(this).parent().parent().parent().find('.check_children').prop('checked', $(this).prop('checked'));
        })
        $('#checkbox1').on('click', function () {
            $('input:checkbox').prop('checked', $(this).prop('checked'));
        })
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
