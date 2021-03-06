@extends('backend.layout-admin.index')
@push('link-script')
    <link rel="stylesheet" type="text/css"
          href="{{asset('/app-assets/css/plugins/forms/validation/form-validation.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
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
                    <h5 class="content-header-title float-left pr-1 mb-0">Posts Tables</h5>
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb p-0 mb-0">
                            <li class="breadcrumb-item"><a href="{{route('backend.admin')}}"><i
                                        class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active">
                                Post
                            </li>
                            <li class="breadcrumb-item active">
                                Edit Post
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
                <h4 class="card-title">Edit Post</h4>
            </div>
            <div class="card-content" style="padding: 20px;">
                <div class="container">
                    <form action="{{route('post.update',$data->id)}}" method="POST" enctype="multipart/form-data"
                          class="needs-validation" novalidate>
                        <div class="row">
                            @method('PUT')
                            @csrf
                            <input type="text" name="id" value="{{$data->id}}" hidden>
                            <div class="col-9">
                                <div class="form-group">
                                    <label>Ti??u ?????</label>
                                    <div class="controls">
                                        <input type="text" name="title" class="form-control"
                                               data-validation-required-message="Ti??u ????? kh??ng ???????c ????? tr???ng !"
                                               placeholder="Ti??u ????? b??i vi???t"
                                               minlength="5"
                                               data-validation-minlength-message="Ti??u ????? kh??ng d?????i 5 k?? t??? !"
                                               maxlength="255"
                                               data-validation-maxlength-message="Ti??u ????? kh??ng qu?? 255 k?? t??? !"
                                               value="{{$data->title}}">
                                    </div>
                                    @error('title')
                                    <span class="message">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="">N???i dung</label>
                                    <div class="controls">
                                    <textarea name="content" class="form-control my-editor"
                                              style="height:500px;"
                                              placeholder="M?? t??? ng???n n???i dung"
                                              value="{{old('content')}}"
                                    >{!! $data->content !!}</textarea>
                                    </div>
                                    @error('content')
                                    <span class="message">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">M?? t??? ng???n</label>
                                    <div class="controls">
                                        <textarea id="default" name="short_description" style="height: 300px" class="form-control"
                                                  placeholder="Ti??u ????? b??i vi???t"
                                                  value="{{old('short_description')}}">{!! $data->short_description !!}</textarea>
                                    </div>
                                    @error('short_description')
                                    <span class="message">{{$message}}</span>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-3">
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
                                                                   @if($data->status== config('common.posts.status.Active')) checked @endif
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
                                                                   @if($data->status== config('common.posts.status.Inactive')) checked @endif
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
                                    <label for="">N???i b???t</label>
                                    <div class="form-control">
                                        <div class="controls">
                                            <ul class="list-unstyled mb-0">
                                                <li class="d-inline-block mr-2 mb-1">
                                                    <fieldset>
                                                        <div class="radio radio-primary">
                                                            <input type="radio" name="highlight"
                                                                   data-validation-required-message="Tr???ng th??i kh??ng ???????c ????? tr???ng !"
                                                                   @if($data->highlight== config('common.posts.highlight.Normal')) checked @endif
                                                                   id="colorRadio1" value="0"
                                                            >
                                                            <label for="colorRadio1">Normal</label>
                                                        </div>
                                                    </fieldset>
                                                </li>
                                                <li class="d-inline-block mr-2 mb-1">
                                                    <fieldset>
                                                        <div class="radio radio-danger">
                                                            <input type="radio" name="highlight"
                                                                   data-validation-required-message="Tr???ng th??i kh??ng ???????c ????? tr???ng !"
                                                                   id="colorRadio2" value="1"
                                                                   @if($data->highlight==config('common.posts.highlight.Special')) checked @endif
                                                            >
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
                                                       value="{{$data->image}}"
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
                                               data-validation-required-message="Ti??u ????? ???nh kh??ng ???????c ????? tr???ng !"
                                               minlength="3"
                                               data-validation-minlength-message=" Ti??u ????? ???nh tr??n 3 k?? t??? !"
                                               maxlength="255"
                                               data-validation-maxlength-message=" Ti??u ????? ???nh kh??ng qu?? 255 k?? t??? !"
                                               placeholder="M?? t??? ???nh"
                                               value="{{$data->image_alt}}"
                                        >
                                    </div>
                                    @error('image_alt')
                                    <span class="message">{{$message}}</span>
                                    @enderror
                                </div>
                                <img src="{{asset('')}}{{$data->image}}" id='image' width="100%" alt="H??nh ???nh">
                            </div>
                        </div>


                        <div class="row pull-right" style="margin-top: 50px">
                            <div class="form-group ml-5" style="padding-left: calc(var(--bs-gutter-x) * 36.11);">
                                <button class="btn btn-primary">G???i</button>
                                <a href="{{route('post.index')}}" class="btn btn-primary">Quay L???i</a>
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
    <script>
        tinymce.init({
            selector: 'textarea#default'
        });
        tinymce.init({
            selector: 'textarea#default'
        });
    </script>
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
