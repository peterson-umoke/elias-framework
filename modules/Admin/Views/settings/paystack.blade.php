<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-8">
                <div class="form-group row">
                    {!! Form::label('paystack_secret_key', 'Secret Key:',["class" => "col-form-label col-sm-auto"]) !!}
                    <div class="col">
                        {!! Form::text('paystack_secret_key',$settings->get_setting_value("paystack_secret_key", $channel), ['class' => 'form-control'])!!}
                        @error('paystack_secret_key')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    {!! Form::label('paystack_public_key', 'Public Key:',["class" => "col-form-label col-sm-auto"]) !!}
                    <div class="col">
                        {!! Form::text('paystack_public_key',$settings->get_setting_value("paystack_public_key", $channel), ['class' => 'form-control'])!!}
                        @error('paystack_public_key')
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
