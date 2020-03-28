<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group row">
                            {!! Form::label('mail_username', null,["class" => "col-form-label col-sm-5"]) !!}
                            <div class="col">
                                {!! Form::text('mail_username',$settings->get_setting_value("mail_username", $channel), ['class' => 'form-control'])!!}
                                @error('mail_username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            {!! Form::label('mail_password', null,["class" => "col-form-label col-sm-5"]) !!}
                            <div class="col">
                                {!! Form::text('mail_password',$settings->get_setting_value("mail_password", $channel), ['class' => 'form-control'])!!}
                                @error('mail_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            {!! Form::label('mail_port',null,["class" => "col-form-label col-sm-5"]) !!}
                            <div class="col">
                                {!! Form::number('mail_port',$settings->get_setting_value("mail_port", $channel), ['class' => 'form-control'])!!}
                                @error('mail_port')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            {!! Form::label('mail_encryption_type', null,["class" => "col-form-label col-sm-5"]) !!}
                            <div class="col">
                                {!! Form::select('mail_encryption_type',["tls" => "TLS","ssl" => "SSL"], $settings->get_setting_value("mail_encryption_type", $channel), ['class' => 'form-control'])!!}
                                @error('mail_encryption_type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            {!! Form::label('mail_host', null,["class" => "col-form-label col-sm-5"]) !!}
                            <div class="col">
                                {!! Form::text('mail_host',$settings->get_setting_value("mail_host", $channel), ['class' => 'form-control'])!!}
                                @error('mail_host')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            {!! Form::label('admin_email', "From Address",["class" => "col-form-label col-sm-5"]) !!}
                            <div class="col">
                                {!! Form::text('admin_email',$settings->get_setting_value("admin_email", $channel), ['class' => 'form-control',"type" => "email"])!!}
                                @error('admin_email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            {!! Form::label('admin_name', "From Name:",["class" => "col-form-label col-sm-5"]) !!}
                            <div class="col">
                                {!! Form::text('admin_name',$settings->get_setting_value("admin_name", $channel), ['class' => 'form-control'])!!}
                                @error('admin_name')
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
</div>
