@extends('layouts.backend')

@section('title')
    | {{__('pharmacy.supplier_show')}}
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
                <h3 class="block-title">{{__('pharmacy.supplier_show')}}</h3>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">{{__('pharmacy.pharmacy')}}</li>
                        <li class="breadcrumb-item">{{__('pharmacy.configurations')}}</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="">{{__('pharmacy.supplier_show')}}</a>
                        </li>
                    </ol>
                </nav>
            </div>

            <div class="block-content block-content-full">
                <div class="row">
                    <div class="col-lg-12 col-xl-6">

                        <table class="table table-striped table-hover table-vcenter mb-0">
                            <tbody>
                            <tr>
                                <td class="font-w600 text-left">{{__('pharmacy.donor')}}</td>
                                <td>{{$phSupplier->donor->name}}</td>
                            </tr>
                            <tr>
                                <td class="font-w600 text-left">{{__('pharmacy.supplier_name')}}</td>
                                <td>{{$phSupplier->name}}</td>
                            </tr>
                            <tr>
                                <td class="font-w600 text-left">{{__('pharmacy.supplier_abbreviation')}}</td>
                                <td>{{$phSupplier->abr}}</td>
                            </tr>
                            <tr>
                                <td class="font-w600 text-left">{{__('pharmacy.supplier_contact_name')}}</td>
                                <td>{{$phSupplier->contact_name}}</td>
                            </tr>
                            <tr>
                                <td class="font-w600 text-left">{{__('pharmacy.supplier_phone')}}</td>
                                <td>{{$phSupplier->phone}}</td>
                            </tr>
                            <tr>
                                <td class="font-w600 text-left">{{__('pharmacy.supplier_address')}}</td>
                                <td>{{$phSupplier->address}}</td>
                            </tr>
                            <tr>
                                <td class="font-w600 text-left">{{__('pharmacy.supplier_email')}}</td>
                                <td>{{$phSupplier->email}}</td>
                            </tr>
                            <tr>
                                <td class="font-w600 text-left">{{__('pharmacy.supplier_website')}}</td>
                                <td>{{$phSupplier->website}}</td>
                            </tr>
                            <tr>
                                <td class="font-w600 text-left">{{__('pharmacy.supplier_country')}}</td>
                                <td>{{$phSupplier->country}}</td>
                            </tr>
                            <tr>
                                <td class="font-w600 text-left">{{__('pharmacy.supplier_description')}}</td>
                                <td>{{$phSupplier->description}}</td>
                            </tr>
                            <tr>
                                <td class="font-w600 text-left">{{__('pharmacy.supplier_status')}}</td>
                                <td>
                                    <div class="custom-control custom-switch custom-control-primary mb-1">
                                        <input type="checkbox" class="custom-control-input" id="active" name="active" disabled
                                            {{$phSupplier->active == 1? 'checked' : ''}}>
                                        <label class="custom-control-label" for="active">{{$phSupplier->active == 1? __('pharmacy.supplier_active') : __('pharmacy.supplier_inactive')}}</label>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <a class="btn btn-secondary mt-2" href="{{route('admin.pharmacy.suppliers.index')}}">{{__('general.back')}}</a>
                    </div>

                </div>

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
