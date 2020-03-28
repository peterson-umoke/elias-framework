@extends("admin::layouts.master")
@section("title","Login")

@section("classes_body","login-page")

@php( $dashboard_url = View::getSection('dashboard_url') ?? config('admin.dashboard_url', 'home') )
@if (config('admin.use_route_url', false))
    @php( $dashboard_url = $dashboard_url ? route($dashboard_url) : '' )
@else
    @php( $dashboard_url = $dashboard_url ? url($dashboard_url) : '' )
@endif

@section("body")
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card ">
            <div class="card-header text-center">
                <a href="{{$dashboard_url}}">
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
                <span
                    class="splash-description">Please enter your login credentials.</span></div>
            <div class="card-body">
                {!! Form::open(['route' => 'admin.login',"method" => "post"] ) !!}
                <div class="form-group">
                    <input autocomplete="off" autofocus
                           class="form-control form-control-lg @error('email') is-invalid @enderror"
                           id="email" name="email" placeholder="Email Address" required type="email"
                           value="{{ old('email') }}">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input autocomplete="current-password"
                           class="form-control form-control-lg @error('password') is-invalid @enderror"
                           id="password"
                           name="password" placeholder="Password" required type="password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox"><span class="custom-control-label">Remember Me</span>
                    </label>
                </div>
                <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
                {!! Form::close() !!}
            </div>
            <div class="card-footer bg-white p-0  ">
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="{{url("/")}}" class="footer-link"><i class="fas fa-arrow-left"></i> Back to Site</a></div>
                <div class="card-footer-item card-footer-item-bordered">
                                        <a href="{{route("admin.password.request")}}" class="footer-link">Forgot Password</a>
                </div>
            </div>
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
@endsection

@section("admin_css")
    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
        }
    </style>
@stop
