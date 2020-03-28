@extends("admin::layouts.page")
@section("title",$title)
@section("page_title",$title)
@section("page_breadcrumbs",Breadcrumbs::render("admin.admins.create", $title))
@section("content")
    {!! Form::open(['route' => 'admin.admins.store', 'method' => 'post']) !!}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <div class="form-group row">
                        {!! Form::label('first_name', 'First Name:',["class" => "col-form-label col-sm-auto"]) !!}
                        <div class="col">
                            {!! Form::text('first_name',null, ['class' => 'form-control'])!!}
                            @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        {!! Form::label('last_name', 'Last Name:',["class" => "col-form-label col-sm-auto"]) !!}
                        <div class="col">
                            {!! Form::text('last_name',null, ['class' => 'form-control'])!!}
                            @error('last_name')
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
                        {!! Form::label('email', 'Email Address:',["class" => "col-form-label col-sm-auto"]) !!}
                        <div class="col">
                            {!! Form::text('email',null, ['class' => 'form-control','type' => 'email'])!!}
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        {!! Form::label('role', 'Choose Role:',["class" => "col-form-label col-sm-auto"]) !!}
                        <div class="col">
                            {!! Form::select('role', $roles, null, ['class' => 'form-control']) !!}
                            @error('role')
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
                        {!! Form::label('password', 'Password:',["class" => "col-form-label col-sm-auto"]) !!}
                        <div class="col">
                            {!! Form::password('password', ['class' => 'form-control'])!!}
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        {!! Form::label('password_confirmation', 'Confirm Password:',["class" => "col-form-label col-sm-auto"]) !!}
                        <div class="col">
                            {!! Form::password('password_confirmation',['class' => 'form-control'])!!}
                            @error('last_name')
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
            <a href="{{route("admin.admins.index")}}" class="btn btn-primary">Cancel</a>
            <button type="submit" class="btn btn-success">Create Administrator Account</button>
        </div>
    </div>

    {!! Form::close() !!}
@endsection
