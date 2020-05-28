<!-- Sidebar -->
<!--
    Sidebar Mini Mode - Display Helper classes

    Adding 'smini-hide' class to an element will make it invisible (opacity: 0) when the sidebar is in mini mode
    Adding 'smini-show' class to an element will make it visible (opacity: 1) when the sidebar is in mini mode
        If you would like to disable the transition animation, make sure to also add the 'no-transition' class to your element

    Adding 'smini-hidden' to an element will hide it when the sidebar is in mini mode
    Adding 'smini-visible' to an element will show it (display: inline-block) only when the sidebar is in mini mode
    Adding 'smini-visible-block' to an element will show it (display: block) only when the sidebar is in mini mode
-->
<nav id="sidebar" aria-label="Main Navigation" >
    <!-- Side Header -->
    <div class="content-header bg-white-5">
        <!-- Logo -->
        <a class="font-w600 text-dual" href="/">
            <img width="20px" src="{{asset('media/photos/logo-icon.png')}}">
            <span class="smini-hide">
                            <span class="font-w700 font-size-h5">CEMS</span>
                        </span>
        </a>
        <!-- END Logo -->

        <!-- Options -->
        <div>
            <!-- Color Variations -->
            <div class="dropdown d-inline-block ml-3">
                <a class="text-dual font-size-sm" id="sidebar-themes-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">
                    <i class="si si-drop"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right font-size-sm smini-hide border-0" aria-labelledby="sidebar-themes-dropdown">
                    <!-- Color Themes -->
                    <!-- Layout API, functionality initialized in Template._uiHandleTheme() -->
                    <a class="dropdown-item d-flex align-items-center justify-content-between" data-toggle="theme" data-theme="default" href="#">
                        <span>Default</span>
                        <i class="fa fa-circle text-default"></i>
                    </a>
                    <a class="dropdown-item d-flex align-items-center justify-content-between" data-toggle="theme" data-theme="{{ mix('css/themes/amethyst.css') }}" href="#">
                        <span>Amethyst</span>
                        <i class="fa fa-circle text-amethyst"></i>
                    </a>
                    <a class="dropdown-item d-flex align-items-center justify-content-between" data-toggle="theme" data-theme="{{ mix('css/themes/city.css') }}" href="#">
                        <span>City</span>
                        <i class="fa fa-circle text-city"></i>
                    </a>
                    <a class="dropdown-item d-flex align-items-center justify-content-between" data-toggle="theme" data-theme="{{ mix('css/themes/flat.css') }}" href="#">
                        <span>Flat</span>
                        <i class="fa fa-circle text-flat"></i>
                    </a>
                    <a class="dropdown-item d-flex align-items-center justify-content-between" data-toggle="theme" data-theme="{{ mix('css/themes/modern.css') }}" href="#">
                        <span>Modern</span>
                        <i class="fa fa-circle text-modern"></i>
                    </a>
                    <a class="dropdown-item d-flex align-items-center justify-content-between" data-toggle="theme" data-theme="{{ mix('css/themes/smooth.css') }}" href="#">
                        <span>Smooth</span>
                        <i class="fa fa-circle text-smooth"></i>
                    </a>
                    <!-- END Color Themes -->

{{--                    <div class="dropdown-divider"></div>--}}

{{--                    <!-- Sidebar Styles -->--}}
{{--                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->--}}
{{--                    <a class="dropdown-item" data-toggle="layout" data-action="sidebar_style_light" href="#">--}}
{{--                        <span>Sidebar Light</span>--}}
{{--                    </a>--}}
{{--                    <a class="dropdown-item" data-toggle="layout" data-action="sidebar_style_dark" href="#">--}}
{{--                        <span>Sidebar Dark</span>--}}
{{--                    </a>--}}
{{--                    <!-- Sidebar Styles -->--}}

{{--                    <div class="dropdown-divider"></div>--}}

