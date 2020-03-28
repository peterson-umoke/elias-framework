<?php

return [
    [
        [
            'text' => 'Create Administrator',
            'route' => 'admin.admins.create',
            "icon" => "fas fa-fw fa-briefcase",
            "can" => "create-admins"
        ],
        [
            'text' => 'Create Roles',
            'route' => 'admin.roles.create',
            "icon" => "fas fa-fw fa-circle",
            "can" => "create-acl"
        ],
    ],
    [
        [
            'text' => 'Create Permissions',
            'route' => 'admin.permissions.create',
            "icon" => "fas fa-fw fa-briefcase",
            "can" => "create-acl"
        ],
    ],
];
