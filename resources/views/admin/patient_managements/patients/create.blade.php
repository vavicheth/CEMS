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
                <h3 class="block-title">Create Patient</h3>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Patient Management</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="">Create Patient</a>
                        </li>
                    </ol>
                </nav>
            </div>

            <div class="block-content block-content-full">

                {!! Form::open(['method' => 'POST', 'route' => ['admin.patient_managements.patients.store'],'class'=>'js-validation', 'files' => true]) !!}
                {{--                @csrf--}}
                <div class="row">
                    <div class="col-lg-10 col-xl-5">
                        <div class="row">
                            <label class="col-sm-4" for="hn">HN</label>
                            <div class="col-sm-8 form-group">
                                <input type="text" class="form-control" id="hn" name="hn"
                                       placeholder="Type Hospital Number..." autofocus>
                                @error('hn')
                                <span class="text-danger animated fadeIn">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
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
                            <label class="col-sm-4" for="name_kh">Name Khmer<span class="text-danger">*</span></label>
                            <div class="col-sm-8 form-group">
                                <input type="text" class="form-control" id="name_kh" name="name_kh"
                                       placeholder="Type patient name in Khmer...">
                                @error('name_kh')
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
                            <label class="col-sm-4" for="dob">Age/DOB</label>
                            <div class="col-sm-8 form-group">
                                <input type="number" class="form-control" id="age" placeholder="Age...">
                                <input type="text" tabindex="-1" class="js-datepicker form-control" id="dob" name="dob" data-week-start="1" data-autoclose="true" data-today-highlight="true" data-date-format="dd/mm/yyyy" placeholder="dd/mm/yyyy">
                                @error('dob')
                                <span class="text-danger animated fadeIn">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-4" for="id_card">ID Card/Passport</label>
                            <div class="col-sm-8 form-group">
                                <input type="text" class="form-control" id="id_card" name="id_card"
                                       placeholder="Type patient ID card or Passport...">
                                <div class="form-group animated fadeInUp" id="pic_idcard" hidden>
                                    <div class="slim" data-label="Drop ID Card here" data-fetcher="fetch.php" data-size="600,600" data-ratio="1:1" data-rotate-button="true" accept="image/jpeg, image/gif, image/png">
                                        <input name="patient_idcard" type="file"/>
                                    </div>
                                </div>
{{--                                <input type="file" name="patient_idcard" />--}}
                                @error('id_card')
                                <span class="text-danger animated fadeIn">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-4" for="address">Address</label>
                            <div class="col-sm-8 form-group">
                                <input type="text" class="form-control" id="address" name="address"
                                       placeholder="Type patient address...">
                                @error('address')
                                <span class="text-danger animated fadeIn">{{$message}}</span>
                                @enderror

                                {!! Form::select('village_id', $villages, old('village_id'), ['class' => 'js-select2 form-control','id'=>'village']) !!}
                                {!! Form::select('commune_id', $communes, old('commune_id'), ['class' => 'js-select2 form-control','id'=>'commune']) !!}
{{--                                {!! Form::select('district_id', $districts, old('district_id'), ['class' => 'js-select2 form-control','id'=>'district']) !!}--}}
                                {!! Form::select('province_id', $provinces, old('province_id'), ['class' => 'js-select2 form-control','id'=>'province', 'data-dependent'=>'district']) !!}

{{--                                {!! Form::select('village_id', [], old('village_id'), ['class' => 'js-select2 form-control dynamic-select','id'=>'village']) !!}--}}
{{--                                {!! Form::select('commune_id', [], old('commune_id'), ['class' => 'js-select2 form-control dynamic-select','id'=>'commune']) !!}--}}
                                {!! Form::select('district_id', [], old('district_id'), ['class' => 'js-select2 form-control dynamic-select','id'=>'district','data-sub'=>'district', 'data-parent'=>'province']) !!}
{{--                                {!! Form::select('province_id', $provinces, old('province_id'), ['class' => 'js-select2 form-control dynamic-select','id'=>'province', 'data-dependent'=>'district']) !!}--}}



