@extends('layouts.backend')

@section('css_before')

@endsection

@section('content')

    <!-- Page Content -->
    <div class="content">

        <!-- Dynamic Table with Export Buttons -->
        <div class="block">
            <div class="block-header">
                <h3 class="block-title">Permission Information</h3>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">User Managements</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="">Permission Information</a>
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
                                    <td class="font-w600 text-left">Permission</td>
                                    <td>{{$permission->name}}</td>
                                </tr>
                                <tr>
                                    <td class="font-w600 text-left">Description</td>
                                    <td>{{$permission->description}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>

                <div class="row mt-2">
                    <a class="btn btn-secondary float-right" href="{{route('admin.user_managements.permissions.index')}}">Back</a>
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
