<?php

return [

    /**
     * Routes available in the dashboard's sidebar
     */
    'sidebar' => [
        [
            'name' => 'Home',
            'route' => 'home',
        ],
        [
            'name' => 'Shop',
            'route' => 'shop.home',
        ],
        [
            'name' => 'Guides',
            'route' => 'guide.index',
        ],
        [
            'name' => 'Applications',
            'route' => 'applications.index',
        ],
        [
            'name' => 'Staff',
            'route' => 'staff.home',
        ]
    ],

    'link' => [
        'guide' => 'https://guide.arenacraft.it'
    ]


];
