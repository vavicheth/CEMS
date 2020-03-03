@extends('layouts.main')

@section('body_block')




    <!-- Page Container -->
    <!--
        Available classes for #page-container:

    GENERIC

        'enable-cookies'                            Remembers active color theme between pages (when set through color theme helper Template._uiHandleTheme())

    SIDEBAR & SIDE OVERLAY

        'sidebar-r'                                 Right Sidebar and left Side Overlay (default is left Sidebar and right Side Overlay)
        'sidebar-mini'                              Mini hoverable Sidebar (screen width > 991px)
        'sidebar-o'                                 Visible Sidebar by default (screen width > 991px)
        'sidebar-o-xs'                              Visible Sidebar by default (screen width < 992px)
        'sidebar-dark'                              Dark themed sidebar

        'side-overlay-hover'                        Hoverable Side Overlay (screen width > 991px)
        'side-overlay-o'                            Visible Side Overlay by default

        'enable-page-overlay'                       Enables a visible clickable Page Overlay (closes Side Overlay on click) when Side Overlay opens

        'side-scroll'                               Enables custom scrolling on Sidebar and Side Overlay instead of native scrolling (screen width > 991px)

    HEADER

        ''                                          Static Header if no class is added
        'page-header-fixed'                         Fixed Header

    HEADER STYLE

        ''                                          Light themed Header
        'page-header-dark'                          Dark themed Header

    MAIN CONTENT LAYOUT

        ''                                          Full width Main Content if no class is added
        'main-content-boxed'                        Full width Main Content with a specific maximum width (screen width > 1200px)
        'main-content-narrow'                       Full width Main Content with a percentage width (screen width > 1200px)
    -->
    <div id="page-container">

        <!-- Main Container -->
        <main id="main-container">
            <!-- Page Content -->
            <div class="bg-image" style="background-image: url({{asset('media/photos/photo6@2x.jpg')}});">
                <div class="hero-static bg-white-95">
                    <div class="content">
                        <div class="row justify-content-center">
                            <div class="col-md-8 col-lg-6 col-xl-4">
                                <!-- Sign In Block -->
                                <div class="block block-themed block-fx-shadow mb-0">
                                    <div class="block-header">
                                        <h3 class="block-title">{{__('Login')}}</h3>
                                        <div class="block-options">
                                            <a class="btn-block-option font-size-sm"
                                               href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>

                                            {{--                                        <a class="btn-block-option" href="op_auth_signup.html" data-toggle="tooltip"--}}
                                            {{--                                           data-placement="left" title="New Account">--}}
                                            {{--                                            <i class="fa fa-user-plus"></i>--}}
                                            {{--                                        </a>--}}
                                        </div>
                                    </div>
                                    <div class="block-content">
                                        <div class="p-sm-3 px-lg-4 py-lg-5">
                                            <h1 class="mb-2">OneUI</h1>
                                            <p>Welcome, please login.</p>

                                            <!-- Sign In Form -->
                                            <!-- jQuery Validation (.js-validation-signin class is initialized in js/pages/op_auth_signin.min.js which was auto compiled from _es6/pages/op_auth_signin.js) -->
                                            <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                                            <form class="js-validation-signin" method="POST"
                                                  action="{{ route('login') }}">
                                                @csrf
                                                <div class="py-3">
                                                    <div class="form-group">
                                                        <input class="form-control form-control-alt form-control-lg" id="username" name="username"
                                                               value="{{ old('username') }}"
                                                               autofocus
                                                               placeholder={{ __('Username or E-Mail Address') }}>
                                                        @error('username')
                                                            <span class="text-danger animated fadeIn">{{ $errors->first('username') }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="password"
                                                               class="form-control form-control-alt form-control-lg"
                                                               id="password" name="password"
                                                               autocomplete="current-password"
                                                               placeholder="{{__('Password')}}">
                                                        @error('password')
                                                            <span class="text-danger animated fadeIn">{{ $errors->first('password') }}</span>
                                                        @enderror
                                                    </div>

                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-6 col-xl-5">
                                                        <button type="submit" class="btn btn-block btn-primary">
                                                            <i class="fa fa-fw fa-sign-in-alt mr-1"></i> {{__('Login')}}
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                            <!-- END Sign In Form -->

                                        </div>
                                    </div>
                                </div>
                                <!-- END Sign In Block -->
                            </div>
                        </div>
                    </div>
                    <div class="content content-full font-size-sm text-muted text-center">
                        <strong>{{env('COMPANY_NAME')}}</strong> &copy; <span data-toggle="year-copy"></span>
                    </div>
                </div>
            </div>
            <!-- END Page Content -->
        </main>
        <!-- END Main Container -->
    </div>
    <!-- END Page Container -->

@endsection

@section('after_js')
    <!-- Page JS Plugins -->
    <script src="{{asset('js/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('js/plugins/jquery-validation/additional-methods.js')}}"></script>

    <script>
        jQuery(function () {
            One.helpers("validation"), jQuery(".js-validation").validate({
                rules: {
                    "username": {
                        required: !0,
                        minlength: 3
                    },
                    "password": {
                        required: !0,
                        minlength: 6
                    }
                },
                messages: {
                    "username": {
                        required: "Please enter a username",
                        minlength: "Your username must consist of at least 3 characters"
                    },
                    "password": {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 6 characters long"
                    }
                }
            })
        });


    </script>
@endsection









