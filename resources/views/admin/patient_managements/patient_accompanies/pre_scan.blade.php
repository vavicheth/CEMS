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
                <h3 class="block-title">Patient Accompany Checking</h3>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
{{--                    <ol class="breadcrumb breadcrumb-alt">--}}
{{--                        <li class="breadcrumb-item">Patient Management</li>--}}
{{--                        <li class="breadcrumb-item" aria-current="page">--}}
{{--                            <a class="link-fx" href="">Patient List</a>--}}
{{--                        </li>--}}
{{--                    </ol>--}}
                </nav>
            </div>
            <div class="block-header">
{{--                @can('patient_create')--}}
{{--                    <a type="button" href="{{route('admin.patient_managements.patients.create')}}" class="btn btn-sm btn-primary">Add--}}
{{--                        New</a>--}}
{{--                @endcan--}}

{{--                @can('patient_delete')--}}
{{--                    <div class="dropdown">--}}
{{--                        <button type="button" class="btn btn-sm {{ request('trash') == 1 ? 'btn-danger':'btn-primary' }}  dropdown-toggle" id="dropdown-default-primary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                            {{ request('trash') == 1 ? 'Trash':'Show All' }}--}}
{{--                        </button>--}}
{{--                        <div class="dropdown-menu font-size-sm primary" aria-labelledby="dropdown-default-primary">--}}
{{--                            <a class="dropdown-item" href="{{ route('admin.patient_managements.patients.index') }}?show_all=1"><i class="fa fa-list-alt"></i> Show All</a>--}}
{{--                            <a class="dropdown-item" href="{{ route('admin.patient_managements.patients.index') }}?trash=1"><i class="fa fa-trash-alt"></i> Trash</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endcan--}}

            </div>
            <div class="block-content block-content-full text-center">
                <a href="{{route('admin.patient_managements.patient_accompanies.scan_qr')}}" class="btn btn-success"><i class="fa fa-qrcode"></i> Scan QRCode</a>
            </div>

            <div class="block-content block-content-full text-center">
                <img width="150px" src="{{asset('media/photos/checkpoint.png')}}" alt="" />
            </div>
        </div>
        <!-- END Dynamic Table with Export Buttons -->





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


    <!-- Page JS Helpers (BS Notify Plugin) -->
    <script>

        $(document).ready(function () {

        });

    </script>

@endsection
