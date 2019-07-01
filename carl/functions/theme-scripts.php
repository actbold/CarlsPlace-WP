<?php
function theme_scripts() {
global $wp_styles;

//MOVE WORDPRESS JQUERY TO FOOTER
if( !is_admin() ){
	wp_deregister_script( 'jquery' );
	wp_deregister_script( 'jquery-core' );
	wp_deregister_script( 'wp-embed' );
	wp_deregister_script( 'wp-emoji' );
	wp_deregister_script( 'jquery-migrate' );
    wp_register_script( 'jquery', includes_url( '/js/jquery/jquery.js' ), false, NULL, true );
	wp_enqueue_script( 'jquery' );

	wp_register_script( 'theme-scripts', get_template_directory_uri() . '/assets/js/scripts.js',array('jquery'), '1.2', true );
	wp_enqueue_script( 'theme-scripts', get_template_directory_uri() . '/assets/js/scripts.js', array('jquery'), '1.2', true );
	wp_register_script( 'theme-slider', get_template_directory_uri() . '/assets/js/slick/slick.min.js',array('jquery'), '1.2', true );
        wp_enqueue_script( 'theme-slider', get_template_directory_uri() . '/assets/js/slick/slick.min.js', array('jquery'), '1.2', true );
	
	wp_register_style( 'bootstrap-styles', get_template_directory_uri() . '/assets/css/bootstrap.min.css');
    wp_enqueue_style( 'bootstrap-styles', get_template_directory_uri() . '/assets/css/bootstrap.min.css');
	wp_register_style( 'font-styles', get_template_directory_uri() . '/assets/css/fonts.min.css', array('bootstrap-styles') );
    wp_enqueue_style( 'font-styles', get_template_directory_uri() . '/assets/css/fonts.min.css', array('bootstrap-styles') );
    wp_register_style( 'main-styles', get_template_directory_uri() . '/assets/css/main.min.css?t='.time(), array('font-styles') , '' );
    wp_enqueue_style( 'main-styles', get_template_directory_uri() . '/assets/css/main.min.css?t='.time(), array('font-styles'), '' );
    wp_register_style( 'slick-styles', get_template_directory_uri() . '/assets/js/slick/slick.css');
    wp_enqueue_style( 'slick-styles', get_template_directory_uri() . '/assets/js/slick/slick.css');
       wp_register_style( 'slick-theme-styles', get_template_directory_uri() . '/assets/js/slick/slick-theme.css');
    wp_enqueue_style( 'slick-theme-styles', get_template_directory_uri() . '/assets/js/slick/slick-theme.css');
    
//Ajax scripts
$args = array(
	'security' => wp_create_nonce('ajax-security'),
	'url' => admin_url('admin-ajax.php')
); 
wp_localize_script( 'theme-scripts', 'ajax', $args );

}

}
add_action('wp_enqueue_scripts', 'theme_scripts', 999);

// Calling your own login css so you can style it
function theme_login_css() {
	wp_enqueue_style( 'theme_login_css', get_template_directory_uri() . '/assets/css/login.css', false );
}

// calling it only on the login page
add_action( 'login_enqueue_scripts', 'theme_login_css', 10 );


?>
