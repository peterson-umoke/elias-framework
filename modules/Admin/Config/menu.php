<?php

return [
    "sidebar" => [
        ['header' => 'General Menu'],
        [
            'text' => 'Dashboard',
            'url' => 'admin',
            'icon' => 'fa fa-fw fa-user-circle',
        ],
        [
            'text' => 'Administrators',
            'icon' => 'fa fa-fw fa-briefcase',
            "can" => ["access-admins"],
            'submenu' => [
                [
                    'text' => 'All Administrators',
                    'route' => 'admin.admins.index',
                    "can" => ["access-admins"],
                ],
                [
                    'text' => 'Create Administrator',
                    'route' => 'admin.admins.create',
                    "can" => ["create-admins"],
                ],
            ],
        ],
        [
            'text' => 'Customers',
            'icon' => 'fa fa-fw fa-users',
            "can" => ["access-customers"],
            'submenu' => [
                [
                    'text' => 'All Customers',
                    'route' => 'admin.customers.index',
                    "can" => ["access-customers"],
                ],
                [
                    'text' => 'Create Customer',
                    'route' => 'admin.customers.create',
                    "can" => ["create-customers"],
                ],
            ],
        ],
        [
            'text' => 'Roles',
            'icon' => 'fa fa-fw fa-circle',
            "can" => ["access-acl"],
            'submenu' => [
                [
                    'text' => 'All Roles',
                    'route' => 'admin.roles.index',
                    "can" => ["access-acl"],
                ],
                [
                    'text' => 'Create Role',
                    'route' => 'admin.roles.create',
                    "can" => ["create-acl"],
                ],
            ],
        ],
        [
            'text' => 'Permissions',
            'icon' => 'fa fa-fw fa-th',
            "can" => ["access-acl"],
            'submenu' => [
                [
                    'text' => 'All Permissions',
                    'route' => 'admin.permissions.index',
                    "can" => ["access-acl"],
                ],
                [
                    'text' => 'Create Permission',
                    'route' => 'admin.permissions.create',
                    "can" => ["create-acl"],
                ],
            ],
        ],
        ['header' => 'Site Settings', 'can' => 'access-settings'],
        [
            'text' => 'General Settings',
            'icon' => 'fa fa-fw fa-cog',
            'route' => ['admin.settings', ["channel" => "all", "page" => "general"]],
            "can" => ["access-settings"],
        ],
        [
            'text' => 'Logo & Favicon Settings',
            'icon' => 'fa fa-fw fa-cog',
            'route' => ['admin.settings', ["channel" => "all", "page" => "logo_and_favicon"]],
            "can" => ["access-settings"],
        ],
        [
            'text' => 'SMTP Settings',
            'icon' => 'fa fa-fw fa-cog',
            'route' => ['admin.settings', ["channel" => "all", "page" => "smtp"]],
            "can" => ["access-settings"],
        ],
        [
            'text' => 'Paystack Settings',
            'icon' => 'fa fa-fw fa-cog',
            'route' => ['admin.settings', ["channel" => "all", "page" => "paystack"]],
            "can" => ["access-settings"],
        ],
        [
            'text' => 'Flutterwave Settings',
            'icon' => 'fa fa-fw fa-cog',
            'route' => ['admin.settings', ["channel" => "all", "page" => "flutterwave"]],
            "can" => ["access-settings"],
        ],
        [
            'text' => 'Bank Settings',
            'icon' => 'fa fa-fw fa-cog',
            'route' => ['admin.settings', ["channel" => "all", "page" => "bank"]],
            "can" => ["access-settings"],
        ],
        [
            'text' => 'Payment Settings',
            'icon' => 'fa fa-fw fa-cog',
            'route' => ['admin.settings', ["channel" => "all", "page" => "payment"]],
            "can" => ["access-settings"],
        ],
        [
            'text' => 'Custom JS',
            'icon' => 'fab fa-fw fa-js',
            'route' => ['admin.settings', ["channel" => "site", "page" => "custom_js"]],
            "can" => ["access-settings"],
        ],
        [
            'text' => 'Custom CSS',
            'icon' => 'fab fa-fw fa-css3',
            'route' => ['admin.settings', ["channel" => "site", "page" => "custom_css"]],
            "can" => ["access-settings"],
        ],
        [
            'text' => 'Admin Custom JS',
            'icon' => 'fab fa-fw fa-js',
            'route' => ['admin.settings', ["channel" => "admin", "page" => "admin_custom_js"]],
            "can" => ["access-settings"],
        ],
        [
            'text' => 'Admin Custom CSS',
            'icon' => 'fab fa-fw fa-css3',
            'route' => ['admin.settings', ["channel" => "admin", "page" => "admin_custom_css"]],
            "can" => ["access-settings"],
        ],
        ["header" => "Content Management"],
        [
            'text' => 'Pages',
            'icon' => 'fa fa-fw fa-file',
            "can" => ["access-pages"],
            'submenu' => [
                [
                    'text' => 'All Pages',
                    'route' => 'admin.pages.index',
                    "can" => ["access-pages"],
                ],
                [
                    'text' => 'Create Page',
                    'route' => 'admin.pages.create',
                    "can" => ["create-pages"],
                ],
            ],
        ],
        [
            'text' => 'Posts',
            'icon' => 'fa fa-fw fa-file',
            "can" => ["access-posts"],
            'submenu' => [
                [
                    'text' => 'All Posts',
                    'route' => 'admin.posts.index',
                    "can" => ["access-posts"],
                ],
                [
                    'text' => 'Create Post',
                    'route' => 'admin.posts.create',
                    "can" => ["create-posts"],
                ],
                [
                    'text' => 'Categories',
                    'route' => 'admin.posts.categories.index',
                    "can" => ["access-categories"],
                ],
            ],
        ],
//        [
//            'text' => 'Categories',
//            'icon' => 'fa fa-fw fa-file',
//            "can" => ["access-categories"],
//            'submenu' => [
//                [
//                    'text' => 'All Categories',
//                    'route' => 'admin.categories.index',
//                    "can" => ["access-categories"],
//                ],
//                [
//                    'text' => 'Create Category',
//                    'route' => 'admin.categories.create',
//                    "can" => ["create-categories"],
//                ],
//            ],
//        ],
        ["header" => "Ecommerce Management"],
        [
            'text' => 'Products',
            'icon' => 'fa fa-fw fa-file',
            "can" => ["access-pages"],
            'submenu' => [
                [
                    'text' => 'All Products',
                    'route' => 'admin.pages.index',
                    "can" => ["access-pages"],
                ],
                [
                    'text' => 'Create Product',
                    'route' => 'admin.pages.create',
                    "can" => ["create-pages"],
                ],
                [
                    'text' => 'All Product Categories',
                    'route' => 'admin.pages.create',
                    "can" => ["create-pages"],
                ],
                [
                    'text' => 'Create Product Categories',
                    'route' => 'admin.pages.create',
                    "can" => ["create-pages"],
                ],
            ],
        ],
        [
            'text' => 'Videos',
            'icon' => 'fa fa-fw fa-file',
            "can" => ["access-pages"],
            'submenu' => [
                [
                    'text' => 'All Videos',
                    'route' => 'admin.pages.index',
                    "can" => ["access-pages"],
                ],
                [
                    'text' => 'Create Video',
                    'route' => 'admin.pages.create',
                    "can" => ["create-pages"],
                ],
                [
                    'text' => 'All Video Categories',
                    'route' => 'admin.pages.create',
                    "can" => ["create-pages"],
                ],
                [
                    'text' => 'Create Video Categories',
                    'route' => 'admin.pages.create',
                    "can" => ["create-pages"],
                ],
            ],
        ],
        [
            'text' => 'Orders',
            'icon' => 'fa fa-fw fa-file',
            "can" => ["access-pages"],
            'submenu' => [
                [
                    'text' => 'All Orders',
                    'route' => 'admin.pages.index',
                    "can" => ["access-pages"],
                ],
                [
                    'text' => 'Create Order',
                    'route' => 'admin.pages.create',
                    "can" => ["create-pages"],
                ],
            ],
        ],
        [
            'text' => 'Invoices',
            'icon' => 'fa fa-fw fa-file',
            "can" => ["access-pages"],
            'submenu' => [
                [
                    'text' => 'All Invoices',
                    'route' => 'admin.pages.index',
                    "can" => ["access-pages"],
                ],
                [
                    'text' => 'Create Invoice',
                    'route' => 'admin.pages.create',
                    "can" => ["create-pages"],
                ],
            ],
        ],
//        ['header' => "Others"],
//        [
//            'text' => 'Parishionerss',
//            'icon' => 'fa fa-fw fa-file',
//            "can" => ["access-parishioners"],
//            'submenu' => [
//                [
//                    'text' => 'All Parishionerss',
//                    'route' => 'admin.parishioners.index',
//                    "can" => ["access-parishioners"],
//                ],
//                [
//                    'text' => 'Create Parishioners',
//                    'route' => 'admin.parishioners.create',
//                    "can" => ["create-parishioners"],
//                ],
//            ],
//        ],
    ],
    "footer" => [],
    "topnav" => [
        "right" => []
    ],
    "user_profile" => [
        [
            'text' => 'View Site',
            'url' => '/',
            'icon' => 'fas fa-fw fa-eye',
            'target' => '_blank'
        ],
        [
            'text' => 'Change Password',
            'route' => 'admin.profile.password.change',
            'icon' => 'fas fa-fw fa-lock',
        ],
    ],
];
