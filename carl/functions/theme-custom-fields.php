<?php
// 1. customize ACF path
add_filter('acf/settings/path', 'carl_acf_settings_path');
 
function carl_acf_settings_path( $path ) {
 
    // update path
    $path = get_stylesheet_directory() . '/acf/';
    
    // return
    return $path;
    
}
 

// 2. customize ACF dir
add_filter('acf/settings/dir', 'carl_acf_settings_dir');
 
function carl_acf_settings_dir( $dir ) {
 
    // update path
    $dir = get_stylesheet_directory_uri() . '/acf/';
    
    // return
    return $dir;
    
}


// 3. Hide ACF field group menu item
//add_filter('acf/settings/show_admin', '__return_false');


// 4. Include ACF
include_once( get_template_directory() . '/acf/acf.php' );
 if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
		
}
?>