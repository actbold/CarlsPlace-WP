<?php
    add_action('acf/init', 'generate_footer_navigation_html');

    function generate_footer_navigation_html(){
    $footerMenus = 'footer_menus';
    $html = '<div id="footer-navigation" class="footer-navigation">';
    $html.= '<div class="menu-layout">';
    while ( have_rows($footerMenus, 'options') ) : the_row(); $i = get_row_index();
    $title = get_sub_field('title');
    $html.= '<div class="menu-block">';
    $html.= '<div class="menu-block-title"><span>'.$title.'</span></div>';
    $html.= '<nav class="menu-block-links"><ul>';
    while ( have_rows('links', 'options') ) : the_row(); $i = get_row_index();
    $title = get_sub_field('title');
    $link = get_sub_field('link');
    $html.= '<li><a href='.$link.' title='.$title.'>'.$title.'</a></li>';
    endwhile;
    $html.= '</ul></nav></div>';
    endwhile;
    $html.= '<div class="menu-block menu-block--special">';
    $html.= '<div class="menu-block-top-links">';
    $html.= '<nav><ul>';
    $html.= '<li><a href="tel:+16083520002" title="Call Us: +1 (608) 352-0002">'.get_svg('phone').'<span>+1 (608) 352-0002</span></a></li>';
    $html.= '<li><a href="#" class="link--live-chat" title="Chat With Us">'.get_svg('chat').'<span>Live Chat</span></a></li>';
    $html.= '<li><a href="mailto:info@carlofet.com" title="Email Us: info@carlofet.com">'.get_svg('mail').'<span>info@carlofet.com</span></a></li>';
    $html.= '<li><a href="/support" title="Help & Support">'.get_svg('support').'<span>Help & Support</span></a></li>';
    $html.= '</ul></nav>';
    $html.= '</div>';
    $html.= '<div class="menu-block-payment-methods">';
    $html.= '<ul>';
    $html.= '<li>'.get_svg('visa').'</li>';
    $html.= '<li>'.get_svg('mastercard').'</li>';
    $html.= '<li>'.get_svg('amex').'</li>';
    $html.= '<li>'.get_svg('discover').'</li>';
    $html.= '<li>'.get_svg('paypal').'</li>';
    $html.= '<li>'.get_svg('amazon').'</li>';
    $html.= '</ul>';
    $html.= '</div>';
    $html.= '</div>';
    $html.= '</div>';
    $html.= '</div>';
    $fh = fopen("footer-navigation.html", 'w') or die("Failed to create file"); 
    fwrite($fh, $html) or die("Could not write to file"); 
    fclose($fh); 
    return;
    }

?>