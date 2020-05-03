@extends('layouts.backend')

@section('css_before')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css') }}">

    <link rel="stylesheet" href="{{ asset('js/plugins/select2/css/select2.min.css') }}">

    <link rel="stylesheet" href="{{ asset('js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">
    <link rel="stylesheet" href="{{ asset('js/plugins/flatpickr/flatpickr.min.css') }}">

    <!-- Slim Image Cropper file CSS -->
    <link href="{{asset('js/plugins/slim-image-cropper/slim.min.css')}}" rel="stylesheet" type="text/css"/>

@endsection

@section('content')

    <!-- Page Content -->
    <div class="content">

        <!-- Dynamic Table with Export Buttons -->
        <div class="block">
            <div class="block-header">
                <h3 class="block-title">Update Patient</h3>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Patient Management</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="">Update Patient</a>
                        </li>
                    </ol>
                </nav>
            </div>

            <div class="block-content block-content-full">

                {!! Form::open(['method' => 'PATCH', 'route' => ['admin.patient_managements.patients.update',$patient->id],'class'=>'js-validation', 'files' => true]) !!}
                {{--                @csrf--}}
                <div class="row">
                    <div class="col-lg-10 col-xl-5">
                        <div class="row">
                            <label class="col-sm-4" for="hn">HN</label>
                            <div class="col-sm-8 form-group">
                                <input type="text" class="form-control" id="hn" name="hn" value="{{$patient->hn}}"
                                       placeholder="Type Hospital Number..." autofocus>
                                @error('hn')
                                <span class="text-danger animated fadeIn">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-4" for="name">Name<span class="text-danger">*</span></label>
                            <div class="col-sm-8 form-group">
                                <input type="text" class="form-control" id="name" name="name" value="{{$patient->name}}"
                                       placeholder="Type patient name...">
                                @error('name')
                                <span class="text-danger animated fadeIn">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-4" for="name_kh">Name Khmer<span class="text-danger">*</span></label>
                            <div class="col-sm-8 form-group">
                                <input type="text" class="form-control" id="name_kh" name="name_kh" value="{{$patient->name_kh}}"
                                       placeholder="Type patient name in Khmer...">
                                @error('name_kh')
                                <span class="text-danger animated fadeIn">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-4" for="gender">Gender<span class="text-danger">*</span></label>
                            <div class="col-sm-8 form-group">
                                {!! Form::select('gender', ['male'=>'Male','female'=>'Female'], $patient->gender, ['class' => 'js-select2 form-control']) !!}
                                @error('gender')
                                <span class="text-danger animated fadeIn">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-4" for="dob">Age/DOB</label>
                            <div class="col-sm-8 form-group">
                                <input type="number" class="form-control" id="age" placeholder="Age..." >
                                <input type="text" class="js-datepicker form-control" id="dob" name="dob" data-week-start="1" data-autoclose="true" data-today-highlight="true" data-date-format="dd/mm/yyyy" placeholder="dd/mm/yyyy" value="{{$patient->dob}}">
                                @error('dob')
                                <span class="text-danger animated fadeIn">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-4" for="address">Address</label>
                            <div class="col-sm-8 form-group">
                                <input type="text" class="form-control" id="address" name="address" value="{{$patient->address}}"
                                       placeholder="Type patient address...">
                                @error('address')
                                <span class="text-danger animated fadeIn">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-4" for="phone">Phone</label>
                            <div class="col-sm-8 form-group">
                                <input type="text" class="form-control" id="phone" name="phone" value="{{$patient->phone}}"
                                       placeholder="Type patient phone...">
                                @error('phone')
                                <span class="text-danger animated fadeIn">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-4" for="description">Description</label>
                            <div class="col-sm-8 form-group">
                                <textarea class="form-control" id="description" name="description">{{$patient->description}}</textarea>
                                @error('description')
                                <span class="text-danger animated fadeIn">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 "></div>
                            <div class="col-sm-8 form-group">
                                <div class="custom-control custom-switch custom-control-primary mb-1">
                                    <input type="checkbox" class="custom-control-input" id="active" name="active"
                                        {{$patient->active == 1? 'checked' : ''}} >
                                    <label class="custom-control-label" for="active">Active</label>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-4 col-xl-4">
                        <div class="form-group">
                            <div class="slim" data-label="Drop your avatar here" data-fetcher="fetch.php" data-size="600,600" data-ratio="1:1" data-rotate-button="true" accept="image/jpeg, image/gif, image/png">
                                @if ( $patient->getFirstMedia('patient_photo'))
                                    <img src="{{$patient->getFirstMediaUrl('patient_photo')}}" />
                                @endif
                                <input name="photo" type="file"/>
                            </div>
                        </div>
                    </div>

                </div>

                {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
                <a class="btn btn-alt-secondary float-right" href="{{route('admin.patient_managements.patients.index')}}">Cancel</a>
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

    <script src="{{asset('js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('js/plugins/flatpickr/flatpickr.min.js')}}"></script>

    <!-- Bootstrap Input file -->
    <script src="{{asset('js/plugins/slim-image-cropper/slim.kickstart.min.js')}}" crossorigin="anonymous"></script>

    <script>
        jQuery(function () {

            $('#age').focusout(function () {
                var val = parseInt($(this).val());
                $dob="{{Carbon\Carbon::now()->subYears((int)" + val + ")->format(config('panel.date_format'))}}";
                $('#dob').val($dob);
            });

            $('#dob').focusout(function () {

            });

            One.helpers(['flatpickr', 'datepicker'])
            One.helpers("validation"), jQuery(".js-validation").validate({
                    ignore: [], rules: {
                        "name": {
                            required: !0
                        },
                        "name_kh": {
                            required: !0
                        }
                    }
                    , messages: {
                        "name": {
                            required: "Please provide a department name",
                        },
                        "name_kh": {
                            required: "Please provide a department name in Khmer",
                        }
                    }
                }
            )
        });

    </script>

@endsection
