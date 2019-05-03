<?php
// Fire all our initial functions at the start
add_action('after_setup_theme','carl_start', 16);

function carl_start() {

    // launching operation cleanup
    add_action('init', 'carl_head_cleanup');
    // remove pesky injected css for recent comments widget
    add_filter( 'wp_head', 'carl_remove_wp_widget_recent_comments_style', 1 );
    // clean up comment styles in the head
    add_action('wp_head', 'carl_remove_recent_comments_style', 1);
    // clean up gallery output in wp
    add_filter('gallery_style', 'carl_gallery_style');

    // launching this stuff after theme setup
    carl_theme_setup();

    // cleaning up excerpt
    add_filter('excerpt_more', 'carl_excerpt_more');

} /* end mm start */
	
// Adding WP Functions & Theme Support
function carl_theme_setup() {

	// Add WP Thumbnail Support
	add_theme_support('post-thumbnails');
	
	// Default thumbnail size
	set_post_thumbnail_size(150, 150, true);
	add_image_size( 'low', 50, 50 );
	// Add RSS Support
	add_theme_support('automatic-feed-links');

	// Add Support for WP Menus
	add_theme_support( 'menus' );
	
	// Add Support for WP Controlled Title Tag
	add_theme_support( 'title-tag' );
	
	// Add HTML5 Support
	add_theme_support( 'html5', 
	         array( 
	         	'comment-list', 
	         	'comment-form', 
	         	'search-form', 
	         ) 
	);
// Adding post format support
	 add_theme_support( 'post-formats',
		array(
			'aside',             // title less blurb
			'gallery',           // gallery of images
			'link',              // quick link to other site
			'image',             // an image
			'quote',             // a quick quote
			'status',            // a Facebook like status update
			'video',             // video
			'audio',             // audio
			'chat'               // chat transcript
		)
	); 	
}


//CLEAN UP BODY CLASSES
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)


// Add SVG Upload Capabilities
function add_svg_mime( $mimes = array() ) {
	$mimes['svg']  = 'image/svg+xml';
	$mimes['svgz'] = 'image/svg+xml';
	return $mimes;
}
add_filter( 'upload_mimes', 'add_svg_mime' );

//Remove Mime Check for SVG upload
function svg_mime_check( $data, $file, $filename, $mimes ) {
	$wp_filetype = wp_check_filetype( $filename, $mimes );
	$ext = $wp_filetype['ext'];
	$type = $wp_filetype['type'];
	$proper_filename = $data['proper_filename'];
	return compact( 'ext', 'type', 'proper_filename' );
}
add_filter( 'wp_check_filetype_and_ext', 'svg_mime_check', 10, 4 );

// Add Inline SVG Function
function inline_svg($name) {
	$file = get_template_directory();
	$file .= "/assets/svg/" . $name . ".svg";
	include($file);
}

// Add Inline SVG Function
function get_svg($name) {
	$file = get_template_directory();
	$file .= "/assets/svg/" . $name . ".svg";
	ob_start();
	include($file);
	return ob_get_clean();

}
// Add Media Library SVG Function
function media_svg( $id ) {
	$file = get_attached_file( $id );
	include($file);
}


// REMOVE ADMIN BAR
/*
function remove_admin_bar() {
	return false;
}
add_filter('show_admin_bar', 'remove_admin_bar');
*/


//CHANGE ADMIN COLOR
/*
add_filter('get_user_option_admin_color', 'change_admin_color');
function change_admin_color($result) {
	return 'light';
}
*/

//GET PART SHORTCUT
function get_part($prefix, $part) {
	$path = "parts/".$prefix;
	return get_template_part($path, $part);
}
//GET ASSET SHORTCUT
function get_asset($asset) {
	echo get_template_directory_uri() . '/assets/'.$asset;
}

//MOVE GRAVITY FORMS SCRIPTS TO FOOTER
add_filter("gform_init_scripts_footer", "init_scripts");
function init_scripts() {
return true;
}
//MOVE INLINE SCRIPTS FROM GRAVITY FORMS TO FOOTER

add_filter( 'gform_cdata_open', 'wrap_gform_cdata_open' );
function wrap_gform_cdata_open( $content = '' ) {
	$content = 'document.addEventListener( "DOMContentLoaded", function() { ';
	return $content;
}
add_filter( 'gform_cdata_close', 'wrap_gform_cdata_close' );
function wrap_gform_cdata_close( $content = '' ) {
	$content = ' }, false );';
	return $content;
}

function lazysrc(){
	return 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
}

//QUOTE SHORTCODE
// Add Shortcode
function quote_shortcode( $atts ) {

	// Attributes
	$atts = shortcode_atts(
		array(
			'content' => '',
		),
		$atts
	);
	return '<div class="quote"><p>' . $atts['content'] . '</p></div>';

}
add_shortcode( 'quote', 'quote_shortcode' );
?>
