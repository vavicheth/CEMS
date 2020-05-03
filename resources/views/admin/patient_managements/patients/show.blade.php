@extends('layouts.backend')

@section('css_before')

@endsection

@section('content')

    <!-- Page Content -->
    <div class="content">

        <!-- Dynamic Table with Export Buttons -->
        <div class="block">
            <div class="block-header">
                <h3 class="block-title">Department Information</h3>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Setting</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="">Department Information</a>
                        </li>
                    </ol>
                </nav>
            </div>

            <div class="block-content block-content-full">

                <div class="row">
                    <div >
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-vcenter mb-0">
                                <tbody>
                                <tr>
                                    <td class="font-w600 text-left border-right">Name</td>
                                    <td>{{$department->name}}</td>
                                </tr>
                                <tr>
                                    <td class="font-w600 text-left border-right">Name Khmer</td>
                                    <td>{{$department->name_kh}}</td>
                                </tr>
                                <tr>
                                    <td class="font-w600 text-left border-right">Abr</td>
                                    <td>{{$department->abr}}</td>
                                </tr>
                                <tr>
                                    <td class="font-w600 text-left border-right">Abr Khmer</td>
                                    <td>{{$department->abr_kh}}</td>
                                </tr>
                                <tr>
                                    <td class="font-w600 text-left border-right">Bed Total</td>
                                    <td>{{$department->bed_total}}</td>
                                </tr>
                                <tr>
                                    <td class="font-w600 text-left border-right">Active</td>
                                    <td>
                                        <div class="custom-control custom-checkbox custom-control-primary custom-control-lg mb-1">
                                            <input type="checkbox" class="custom-control-input" name="active_user" disabled {{$department->active == 1? 'checked' : ''}} >
                                            <label class="custom-control-label" for="active_user">{{$department->active == 1? 'Activated' : 'Inactive'}}</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-w600 text-left border-right">Description</td>
                                    <td>{{$department->description}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>

                <div class="row mt-2">
                    <a class="btn btn-secondary float-right" href="{{route('admin.setting.departments.index')}}">Back</a>
                </div>
            </div>


        </div>


    </div>
    <!-- END Page Content -->
@endsection

@section('js_after')

    <script>
        jQuery(function () {
        });
    </script>

@endsection
