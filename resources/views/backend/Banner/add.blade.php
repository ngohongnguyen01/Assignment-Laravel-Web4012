@extends('backend.layout-admin.index')
@push('link-script')
    <link rel="stylesheet" type="text/css"
          href="{{asset('/app-assets/css/plugins/forms/validation/form-validation.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/pickers/pickadate/pickadate.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('/app-assets/vendors/css/pickers/daterange/daterangepicker.css')}}">
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
                    <h5 class="content-header-title float-left pr-1 mb-0">Banners Tables</h5>
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb p-0 mb-0">
                            <li class="breadcrumb-item"><a href="{{route('backend.admin')}}"><i
                                        class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active">
                                Banners
                            </li>
                            <li class="breadcrumb-item active">
                                Add Banners
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
                <h4 class="card-title">Add Category</h4>
            </div>
            <div class="card-content" style="padding: 20px;">
                <div class="container">
                    <form action="{{route('banner.store')}}" method="POST" enctype="multipart/form-data"
                          class="needs-validation" novalidate>
                        <div class="row">
                            @csrf
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">???nh</label>
                                    <div class="input-group">
                                         <span class="input-group-btn">
                                                 <a id="lfm" data-input="thumbnail" data-preview="holder">
                                                             <img
                                                                 src="{{asset('image-use/image-upload-iconsharingphoto-vector-illustration-260nw-1835553472.jpg')}}"
                                                                 alt="Th??m ???nh">
                                                  </a>
                                             <div class="controls">
                                                <input type="text" name="image"
                                                       data-validation-required-message="Xin m???i b???n ch???n ???nh !"
                                                       value="{{old('image')}}"
                                                       id="thumbnail"
                                                       class="form-control">
                                        </div>
                                         </span>
                                        <img style="margin-left: 50px;" src="" id='image' width="60%" alt="H??nh ???nh">
                                    </div>
                                    @error('image')
                                    <span class="message">{{$message}}</span>
                                    @enderror
                                    <br>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <div class="form-group">
                                    <label>TITLE </label>
                                    <div class="controls">
                                        <input type="text" name="title" class="form-control"
                                               data-validation-required-message="Ti??u ?????  kh??ng ???????c ????? tr???ng !"
                                               minlength="3"
                                               data-validation-minlength-message=" Ti??u ?????  tr??n 3 k?? t??? !"
                                               placeholder="Ti??u ????? ???nh">
                                    </div>
                                    @error('title')
                                    <span class="message">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>TITLE Image</label>
                                    <div class="controls">
                                        <input type="text" name="title_image" class="form-control"
                                               data-validation-required-message="Ti??u ????? ???nh kh??ng ???????c ????? tr???ng !"
                                               minlength="3"
                                               data-validation-minlength-message=" Ti??u ????? ???nh tr??n 3 k?? t??? !"
                                               placeholder="Ti??u ????? ???nh">
                                    </div>
                                    @error('title_image')
                                    <span class="message">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">M?? t??? Image</label>
                                    <div class="controls">
                                        <input type="text" name="image_detail"
                                               data-validation-required-message="M?? t??? ???nh kh??ng ???????c ????? tr???ng !"
                                               minlength="3"
                                               data-validation-minlength-message=" M?? t??? ???nh tr??n 3 k?? t??? !"
                                               maxlength="255"
                                               data-validation-maxlength-message=" M?? t??? ???nh d?????i 255 k?? t??? !"
                                               value="{{old('image_detail')}}"
                                               placeholder="M?? t??? ???nh"
                                               class="form-control">
                                    </div>
                                    @error('image_detail')
                                    <span class="message">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>ALT IMAGE</label>
                                    <div class="controls">
                                        <input type="text" name="image_alt" class="form-control"
                                               data-validation-required-message="Ti??u ????? ???nh kh??ng ???????c ????? tr???ng !"
                                               minlength="3"
                                               data-validation-minlength-message=" Ti??u ????? ???nh tr??n 3 k?? t??? !"
                                               placeholder="Ti??u ????? ???nh">
                                    </div>
                                    @error('image_alt')
                                    <span class="message">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
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
                                                                   name="status" value="1">
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
                        </div>
                        <div class="row pull-right" style="margin-top: 50px">
                            <div class="form-group ml-5" style="padding-left: calc(var(--bs-gutter-x) * 36.11);">
                                <button class="btn btn-primary">G???i</button>
                                <a href="{{route('banner.index')}}" class="btn btn-primary">Quay L???i</a>
                            </div>
                        </div>

                    </form>
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
            <script src="{{asset('/app-assets/js/scripts/pickers/dateTime/pick-a-datetime.js')}}"></script>
            <!-- BEGIN: Page Vendor JS-->
            <script src="{{asset('/app-assets/vendors/js/pickers/pickadate/picker.js')}}"></script>
            <script src="{{asset('/app-assets/vendors/js/pickers/pickadate/picker.date.js')}}"></script>
            <script src="{{asset('/app-assets/vendors/js/pickers/pickadate/picker.time.js')}}"></script>
            <script src="{{asset('/app-assets/vendors/js/pickers/pickadate/legacy.js')}}"></script>
            <script src="{{asset('/app-assets/vendors/js/pickers/daterange/moment.min.js')}}"></script>
            <script src="{{asset('/app-assets/vendors/js/pickers/daterange/daterangepicker.js')}}"></script>
            <!-- END: Page Vendor JS-->
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
