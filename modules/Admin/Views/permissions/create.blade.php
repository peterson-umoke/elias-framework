@extends("admin::layouts.page")
@section("title",$title)
@section("page_title",$title)
@section("page_breadcrumbs",Breadcrumbs::render("admin.permissions.create", $title))
@section("content")
    {!! Form::open(['route' => 'admin.permissions.store', 'method' => 'post']) !!}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <div class="form-group row">
                        {!! Form::label('title', 'Title:',["class" => "col-form-label col-sm-auto"]) !!}
                        <div class="col">
                            {!! Form::text('title',null, ['class' => 'form-control'])!!}
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
                            {!! Form::text('name',null, ['class' => 'form-control'])!!}
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
                            {!! Form::textarea('description',null, ['class' => 'form-control'])!!}
                            @error('description')
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
            <a href="{{route("admin.permissions.index")}}" class="btn btn-primary">Cancel</a>
            <button type="submit" class="btn btn-success">{{$title}}</button>
        </div>
    </div>

    {!! Form::close() !!}
@endsection
