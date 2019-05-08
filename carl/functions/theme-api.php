<?php
function getHighlightsArticles(WP_REST_Request $request) {
    $params = $request->get_params();
   
// WP_Query arguments
$args = array (
            'post_type'              =>  'any',
            'posts_per_page'         => 2,
            'post_status' => 'publish',
            'tax_query' => array(
                array(
                    'taxonomy' => 'post_tag',
                    'field' => 'slug',
                    'terms'     => $params['category']
                ),
                array(
                    'taxonomy' => 'post_format',
                    'field' => 'slug',
                    'terms' => array('post-format-aside', 'post-format-gallery', 'post-format-link', 
                                     'post-format-image', 'post-format-quote', 'post-format-status', 'post-format-audio', 'post-format-chat', 'post-format-video'),
                    'operator' => 'NOT IN'
                   )
            ),
            'orderby'=>'rand'
        );
// The Query
$featured_articles = array();
$the_query = new WP_Query( $args );
$posts = array();
if ($the_query->have_posts()) :
    while ( $the_query->have_posts() ) : $the_query->the_post();
    $id = get_the_id();
    $imageUrl = get_the_post_thumbnail_url($id, 'full');
        $posts[] = array(
            'title' => get_the_title(),
            'link' => get_the_permalink(),  
            'image' => $imageUrl,
            'excerpt' => wp_trim_words( get_the_content(), 40, '...' ),
        );
    endwhile;
endif;   
$response = new WP_REST_Response($posts);
$response->set_status(200);

return $response;
}

function getHelpfulArticles(WP_REST_Request $request) {
    // WP_Query arguments


$args = array (
            'post_type'              =>  'any',
            'posts_per_page'         => 4,
            'post_status' => 'publish',
			'tax_query' => array(
				array(
					'taxonomy' => 'post_tag',
					'field' => 'slug',
					'terms'     => sanitize_title( 'helpful resources' )
				),
				array(
					'taxonomy' => 'post_format',
					'field' => 'slug',
					'terms' => array('post-format-aside', 'post-format-gallery', 'post-format-link', 
									 'post-format-image', 'post-format-quote', 'post-format-status', 'post-format-audio', 'post-format-chat', 'post-format-video'),
					'operator' => 'NOT IN'
				   )
			),
			'orderby'=>'rand'
        );


    // The Query
    $featured_articles = array();
    $the_query = new WP_Query( $args );
    $posts = array();
    if ($the_query->have_posts()) :
        while ( $the_query->have_posts() ) : $the_query->the_post();
        $id = get_the_id();
        $imageUrl = get_the_post_thumbnail_url($id, 'full');
            $posts[] = array(
                'title' => get_the_title(),
                'link' => get_the_permalink(),  
                'image' => $imageUrl,
                'excerpt' => wp_trim_words( get_the_content(), 40, '...' ),
            );
        endwhile;
    endif;   
    $response = new WP_REST_Response($posts);
    $response->set_status(200);
    
    return $response;
    }


add_action( 'rest_api_init', function () {
    register_rest_route( 'cp/v1', '/highlights-articles/', array(
            'methods' => 'GET',
            'callback' => 'getHighlightsArticles'
    ));
});

add_action( 'rest_api_init', function () {
    register_rest_route( 'cp/v1', '/helpful-articles/', array(
            'methods' => 'GET',
            'callback' => 'getHelpfulArticles'
    ));
});
