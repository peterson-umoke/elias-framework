<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group row">
                    {!! Form::label('toJSON_payment_options', "Preferred Payment Options",["class" => "col-form-label col-sm-auto"]) !!}
                    <div class="col">
                        {!! Form::select('toJSON_payment_options[]',["Paystack" => "Paystack", "Flutterwave" => "Flutterwave", "Bank Payments" => "Bank Payments"],json_decode($settings->get_setting_value("payment_options", $channel)), ['multiple' => 'multiple', "id" => "keep-over"])!!}
                        @error('toJSON_payment_options')
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

{{--{{dd($settings->get_setting_value("payment_options", $channel))}}--}}

@push("css")
    <link rel="stylesheet" href="{{admin_asset("vendor/multi-select/css/multi-select.css")}}">
@endpush
@push("js")
    <script src="{{admin_asset("vendor/multi-select/js/jquery.multi-select.js")}}"></script>
    <script>
        (function($){
            $(function(){
                $('#keep-over').multiSelect({ keepOrder: true });
            });
        })(jQuery);
    </script>
@endpush
