<?php

return [
    "use_notifications_module" => true,

    "use_notify_module" => false,

    "use_flash_module" => false,

    /**
     * Default Authentication Gaurad for the admins backend
     */

    'auth_guard' => 'admin',

    /*
   |--------------------------------------------------------------------------
   | Title
   |--------------------------------------------------------------------------
   |
   | Here you can change the default title of your admin panel.
   |
   | For more detailed instructions you can look here:
   |
   */

    'title' => 'Admin',
    'title_prefix' => '',
    'title_postfix' => '|| Admin Dashboard',

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon.
    |
    | For more detailed instructions you can look here:
    |
    */

    'use_ico_only' => false,
    'use_full_favicon' => false,

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For more detailed instructions you can look here:
    |
    */

    'logo' => 'Elias Framework',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For more detailed instructions you can look here:
    |
    */

    'use_route_url' => true,

    'dashboard_url' => 'admin.home',

    'logout_url' => 'admin.logout',

    'login_url' => 'admin.login',

    'password_reset_url' => 'admin.password.reset',

    'password_email_url' => 'admin.password.email',

    'profile_url' => "admin.profile",

    'footer_credits' => "Copyright © ". date("Y") .". All rights reserved."
];
