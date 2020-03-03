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

            {!! Form::open(['method' => 'PATCH', 'route' => ['auth.change_password']]) !!}
            <div class="col-lg-8 col-xl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach

                <div class="form-group row">
                    <label class="col-sm-4" for="current_password">Current Password <span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" id="current_password" name="current_password" placeholder="Type current password..." required>
                        @if($errors->has('current_password'))
                            <div class="invalid-feedback animated fadeIn">{{ $errors->first('current_password') }}</div>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 " for="new_password">Password <span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Choose a safe one.." required>
                        @if($errors->has('new_password'))
                            <div class="invalid-feedback animated fadeIn">{{ $errors->first('new_password') }}</div>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 " for="new_password_confirmation">Confirm Password <span class="text-danger">*</span></label>
                    <span class="col-sm-8">
                        <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation" placeholder="..and confirm it!">
                        @if($errors->has('new_password_confirmation'))
                            <span class="alert-danger">{{ $errors->first('new_password_confirmation') }}</span>
                        @endif
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

    <script src="{{asset('js/plugins/pages/be_forms_validation.min.js')}}"></script>


@endsection
