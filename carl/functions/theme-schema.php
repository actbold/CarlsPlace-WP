<?php
	function theme_schema() {
	    $schema = 'http://schema.org/';

if ( is_page_template('templates/page-blog.php') ) {
  // Default homepage
  $type = 'Blog';
} elseif ( is_front_page() ) {
  // static homepage
  $type = 'WebPage';
} elseif ( is_home() ) {
  // blog page
  $type = 'Blog';
} elseif ( is_single() ) {
  $type = 'WebPage';
} else {
  //everything else
    $type = 'WebPage';
}
    echo 'itemscope="itemscope" itemtype="' . $schema . $type . '"';
}
?>