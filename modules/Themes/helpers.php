<?php

use Illuminate\Config\Repository;

if (function_exists('get_current_theme')) {
} else {
    /**
     * get the current theme class
     * @return Repository|mixed
     */
}
function get_current_theme()
{
    return config("themes.default");
}
