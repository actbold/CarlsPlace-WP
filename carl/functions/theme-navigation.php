<?php
    add_action('acf/init', 'generate_navigation_html');
    generate_navigation_html();
    function generate_navigation_html(){
    $categoryMenuLinks = get_field('category_menu_links', 'options');
    $materialMenuLinks = get_field('material_menu_links', 'options');
    $html = '';
    $html.= '<div id="dropdown-navigation">';
    $html.= '<div id="mobile-links" class="mobile-menu-links">';
    $html.= '<ul>';
    while ( have_rows('mobile_menu_links', 'options') ) : the_row();
    $i = get_row_index();
    if (get_sub_field('target')){
        $mobileLinkId = 'target-'.get_sub_field('target');
    } else {
        $mobileLinkId = 'no-target';
    }
    $html.= '<li class="mobile-menu-link-wrapper">';
    $html.= '<a href="#" class="menu-back-link" title="'.get_sub_field('title').'" onclick="hideMobileMenu(this);">Back</a>';
    $html.= '<a id='.$mobileLinkId.' href="#" class="mobile-menu-link" title="'.get_sub_field('title').'" onclick="showMobileMenu(this);">'.get_sub_field('title').'</a>';
    $html.= '</li>';
    endwhile;
    $html.= '</ul>';
    $html.= '</div>';
    /* START CATEGORY NAVIGATION */
    $html.= '<div id="shop-categories-menu" class="menu menu--active">';
    $html.= '<div class="dropdown-layout">';
    $html.= '<div class="dropdown-sidebar">';
    $html.= '<ul>';
        while ( have_rows('category_menu_links', 'options') ) : the_row();
            $i = get_row_index();
            $target = get_sub_field('target');

            $html.= '<li>';
            if($i == 1){
                $html.= '<a id="menu-1-toggle-'.$i.'" href="'.$target.'" class="menu-link menu-link--active" title="'.get_sub_field('title').'" onclick="showMenu(this);">'.get_sub_field('title').'</a>';
            } else {
                $html.= '<a id="menu-1-toggle-'.$i.'" href="'.$target.'" class="menu-link" title="'.get_sub_field('title').'" onclick="showMenu(this);">'.get_sub_field('title').'</a>';
            }
            $html.= '</li>';
        endwhile;
    $html.= '</ul>';
    $html.= '</div>';
    $html.= '<div class="dropdown-content">';
    while ( have_rows('category_menu_links', 'options') ) : the_row();
        $i = get_row_index();
        if($i == 1){
            $html.= '<div id="menu-1-content-'.$i.'" class="menu-content menu-content--active">';
        } else {
            $html.= '<div id="menu-1-content-'.$i.'" class="menu-content">';
        }
        /* Menu Banner */
        $banner = get_sub_field('banner');
        
        if($banner):
            $html.= '<div class="menu-banner"><img title='.get_sub_field('title').' alt='.get_sub_field('title').' src='.$banner.' /></div>';
        endif;
        $html.= '<div class="dropdown-content-layout">';
        $links = have_rows('links');

        while ( have_rows('subcategories') ) : the_row();
        $hasImage = $links[0]['image'];
            if($hasImage){
                $html.= '<div class="menu-block menu-block--has-image">';
            } else {
            $html.= '<div class="menu-block">';
            }

            $html.= '<div class="title"><span>'.get_sub_field('title').'</span></div>';
            $html.= '<ul>';
            while ( have_rows('links') ) : the_row();
                if(get_sub_field('image')){
                    $html.= '<li><a href='.get_sub_field('link').' title='.get_sub_field('title').'><img src="'.get_sub_field('image').'"/><div class="title"><span>'.get_sub_field('title').'</span></div></a></li>';
                } else {
                    $html.= '<li><a href='.get_sub_field('link').' title='.get_sub_field('title').'>'.get_sub_field('title').'</a></li>';
                }            
            endwhile;
            $html.= '</ul>';
            $html.= '</div>';
        endwhile;
        $html.= '</div>';
        $html.= '</div>';
    endwhile;
    $html.= '</div>';
    $html.= '</div>';
    $html.= '</div>';
    /* START MATERIAL NAVIGATION */
    $html.= '<div id="shop-materials-menu" class="menu">';
    $html.= '<div class="dropdown-layout">';
    $html.= '<div class="dropdown-sidebar">';
    $html.= '<ul>';
        while ( have_rows('material_menu_links', 'options') ) : the_row();
            $i = get_row_index();
            $html.= '<li>';
            if($i == 1){
                $html.= '<a id="menu-2-toggle-'.$i.'" href="#" class="menu-link menu-link--active" title="'.get_sub_field('title').'" onclick="showMenu(this);">'.get_sub_field('title').'</a>';
            } else {
                $html.= '<a id="menu-2-toggle-'.$i.'" href="#" class="menu-link" title="'.get_sub_field('title').'" onclick="showMenu(this);">'.get_sub_field('title').'</a>';
            }
            $html.= '</li>';
        endwhile;
    $html.= '</ul>';
    $html.= '</div>';
    $html.= '<div class="dropdown-content">';
    while ( have_rows('material_menu_links', 'options') ) : the_row();
        $i = get_row_index();
        if($i == 1){
            $html.= '<div id="menu-2-content-'.$i.'" class="menu-content menu-content--active">';
        } else {
            $html.= '<div id="menu-2-content-'.$i.'" class="menu-content">';
        }
        $html.= '<div class="dropdown-content-layout">';
        while ( have_rows('subcategories') ) : the_row();
        $links = get_sub_field('links');
        $hasImage = $links[0]['image'];
            if($hasImage){
                $html.= '<div class="menu-block menu-block--has-image">';
            } else {
            $html.= '<div class="menu-block">';
            }
            $html.= '<div class="title"><span>'.get_sub_field('title').'</span></div>';
            $html.= '<ul>';
            while ( have_rows('links') ) : the_row();
                if(get_sub_field('image')){
                    $html.= '<li><a href='.get_sub_field('link').' title='.get_sub_field('title').'><img src="'.get_sub_field('image').'"/><div class="title"><span>'.get_sub_field('title').'</span></div></a></li>';
                } else {
                    $html.= '<li><a href='.get_sub_field('link').' title='.get_sub_field('title').'>'.get_sub_field('title').'</a></li>';
                }
            endwhile;
            $html.= '</ul>';
            $html.= '</div>';
        endwhile;
        $html.= '</div>';
        $html.= '</div>';
    endwhile;
    $html.= '</div>';
    $html.= '</div>';
    $html.= '</div>';
    $html.= '</div>';

    $fh = fopen("navigation.html", 'w') or die("Failed to create file"); 
    fwrite($fh, $html) or die("Could not write to file"); 
    fclose($fh); 

    return;
}

?>