{{--                                <select name="country" id="country" class="form-control input-lg dynamic" data-dependent="state">--}}
{{--                                    <option value="">Select Country</option>--}}
{{--                                    @foreach($country_list as $country)--}}
{{--                                        <option value="{{ $country->country}}">{{ $country->country }}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}

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
                            <label class="col-sm-4" for="role_id">Department</label>
                            <div class="col-sm-8 form-group">
                                {!! Form::select('department_id', $departments, old('department_id'), ['class' => 'js-select2 form-control']) !!}
                                @error('department_id')
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

                        @can('patient_status')
                        <div class="row">
                            <div class="col-sm-4 ">Status</div>
                            <div class="col-sm-8 form-group">
                                <div class="custom-control custom-switch custom-control-primary mb-1">
                                    <input type="checkbox" class="custom-control-input" id="active" name="active"
                                           checked>
                                    <label class="custom-control-label" for="active">Stay in hospital</label>
                                </div>
                            </div>
                        </div>
                        @endcan

                    </div>
                    <div class="col-lg-4 col-xl-4">
                        <div class="form-group">
                            <div class="slim" data-label="Drop patient image here" data-fetcher="fetch.php" data-size="600,600" data-ratio="1:1" data-rotate-button="true" accept="image/jpeg, image/gif, image/png">
                                <input name="photo" type="file"/>
                            </div>
                        </div>
                    </div>
                </div>

                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a class="btn btn-alt-secondary float-right" href="{{route('admin.patient_managements.patients.index')}}">Cancel</a>
                {!! Form::close() !!}


            </div>


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

            $("#village").select2({
                placeholder: "Select village...",
                minimumInputLength: 1,
            });
            $("#commune").select2({placeholder: "Select commune...",minimumInputLength: 1,});
            // $("#district").select2({placeholder: "Select district...",minimumInputLength: 1,});
            $("#province").select2({placeholder: "Select province...",});

            $('#province').change(function(){
                $('#district').val('').trigger("change");;
                $('#commune').val('').trigger("change");;
                $('#village').val('').trigger("change");;
            });

            function formatState (state) {
                if (!state.id) {
                    return state.text;
                }
                var $state = $(
                    state.text + 'test'
                );

                return $state;
            };


            $('#district').select2({
                placeholder: 'Select district...',
                ajax: {
                    theme: 'bootstrap4',
                    url: "{{ route('admin.address.districts') }}",
                    dataType: 'json',
                    minimumInputLength: 1,
                    // method:"POST",
                    // data:{_token:_token, dependent:dependent},
                    delay: 250,
                    templateResult: formatState,
                    templateSelection: formatState,
                    processResults: function (data) {
                        return {
                            results:  $.map(data, function (item) {
                                return {
                                    text: item.name_kh,
                                    id: item.code,
                                    province_name: item.province.name_kh,
                                }
                            })
                        };
                    },
                    cache: true
                }
            });



            {{--$('#district').change(function(){--}}
            {{--    var data = [--}}
            {{--        {--}}
            {{--            id: 0,--}}
            {{--            text: 'enhancement'--}}
            {{--        },--}}
            {{--        {--}}
            {{--            id: 1,--}}
            {{--            text: 'bug'--}}
            {{--        },--}}
            {{--        {--}}
            {{--            id: 2,--}}
            {{--            text: 'duplicate'--}}
            {{--        },--}}
            {{--        {--}}
            {{--            id: 3,--}}
            {{--            text: 'invalid'--}}
            {{--        },--}}
            {{--        {--}}
            {{--            id: 4,--}}
            {{--            text: 'wontfix'--}}
            {{--        }--}}
            {{--    ];--}}
            {{--    getData();--}}
            {{--    $("#commune").select2({--}}
            {{--        // data:getData()--}}
            {{--    })--}}
            {{--});--}}

            {{--function getData() {--}}
            {{--    $.ajax({--}}
            {{--        data: {--}}
            {{--            "_token": "{{ csrf_token() }}",--}}
            {{--            "table": 'communes' ,--}}
            {{--            'con_id': 'district_id',--}}
            {{--            'value': '102',--}}
            {{--        },--}}
            {{--        url: "{{route('admin.address.get_data')}}",--}}
            {{--        type: 'POST',--}}
            {{--        success: function (data) {--}}
            {{--            console.log(data);--}}
            {{--            $('#commune').html(data)--}}

            {{--            // return data;--}}
            {{--        },--}}
            {{--        error: function (data) {--}}
            {{--            console.log();--}}
            {{--            // return [];--}}
            {{--        }--}}
            {{--    })--}}
            {{--}--}}






            {{--$('.dynamic-select').change(function(){--}}
            {{--    if($(this).val() != '')--}}
            {{--    {--}}
            {{--        var select = $(this).attr("id");--}}
            {{--        var value = $(this).val();--}}
            {{--        var dependent = $(this).data('dependent');--}}
            {{--        var _token = "{{ csrf_token() }}";--}}
            {{--        $.ajax({--}}
            {{--            url:"{{ route('admin.address.fetch') }}",--}}
            //             method:"POST",
            //             data:{select:select, value:value, _token:_token, dependent:dependent},
            {{--            success:function(result)--}}
            {{--            {--}}
            {{--                $('#'+dependent).html(result);--}}
            {{--            }--}}

            {{--        })--}}
            {{--    }--}}
            {{--});--}}

            {{--$('#province').change(function(){--}}
            {{--    $('#district').val('');--}}
            {{--    // $('#city').val('');--}}
            {{--});--}}

            {{--$('#state').change(function(){--}}
            {{--    $('#city').val('');--}}
            {{--});--}}





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

        function deltaDate(input, days, months, years) {
            return new Date(
                input.getFullYear() + years,
                input.getMonth() + months,
                Math.min(
                    input.getDate() + days,
                    new Date(input.getFullYear() + years, input.getMonth() + months + 1, 0).getDate()
                )
            );
        }

    </script>

@endsection