{{--                    <!-- Header Styles -->--}}
{{--                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->--}}
{{--                    <a class="dropdown-item" data-toggle="layout" data-action="header_style_light" href="#">--}}
{{--                        <span>Header Light</span>--}}
{{--                    </a>--}}
{{--                    <a class="dropdown-item" data-toggle="layout" data-action="header_style_dark" href="#">--}}
{{--                        <span>Header Dark</span>--}}
{{--                    </a>--}}
{{--                    <!-- Header Styles -->--}}
                </div>
            </div>
            <!-- END Themes -->

            <!-- Close Sidebar, Visible only on mobile screens -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
            <a class="d-lg-none text-dual ml-3" data-toggle="layout" data-action="sidebar_close" href="javascript:void(0)">
                <i class="fa fa-times"></i>
            </a>
            <!-- END Close Sidebar -->
        </div>
        <!-- END Options -->
    </div>
    <!-- END Side Header -->

    <!-- Side Navigation -->
    <div class="content-side content-side-full">
        <ul class="nav-main">
{{--            <li class="nav-main-item">--}}
{{--                <a class="nav-main-link {{ request()->is('dashboard') ? ' active' : '' }}" href="/dashboard">--}}
{{--                    <i class="nav-main-link-icon si si-cursor"></i>--}}
{{--                    <span class="nav-main-link-name">Dashboard</span>--}}
{{--                </a>--}}
{{--            </li>--}}
            <li class="nav-main-item">
                <a class="nav-main-link {{ request()->is('qr_scan') ? ' active' : '' }}" href="/">
                    <i class="nav-main-link-icon fa fa-qrcode"></i>
                    <span class="nav-main-link-name">Scan QRCode</span>
                </a>
            </li>
{{--            <li class="nav-main-heading">Various</li>--}}
{{--            <li class="nav-main-item{{ request()->is('pages/*') ? ' open' : '' }}">--}}
{{--                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="true" href="#">--}}
{{--                    <i class="nav-main-link-icon si si-bulb"></i>--}}
{{--                    <span class="nav-main-link-name">Examples</span>--}}
{{--                </a>--}}
{{--                <ul class="nav-main-submenu">--}}
{{--                    <li class="nav-main-item">--}}
{{--                        <a class="nav-main-link{{ request()->is('pages/datatables') ? ' active' : '' }}" href="/pages/datatables">--}}
{{--                            <span class="nav-main-link-name">DataTables</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-main-item">--}}
{{--                        <a class="nav-main-link{{ request()->is('pages/slick') ? ' active' : '' }}" href="/pages/slick">--}}
{{--                            <span class="nav-main-link-name">Slick Slider</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-main-item">--}}
{{--                        <a class="nav-main-link{{ request()->is('pages/blank') ? ' active' : '' }}" href="/pages/blank">--}}
{{--                            <span class="nav-main-link-name">Blank</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}

            <!-- Configuration -->
            <li class="nav-main-heading">Configurations</li>


            <!-- Patient Management -->
            @can('patient_access')
            <li class="nav-main-item{{ request()->is('admin/patient_managements/*') ? ' open' : '' }}">
                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="true" href="#">
                    <i class="nav-main-link-icon fa fa-user-injured"></i>
                    <span class="nav-main-link-name">Patient Management</span>
                </a>

                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link{{ request()->is('admin/patient_managements/patients') || request()->is('admin/patient_managements/patients/*') ? ' active' : '' }}" href="{{route('admin.patient_managements.patients.index')}}">
                                <i class="nav-main-link-icon fa fa-user-injured"></i>
                                <span class="nav-main-link-name">Patients</span>
                            </a>
                        </li>
                    </ul>
            </li>
            @endcan
            <!-- User Management -->
            @can('user_management_access')
                <li class="nav-main-item{{ request()->is('admin/user_managements/*') ? ' open' : '' }}">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="true" href="#">
                        <i class="nav-main-link-icon si si-users"></i>
                        <span class="nav-main-link-name">User Managements</span>
                    </a>
                    @can('user_access')
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link{{ request()->is('admin/user_managements/users') || request()->is('admin/user_managements/users/*') ? ' active' : '' }}" href="{{route('admin.user_managements.users.index')}}">
                                    <i class="nav-main-link-icon si si-user"></i>
                                    <span class="nav-main-link-name">Users</span>
                                </a>
                            </li>
                        </ul>
                    @endcan
                    @can('role_access')
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link{{ request()->is('admin/user_managements/roles') ||  request()->is('admin/user_managements/roles/*') ? ' active' : '' }}" href="{{route('admin.user_managements.roles.index')}}">
                                    <i class="nav-main-link-icon fa fa-users-cog"></i>
                                    <span class="nav-main-link-name">Roles</span>
                                </a>
                            </li>
                        </ul>
                    @endcan
                    @can('permission_access')
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link{{ request()->is('admin/user_managements/permissions') || request()->is('admin/user_managements/permissions/*') ? ' active' : '' }}" href="{{route('admin.user_managements.permissions.index')}}">
                                    <i class="nav-main-link-icon fa fa-hand-paper"></i>
                                    <span class="nav-main-link-name">Permissions</span>
                                </a>
                            </li>
                        </ul>
                    @endcan
                </li>
            @endcan

            <!-- Setting -->
            @can('setting_access')
            <li class="nav-main-item{{ request()->is('admin/setting/*') ? ' open' : '' }}">
                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="true" href="#">
                    <i class="nav-main-link-icon si si-settings"></i>
                    <span class="nav-main-link-name">Setting</span>
                </a>
                @can('department_access')
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link{{ request()->is('admin/setting/departments') || request()->is('admin/setting/departments/*') ? ' active' : '' }}" href="{{route('admin.setting.departments.index')}}">
                                <i class="nav-main-link-icon si si-home"></i>
                                <span class="nav-main-link-name">Department</span>
                            </a>
                        </li>
                    </ul>
                @endcan
                <ul class="nav-main-submenu">
                    <li class="nav-main-item">
                        <a class="nav-main-link{{ request()->is('admin/setting/ui') || request()->is('admin/setting/ui/*')? ' active' : '' }}" href="{{route('admin.setting.ui')}}">
                            <i class="nav-main-link-icon fa fa-paint-brush"></i>
                            <span class="nav-main-link-name">UI</span>
                        </a>
                    </li>
                </ul>
            </li>
            @endcan

{{--            <li class="nav-main-heading">More</li>--}}
{{--            <li class="nav-main-item open">--}}
{{--                <a class="nav-main-link" href="/">--}}
{{--                    <i class="nav-main-link-icon si si-globe"></i>--}}
{{--                    <i class="nav-main-link-icon fa fa-globe"></i>--}}
{{--                    <span class="nav-main-link-name">Landing</span>--}}
{{--                </a>--}}
{{--            </li>--}}
        </ul>
    </div>
    <!-- END Side Navigation -->
</nav>
<!-- END Sidebar -->
