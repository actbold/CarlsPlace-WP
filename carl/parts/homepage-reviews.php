<section class="reviews-block">
	<div class="container">
		
		<?php
		  $args = array(
			'orderby'=>'rand',
			'post_type'=>'testimonial', 
			'post_status' => 'publish',
			'posts_per_page'=> 1,
			 'ignore_custom_sort' => true
		  );

		  $testimonials=new WP_Query($args);

		  while ($testimonials->have_posts()) : $testimonials->the_post(); 
		?>
		<div class="row align-items-center">
			<div class="col-lg-3 d-none d-lg-block user-icon">
				<?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'medium'); ?>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img src="<?php echo $featured_img_url; ?>" alt="icon" width="100%" style="border-radius: 10px;"></a>
			</div>
			<div class="col-lg-9 user-text">
				<span><i>"<?php echo wp_trim_words(get_the_content()); ?>"</i>  <strong><br /><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" style="color: #fff;"><?php the_title(); ?></a></strong></span>
				<!-- div class="info d-flex justify-content-start">
					<div class="rate-icon"><img src="wp-content/themes/carl/assets/img/home/stars.png" alt="icon rate"></div>
					<div class="rate-value">4.8/5</div>
					<div class="reviews-count">345 Reviews</div>
				</div>
				<div class="approv-img">
					<img src="wp-content/themes/carl/assets/img/home/aprov.png" alt="icon">
				</div -->
			</div>
			
		</div>
		<?php 
		  endwhile;
		  wp_reset_postdata();
		?>
	</div>
</section>
