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
                                Detail Post
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="row no-gutters">
                        <div class="col-md-12 col-lg-4">
                            <img src="{{asset('')}}{{$data->image}}" alt="{{$data->image_alt}}"
                                 class="h-100 w-100 rounded-left">
                        </div>
                        <div class="col-md-12 col-lg-8">
                            <div class="card-body">
                                <p>
                                <h4 class="card-title"> {{$data->title}}</h4>
                                </p>
                                <p class="card-text text-ellipsis">
                                    {!!$data->short_description!!}
                                </p>
                                <p>
                                    <span><i class="bx bx-time font-size-large align-middle mr-50"></i> {{$data->day_add}}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <h4 class="card-title">{{$data->title}}</h4>
                        <p class="card-text">
                          {!! $data->content !!}
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
