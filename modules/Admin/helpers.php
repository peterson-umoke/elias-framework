<?php

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Factory;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\StatefulGuard;

if (!function_exists('admin_asset')) {
    /**
     * used to generate url endpoint to admin assets
     *
     * @param string $assets
     * @param bool $secure
     * @return string
     */
    function admin_asset($assets, $secure = false)
    {
        return asset("modules/Admin/Assets/" . $assets, $secure);
    }
}

if (!function_exists('admin_url')) {
    /**
     * @param $url
     * @return mixed
     */
    function admin_url($url)
    {
        return url("admin/" . $url);
    }
}

if (!function_exists('admin_route')) {
    /**
     * @param $route
     * @return mixed
     */
    function admin_route($route)
    {
        return route("admin." . $route);
    }
}

if (!function_exists("admin_auth")) {
    /**
     * returns the currently logged in admin
     *
     * @return Authenticatable|Factory|Guard|StatefulGuard
     */
    function admin_auth()
    {
        return auth(config("admin.auth_guard"));
    }
}

if (!function_exists("current_admin")) {
    /**
     * returns the currently logged in admin
     *
     * @return Authenticatable
     */
    function current_admin()
    {
        return admin_auth()->user();
    }
}


if (!function_exists("admin_uploads")) {
    /**
     * used to generate link to uploads path
     *
     * @param $path
     * @param bool $secure
     * @return string
     */
    function admin_uploads($path, $secure = false)
    {
        return asset("modules/Admin/Uploads/" . $path, $secure);
    }
}


if (!function_exists("get_setting")) {
    /**
     * used to get settings easily
     *
     * @param $meta_key
     * @param string $channel
     * @return string
     */
    function get_setting($meta_key, $channel = "all")
    {
        $setting = new \Modules\Admin\Entities\Setting();
        return $setting->get_setting_value($meta_key, $channel);
    }
}
