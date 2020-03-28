@extends('admin::layouts.page')
@section("title",$title)
@section("page_title",$title)
@section("page_breadcrumbs",Breadcrumbs::render("admin.parishioners.create", $title))

@section('content')
    {!! Form::open(['route' => 'admin.parishioners.store', 'method' => 'post',"files" => true]) !!}

    <div class="pills-regular">
        <ul class="nav nav-pills mb-1" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active show" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
                   aria-controls="home" aria-selected="true">Basic</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
                   aria-controls="profile" aria-selected="false">Secrement Details</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab"
                   aria-controls="contact" aria-selected="false">Society Details</a>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade active show" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="row">
                    <div class="col-2">
                        <div class="form-group row">
                            <div class="col">
                                {!! Form::label('title', null,["class" => "p-2 col-form-label col-sm-auto"]) !!}
                                {!! Form::select('title', ["Chief" => "Chief","Mr" => "Mr","Mrs" => "Mrs","Master" => "Master","Mistress" => "Mistress","Madam" => "Madam","Don" => "Don","Pastor" => "Pastor","Dr" => "Dr","Engr" => "Engr","Father" => "Father"],null, ['class' => 'form-control'])!!}
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
                            <div class="col">
                                {!! Form::label('surname', null,["class" => "p-2 col-form-label col-sm-auto"]) !!}
                                {!! Form::text('surname',null, ["placeholder" => "Surname", "style" => "", 'class' => 'p-2 form-control'])!!}
                                @error('surname')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group row">
                            <div class="col">
                                {!! Form::label('first_name', null,["class" => "p-2 col-form-label col-sm-auto"]) !!}
                                {!! Form::text('first_name',null, ["placeholder" => "First Name", "style" => "", 'class' => 'p-2 form-control'])!!}
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
                            <div class="col">
                                {!! Form::label('last_name', null,["class" => "p-2 col-form-label col-sm-auto"]) !!}
                                {!! Form::text('last_name',null, ["placeholder" => "Last Name", "style" => "", 'class' => 'p-2 form-control'])!!}
                                @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('profile_picture', 'Passport Photograph:',["class" => "p-2 col-form-label col-sm-auto"]) !!}
                    <div class="col">
                        {!! Form::file('profile_picture', ['class' => 'form-control-file'])!!}
                        @error('profile_picture')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-7">
                        <div class="form-group row">
                            {!! Form::label('address', 'Address:',["class" => "p-2 col-form-label col-sm-auto"]) !!}
                            <div class="col">
                                {!! Form::text('address', $parishioner->address ?? "", ['class' => 'form-control'])!!}
                                @error('address')
                                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group row">
                            {!! Form::label('email', null,["class" => "p-2 col-form-label col-sm-auto"]) !!}
                            <div class="col">
                                {!! Form::text('email', $parishioner->email ?? "", ['class' => 'form-control'])!!}
                                @error('address')
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
                            {!! Form::label('telephone_number', null,["class" => "p-2 col-form-label col-sm-auto"]) !!}
                            <div class="col">
                                {!! Form::text('telephone_number', null, ['class' => 'form-control'])!!}
                                @error('telephone_number')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group row">
                            {!! Form::label('gender', null,["class" => "p-2 col-form-label col-sm-auto"]) !!}
                            <div class="col">
                                {!! Form::select('gender', ["male" => "Male", "female" => "Female"],null, ['class' => 'form-control'])!!}
                                @error('gender')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group row">
                            {!! Form::label('marital_status', null,["class" => "p-2 col-form-label col-sm-auto"]) !!}
                            <div class="col">
                                {!! Form::select('marital_status', ["married" => "Married", "single" => "Single"],null, ['class' => 'form-control'])!!}
                                @error('marital_status')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <div class="form-group row">
                            {!! Form::label('whatsapp_number', null,["class" => "p-2 col-form-label col-sm-auto"]) !!}
                            <div class="col">
                                {!! Form::text('whatsapp_number', $parishioner->whatsapp_number ?? "", ['class' => 'form-control'])!!}
                                @error('whatsapp_number')
                                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group row">
                            {!! Form::label('small_christian_community', null,["class" => "p-2 col-form-label col-sm-auto"]) !!}
                            <div class="col">
                                {!! Form::text('small_christian_community', $parishioner->small_christian_community ?? "", ['class' => 'form-control'])!!}
                                @error('small_christian_community')
                                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('date_of_birth', null,["class" => "p-2 col-form-label col-sm-auto"]) !!}
                    <div class="col">
                        {!! Form::date('date_of_birth', \Carbon\Carbon::now(), ['class' => 'form-control',"type" => "date"])!!}
                        @error('date_of_birth')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group row">
                            {!! Form::label('state', 'State:',["class" => "p-2 col-form-label col-sm-auto"]) !!}
                            <div class="col">
                                {!! Form::text('state', null, ['class' => 'form-control'])!!}
                                @error('state')
                                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group row">
                            {!! Form::label('town', 'Town:',["class" => "p-2 col-form-label col-sm-auto"]) !!}
                            <div class="col">
                                {!! Form::text('town', null, ['class' => 'form-control'])!!}
                                @error('town')
                                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group row">
                            {!! Form::label('village', 'Village:',["class" => "p-2 col-form-label col-sm-auto"]) !!}
                            <div class="col">
                                {!! Form::text('village', null, ['class' => 'form-control'])!!}
                                @error('village')
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
                            {!! Form::label('parishioner_status', null,["class" => "p-2 col-form-label col-sm-auto"]) !!}
                            <div class="col">
                                {!! Form::select('parishioner_status', ["Employed" => "Employed", "Unemployed" => "Unemployed", "Student" => "Student", "Dependent" => "Dependent"],null, ['class' => 'form-control'])!!}
                                @error('parishioner_status')
                                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group row">
                            {!! Form::label('occupation', null,["class" => "p-2 col-form-label col-sm-auto"]) !!}
                            <div class="col">
                                {!! Form::text('occupation', null, ['class' => 'form-control'])!!}
                                @error('occupation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                @php
                    $fields = array("married","confirmed","communicant","baptized");
                @endphp

                @foreach($fields as $field)
                    <div class="row">
                        <div class="col">
                            <div class="form-group row">
                                {!! Form::label('are_you_' . $field, null,["class" => "p-2 col-form-label col-sm-auto"]) !!}
                                <div class="col">
                                    {!! Form::select('are_you_' . $field, [ "Yes" => "Yes","No" => "No"],null, ['class' => 'form-control'])!!}
                                    @error('are_you_' . $field)
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group row">
                                {!! Form::label($field . '_parish_name', null,["class" => "p-2 col-form-label col-sm-auto"]) !!}
                                <div class="col">
                                    {!! Form::text($field . '_parish_name', null, ['class' => 'form-control'])!!}
                                    @error($field . '_parish_name')
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
                                {!! Form::label($field . '_parish_state_town', null,["class" => "p-2 col-form-label col-sm-auto"]) !!}
                                <div class="col">
                                    {!! Form::text($field . '_parish_state_town', null, ['class' => 'form-control'])!!}
                                    @error($field . '_parish_state_town')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group row">
                                {!! Form::label($field . '_date', null,["class" => "p-2 col-form-label col-sm-auto"]) !!}
                                <div class="col">
                                    {!! Form::date($field . '_date', \Carbon\Carbon::now(), ['class' => 'form-control'])!!}
                                    @error($field . '_date')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                <div class="row">
                    <div class="col">
                        <div class="form-group row">
                            {!! Form::label('statutory_organization', null,["class" => "p-2 col-form-label col-sm-auto"]) !!}
                            <div class="col">
                                {!! Form::select('statutory_organization',["C.M.O" => "C.M.O", "C.W.O" => "C.W.O", "C.Y.O.N" => "C.Y.O.N", "None" => "None"],null, ['class' => 'form-control'])!!}
                                @error('statutory_organization')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group row">
                            {!! Form::label('are_you_society_member', "Are you are Memeber of a Society?",["class" => "p-2 col-form-label col-sm-auto"]) !!}
                            <div class="col">
                                {!! Form::select('are_you_society_member',[ "Yes" => "Yes","No" => "No"],null, ['class' => 'form-control'])!!}
                                @error('are_you_society_member')
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
                        <h4>If Yes, Name of Society?</h4>
                    </div>
                </div>

                @for($i = 1; $i<= 5; $i++)
                    <div class="form-group row">
                        <div class="col">
                            {!! Form::text('organisation_' . $i,null, ['class' => 'form-control', "placeholder" => "Enter Name Of Organisation"])!!}
                            @error('organisation_' . $i)
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                @endfor

                <div class="row">
                    <div class="col">
                        <div class="form-group row">
                            {!! Form::label('sunday_mass_attend', "What Sunday mass do you attend often?",["class" => "p-2 col-form-label col-sm-auto"]) !!}
                            <div class="col">
                                {!! Form::text('sunday_mass_attend',null, ['class' => 'form-control'])!!}
                                @error('sunday_mass_attend')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group row">
                            {!! Form::label('registration_number', "Registration Number?",["class" => "p-2 col-form-label col-sm-auto"]) !!}
                            <div class="col">
                                {!! Form::text('registration_number',null, ['class' => 'form-control'])!!}
                                @error('registration_number')
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
    </div>

    <br>

    @include("parishioner::buttons",["btnTitle" => "Create Parishioner"])
    {!! Form::close() !!}
@endsection
