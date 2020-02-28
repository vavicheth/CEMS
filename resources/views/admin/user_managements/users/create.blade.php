@extends('layouts.backend')

@section('css_before')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css') }}">
@endsection

@section('content')

    <!-- Page Content -->
    <div class="content">

        <!-- Dynamic Table with Export Buttons -->
        <div class="block">
            <div class="block-header">
                <h3 class="block-title">Create New User</h3>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">User Managements</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="">Users</a>
                        </li>
                    </ol>
                </nav>
            </div>

            <div class="block-content block-content-full">

                <!-- Simple Wizard 2 -->
                <div class="js-wizard-simple block block">
                    <!-- Step Tabs -->
                    <ul class="nav nav-tabs nav-tabs-alt nav-justified" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="#wizard-simple2-step1" data-toggle="tab">User Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#wizard-simple2-step2" data-toggle="tab">Personal Info</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#wizard-simple2-step3" data-toggle="tab">Photos</a>
                        </li>
                    </ul>
                    <!-- END Step Tabs -->

                    <!-- Form -->
                    <form action="be_forms_wizard.html" method="POST">
                        <!-- Steps Content -->
                        <div class="block-content block-content-full tab-content px-md-5" style="min-height: 303px;">
                            <!-- Step 1 -->
                            <div class="tab-pane active" id="wizard-simple2-step1" role="tabpanel">
                                <div class="form-group">
                                    <label for="wizard-simple2-firstname">First Name</label>
                                    <input class="form-control form-control-alt" type="text" id="wizard-simple2-firstname" name="wizard-simple2-firstname">
                                </div>
                                <div class="form-group">
                                    <label for="wizard-simple2-lastname">Last Name</label>
                                    <input class="form-control form-control-alt" type="text" id="wizard-simple2-lastname" name="wizard-simple2-lastname">
                                </div>
                                <div class="form-group">
                                    <label for="wizard-simple2-email">Email</label>
                                    <input class="form-control form-control-alt" type="email" id="wizard-simple2-email" name="wizard-simple2-email">
                                </div>
                            </div>
                            <!-- END Step 1 -->

                            <!-- Step 2 -->
                            <div class="tab-pane" id="wizard-simple2-step2" role="tabpanel">
                                <div class="form-group">
                                    <label for="wizard-simple2-bio">Bio</label>
                                    <textarea class="form-control form-control-alt" id="wizard-simple2-bio" name="wizard-simple2-bio" rows="7"></textarea>
                                </div>
                            </div>
                            <!-- END Step 2 -->

                            <!-- Step 3 -->
                            <div class="tab-pane" id="wizard-simple2-step3" role="tabpanel">
                                <div class="form-group">
                                    <label for="wizard-simple2-location">Location</label>
                                    <input class="form-control form-control-alt" type="text" id="wizard-simple2-location" name="wizard-simple2-location">
                                </div>
                                <div class="form-group">
                                    <label for="wizard-simple2-skills">Skills</label>
                                    <select class="form-control form-control-alt" id="wizard-simple2-skills" name="wizard-simple2-skills">
                                        <option value="">Please select your best skill</option>
                                        <option value="1">Photoshop</option>
                                        <option value="2">HTML</option>
                                        <option value="3">CSS</option>
                                        <option value="4">JavaScript</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox custom-control-primary">
                                        <input type="checkbox" class="custom-control-input" id="wizard-simple2-terms" name="wizard-simple2-terms">
                                        <label class="custom-control-label" for="wizard-simple2-terms">Agree with the terms</label>
                                    </div>
                                </div>
                            </div>
                            <!-- END Step 3 -->
                        </div>
                        <!-- END Steps Content -->

                        <!-- Steps Navigation -->
                        <div class="block-content block-content-sm block-content-full bg-body-light rounded-bottom">
                            <div class="row">
                                <div class="col-6">
                                    <button type="button" class="btn btn-secondary" data-wizard="prev">
                                        <i class="fa fa-angle-left mr-1"></i> Previous
                                    </button>
                                </div>
                                <div class="col-6 text-right">
                                    <button type="button" class="btn btn-secondary" data-wizard="next">
                                        Next <i class="fa fa-angle-right ml-1"></i>
                                    </button>
                                    <button type="submit" class="btn btn-primary d-none" data-wizard="finish">
                                        <i class="fa fa-check mr-1"></i> Submit
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- END Steps Navigation -->
                    </form>
                    <!-- END Form -->
                </div>
                <!-- END Simple Wizard 2 -->
            </div>
        </div>
        <!-- END Dynamic Table with Export Buttons -->

    </div>
    <!-- END Page Content -->
@endsection

@section('js_after')

    <!-- Page JS Plugins -->
    <script src="{{asset('js/plugins/jquery-bootstrap-wizard/bs4/jquery.bootstrap.wizard.min.js')}}"></script>
    <script src="{{asset('js/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('js/plugins/jquery-validation/additional-methods.js')}}"></script>

    <script src="{{asset('js/plugins/pages/be_forms_wizard.min.js')}}"></script>
@endsection
