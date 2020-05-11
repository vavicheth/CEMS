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
                                <tr class="bg-info text-white">
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
                                    <td class="font-w600 text-left">HN</td>
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
                                    <td class="font-w600 text-left ">Status</td>
                                    <td>
                                        <div class="custom-control custom-checkbox custom-control-primary custom-control-lg mb-1">
                                            <input type="checkbox" class="custom-control-input" name="active_user" disabled {{$patient->active == 1? 'checked' : ''}} >
                                            <label class="custom-control-label" for="active_user">{{$patient->active == 1? 'In Hospital' : 'Discharge'}}</label>
                                        </div>
                                    </td>
                                </tr>

                                </tbody>
                            </table>

                        </div>

                    </div>

                    <div class="col-lg-4 col-xl-4 mb-2">
                        <div class="row items-push js-gallery img-fluid-100">
                            <a class="img-link img-link-simple img-link-zoom-in img-lightbox" href="{{asset($patient->getFirstMediaUrl('patient_photo') )}}">
                                <img href="" class="img-fluid" src="{{asset($patient->getFirstMediaUrl('patient_photo') )}}" alt="">
                            </a>
                        </div>
                    </div>

                </div>
                <a href="{{route('admin.patient_managements.patients.print_qr',$patient->id)}}" target="_blank" class="btn btn-success mb-3"><i class="fa fa-print"></i> Print QR Code</a>

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
                                @can('patient_accompany_create')
                                    <button type="button" class="btn btn-sm btn-primary" id="btn-new">Add New</button>
                                @endcan
                                @can('patient_accompany_delete')
                                    <div class="dropdown float-right">
                                        <button type="button" class="btn btn-sm btn-primary dropdown-toggle" id="dropdown-default-primary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            {{ request('trash') == 1 ? 'Trash':'Show All' }}
                                        </button>
                                        <div class="dropdown-menu font-size-sm primary" aria-labelledby="dropdown-default-primary">
                                            <button class="dropdown-item" id="btn-show-all"><i class="fa fa-list-alt"></i> Show All</button>
                                            <button class="dropdown-item" id="btn-show-trash"><i class="fa fa-trash-alt"></i> Trash</button>
                                        </div>
                                    </div>
                                @endcan
                                <table class="table table-striped table-hover table-vcenter dt-responsive table-vcenter js-dataTable"
                                       id="datatable_patient_accompany" style="border-collapse: collapse;border-spacing: 0;width: 100%">
                                    <thead>
                                    <tr>
                                        <th class="td-name" >Name</th>
                                        <th >Photo</th>
                                        <th class="td-gender">Gender</th>
                                        <th class="td-phone">Phone</th>
                                        <th class="td-description">Description</th>
                                        <th class="td-phone">Status</th>
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


            <!-- Modal Create -->
            <div class="modal" id="modal-create" tabindex="-1" role="dialog" aria-labelledby="modal-block-vcenter" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="block block-themed block-transparent mb-0">
                            <div class="block-header bg-primary">
                                <h3 class="block-title">Create Patient Accompany</h3>
                                <div class="block-options">
                                    <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                        <i class="fa fa-fw fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            {!! Form::open(['class'=>'js-validation','id'=>'form_patient_accompany', 'files' => true]) !!}
{{--                            {!! Form::open(['method' => 'POST', 'route' => ['admin.patient_managements.patient_accompanies.store'],'class'=>'js-validation', 'files' => true]) !!}--}}
                            <div class="block-content font-size-sm">
                                @csrf
                                <input id="patient_id" name="patient_id" value="{{$patient->id}}" hidden>
                                <div class="row">
                                    <label class="col-sm-4" for="name">Name<span class="text-danger">*</span></label>
                                    <div class="col-sm-8 form-group">
                                        <input type="text" class="form-control" id="name" name="name"
                                               placeholder="Type patient name...">
                                        @error('name')
                                        <span class="text-danger animated fadeIn">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-4" for="gender">Gender<span class="text-danger">*</span></label>
                                    <div class="col-sm-8 form-group">
                                        {!! Form::select('gender', ['male'=>'Male','female'=>'Female'], old('gender'), ['class' => 'js-select2 form-control','id'=>'gender']) !!}
                                        @error('gender')
                                        <span class="text-danger animated fadeIn">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-4" for="phone">Phone</label>
                                    <div class="col-sm-8 form-group">
                                        <input type="text" class="form-control" id="phone" name="phone"
                                               placeholder="Type patient phone...">
                                        @error('phone')
                                        <span class="text-danger animated fadeIn">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-4" for="status">Status</label>
                                    <div class="col-sm-8 form-group">
                                        {!! Form::select('status', ['0'=>'Outside','1'=>'In Hospital','2'=>'In Room'], old('status'), ['class' => 'js-select2 form-control','id'=>'status']) !!}
                                        @error('status')
                                        <span class="text-danger animated fadeIn">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-4" for="description">Description</label>
                                    <div class="col-sm-8 form-group">
                                        <textarea class="form-control" id="description" name="description"></textarea>
                                        @error('description')
                                        <span class="text-danger animated fadeIn">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-4" for="description">Photo</label>
                                    <div class="col-sm-8 form-group">
                                            <div class="form-group">
                                                <div class="slim" id="image-slim" data-label="Drop your image here" data-fetcher="fetch.php" data-size="600,600" data-ratio="1:1" data-rotate-button="true" accept="image/jpeg , image/gif, image/png">
                                                    <input name="photo" type="file"  />
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div class="block-content block-content-full text-right border-top">
                                <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</button>
                                {!! Form::submit('Save', ['class' => 'btn btn-primary btn btn-sm btn-primary float-left','id'=>'btn-save']) !!}
                            </div>
                            {!! Form::close() !!}

                        </div>
                    </div>
                </div>
            </div>
            <!-- END Modal Create -->

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
                                Are you sure to delete {{ request('trash') == 1 ? 'permanently':'' }} this patient accompany?
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
            // Parameter for control slim when insert and update patient accompany
            // data-label="Drop your image here" data-fetcher="fetch.php" data-size="600,600" data-ratio="1:1" data-rotate-button="true" accept="image/jpeg , image/gif, image/png"
            var slim_image = new Slim(document.getElementById('image-slim'),{ratio: '1:1',crop: {x: 0,y: 0,width: 600,height: 600},});
            // var slim_image = new Slim(document.getElementById('image-slim'));

            // var slim_image =new Slim(document.getElementById('image-slim'), {
            //     ratio: '1:1',
            //     // accept: "image/jpeg , image/gif, image/png",
            //     // minSize: {
            //     //     width: 640,
            //     //     height: 480,
            //     // },
            //     crop: {
            //         x: 0,
            //         y: 0,
            //         width: 600,
            //         height: 600
            //     },
            //     service: 'fetch.php',
            //     download: false,
            //     label: 'Drop your image here.',
            //     buttonConfirmLabel: 'Ok',
            //     // meta: {
            //     //     userId:'1234'
            //     // }
            // });

            One.helpers(['table-tools-sections','magnific-popup']);

            // Switch show all and show trash
            $url_show="{{route('admin.patient_managements.patients.show',$patient->id)}}";
            $per_del='';

            $(document).on('click', '#btn-show-all', function () {
                $d.ajax.url("{{route('admin.patient_managements.patients.show',$patient->id)}}").load();
                $('#dropdown-default-primary').removeClass('btn-danger').addClass('btn-primary').text('Show All');
                $per_del='';
            });
            $(document).on('click', '#btn-show-trash', function () {
                $d.ajax.url("{{route('admin.patient_managements.patients.show',$patient->id)}}?trash=1").load();
                $('#dropdown-default-primary').removeClass('btn-primary').addClass('btn-danger').text('Trash');
                $per_del='per_del/';
            });

            $d=$('#datatable_patient_accompany').DataTable({
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
                    url: $url_show,
                },
                columns: [
                    {data: 'name', name: 'name'},
                    {data: 'photo', name: 'photo'},
                    {data: 'gender', name: 'gender'},
                    {data: 'phone', name: 'phone'},
                    {data: 'description', name: 'description'},
                    {data: 'status', name: 'status'},
                    {data: 'action', name: 'action', orderable: false},
                ],
                // order: [[8, 'desc']]
            });

            // Switch URL Create and Update form
            $url_submit='';
            $type_submit='';
            $(document).on('click', '#btn-new', function () {
                // Remove cache past image from slim
                slim_image.remove();

                // Limitation of Patient Accompany
                @if($patient->patient_accompanies()->count() < config('panel.total_patient_accompany'))
                    $url_submit="{{route('admin.patient_managements.patient_accompanies.store')}}";
                    $type_submit='POST';
                    $('#modal-create').modal('show');
                @else
                One.helpers('notify', {type: 'danger',icon: 'fa fa-times mr-1',message: "{{__('patient.patient_accompany_create_error_over')}}"});
                @endif
            });
            $(document).on('click', '.update', function () {
                // Remove cache past image from slim
                slim_image.remove();

                $pa=getDataFromServer('../patient_accompanies/get_record/',$(this).attr('id'));
                $url_submit="../patient_accompanies/"+ $(this).attr('id');
                $type_submit='PATCH';
                var tr = $(this).closest('tr');
                // slim_image.load($pa['image']);

                $('#name').val($pa['name']);
                $('#gender').val(($pa['gender']).toLowerCase()).change();
                $('#phone').val($pa['phone']);
                $('#description').val($pa['description']);
                $('#status').val(($pa['status'])).change();
                // slim_image.load($pa['image']);

                $('#modal-create').modal('show');
            });

            $('#form_patient_accompany').on('submit',function (event) {
                event.preventDefault();
                var form_ata=$(this).serialize();
                $.ajax({
                    data:form_ata,
                    url: $url_submit,
                    type: $type_submit,
                    success: function (data) {
                        console.log(data);
                        $('#modal-create').modal('hide');
                        $('#datatable_patient_accompany').DataTable().ajax.reload();
                        $('#form_patient_accompany')[0].reset();

                        One.helpers('notify', {type: 'success', icon: 'fa fa-check mr-1', message: data});
                    },
                    error: function (data) {
                        console.log(data);
                        One.helpers('notify', {
                            type: 'danger',
                            icon: 'fa fa-times mr-1',
                            message: "{{__('patient.patient_accompany_create_error')}}"
                        });
                    }
                })
            });

            var patient_accompany_id;

            //Delete function
            $(document).on('click', '.delete', function () {
                patient_accompany_id = $(this).attr('id');
                $('#modal-confirm-delete').modal('show');
            });
            $('#ok_button').click(function () {
                $.ajax({
                    data: {
                        "id": patient_accompany_id,
                        "_token": "{{ csrf_token() }}",
                    },
                    url: "../patient_accompanies/"+ $per_del + patient_accompany_id,
                    {{--url: "patient_accompanies/{{ request('trash') == 1 ? 'per_del/':'' }}" + patient_accompany_id,--}}
                    type: 'DELETE',
                    success: function (data) {
                        $('#modal-confirm-delete').modal('hide');
                        $('#datatable_patient_accompany').DataTable().ajax.reload();
                        One.helpers('notify', {type: 'success', icon: 'fa fa-check mr-1', message: data});
                    },
                    error: function () {
                        One.helpers('notify', {
                            type: 'danger',
                            icon: 'fa fa-times mr-1',
                            message: "{{__('patient.patient_accompany_delete_error')}}"
                        });
                    }
                })
            })

            //Restore function
            $(document).on('click', '.restore', function () {
                patient_accompany_id = $(this).attr('id');
                $('#modal-confirm-restore').modal('show');
            });
            $('#restore_button').click(function () {
                $.ajax({
                    data: {
                        "id": patient_accompany_id,
                        "_token": "{{ csrf_token() }}",
                    },
                    url: "../patient_accompanies/restore/" + patient_accompany_id,
                    type: 'POST',
                    success: function (data) {
                        $('#modal-confirm-restore').modal('hide');
                        $('#datatable_patient_accompany').DataTable().ajax.reload();
                        One.helpers('notify', {type: 'success', icon: 'fa fa-check mr-1', message: data});
                    },
                    error: function () {
                        One.helpers('notify', {
                            type: 'danger',
                            icon: 'fa fa-times mr-1',
                            message: "{{__('patient.patient_accompany__restore_error')}}"
                        });
                    }
                })
            })

            function getDataFromServer($url,$id) {
                $record='';
                $.ajax({
                    async: false,
                    data: {
                        "id": $id,
                        "_token": "{{ csrf_token() }}",
                    },
                    url: $url + $id,
                    type: 'POST',
                    success: function (data) {
                        $record=data;

                    },
                });
                return $record;
            }


        });
    </script>

@endsection
