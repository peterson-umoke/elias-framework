<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{csrf_token()}}">
    @yield('meta_tags')
    <title>
        @yield('title_prefix', config('admin.title_prefix', ''))
        @yield('title', config('admin.title', 'Admin'))
        @yield('title_postfix', config('admin.title_postfix', ''))
    </title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{admin_asset('vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{admin_asset('vendor/fonts/circular-std/style.css')}}">
    @include('admin::layouts.plugins', ['type' => 'css'])

    @yield('admin_css_pre')

    <link rel="stylesheet" href="{{admin_asset('libs/css/style.css')}}">

    @yield('admin_css')

    <link rel="stylesheet" href="{{admin_asset('vendor/fonts/fontawesome/css/fontawesome-all.css')}}">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    @if(config("admin.use_notify_module"))
        @notify_css
    @elseif(config("admin.use_notifications_module"))
        @notifications_css
    @elseif(config("admin.use_flash_module"))
        {{--        thisng tos t do--}}
    @endif

    <link rel="icon" type="image/png" sizes="16x16" href="{{admin_uploads(get_setting('admin_favicon','all'))}}">

{{--    @if(config('admin.use_ico_only'))--}}
{{--        <link rel="shortcut icon" href="{{ admin_asset('favicons/favicon.ico') }}"/>--}}
{{--    @elseif(config('admin.use_full_favicon'))--}}
{{--        <link rel="shortcut icon" href="{{ admin_asset('favicons/favicon.ico') }}"/>--}}
{{--        <link rel="apple-touch-icon" sizes="57x57" href="{{ admin_asset('favicons/apple-icon-57x57.png') }}">--}}
{{--        <link rel="apple-touch-icon" sizes="60x60" href="{{ admin_asset('favicons/apple-icon-60x60.png') }}">--}}
{{--        <link rel="apple-touch-icon" sizes="72x72" href="{{ admin_asset('favicons/apple-icon-72x72.png') }}">--}}
{{--        <link rel="apple-touch-icon" sizes="76x76" href="{{ admin_asset('favicons/apple-icon-76x76.png') }}">--}}
{{--        <link rel="apple-touch-icon" sizes="114x114" href="{{ admin_asset('favicons/apple-icon-114x114.png') }}">--}}
{{--        <link rel="apple-touch-icon" sizes="120x120" href="{{ admin_asset('favicons/apple-icon-120x120.png') }}">--}}
{{--        <link rel="apple-touch-icon" sizes="144x144" href="{{ admin_asset('favicons/apple-icon-144x144.png') }}">--}}
{{--        <link rel="apple-touch-icon" sizes="152x152" href="{{ admin_asset('favicons/apple-icon-152x152.png') }}">--}}
{{--        <link rel="apple-touch-icon" sizes="180x180" href="{{ admin_asset('favicons/apple-icon-180x180.png') }}">--}}
{{--        <link rel="icon" type="image/png" sizes="16x16" href="{{ admin_asset('favicons/favicon-16x16.png') }}">--}}
{{--        <link rel="icon" type="image/png" sizes="32x32" href="{{ admin_asset('favicons/favicon-32x32.png') }}">--}}
{{--        <link rel="icon" type="image/png" sizes="96x96" href="{{ admin_asset('favicons/favicon-96x96.png') }}">--}}
{{--        <link rel="icon" type="image/png" sizes="192x192" href="{{ admin_asset('favicons/android-icon-192x192.png') }}">--}}
{{--        <link rel="manifest" href="{{ admin_asset('favicons/manifest.json') }}">--}}
{{--        <meta name="msapplication-TileColor" content="#ffffff">--}}
{{--        <meta name="msapplication-TileImage" content="{{ admin_asset('favicon/ms-icon-144x144.png') }}">--}}
{{--    @endif--}}

    <style>
        .invalid-feedback {
            display: block !important;
        }
        select.form-control {
            -webkit-appearance: button;
            -moz-appearance: button;
        }
        .menu-list {
            padding-bottom: 75px;
        }
    </style>

    {!! get_setting("admin_custom_css","admin") !!}
</head>

<body class="@yield('classes_body')" @yield('body_data')>

@yield("body")

<!-- Optional JavaScript -->
<script src="{{admin_asset('vendor/jquery/jquery-3.3.1.min.js')}}"></script>
<script src="{{admin_asset('vendor/bootstrap/js/bootstrap.bundle.js')}}"></script>
<script src="{{admin_asset('vendor/slimscroll/jquery.slimscroll.js')}}"></script>
<script src="{{admin_asset('libs/js/main-js.js')}}"></script>

@include('notifications::messages')

@if(config("admin.use_notify_module"))
    @notify_js
    @notify_render
@elseif(config("admin.use_notifications_module"))
    @notifications_js
@elseif(config("admin.use_flash_module"))
    {{--    @notifications_js--}}
@endif

@include('admin::layouts.plugins', ['type' => 'js'])
@yield('admin_js')
<script>
    (function ($) {
        $(document).on('click', '#selectAllFooter, #selectAllTop', function() {
            if ($(this).val() === 'Check All') {
                $(".selectem").prop('checked', true);
                $(this).val('Uncheck All');
                $("#selectAllTop, #selectAllFooter").prop("checked", true);
            } else {
                $(".selectem").prop('checked', false);
                $(this).val('Check All');
                $("#selectAllTop, #selectAllFooter").prop("checked", false);
            }
        });
    })(jQuery);
</script>
{!! get_setting("admin_custom_js","admin") !!}
</body>

</html>
