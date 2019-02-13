<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 2/13/2019
 * Time: 10:34 AM
 */
return [
    'user' => [
        [
            'name' => 'View all staff',
            'routes' => ['admin_staff'],
            'description' => 'Able to see all staff',
            'children' => [
                [
                    'name' => 'Create staff member',
                    'routes' => ['admin_staff_new', 'admin_staff_new_post'],
                    'description' => 'Able to Create new member in staff',
                ],
                [
                    'name' => 'Edit staff member details',
                    'routes' => ['admin_staff_edit'],
                    'description' => 'Edit staff member details',
                ]
            ]
        ],
        [
            'name' => 'View all Customers',
            'routes' => ['admin_customers'],
            'description' => 'Able to see all staff',
            'children' => [

                [
                    'name' => 'Edit Customer  details',
                    'routes' => ['admin_users_edit'],
                    'description' => 'Edit Customer details',
                ],
            ]
        ],
    ],
    'blog' => [
        [
            'name' => 'View All Posts',
            'routes' => ['admin_blog'],
            'description' => 'Able to see blog page',
            'children' => [
                [
                    'name' => 'Create Post',
                    'routes' => ['admin_blog_create', 'admin_new_post'],
                    'description' => 'Able to Create post',
                ],
                [
                    'name' => 'Edit Post',
                    'routes' => ['admin_post_edit'],
                    'description' => 'Edit any post',
                ],
                [
                    'name' => 'Delete Post',
                    'routes' => ['admin_post_delete'],
                    'description' => 'Able to Delete post',
                ],
            ],
            [
                [
                    'name' => 'View All Post Comments Page',
                    'routes' => ['show_comments', 'admin_new_post'],
                    'description' => 'Able to see all comments',
                ],
                [
                    'name' => 'Edit Post Comment',
                    'routes' => ['approve_comments', 'unapprove_comments', 'edit_comment', 'edit_comment_post'],
                    'description' => 'Approve or cancel pending Comment ',
                ],
                [
                    'name' => 'Replay Post comment',
                    'routes' => ['reply_comment', 'reply_comment_post'],
                    'description' => 'Delete or edit comment',
                ],
            ],
        ],
    ],
    'inventory' => [
        [
            'name' => 'View inventory',
            'routes' => ['admin_items'],
            'description' => 'Able inventory',
            'children' =>
                [
                    [
                        'name' => 'Create inventory item',
                        'routes' => ['admin_items_new', 'post_admin_items_new'],
                        'description' => 'Able to Create post',
                    ],
                    [
                        'name' => 'View inventory item purchases',
                        'routes' => ['admin_items_purchase'],
                        'description' => 'View orders related to items',
                    ]
                ],
        ],
    ],
    'store' => [
        [
            'name' => 'View stock ',
            'routes' => ['admin_stock'],
            'description' => 'Able to see all stock',
            'children' => [
                [
                    'name' => 'Create inventory item',
                    'routes' => [
                        'admin_stock_save',
                        'admin_stock_new',
                        'admin_stock_get_promotion',
                        'admin_stock_sales_save',
                        'admin_stock_cancel_delete',
                        'admin_stock_save',
                        'admin_stock_link_all',
                        'admin_stock_variation_form',
                        'admin_stock_variation_add',
                        'admin_stock_package_variation_add',
                        'admin_stock_variation_add',
                        'admin_stock_variation_get_option',
                        'admin_stock_variation_get_specification',
                        'admin_stock_variation_render_new_option',
                        'admin_stock_get_by_id',
                        'admin_stock_get_variations_by_id',
                        'admin_stock_extra_option',
                        'admin_stock_extra_option_variations',
                        'admin_stock_extra_option_save',
                    ],
                    'description' => 'Able to Create post',
                ], [
                    'name' => 'Edit inventory item',
                    'routes' =>
                        [
                            'admin_stock_save',
                            'admin_stock_edit',
                            'admin_stock_get_promotion',
                            'admin_stock_sales_save',
                            'admin_stock_cancel_delete',
                            'admin_stock_save',
                            'admin_stock_link_all',
                            'admin_stock_variation_form',
                            'admin_stock_variation_add',
                            'admin_stock_package_variation_add',
                            'admin_stock_variation_add',
                            'admin_stock_variation_get_option',
                            'admin_stock_variation_get_specification',
                            'admin_stock_variation_render_new_option',
                            'admin_stock_get_by_id',
                            'admin_stock_get_variations_by_id',
                            'admin_stock_extra_option',
                            'admin_stock_extra_option_variations',
                            'admin_stock_extra_option_save',
                        ],
                    'description' => 'Able to Create post',
                ], [
                    'name' => 'Edit inventory item',
                    'routes' => ['admin_stock_save', 'admin_stock_edit'],
                    'description' => 'Able to Create post',
                ],
            ],
        ],
        [
            'name' => 'View all Attributes',
            'routes' => ['admin_store_attributes'],
            'description' => 'Able to see  Attributes',
            'children' => [

                [
                    'name' => 'Create  Attribute',
                    'routes' => [
                        'admin_store_attributes_new',
                        'admin_store_attributes_options_form',
                        'admin_store_attributes_option_delete',
                        'admin_store_attributes_options',
                        'admin_store_attributes_options_by_id',
                        'admin_store_attributes_options_by_id_autocomplate',
                        'admin_store_attributes_by_id',
                        'admin_store_attributes_all_post',
                        'admin_store_attributes_delete',
                        'admin_store_attributes_variations_table',
                    ],
                    'description' => 'Able to Create Attribute',
                ],
                [
                    'name' => 'View inventory item purchases',
                    'routes' => [
                        'admin_store_attributes_edit',
                        'admin_store_attributes_post_edit',
                        'admin_store_attributes_options_form',
                        'admin_store_attributes_option_delete',
                        'admin_store_attributes_options',
                        'admin_store_attributes_options_by_id',
                        'admin_store_attributes_options_by_id_autocomplate',
                        'admin_store_attributes_by_id',
                        'admin_store_attributes_all_post',
                        'admin_store_attributes_delete',
                        'admin_store_attributes_variations_table',
                    ],
                    'description' => 'View orders related to items',
                ]
            ],
        ]
    ],


];