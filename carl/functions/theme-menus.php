<?php
//REGISTER MENU LOCATIONS
register_nav_menus(
	array(
		'top-menu' => __( 'The Top Menu', 'carl' ),
		'main-menu' => __( 'The Main Menu', 'carl' ),
		'mobile-menu' => __( 'The Mobile Menu', 'carl' ),
		'footer-menu' => __( 'The Footer Menu', 'carl' ),
		'bottom-links' => __( 'Bottom Links', 'carl' )   
	)
);
//MAIN MENU
function carl_top_nav()
{
	wp_nav_menu(
	array(
		'theme_location'  => 'top-menu',
		'menu'            => '',
		'container'       => '',
		'container_id'    => '',
		'menu_class'      => '',
		'menu_id'         => '',
		'depth'           => 0,
		'items_wrap'      => '<div class="top-nav d-flex">%3$s</div>',
		'walker'          => ''
		)
	);
}
//MAIN MENU
function carl_main_nav()
{
	wp_nav_menu(
	array(
		'theme_location'  => 'main-menu',
		'menu'            => '',
		'container'       => '',
		'container_id'    => '',
		'menu_class'      => '',
		'menu_id'         => '',
		'depth'           => 0,
		'items_wrap'      => '<ul class="main-menu flex">%3$s</ul>',
		'walker'          => ''
		)
	);
}

//Footer Menu
function carl_footer_nav()
{
	wp_nav_menu(
	array(
		'theme_location'  => 'footer-menu',
		'menu'            => '',
		'container'       => '',
		'container_id'    => '',
		'menu_class'      => '',
		'menu_id'         => '',
		'depth'           => 0,
		'items_wrap'      => '<ul class="footer-menu flex">%3$s</ul>',
		'walker'          => ''
		)
	);
}
//MOBILE MENU
function carl_mobile_nav()
{
	wp_nav_menu(
	array(
		'theme_location'  => 'mobile-menu',
		'menu'            => '',
		'container'       => '',
		'container_id'    => '',
		'menu_class'      => '',
		'menu_id'         => '',
		'depth'           => 0,
		'items_wrap'      => '<ul class="mobile-menu">%3$s</ul>',
		'walker'          => ''
		)
	);
}
//FOOTER MENU
function carl_bottom_links()
{
	wp_nav_menu(
	array(
		'theme_location'  => 'bottom-links',
		'menu'            => '',
		'container'       => '',
		'container_id'    => '',
		'menu_class'      => '',
		'menu_id'         => '',
		'depth'           => 0,
		'items_wrap'      => '<ul class="bottom-links">%3$s</ul>',
		'walker'          => ''
		)
	);
}
// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var)
{
    return is_array($var) ? array() : '';
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function discard_menu_classes($classes, $item) {
    $classes = array_filter( 
        $classes, 
        create_function( '$class', 
                 'return in_array( $class, 
                      array( "current-menu-item", "current-menu-parent", "menu-item-has-children" ) );' )
        );
    return array_merge(
        $classes,
        (array)get_post_meta( $item->ID, '_menu_item_classes', true )
        );
    }
    add_filter('nav_menu_css_class', 'discard_menu_classes', 10, 2);

