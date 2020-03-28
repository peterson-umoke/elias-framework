<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    /**
     * Used to send notifications to the user interface for the user
     *
     * @param $message
     * @param string $type
     * @param string $title
     */
    protected function notify($message, $type = "success", $title = "Action Successful")
    {
        if (config("admin.use_notify_module")) {
            !empty($title) ? notify($message, $type, $title) : notify($message, $type);
        } elseif (config("admin.use_notifications_module")) {
            notification()->$type($message, $title);
        } elseif (config("admin.use_flash_module")) {
            flash($message, $type);
        }
    }
}
