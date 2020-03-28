<?php

return [
    'role_structure' => [
        'superadministrator' => [
//            'customers' => 'a,c,r,u,d',
            'admins' => 'a,c,r,u,d',
            'settings' => 'a,r,u',
            'acl' => 'a,c,r,u,d',
//            'pages' => 'a,c,r,u,d',
//            'posts' => 'a,c,r,u,d',
            'profile' => 'r,u'
        ],
        'administrator' => [
//            'users' => 'a,c,r,u,d',
//            'pages' => 'a,c,r,u,d',
//            'posts' => 'a,c,r,u,d',
            'admins' => 'a,c,r,u',
            'settings' => 'a,r,u',
            'profile' => 'r,u'
        ],
    ],
    'permissions_map' => [
        'a' => 'access',
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
