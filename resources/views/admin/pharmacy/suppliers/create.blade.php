@extends('layouts.backend')

@section('title')
    | {{__('pharmacy.supplier_create')}}
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
                <h3 class="block-title">{{__('pharmacy.supplier_create')}}</h3>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">{{__('pharmacy.pharmacy')}}</li>
                        <li class="breadcrumb-item">{{__('pharmacy.configurations')}}</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="">{{__('pharmacy.supplier_create')}}</a>
                        </li>
                    </ol>
                </nav>
            </div>

            <div class="block-content block-content-full">
                {!! Form::open(['method' => 'POST', 'route' => ['admin.pharmacy.suppliers.store'],'class'=>'js-validation', 'files' => true]) !!}
                {{--                @csrf--}}
                <div class="row">
                    <div class="col-lg-12 col-xl-10">
                        <div class="row">
                            <label class="col-sm-2" for="status">{{__('pharmacy.donor')}}<span class="text-danger">*</span></label>
                            <div class="col-sm-8 form-group">
                                {!! Form::select('donor_id', $phDonors, old('status'), ['class' => 'js-select2 form-control','id'=>'donor_id']) !!}
                                @error('donor_id')
                                <span class="text-danger animated fadeIn">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2" for="name">{{__('pharmacy.supplier_name')}}<span class="text-danger">*</span></label>
                            <div class="col-sm-8 form-group">
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="{{__('general.placeholder')}}{{__('pharmacy.supplier_name')}}..." autofocus>
                                @error('name')
                                <span class="text-danger animated fadeIn">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2" for="abr">{{__('pharmacy.supplier_abbreviation')}}</label>
                            <div class="col-sm-8 form-group">
                                <input type="text" class="form-control" id="abr" name="abr"
                                       placeholder="{{__('general.placeholder')}}{{__('pharmacy.donor_abbreviation')}}...">
                                @error('abr')
                                <span class="text-danger animated fadeIn">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2" for="abr">{{__('pharmacy.supplier_contact_name')}}</label>
                            <div class="col-sm-8 form-group">
                                <input type="text" class="form-control" id="contact_name" name="contact_name"
                                       placeholder="{{__('general.placeholder')}}{{__('pharmacy.supplier_contact_name')}}...">
                                @error('contact_name')
                                <span class="text-danger animated fadeIn">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2" for="abr">{{__('pharmacy.supplier_phone')}}</label>
                            <div class="col-sm-8 form-group">
                                <input type="text" class="form-control" id="phone" name="phone"
                                       placeholder="{{__('general.placeholder')}}{{__('pharmacy.supplier_phone')}}...">
                                @error('phone')
                                <span class="text-danger animated fadeIn">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2" for="abr">{{__('pharmacy.supplier_address')}}</label>
                            <div class="col-sm-8 form-group">
                                <input type="text" class="form-control" id="address" name="address"
                                       placeholder="{{__('general.placeholder')}}{{__('pharmacy.supplier_address')}}...">
                                @error('address')
                                <span class="text-danger animated fadeIn">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2" for="abr">{{__('pharmacy.supplier_email')}}</label>
                            <div class="col-sm-8 form-group">
                                <input type="text" class="form-control" id="email" name="email"
                                       placeholder="{{__('general.placeholder')}}{{__('pharmacy.supplier_email')}}...">
                                @error('email')
                                <span class="text-danger animated fadeIn">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2" for="abr">{{__('pharmacy.supplier_website')}}</label>
                            <div class="col-sm-8 form-group">
                                <input type="text" class="form-control" id="website" name="website"
                                       placeholder="{{__('general.placeholder')}}{{__('pharmacy.supplier_website')}}...">
                                @error('website')
                                <span class="text-danger animated fadeIn">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-2" for="abr">{{__('pharmacy.supplier_country')}}</label>
                            <div class="col-sm-8 form-group">
                                    <select class="js-select2 form-control" data-flag="true"  id="country" name="country" style="width: 100%;" data-placeholder="{{__('general.please_select')}}" data-select2-id="KH" tabindex="-1" aria-hidden="true">
                                        <option data-select2-id="2"></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                        @foreach($countries as $country)
                                            <option value="{{$country->alt_spellings}}">{{$country->name->common}}</option>
                                        @endforeach
                                    </select>
                                @error('country')
                                <span class="text-danger animated fadeIn">{{$message}}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="row">
                            <label class="col-sm-2" for="description">{{__('pharmacy.supplier_description')}}</label>
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
                                    <label class="custom-control-label" for="active">{{__('pharmacy.supplier_status')}}</label>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                {!! Form::submit(__('general.save'), ['class' => 'btn btn-primary']) !!}
                <a class="btn btn-alt-secondary float-right" href="{{route('admin.pharmacy.suppliers.index')}}">{{__('general.cancel')}}</a>
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
            One.helpers('select2');

            {{--function formatState (state) {--}}
            {{--    if (!state.id) {--}}
            {{--        return state.text;--}}
            {{--    }--}}
            {{--    var baseUrl = "/user/pages/images/flags";--}}
            {{--    var $state = $(--}}
            {{--        '<span>{!! $country->flag->flag_icon !!}' + state.text + '</span>'--}}
            {{--    );--}}
            {{--    return $state;--}}
            {{--};--}}

            {{--$("#country").select2({--}}
            {{--    templateResult: formatState--}}
            {{--});--}}

        });
    </script>

@endsection
