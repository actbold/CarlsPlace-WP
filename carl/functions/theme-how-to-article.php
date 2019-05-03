<?php
	// Register Custom Post Type
function add_how_to_article() {

	$labels = array(
		'name'                  => _x( 'How to Articles', 'Post Type General Name', 'carl' ),
		'singular_name'         => _x( 'How to Article', 'Post Type Singular Name', 'carl' ),
		'menu_name'             => __( 'How To Articles', 'carl' ),
		'name_admin_bar'        => __( 'How To Article', 'carl' ),
		'archives'              => __( 'Item Archives', 'carl' ),
		'attributes'            => __( 'Item Attributes', 'carl' ),
		'parent_item_colon'     => __( 'Parent Item:', 'carl' ),
		'all_items'             => __( 'All Items', 'carl' ),
		'add_new_item'          => __( 'Add New Item', 'carl' ),
		'add_new'               => __( 'Add New', 'carl' ),
		'new_item'              => __( 'New Item', 'carl' ),
		'edit_item'             => __( 'Edit Item', 'carl' ),
		'update_item'           => __( 'Update Item', 'carl' ),
		'view_item'             => __( 'View Item', 'carl' ),
		'view_items'            => __( 'View Items', 'carl' ),
		'search_items'          => __( 'Search Item', 'carl' ),
		'not_found'             => __( 'Not found', 'carl' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'carl' ),
		'featured_image'        => __( 'Featured Image', 'carl' ),
		'set_featured_image'    => __( 'Set featured image', 'carl' ),
		'remove_featured_image' => __( 'Remove featured image', 'carl' ),
		'use_featured_image'    => __( 'Use as featured image', 'carl' ),
		'insert_into_item'      => __( 'Insert into item', 'carl' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'carl' ),
		'items_list'            => __( 'Items list', 'carl' ),
		'items_list_navigation' => __( 'Items list navigation', 'carl' ),
		'filter_items_list'     => __( 'Filter items list', 'carl' ),
	);
	//Change Permalink Structure
	$rewrite = array(
		'slug'                  => 'how-to-articles',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'How to Article', 'carl' ),
		'description'           => __( 'Post Type Description', 'carl' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-editor-help',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
	);
	register_post_type( 'how_to_article', $args );

}
add_action( 'init', 'add_how_to_article', 0 );
?>