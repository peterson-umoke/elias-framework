@extends("admin::layouts.master")
@section("title","Get Reset Link")

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
                    {!! config("admin.logo") !!}</a>
                <span
                    class="splash-description">Get Reset Link.</span></div>
            <div class="card-body">
                {!! Form::open(['route' => 'admin.password.email',"method" => "post"] ) !!}
                <p>Don't worry, we'll send you an email to reset your password.</p>
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
                <button type="submit" class="btn btn-primary btn-lg btn-block">Send Password Reset Link</button>
                {!! Form::close() !!}
            </div>
            <div class="card-footer bg-white p-0  ">
                <div class="card-footer-item card-footer-item-bordered text-center d-block">
                    <a href="{{route("admin.login")}}" class="footer-link"><i class="fas fa-arrow-left"></i> Go Back</a>
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
