<?php
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');

function theme_enqueue_styles() {
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
}


// Custom Post type

function create_custom_post_type_service() {
	$labels = array(
		'name' => 'Services',
		'singular_name' => 'Service',
		'add_new' => 'Add New',
		'add_new_item' => 'Add New Service',
		'edit_item' => 'Edit Service',
		'new_item' => 'New Service',
		'view_item' => 'View Service',
		'search_items' => 'Search Services',
		'not_found' => 'No Services found',
		'not_found_in_trash' => 'No Services found in Trash',
		'parent_item_colon' => '',
	);
	
	$args = array(
		'label' => __('services'),
		'labels' => $labels, // from array above
		'public' => true,
		'can_export' => true,
		'show_ui' => true,
		'_builtin' => false,
		'capability_type' => 'post',
		'menu_icon' => 'dashicons-hammer', // from this list
		'hierarchical' => false,
		'rewrite' => array( "slug" => "services" ), // defines URL base
		'supports'=> array('title', 'thumbnail', 'editor', 'excerpt'),
		'show_in_nav_menus' => true,
        'taxonomies' => array( 'service_category', 'post_tag'), // own categories
        'has_archive' => true
	);


	register_post_type('services', $args); // used as internal identifier

}

add_action('init','create_custom_post_type_service'); // define service custom post type