<?php
	// Register Custom Post Type
function add_testimonial() {

	$labels = array(
		'name'                  => _x( 'Testimonials', 'Post Type General Name', 'carl' ),
		'singular_name'         => _x( 'Testimonial', 'Post Type Singular Name', 'carl' ),
		'menu_name'             => __( 'Testimonials', 'carl' ),
		'name_admin_bar'        => __( 'Testimonial', 'carl' ),
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
		'slug'                  => 'testimonials',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'Testimonial', 'carl' ),
		'description'           => __( 'Post Type Description', 'carl' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'            => array( 'testimonial_tags' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-format-quote',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
	);
	register_post_type( 'testimonial', $args );

}
add_action( 'init', 'add_testimonial', 0 );
// Register Custom Taxonomy
function testimonial_tag() {

	$labels = array(
		'name'                       => _x( 'Tags', 'Taxonomy General Name', 'carl' ),
		'singular_name'              => _x( 'Tag', 'Taxonomy Singular Name', 'carl' ),
		'menu_name'                  => __( 'Tag', 'carl' ),
		'all_items'                  => __( 'All Items', 'carl' ),
		'parent_item'                => __( 'Parent Item', 'carl' ),
		'parent_item_colon'          => __( 'Parent Item:', 'carl' ),
		'new_item_name'              => __( 'New Item Name', 'carl' ),
		'add_new_item'               => __( 'Add New Item', 'carl' ),
		'edit_item'                  => __( 'Edit Item', 'carl' ),
		'update_item'                => __( 'Update Item', 'carl' ),
		'view_item'                  => __( 'View Item', 'carl' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'carl' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'carl' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'carl' ),
		'popular_items'              => __( 'Popular Items', 'carl' ),
		'search_items'               => __( 'Search Items', 'carl' ),
		'not_found'                  => __( 'Not Found', 'carl' ),
		'no_terms'                   => __( 'No items', 'carl' ),
		'items_list'                 => __( 'Items list', 'carl' ),
		'items_list_navigation'      => __( 'Items list navigation', 'carl' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite'                    => true,
	);
	register_taxonomy( 'testimonial_tags', array( 'testimonial' ), $args );

}
add_action( 'init', 'testimonial_tag', 1 );



function getNextTestimonial($currentPost)
{
	global $wpdb;

	$sql = "SELECT * 
	        FROM wp_posts
	        WHERE post_type = 'testimonial' and ID > %d
	        ORDER BY ID
			LIMIT 1";
			
	$next = $wpdb->get_row($wpdb->prepare($sql, $currentPost));

	if (empty($next)) {
		return '';
	}


	return get_permalink($next->ID);
}
?>