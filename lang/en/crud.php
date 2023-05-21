<?php

return [
    'common' => [
        'actions' => 'Actions',
        'create' => 'Create',
        'edit' => 'Edit',
        'update' => 'Update',
        'new' => 'New',
        'cancel' => 'Cancel',
        'attach' => 'Attach',
        'detach' => 'Detach',
        'save' => 'Save',
        'delete' => 'Delete',
        'delete_selected' => 'Delete selected',
        'search' => 'Search...',
        'back' => 'Back to Index',
        'are_you_sure' => 'Are you sure?',
        'no_items_found' => 'No items found',
        'created' => 'Successfully created',
        'saved' => 'Saved successfully',
        'removed' => 'Successfully removed',
    ],

    'users' => [
        'name' => 'Users',
        'index_title' => 'Users List',
        'new_title' => 'New User',
        'create_title' => 'Create User',
        'edit_title' => 'Edit User',
        'show_title' => 'Show User',
        'inputs' => [
            'name' => 'Name',
            'email' => 'Email',
            'password' => 'Password',
            'role' => 'Role',
            'phone' => 'Phone',
            'address' => 'Address',
            'city' => 'City',
            'state' => 'State',
        ],
    ],

    'carts' => [
        'name' => 'Carts',
        'index_title' => 'Carts List',
        'new_title' => 'New Cart',
        'create_title' => 'Create Cart',
        'edit_title' => 'Edit Cart',
        'show_title' => 'Show Cart',
        'inputs' => [
            'product_id' => 'Product Id',
            'user_id' => 'User',
            'session' => 'Session',
            'quantity' => 'Quantity',
        ],
    ],

    'categories' => [
        'name' => 'Categories',
        'index_title' => 'Categories List',
        'new_title' => 'New Category',
        'create_title' => 'Create Category',
        'edit_title' => 'Edit Category',
        'show_title' => 'Show Category',
        'inputs' => [
            'name' => 'Name',
            'position' => 'Position',
            'parent_id' => 'Parent Id',
            'product_id' => 'Product',
        ],
    ],

    'logs' => [
        'name' => 'Logs',
        'index_title' => 'Logs List',
        'new_title' => 'New Log',
        'create_title' => 'Create Log',
        'edit_title' => 'Edit Log',
        'show_title' => 'Show Log',
        'inputs' => [
            'action' => 'Action',
            'user_id' => 'User Id',
            'description' => 'Description',
            'data' => 'Data',
        ],
    ],

    'orders' => [
        'name' => 'Orders',
        'index_title' => 'Orders List',
        'new_title' => 'New Order',
        'create_title' => 'Create Order',
        'edit_title' => 'Edit Order',
        'show_title' => 'Show Order',
        'inputs' => [
            'user_id' => 'User',
            'contact_email' => 'Contact Email',
            'contact_phone' => 'Contact Phone',
            'name' => 'Name',
            'payment_ref' => 'Payment Ref',
            'transaction_id' => 'Transaction Id',
            'address_line_1' => 'Address Line 1',
            'address_line_2' => 'Address Line 2',
            'state' => 'State',
            'city' => 'City',
            'country' => 'Country',
            'sub_total' => 'Sub Total',
            'discount' => 'Discount',
            'shipping_total' => 'Shipping Total',
            'order_status' => 'Order Status',
            'payment_status' => 'Payment Status',
            'payment_response' => 'Payment Response',
        ],
    ],

    'order_items' => [
        'name' => 'Order Items',
        'index_title' => 'OrderItems List',
        'new_title' => 'New Order item',
        'create_title' => 'Create OrderItem',
        'edit_title' => 'Edit OrderItem',
        'show_title' => 'Show OrderItem',
        'inputs' => [
            'order_id' => 'Order Id',
            'product_id' => 'Product Id',
            'quantity' => 'Quantity',
            'price' => 'Price',
        ],
    ],

    'products' => [
        'name' => 'Products',
        'index_title' => 'Products List',
        'new_title' => 'New Product',
        'create_title' => 'Create Product',
        'edit_title' => 'Edit Product',
        'show_title' => 'Show Product',
        'inputs' => [
            'name' => 'Name',
            'category_id' => 'Category',
            'quantity' => 'Quantity',
            'image' => 'Image',
            'image_2' => 'Alternate Image',
            'thumbnail' => 'Thumbnail',
            'slug' => 'Slug',
            'weight' => 'Weight',
            'height' => 'Height',
            'length' => 'Length',
            'price' => 'Price',
            'sale_price' => 'Sale Price',
            'sale_start' => 'Sale Start',
            'sale_end' => 'Sale End',
            'description' => 'Description',
            'short_description' => 'Short Description',
            'type' => 'Type',
            'shipping_price' => 'Shipping Price',
            'download_link' => 'Download Link',
        ],
    ],

    'settings' => [
        'name' => 'Settings',
        'index_title' => 'Settings List',
        'new_title' => 'New Setting',
        'create_title' => 'Create Setting',
        'edit_title' => 'Edit Setting',
        'show_title' => 'Show Setting',
        'inputs' => [
            'key' => 'Key',
            'value' => 'Value',
        ],
    ],

    'reviews' => [
        'name' => 'Reviews',
        'index_title' => 'Reviews List',
        'new_title' => 'New Review',
        'create_title' => 'Create Review',
        'edit_title' => 'Edit Review',
        'show_title' => 'Show Review',
        'inputs' => [
            'user_id' => 'User',
            'rating' => 'Rating',
            'message' => 'Message',
            'visibility' => 'Visibility',
            'product_id' => 'Product',
        ],
    ],

    'contents' => [
        'name' => 'Contents',
        'index_title' => 'Contents List',
        'new_title' => 'New Content',
        'create_title' => 'Create Content',
        'edit_title' => 'Edit Content',
        'show_title' => 'Show Content',
        'inputs' => [
            'page' => 'Page',
            'key' => 'Key',
            'value' => 'Value',
            'section' => 'Section',
            'type' => 'Type',
        ],
    ],
];
