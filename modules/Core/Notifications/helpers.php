<?php

use Modules\Core\Notifications\Helpers\Notifications;

if (! function_exists('notification')) {
    /**
     * Notify.
     *
     * @param  string|null  $message
     * @param  string|null  $title
     * @return Notifications
     */
    function notification(string $message = null, string $title = null)
    {
        $notify = app('notifications');

        if (! is_null($message)) {
            return $notify->success($message, $title);
        }

        return $notify;
    }
}

if (! function_exists('connectify')) {
    /**
     * Connectify.
     *
     * @param  string  $type
     * @param  string  $title
     * @param  string  $message
     * @return Notifications
     */
    function connectify(string $type, string $title, string $message)
    {
        return app('notifications')->connect($type, $title, $message);
    }
}

if (! function_exists('drakify')) {
    /**
     * Drakify.
     *
     * @param  string  $type
     * @return Notifications
     */
    function drakify(string $type)
    {
        return app('notifications')->drake($type);
    }
}

if (! function_exists('smilify')) {
    /**
     * Smilify.
     *
     * @param  string  $type
     * @param  string|null  $message
     * @return Notifications
     */
    function smilify(string $type, string $message)
    {
        return app('notifications')->smiley($type, $message);
    }
}
if (! function_exists('emotify')) {
    /**
     * Emotify.
     *
     * @param  string  $type
     * @param  string|null  $message
     * @return Notifications
     */
    function emotify(string $type, string $message)
    {
        return app('notifications')->emotify($type, $message);
    }
}

if (! function_exists('notifications_js')) {
    /**
     * @return string
     */
    function notifications_js(): string
    {
        return '<script type="text/javascript" src="'.asset('modules/Core/Notifications/Assets/js/notify.js').'"></script>';
    }
}

if (! function_exists('notifications_css')) {
    /**
     * @return string
     */
    function notifications_css(): string
    {
        return '<link rel="stylesheet" type="text/css" href="'.asset('modules/Core/Notifications/Assets/css/notify.css').'"/>';
    }
}
