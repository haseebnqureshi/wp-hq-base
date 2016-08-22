<?php

	/* https://generatewp.com */
	$labels = array(
		'name'                  => 'Customs',
		'singular_name'         => 'Custom',
		'menu_name'             => 'Customs',
		'name_admin_bar'        => 'Custom',
		'archives'              => 'Custom Archives',
		'parent_item_colon'     => 'Parent Custom:',
		'all_items'             => 'Customs',
		'add_new_item'          => 'New Custom',
		'add_new'               => 'Add Custom',
		'new_item'              => 'New Custom',
		'edit_item'             => 'Edit Custom',
		'update_item'           => 'Update Custom',
		'view_item'             => 'View Custom',
		'search_items'          => 'Search Customs',
		'not_found'             => 'Not found',
		'not_found_in_trash'    => 'Not found in Trash',
		'featured_image'        => 'Featured Image',
		'set_featured_image'    => 'Set featured image',
		'remove_featured_image' => 'Remove featured image',
		'use_featured_image'    => 'Use as featured image',
		'insert_into_item'      => 'Insert into custom',
		'uploaded_to_this_item' => 'Uploaded to this custom',
		'items_list'            => 'Customs list',
		'items_list_navigation' => 'Customs list navigation',
		'filter_items_list'     => 'Filter customs list',
	);
	$args = array(
		'label'                 => 'Custom',
		'labels'                => $labels,
		'supports'              => array( 'title', 'author', 'thumbnail', 'comments', 'revisions', ),
		'taxonomies'            => array( 'labels' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_icon'				=> 'dashicons-welcome-widgets-menus',
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'customs', $args );

?>