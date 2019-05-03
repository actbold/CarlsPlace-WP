<?php
//Determine the most popular articles
function determine_popular_articles($post_id) {
	$count_key = 'popular_articles';
	$count = get_post_meta($post_id, $count_key, true);
	if ($count == '') {
		$count = 0;
		delete_post_meta($post_id, $count_key);
		add_post_meta($post_id, $count_key, '0');
	} else {
		$count++;
		update_post_meta($post_id, $count_key, $count);
	}
}
function track_articles($post_id) {
	if (!is_single()) return;
	if (empty($post_id)) {
		global $post;
		$post_id = $post->ID;
	}
	determine_popular_articles($post_id);
}
add_action('wp_head', 'track_articles');
	
//Popular Articles Menu	
function popular_articles_menu() {
	$Categories = get_categories( array(
        'orderby'    => 'name',
        'show_count' => false,
        'exclude' 	 => array(9),
        'hide_empty' => true
    ));
    echo '<div class="article-menu">';
	echo '<div class="title">';
	echo '<h3>Popular Articles</h3>';
	echo '</div>';
    echo '<div class="category-links">';
	foreach ( $Categories as $Category ) {
		$CatID = $Category->term_id;
		$CatName = $Category->name;
		$CatLink = get_category_link($CatID);
		echo '<div class="category-link flex">';
		echo '<i><svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg"><path d="M91.918 45.582l-37.5-37.5a6.238 6.238 0 0 0-8.836 0 6.238 6.238 0 0 0 0 8.836L78.664 50 45.582 83.082a6.238 6.238 0 0 0 0 8.836C46.801 93.137 48.4 93.75 50 93.75s3.2-.613 4.418-1.832l37.5-37.5a6.238 6.238 0 0 0 0-8.836z"/><path d="M54.418 45.582l-37.5-37.5a6.238 6.238 0 0 0-8.836 0 6.238 6.238 0 0 0 0 8.836L41.164 50 8.082 83.082a6.238 6.238 0 0 0 0 8.836c1.219 1.219 2.816 1.832 4.418 1.832s3.2-.613 4.418-1.832l37.5-37.5a6.238 6.238 0 0 0 0-8.836z"/></svg></i>';
		echo '<a href="'.$CatLink.'" title="'.$CatName.'" data-category="'.$CatID.'">';
		echo '<span>'.$CatName.'</span>';
		echo '</a>';
		echo '</div>';
	}
	echo '</div>';
	echo '</div>';
	return;
}

//List Popular Articles
function most_popular_articles(){
//get 7 of the most popular articles
$PopularArticles = new WP_Query(array(
	'post_type'			=> 'post',
	'category_name' 	=> $Category,
	'posts_per_page'	=>7,
	'category__not_in'  => array(9), 
	'meta_key'			=> 'popular_articles', 
	'orderby'			=> 'meta_value_num', 
	'order'				=>'DESC'
));

//Article Count
$i = 0;
echo '<div class="article-row flex">';
popular_articles_menu();
while ($PopularArticles->have_posts()) : $PopularArticles->the_post(); $i++;
//Get Primary Category information
$Category = get_the_category();
$CatID = $Category[0]->term_id;
$CatName = $Category[0]->cat_name;
$CatLink = get_category_link( $CatID );
//Get Article Link
$Link = get_permalink();
//Get Article Title
$Title = get_the_title();
//Get Article Excerpt
$FullExcerpt = get_the_excerpt();
$Excerpt = wp_trim_words( $FullExcerpt, 10, '...' );
//Get the psot img or placeholder
$BgImg = get_the_post_thumbnail_url();
$Lazy = 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
if ($BgImg == null) {
	$BgImg = "/school/wp-content/themes/carl/assets/images/article-placeholder-img.jpg";
}

if($i % 4 == 0) {echo '</div><div class="article-row flex">';}
echo '<article class="popular-article">';
echo '<div class="image lazy" style="background-image:url("'.$Lazy.'");" data-src="'.$BgImg.'"></div>';
echo '<div class="content">';
echo '<div class="category">';
echo '<a href="'.$CatLink.'" title="'.$CatName.'">'.$CatName.'</a>';
echo '</div>';
echo '<div class="title">';
echo '<a href="'.$Link.'" title="'.$Title.'"><h4>'.$Title.'</h4></a>';
echo '</div>';
echo '<div class="excerpt">';
echo '<p>'.$Excerpt.'</p>';
echo '</div>';
echo '<div class="read-more">';
echo '<a href="'.$Link.'" title="'.$Title.'"><span>Read More</span><span>&rsaquo;</span></a>';
echo '</div>';
echo '</div>';
echo '</article>';
endwhile; 

wp_reset_postdata();

return;

}

function ajax_popular_articles($CatID){
//get 7 of the most popular articles
$PopularArticles = new WP_Query(array(
	'category__in' => array($CatID),
	'posts_per_page'=>7, 
	'meta_key'=>'popular_articles', 
	'orderby'=>'meta_value_num', 
	'order'=>'DESC'
));

//Article Count
$i = 0;
echo '<div class="article-row flex">';
popular_articles_menu();
while ($PopularArticles->have_posts()) : $PopularArticles->the_post(); $i++;
//Get Primary Category information
$Category = get_the_category();
$CatID = $Category[0]->term_id;
$CatName = $Category[0]->cat_name;
$CatLink = get_category_link( $CatID );
//Get Article Link
$Link = get_permalink();
//Get Article Title
$Title = get_the_title();
//Get Article Excerpt
$FullExcerpt = get_the_excerpt();
$Excerpt = wp_trim_words( $FullExcerpt, 10, '...' );
//Get the psot img or placeholder
$BgImg = get_the_post_thumbnail_url();
if ($BgImg == null) {
	$BgImg = "/school/wp-content/themes/carl/assets/images/article-placeholder-img.jpg";
}
if($i % 4 == 0) {
echo '</div><div class="article-row flex">';}
echo '<article class="popular-article">';
echo '<div class="image" style="background-image:url('.$BgImg.')"></div>';
echo '<div class="content">';
echo '<div class="category">';
echo '<a href="'.$CatLink.'" title="'.$CatName.'">'.$CatName.'</a>';
echo '</div>';
echo '<div class="title">';
echo '<a href="'.$Link.'" title="'.$Title.'"><h4>'.$Title.'</h4></a>';
echo '</div>';
echo '<div class="excerpt">';
echo '<p>'.$Excerpt.'</p>';
echo '</div>';
echo '<div class="read-more">';
echo '<a href="'.$Link.'" title="'.$Title.'"><span>Read More</span><span>&rsaquo;</span></a>';
echo '</div>';
echo '</div>';
echo '</article>';
endwhile; 

wp_reset_postdata();

return;
 
}
function get_ajax_popular_articles(){
	$CatID = $_POST['CatID'];	
	$Articles = ajax_popular_articles($CatID);
	echo $Articles;
	die();
}
add_action( 'wp_ajax_get_ajax_popular_articles', 'get_ajax_popular_articles' );
add_action( 'wp_ajax_nopriv_get_ajax_popular_articles', 'get_ajax_popular_articles' );


?>