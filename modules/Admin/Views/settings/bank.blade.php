<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-8">
                <div class="form-group row">
                    {!! Form::label('bank_name', null,["class" => "col-form-label col-sm-auto"]) !!}
                    <div class="col">
                        {!! Form::text('bank_name',$settings->get_setting_value("bank_name", $channel), ['class' => 'form-control'])!!}
                        @error('bank_name')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    {!! Form::label('account_number', null,["class" => "col-form-label col-sm-auto"]) !!}
                    <div class="col">
                        {!! Form::text('account_number',$settings->get_setting_value("account_number", $channel), ['class' => 'form-control'])!!}
                        @error('account_number')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    {!! Form::label('account_name', null,["class" => "col-form-label col-sm-auto"]) !!}
                    <div class="col">
                        {!! Form::text('account_name',$settings->get_setting_value("account_name", $channel), ['class' => 'form-control'])!!}
                        @error('account_name')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    {!! Form::label('account_type', null,["class" => "col-form-label col-sm-auto"]) !!}
                    <div class="col">
                        {!! Form::select('account_type',["Current Account" => "Current Account", "Savings Account" => "Savings Account", "Credit Account" => "Credit Account"],$settings->get_setting_value("account_type", $channel), ['class' => 'form-control'])!!}
                        @error('account_type')
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
