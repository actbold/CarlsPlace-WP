<?php get_header(); //Template Name: Resources ?>
<?php if (have_posts()): while (have_posts()) : the_post(); ?>
    <?php
    /* Testimonial Tags */
    $tags = get_terms( array(
        'taxonomy' => 'testimonial_tags',
        'hide_empty' => true,
    ) );
    ?>
    <main role="main">
        <!-- Testimonials banner start -->
        <section class="hero">
            <div class="container">
                <div class="row flex-column justify-content-center">
                    <div class="col">
                        <nav class="breadcrumb">
                            <a class="breadcrumb-item" href="/">Home</a>
                            <span class="breadcrumb-item active">Resources</span>
                        </nav>
                    </div>
                    <div class="hero-content">
                        <h1><?php the_title(); ?></h1>
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- Testimonials banner end -->
        <!-- HELPFUL ARTICLES start -->
        <?php
        // WP_Query arguments
        $helpfulArticles = array();
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
        $the_query = new WP_Query( $args );

        if ($the_query->have_posts()) :
            while ( $the_query->have_posts() ) : $the_query->the_post();
                $id = get_the_id();
                $imageUrl = get_the_post_thumbnail_url($id, 'full');
                if($imageUrl == null):
                    $imageUrl = '/wp-content/uploads/2018/11/projector.jpg';
                endif;
                $helpfulArticles[] = array(
                    'title' => get_the_title(),
                    'link' => get_the_permalink(),
                    'image' => $imageUrl,
                    'excerpt' => wp_trim_words( get_the_content(), 25, '...' ),
                );
            endwhile;
        endif;
        ?>
        <style>
            .product-tales .img-container a.card-a{ position:relative; height:0; width:100%; display:block; padding-top:64%; background-size:cover; background-position:center;}
            .product-tales .img-container a.card-a img{ display:none;} 
        </style>
        <section class="system-res">
            <h2>HELPFUL RESOURCES</h2>
            <div class="container ">
                <div class="row product-tales">
                    <?php foreach($helpfulArticles as $article): ?>
                        <div class="col-sm-6 item col-lg-3 px-2">
                            <div class="card">
                                <div class="img-container">
                                    <a href="<?= $article['link']; ?>" class="card-a" title="<?= $article['title']; ?>" style="background-image:url(<?= $article['image']; ?>)"><img class="card-img-top" src="<?= $article['image']; ?>" alt="<?= $article['title']; ?>"></a>
                                </div>
                                <div class="card-block">
                                    <h4 class="card-title"><?= $article['title']; ?></h4>
                                    <p class="card-text"><?= $article['excerpt']; ?></p>
                                    <a href="<?= $article['link']; ?>" title="Read more" class="link">Read more</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    
                </div>
        </section>
        <!-- HELPFUL ARTICLES end -->
        <!-- Helpful videos start -->

        <?php
        // WP_Query arguments
        $videos = array();
			$video_tag = 'helpful video';
        $args = array(
            'tax_query' => array(
                array(
                    'taxonomy' => 'post_format',
                    'field' => 'slug',
                    'terms' => 'post-format-video'
                ),
				array(
					'taxonomy' => 'post_tag',
					'field' => 'slug',
					'terms'     => sanitize_title( $video_tag )
				)
            ),
            'posts_per_page'         => 3
			
        );
        $the_query = new WP_Query( $args );

        if ($the_query->have_posts()) :
            while ( $the_query->have_posts() ) : $the_query->the_post();
                $id = get_the_id();
                $imageUrl = get_the_post_thumbnail_url($id, 'full');
                if($imageUrl == null):
                    $imageUrl = '/wp-content/uploads/2018/11/projector.jpg';
                endif;
                $url_string = get_the_content();


                $videos[] = array(
                    'title' => get_the_title(),
                    'link' => get_the_permalink(),
                    'image' => $imageUrl,
                    'video' => $url_string,
                );
            endwhile;
        endif;
        ?>
        <section class="help-videos">
            <h2>HELPFUL VIDEOS</h2>
            <div class="container">
                <div class="row d-flex align-items-center justify-content-center">
                    <?php foreach($videos as $video): ?>


                        <div class="col-12 col-md-6 item col-xl-4 d-flex px-2">
                            <div class="embed-responsive embed-responsive-4by3">
                                <div class="info-line d-flex justify-content-start align-items-center">
                                    <div class="autor d-flex mr-auto">
                                        <div class="descr"><?php echo $video['title']; ?></div>
                                    </div>
                                    <i class="fa fa-info-circle" aria-hidden="true"></i>
                                </div>
                                <iframe class="embed-responsive-item" src="<?php echo $video['video']; ?>" allowfullscreen></iframe>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <?php if(false): ?>
                        <div class="d-none col-4 video-list d-xl-flex flex-column justify-content-between px-2">
                            <div class="flex-item d-flex">
                                <div class="embed-responsive embed-responsive-4by3">
                                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen></iframe>
                                </div>
                                <div class="text">Lorem ipsum dolor sit amet, consectetur <br>adipisicing elit, sed do</div>
                            </div>
                            <div class="flex-item d-flex">
                                <div class="embed-responsive embed-responsive-4by3">
                                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen></iframe>
                                </div>
                                <div class="text">Lorem ipsum dolor sit amet, consectetur <br>adipisicing elit, sed do</div>
                            </div>
                            <div class="flex-item d-flex">
                                <div class="embed-responsive embed-responsive-4by3">
                                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen></iframe>
                                </div>
                                <div class="text">Lorem ipsum dolor sit amet, consectetur <br>adipisicing elit, sed do</div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
        <!-- Helpful videos end -->
        <!-- Compare start -->
        <?php
        // WP_Query arguments
        $compareArticles = array();
        $args = array (
            'post_type'              => array( 'how_to_article', 'post'),
            'posts_per_page'         => 9,

        );
        $the_query = new WP_Query( $args );

        if ($the_query->have_posts()) :
            while ( $the_query->have_posts() ) : $the_query->the_post();
                $id = get_the_id();
                $imageUrl = get_the_post_thumbnail_url($id, 'full');
                if($imageUrl == null):
                    $imageUrl = '/wp-content/uploads/2018/11/projector.jpg';
                endif;
                $compareArticles[] = array(
                    'title' => get_the_title(),
                    'link' => get_the_permalink(),
                    'image' => $imageUrl,
                    'excerpt' => wp_trim_words( get_the_content(), 25, '...' ),
                );
            endwhile;
        endif;
        ?>
        <?php if(false) : ?>
            <section class="compare">
                <div class="container">
                    <div class="row">
                        <div class="col-3 d-none px-2 d-xl-flex flex-column justify-content-center">
                            <div class="title">COMPARE MATERIAL TO FIND THE RIGHT ONE FOR YOU</div>
                            <a class="link" href="#"><span>VIEW ALL COMPARISON CHARTS</span><img src="img/home/arr-right-white.png" alt="icon"></a>
                        </div>
                        <div class="col-12 col-xl-9 px-2">
                            <div class="carousel">
                                <?php foreach($compareArticles as $article): ?>
                                    <div class="col-4 px-2 item">
                                        <div class="card">
                                            <a href="<?= $article['link']; ?>" title="<?= $article['title']; ?>">
                                                <img class="card-img-top" src="<?= $article['image']; ?>" alt="Card image cap">
                                            </a>
                                            <div class="card-block">
                                                <h4 class="card-title"><?= $article['title']; ?></h4>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex button-container d-xl-none justify-content-center">
                        <a class="link" href="#"><span>VIEW ALL COMPARISON CHARTS</span><img src="img/home/arr-right-white.png" alt="icon"></a>
                    </div>
                </div>
            </section>
            <!-- Compare end -->
        <?php endif; ?>
        <!-- Collapse asks start -->
        <section class="collapse-asks">
            <h2>FREQUENTLY ASKED QUESTIONS</h2>

