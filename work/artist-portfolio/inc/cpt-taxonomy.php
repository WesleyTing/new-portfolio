<?php
function hb_register_custom_post_types() {

    // Gallery CPT
    $labels = array(
        'name'               => _x( 'Gallery', 'post type general name' ),
        'singular_name'      => _x( 'Series', 'post type singular name'),
        'menu_name'          => _x( 'Gallery', 'admin menu' ),
        'name_admin_bar'     => _x( 'Gallery', 'add new on admin bar' ),
        'add_new'            => _x( 'Add New', 'series' ),
        'add_new_item'       => __( 'Add New Series' ),
        'new_item'           => __( 'New Series' ),
        'edit_item'          => __( 'Edit Series' ),
        'view_item'          => __( 'View Series' ),
        'all_items'          => __( 'All Series' ),
        'search_items'       => __( 'Search Series' ),
        'parent_item_colon'  => __( 'Parent Series:' ),
        'not_found'          => __( 'No works found.' ),
        'not_found_in_trash' => __( 'No works found in Trash.' ),
        'archives'           => __( 'Series Archives'),
        'insert_into_item'   => __( 'Insert into work'),
        'uploaded_to_this_item' => __( 'Uploaded to this work'),
        'filter_item_list'   => __( 'Filter works list'),
        'items_list_navigation' => __( 'Series list navigation'),
        'items_list'         => __( 'Series list'),
        'featured_image'     => __( 'Series feature image'),
        'set_featured_image' => __( 'Set work feature image'),
        'remove_featured_image' => __( 'Remove work feature image'),
        'use_featured_image' => __( 'Use as feature image'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_nav_menus'  => true,
        'show_in_admin_bar'  => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'gallery' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-admin-customizer',
        'supports'           => array( 'title' ),
    );
    register_post_type( 'hb-gallery', $args );

    // Events CPT
    $labels = array(
        'name'               => _x( 'Events', 'post type general name' ),
        'singular_name'      => _x( 'Event', 'post type singular name' ),
        'menu_name'          => _x( 'Events', 'admin menu' ),
        'name_admin_bar'     => _x( 'Event', 'add new on admin bar' ),
        'add_new'            => _x( 'Add New', 'service'  ),
        'add_new_item'       => __( 'Add New Event'  ),
        'new_item'           => __( 'New Event' ),
        'edit_item'          => __( 'Edit Event' ),
        'view_item'          => __( 'View Event' ),
        'all_items'          => __( 'All Events'  ),
        'search_items'       => __( 'Search Events' ),
        'parent_item_colon'  => __( 'Parent Events:' ),
        'not_found'          => __( 'No services found.' ),
        'not_found_in_trash' => __( 'No services found in Trash.' ),
        'insert_into_item'   => __( 'Insert into service'),
        'uploaded_to_this_item' => __( 'Uploaded to this service'),
        );
    
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'events'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 6,
        'menu_icon'          => 'dashicons-buddicons-tracking',
        'supports'           => array( 'title', 'thumbnail' )
        );
    
    register_post_type( 'hb-events', $args );

    // Links CPT
    $labels = array(
        'name'               => _x( 'Links', 'post type general name'  ),
        'singular_name'      => _x( 'Link', 'post type singular name'  ),
        'menu_name'          => _x( 'Links', 'admin menu'  ),
        'name_admin_bar'     => _x( 'Link', 'add new on admin bar' ),
        'add_new'            => _x( 'Add New', 'link' ),
        'add_new_item'       => __( 'Add New Link' ),
        'new_item'           => __( 'New Link' ),
        'edit_item'          => __( 'Edit Link' ),
        'view_item'          => __( 'View Link'  ),
        'all_items'          => __( 'All Links' ),
        'search_items'       => __( 'Search Links' ),
        'parent_item_colon'  => __( 'Parent Links:' ),
        'not_found'          => __( 'No Links found.' ),
        'not_found_in_trash' => __( 'No Links found in Trash.' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'links' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-admin-links',
        'supports'           => array( 'title' )
    );

    register_post_type( 'hb-links', $args );
}
add_action( 'init', 'hb_register_custom_post_types' );

function hb_register_taxonomies() {
    // Add Gallery Category taxonomy
    $labels = array(
        'name'              => _x( 'Gallery Categories', 'taxonomy general name' ),
        'singular_name'     => _x( 'Gallery Category', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Gallery Categories' ),
        'all_items'         => __( 'All Gallery Category' ),
        'parent_item'       => __( 'Parent Gallery Category' ),
        'parent_item_colon' => __( 'Parent Gallery Category:' ),
        'edit_item'         => __( 'Edit Gallery Category' ),
        'view_item'         => __( 'Vview Gallery Category' ),
        'update_item'       => __( 'Update Gallery Category' ),
        'add_new_item'      => __( 'Add New Gallery Category' ),
        'new_item_name'     => __( 'New Gallery Category Name' ),
        'menu_name'         => __( 'Gallery Category' ),
    );
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_in_menu'      => true,
        'show_in_nav_menu'  => true,
        'show_in_rest'      => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'gallery-categories' ),
    );
    register_taxonomy( 'hb-gallery-category', array( 'hb-gallery' ), $args );

    // Add Link Category Taxonomy
    $labels = array(
        'name'              => _x( 'Links Categories', 'taxonomy general name' ),
        'singular_name'     => _x( 'Link Category', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Links Categories' ),
        'all_items'         => __( 'All Links Categories' ),
        'parent_item'       => __( 'Parent Link Category' ),
        'parent_item_colon' => __( 'Parent Link Category:' ),
        'edit_item'         => __( 'Edit Link Category' ),
        'update_item'       => __( 'Update Link Category' ),
        'add_new_item'      => __( 'Add New Link Category' ),
        'new_item_name'     => __( 'New Link Category Name' ),
        'menu_name'         => __( 'Link Category' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'links-category' ),
    );
    register_taxonomy( 'hb-links-category', array( 'hb-links' ), $args );
}
add_action( 'init', 'hb_register_taxonomies');

function hb_rewrite_flush() {
    hb_register_custom_post_types();
    hb_register_taxonomies();
    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'hb_rewrite_flush' );