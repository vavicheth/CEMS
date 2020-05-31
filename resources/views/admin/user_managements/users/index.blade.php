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
    <!-- Hero -->
    {{--    <div class="bg-body-light">--}}
    {{--        <div class="content content-full">--}}
    {{--            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">--}}
    {{--                <h1 class="flex-sm-fill h3 my-2">--}}
    {{--                    UI--}}
    {{--                                        <small--}}
    {{--                                                class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted">Setting--}}
    {{--                                        </small>--}}
    {{--                </h1>--}}
    {{--                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">--}}
    {{--                    <ol class="breadcrumb breadcrumb-alt">--}}
    {{--                        <li class="breadcrumb-item">User Managements</li>--}}
    {{--                        <li class="breadcrumb-item" aria-current="page">--}}
    {{--                            <a class="link-fx" href="">Users</a>--}}
    {{--                        </li>--}}
    {{--                    </ol>--}}
    {{--                </nav>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">

        <!-- Dynamic Table with Export Buttons -->
        <div class="block">
            <div class="block-header">
                <h3 class="block-title">Users Table</h3>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">User Managements</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="">Users</a>
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="block-header">
                @can('user_create')
                    <a type="button" href="{{route('admin.user_managements.users.create')}}" class="btn btn-sm btn-primary">Add
                        New</a>
                @endcan

                @can('user_delete')
                    <div class="dropdown">
                        <button type="button" class="btn btn-sm {{ request('trash') == 1 ? 'btn-danger':'btn-primary' }}  dropdown-toggle" id="dropdown-default-primary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ request('trash') == 1 ? 'Trash':'Show All' }}
                        </button>
                        <div class="dropdown-menu font-size-sm primary" aria-labelledby="dropdown-default-primary">
                            <a class="dropdown-item" href="{{ route('admin.user_managements.users.index') }}?show_all=1"><i class="fa fa-list-alt"></i> Show All</a>
                            <a class="dropdown-item" href="{{ route('admin.user_managements.users.index') }}?trash=1"><i class="fa fa-trash-alt"></i> Trash</a>
                        </div>
                    </div>
                @endcan
            </div>
            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/tables_datatables.js -->
                {{--                <table class="table table-bordered table-striped table-vcenter js-dataTable" id="datatable_user" style="border-collapse: collapse;border-spacing: 0;width: 100%">--}}
                <table class="table table-striped table-hover table-vcenter dt-responsive table-vcenter js-dataTable"
                       id="datatable_user" style="border-collapse: collapse;border-spacing: 0;width: 100%">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Roles</th>
                        <th >Active</th>
                        <th style="width: 15%;">Action</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
        <!-- END Dynamic Table with Export Buttons -->


        <!-- Modal delete -->
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
                            Are you sure to delete this user?
                        </div>
                        <div class="block-content block-content-full text-right border-top">
                            <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal" id="ok_button"><i class="fa fa-trash-alt mr-1"></i>Delete</button>
                            <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END model delete -->

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
                            Are you sure to restore this permission?
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

            $('#datatable_user').DataTable({
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
                    url: "{{route('admin.user_managements.users.index')}}{{ request('trash') == 1 ? '?trash=1':'' }}",
                },
                columns: [
                    {data: 'name', name: 'name'},
                    {data: 'username', name: 'username'},
                    {data: 'email', name: 'email'},
                    {data: 'roles', name: 'roles'},
                    // {data: 'bed', name: 'bed'},
                    // {data: 'description', name: 'description'},
                    {data: 'active', name: 'active'},
                    {data: 'action', name: 'action', orderable: false},
                    // {data: 'created_at', name: 'created_at', visible:true},
                ],
                // order: [[8, 'desc']]
            });


            var user_id;
            //Delete function
            $(document).on('click', '.delete', function () {
                user_id = $(this).attr('id');
                $('#modal-confirm-delete').modal('show');
            });
            $('#ok_button').click(function () {
                $.ajax({
                    data: {
                        "id": user_id,
                        "_token": "{{ csrf_token() }}",
                    },
                    url: "users/{{ request('trash') == 1 ? 'per_del/':'' }}" + user_id,
                    type: 'DELETE',
                    success: function (data) {
                        $('#modal-confirm-delete').modal('hide');
                        $('#datatable_user').DataTable().ajax.reload();
                        One.helpers('notify', {type: 'success', icon: 'fa fa-check mr-1', message: data});
                    },
                    error: function () {
                        One.helpers('notify', {
                            type: 'danger',
                            icon: 'fa fa-times mr-1',
                            message: "{{__('user.user_delete_error')}}"
                        });
                    }
                })
            })

            //Restore function
            $(document).on('click', '.restore', function () {
                user_id = $(this).attr('id');
                $('#modal-confirm-restore').modal('show');
            });
            $('#restore_button').click(function () {
                $.ajax({
                    data: {
                        "id": user_id,
                        "_token": "{{ csrf_token() }}",
                    },
                    url: "users/restore/" + user_id,
                    type: 'POST',
                    success: function (data) {
                        $('#modal-confirm-restore').modal('hide');
                        $('#datatable_user').DataTable().ajax.reload();
                        One.helpers('notify', {type: 'success', icon: 'fa fa-check mr-1', message: data});
                    },
                    error: function () {
                        One.helpers('notify', {
                            type: 'danger',
                            icon: 'fa fa-times mr-1',
                            message: "{{__('user.user_restore_error')}}"
                        });
                    }
                })
            })

        });

    </script>

@endsection
