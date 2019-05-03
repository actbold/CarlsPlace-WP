<?php get_header(); //Template Name: Testimonials ?>
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
						<span class="breadcrumb-item active">Testimonials</span>
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
	<!-- Testimonials tabs start -->
	<section class="tab-testi">
		<div class="accent-bg-line"></div>

<!--  start fix filter tabs -->
		<div class="container">
			<div class="row">
				<div class="col-12 tab-gallery">

                    <ul class="nav nav-tabs tabs-menu">
                        <li class="nav-item current">
                            <a class="nav-link"  href="#all-testimonials">All testimonials</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"  href="#backyard-theater">Backyard Theater</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"  href="#golf-simulator">Golf Simulator</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"  href="#home-theater">Home Theater</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"  href="#large-venue">Large Venue</a>
                        </li>
                    </ul>
					<!-- Tab panes -->
                    <div class="tab">

                        <div class="tab-content" id="all-testimonials">
                            <?php
                            $args = array(
                                'post_type' => 'testimonial',
                                'posts_per_page' => -1,
                                'taxonomy' => 'testimonial_tags',
                                'testimonial_tags' => 'all-testimonials'
                            );
                            $testimonials = new WP_Query($args);
                            ?>
                            <div class="tab-pane fade show active" id="all-testimonials" role="tabpanel">
                                <div class="row">
                                    <?php $i = 0; while ( $testimonials->have_posts() ) : $testimonials->the_post(); $i++; ?>
                                    <div class="col-12 col-md-6 col-lg-4 px-2 item">
                                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                            <span class="descr"><p><?php the_field('testimonial_excerpt'); ?></p><span class="name">
                                                    <?php the_title(); ?></span></span>
                                            <img src="<?php the_post_thumbnail_url($post->id, 'large'); ?>">
                                        </a>
                                    </div>
                                    <?php endwhile; wp_reset_postdata(); ?>
                                </div>
                            </div>

                        </div>
                        <div class="tab-content" id="backyard-theater">
                            <?php
                            $args = array(
                                'post_type' => 'testimonial',
                                'posts_per_page' => -1,
                                'taxonomy' => 'testimonial_tags',
                                'testimonial_tags' => 'backyard-theater'
                            );
                            $testimonials = new WP_Query($args);
                            ?>
                            <div class="tab-pane fade show active" id="backyard-theater" role="tabpanel">
                                <div class="row">
                                    <?php $i = 0; while ( $testimonials->have_posts() ) : $testimonials->the_post(); $i++; ?>
                                        <div class="col-12 col-md-6 col-lg-4 px-2 item">
                                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                            <span class="descr"><p><?php the_field('testimonial_excerpt'); ?></p><span class="name">
                                                    <?php the_title(); ?></span></span>
                                                <img src="<?php the_post_thumbnail_url($post->id, 'large'); ?>">
                                            </a>
                                        </div>
                                    <?php endwhile; wp_reset_postdata(); ?>
                                </div>
                            </div>

                        </div>
                        <div class="tab-content" id="golf-simulator">
                            <?php
                            $args = array(
                                'post_type' => 'testimonial',
                                'posts_per_page' => -1,
                                'taxonomy' => 'testimonial_tags',
                                'testimonial_tags' => 'golf-simulator'
                            );
                            $testimonials = new WP_Query($args);
                            ?>
                            <div class="tab-pane fade show active" id="golf-simulator" role="tabpanel">
                                <div class="row">
                                    <?php $i = 0; while ( $testimonials->have_posts() ) : $testimonials->the_post(); $i++; ?>
                                        <div class="col-12 col-md-6 col-lg-4 px-2 item">
                                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                            <span class="descr"><p><?php the_field('testimonial_excerpt'); ?></p><span class="name">
                                                    <?php the_title(); ?></span></span>
                                                <img src="<?php the_post_thumbnail_url($post->id, 'large'); ?>">
                                            </a>
                                        </div>
                                    <?php endwhile; wp_reset_postdata(); ?>
                                </div>
                            </div>

                        </div>
                        <div class="tab-content" id="home-theater">
                            <?php
                            $args = array(
                                'post_type' => 'testimonial',
                                'posts_per_page' => -1,
                                'taxonomy' => 'testimonial_tags',
                                'testimonial_tags' => 'home-theater'
                            );
                            $testimonials = new WP_Query($args);
                            ?>
                            <div class="tab-pane fade show active" id="home-theater" role="tabpanel">
                                <div class="row">
                                    <?php $i = 0; while ( $testimonials->have_posts() ) : $testimonials->the_post(); $i++; ?>
                                        <div class="col-12 col-md-6 col-lg-4 px-2 item">
                                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                            <span class="descr"><p><?php the_field('testimonial_excerpt'); ?></p><span class="name">
                                                    <?php the_title(); ?></span></span>
                                                <img src="<?php the_post_thumbnail_url($post->id, 'large'); ?>">
                                            </a>
                                        </div>
                                    <?php endwhile; wp_reset_postdata(); ?>
                                </div>
                            </div>

                        </div>
                        <div class="tab-content" id="large-venue">
                            <?php
                            $args = array(
                                'post_type' => 'testimonial',
                                'posts_per_page' => -1,
                                'taxonomy' => 'testimonial_tags',
                                'testimonial_tags' => 'large-venue'
                            );
                            $testimonials = new WP_Query($args);
                            ?>
                            <div class="tab-pane fade show active" id="large-venue" role="tabpanel">
                                <div class="row">
                                    <?php $i = 0; while ( $testimonials->have_posts() ) : $testimonials->the_post(); $i++; ?>
                                        <div class="col-12 col-md-6 col-lg-4 px-2 item">
                                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                            <span class="descr"><p><?php the_field('testimonial_excerpt'); ?></p><span class="name">
                                                    <?php the_title(); ?></span></span>
                                                <img src="<?php the_post_thumbnail_url($post->id, 'large'); ?>">
                                            </a>
                                        </div>
                                    <?php endwhile; wp_reset_postdata(); ?>
                                </div>
                            </div>

                        </div>

                    </div>

			</div>
	</section>
	<!-- Testimonials tabs end -->
			
</main>
<?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>
