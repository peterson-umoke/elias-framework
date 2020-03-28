<?php

return [
    [
        [
            "text" => "Total Administrators",
            "html" => Modules\Admin\Entities\Admin::count(),
            "can" => "create-admins",
        ],
        [
            "text" => "Total Roles",
            "html" => Modules\Admin\Entities\Role::count(),
            "can" => "create-acl",
        ],
        [
            "text" => "Total Permissions",
            "html" => Modules\Admin\Entities\Permission::count(),
            "can" => "create-acl",
        ],
    ],
];
