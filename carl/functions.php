<?php
/**
 * Theme Functions
 * @package carl
 */

// Theme Setup
require_once(get_template_directory().'/functions/theme-setup.php'); 

// Theme Scripts
require_once(get_template_directory().'/functions/theme-scripts.php'); 

// Theme Custom Fields (Advanced Custom Fields Plugin)
require_once(get_template_directory().'/functions/theme-custom-fields.php');  

// Theme Cleanup (WP)
require_once(get_template_directory().'/functions/theme-cleanup.php'); 

// Theme Speed Optimization
require_once(get_template_directory().'/functions/theme-optimize.php'); 

// Theme Menus
require_once(get_template_directory().'/functions/theme-menus.php'); 

// Theme Schema (Schema.org)
require_once(get_template_directory().'/functions/theme-schema.php');

// Theme How To Article Post Type
require_once(get_template_directory().'/functions/theme-how-to-article.php');
require_once(get_template_directory().'/functions/theme-faq.php');

// Theme Testimonials Post Type
require_once(get_template_directory().'/functions/theme-testimonials.php');

// Theme Navigation
require_once(get_template_directory().'/functions/theme-navigation.php');
require_once(get_template_directory().'/functions/theme-footer-navigation.php');

// Theme API Functions
require_once(get_template_directory().'/functions/theme-api.php');

?>
