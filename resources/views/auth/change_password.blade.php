@extends('layouts.backend')

@section('css_before')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css') }}">
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

                {!! Form::open(['method' => 'PATCH', 'route' => ['auth.change_password'],'class'=>'js-validation']) !!}
                <div class="col-lg-8 col-xl-5">


                    <div class="row">
                        <label class="col-sm-4" for="current_password">Current Password <span
                                    class="text-danger">*</span></label>
                        <div class="col-sm-8 form-group">
                            <input type="password" class="form-control" id="current_password" name="current_password"
                                   placeholder="Type current password..." autofocus>

                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-4 " for="new_password">New Password <span
                                    class="text-danger">*</span></label>
                        <div class="col-sm-8 form-group">
                            <input type="password" class="form-control" id="new_password" name="new_password"
                                   placeholder="Choose a safe one..">

                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-4 " for="new_password_confirmation">Confirm Password <span
                                    class="text-danger">*</span></label>
                        <div class="col-sm-8 form-group">
                            <input type="password" class="form-control" id="new_password_confirmation"
                                   name="new_password_confirmation" placeholder="..and confirm it!">
                        </div>
                    </div>


                </div>


                {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}


            </div>


        </div>


    </div>
    <!-- END Page Content -->
@endsection

@section('js_after')

    <!-- Page JS Plugins -->
    <script src="{{asset('js/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('js/plugins/jquery-validation/additional-methods.js')}}"></script>

    <script>
        jQuery(function () {
            One.helpers("validation"), jQuery(".js-validation").validate({
                    ignore: [], rules: {
                        "current_password": {
                            required: !0, minlength: 6
                        }
                        , "new_password": {
                            required: !0, minlength: 6
                        }
                        , "new_password_confirmation": {
                            required: !0, equalTo: "#new_password"
                        }
                    }
                    , messages: {
                        "current-password": {
                            required: "Please provide a password",
                            minlength: "Your password must be at least 6 characters long"
                        }
                        ,

                        "new-password": {
                            required: "Please provide a new password",
                            minlength: "Your password must be at least 6 characters long"
                        }
                        ,
                        "new_password_confirmation": {
                            required: "Please provide a confirm password",
                            minlength: "Your password must be at least 6 characters long",
                            equalTo: "Please enter the same password as above"
                        }
                    }
                }
            ), jQuery(".js-select2").on("change", (function (e) {
                    jQuery(e.currentTarget).valid()
                }
            ))
        });


    </script>


@endsection
