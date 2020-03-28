@extends("admin::layouts.page")

@section("title", $title)
@section("page_title",$title)
@section("page_breadcrumbs", Breadcrumbs::render('admin.settings',$page, $channel))

@section('content')
    {!! Form::open(["route" => ["admin.settings.save", "channel" => $channel],"method" => "post","files" => true]) !!}
    @if(current_admin()->can("update-settings"))
        @include('admin::settings.actions')
    @endif

    @yield("before_settings_form")


    @includeIf('admin::settings.'.$page, ['settings' => new Modules\Admin\Entities\Setting])


    @yield("after_settings_form")

    @if(current_admin()->can("update-settings"))
        @include('admin::settings.actions')
    @endif
    {!! Form::close() !!}
@endsection
