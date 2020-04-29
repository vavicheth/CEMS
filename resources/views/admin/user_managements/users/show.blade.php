@extends('layouts.backend')

@section('css_before')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css') }}">

    <link rel="stylesheet" href="{{ asset('js/plugins/select2/css/select2.min.css') }}">

    <!-- Slim Image Cropper file CSS -->
    <link href="{{asset('js/plugins/slim-image-cropper/slim.min.css')}}" rel="stylesheet" type="text/css"/>


@endsection

@section('content')

    <!-- Page Content -->
    <div class="content">

        <!-- Dynamic Table with Export Buttons -->
        <div class="block">
            <div class="block-header">
                <h3 class="block-title">User Information</h3>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">User Managements</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="">User Information</a>
                        </li>
                    </ol>
                </nav>
            </div>

            <div class="block-content block-content-full">

                <div class="row">
                    <div class="col-lg-8 col-xl-5">
                        <div class="table-responsive">
                            <table class="table table-borderless table-hover table-vcenter mb-0">
                                <tbody>
                                <tr>
                                    <td class="font-w600 text-left">Name</td>
                                    <td>{{$user->name}}</td>
                                </tr>
                                <tr>
                                    <td class="font-w600 text-left">Username</td>
                                    <td>{{$user->username}}</td>
                                </tr>
                                <tr>
                                    <td class="font-w600 text-left">Email</td>
                                    <td>{{$user->email}}</td>
                                </tr>
                                <tr>
                                    <td class="font-w600 text-left">Active</td>
                                    <td>
                                        <div class="custom-control custom-checkbox custom-control-primary custom-control-lg mb-1">
                                            <input type="checkbox" class="custom-control-input" name="active_user" disabled {{$user->active == 1? 'checked' : ''}} >
                                            <label class="custom-control-label" for="active_user">{{$user->active == 1? 'Activated' : 'Inactive'}}</label>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>

                    <div class="col-lg-4 col-xl-4">
                        <div class="form-group align-items-center">
                                    <img width="50%" class="img-fluid"  src="{{asset('media/avatars/'.$user->avatar) }}" />
                        </div>

                    </div>

                </div>

                <div class="row">
                    <a class="btn btn-secondary float-right" href="{{route('admin.user_managements.users.index')}}">Cancel</a>
                </div>
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

    <script>
        jQuery(function () {
        });
    </script>


@endsection
