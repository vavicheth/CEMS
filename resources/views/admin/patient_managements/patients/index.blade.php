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
                <h3 class="block-title">Patient List</h3>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Patient Management</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="">Patient List</a>
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="block-header">
                @can('patient_create')
                    <a type="button" href="{{route('admin.patient_managements.patients.create')}}" class="btn btn-sm btn-primary">Add
                    New</a>
                @endcan

                @can('patient_delete')
                    <div class="dropdown">
                        <button type="button" class="btn btn-sm {{ request('trash') == 1 ? 'btn-danger':'btn-primary' }}  dropdown-toggle" id="dropdown-default-primary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ request('trash') == 1 ? 'Trash':'Show All' }}
                        </button>
                        <div class="dropdown-menu font-size-sm primary" aria-labelledby="dropdown-default-primary">
                            <a class="dropdown-item" href="{{ route('admin.patient_managements.patients.index') }}?show_all=1"><i class="fa fa-list-alt"></i> Show All</a>
                            <a class="dropdown-item" href="{{ route('admin.patient_managements.patients.index') }}?trash=1"><i class="fa fa-trash-alt"></i> Trash</a>
                        </div>
                    </div>
                @endcan

            </div>
            <div class="block-content block-content-full">
                <table class="table table-striped table-hover table-vcenter dt-responsive table-vcenter js-dataTable"
                       id="datatable_patient" style="border-collapse: collapse;border-spacing: 0;width: 100%">
                    <thead>
                    <tr>
                        <th >Name</th>
                        <th >Name Khmer</th>
                        <th >Gender</th>
                        <th >DOB</th>
                        <th >ID Card</th>
                        <th >Address</th>
                        <th >Active</th>
                        <th style="width: 15%;">Action</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
        <!-- END Dynamic Table with Export Buttons -->


        <!-- Modal delete data -->
        <div class="modal" id="modal-confirm-delete" tabindex="-1" role="dialog" aria-labelledby="modal-block-popin"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-danger">
                            <h3 class="block-title">Confirmation</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content font-size-sm">
                            Are you sure to delete {{ request('trash') == 1 ? 'permanently':'' }} this department?
                        </div>
                        <div class="block-content block-content-full text-right border-top">
                            <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal" id="ok_button"><i
                                        class="fa fa-trash-alt mr-1"></i>Delete
                            </button>
                            <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Modal delete data -->


        <!-- Modal restore data -->
        <div class="modal" id="modal-confirm-restore" tabindex="-1" role="dialog" aria-labelledby="modal-block-popin"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-success">
                            <h3 class="block-title">Confirmation Restore</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content font-size-sm">
                            Are you sure to restore this department?
                        </div>
                        <div class="block-content block-content-full text-right border-top">
                            <button type="button" class="btn btn-sm btn-success" data-dismiss="modal" id="restore_button"><i
                                        class="fa fa-backward mr-1"></i>Restore
                            </button>
                            <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Modal restore data -->


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

            $('#datatable_patient').DataTable({
                processing: true,
                serverSide: true,
                paging: 100,
                searching: true,
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
                language : {
                    processing: "<div class='spinner-border text-primary' role='status'><span class='sr-only'>Loading...</span></div>"
                },
                columns: [
                    {data: 'name', name: 'name'},
                    {data: 'name_kh', name: 'name_kh'},
                    {data: 'gender', name: 'gender'},
                    {data: 'dob', name: 'dob'},
                    {data: 'id_card', name: 'id_card'},
                    {data: 'address', name: 'address'},
                    {data: 'active', name: 'active'},
                    {data: 'action', name: 'action', orderable: false},
                ],
                // order: [[8, 'desc']]
            });


            var patient_id;

            //Delete function
            $(document).on('click', '.delete', function () {
                patient_id = $(this).attr('id');
                $('#modal-confirm-delete').modal('show');
            });
            $('#ok_button').click(function () {
                $.ajax({
                    data: {
                        "id": patient_id,
                        "_token": "{{ csrf_token() }}",
                    },
                    url: "patients/{{ request('trash') == 1 ? 'per_del/':'' }}" + patient_id,
                    type: 'DELETE',
                    success: function (data) {
                        $('#modal-confirm-delete').modal('hide');
                        $('#datatable_patient').DataTable().ajax.reload();
                        One.helpers('notify', {type: 'success', icon: 'fa fa-check mr-1', message: data});
                    },
                    error: function () {
                        One.helpers('notify', {
                            type: 'danger',
                            icon: 'fa fa-times mr-1',
                            message: "{{__('patient.patient_delete_error')}}"
                        });
                    }
                })
            })

            //Restore function
            $(document).on('click', '.restore', function () {
                patient_id = $(this).attr('id');
                $('#modal-confirm-restore').modal('show');
            });
            $('#restore_button').click(function () {
                $.ajax({
                    data: {
                        "id": patient_id,
                        "_token": "{{ csrf_token() }}",
                    },
                    url: "patients/restore/" + patient_id,
                    type: 'POST',
                    success: function (data) {
                        $('#modal-confirm-restore').modal('hide');
                        $('#datatable_patient').DataTable().ajax.reload();
                        One.helpers('notify', {type: 'success', icon: 'fa fa-check mr-1', message: data});
                    },
                    error: function () {
                        One.helpers('notify', {
                            type: 'danger',
                            icon: 'fa fa-times mr-1',
                            message: "{{__('patient.patient_restore_error')}}"
                        });
                    }
                })
            })

        });

    </script>

@endsection
