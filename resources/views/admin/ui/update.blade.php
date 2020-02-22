@extends('layouts.backend')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                    UI <small
                        class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted">Setting</small>
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Examples</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="">UI</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">
        <!-- Your Block -->
        <div class="block">
            <div class="block-header">
                <h3 class="block-title">Block Title</h3>
            </div>
            <div class="block-content">
                <div class="row">
                    <div class="col-lg-4 col-xl-4">
                        <div class="form-group">
                            <label>Cookie</label>
                            <div class="custom-control custom-switch mb-1">
                                <input type="checkbox" class="custom-control-input" id="example-sw-custom1"
                                       name="example-sw-custom1" checked>
                                <label class="custom-control-label" for="example-sw-custom1">cookies</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xl-4">
                        <div class="form-group">
                            <label>Sidebar</label>
                            <div class="custom-control custom-switch mb-1">
                                <input type="checkbox" class="custom-control-input" id="example-sw-custom1"
                                       name="example-sw-custom1" checked>
                                <label class="custom-control-label" for="example-sw-custom1">sidebar-mini</label>
                            </div>
                            <div class="custom-control custom-switch mb-1">
                                <input type="checkbox" class="custom-control-input" id="example-sw-custom1"
                                       name="example-sw-custom1" checked>
                                <label class="custom-control-label" for="example-sw-custom1">sidebar-o-xs</label>
                            </div>
                            <div class="custom-control custom-switch mb-1">
                                <input type="checkbox" class="custom-control-input" id="example-sw-custom1"
                                       name="example-sw-custom1" checked>
                                <label class="custom-control-label" for="example-sw-custom1">sidebar-dark</label>
                            </div>
                            <div class="custom-control custom-switch mb-1">
                                <input type="checkbox" class="custom-control-input" id="example-sw-custom1"
                                       name="example-sw-custom1" checked>
                                <label class="custom-control-label" for="example-sw-custom1">sidebar-r</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xl-4">
                        <div class="form-group">
                            <label>Switches</label>
                            <div class="custom-control custom-switch mb-1">
                                <input type="checkbox" class="custom-control-input" id="example-sw-custom1"
                                       name="example-sw-custom1" checked>
                                <label class="custom-control-label" for="example-sw-custom1">Option 1</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Your Block -->
    </div>
    <!-- END Page Content -->
@endsection
