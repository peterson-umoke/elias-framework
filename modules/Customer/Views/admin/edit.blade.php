@extends("admin::layouts.page")
@section("title",$title)
@section("page_title",$title)
@section("page_breadcrumbs",Breadcrumbs::render("admin.customers.edit", $title, $customer->id))
@section("content")
    {!! Form::open(['route' => ['admin.customers.update', $customer->id], 'method' => 'put']) !!}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <div class="form-group row">
                        {!! Form::label('first_name', 'First Name:',["class" => "col-form-label col-sm-auto"]) !!}
                        <div class="col">
                            {!! Form::text('first_name',$customer->first_name, ['class' => 'form-control'])!!}
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
                            {!! Form::text('last_name',$customer->last_name, ['class' => 'form-control'])!!}
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
                        {!! Form::label('phone_number', 'Phone Number:',["class" => "col-form-label col-sm-auto"]) !!}
                        <div class="col">
                            {!! Form::text('phone_number', $customer->phone_number, ['class' => 'form-control']) !!}
                            @error('phone_number')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group row">
                        {!! Form::label('email', 'Email:',["class" => "col-form-label col-sm-auto"]) !!}
                        <div class="col">
                            {!! Form::text('email', $customer->email, ['disabled' => 'disabled', 'class' => 'form-control']) !!}
                            @error('email')
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
            <a href="{{route("admin.customers.index")}}" class="btn btn-primary">Cancel</a>
            <button type="submit" class="btn btn-success">Update Customer Account</button>
        </div>
    </div>

    {!! Form::close() !!}
@endsection
