<?php

return [
    'categories' => [
        'Active' => 1,
        'Close' => 0,
    ],
    'banners' => [
        'Active' => 1,
        'Inactive' => 0,
    ],
    'settings' => [
        'Active' => 1,
        'Inactive' => 0,
    ],
    'colors' => [
        'Active' => 1,
        'Inactive' => 0,
    ],
    'sizes' => [
        'Active' => 1,
        'Inactive' => 0,
    ],
    'posts' => [
        'status' => [
            'Active' => 1,
            'Inactive' => 0,
        ],
        'highlight' => [
            'Normal' => 0,
            'Special' => 1
        ]
    ],
    'products' => [
        'status' => [
            'Active' => 1,
            'Inactive' => 0,
        ],
        'highlight' => [
            'Normal' => 0,
            'Special' => 1
        ]
    ],
    'users' => [
        'status' => [
            'Active' => 1,
            'Inactive' => 0,
        ],
        'gender' => [
            'Male' => 1,
            'Female' => 0,
        ],
        'role' => [
            'Admin' => 0,
            'Staff' => 1,
            'User' => 2,
        ],
        'email_verified' => [
            'Active' => 1,
            'Close' => 0,
        ]
    ],
    'permissons' => [
        'Category' => [
            'list-category' => 'list_category',
            'add-category' => 'add_category',
            'edit-category' => 'edit_category',
            'delete-category' => 'delete_category',
        ],
        'Products' => [
            'list-products' => 'list_product',
            'add-products' => 'add_product',
            'edit-products' => 'edit_product',
            'delete-products' => 'delete_product',
            'detail-products' => 'detail_product'
        ],
        'Colors' => [
            'list-colors' => 'list_color',
            'add-colors' => 'add_color',
            'edit-colors' => 'edit_color',
            'delete-colors' => 'delete_color',
        ],
        'Sizes' => [
            'list-sizes' => 'list_size',
            'add-sizes' => 'add_size',
            'edit-sizes' => 'edit_size',
            'delete-sizes' => 'delete_size',
        ],
        'Posts' => [
            'list-posts' => 'list_post',
            'add-posts' => 'add_post',
            'edit-posts' => 'edit_post',
            'delete-posts' => 'delete_post',
            'detail-posts' => 'detail_post',

        ],
        'Banners' => [
            'list-banners' => 'list_banner',
            'add-banners' => 'add_banner',
            'edit-banners' => 'edit_banner',
            'delete-banners' => 'delete_banner',
        ],
        'Settings' => [
            'list-settings' => 'list_setting',
            'add-settings' => 'add_setting',
            'edit-settings' => 'edit_setting',
            'delete-settings' => 'delete_setting',
        ],
        'Roles' => [
            'list-roles' => 'list_role',
            'add-roles' => 'add_role',
            'edit-roles' => 'edit_role',
            'delete-roles' => 'delete_role',
        ],
        'Permissions' => [
            'list-permission' => 'list_permission',
            'add-permission' => 'add_permission',
            'edit-permission' => 'edit_permission',
            'delete-permission' => 'delete_permission',
        ],
        'Users' => [
            'list-users' => 'list_user',
            'add-users' => 'add_user',
            'edit-users' => 'edit_user',
            'delete-users' => 'delete_user',
            'detail-users'=>'detail_user'
        ],
        'Admin' => [
            'list-admin' => 'admin',
        ],
        'Comments'=>[
            'list-comments'=>'list_comments',
            'show-comments'=>'show_comments',
            'delete-comments'=>'delete_comments',
            'edit-comments'=>'update_comments'
        ]
    ],
    "Rating" => [
        'rat_te' => 1,
        'te' => 2,
        'trung_binh' => 3,
        'tot' => 4,
        'rat_tot' => 5,
    ],

    'Comments' => [
        'status' => [
            'Active' => 1,
            'Inactive' => 0,
        ],
    ]


];
