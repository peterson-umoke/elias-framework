<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Modules\Admin\Entities\Setting;

class SettingsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware("admin.authenticate:admin");
    }

    public function settings_page($channel, $page)
    {
        abort_unless(current_admin()->can('update-settings'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $title = str_replace(array("-", "_", "settings"), " ", $page);
        $title = ucwords($title) . " Settings";
        return view("admin::settings.index", compact('page', 'channel', 'title'));
    }

    public function save_settings(Request $request, $channel)
    {
        abort_unless(current_admin()->can('update-settings'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // save the settings
        $settings = new Setting;
        foreach ($request->except("_token") as $key => $value) {

            // handle image uploads
            if ($request->hasFile($request->key) && Str::is("img_*", $key)) {
                $storeAs = "settings";
                $file_key = Str::replaceFirst("img_", "", $key);
                $path = module_path("Admin", "Uploads/$storeAs");

                // delete old files
                $get_old_values = $settings->get_setting_value($file_key, $channel);
                Storage::disk('admin')->delete($get_old_values);


                $file = $request->file($key);
                $file_extension = $request->file($key)->getClientOriginalExtension();
                $file_name = uniqid() . "." . $file_extension;
                $file->move($path, $file_name);

                // save the data
                $key = $file_key;
                $value = $storeAs . "/" . $file_name;
            }

            // save json data
            $searchJSon = "toJSON_";
            $search = substr($key, 0, 7);
            if($search == $searchJSon) {
                $new_key = str_replace($search, "", $key);
                $value = json_encode($request->$key);
                $key = $new_key;
            }

            $settings->save_setting($key, $value, $channel);
        }

        $this->notify("Settings Saved Successfully");
        return redirect()->back();
    }

    public function delete_setting(Request $request, $channel, $key)
    {
        abort_unless(current_admin()->can('update-settings'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $settings = new Setting;
        if (Str::is("img_*", $key)) {
            $key = Str::replaceFirst("img_", "", $key);

            // delete old files
            $get_old_values = $settings->get_setting_value($key, $channel);
            Storage::disk('admin')->delete($get_old_values);
        }

        $settings->save_setting($key, "", $channel);

        $this->notify("Settings Updated Successfully");
        return redirect()->back();
    }
}
