@extends('backend.layout-admin.index')
@push('link-script')
    <link rel="stylesheet" type="text/css"
          href="{{asset('/app-assets/css/plugins/forms/validation/form-validation.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/forms/select/select2.min.css')}}">
    <script>
        tinymce.init({
            selector: '#mytextarea'
        });
    </script>
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
                    <h5 class="content-header-title float-left pr-1 mb-0">Products Tables</h5>
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb p-0 mb-0">
                            <li class="breadcrumb-item"><a href="{{route('backend.admin')}}"><i
                                        class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active">
                                Products
                            </li>
                            <li class="breadcrumb-item active">
                                Add Products
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
                <h4 class="card-title">Add Products</h4>
            </div>
            <div class="card-content" style="padding: 20px;">
                <div class="container">
                    <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data"
                          class="f_validate" novalidate>
                        <div class="row">
                            @csrf
                            <div class="col-9">
                                <div class="form-group">
                                    <label>Tên sản phẩm</label>
                                    <div class="controls">
                                        <input type="text" name="name" class="form-control"
                                               data-validation-required-message="Tến sản phẩm không được để trống !"
                                               placeholder="Tên sản phẩm"
                                               minlength="3"
                                               data-validation-minlength-message="Tiêu đề không dưới 3 ký tự !"
                                               maxlength="255"
                                               data-validation-maxlength-message="Tiêu đề không quá 255 ký tự !"
                                               value="{{old('name')}}">
                                    </div>
                                    @error('name')
                                    <span class="message">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <div class="controls">
                                        <select class="select2 form-control" name="cate_id"
                                                data-validation-required-message="Danh mục không được để trống !">
                                            <option value=''>---Nhập danh mục---</option>
                                            @foreach($data as $value)
                                                <option value="{{$value->id}}">{{$value->name_cate}}</option>
                                            @endforeach
                                        </select>
                                        @error('cate_id')
                                        <span class="message">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Giá sản phẩm</label>
                                    <div class="controls">
                                        <input type="number" name="price" class="form-control"
                                               data-validation-required-message="Giá sản phẩm không được để trống !"
                                               placeholder="Giá sản phẩm"
                                               data-validation-containsnumber-regex="(\d)+"
                                               data-validation-containsnumber-message="Giá tiền chỉ đươc nhập số và lơn hơn 0!"
                                               value="{{old('price')}}">
                                    </div>
                                    @error('price')
                                    <span class="message">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Mô tả ngắn</label>
                                    <div class="controls">
                                        <textarea id="default" name="descride_detail" class="form-control"
                                                  placeholder="Mô tả ngắn sản phẩm"
                                                  style="height:300px;"
                                                  value="{{old('descride_detail')}}"></textarea>
                                    </div>
                                    @error('descride_detail')
                                    <span class="message">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Nội dung</label>
                                    <div class="controls">
                                    <textarea name="descride" class="form-control my-editor"
                                              style="height:400px;"
                                              placeholder="Mô tả sản phẩm"
                                              value="{{old('descride')}}"
                                    ></textarea>
                                    </div>
                                    @error('descride')
                                    <span class="message">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-3">
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
                                                               name="status" value="{{config('common.products.status.Active')}}">
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
                                                               value="{{config('common.products.status.Inactive')}}"
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
                                    <label for="">Nổi bật</label>
                                    <div class="form-control">
                                        <div class="controls">
                                            <ul class="list-unstyled mb-0">
                                                <li class="d-inline-block mr-2 mb-1">
                                                    <fieldset>
                                                        <div class="radio radio-primary">
                                                            <input type="radio" name="highlight"
                                                                   data-validation-required-message="Trạng thái không được để trống !"
                                                                   id="colorRadio1" value="0">
                                                            <label for="colorRadio1">Normal</label>
                                                        </div>
                                                    </fieldset>
                                                </li>
                                                <li class="d-inline-block mr-2 mb-1">
                                                    <fieldset>
                                                        <div class="radio radio-danger">
                                                            <input type="radio" name="highlight"
                                                                   data-validation-required-message="Trạng thái không được để trống !"
                                                                   id="colorRadio2" value="1">
                                                            <label for="colorRadio2">Spaice</label>
                                                        </div>
                                                    </fieldset>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    @error('highlight')
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
                                <div class="form-group">
                                    <label>ALT IMAGE</label>
                                    <div class="controls">
                                        <input type="text" name="image_alt" class="form-control"
                                               data-validation-required-message="Tiêu đề ảnh không được để trống !"
                                               minlength="3"
                                               data-validation-minlength-message=" Tiêu đề ảnh trên 3 ký tự !"
                                               maxlength="255"
                                               data-validation-maxlength-message=" Tiêu đề ảnh không quá 255 ký tự !"
                                               placeholder="Mô tả ảnh">
                                    </div>
                                    @error('image_alt')
                                    <span class="message">{{$message}}</span>
                                    @enderror
                                </div>
                                <img src="" id='image' width="100%" alt="Hình ảnh">
                            </div>
                        </div>
                        <div class="row">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Add Attribute Products</h4>
                                </div>
                                <div class="card-content">
                                    <table class="table w-100 table-detaileproduct mb-4">
                                        <thead class="thead-dark">
                                        <tr>
                                            <th width='5%'></th>
                                            <th width="10%"></th>
                                            <th width="25%">Tên màu</th>
                                            <th width="60%">
                                                <div class="d-flex ">
                                                    <p class="w-80 text-center">Chi tiết</p>
                                                    <p class="w-10"></p>
                                                    <p class="w-10"></p>
                                                </div>
                                            </th>


                                            <!-- <th width="5%">
                                        <a href="javascript:void(0);" class="btn btn-primary add_button" title="Add field">Add</a>
                                    </tr> -->
                                        </thead>
                                        <tbody id="body_table" data-repeater-list="product_detail">
                                        <tr data-repeater-item>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-danger" data-repeater-delete
                                                        style="margin-top: -40px"><i class="bx bx-x"></i></button>
                                            </td>
                                            <td>
                                                <label >Trạng thái</label>
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <input type="radio"
                                                               name="status_product_image" value="1">
                                                        <label for="radioshadow1">Acitve</label><br>
                                                        <input type="radio"
                                                               name="status_product_image" value="0">
                                                        <label for="radioshadow1">Inacitve</label>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="row" style="margin-top: -17px">
                                                    <div class="form-group">
                                                        <label for="">Màu</label>
                                                        <div class="controls">
                                                            <select class="form-control" name="color">
                                                                <option value="">--Chọn màu--</option>
                                                                @foreach($color as $item)
                                                                    <option
                                                                        value="{{$item->id}}">{{$item->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Ảnh chi tiết màu</label>
                                                        <div class="controls">
                                                            <input type="file" name='product_image_detail'
                                                                   class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="inner-repeater">
                                                    <div class="content" data-repeater-list="product_parameter"
                                                         style="margin-left: 0px;margin-top: 20px">
                                                        <div class="d-flex w-100" data-repeater-item>
                                                            <div class="row">
                                                                <div class="col-5">
                                                                    <div class="form-group">
                                                                        <label for="">Size</label>
                                                                        <div class="controls">
                                                                            <select class="form-control"
                                                                                    name="size">
                                                                                <option value="">--Chọn size--</option>
                                                                                @foreach($size as $item)
                                                                                    <option
                                                                                        value="{{$item->id}}">{{$item->name}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="">Số lượng</label>
                                                                        <div class="controls">
                                                                            <input type="number" min="0"
                                                                                   class="form-control"
                                                                                   name="detail_product-so-luong"
                                                                                   placeholder="Số lượng..">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-5">
                                                                    <div class="form-group">
                                                                        <label for="">Giá nhập</label>
                                                                        <div class="controls">
                                                                            <input type="text" min="0"
                                                                                   class=" form-control"
                                                                                   placeholder="Giá nhập ......"
                                                                                   name="detail_product-gia-nhap">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="">Giá bán</label>
                                                                        <div class="controls">
                                                                            <input type="text" min="0"
                                                                                   class=" form-control"
                                                                                   placeholder="Giá bán ......"
                                                                                   name="detail_product-gia-ban">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-2" style="margin-left:-10px">
                                                                    <div class="form-group">
                                                                        <label for="">Trạng thái</label>
                                                                        <div class="controls">
                                                                            <input type="radio"
                                                                                   name="stautus_product_detail"
                                                                                   value="1"> Active
                                                                            <input type="radio"
                                                                                   name="stautus_product_detail"
                                                                                   value="0"> Inactive
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <button type="button" class="btn btn-sm btn-danger "
                                                                        style="height:33px;margin-top: 50px;"
                                                                        data-repeater-delete><i class="bx bx-x"></i>
                                                                </button>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <button type="button" class="btn btn-success w-1"
                                                            data-repeater-create type="button"><i
                                                            class="bx bx-plus"></i></button>
                                                </div>

                                            </td>
                                        </tr>
                                        </tbody>
                                        <tfoot>
                                        <th colspan="8" rowspan="" headers="" scope="">
                                            <!-- <a href="javascript:void(0);" class='them'><i class="fas fa-plus-circle"></i></a> -->
                                            <a href="javascript:void(0);" class="btn btn-primary " data-repeater-create
                                               type="button" title="Add field"><i class="bx bx-plus"></i></a>
                                        </th>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row pull-right" style="margin-top: 50px">
                            <div class="form-group ml-5" style="padding-left: 800px">
                                <button class="btn btn-primary">Gửi</button>
                                <a href="{{route('product.index')}}" class="btn btn-primary">Quay Lại</a>
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


    <!-- BEGIN: Page JS-->
    <script src="{{asset('/app-assets/vendors/js/forms/repeater/jquery.repeater.min.js')}}"></script>
    <script src="{{asset('/app-assets/js/scripts/forms/form-repeater.js')}}"></script>
    <!-- END: Page JS-->
    <script>
        $('.f_validate').repeater({
            show: function () {
                $(this).slideDown();

            },
            hide: function (deleteElement) {
                if (confirm('Bạn có muốn xóa bản ghi này hay không ?')) {
                    $(this).slideUp(deleteElement);
                }
            },
            repeaters: [{
                // (Required)
                // Specify the jQuery selector for this nested repeater
                selector: '.inner-repeater'
            }]
        });
    </script>
    <script>
        tinymce.init({
            selector: 'textarea#default'
        });
        tinymce.init({
            selector: 'textarea#default'
        });
    </script>
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

    <script>
        var editor_config = {
            path_absolute: "/",
            selector: 'textarea.my-editor',
            relative_urls: false,
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table directionality",
                "emoticons template paste textpattern"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            file_picker_callback: function (callback, value, meta) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                var y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;

                var cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
                if (meta.filetype == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }

                tinyMCE.activeEditor.windowManager.openUrl({
                    url: cmsURL,
                    title: 'Filemanager',
                    width: x * 0.8,
                    height: y * 0.8,
                    resizable: "yes",
                    close_previous: "no",
                    onMessage: (api, message) => {
                        callback(message.content);
                    }
                });
            }
        };

        tinymce.init(editor_config);
    </script>
@endpush
