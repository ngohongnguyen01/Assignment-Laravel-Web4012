<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description"
          content="Frest admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords"
          content="admin template, Frest admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Dashboard </title>
    {{--    <link rel="apple-touch-icon" href="{{asset('themeAdmin/app-assets/images/ico/apple-icon-120.png')}}">--}}
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('image-use/images.jpg')}}">

    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,600%7CIBM+Plex+Sans:300,400,500,600,700"
          rel="stylesheet">
    <link rel="stylesheet" href="https://devassignment_web4012.com/app-assets/fonts/LivIconsEvo/svg/comments.svg">
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/charts/apexcharts.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/extensions/swiper.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/themes/dark-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/themes/semi-dark-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/pages/Dashboard-ecommerce.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('themeAdmin/assets/css/style.css')}}">
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
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body>
<div class="container-fluid">
    <div class="container">
        <div class="row" style="margin-top: 50px">
            <div class="col-12">
                <h3 style="text-align: center">Đăng Ký</h3>
            </div>
        </div>
        <form action="{{route('Postsingup')}}" method="POST" enctype="multipart/form-data"
              class="needs-validation" novalidate>
            <div class="row">
                @csrf
                <div class="col-7">
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
                                   data-validation-email-message="Xin mời nhập Email đúng định dạng email !"
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
                </div>
                <div class="col-5">
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
                        <div class="controls">
                            <input type="file"
                                   data-validation-required-message="Ảnh không được để trống !"
                                   name="image" value="{{old('image')}}">
                        </div>
                        @error('image')
                        <span class="message">{{$message}}</span>
                        @enderror
                        <br>
                    </div>
                </div>
                <div class="row pull-right" style="margin-top: 50px">
                    <div class="form-group ml-5"
                         style="padding-left: calc(var(--bs-gutter-x) * 36.11);">
                        <button class="btn btn-primary">Gửi</button>
                        <a href="{{route('index')}}" class="btn btn-primary">Quay Lại</a>
                    </div>
                </div>
        </form>
    </div>
</div>

    <!-- BEGIN: Vendor JS-->
    <script src="{{asset('/app-assets/vendors/js/vendors.min.js')}}"></script>
    <script src="{{asset('/app-assets/fonts/LivIconsEvo/js/LivIconsEvo.tools.js')}}"></script>
    <script src="{{asset('/app-assets/fonts/LivIconsEvo/js/LivIconsEvo.defaults.js')}}"></script>
    <script src="{{asset('/app-assets/fonts/LivIconsEvo/js/LivIconsEvo.min.js')}}"></script>
    <!-- BEGIN Vendor JS-->
    <!-- BEGIN: Page Vendor JS-->
    <script src="{{asset('/app-assets/vendors/js/charts/apexcharts.min.js')}}"></script>
    <script src="{{asset('/app-assets/vendors/js/extensions/swiper.min.js')}}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{asset('/app-assets/js/scripts/configs/vertical-menu-dark.js')}}"></script>
    <script src="{{asset('/app-assets/js/core/app-menu.js')}}"></script>
    <script src="{{asset('/app-assets/js/core/app.js')}}"></script>
    <script src="{{asset('/app-assets/js/scripts/components.js')}}"></script>
    <script src="{{asset('/app-assets/js/scripts/footer.js')}}"></script>
<script src="{{asset('/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js')}}"></script>

<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
<script src="{{asset('/app-assets/js/scripts/forms/validation/form-validation.js')}}"></script>

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
</body>
<!-- END: Body-->

</html>
