@extends("admin::layouts.page")
@section("title",$title)
@section("page_title",$title)
@section("page_breadcrumbs",Breadcrumbs::render("admin.profile.password.change", $title))
@section("content")

    {!! Form::open(['route' => ['admin.profile.password.change.save'],"method" => "put"]) !!}

    <div class="row">
        <div class="col-12">
            <div class="card">
                <h5 class="card-header">Use the Form to change your password</h5>
                <div class="card-body">
                    <div class="form-group row">
                        {!! Form::label('old_password', 'Old Password:',["class" => "col-form-label col-sm-2"]) !!}
                        <div class="col-sm-6">
                            {!! Form::password('old_password', ['class' => 'form-control'])!!}
                            @error('old_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        {!! Form::label('password', 'New Password:',["class" => "col-form-label col-sm-2"]) !!}
                        <div class="col-sm-6">
                            {!! Form::password('password', ['class' => 'form-control'])!!}
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        {!! Form::label('password_confirmation', 'Confirm Password:',["class" => "col-form-label col-sm-2"]) !!}
                        <div class="col-sm-6">
                            {!! Form::password('password_confirmation', ['class' => 'form-control'])!!}
                            @error('password_confirmation')
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
            <a href="{{route("admin.profile")}}" class="btn btn-primary">Cancel</a>
            <button type="submit" class="btn btn-success">Change Password</button>
        </div>
    </div>


    {!! Form::close() !!}

@endsection
