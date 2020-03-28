@extends("admin::layouts.master")

@section('admin_css')
    @stack('css')
    @yield('css')
@stop

@php( $logout_url = View::getSection('logout_url') ?? config('admin.logout_url', 'logout') )
@php( $profile_url = View::getSection('profile_url') ?? config('admin.profile_url', 'logout') )
@php( $dashboard_url = View::getSection('dashboard_url') ?? config('admin.dashboard_url', 'home') )

@if (config('admin.use_route_url', false))
    @php( $logout_url = $logout_url ? route($logout_url) : '' )
    @php( $profile_url = $profile_url ? route($profile_url) : '' )
    @php( $dashboard_url = $dashboard_url ? route($dashboard_url) : '' )
@else
    @php( $logout_url = $logout_url ? url($logout_url) : '' )
    @php( $profile_url = $profile_url ? url($profile_url) : '' )
    @php( $dashboard_url = $dashboard_url ? url($dashboard_url) : '' )
@endif

@section("body")
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="{{$dashboard_url ?? "#"}}">
                    @if(!get_setting("allow_logo_for_admin_name") && !empty(get_setting("site_name")))
                        {{get_setting("site_name")}}
                    @elseif(get_setting("allow_logo_for_admin_name") && !empty(get_setting("admin_logo")))
                        <img
                            class="img-fluid"
                            style="width: {{get_setting('admin_logo_size_width','all') ?? "50"}}px;height: {{get_setting('admin_logo_size_height','all') ?? "50"}}px;"
                            src="{{admin_uploads(get_setting('admin_logo','all'))}}"
                            alt="">
                    @else
                        {!! config("admin.logo") !!}
                    @endif
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">

                        @yield("admin_topright")

                        @if(auth(config("admin.auth_guard"))->check())
                            <li class="nav-item dropdown nav-user">
                                <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2"
                                   data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false"><img
                                        src="{{admin_asset('images/avatar-1.jpg')}}"
                                        alt=""
                                        class="user-avatar-md rounded-circle"></a>
                                <div class="dropdown-menu dropdown-menu-right nav-user-dropdown"
                                     aria-labelledby="navbarDropdownMenuLink2">
                                    <div class="nav-user-info">
                                        <h5 class="mb-0 text-white nav-user-name">
                                            @if(auth(config("admin.auth_guard"))->check())
                                                Hi, {{auth(config("admin.auth_guard"))->user()->first_name}}
                                            @else
                                                John Abraham
                                            @endif
                                        </h5>
                                        <span class="status"></span>
                                        <span class="ml-2">
                                            @if(auth(config("admin.auth_guard"))->check())
                                                {{auth(config("admin.auth_guard"))->user()->email}}
                                            @else
                                                Available
                                            @endif
                                        </span>
                                    </div>
                                    @each('admin::layouts.partials.menu-item-top-nav-user', config("menus.admin.user_profile"), 'item')
                                    <a href="{{ $profile_url ?? "#" }}" class="dropdown-item"><i
                                            class="fas fa-user mr-2"></i>Account</a>
                                    <a class="dropdown-item" href="#"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                            class="fas fa-power-off mr-2"></i>Logout</a>
                                    <form id="logout-form" action="{{ $logout_url }}" method="POST"
                                          style="display: none;">
                                        {{ method_field("POST") }}
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </li>
                        @endif
                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">@yield("page_title","Dashboard")</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            @each('admin::layouts.partials.menu-item', $admin->menu(), 'item')
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">@yield("page_title","Page Header") </h2>
                            <p class="pageheader-text">@yield("page_description","Hello")</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    @yield("page_breadcrumbs")
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->
                @if(config("admin.use_flash_module"))
                    @include('flash::message')
                @endif
                @yield("content")
            </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <div class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            {!! config("admin.footer_credits") !!}
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class="text-md-right footer-links d-none d-sm-block">
                                @each('admin::layouts.partials.menu-item-footer', config("menus.admin.footer"), 'item')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- end main wrapper -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
@stop

@section('admin_js')
    <script>
        $('#flash-overlay-modal').modal();
    </script>
    @stack('js')
    @yield('js')
@stop