<!--start fix filter tabs-->

            <div class="container">
                <div class="row">
                    <div class="col-12" >
                        <ul class="row tabs-headers-custom-outer tabs-menu">
                            <li class="col-lg-3 tabs-headers-custom-item current">
                                <a href="#home" class="btn">Home Theater</a>
                            </li>
                            <li class="col-lg-3 tabs-headers-custom-item">
                                <a href="#backyard" class="btn">Backyard Theater</a>
                            </li>
                            <li class="col-lg-3 tabs-headers-custom-item">
                                <a href="#venue" class="btn">Large Venue</a>
                            </li>
                            <li class="col-lg-3 tabs-headers-custom-item">
                                <a href="#golf" class="btn">Golf</a>
                            </li>
                        </ul>
                        <div class="tab">
                            <div class="tab-content" id="home">
                                <?php 		/* FAQ Query by Tag */
                                $args = array(
                                    'post_type' => 'faq',
                                    'posts_per_page' => -1,
                                    'category_name' => 'home-theater'
                                );
                                $faqs = new WP_Query($args);
                                ?>
                                <div role="tablist" aria-multiselectable="true" class="accordion">
                                    <?php $i = 0; while ( $faqs->have_posts() ) : $faqs->the_post(); $i++; ?>

                                        <div class="card accordion-section accordion-section-1">
                                            <div class="card-header d-flex align-items-center" role="tab" id="headingOne">
                                                <h5 class="mb-0 mr-auto">
                                                    <a data-toggle="" href="#faq-<?= $i; ?>"  class="accordion-section-title" data-parent=""  aria-expanded="" class="" aria-controls="">
                                                        <?php the_title(); ?>
                                                    </a>
                                                </h5>
                                                <div data-toggle="" class="plus"  data-parent=""  aria-expanded="" aria-controls="">
                                                    <img src="/wp-content/themes/carl/assets/img/resources/icon-plus.png" alt="icon">
                                                </div>

                                            </div>
                                            <div id="faq-<?= $i; ?>" class="panel-collapse collapse accordion-section-content" role="tabpanel" aria-labelledby="headingOne">
                                                <div class="card-block">
                                                    <?php the_content(); ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endwhile; wp_reset_postdata(); ?>
                                </div>
                            </div>
                            <div class="tab-content" id="backyard">
                                <?php 		/* FAQ Query by Tag */
                                $args = array(
                                    'post_type' => 'faq',
                                    'posts_per_page' => -1,
                                    'category_name' => 'backyard-theater'
                                );
                                $faqs = new WP_Query($args);
                                ?>
                                <div id="accordion" role="tablist" aria-multiselectable="true" class="accordion">
                                    <?php $i = 0; while ( $faqs->have_posts() ) : $faqs->the_post(); $i++; ?>

                                        <div class="card accordion-section accordion-section-2">
                                            <div class="card-header d-flex align-items-center" role="tab" id="headingOne">
                                                <h5 class="mb-0 mr-auto">
                                                    <a data-toggle="" href="#faq-<?= $i; ?>"  class="accordion-section-title" data-parent=""  aria-expanded="" class="" aria-controls="">
                                                        <?php the_title(); ?>
                                                    </a>
                                                </h5>
                                                <div data-toggle="" class="plus"  data-parent=""  aria-expanded="" aria-controls="">
                                                    <img src="/wp-content/themes/carl/assets/img/resources/icon-plus.png" alt="icon">
                                                </div>

                                            </div>
                                            <div id="faq-<?= $i; ?>" class="panel-collapse collapse accordion-section-content" role="tabpanel" aria-labelledby="headingOne">
                                                <div class="card-block">
                                                    <?php the_content(); ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endwhile; wp_reset_postdata(); ?>
                                </div>
                            </div>
                            <div class="tab-content" id="venue">
                                <?php 		/* FAQ Query by Tag */
                                $args = array(
                                    'post_type' => 'faq',
                                    'posts_per_page' => -1,
                                    'category_name' => 'large-venue'
                                );
                                $faqs = new WP_Query($args);
                                ?>
                                <div role="tablist" aria-multiselectable="true" class="accordion">
                                    <?php $i = 0; while ( $faqs->have_posts() ) : $faqs->the_post(); $i++; ?>

                                        <div class="card accordion-section accordion-section-3">
                                            <div class="card-header d-flex align-items-center" role="tab" id="headingOne">
                                                <h5 class="mb-0 mr-auto">
                                                    <a data-toggle="" href="#faq-<?= $i; ?>"  class="accordion-section-title" data-parent=""  aria-expanded="" class="" aria-controls="">
                                                        <?php the_title(); ?>
                                                    </a>
                                                </h5>
                                                <div data-toggle="" class="plus"  data-parent=""  aria-expanded="" aria-controls="">
                                                    <img src="/wp-content/themes/carl/assets/img/resources/icon-plus.png" alt="icon">
                                                </div>

                                            </div>
                                            <div id="faq-<?= $i; ?>" class="panel-collapse collapse accordion-section-content" role="tabpanel" aria-labelledby="headingOne">
                                                <div class="card-block">
                                                    <?php the_content(); ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endwhile; wp_reset_postdata(); ?>
                                </div>
                            </div>
                            <div class="tab-content" id="golf">
                                <?php 		/* FAQ Query by Tag */
                                $args = array(
                                    'post_type' => 'faq',
                                    'posts_per_page' => -1,
                                    'category_name' => 'golf-impact-screens'
                                );
                                $faqs = new WP_Query($args);
                                ?>
                                <div role="tablist" aria-multiselectable="true" class="accordion">
                                    <?php $i = 0; while ( $faqs->have_posts() ) : $faqs->the_post(); $i++; ?>

                                        <div class="card accordion-section accordion-section-4">
                                            <div class="card-header d-flex align-items-center" role="tab" id="headingOne">
                                                <h5 class="mb-0 mr-auto">
                                                    <a data-toggle="" href="#faq-<?= $i; ?>"  class="accordion-section-title" data-parent=""  aria-expanded="" class="" aria-controls="">
                                                        <?php the_title(); ?>
                                                    </a>
                                                </h5>
                                                <div data-toggle="" class="plus"  data-parent=""  aria-expanded="" aria-controls="">
                                                    <img src="/wp-content/themes/carl/assets/img/resources/icon-plus.png" alt="icon">
                                                </div>

                                            </div>
                                            <div id="faq-<?= $i; ?>" class="panel-collapse collapse accordion-section-content" role="tabpanel" aria-labelledby="headingOne">
                                                <div class="card-block">
                                                    <?php the_content(); ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endwhile; wp_reset_postdata(); ?>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </section>
        <!-- Collapse asks end -->
    </main>
<?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>