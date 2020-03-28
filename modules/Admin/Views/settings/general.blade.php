<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group row">
                            {!! Form::label('site_name', 'Site Name:',["class" => "col-form-label col-sm-5"]) !!}
                            <div class="col">
                                {!! Form::text('site_name',$settings->get_setting_value("site_name", $channel), ['class' => 'form-control'])!!}
                                @error('site_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            {!! Form::label('site_tagline', 'Site Tagline:',["class" => "col-form-label col-sm-5"]) !!}
                            <div class="col">
                                {!! Form::text('site_tagline',$settings->get_setting_value("site_tagline", $channel), ['class' => 'form-control'])!!}
                                @error('site_tagline')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            {!! Form::label('allow_seo', 'Search Engine Optimization:',["style" => "padding-left:1rem;", "class" => "col-form-label col-sm-5 custom-control custom-checkbox"]) !!}
                            <div class="col">
                                {{Form::select("allow_seo",["1" => "Yes", "0" => "No"], $settings->get_setting_value("allow_seo", $channel), ["class" => "form-control"])}}
                                @error('allow_seo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            {!! Form::label('allow_logo_for_site_name', 'Replace Logo With Site Name:',["style" => "padding-left:1rem;", "class" => "col-form-label col-sm-5 custom-control custom-checkbox"]) !!}
                            <div class="col">
                                {{Form::select("allow_logo_for_site_name",["1" => "Yes", "0" => "No"], $settings->get_setting_value("allow_logo_for_site_name", $channel), ["class" => "form-control"])}}
                                @error('allow_logo_for_site_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            {!! Form::label('allow_logo_for_admin_name', 'Replace Logo With Admin Name:',["style" => "padding-left:1rem;", "class" => "col-form-label col-sm-5 custom-control custom-checkbox"]) !!}
                            <div class="col">
                                {{Form::select("allow_logo_for_admin_name",["1" => "Yes", "0" => "No"], $settings->get_setting_value("allow_logo_for_admin_name", $channel), ["class" => "form-control"])}}
                                @error('allow_logo_for_admin_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            {!! Form::label('dynamic_front_page', 'Use Dynamic FrontPage:',["style" => "padding-left:1rem;", "class" => "col-form-label col-sm-5 custom-control custom-checkbox"]) !!}
                            <div class="col">
                                {{Form::select("dynamic_front_page",["1" => "Yes", "0" => "No"], $settings->get_setting_value("dynamic_front_page", $channel), ["class" => "form-control"])}}
                                @error('dynamic_front_page')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        @if($settings->get_setting_value("dynamic_front_page", $channel))
                            <div class="form-group row">
                                {!! Form::label('front_page', 'Choose FrontPage:',["style" => "padding-left:1rem;", "class" => "col-form-label col-sm-5 custom-control custom-checkbox"]) !!}
                                <div class="col">
                                    {{Form::select("front_page",\Modules\Page\Entities\Page::all()->mapWithKeys(function($data) {
        return [$data->id => $data->title];
    }), $settings->get_setting_value("front_page", $channel), ["class" => "form-control"])}}
                                    @error('front_page')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@push("js")

    <script>
        (function ($) {
            $(document).ready(function () {
                var check =
            });
        })(jQuery);

    </script>

@endpush
