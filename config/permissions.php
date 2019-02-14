<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 2/13/2019
 * Time: 10:34 AM
 */

return [
    'user' => [
        'staff' => [
            'name' => 'staff',
            'routes' => ['admin_staff', 'datatable_all_staff'],
            'description' => 'Able to see all staff',
            'children' => [
                'create' => [
                    'name' => 'Create staff member',
                    'routes' => ['admin_staff_new', 'admin_staff_new_post'],
                    'description' => 'Able to Create new member in staff',
                ],
                'edit' => [
                    'name' => 'Edit staff member details',
                    'routes' => ['admin_staff_edit'],
                    'description' => 'Edit staff member details',
                ]
            ]
        ],
        'customers' => [
            'name' => 'Customers',
            'routes' => ['admin_customers', 'datatable_all_users'],
            'description' => 'Able to see all staff',
            'children' => [
                'edit' => [
                    'name' => 'Edit Customer  details',
                    'routes' => ['admin_users_edit'],
                    'description' => 'Edit Customer details',
                ],
            ]
        ],
        'roles_mebership' => [
            'name' => 'Roles/Mebership',
            'routes' => ['admin_role_membership', 'datatable_all_roles'],
            'description' => 'Able to see roles',
            'children' => [

                'create' => [
                    'name' => 'Create role',
                    'routes' => ['admin_create_role', 'post_admin_create_role'],
                    'description' => 'Create Role',
                ],
                'edit' => [
                    'name' => 'Edit roles',
                    'routes' => ['admin_edit_role', 'post_admin_edit_role'],
                    'description' => 'Edit roles',
                ],
            ]
        ],
        'campaign' => [
            'name' => 'User Campaign',
            'routes' => ['admin_campaign', 'datatable_all_campigns'],
            'description' => 'Able to see all staff',
            'children' => [
                'edit' => [
                    'name' => 'Edit campaign  details',
                    'routes' => ['admin_campaign_edit', 'admin_campaign_edit_post'],
                    'description' => 'Edit campaign details',
                ],
                'create' => [
                    'name' => 'Create campaign  details',
                    'routes' => ['admin_campaign_create', 'admin_campaign_create_post'],
                    'description' => 'Create campaign details',
                ],
            ]
        ],
    ],
    'inventory' => [
        'inventory' => [
            'name' => 'Inventory',
            'routes' => ['admin_items'],
            'description' => 'Able inventory',
            'children' =>
                [
                    'create' => [
                        'name' => 'Create inventory item',
                        'routes' => ['admin_items_new', 'post_admin_items_new'],
                        'description' => 'Able to Create post',
                    ]
                ],
        ],
        'warehouses' => [
            'name' => 'Warehouses',
            'routes' => ['admin_warehouses'],
            'description' => 'Able inventory',
            'children' =>
                [
                    'create' => [
                        'name' => 'Create Warehouses',
                        'routes' => ['admin_warehouses_new', 'admin_warehouses_new_post'],
                        'description' => 'Able to Create Warehouses',
                    ]
                ],
        ],
        'purchase' => [
            'name' => 'Purchase',
            'routes' => ['admin_store_purchase'],
            'description' => 'Able inventory',
            'children' => [
                'create' => [
                    'name' => 'Create Purchase',
                    'routes' => ['admin_store_purchase_new', 'admin_store_purchase_get_stock_by_sku', 'admin_store_purchase_save'],
                    'description' => 'Able to Create Warehouses',
                ],
                'edit' => [
                    'name' => 'Edit Purchase',
                    'routes' => ['admin_store_purchase_edit', 'admin_store_purchase_get_stock_by_sku', 'admin_store_purchase_save'],
                    'description' => 'Able to Create Warehouses',
                ],
                'delete' => [
                    'name' => 'Delete Purchase',
                    'routes' => ['admin_store_purchase_delete'],
                    'description' => 'Able to Create Warehouses',
                ]
            ],
        ],
        'suppliers' => [
            'name' => 'Suppliers',
            'routes' => ['admin_suppliers'],
            'description' => 'Able inventory',
            'children' => [
                'create' => [
                    'name' => 'Create Suppliers',
                    'routes' => ['admin_suppliers_new', 'post_admin_suppliers', 'post_admin_suppliers_list', 'post_admin_suppliers_sync'],
                    'description' => 'Able to Create suppliers',
                ],
                'edit' => [
                    'name' => 'Edit Purchase',
                    'routes' => ['admin_suppliers_edit', 'post_admin_suppliers_list', 'post_admin_suppliers_sync'],
                    'description' => 'Able to Create Warehouses',
                ],
                'delete' => [
                    'name' => 'Delete suppliers',
                    'routes' => ['post_admin_suppliers_item_delete'],
                    'description' => 'Able to Create suppliers',
                ]
            ],
        ],
        'other' => [
            'name' => 'other',
            'routes' => ['admin_inventory_other'],
            'description' => 'Able to see others',
            'children' => [
                'create' => [
                    'name' => 'Create other',
                    'routes' => ['post_admin_inventory_others_new', 'admin_inventory_others_new'],
                    'description' => 'Able to Create suppliers',
                ],
                'edit' => [
                    'name' => 'Edit other',
                    'routes' => ['admin_inventory_others_new', 'post_admin_inventory_others_new'],
                    'description' => 'Able to Create Warehouses',
                ]
            ],
        ],
    ],
    'store' => [
        'stock' => [
            'name' => 'Stock',
            'routes' => ['admin_stock'],
            'description' => 'Able to see stock',
            'children' =>
                [
                    'create' => [
                        'name' => 'Create stock item',
                        'routes' => [
                            'admin_stock_new',
                            'admin_stock_save',
                            'admin_stock_link_all',
                            'admin_stock_promotion_edit',
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
                    ],
                    'edit' => [
                        'name' => 'Create stock item',
                        'routes' => [
                            'admin_stock_edit',
                            'admin_stock_save',
                            'admin_stock_link_all',
                            'admin_stock_promotion_edit',
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
                    ],
                ],
        ],
        'orders' => [
            'name' => 'Orders',
            'routes' => ['admin_orders'],
            'description' => 'Able to see  Orders',
            'children' => [

                'create' => [
                    'name' => 'Create  Order',
                    'routes' => [
                        'admin_orders_new',
                        'orders_add_note',
                        'admin_orders_settings_save',
                        'orders_get_product',
                        'admin_orders_collecting',
                        'admin_orders_get_user',
                        'admin_orders_add_user',
                        'shop_add_to_cart_orders',
                        'shop_update_cart_orders',
                        'shop_remove_from_cart_orders',
                        'admin_orders_apply_coupon',
                        'admin_orders_apply_customer_notes',
                        'admin_orders_new_cash',
                        'admin_orders_new_cash'
                    ],
                    'description' => 'Able to Create Order',
                ],
                'edit' => [
                    'name' => 'Edit Order',
                    'routes' => [
                        'admin_orders_manage',
                        'orders_add_note',
                        'admin_orders_settings_save',
                        'orders_get_product',
                        'admin_orders_collecting',
                        'admin_orders_get_user',
                        'admin_orders_add_user',
                        'shop_add_to_cart_orders',
                        'shop_update_cart_orders',
                        'shop_remove_from_cart_orders',
                        'admin_orders_apply_coupon',
                        'admin_orders_apply_customer_notes',
                        'admin_orders_new_cash',
                        'admin_orders_new_cash'
                    ],
                    'description' => 'Edit order',
                ]
            ],
        ],
        'transactions' => [
            'name' => 'Transactions',
            'routes' => ['admin_store_transactions','admin_store_transactions_view'],
            'description' => 'Able to see  Orders',
            'children' => [],
        ],
        'Coupons' => [
            'name' => 'Orders',
            'routes' => ['admin_store_coupons'],
            'description' => 'Able to see coupons',
            'children' => [

                'create' => [
                    'name' => 'Create  Order',
                    'routes' => [
                        'admin_store_coupons_new',
                        'admin_store_coupons_theme',
                        'admin_store_coupons_save',
                    ],
                    'description' => 'Able to Create Order',
                ],
                'edit' => [
                    'name' => 'Edit coupon',
                    'routes' => [
                        'admin_store_coupons_edit',
                        'admin_store_coupons_save',
                        'admin_store_coupons_theme',
                        'admin_store_coupons_cancel',
                    ],
                    'description' => 'Edit coupon',
                ],
                'delete' => [
                    'name' => 'Delete coupon',
                    'routes' => [
                        'admin_store_coupons_delete',
                    ],
                    'description' => 'Delete coupon',
                ]
            ],
        ],


    ],
    'blog' => [
        'posts' => [
            'name' => 'Posts',
            'routes' => ['admin_blog'],
            'description' => 'Able to see blog page',
            'children' => [
                'create' => [
                    'name' => 'Create Post',
                    'routes' => ['admin_blog_create', 'admin_new_post'],
                    'description' => 'Able to Create post',
                ],
                'edit' => [
                    'name' => 'Edit Post',
                    'routes' => ['admin_post_edit'],
                    'description' => 'Edit any post',
                ],
                'delete' => [
                    'name' => 'Delete Post',
                    'routes' => ['admin_post_delete'],
                    'description' => 'Able to Delete post',
                ],
            ],

        ],
        'comments' => [
            'name' => 'Comments',
            'routes' => ['show_comments'],
            'description' => 'Able to see all comments',
            'children' => [
                'edit' => [
                    'name' => 'Edit Post Comment',
                    'routes' => ['approve_comments', 'unapprove_comments', 'edit_comment', 'reply_comment', 'reply_comment_post', 'edit_comment_post'],
                    'description' => 'Approve or cancel pending Comment ',
                ],
                'delete' => [
                    'name' => 'Delete Post comment',
                    'routes' => ['delete_comments'],
                    'description' => 'Delete or edit comment',
                ],
            ],

        ],
    ],
];

//'attributes' => [
//    'name' => 'Attributes',
//    'routes' => ['admin_store_attributes'],
//    'description' => 'Able to see  Attributes',
//    'children' => [
//
//        'create' => [
//            'name' => 'Create  Attribute',
//            'routes' => [
//                'admin_store_attributes_new',
//                'admin_store_attributes_options_form',
//                'admin_store_attributes_option_delete',
//                'admin_store_attributes_options',
//                'admin_store_attributes_options_by_id',
//                'admin_store_attributes_options_by_id_autocomplate',
//                'admin_store_attributes_by_id',
//                'admin_store_attributes_all_post',
//                'admin_store_attributes_delete',
//                'admin_store_attributes_variations_table',
//            ],
//            'description' => 'Able to Create Attribute',
//        ],
//        'edit' => [
//            'name' => 'View inventory item purchases',
//            'routes' => [
//                'admin_store_attributes_edit',
//                'admin_store_attributes_post_edit',
//                'admin_store_attributes_options_form',
//                'admin_store_attributes_option_delete',
//                'admin_store_attributes_options',
//                'admin_store_attributes_options_by_id',
//                'admin_store_attributes_options_by_id_autocomplate',
//                'admin_store_attributes_by_id',
//                'admin_store_attributes_all_post',
//                'admin_store_attributes_delete',
//                'admin_store_attributes_variations_table',
//            ],
//            'description' => 'View orders related to items',
//        ]
//    ],
//]