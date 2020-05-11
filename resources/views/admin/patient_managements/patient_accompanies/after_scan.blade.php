@extends('layouts.backend')

@section('css_before')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css') }}">

    <!-- Responsive datatable examples -->
    <link href="{{ URL::asset('js/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet"
          type="text/css"/>

    <!-- Slim Image Cropper file CSS -->
    <link href="{{asset('js/plugins/slim-image-cropper/slim.min.css')}}" rel="stylesheet" type="text/css"/>

    <link href="{{asset('js/plugins/magnific-popup/magnific-popup.css')}}" rel="stylesheet" type="text/css"/>

@endsection

@section('content')

    <!-- Page Content -->
    <div class="content">

        <!-- Dynamic Table with Export Buttons -->
        <div class="block">
{{--            <div class="block-header">--}}
{{--                <h3 class="block-title">Patient Information</h3>--}}
{{--                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">--}}
{{--                    <ol class="breadcrumb breadcrumb-alt">--}}
{{--                        <li class="breadcrumb-item">Patient Management</li>--}}
{{--                        <li class="breadcrumb-item" aria-current="page">--}}
{{--                            <a class="link-fx" href="">Patient Information</a>--}}
{{--                        </li>--}}
{{--                    </ol>--}}
{{--                </nav>--}}
{{--            </div>--}}

            <div class="block-content block-content-full">

                <div class="row">
                    <div class="col-lg-10 col-xl-5">
                        <div class="table-responsive">

                            <table class="js-table-sections table table-hover table-vcenter">
                                <tbody class="js-table-sections-header table-active">
                                <tr class="bg-info text-white">
                                    <td class="text-center">
                                        <i class="fa fa-angle-right text-muted"></i>
                                    </td>
                                    <td class="font-w600 font-size-sm">
                                        <div class="py-1">
                                            {{$patient_accompany->patient->name}}
                                        </div>
                                    </td>
                                    <td>{{$patient_accompany->patient->name_kh}}</td>
                                </tr>
                                </tbody>
                                <tbody class="font-size-sm">
                                <tr>
                                    <td></td>
                                    <td class="font-w600 text-left">HN</td>
                                    <td>{{$patient_accompany->patient->hn}}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class="font-w600 text-left ">Gender</td>
                                    <td>{{$patient_accompany->patient->gender}}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class="font-w600 text-left ">DOB</td>
                                    <td>{{$patient_accompany->patient->dob}}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class="font-w600 text-left ">Address</td>
                                    <td>{{$patient_accompany->patient->address}}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class="font-w600 text-left ">Phone</td>
                                    <td>{{$patient_accompany->patient->phone}}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class="font-w600 text-left ">Description</td>
                                    <td>{{$patient_accompany->patient->description}}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class="font-w600 text-left ">Status</td>
                                    <td>
                                        <div class="custom-control custom-checkbox custom-control-primary custom-control-lg mb-1">
                                            <input type="checkbox" class="custom-control-input" name="active_user" disabled {{$patient_accompany->patient->active == 1? 'checked' : ''}} >
                                            <label class="custom-control-label" for="active_user">{{$patient_accompany->patient->active == 1? 'In Hospital' : 'Discharge'}}</label>
                                        </div>
                                    </td>
                                </tr>

                                </tbody>
                            </table>

                        </div>

                    </div>

                    <div class="col-lg-4 col-xl-4">
                        <div class="row items-push js-gallery img-fluid-100">
                            <a class="img-link img-link-simple img-link-zoom-in img-lightbox" href="{{asset($patient_accompany->patient->getFirstMediaUrl('patient_photo') )}}">
                                <img href="" class="img-fluid" src="{{asset($patient_accompany->patient->getFirstMediaUrl('patient_photo') )}}" alt="">
                            </a>
                        </div>
                    </div>

                </div>




            </div>


        </div>

        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">អ្នកកំដរ</h3>
            </div>
            <div class="block-content">

                <table class="table table-vcenter dt-responsive table-vcenter">
                    <tbody>
                    @foreach($patient->patient_accompanies as $patient_accompany)
                        @if($patient_accompany->status ==1)
                            <tr class="bg-warning-light">
                        @elseif($patient_accompany->status==2)
                            <tr class="bg-danger-light">
                        @else
                            <tr class="bg-info-light">
                        @endif

                        <td class="text-center">
                            <button class="btn btn-sm btn-square btn-info m-1" onclick="saveData({{$patient_accompany->id}})"><i class="fa fa-file-import"></i> ចូលបរិវេណ </button><br>
                            <button class="btn btn-sm btn-square btn-warning m-1"><i class="fa fa-file-export"></i>​ចេញបរិវេណ</button><br>
                            <button class="btn btn-sm btn-square btn-info m-1"><i class="fa fa-file-import"></i> ចូលបន្ទប់ជំងឺ</button><br>
                            <button class="btn btn-sm btn-square btn-warning m-1"><i class="fa fa-file-export"></i>​ចេញបន្ទប់ជំងឺ</button>
                        </td>
                        <td>
                            <div class="row items-push js-gallery img-fluid-100">
                                <a style="width: 150px" class="img-link img-link-simple img-link-zoom-in img-lightbox" href="{{asset($patient_accompany->getFirstMediaUrl('patient_accompany') )}}">
                                    <img href="" class="img-fluid" src="{{asset($patient_accompany->getFirstMediaUrl('patient_accompany') )}}" alt="">
                                </a>
                            </div>
                            <div class="text-center mt-1">
                                <h5>{{$patient_accompany->name}}</h5>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>


            <div class="row">
                <a class="btn btn-secondary float-right" href="{{route('admin.patient_managements.patients.index')}}">Back</a>
            </div>


    </div>
    <!-- END Page Content -->
@endsection

@section('js_after')
    <!-- Page JS Plugins -->
    <script src="{{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/buttons/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/buttons/buttons.print.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/buttons/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/buttons/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/buttons/buttons.colVis.min.js') }}"></script>

    <!-- Page JS Code -->
    <script src="{{ asset('js/pages/tables_datatables.js') }}"></script>

    <!-- Responsive examples -->
    <script src="{{ URL::asset('js/plugins/datatables/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('js/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>

    <!-- Bootstrap Input file -->
    <script src="{{asset('js/plugins/slim-image-cropper/slim.kickstart.min.js')}}" crossorigin="anonymous"></script>

    <script src="{{asset('js/plugins/magnific-popup/jquery.magnific-popup.min.js')}}" crossorigin="anonymous"></script>

    <script>
        jQuery(function () {
            One.helpers(['table-tools-sections','magnific-popup']);
        });

        function saveData($id) {
            alert($id);
        }

    </script>

@endsection
