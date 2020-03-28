@extends("admin::layouts.page")
@section("title",$title)
@section("page_title",$title)
@section("page_breadcrumbs",Breadcrumbs::render("admin.roles.edit", $title, $role->id))
@section("content")
    {!! Form::open(['route' => ['admin.roles.update', $role->id], 'method' => 'put']) !!}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <div class="form-group row">
                        {!! Form::label('title', 'Title:',["class" => "col-form-label col-sm-auto"]) !!}
                        <div class="col">
                            {!! Form::text('title',$role->title, ['class' => 'form-control'])!!}
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        {!! Form::label('name', 'Key:',["class" => "col-form-label col-sm-auto"]) !!}
                        <div class="col">
                            {!! Form::text('name',$role->name, ['class' => 'form-control'])!!}
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group row">
                        {!! Form::label('description', 'Description:',["class" => "col-form-label col-sm-auto"]) !!}
                        <div class="col">
                            {!! Form::textarea('description',$role->description, ['class' => 'form-control'])!!}
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        {!! Form::label('permissions[]', 'Permissions:',["class" => "col-form-label col-sm-auto"]) !!}
                        <div class="col">
                            {!! Form::select('permissions[]',$permissions,$permission, ['multiple' => 'multiple', "id" => "keep-over"])!!}
                            @error('permissions]')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-12">
            <a href="{{route("admin.roles.index")}}" class="btn btn-primary">Cancel</a>
            <button type="submit" class="btn btn-success">{{$title}}</button>
        </div>
    </div>

    {!! Form::close() !!}
@endsection

@push("css")
    <link rel="stylesheet" href="{{admin_asset("vendor/multi-select/css/multi-select.css")}}">
@endpush
@push("js")
    <script src="{{admin_asset("vendor/multi-select/js/jquery.multi-select.js")}}"></script>
    <script>
        (function ($) {
            $(function () {
                $('#keep-over').multiSelect({keepOrder: true});
            });
        })(jQuery);
    </script>
@endpush
