@extends('layouts.backend')

@section('css_before')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css') }}">

    <link rel="stylesheet" href="{{ asset('js/plugins/select2/css/select2.min.css') }}">

@endsection

@section('content')

    <!-- Page Content -->
    <div class="content">

        <!-- Dynamic Table with Export Buttons -->
        <div class="block">
            <div class="block-header">
                <h3 class="block-title">Update Department</h3>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Setting</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="">Update Department</a>
                        </li>
                    </ol>
                </nav>
            </div>

            <div class="block-content block-content-full">

                {!! Form::open(['method' => 'PATCH', 'route' => ['admin.setting.departments.update',$department->id],'class'=>'js-validation', 'files' => true]) !!}
                {{--                @csrf--}}
                <div class="row">
                    <div class="col-lg-12 col-xl-10">
                        <div class="row">
                            <label class="col-sm-2" for="name">Name<span class="text-danger">*</span></label>
                            <div class="col-sm-8 form-group">
                                <input type="text" class="form-control" id="name" name="name" value="{{$department->name}}"
                                       placeholder="Type department name..." autofocus>
                                @error('name')
                                <span class="text-danger animated fadeIn">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2" for="name_kh">Name Khmer<span class="text-danger">*</span></label>
                            <div class="col-sm-8 form-group">
                                <input type="text" class="form-control" id="name_kh" name="name_kh" value="{{$department->name_kh}}"
                                       placeholder="Type department name in Khmer..." >
                                @error('name_kh')
                                <span class="text-danger animated fadeIn">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2" for="abr">Abr</label>
                            <div class="col-sm-8 form-group">
                                <input type="text" class="form-control" id="abr" name="abr" value="{{$department->abr}}"
                                       placeholder="Type department abbreviation..." >
                                @error('abr')
                                <span class="text-danger animated fadeIn">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2" for="abr_kh">Abr Khmer</label>
                            <div class="col-sm-8 form-group">
                                <input type="text" class="form-control" id="abr_kh" name="abr_kh" value="{{$department->abr_kh}}"
                                       placeholder="Type department abbreviation in Khmer..." >
                                @error('abr_kh')
                                <span class="text-danger animated fadeIn">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2" for="bed_total">Bed Total</label>
                            <div class="col-sm-8 form-group">
                                <input type="number" class="form-control" id="bed_total" name="bed_total" value="{{$department->bed_total}}"
                                       placeholder="Type total bed..." >
                                @error('bed_total')
                                <span class="text-danger animated fadeIn">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2" for="description">Description</label>
                            <div class="col-sm-8 form-group">
                                <textarea class="form-control" id="description" name="description">{{$department->description}}</textarea>
                                @error('description')
                                <span class="text-danger animated fadeIn">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2 "></div>
                            <div class="col-sm-8 form-group">
                                {!! Form::hidden('active', '') !!}
                                <div class="custom-control custom-switch custom-control-primary mb-1">
                                    <input type="checkbox" class="custom-control-input" id="active" name="active"
                                            {{$department->active == 1? 'checked' : ''}}>
                                    <label class="custom-control-label" for="active">Active</label>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
                <a class="btn btn-alt-secondary float-right" href="{{route('admin.setting.departments.index')}}">Cancel</a>
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

    <script>
        jQuery(function () {
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
