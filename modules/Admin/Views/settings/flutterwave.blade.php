<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-8">
                <div class="form-group row">
                    {!! Form::label('flutterwave_secret_key', 'Secret Key:',["class" => "col-form-label col-sm-auto"]) !!}
                    <div class="col">
                        {!! Form::text('flutterwave_secret_key',$settings->get_setting_value("flutterwave_secret_key", $channel), ['class' => 'form-control'])!!}
                        @error('flutterwave_secret_key')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    {!! Form::label('flutterwave_public_key', 'Public Key:',["class" => "col-form-label col-sm-auto"]) !!}
                    <div class="col">
                        {!! Form::text('flutterwave_public_key',$settings->get_setting_value("flutterwave_public_key", $channel), ['class' => 'form-control'])!!}
                        @error('flutterwave_public_key')
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
