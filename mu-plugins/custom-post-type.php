<?php
// project
function project_post_types() {
    register_post_type('project',
        array(
            'supports' => array('title', 'editor', 'comments', 'excerpt', 'custom-fields', 'thumbnail'),
            'rewrite' => array('slug' => 'project', 'with_front' => false), // 'with_front' set to false
            'has_archive' => true,
            'public' => true,
            'show_in_rest' => true, // For block editor support
            'labels' => array(
                'name' => 'کمپین',
                'add_new' => 'افزودن کمپین جدید',
                'add_new_item' => 'افزودن کمپین جدید',
                'edit_item' => 'ویرایش کمپین',
                'all_items' => 'همه ی کمپین‌ها',
                'singular_name' => 'کمپین'
            ),
            'menu_icon' => 'dashicons-portfolio'
        )
    );

    register_taxonomy(
        'portfolio_categories',
        'project',
        array(
            'hierarchical' => true,
            'label' => 'دسته بندی کمپین',
            'query_var' => true,
            'rewrite' => array('slug' => 'project-categories', 'with_front' => false), // 'with_front' added
            'show_in_rest' => true
        )
    );
}
add_action('init', 'project_post_types');
// Services
function services_post_types() {
    register_post_type('service',
        array(
            'supports' => array('title', 'editor', 'comments', 'excerpt', 'custom-fields', 'thumbnail'),
            'rewrite' => array('slug' => 'services', 'with_front' => false), // 'with_front' set to false
            'has_archive' => true,
            'public' => true,
            'show_in_rest' => true,
            'labels' => array(
                'name' => 'خدمات',
                'add_new' => 'افزودن خدمت جدید',
                'add_new_item' => 'افزودن خدمت جدید',
                'edit_item' => 'ویرایش خدمات',
                'all_items' => 'همه ی خدمات',
                'singular_name' => 'خدمات'
            ),
            'menu_icon' => 'dashicons-lightbulb'
        )
    );

    register_taxonomy(
        'services_categories',
        'service',
        array(
            'hierarchical' => true,
            'label' => 'دسته بندی خدمات',
            'query_var' => true,
            'rewrite' => array('slug' => 'services-categories', 'with_front' => false), // 'with_front' added
            'show_in_rest' => true
        )
    );
}
add_action('init', 'services_post_types');

// Clients
function clients_post_types() {
    register_post_type('client',
        array(
            'supports' => array('title', 'editor', 'custom-fields', 'thumbnail'),
            'rewrite' => array('slug' => 'clients', 'with_front' => false), // 'with_front' set to false
            'has_archive' => true,
            'public' => true,
            'show_in_rest' => true,
            'labels' => array(
                'name' => 'مشتریان',
                'add_new' => 'افزودن مشتری جدید',
                'add_new_item' => 'افزودن مشتری جدید',
                'edit_item' => 'ویرایش مشتری',
                'all_items' => 'همه ی مشتریان',
                'singular_name' => 'مشتری'
            ),
            'menu_icon' => 'dashicons-businessperson'
        )
    );

    register_taxonomy(
        'clients_categories',
        'client',
        array(
            'hierarchical' => true,
            'label' => 'دسته بندی مشتریان',
            'query_var' => true,
            'rewrite' => array('slug' => 'clients-categories', 'with_front' => false), // 'with_front' added
            'show_in_rest' => true
        )
    );
}
add_action('init', 'clients_post_types');

// Set 'with_front' parameter to false for custom post types
function custom_post_type_args($args, $post_type) {
    if (in_array($post_type, array('project', 'service', 'client'))) {
        $args['rewrite']['with_front'] = false;
    }
    return $args;
}
add_filter('register_post_type_args', 'custom_post_type_args', 10, 2);