@extends('layouts.backend')

@section('css_before')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css') }}">

    <!-- Responsive datatable examples -->
    <link href="{{ URL::asset('js/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet"
          type="text/css"/>

@endsection

@section('content')

    <!-- Page Content -->
    <div class="content">

        <!-- Dynamic Table with Export Buttons -->
        <div class="block">
            <div class="block-header">
                <h3 class="block-title">Patient Information</h3>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Patient Management</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="">Patient Information</a>
                        </li>
                    </ol>
                </nav>
            </div>

            <div class="block-content block-content-full">

                <div class="row">
                    <div class="col-lg-10 col-xl-5">
                        <div class="table-responsive">

                            <table class="js-table-sections table table-hover table-vcenter">
                                <tbody class="js-table-sections-header table-active">
                                <tr>
                                    <td class="text-center">
                                        <i class="fa fa-angle-right text-muted"></i>
                                    </td>
                                    <td class="font-w600 font-size-sm">
                                        <div class="py-1">
                                            {{$patient->name}}
                                        </div>
                                    </td>
                                    <td>{{$patient->name_kh}}</td>
                                </tr>
                                </tbody>
                                <tbody class="font-size-sm">
                                <tr>
                                    <td></td>
                                    <td class="font-w600 text-left">Name Khmer</td>
                                    <td>{{$patient->hn}}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class="font-w600 text-left ">Gender</td>
                                    <td>{{$patient->gender}}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class="font-w600 text-left ">DOB</td>
                                    <td>{{$patient->dob}}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class="font-w600 text-left ">Address</td>
                                    <td>{{$patient->address}}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class="font-w600 text-left ">Phone</td>
                                    <td>{{$patient->phone}}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class="font-w600 text-left ">Description</td>
                                    <td>{{$patient->description}}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class="font-w600 text-left ">DOB</td>
                                    <td>
                                        <div class="custom-control custom-checkbox custom-control-primary custom-control-lg mb-1">
                                            <input type="checkbox" class="custom-control-input" name="active_user" disabled {{$patient->active == 1? 'checked' : ''}} >
                                            <label class="custom-control-label" for="active_user">{{$patient->active == 1? 'Activated' : 'Inactive'}}</label>
                                        </div>
                                    </td>
                                </tr>

                                </tbody>
                            </table>

                        </div>

                    </div>

                    <div class="col-lg-4 col-xl-4 mb-2">
                        <img width="100%" src="{{$patient->getFirstMediaUrl('patient_photo')}}" alt="">
                    </div>

                </div>

                <div class="row">
                    <div class="col-lg-12">
                    <!-- Block Tabs Animated Fade -->
                    <div class="block">
                        <ul class="nav nav-tabs nav-tabs-block" data-toggle="tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active btn-alt-secondary" href="#tab_patient_accompany">Patient Accompany</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn-alt-secondary" href="#tab_stay">Stay</a>
                            </li>
{{--                            <li class="nav-item ml-auto">--}}
{{--                                <a class="nav-link" href="#btabs-animated-fade-settings">--}}
{{--                                    <i class="si si-settings"></i>--}}
{{--                                </a>--}}
{{--                            </li>--}}
                        </ul>
                        <div class="block-content tab-content overflow-hidden">
                            <div class="tab-pane animated fadeInUp show active" id="tab_patient_accompany" role="tabpanel">
                                <table class="table table-striped table-hover table-vcenter dt-responsive table-vcenter js-dataTable"
                                       id="datatable_patient_accompany" style="border-collapse: collapse;border-spacing: 0;width: 100%">
                                    <thead>
                                    <tr>
                                        <th >Name</th>
                                        <th >Name Khmer</th>
                                        <th class="d-none d-sm-table-cell">Gender</th>
                                        <th >DOB</th>
                                        <th >Address</th>
                                        <th >Active</th>
                                        <th style="width: 15%;">Action</th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                            <div class="tab-pane animated fadeInUp" id="tab_stay" role="tabpanel">
                                <h4 class="font-w400">Profile Content</h4>
                                <p>Content fades in..</p>
                            </div>
{{--                            <div class="tab-pane fade" id="btabs-animated-fade-settings" role="tabpanel">--}}
{{--                                <h4 class="font-w400">Settings Content</h4>--}}
{{--                                <p>Content fades in..</p>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                    <!-- END Block Tabs Animated Fade -->
                    </div>
                </div>

                <div class="row mt-2">
                    <a class="btn btn-secondary float-right" href="{{route('admin.patient_managements.patients.index')}}">Back</a>
                </div>
            </div>


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

    <script>
        jQuery(function () {
            One.helpers(['table-tools-sections']);

            $('#datatable_patient_accompany').DataTable({
                processing: true,
                serverSide: true,
                paging: false,
                searching: false,
                // dom: 'Bfrtip',
                // buttons: [
                //     'copyHtml5',
                //     'excelHtml5',
                //     'csvHtml5',
                //     'pdfHtml5',
                // ],
                ajax: {
                    url: "{{route('admin.patient_managements.patients.index')}}{{ request('trash') == 1 ? '?trash=1':'' }}",
                },
                columns: [
                    {data: 'name', name: 'name'},
                    {data: 'name_kh', name: 'name_kh'},
                    {data: 'gender', name: 'gender'},
                    {data: 'dob', name: 'dob'},
                    {data: 'address', name: 'address'},
                    {data: 'active', name: 'active'},
                    {data: 'action', name: 'action', orderable: false},
                ],
                // order: [[8, 'desc']]
            });


        });
    </script>

@endsection
