<div class="tab-regular">
    <ul class="nav nav-tabs " id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
               aria-selected="true">Site</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
               aria-selected="false">Admin</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group row">
                        {!! Form::label('img_site_logo', 'Site Logo:',["class" => "col-form-label col-sm-auto"]) !!}
                        <div class="col">
                            {!! Form::file('img_site_logo', ['class' => 'form-control-file'])!!}
                            @error('img_site_logo')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <br>
                            @if($settings->get_setting_value("site_logo", $channel))
                                <div class="row row align-items-center">
                                    <div class="col">
                                        <img
                                            src="{{admin_uploads($settings->get_setting_value("site_logo", $channel))}}"
                                            alt="" class="img-fluid">
                                    </div>
                                    <div class="col">
                                        <a href="{{route("admin.settings.delete",[$channel, "img_site_logo"])}}"
                                           class="btn btn-danger">Delete</a>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="col-2">
                            {!! Form::number('site_logo_size_width',$settings->get_setting_value("site_logo_size_width", $channel), ['class' => 'form-control', "placeholder" => "Width"])!!}
                            @error('site_logo_size_width')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <span>*</span>
                        <div class="col-2">
                            {!! Form::number('site_logo_size_height',$settings->get_setting_value("site_logo_size_height", $channel), ['class' => 'form-control', "placeholder" => "Height"])!!}
                            @error('site_logo_size_height')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        {!! Form::label('img_site_favicon', 'Site Favicon:',["class" => "col-form-label col-sm-auto"]) !!}
                        <div class="col">
                            {!! Form::file('img_site_favicon', ['class' => 'form-control-file'])!!}
                            @error('img_site_favicon')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <br>
                            @if($settings->get_setting_value("site_favicon", $channel))
                                <div class="row row align-items-center">
                                    <div class="col">
                                        <img
                                            src="{{admin_uploads($settings->get_setting_value("site_favicon", $channel))}}"
                                            alt="" class="img-fluid">
                                    </div>
                                    <div class="col">
                                        <a href="{{route("admin.settings.delete",[$channel, "img_site_favicon"])}}"
                                           class="btn btn-danger">Delete</a>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="col-2">
                            {!! Form::number('site_favicon_size_width',$settings->get_setting_value("site_favicon_size_width", $channel), ['class' => 'form-control', "placeholder" => "Width"])!!}
                            @error('site_favicon_size_width')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <span>*</span>
                        <div class="col-2">
                            {!! Form::number('site_favicon_size_height',$settings->get_setting_value("site_favicon_size_height", $channel), ['class' => 'form-control', "placeholder" => "Height"])!!}
                            @error('site_favicon_size_height')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group row">
                        {!! Form::label('img_admin_logo', 'Admin Logo:',["class" => "col-form-label col-sm-auto"]) !!}
                        <div class="col">
                            {!! Form::file('img_admin_logo', ['class' => 'form-control-file'])!!}
                            @error('img_admin_logo')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <br>
                            @if(!empty($settings->get_setting_value("admin_logo", $channel)))
                                <div class="row row align-items-center">
                                    <div class="col">
                                        <img
                                            src="{{admin_uploads($settings->get_setting_value("admin_logo", $channel))}}"
                                            alt="" class="img-fluid">
                                    </div>
                                    <div class="col">
                                        <a href="{{route("admin.settings.delete",[$channel, "img_admin_logo"])}}"
                                           class="btn btn-danger">Delete</a>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="col-2">
                            {!! Form::number('admin_logo_size_width',$settings->get_setting_value("admin_logo_size_width", $channel), ['class' => 'form-control', "placeholder" => "Width"])!!}
                            @error('admin_logo_size_width')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <span>*</span>
                        <div class="col-2">
                            {!! Form::number('admin_logo_size_height',$settings->get_setting_value("admin_logo_size_height", $channel), ['class' => 'form-control', "placeholder" => "Height"])!!}
                            @error('admin_logo_size_height')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        {!! Form::label('img_admin_favicon', 'Admin Favicon:',["class" => "col-form-label col-sm-auto"]) !!}
                        <div class="col">
                            {!! Form::file('img_admin_favicon', ['class' => 'form-control-file'])!!}
                            @error('img_admin_favicon')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <br>
                            @if($settings->get_setting_value("admin_favicon", $channel))
                                <div class="row row align-items-center">
                                    <div class="col">
                                        <img
                                            src="{{admin_uploads($settings->get_setting_value("admin_favicon", $channel))}}"
                                            alt="" class="img-fluid">
                                    </div>
                                    <div class="col">
                                        <a href="{{route("admin.settings.delete",[$channel, "img_admin_favicon"])}}"
                                           class="btn btn-danger">Delete</a>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="col-2">
                            {!! Form::number('admin_favicon_size_width',$settings->get_setting_value("admin_favicon_size_width", $channel), ['class' => 'form-control', "placeholder" => "Width"])!!}
                            @error('admin_favicon_size_width')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <span>*</span>
                        <div class="col-2">
                            {!! Form::number('admin_favicon_size_height',$settings->get_setting_value("admin_favicon_size_height", $channel), ['class' => 'form-control', "placeholder" => "Height"])!!}
                            @error('admin_favicon_size_height')
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
