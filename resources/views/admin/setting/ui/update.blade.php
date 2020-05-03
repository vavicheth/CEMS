@extends('layouts.backend')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                    UI
{{--                    <small--}}
{{--                            class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted">Setting--}}
{{--                    </small>--}}
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Setting</li>
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
        <form method="POST" action="{{route('admin.setting.ui')}}">
        @csrf
        <!-- Your Block -->
            <div class="block">
                <div class="block-header">
                    <h3 class="block-title">Setting</h3>
                </div>
                <div class="block-content">
                    <div class="row">

                        <div class="col-lg-3 col-xl-3">
                            <div class="form-group">
                                <label>Cookie</label>
                                @foreach($uis->where('type','Cookies') as $ui)
                                    <div class="custom-control custom-switch mb-1">
                                        <input type="checkbox" class="custom-control-input" id="{{$ui->key}}"
                                               name="{{$ui->key}}" value="{{$ui->id}}"
                                               @if(in_array($ui->id,$ui_user->where('type','Cookies')->pluck('id')->toArray()))
                                               checked
                                                @endif
                                        >
                                        <label class="custom-control-label" for="{{$ui->key}}">{{$ui->key}}</label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="form-group">
                                <label>Main Content Layout</label>
                                <div class="custom-control custom-radio mb-1">
                                    <input type="radio" class="custom-control-input" id="main-content-default"
                                           name="pay-content-layout" value=""
                                           @if($ui_user->where('type','Page-Content-Layout')->count() ==0)
                                           checked
                                            @endif
                                    >
                                    <label class="custom-control-label"
                                           for="main-content-default">main-content-default</label>
                                </div>
                                @foreach($uis->where('type','Page-Content-Layout') as $ui)
                                    <div class="custom-control custom-radio mb-1">
                                        <input type="radio" class="custom-control-input" id="{{$ui->key}}"
                                               name="pay-content-layout" value="{{$ui->id}}"
                                               @if(in_array($ui->id,$ui_user->where('type','Page-Content-Layout')->pluck('id')->toArray()))
                                               checked
                                                @endif
                                        >
                                        <label class="custom-control-label"
                                               for="{{$ui->key}}">{{$ui->key}}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="col-lg-3 col-xl-3">
                            <div class="form-group">
                                <label>Sidebar</label>
                                @foreach($uis->where('type','Sidebar') as $ui)
                                    <div class="custom-control custom-switch mb-1">
                                        <input type="checkbox" class="custom-control-input" id="{{$ui->key}}"
                                               name="{{$ui->key}}" value="{{$ui->id}}"
                                               @if(in_array($ui->id,$ui_user->where('type','Sidebar')->pluck('id')->toArray()))
                                               checked
                                                @endif
                                        >
                                        <label class="custom-control-label" for="{{$ui->key}}">{{$ui->key}}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="col-lg-3 col-xl-3">
                            <div class="form-group">
                                <label>Side Overlay</label>
                                @foreach($uis->where('type','Side-Overlay') as $ui)
                                    <div class="custom-control custom-switch mb-1">
                                        <input type="checkbox" class="custom-control-input" id="{{$ui->key}}"
                                               name="{{$ui->key}}" value="{{$ui->id}}"
                                               @if(in_array($ui->id,$ui_user->where('type','Side-Overlay')->pluck('id')->toArray()))
                                               checked
                                                @endif
                                        >
                                        <label class="custom-control-label" for="{{$ui->key}}">{{$ui->key}}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="col-lg-3 col-xl-3">
                            <div class="form-group">
                                <label>Header</label>
                                @foreach($uis->where('type','Header') as $ui)
                                    <div class="custom-control custom-switch mb-1">
                                        <input type="checkbox" class="custom-control-input" id="{{$ui->key}}"
                                               name="{{$ui->key}}" value="{{$ui->id}}"
                                               @if(in_array($ui->id,$ui_user->where('type','Header')->pluck('id')->toArray()))
                                               checked
                                                @endif
                                        >
                                        <label class="custom-control-label" for="{{$ui->key}}">{{$ui->key}}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Submit -->
                    <div class="row items-push ">
                        <div class="ml-2">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                    <!-- END Submit -->

                </div>
            </div>
            <!-- END Your Block -->
        </form>
    </div>
    <!-- END Page Content -->
@endsection
