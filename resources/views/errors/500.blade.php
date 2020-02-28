@extends('layouts.main')

@section('body_block')

    <div id="page-container">

        <!-- Main Container -->
        <main id="main-container">
            <!-- Page Content -->
            <div class="hero">
                <div class="hero-inner text-center">
                    <div class="bg-white">
                        <div class="content content-full overflow-hidden">
                            <div class="py-4">
                                <!-- Error Header -->
                                <h1 class="display-1 text-modern invisible" data-toggle="appear" data-class="animated zoomInDown">500</h1>
                                <h2 class="h3 font-w300 text-muted invisible mb-5" data-toggle="appear" data-class="animated fadeInUp">We are sorry but our server encountered an internal error..</h2>
                                <!-- END Error Header -->

                                <!-- Search Form -->
                                <form action="be_pages_generic_search.html" method="POST">
                                    <div class="form-group row justify-content-center">
                                        <div class="col-sm-6 col-xl-4">
                                            <div class="input-group">
                                                <input class="form-control" type="text" placeholder="Search application..">
                                                <div class="input-group-append">
                                                    <button type="button" class="btn btn-secondary">
                                                        <i class="fa fa-search"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <!-- END Search Form -->
                            </div>
                        </div>
                    </div>
                    <div class="content content-full font-size-sm text-muted">
                        <!-- Error Footer -->
                        <p class="mb-1">
                            Would you like to let us know about it?
                        </p>
                        <a class="link-fx" href="javascript:void(0)">Report it</a> or <a class="link-fx" href="be_pages_error_all.html">Go Back to Dashboard</a>
                        <!-- END Error Footer -->
                    </div>
                </div>
            </div>
            <!-- END Page Content -->
        </main>
        <!-- END Main Container -->
    </div>

@endsection