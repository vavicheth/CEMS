@extends('layouts.backend')

@section('css_before')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css') }}">

    <link rel="stylesheet" href="{{ asset('js/plugins/select2/css/select2.min.css') }}">

    <!-- Bootstrap input file CSS -->
{{--    <link href="{{asset('js/plugins/bootstrap-input/fileinput.min.css')}}" media="all" rel="stylesheet"--}}
{{--          type="text/css"/>--}}

    <!-- Slim Image Cropper file CSS -->
        <link href="{{asset('js/plugins/slim-image-cropper/slim.min.css')}}" rel="stylesheet" type="text/css"/>


@endsection

@section('content')

    <!-- Page Content -->
    <div class="content">

        <!-- Dynamic Table with Export Buttons -->
        <div class="block">
            <div class="block-header">
                <h3 class="block-title">Change Password</h3>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">User Managements</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="">Change password</a>
                        </li>
                    </ol>
                </nav>
            </div>

            <div class="block-content block-content-full">

                {!! Form::open(['method' => 'POST', 'route' => ['admin.user_managements.users.store'],'class'=>'js-validation', 'files' => true]) !!}
                {{--                @csrf--}}
                <div class="row">
                    <div class="col-lg-8 col-xl-5">

                        <div class="row">
                            <label class="col-sm-4" for="staff_id">Staff_code <span class="text-danger">*</span></label>
                            <div class="col-sm-8 form-group">
                                <select class="js-select2 form-control" id="staff_id" name="staff_id"
                                        style="width: 100%;"
                                        data-placeholder="Choose one..">
                                    <option></option>
                                    <!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                    <option value="1">HTML</option>
                                    <option value="2">CSS</option>
                                    <option value="3">JavaScript</option>
                                    <option value="4">Angular</option>
                                    <option value="5">React</option>
                                </select>
                                @error('staff_id')
                                <span class="text-danger animated fadeIn">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-4" for="name">Full Name </label>
                            <div class="col-sm-8 form-group">
                                <input type="text" class="form-control" id="name" name="name"
                                       placeholder="Type your full name..." autofocus>
                                @error('name')
                                <span class="text-danger animated fadeIn">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-4" for="username">Username <span class="text-danger">*</span></label>
                            <div class="col-sm-8 form-group">
                                <input type="text" class="form-control" id="username" name="username"
                                       placeholder="Username">
                                @error('username')
                                <span class="text-danger animated fadeIn">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-4" for="email">Email <span class="text-danger">*</span></label>
                            <div class="col-sm-8 form-group">
                                <input type="email" class="form-control" id="email" name="email"
                                       placeholder="Username">
                                @error('email')
                                <span class="text-danger animated fadeIn">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-4 " for="password">New Password <span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-8 form-group">
                                <input type="password" class="form-control" id="password" name="password"
                                       placeholder="Password">
                                @error('password')
                                <span class="text-danger animated fadeIn">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-4 " for="new_password_confirmation">Confirm Password <span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-8 form-group">
                                <input type="password" class="form-control" id="new_password_confirmation"
                                       name="new_password_confirmation" placeholder="Password confirm">
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-4" for="role_id">Role <span class="text-danger">*</span></label>
                            <div class="col-sm-8 form-group">
                                <select class="js-select2 form-control" id="role_id" name="role_id" style="width: 100%;"
                                        data-placeholder="Choose one..">
                                    <option></option>
                                    <!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                    <option value="1">HTML</option>
                                    <option value="2">CSS</option>
                                    <option value="3">JavaScript</option>
                                    <option value="4">Angular</option>
                                    <option value="5">React</option>
                                </select>
                                @error('role_id')
                                <span class="text-danger animated fadeIn">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-4 "></div>
                            <div class="col-sm-8 form-group">
                                <div class="custom-control custom-switch custom-control-primary mb-1">
                                    <input type="checkbox" class="custom-control-input" id="active" name="active"
                                           checked>
                                    <label class="custom-control-label" for="active">Active</label>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-4 col-xl-4">
                        <div class="form-group">
                            <div class="slim" data-label="Drop your avatar here" data-fetcher="fetch.php" data-size="600,600" data-ratio="1:1" data-rotate-button="true" accept="image/jpeg, image/gif, image/png">
                                <input name="avatar" type="file"/>
                            </div>
{{--                            <div class="file-loading">--}}
{{--                                <input id="file-1" name="photo" type="file" class="file" data-overwrite-initial="false"--}}
{{--                                        data-theme="fas">--}}
{{--                            </div>--}}
                        </div>

                    </div>

                </div>

                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}


            </div>


        </div>


    </div>
    <!-- END Page Content -->
@endsection

@section('js_after')

    <!-- Page JS Plugins -->
    <script src="{{asset('js/plugins/select2/js/select2.full.min.js')}}"></script>
    <script src="{{asset('js/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('js/plugins/jquery-validation/additional-methods.js')}}"></script>

    <!-- Bootstrap Input file -->
    <script src="{{asset('js/plugins/slim-image-cropper/slim.kickstart.min.js')}}" crossorigin="anonymous"></script>

    <!-- Bootstrap Input file -->
{{--    <script src="{{asset('js/plugins/bootstrap-input/jquery-3.3.1.min.js')}}" crossorigin="anonymous"></script>--}}
{{--    <script src="{{asset('js/plugins/bootstrap-input/bootstrap.bundle.min.js')}}" crossorigin="anonymous"></script>--}}
{{--    <script src="{{asset('js/plugins/bootstrap-input/fileinput.min.js')}}"></script>--}}
{{--    <script src="{{asset('js/plugins/bootstrap-input/theme.min.js')}}"></script>--}}

    <script>
        jQuery(function () {
            One.helpers('select2');
            One.helpers("validation"), jQuery(".js-validation").validate({
                    ignore: [], rules: {
                        "staff_id": {
                            required: !0
                        }
                        , "name": {
                            required: !0
                        }
                        , "username": {
                            required: !0
                        }
                        , "email": {
                            required: !0, email: !0
                        }
                        , "password": {
                            required: !0, minlength: 3
                        }
                        , "new_password_confirmation": {
                            required: !0, equalTo: "#password"
                        }, "role_id": {
                            required: !0
                        }
                    }
                    , messages: {
                        "name": {
                            required: "Please provide a Full Name",
                        }
                        ,
                        "username": {
                            required: "Please provide a Username",
                        }
                        ,
                        "email": {
                            required: "Please enter a email address",
                            email: "Please enter a valid email address"
                        }
                        ,
                        "password": {
                            required: "Please provide a password",
                            minlength: "Your password must be at least 3 characters long"
                        }
                        ,
                        "new_password_confirmation": {
                            required: "Please provide a confirm password",
                            equalTo: "Please enter the same password as above"
                        }, "staff_id": "Please select a value!", "role_id": "Please select a value!"
                    }
                }
            ), jQuery(".js-select2").on("change", (function (e) {
                    jQuery(e.currentTarget).valid()
                }
            ))
        });

        //upload
        // $(function () {
        // $("#file-1").fileinput({
        //     theme: 'fas',
        //     uploadUrl: '#', // you must set a valid URL here else you will get an error
        //     allowedFileExtensions: ['jpg', 'png', 'gif'],
        //     overwriteInitial: false,
        //
        //     showUpload: false,
        //     showCancel:false,
        //     maxFileSize: 2000,
        //     maxFilesNum: 10,
        //     //allowedFileTypes: ['image', 'video', 'flash'],
        //     slugCallback: function (filename) {
        //         return filename.replace('(', '_').replace(']', '_');
        //     }
        // });
        // });


    </script>


@endsection
