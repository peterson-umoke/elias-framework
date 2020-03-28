<?php

return [
    [
        'text' => 'search',
        'search' => true,
        'topnav' => true,
    ],
    [
        'text' => 'blog',
        'url' => 'admin/blog',
        'can' => 'manage-blog',
    ],
    [
        'text' => 'pages',
        'url' => 'admin/pages',
        'icon' => 'far fa-fw fa-file',
        'label' => 4,
        'label_color' => 'success',
    ],
    ['header' => 'account_settings'],
    [
        'text' => 'profile',
        'url' => 'admin/settings',
        'icon' => 'fas fa-fw fa-user',
    ],
    [
        'text' => 'change_password',
        'url' => 'admin/settings',
        'icon' => 'fas fa-fw fa-lock',
    ],
    [
        'text' => 'multilevel',
        'icon' => 'fas fa-fw fa-share',
        'submenu' => [
            [
                'text' => 'level_one',
                'url' => '#',
            ],
            [
                'text' => 'level_one',
                'url' => '#',
                'submenu' => [
                    [
                        'text' => 'level_two',
                        'url' => '#',
                    ],
                    [
                        'text' => 'level_two',
                        'url' => '#',
                        'submenu' => [
                            [
                                'text' => 'level_three',
                                'url' => '#',
                            ],
                            [
                                'text' => 'level_three',
                                'url' => '#',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'text' => 'level_one',
                'url' => '#',
            ],
        ],
    ],
    ['header' => 'labels'],
    [
        'text' => 'important',
        'icon_color' => 'red',
    ],
    [
        'text' => 'warning',
        'icon_color' => 'yellow',
    ],
    [
        'text' => 'information',
        'icon_color' => 'aqua',
    ],
];
