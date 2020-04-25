@extends('layouts.backend')

@section('css_before')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css') }}">

    <!-- Responsive datatable examples -->
    <link href="{{ URL::asset('js/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
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
            <a type="button" href="{{route('admin.user_managements.users.create')}}" class="btn btn-sm btn-primary">Add New</a>
            </div>
            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/tables_datatables.js -->
{{--                <table class="table table-bordered table-striped table-vcenter js-dataTable" id="datatable_user" style="border-collapse: collapse;border-spacing: 0;width: 100%">--}}
                <table class="table table-bordered table-striped dt-responsive nowrap table-vcenter js-dataTable" id="datatable_user" style="border-collapse: collapse;border-spacing: 0;width: 100%">
                    <thead>
                    <tr>
{{--                        <th class="text-center" style="width: 80px;">#</th>--}}
                        <th>Name</th>
                        <th>Username</th>
                        <th class="d-none d-sm-table-cell" style="width: 30%;">Email</th>
                        <th>Active</th>
                        <th style="width: 15%;">Action</th>
                    </tr>
                    </thead>
                </table>
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

            $('#datatable_user').DataTable({
                processing: true,
                serverSide: true,
                paging: 100,
                searching: true,
                // dom: 'Bfrtip',
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5',
                ],
                ajax: {
                    url: "{{route('admin.user_managements.users.index')}}",
                },
                columns: [
                    {data: 'name', name: 'name'},
                    {data: 'username', name: 'username'},
                    {data: 'email', name: 'email'},
                    // {data: 'abr_kh', name: 'abr_kh'},
                    // {data: 'bed', name: 'bed'},
                    // {data: 'description', name: 'description'},
                    {data: 'active', name: 'active'},
                    {data: 'action', name: 'action', orderable: false},
                    // {data: 'created_at', name: 'created_at', visible:true},

                ],
                // order: [[8, 'desc']]

            });


            {{--$('#department_form').on('submit',function (event) {--}}
            {{--    event.preventDefault();--}}
            {{--    var action_url="{{route('departments.store')}}";--}}
            {{--    $.ajax({--}}
            {{--        url:action_url,--}}
            {{--        method:"POST",--}}
            {{--        data:$(this).serialize(),--}}
            {{--        dataType:"json",--}}
            {{--        success:function (data) {--}}
            {{--            var html='';--}}
            {{--            if(data.errors)--}}
            {{--            {--}}
            {{--                html='<div class="alert alert-danger">';--}}
            {{--                for(var count=0; count <data.errors.length; count++)--}}
            {{--                {--}}
            {{--                    html += '<p>' + data.errors[count] + '</p>';--}}
            {{--                }--}}
            {{--                html +='</div>';--}}

            {{--            }--}}

            {{--            if(data.success)--}}
            {{--            {--}}
            {{--                html='<div class="alert alert-success">' + data.success + '</div>';--}}

            {{--                $('#datatable_department').DataTable().ajax.reload();--}}
            {{--                $('#department_form')[0].reset();--}}
            {{--                $('#createModalForm').modal('hide');--}}
            {{--                $.toast({--}}
            {{--                    heading: 'Successful',--}}
            {{--                    text: data.success,--}}
            {{--                    icon: 'success',--}}
            {{--                    loader: true,        // Change it to false to disable loader--}}
            {{--                    loaderBg: '#9EC600',  // To change the background--}}
            {{--                    position:'top-right'--}}
            {{--                });--}}
            {{--            }--}}


            {{--        }--}}
            {{--    });--}}
            {{--});--}}



        });

    </script>

@endsection
