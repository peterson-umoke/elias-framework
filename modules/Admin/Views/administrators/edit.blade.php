@extends("admin::layouts.page")
@section("title",$title)
@section("page_title",$title)
@section("page_breadcrumbs",Breadcrumbs::render("admin.admins.edit", $title, $admin->id))
@section("content")
    {!! Form::open(['route' => ['admin.admins.update', $admin->id], 'method' => 'put']) !!}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <div class="form-group row">
                        {!! Form::label('first_name', 'First Name:',["class" => "col-form-label col-sm-auto"]) !!}
                        <div class="col">
                            {!! Form::text('first_name',$admin->first_name, ['class' => 'form-control'])!!}
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
                            {!! Form::text('last_name',$admin->last_name, ['class' => 'form-control'])!!}
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
                <div class="col-6">
                    <div class="form-group row">
                        {!! Form::label('role', 'Choose Role:',["class" => "col-form-label col-sm-auto"]) !!}
                        <div class="col">
                            {!! Form::select('role', $roles, $role, ['class' => 'form-control']) !!}
                            @error('role')
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
            <button type="submit" class="btn btn-success">Update Administrator Account</button>
        </div>
    </div>

    {!! Form::close() !!}
@endsection
