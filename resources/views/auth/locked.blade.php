@extends('layouts.main')

@section('body_block')
{{--    <div class="container">--}}
{{--        <div class="row justify-content-center">--}}
{{--            <div class="col-md-8">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-header">{{ __('Locked') }}</div><div class="card-body">--}}
{{--                        <form method="POST" action="{{ route('login.unlock') }}" aria-label="{{ __('Locked') }}">--}}
{{--                            @csrf                        <div class="form-group row">--}}
{{--                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label><div class="col-md-6">--}}
{{--                                    <input id="password" type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>--}}
{{--                                    @if ($errors->has('password'))--}}
{{--                                        <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $errors->first('password') }}</strong>--}}
{{--                                    </span>--}}
{{--                                    @endif--}}
{{--                                </div>--}}
{{--                            </div>                        <div class="form-group row mb-0">--}}
{{--                                <div class="col-md-8 offset-md-4">--}}
{{--                                    <button type="submit" class="btn btn-primary">--}}
{{--                                        {{ __('Unlock') }}--}}
{{--                                    </button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}




    <div id="page-container">

        <!-- Main Container -->
        <main id="main-container">
            <!-- Page Content -->
            <div class="bg-image" style="background-image: url('{{asset('media/photos/photo34@2x.jpg')}}');">
                <div class="hero-static bg-black-50">
                    <div class="content">
                        <div class="row justify-content-center">
                            <div class="col-md-8 col-lg-6 col-xl-4">
                                <!-- Unlock Block -->
                                <div class="block block-themed mb-0">
                                    <div class="block-header bg-danger">
                                        <h3 class="block-title">Account Locked</h3>
                                        <div class="block-options">
                                            <a class="btn-block-option" href="op_auth_signin.html" data-toggle="tooltip" data-placement="left" title="Sign In with another account">
                                                <i class="fa fa-sign-in-alt"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="block-content">
                                        <div class="p-sm-3 px-lg-4 py-lg-5 text-center">
                                            <img class="img-avatar img-avatar96" src="assets/media/avatars/avatar10.jpg" alt="">
                                            <p class="font-w600 my-2">
                                                user@example.com
                                            </p>

                                            <!-- Unlock Form -->
                                            <!-- jQuery Validation (.js-validation-lock class is initialized in js/pages/op_auth_lock.min.js which was auto compiled from _es6/pages/op_auth_lock.js) -->
                                            <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                                            <form class="js-validation-lock" method="POST" action="{{ route('login.unlock') }}">
                                                @csrf
                                                <div class="form-group py-3">
                                                    <input type="password" class="form-control form-control-lg form-control-alt {{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" name="password" placeholder="{{ __('Password') }}" required >
                                                    @if ($errors->has('password'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('password') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="form-group row justify-content-center">
                                                    <div class="col-md-6 col-xl-5">
                                                        <button type="submit" class="btn btn-block btn-light">
                                                            <i class="fa fa-fw fa-lock-open mr-1"></i> {{ __('Unlock') }}
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                            <!-- END Unlock Form -->
                                        </div>
                                    </div>
                                </div>
                                <!-- END Unlock Block -->
                            </div>
                        </div>
                    </div>
                    <div class="content content-full font-size-sm text-white text-center">
                        <strong>OneUI 4.4</strong> &copy; <span data-toggle="year-copy"></span>
                    </div>
                </div>
            </div>
            <!-- END Page Content -->
        </main>
        <!-- END Main Container -->
    </div>


@endsection
