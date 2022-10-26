<?php

return [

    'layout' => 'tabler::layouts.combined.index',

    'logo_path' => false,

    'navbar_links' => [
        [
            'name' => 'Dashboard',
            'icon' => 'home',
            'route_name' => 'home',
            'active' => 'home',
            'enabled' => true,
        ],
        [
            'name' => 'Administration',
            'icon' => 'adjustments',
            'route_name' => 'home',
            'active' => 'tabler.admin',
            'enabled' => true,
            'children' => [
                [
                    'name' => 'Users',
                    'icon' => 'users',
                    'route_name' => 'tabler.admin.user.index',
                ],
                [
                    'name' => 'Access Control',
                    'icon' => 'lock',
                    'route_name' => 'tabler.admin.role.index',
                ],
                [
                    'name' => 'Activity Logs',
                    'icon' => 'sock',
                    'route_name' => 'tabler.admin.activity.index',
                ]
            ]
        ],
    ],

    'datetime_format' => 'd/m/Y h:i A'
];
