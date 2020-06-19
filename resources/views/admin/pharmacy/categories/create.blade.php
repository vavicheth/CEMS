@extends('layouts.backend')

@section('title')
    | {{__('pharmacy.category_create')}}
@endsection

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
                <h3 class="block-title">{{__('pharmacy.category_create')}}</h3>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">{{__('pharmacy.pharmacy')}}</li>
                        <li class="breadcrumb-item">{{__('pharmacy.configurations')}}</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="">{{__('pharmacy.category_create')}}</a>
                        </li>
                    </ol>
                </nav>
            </div>

            <div class="block-content block-content-full">
                {!! Form::open(['method' => 'POST', 'route' => ['admin.pharmacy.categories.store'],'class'=>'js-validation', 'files' => true]) !!}
                {{--                @csrf--}}
                <div class="row">
                    <div class="col-lg-12 col-xl-10">
                        <div class="row">
                            <label class="col-sm-2" for="name">{{__('pharmacy.category_name')}}<span class="text-danger">*</span></label>
                            <div class="col-sm-8 form-group">
                                <input type="text" class="form-control" id="name" name="name"
                                       placeholder="{{__('general.placeholder')}}{{__('pharmacy.category_name')}}..."  autofocus>
                                @error('name')
                                <span class="text-danger animated fadeIn">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2" for="abr">{{__('pharmacy.category_abbreviation')}}</label>
                            <div class="col-sm-8 form-group">
                                <input type="text" class="form-control" id="abr" name="abr"
                                       placeholder="{{__('general.placeholder')}}{{__('pharmacy.category_abbreviation')}}...">
                                @error('abr')
                                <span class="text-danger animated fadeIn">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-2" for="description">{{__('pharmacy.category_description')}}</label>
                            <div class="col-sm-8 form-group">
                                <textarea class="form-control" id="description" name="description"></textarea>
                                @error('description')
                                <span class="text-danger animated fadeIn">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2 "></div>
                            <div class="col-sm-8 form-group">
                                <div class="custom-control custom-switch custom-control-primary mb-1">
                                    <input type="checkbox" class="custom-control-input" id="active" name="active"
                                           checked>
                                    <label class="custom-control-label" for="active">{{__('pharmacy.category_status')}}</label>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                {!! Form::submit(__('general.save'), ['class' => 'btn btn-primary']) !!}
                <a class="btn btn-alt-secondary float-right" href="{{route('admin.pharmacy.categories.index')}}">{{__('general.cancel')}}</a>
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

        });
    </script>

@endsection
