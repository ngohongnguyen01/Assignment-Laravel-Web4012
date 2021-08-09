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
                    <h5 class="content-header-title float-left pr-1 mb-0">Users Tables</h5>
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb p-0 mb-0">
                            <li class="breadcrumb-item"><a href="{{route('backend.admin')}}"><i
                                        class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active">
                                Users
                            </li>
                            <li class="breadcrumb-item active">
                                Add Users
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
                <h4 class="card-title">Add Users</h4>
            </div>
            <div class="card-content" style="padding: 20px;">
                <div class="container">
                    <form action="{{route('user.store')}}" method="POST" enctype="multipart/form-data"
                          class="needs-validation" novalidate>
                        <div class="row">
                            @csrf
                            <div class="col-9">
                                <div class="form-group">
                                    <label>Họ tên</label>
                                    <div class="controls">
                                        <input type="text" name="full_name" class="form-control"
                                               data-validation-required-message="Họ tên không được để trống !"
                                               placeholder="Họ tên"
                                               data-validation-containsnumber-regex="^[a-zA-Z-'(àáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹđÀÁẠẢÃÂẦẤẬẨẪĂẰẮẶẲẴÈÉẸẺẼÊỀẾỆỂỄÌÍỊỈĨÒÓỌỎÕÔỒỐỘỔỖƠỜỚỢỞỠÙÚỤỦŨƯỪỨỰỬỮỲÝỴỶỸĐD) ]*$"
                                               data-validation-containsnumber-message="Tên chỉ chứa các ký tự chữ cái !"
                                               maxlength="255"
                                               data-validation-maxlength-message="Tên không quá 255 ký tự !"
                                               value="{{old('full_name')}}">
                                    </div>
                                    @error('full_name')
                                    <span class="message">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <div class="controls">
                                        <input type="email" name="email" class="form-control"
                                               data-validation-required-message="Email không được để trống !"
                                               placeholder="Email"
                                               maxlength="255"
                                               data-validation-required-message="Xin mời nhập đúng định dạng email !"
                                               data-validation-maxlength-message="Email không quá 255 ký tự !"
                                               value="{{old('email')}}">
                                    </div>
                                    @error('email')
                                    <span class="message">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>User Name</label>
                                    <div class="controls">
                                        <input type="text" name="username" class="form-control"
                                               data-validation-required-message="Tên size không được để trống !"
                                               placeholder="User Name"
                                               data-validation-regex-regex="^[a-zA-Z_0-9]+$"
                                               data-validation-regex-message="User Name chỉ được nhập các ký tự chữ cái và dấu gạch dưới !"
                                               maxlength="255"
                                               data-validation-maxlength-message="User Name không quá 255 ký tự !"
                                               value="{{old('username')}}">
                                    </div>
                                    @error('username')
                                    <span class="message">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <div class="controls">
                                        <input type="password" name="password" class="form-control"
                                               data-validation-required-message="Mật khẩu  không được để trống !"
                                               placeholder="Password"
                                               maxlength="255"
                                               minlength="6"
                                               data-validation-minlength-message="Mật khẩu dưới 6 ký tự !"
                                               data-validation-maxlength-message="Mật khẩu không quá 255 ký tự !"
                                               value="{{old('password')}}">
                                    </div>
                                    @error('password')
                                    <span class="message">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Password Input Field</label>
                                    <div class="controls">
                                        <input type="password" name="password2"
                                               data-validation-match-match="password"
                                               class="form-control"
                                               data-validation-required-message="Mật khẩu  không được để trống !"
                                               data-validation-match-message="Mật khẩu lặp lại phải khớp !"
                                               placeholder="Nhập lại mật khẩu">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Phone</label>
                                    <div class="controls">
                                        <input type="text" name="phone" class="form-control"
                                               data-validation-required-message="Phone không được để trống !"
                                               placeholder="Phone"
                                               data-validation-containsnumber-regex="((^0)(32|33|34|35|36|37|38|39|56|58|59|70|76|77|78|79|81|82|83|84|85|86|88|89|90|92|91|93|94|96|97|98|99)+([0-9]{7}))$"
                                               data-validation-containsnumber-message="Số điện thoại không hợp lệ !"
                                               value="{{old('phone')}}">
                                    </div>
                                    @error('phone')
                                    <span class="message">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <div class="controls">
                                        <input type="text" name="address" class="form-control"
                                               data-validation-required-message="Địa chỉ không được để trống !"
                                               placeholder="Address"
                                               value="{{old('address')}}">
                                    </div>
                                    @error('address')
                                    <span class="message">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="">Vai trò</label>
                                    <div class="controls">
                                        <select class="select2 form-control" name="role[]" multiple="multiple"
                                                data-validation-required-message="Xin mời bạn chọn vai trò !">
                                            @foreach($role as $role)
                                                <option value="{{$role->id}}">{{$role->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('role')
                                    <span class="message">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Kích hoạt</label>
                                    <div class="controls">
                                    <div class="form-control">

                                            <input type="radio" name="email_verified_at"
                                                   value=""> Close &emsp;
                                            <input type="radio" name="email_verified_at"
                                                   value="1"> Active
                                        </div>
                                    </div>
                                    @error('email_verified_at')
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
                                                                   data-validation-required-message="Trạng thái không được để trống !"
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
                                <div class="form-group">
                                    <label for="">Giới tính</label>
                                    <div class="form-control">
                                        <div class="controls">
                                            <ul class="list-unstyled mb-0">
                                                <li class="d-inline-block mr-2 mb-1">
                                                    <fieldset>
                                                        <div class="radio radio-primary">
                                                            <input type="radio" name="gender"
                                                                   data-validation-required-message="Giới tính không được để trống !"
                                                                   id="colorRadio1"
                                                                   value="{{config('common.users.gender.Male')}}">
                                                            <label for="colorRadio1">Nam</label>
                                                        </div>
                                                    </fieldset>
                                                </li>
                                                <li class="d-inline-block mr-2 mb-1">
                                                    <fieldset>
                                                        <div class="radio radio-danger">
                                                            <input type="radio" name="gender"
                                                                   data-validation-required-message="Giới tính không được để trống !"
                                                                   id="colorRadio2"
                                                                   value="{{config('common.users.gender.Female')}}">
                                                            <label for="colorRadio2">Nữ</label>
                                                        </div>
                                                    </fieldset>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    @error('gender')
                                    <span class="message">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Ảnh</label>
                                    <div class="input-group">
                                         <span class="input-group-btn">
                                                 <a id="lfm" data-input="thumbnail" data-preview="holder">
                                                             <img
                                                                 src="{{asset('image-use/image-upload-iconsharingphoto-vector-illustration-260nw-1835553472.jpg')}}"
                                                                 alt="Thêm ảnh">
                                                  </a>
                                             <div class="controls">
                                                <input type="text" name="image"
                                                       data-validation-required-message="Xin mời bạn chọn ảnh !"
                                                       value="{{old('image')}}"
                                                       id="thumbnail"
                                                       class="form-control"
                                                       hidden>
                                             </div>
                                         </span>
                                    </div>
                                    @error('image')
                                    <span class="message">{{$message}}</span>
                                    @enderror
                                    <br>
                                </div>
                                <img src="" id='image' width="70%" alt="Hình ảnh"
                                     class="users-avatar-shadow rounded-circle">
                            </div>
                            <div class="row pull-right" style="margin-top: 50px">
                                <div class="form-group ml-5" style="padding-left: calc(var(--bs-gutter-x) * 36.11);">
                                    <button class="btn btn-primary">Gửi</button>
                                    <a href="{{route('user.index')}}" class="btn btn-primary">Quay Lại</a>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- BEGIN: Page JS-->

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
