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
                            <label class="col-sm-4" for="id_card">ID Card/Passport</label>
                            <div class="col-sm-8 form-group">
                                <input type="text" class="form-control" id="id_card" name="id_card" value="{{$patient->id_card}}"
                                       placeholder="Type patient ID card or Passport...">
                                <div class="slim" data-label="Drop ID Card here" data-fetcher="fetch.php" data-size="600,600" data-ratio="1:1" data-rotate-button="true" accept="image/jpeg , image/gif, image/png">
                                    <img src="{{asset($patient->getFirstMediaUrl('patient_id_card') )}}" />
                                    <input name="patient_idcard" type="file"/>
                                </div>

                                @error('id_card')
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

{{--                        <div class="row">--}}
{{--                            <label class="col-sm-4" for="role_id">Department</label>--}}
{{--                            <div class="col-sm-8 form-group">--}}
{{--                                {!! Form::select('department_id', $departments, $patient->department_id, ['class' => 'js-select2 form-control']) !!}--}}
{{--                                @error('department_id')--}}
{{--                                <span class="text-danger animated fadeIn">{{$message}}</span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

                        <div class="row">
                            <label class="col-sm-4" for="address">Address</label>
                            <div class="col-sm-8 form-group">
                                <input type="text" class="form-control" id="address" name="address"
                                       placeholder="Type patient address...">
                                @error('address')
                                <span class="text-danger animated fadeIn">{{$message}}</span>
                                @enderror

                                <div class="input-group mt-2">
                                    {!! Form::select('village_code', [$patient->hasaddress->village['name_kh'],$patient->hasaddress->village['code']], old('village_code'), ['class' => 'form-control address-link','id'=>'village_id']) !!}
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-alt-dark address-type" id="btnVillage" data-address="village" >Village</button>
                                    </div>
                                </div>
                                <div class="input-group mt-2">
                                    {!! Form::select('commune_code', [$patient->hasaddress->commune['name_kh'],$patient->hasaddress->commune['code']], old('commune_code'), ['class' => 'form-control address-link','id'=>'commune_id']) !!}
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-alt-dark address-type" id="btnCommune" data-address="commune">Commune</button>
                                    </div>
                                </div>
                                <div class="input-group mt-2">
                                    {!! Form::select('district_code', [$patient->hasaddress->district['name_kh'],$patient->hasaddress->district['code']], old('district_code'), ['class' => 'form-control address-link','id'=>'district_id']) !!}
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-alt-dark address-type" id="btnDistrict" data-address="district">District</button>
                                    </div>
                                </div>
                                <div class="input-group mt-2">
                                    {!! Form::select('province_code', [$patient->hasaddress->province['name_kh'],$patient->hasaddress->province['code']], old('province_code'), ['class' => 'form-control address-link','id'=>'province_id']) !!}
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-alt-dark address-type" id="btnProvince" data-address="province">Province</button>
                                    </div>
                                </div>
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

                        @can('patient_status')
                        <div class="row">
                            <div class="col-sm-4 ">Status</div>
                            <div class="col-sm-8 form-group">
                                {!! Form::hidden('active', '') !!}
                                <div class="custom-control custom-switch custom-control-primary mb-1">
                                    <input type="checkbox" class="custom-control-input" id="active" name="active"
                                        {{$patient->active == 1? 'checked' : ''}} >
                                    <label class="custom-control-label" for="active">Stay in hospital</label>
                                </div>
                            </div>
                        </div>
                        @endcan

                    </div>

                    <div class="col-lg-4 col-xl-4">
                        <div class="form-group">
                            <div class="slim" data-label="Drop patient image here" data-fetcher="fetch.php" data-size="600,600" data-ratio="1:1" data-rotate-button="true" accept="image/jpeg , image/gif, image/png">
                                   <img src="{{asset($patient->getFirstMediaUrl('patient_photo') )}}" />
                                <input name="photo" type="file"/>
                            </div>
                        </div>
                    </div>

                </div>

                {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
                <a class="btn btn-alt-secondary float-right" href="{{route('admin.patient_managements.patients.index')}}">Cancel</a>
                {!! Form::close() !!}

            </div>

            <!-- Modal select address -->
            <div class="modal" id="modal-select-address" tabindex="-1" role="dialog" aria-labelledby="modal-block-popin"
                 aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="block block-themed block-transparent mb-0">
                            <div class="block-header bg-primary">
                                <h3 class="block-title" id="title-address">Select Address</h3>
                                <div class="block-options">
                                    <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                        <i class="fa fa-fw fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="block-content font-size-sm">
                                <div class="row">
                                    {!! Form::select('address_select', [], old('address'), ['class' => 'js-select2 form-control address-link','id'=>'address_select']) !!}
                                </div>
                            </div>
                            <div class="block-content block-content-full text-right border-top">
                                <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal" id="ok_button">Select</button>
                                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Modal delete data -->


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

    <!-- Calculate and format datetime -->
    <script src="{{asset('js/plugins/moment/moment.min.js')}}"></script>

    <script>
        jQuery(function () {
            One.helpers('select2');

            var address_type='';

            $('.address-type').click(function () {
                address_type= $(this).data('address');

                $('#title-address').text('Select '+ address_type);
                $('#modal-select-address').modal('show');

                $('#address_select').val(null).trigger('change');
                $('#address_select').select2({

                    placeholder: 'Select '+ address_type + '...',
                    // dropdownParent: $('#modal-select-address'),
                    ajax: {
                        url: "{{ route('admin.address.filters') }}?type=" + address_type,
                        dataType: 'json',
                        minimumInputLength: 1,
                        delay: 250,
                        processResults: function (data) {
                            return {
                                results:  $.map(data, function (item) {
                                    return {
                                        text: item.name_parent,
                                        id: item.code,
                                    }
                                })
                            };
                        },
                        cache: true
                    }
                });
            });

            $('#ok_button').click(function () {
                $('#village_id').empty();
                $('#commune_id').empty();
                $('#district_id').empty();
                $('#province_id').empty();
                $.ajax({
                    data: {
                        "code": $('#address_select').val(),
                        "name": address_type,
                        "_token": "{{ csrf_token() }}",
                    },
                    url: "{{route('admin.address.get_data')}}",
                    type: 'POST',
                    dataType: 'json',
                    success: function (data) {
                        console.log(data);
                        if (data != ''){
                            if (address_type == 'village')
                            {
                                $('#village_id').append($('<option>',{ value: data.code,text : data.name_kh }));
                                $('#commune_id').append($('<option>',{ value: data.commune.code,text : data.commune.name_kh }));
                                $('#district_id').append($('<option>',{ value: data.district.code,text : data.district.name_kh }));
                                $('#province_id').append($('<option>',{ value: data.province.code,text : data.province.name_kh }));
                            }else if(address_type == 'commune')
                            {
                                $('#village_id').val('').trigger("change");
                                $('#commune_id').append($('<option>',{ value: data.code,text : data.name_kh }));
                                $('#district_id').append($('<option>',{ value: data.district.code,text : data.district.name_kh }));
                                $('#province_id').append($('<option>',{ value: data.province.code,text : data.province.name_kh }));
                            }else if(address_type == 'district')
                            {
                                $('#village_id').val('').trigger("change");
                                $('#commune_id').val('').trigger("change");
                                $('#district_id').append($('<option>',{ value: data.code,text : data.name_kh }));
                                $('#province_id').append($('<option>',{ value: data.province.code,text : data.province.name_kh }));
                            }else if(address_type == 'province')
                            {
                                $('#village_id').val('').trigger("change");
                                $('#commune_id').val('').trigger("change");
                                $('#district_id').val('').trigger("change");
                                $('#province_id').append($('<option>',{ value: data.code,text : data.name_kh }));
                            }
                        }

                    },
                    error: function () {
                    }
                })
            });

            $('#age').focusout(function () {
                var y = parseInt($(this).val());
                var dateSub = moment(new Date()).subtract(y , 'year');
                $("#dob").val(dateSub.format("DD/MM/YYYY"));
            });

            /* If no ID card number, don't show upload
            */
            $('#id_card').focusout(function () {
                if ($(this).val() != '' ){
                    $('#pic_idcard').removeAttr('hidden');
                }else {
                    $('#pic_idcard').attr('hidden','hidden');
                }
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
