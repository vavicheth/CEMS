@extends('layouts.backend')

@section('title')
    | {{__('pharmacy.supplier_list')}}
@endsection

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
                <h3 class="block-title">{{__('pharmacy.supplier_list')}}</h3>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">{{__('pharmacy.pharmacy')}}</li>
                        <li class="breadcrumb-item">{{__('pharmacy.configurations')}}</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="">{{__('pharmacy.supplier_list')}}</a>
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="block-header">
                @can('ph_donor_create')
                    <a href="{{route('admin.pharmacy.suppliers.create')}}" class="btn btn-sm btn-primary">{{__('general.add_new')}}</a>
                @endcan

                @can('ph_donor_delete')
                    <div class="dropdown">
                        <button type="button" class="btn btn-sm {{ request('trash') == 1 ? 'btn-danger':'btn-primary' }}  dropdown-toggle" id="dropdown-default-primary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ request('trash') == 1 ? __('general.trash'): __('general.show_all') }}
                        </button>
                        <div class="dropdown-menu font-size-sm primary" aria-labelledby="dropdown-default-primary">
                            <a class="dropdown-item" href="{{ route('admin.pharmacy.suppliers.index') }}?show_all=1"><i class="fa fa-list-alt"></i> {{__('general.show_all')}}</a>
                            <a class="dropdown-item" href="{{ route('admin.pharmacy.suppliers.index') }}?trash=1"><i class="fa fa-trash-alt"></i> {{__('general.trash')}}</a>
                        </div>
                    </div>
                @endcan

            </div>
            <div class="block-content block-content-full">
                <table class="table table-striped table-hover table-vcenter dt-responsive table-vcenter js-dataTable"
{{--                <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons"--}}
                       id="datatable_ph_supplier" style="border-collapse: collapse;border-spacing: 0;width: 100%">
                    <thead>
                    <tr>
                        <th >{{__('pharmacy.donor')}}</th>
                        <th >{{__('pharmacy.supplier_name')}}</th>
                        <th >{{__('pharmacy.supplier_abbreviation')}}</th>
                        <th >{{__('pharmacy.supplier_contact_name')}}</th>
                        <th >{{__('pharmacy.supplier_phone')}}</th>
                        <th >{{__('pharmacy.supplier_address')}}</th>
                        <th >{{__('pharmacy.supplier_email')}}</th>
                        <th >{{__('pharmacy.supplier_website')}}</th>
                        <th >{{__('pharmacy.supplier_country')}}</th>
                        <th >{{__('pharmacy.supplier_description')}}</th>
                        <th >{{__('pharmacy.supplier_status')}}</th>
                        <th style="width: 15%;">{{__('pharmacy.supplier_action')}}</th>
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
                            <h3 class="block-title">{{__('general.confirmation')}}</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content font-size-sm">
                            {{ request('trash') == 1 ? __('general.confirm_delete_permanently') : __('general.confirm_delete') }}
                        </div>
                        <div class="block-content block-content-full text-right border-top">
                            <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal" id="ok_button"><i
                                        class="fa fa-trash-alt mr-1"></i>{{__('general.delete')}}
                            </button>
                            <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">{{__('general.close')}}</button>
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
                            <h3 class="block-title">{{__('general.confirmation_restore')}}</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content font-size-sm">
                            {{__('general.confirm_restore')}}
                        </div>
                        <div class="block-content block-content-full text-right border-top">
                            <button type="button" class="btn btn-sm btn-success" data-dismiss="modal" id="restore_button"><i
                                        class="fa fa-backward mr-1"></i>{{__('general.restore')}}
                            </button>
                            <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">{{__('general.close')}}</button>

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

    <script>
        $(document).ready(function () {

            $('#datatable_ph_supplier').DataTable({
                processing: true,
                serverSide: true,
                paging: 100,
                searching: true,

                // dom: 'Bfrtip',
                // buttons: [
                //     'colvis',
                //     'excel',
                //     'print'
                // ],
                ajax: {
                    url: "{{route('admin.pharmacy.suppliers.index')}}{{ request('trash') == 1 ? '?trash=1':'' }}",
                },
                columns: [
                    {data: 'donor', name: 'donor.name'},
                    {data: 'name', name: 'name'},
                    {data: 'abr', name: 'abr'},
                    {data: 'contact_name', name: 'contact_name'},
                    {data: 'phone', name: 'phone'},
                    {data: 'address', name: 'address'},
                    {data: 'email', name: 'email'},
                    {data: 'website', name: 'website'},
                    {data: 'country', name: 'country'},
                    {data: 'description', name: 'description'},
                    {data: 'active', name: 'active'},
                    {data: 'action', name: 'action', orderable: false},
                    {data: 'created_at', name: 'created_at',visible:false},
                ],
                // order: [[8, 'desc']]

            });

            var donor_id;

            //Delete function
            $(document).on('click', '.delete', function () {
                department_id = $(this).attr('id');
                $('#modal-confirm-delete').modal('show');
            });
            $('#ok_button').click(function () {
                $.ajax({
                    data: {
                        "id": donor_id,
                        "_token": "{{ csrf_token() }}",
                    },
                    url: "suppliers/{{ request('trash') == 1 ? 'per_del/':'' }}" + department_id,
                    type: 'DELETE',
                    success: function (data) {
                        $('#modal-confirm-delete').modal('hide');
                        $('#datatable_ph_supplier').DataTable().ajax.reload();
                        One.helpers('notify', {type: 'success', icon: 'fa fa-check mr-1', message: data});
                    },
                    error: function () {
                        One.helpers('notify', {
                            type: 'danger',
                            icon: 'fa fa-times mr-1',
                            message: "{{__('pharmacy.supplier_delete_error')}}"
                        });
                    }
                })
            })

            //Restore function
            $(document).on('click', '.restore', function () {
                department_id = $(this).attr('id');
                $('#modal-confirm-restore').modal('show');
            });
            $('#restore_button').click(function () {
                $.ajax({
                    data: {
                        "id": department_id,
                        "_token": "{{ csrf_token() }}",
                    },
                    url: "suppliers/restore/" + department_id,
                    type: 'POST',
                    success: function (data) {
                        $('#modal-confirm-restore').modal('hide');
                        $('#datatable_ph_supplier').DataTable().ajax.reload();
                        One.helpers('notify', {type: 'success', icon: 'fa fa-check mr-1', message: data});
                    },
                    error: function () {
                        One.helpers('notify', {
                            type: 'danger',
                            icon: 'fa fa-times mr-1',
                            message: "{{__('pharmacy.supplier_restore_error')}}"
                        });
                    }
                })
            })

        });
    </script>
@endsection
