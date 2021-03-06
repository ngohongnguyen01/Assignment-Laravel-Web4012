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
                <h3 style="text-align: center">????ng K??</h3>
            </div>
        </div>
        <form action="{{route('Postsingup')}}" method="POST" enctype="multipart/form-data"
              class="needs-validation" novalidate>
            <div class="row">
                @csrf
                <div class="col-7">
                    <div class="form-group">
                        <label>H??? t??n</label>
                        <div class="controls">
                            <input type="text" name="full_name" class="form-control"
                                   data-validation-required-message="H??? t??n kh??ng ???????c ????? tr???ng !"
                                   placeholder="H??? t??n"
                                   data-validation-containsnumber-regex="^[a-zA-Z-'(??????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????D) ]*$"
                                   data-validation-containsnumber-message="T??n ch??? ch???a c??c k?? t??? ch??? c??i !"
                                   maxlength="255"
                                   data-validation-maxlength-message="T??n kh??ng qu?? 255 k?? t??? !"
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
                                   data-validation-required-message="Email kh??ng ???????c ????? tr???ng !"
                                   placeholder="Email"
                                   maxlength="255"
                                   data-validation-email-message="Xin m???i nh???p Email ????ng ?????nh d???ng email !"
                                   data-validation-maxlength-message="Email kh??ng qu?? 255 k?? t??? !"
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
                                   data-validation-required-message="T??n size kh??ng ???????c ????? tr???ng !"
                                   placeholder="User Name"
                                   data-validation-regex-regex="^[a-zA-Z_0-9]+$"
                                   data-validation-regex-message="User Name ch??? ???????c nh???p c??c k?? t??? ch??? c??i v?? d???u g???ch d?????i !"
                                   maxlength="255"
                                   data-validation-maxlength-message="User Name kh??ng qu?? 255 k?? t??? !"
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
                                   data-validation-required-message="M???t kh???u  kh??ng ???????c ????? tr???ng !"
                                   placeholder="Password"
                                   maxlength="255"
                                   minlength="6"
                                   data-validation-minlength-message="M???t kh???u d?????i 6 k?? t??? !"
                                   data-validation-maxlength-message="M???t kh???u kh??ng qu?? 255 k?? t??? !"
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
                                   data-validation-required-message="M???t kh???u  kh??ng ???????c ????? tr???ng !"
                                   data-validation-match-message="M???t kh???u l???p l???i ph???i kh???p !"
                                   placeholder="Nh???p l???i m???t kh???u">
                        </div>
                    </div>
                </div>
                <div class="col-5">
                    <div class="form-group">
                        <label>Phone</label>
                        <div class="controls">
                            <input type="text" name="phone" class="form-control"
                                   data-validation-required-message="Phone kh??ng ???????c ????? tr???ng !"
                                   placeholder="Phone"
                                   data-validation-containsnumber-regex="((^0)(32|33|34|35|36|37|38|39|56|58|59|70|76|77|78|79|81|82|83|84|85|86|88|89|90|92|91|93|94|96|97|98|99)+([0-9]{7}))$"
                                   data-validation-containsnumber-message="S??? ??i???n tho???i kh??ng h???p l??? !"
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
                                   data-validation-required-message="?????a ch??? kh??ng ???????c ????? tr???ng !"
                                   placeholder="Address"
                                   value="{{old('address')}}">
                        </div>
                        @error('address')
                        <span class="message">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Gi???i t??nh</label>
                        <div class="form-control">
                            <div class="controls">
                                <ul class="list-unstyled mb-0">
                                    <li class="d-inline-block mr-2 mb-1">
                                        <fieldset>
                                            <div class="radio radio-primary">
                                                <input type="radio" name="gender"
                                                       data-validation-required-message="Gi???i t??nh kh??ng ???????c ????? tr???ng !"
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
                                                       data-validation-required-message="Gi???i t??nh kh??ng ???????c ????? tr???ng !"
                                                       id="colorRadio2"
                                                       value="{{config('common.users.gender.Female')}}">
                                                <label for="colorRadio2">N???</label>
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
                        <label for="">???nh</label>
                        <div class="controls">
                            <input type="file"
                                   data-validation-required-message="???nh kh??ng ???????c ????? tr???ng !"
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
                        <button class="btn btn-primary">G???i</button>
                        <a href="{{route('index')}}" class="btn btn-primary">Quay L???i</a>
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
