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
                                <button type="button" class="btn btn-sm btn-primary" id="btn-new">Add New</button>
                                <table class="table table-striped table-hover table-vcenter dt-responsive table-vcenter js-dataTable"
                                       id="datatable_patient_accompany" style="border-collapse: collapse;border-spacing: 0;width: 100%">
                                    <thead>
                                    <tr>
                                        <th >Name</th>
                                        <th >Gender</th>
                                        <th >Phone</th>
                                        <th >Description</th>
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


            <!-- Vertically Centered Block Modal -->
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
                                        {!! Form::select('gender', ['male'=>'Male','female'=>'Female'], old('gender'), ['class' => 'js-select2 form-control']) !!}
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
{{--                                        <div class="col-lg-4 col-xl-4">--}}
                                            <div class="form-group">
                                                <div class="slim" data-label="Drop your avatar here" data-fetcher="fetch.php" data-size="600,600" data-ratio="1:1" data-rotate-button="true" accept="image/jpeg, image/gif, image/png">
                                                    <input name="photo" type="file"/>
                                                </div>
                                            </div>
{{--                                        </div>--}}
                                    </div>
                                </div>
                            </div>
                            <div class="block-content block-content-full text-right border-top">
                                <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</button>
{{--                                <button type="submit" class="btn btn-sm btn-primary float-left" data-dismiss="modal"><i class="fa fa-save mr-1"></i>Save</button>--}}
                                {!! Form::submit('Save', ['class' => 'btn btn-primary btn btn-sm btn-primary float-left']) !!}
                            </div>


                            {!! Form::close() !!}

                        </div>
                    </div>
                </div>
            </div>
            <!-- END Vertically Centered Block Modal -->


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

    <script>
        jQuery(function () {
            One.helpers(['table-tools-sections']);

            $(document).on('click', '#btn-new', function () {
                $('#modal-create').modal('show');
            });

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
                    url: "{{route('admin.patient_managements.patients.show',$patient->id)}}{{ request('trash') == 1 ? '?trash=1':'' }}",
                },
                columns: [
                    {data: 'name', name: 'name'},
                    {data: 'gender', name: 'gender'},
                    {data: 'phone', name: 'phone'},
                    {data: 'description', name: 'description'},
                    {data: 'action', name: 'action', orderable: false},
                ],
                // order: [[8, 'desc']]
            });

            $('#form_patient_accompany').on('submit',function (event) {
                event.preventDefault();
                var form_ata=$(this).serialize();
                $.ajax({
                    data:form_ata,
                    url: "{{route('admin.patient_managements.patient_accompanies.store')}}",
                    type: 'POST',
                    success: function (data) {
                        $('#modal-create').modal('hide');
                        $('#datatable_patient_accompany').DataTable().ajax.reload();
                        One.helpers('notify', {type: 'success', icon: 'fa fa-check mr-1', message: data});
                    },
                    error: function () {
                        One.helpers('notify', {
                            type: 'danger',
                            icon: 'fa fa-times mr-1',
                            message: "{{__('patient.patient_accompany_create_error')}}"
                        });
                    }
                })

            })


        });
    </script>

@endsection
